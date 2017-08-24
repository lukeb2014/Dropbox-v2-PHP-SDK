<?php
    
    include 'Dropbox.php';
    include 'Misc.php';

    class Sharing {
        private $token;
        
        //  ****  *   *      *      ***    *****  *   *   ***
        // *      *   *     * *     *  *     *    **  *  *
        //  ***   *****    *****    ***      *    * * *  *  **
        //     *  *   *   *     *   *  *     *    *  **  *   *
        // ****   *   *  *       *  *   *  *****  *   *   *** 
        
        
        /*
        * adds specified members to a file
        */
        public function add_file_member($file, $members, $quiet = FALSE, $access_level = "viewer", $add_message_as_comment = FALSE, $custom_message = null) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/add_file_member";
            $headers = array(
                "Content-Type: application/json"
            );
            $postarray = array( "file" => $file, "members" => $members, "quiet" = $quiet, "access_level" = $access_level, "add_mesage_as_comment" => $add_message_as_comment );
            if (is_null($custom_message) == FALSE)
                array_push($postarray, "custom_message" => $custom_message);
            $postdata = json_encode($postarray);
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData["url"];
            }
        }
        
        /*
        * adds specified members to a folder
        */
        public function add_folder_member($file, $members, $quiet = FALSE, $custom_message = null) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/add_folder_member";
            $headers = array(
                "Content-Type: application/json"
            );
            $postarray = array( "file" => $file, "members" => $members, "quiet" = $quiet );
            if (is_null($custom_message) == FALSE)
                array_push($postarray, "custom_message" => $custom_message);
            $postdata = json_encode($postarray);
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData["url"];
            }
        }
        
        public function change_file_member_access($file, $member, $access_level) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/change_file_member_access";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "file" => $file, "members" => $member, "access_level" => $access_level ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData["url"];
            }
        }
        
        
        
        public function createSharedLinkWithSettings($path) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/create_shared_link_with_settings";
            $headers = array(
                "Content-Type: application/json",
                "Dropbox-API-Arg: {\"path\": \"$target_path\", \"mode\": \"$mode\"}"
            );
            $postdata = json_encode(array( "path" => $path, "settings" => array( "requested_visibility" => "public")));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
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
        
    }

?>