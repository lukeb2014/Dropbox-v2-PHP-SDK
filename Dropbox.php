<?php
    class Dropbox {
        private $token;
        
        
        //     *      *   *  *****  *   *
        //    * *     *   *    *    *   *
        //   *****    *   *    *    *****
        //  *     *   *   *    *    *   *
        // *       *   ***     *    *   *
        
        
        
        
        
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
        
        /**
        * Get a copy reference to a file or folder.
        * This reference string can be used to save that file or folder to another user's Dropbox by passing it to copy_reference/save
        */
        public function copy_reference_get($path) {
            $endpoint = "https://api.dropboxapi.com/2/files/copy_reference/get";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path ));
            $returnData = postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * Save a copy reference returned by copy_reference/get to the user's Dropbox
        */
        public function copy_reference_save($path, $copy_reference) {
            $endpoint = "https://api.dropboxapi.com/2/files/copy_reference/save";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "copy_reference" => $copy_reference, "path" => $path ));
            $returnData = postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * Copies a file from one location to another
        * 
        */
        public function copy_v2($from_path, $to_path, $allow_shared_folder = FALSE, $autorename = FALSE, allow_ownership_transfer = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/files/copy_v2";
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
        * creates a folder at a given path
        * DEPRECATED BY create_folder_v2
        */
        public function create_folder($path, $autorename = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/files/create_folder";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path, "autorename" => $autorename ));
            $returnData = postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * creates a folder at a given path
        */
        public function create_folder_v2($path, $autorename = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/files/create_folder_v2";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path, "autorename" => $autorename ));
            $returnData = postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * deletes a file or folder at a given path
        * DEPRECATED by delete_v2
        */
        public function delete($path) {
            $endpoint = "https://api.dropboxapi.com/2/files/delete";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path ));
            $returnData = postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        
        /**
        * deletes files and/or folders in $entries
        * $entries contains a list of a single value "path"
        */
        public function delete_batch($entries) {
            $endpoint = "https://api.dropboxapi.com/2/files/delete_batch";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "entries" => $entries ));
            return postRequest($endpoint, $headers, $postdata);
        }
        
        
        /**
        * Checks the progress of an asynchronous delete_batch operation
        *
        */
        public function delete_batch_check($async_job_id) {
            $endpoint = "https://api.dropboxapi.com/2/files/delete_batch/check";
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
        
        /**
        * deletes a file or folder at a given path
        * 
        */
        public function delete($path) {
            $endpoint = "https://api.dropboxapi.com/2/files/delete_v2";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path ));
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
        
        /**
        * Returns the metadata for a file or folder
        */
        public function get_metadata($path, $include_media_info = FALSE, $include_deleted = FALSE, $include_has_explicit_shared_members = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/files/get_metadata";
            $headers = array(
                "Content-Type: application/json",
            );
            $postdata = json_encode(array( "path" => $path, "include_media_info" => $include_media_info, "include_deleted" => $include_deleted, "include_has_explicit_shared_members" => $include_has_explicit_shared_members));
            $returnData = postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * gets a preview for a file
        * $path: the dropbox path, id:, rev:, of a file
        * $target: where the file is being downloaded to
        */
        public function get_preview($path, $target) {
            $endpoint = "https://content.dropboxapi.com/2/files/get_preview";
            $headers = array(
                "Dropbox-API-Arg: {\"path\": \"$path\"}"
            );
            $returnData = postRequest($endpoint, $headers, '', FALSE);
            // check for errors
            $eData = json_decode($returnData, true);
            if (isset($eData["error"])) {
                return $eData["error_summary"];
            }
            else {
                $file = fopen($target, 'w');
                fwrite($file, $data);
                fclose($file);
            }
        }
        
        /**
        * gets a termporary link to stream content of a file
        * the link expires in 4 hours, after which it will return 410 GONE
        */
        public function get_temporary_link($path) {
            $endpoint = "https://api.dropboxapi.com/2/files/get_temporary_link";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path ));
            $returnData = postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * gets the thumbnail for an image
        * $format: jpeg or png
        * $size: default w64h64
        */
        public function get_preview($path, $target, $format = 'jpeg', $size = 'w64h64') {
            $endpoint = "https://content.dropboxapi.com/2/files/get_thumbnail";
            $headers = array(
                "Dropbox-API-Arg: {\"path\": \"$path\", \"format\": \"$format\", \"size\": \"$size\"}"
            );
            $returnData = postRequest($endpoint, $headers, '', FALSE);
            // check for errors
            $eData = json_decode($returnData, true);
            if (isset($eData["error"])) {
                return $eData["error_summary"];
            }
            else {
                $file = fopen($target, 'w');
                fwrite($file, $data);
                fclose($file);
            }
        }
        
        /**
        * gets the contents of a folder
        */
        public function list_folder($path, $recursive = FALSE, $include_media_info = FALSE, $include_has_explicit_shared_members = FALSE) {
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
        
        /**
        * continue listing the contents of a folder given a cursor from list_folder or
        *     a previous call of list_folder_continue
        */
        public function list_folder_continue($cursor) {
            $endpoint = "https://api.dropboxapi.com/2/files/list_folder/continue";
            $headers = array(
                "Content-Type: application/json",
            );
            $postdata = json_encode(array( "cursor" => $cursor));
            $returnData = postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * gets the latest cursor for a folder
        */
        public function list_folder($path, $recursive = FALSE, $include_media_info = FALSE, $include_deleted = FALSE, $include_has_explicit_shared_members = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/files/list_folder/get_latest_cursor";
            $headers = array(
                "Content-Type: application/json",
            );
            $postdata = json_encode(array( "path" => $path, "recursive" => $recursive, "include_media_info" => $include_media_info, "include_deleted" => $include_deleted, "include_has_explicit_shared_members" => $include_has_explicit_shared_members));
            $returnData = postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * A longpoll endpoint to wait for changes on an account. 
        * In conjunction with list_folder/continue, this call gives you a low-latency way to monitor an account for file changes.
        * The connection will block until there are changes available or a timeout occurs. This endpoint is useful mostly for client-side apps.
        */
        public function list_folder_longpoll($cursor, $timeout = 30) {
            $endpoint = "https://notify.dropboxapi.com/2/files/list_folder/longpoll";
            $headers = array(
                "Content-Type: application/json",
            );
            $postdata = json_encode(array( "cursor" => $cursor, "timeout" => $timeout));
            $returnData = postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * returns the revisions of a file
        */
        public function list_revisions($path, $limit = 10) {
            $endpoint = "https://api.dropboxapi.com/2/files/list_revisions";
            $headers = array(
                "Content-Type: application/json",
            );
            $postdata = json_encode(array( "path" => $path, "limit" => $limit));
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
        
        // ***       *      ***   ****  ***
        // *  *     * *     *  *  *     *  *
        // ***     *****    ***   ***   ***
        // *      *     *   *     *     *  *
        // *     *       *  *     ****  *   *
        
        
        
        
        //  ****  *   *      *      ***    *****  *   *   ***
        // *      *   *     * *     *  *     *    **  *  *
        //  ***   *****    *****    ***      *    * * *  *  **
        //     *  *   *   *     *   *  *     *    *  **  *   *
        // ****   *   *  *       *  *   *  *****  *   *   ***
        
        
        
        
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
        
        
        // *   *  *****   ****   ****
        // ** **    *    *      *
        // * * *    *     ***   *
        // *   *    *        *  *      
        // *   *  *****  ****    ****  *
        
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
    }

?>