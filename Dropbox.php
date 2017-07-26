<?php
    class Dropbox {
        private $token;
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
        
        public function listFilesInFolder($path, $recursive = FALSE, $include_media_info = FALSE, $include_has_explicit_shared_members = FALSE) {
            /*
            curl -X POST https://api.dropboxapi.com/2/files/list_folder \
    --header "Authorization: Bearer <get access token>" \
    --header "Content-Type: application/json" \
    --data "{\"path\": \"/Homework/math\",\"recursive\": false,\"include_media_info\": false,\"include_deleted\": false,\"include_has_explicit_shared_members\": false}"
            */
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