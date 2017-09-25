<?php
    namespace Dropbox\Dropbox;
    
    use Dropbox\Dropbox;

    class Sharing {        
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
            $postarray = array( "file" => $file, "members" => $members, "quiet" => $quiet, "access_level" => $access_level, "add_mesage_as_comment" => $add_message_as_comment );
            if (is_null($custom_message) == FALSE)
                $postarray["custom_message"] = $custom_message;
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
            $postarray = array( "file" => $file, "members" => $members, "quiet" => $quiet );
            if (is_null($custom_message) == FALSE)
                $postarray["custom_message"] = $custom_message;
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
                $data_array["path"] = $path;
            }
            if (is_null($link_password) == FALSE) {
                $data_array["link_password"] = $link_password;
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
                $data_array["link_password"] = $link_password;
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
            $postdata = json_encode(array( "file" => $file, "include_inherited" => $include_inherited, "limit" => $limit, "actions" => $actions ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function list_file_members_batch($files, $limit = 10) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/list_file_members/batch";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "file" => $files, "limit" => $limit ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function list_file_members_continue($cursor) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/list_file_members/continue";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "cursor" => $cursor ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function list_folder_members($shared_folder_id, $limit = 1000, $actions = array()) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/list_folder_members";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "shared_folder_id" => $shared_folder_id, "limit" => $limit, "actions" => $actions));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function list_folder_members_continue($cursor) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/list_folder_members/continue";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "cursor" => $cursor ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function list_folders($limit = 100, $actions = array()) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/list_folders";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "limit" => $limit, "actions" => $actions));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function list_folders_continue($cursor) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/list_folders/continue";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "cursor" => $cursor ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function list_mountable_folders($limit = 100, $actions = array()) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/list_mountable_folders";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "limit" => $limit, "actions" => $actions));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function list_mountable_folders_continue($cursor) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/list_mountable_folders/continue";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "cursor" => $cursor ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function list_received_files($limit = 100, $actions = array()) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/list_received_files";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "limit" => $limit, "actions" => $actions));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function list_received_files_continue($cursor) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/list_received_files/continue";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "cursor" => $cursor ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function list_shared_links($cursor) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/list_shared_links";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "cursor" => $cursor ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function modify_shared_link_settings($url, $settings, $remove_expiration = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/modify_shared_link_settings";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "url" => $url, "settings" => $settings, "remove_expiration" => $remove_expiration ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function mount_folder($shared_folder_id) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/mount_folder";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "shared_folder_id" => $shared_folder_id ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function relinquish_file_membership($file) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/relinquish_file_membership";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "file" => $file ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function relinquish_folder_membership($shared_folder_id, $leave_a_copy = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/relinquish_folder_membership";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "shared_folder_id" => $shared_folder_id, "leave_a_copy" => $leave_a_copy ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * Identical to remove_file_member_2 but with less information returned
        * @param member: contains an email/dropbox_id and/or a tag specifying it
        */        
        public function remove_file_member($file, $member) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/remove_file_member";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "file" => $file, "member" => $member ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * DEPRECATED BY /remove_file_member_2
        * removes a specified member from the file
        * @param member: contains an email/dropbox_id and/or a tag specifying it
        */        
        public function remove_file_member_2($file, $member) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/remove_file_member_2";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "file" => $file, "member" => $member ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * removes a specified member from the folder
        * @param member: contains an email/dropbox_id and/or a tag specifying it
        */        
        public function remove_folder_member($shared_folder_id, $member, $leave_a_copy = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/remove_folder_member";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "shared_folder_id" => $shared_folder_id, "member" => $member, "leave_a_copy" => $leave_a_copy ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function revoke_shared_link($url) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/revoke_shared_link";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "url" => $url ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function share_folder($path, $force_async = FALSE, $acl_update_policy = "editors", $member_policy = "team", $shared_link_policy = "members", $viewer_info_policy = "enabled", $actions = array(), $link_settings = array()) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/share_folder";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path, "force_async" => $force_async, "acl_update_policy" => $acl_update_policy, "member_policy" => $member_policy, "shared_link_policy" => $shared_link_policy, "view_info_policy" => $viewer_info_policy, "actions" => $actions, "link_settings" => $link_settings));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function transfer_folder($shared_folder_id, $to_dropbox_id) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/transfer_folder";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "shared_folder_id" => $shared_folder_id, "to_dropbox_id" => $to_dropbox_id ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function unmount_folder($shared_folder_id) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/unmount_folder";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "shared_folder_id" => $shared_folder_id ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function unshare_file($file) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/unshare_file";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "file" => $file ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function unshare_folder($shared_folder_id, $leave_a_copy = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/unshare_folder";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "shared_folder_id" => $shared_folder_id, "leave_a_copy" => $leave_a_copy ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function update_file_member($file, $member, $access_level) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/update_file_member";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "file" => $file, "member" => $member, "access_level" => $access_level ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function update_folder_member($shared_folder_id, $member, $access_level) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/update_folder_member";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "shared_folder_id" => $shared_folder_id, "member" => $member, "access_level" => $access_level ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function update_folder_policy($shared_folder_id, $member_policy = "team", $acl_update_policy = "owner", $viewer_info_policy = "disabled", $shared_link_policy = "members", $link_settings = array(), $actions = array()) {
            $endpoint = "https://api.dropboxapi.com/2/sharing/update_folder_policy";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "shared_folder_id" => $shared_folder_id, "member_policy" => $member_policy, "acl_update_policy" => $acl_update_policy, "viewer_info_policy" => $viewer_info_policy, "shared_link_policy" => $shared_link_policy, "link_settings" => $link_settings, "actions" => $actions ));
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
        
        public function __construct() {
        }
        
    }

?>