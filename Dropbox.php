<?php
    class Dropbox {
        private $token;
        public function download($path, $target) {
            /*curl -X POST https://content.dropboxapi.com/2/files/download \
                --header "Authorization: Bearer <get access token>" \
                --header "Dropbox-API-Arg: {\"path\": \"/Homework/math/Prime_Numbers.txt\"}"*/
            $ch = curl_init("https://content.dropboxapi.com/2/files/download");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            $headers = array(
                "Content-Type: ",
                "Dropbox-API-Arg: {\"path\": \"$path\"}",
                "Authorization: Bearer $this->token"
            );
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $data = curl_exec($ch);
            $file = fopen($target, 'w');
            fwrite($file, $data);
            fclose($file);
            curl_close($ch);
        }
        
        /*
        * @parameter $mode: "add", "update", "overwrite"
        */
        public function upload($target_path, $file_path, $mode = "add") {
            /*curl -X POST https://content.dropboxapi.com/2/files/upload \
            --header "Authorization: Bearer <get access token>" \
            --header "Dropbox-API-Arg: {\"path\": \"/Homework/math/Matrices.txt\",\"mode\": \"add\",\"autorename\": true,\"mute\": false}" \
            --header "Content-Type: application/octet-stream" \
            --data-binary @local_file.txt*/
            $ch = curl_init("https://content.dropboxapi.com/2/files/upload");
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $headers = array(
                "Content-Type: application/octet-stream",
                "Dropbox-API-Arg: {\"path\": \"$target_path\", \"mode\": \"$mode\"}",
                "Authorization: Bearer $this->token"                
            );
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, file_get_contents($file_path));
            
            $data = curl_exec($ch);
            $returnData = json_decode($data, true);
            if ($returnData["error"] !== null) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData["path_display"];
            }
        }
        
        public function delete($path) {
            //curl -X POST https://api.dropboxapi.com/2/files/delete \
                    //--header "Authorization: Bearer <get access token>" \
                    //--header "Content-Type: application/json" \
                    //--data "{\"path\": \"/Homework/math/Prime_Numbers.txt\"}"
            $ch = curl_init("https://api.dropboxapi.com/2/files/delete");
            $headers = array(
                "Content-Type: application/json",
                "Authorization: Bearer $this->token"
            );
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array( "path" => $path )));
            $returnData = curl_exec($ch);
            curl_close($ch);
            return $returnData;
        }
        
        public function isValidPath($path) {
            $ch = curl_init("https://api.dropboxapi.com/2/files/get_metadata");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $headers = array(
                "Content-Type: application/json",
                "Authorization: Bearer $this->token"
            );
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array( "path" => $path, "include_media_info" => FALSE, "include_deleted" => FALSE, "include_has_explicit_shared_members" => false)));
            $returnData = curl_exec($ch);
            $returnData = json_decode($returnData, true);
            curl_close($ch);
            if ($returnData["error"] !== null) {
                return FALSE;
            }
            else {
                return TRUE;
            }
        }
        
        public function createSharedLinkWithSettings($path) {
            $ch = curl_init("https://api.dropboxapi.com/2/sharing/create_shared_link_with_settings");
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $headers = array(
                "Content-Type: application/json",
                "Dropbox-API-Arg: {\"path\": \"$target_path\", \"mode\": \"$mode\"}",
                "Authorization: Bearer $this->token"                
            );
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array( "path" => $path, "settings" => array( "requested_visibility" => "public"))));
            
            $data = curl_exec($ch);
            curl_close($ch);
            $returnData = json_decode($data, true);
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
        
        private function postRequest($endpoint, $headers, $data) {
            $ch = curl_init($endpoint);
            array_push($headers, "Authorization: Bearer $this->token");
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $r = curl_exec($ch);
            curl_close($ch);
            return $json_decode($r, true);
        }
    }

?>