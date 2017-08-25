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
                return $returnData;
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
                return $returnData;
            }
        }
        
        /*
        * deprecated by /update_file_member
        */
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
                return $returnData;
            }
        }
        
        /*
        * returns the status of an asynchronous job
        * apps must have full dropbox access to use this endpoint
        */
        public function check_job_status($async_job_id) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/check_job_status";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "async_job_id" => $async_job_id ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }            
        }
        
        /*
        * returns the status of an asynchronous job for sharing a folder.
        */
        public function check_remove_member_job_status($async_job_id) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/check_remove_member_job_status";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "async_job_id" => $async_job_id ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * returns the status of an asynchronous job for sharing a folder
        */
        public function check_share_job_status($async_job_id) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/check_share_job_status";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "async_job_id" => $async_job_id));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * deprecated by create_shared_link_with_settings
        */
        public function create_shared_link($path, $short_url = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/create_shared_link";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path, "short_url" => $short_url));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData["url"];
            }
        }
        
        public function create_shared_link_with_settings($path) {
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
        
        public function get_file_metadata($file, $actions = array()) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/get_file_metadata";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "file" => $file, "actions" => $actions));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function get_file_metadata_bath($files, $actions = array()) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/get_file_metadata/batch";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "files" => $files, "actions" => $actions));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * gets folder metadata
        */
        public function get_folder_metadata($shared_folder_id, $actions = array()) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/get_folder_metadata";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "shared_folder_id" => $shared_folder_id, "actions" => $actions));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * download the shared link's file from a user's Dropbox
        */
        public function get_shared_link_file($url, $path = null, $link_password = null) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/get_file_metadata/batch";
            $data_array = array( "url" => $url);
            if (is_null($path) == FALSE) {
                array_push($data_array, "path => $path");
            }
            if (is_null($link_password) == FALSE) {
                array(push($data_array, "link_password => $link_password"))
            }
            $data_array = json_encode($data_array);
            $headers = array(
                "Content-Type: application/json",
                "Dropbox-API-Arg: { $data_array }"
            );
            $returnData = Dropbox::postRequest($endpoint, $headers, "");
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * gets the shared link's metadata
        */
        public function get_shared_link_metadata($url, $path = null, $link_password = null) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/get_shared_link_metadata";
            $headers = array(
                "Content-Type: application/json"
            );
            $data_array = array("url" => $url);
            if (is_null($path) == FALSE) {
                array_push($data_array, "path => $path");
            }
            if (is_null($link_password) == FALSE) {
                array(push($data_array, "link_password => $link_password"))
            }
            $postdata = json_encode($data_array);
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /* DEPRECATED BY /list_shared_links*/
        public function get_shared_links($path = "") {
            $endpoint = "https://api.dropboxapi.com/2/sharing/list_shared_links";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function list_file_members($file, $include_inherited = true, $limit = 100, $actions = array()) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/list_file_members";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "file" => $file, "include_inherited" => $include_inherited, "limit" => $limit, "actions" = $actions ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
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