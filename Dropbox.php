<?php
    class Dropbox {
        private $token;
        
        
        // ****  *****  *     ****   ****
        // *       *    *     *     *    
        // ***     *    *     ***    *** 
        // *       *    *     *         *
        // *     *****  ****  ****  **** 
        
        /**
        * Copies a file from one location to another
        * 
        */
        public function copy($from_path, $to_path, $allow_shared_folder = FALSE, $autorename = FALSE, allow_ownership_transfer = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/files/copy";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "from_path" => $from_path, "to_path" => $to_path, "allow_shared_folder" => $allow_shared_folder, "autorename" => $autorename, "allow_ownership_transfer" = $allow_ownership_transfer));
            $returnData = postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
            
        }
        
        /**
        * Copies a list of entries between paths
        * $entries contains a list of RelocationPath objects (objects with a "from_path" value and a "to_path" value)
        * returns either completed response data or an async_job_id if the processing is asynchronous
        */
        public function copy_batch($entries, $allow_shared_folder = FALSE, $autorename = FALSE, allow_ownership_transfer = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/files/copy_batch";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "entries" => $entries, "allow_shared_folder" => $allow_shared_folder, "autorename" => $autorename, "allow_ownership_transfer" = $allow_ownership_transfer));
            $returnData = postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * Checks the progress of an asynchronous copy_batch operation
        *
        */
        public function copy_batch_check($async_job_id) {
            $endpoint = "https://api.dropboxapi.com/2/files/copy_batch/check";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "async_job_id" => $async_job_id ));
            $returnData = postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function download($path, $target) {
            $endpoint = "https://content.dropboxapi.com/2/files/download";
            $headers = array(
                "Content-Type: ",
                "Dropbox-API-Arg: {\"path\": \"$path\"}"
            );
            $data = postRequest($endpoint, $headers, '', FALSE);
            $file = fopen($target, 'w');
            fwrite($file, $data);
            fclose($file);
        }
        
        public function listFilesInFolder($path, $recursive = FALSE, $include_media_info = FALSE, $include_has_explicit_shared_members = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/files/list_folder";
            $headers = array(
                "Content-Type: application/json",
            );
            $postdata = json_encode(array( "path" => $path, "recursive" => $recursive, "include_media_info" => $include_media_info, "include_has_explicit_shared_members" => $include_has_explicit_shared_members));
            $returnData = postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * @parameter $mode: "add", "update", "overwrite"
        */
        public function upload($target_path, $file_path, $mode = "add") {
            $endpoint = "https://content.dropboxapi.com/2/files/upload";
            $headers = array(
                "Content-Type: application/octet-stream",
                "Dropbox-API-Arg: {\"path\": \"$target_path\", \"mode\": \"$mode\"}"       
            );
            $postdata = file_get_contents($file_path);
            
            $returnData = postRequest($endpoint, $headers, $postdata);
            if ($returnData["error"] !== null) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData["path_display"];
            }
        }
        
        public function delete($path) {
            $endpoint = "https://api.dropboxapi.com/2/files/delete";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path ));
            return postRequest($endpoint, $headers, $postdata);
        }
        
        public function isValidPath($path) {
            $endpoint = "https://api.dropboxapi.com/2/files/get_metadata";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path, "include_media_info" => FALSE, "include_deleted" => FALSE, "include_has_explicit_shared_members" => false));
            $returnData = postRequest($endpoint, $headers, $postdata);
            if ($returnData["error"] !== null) {
                return FALSE;
            }
            else {
                return TRUE;
            }
        }
        
        public function createSharedLinkWithSettings($path) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/create_shared_link_with_settings";
            $headers = array(
                "Content-Type: application/json",
                "Dropbox-API-Arg: {\"path\": \"$target_path\", \"mode\": \"$mode\"}"
            );
            $postdata = json_encode(array( "path" => $path, "settings" => array( "requested_visibility" => "public")));
            $returnData = postRequest($endpoint, $headers, $postdata);
            if ($returnData["error"] !== null) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData["url"];
            }
        }
        
        
        public function __construct($accesstoken) {
            $this->token = $accesstoken;
        }
        
        private function postRequest($endpoint, $headers, $data, $json = TRUE) {
            $ch = curl_init($endpoint);
            array_push($headers, "Authorization: Bearer $this->token");
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $r = curl_exec($ch);
            curl_close($ch);
            if ($json)
                return $json_decode($r, true);
            else
                return $r;
        }
    }

?>