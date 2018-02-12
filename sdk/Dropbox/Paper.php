<?php
    namespace Dropbox\Dropbox;
    
    use Dropbox\Dropbox;

    class Paper {
        // ***       *      ***   ****  ***
        // *  *     * *     *  *  *     *  *
        // ***     *****    ***   ***   ***
        // *      *     *   *     *     *  *
        // *     *       *  *     ****  *   *
        
        /*
        * marks the given Paper doc as archived
        */
        public function archive($doc_id) {
            $endpoint = "https://api.dropboxapi.com/2/docs/archive";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "doc_id" => $doc_id ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        /*
        * creates a new Paper doc with the provided content.
        * $import_format: 'plain_text', 'html' or 'markdown'
        * $parent_folder_id: The Paper folder ID where the Paper document should be created. The API user has to have write access to this folder or error is thrown. This field is optional.
        */
        public function create($import_format, $file_path, $parent_folder_id = null) {
            $endpoint = "https://api.dropboxapi.com/2/docs/create";
            $Dropbox_API_Arg = "";
            if ($parent_folder_id == null) {
                $Dropbox_API_Arg = "{\"import_format\": $import_format}";
            }
            else {
                $Dropbox_API_Arg = "{\"import_format\": $import_format, \"parent_folder_id\": $parent_folder_id}";
            }
            $headers = array(
                "Content-Type: application/octet-stream",
                "Dropbox-API-Arg: $Dropbox_API_Arg"
            );
            $postdata = file_get_contents($file_path);
            
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * Exports and downloads Paper doc either as HTML or markdown
        * $export_format: either 'html' or 'markdown'
        */
        public function download($doc_id, $export_format) {
            $endpoint = "https://api.dropboxapi.com/2/docs/download";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "doc_id" => $doc_id, "export_format" => $export_format ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * Lists the users who are explicitly invited to the Paper folder in which the Paper doc is contained. For private folders all users (including owner)
        * shared on the folder are listed and for team folders all non-team users shared on the folder are returned.
        */
        public function folder_users_list($doc_id, $limit = 1000) {
            $endpoint = "https//api.dropboxapi.com/2/docs/folder_users/list";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "doc_id" => $doc_id, "limit" => $limit));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * Once a cursor has been retrieved from docs/folder_users/list, use this to paginate through all users on the Paper folder.
        */
        public function folder_users_list_continue($doc_id, $cursor) {
            $endpoint = "https//api.dropboxapi.com/2/docs/folder_users/list/continue";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "doc_id" => $doc_id, "cursor" => $cursor));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * Retrieves folder information for the given Paper doc.
        */
        public function get_folder_info($doc_id) {
            $endpoint = "https://api.dropboxapi.com/2/paper/docs/get_folder_info";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "doc_id" => $doc_id));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * Returns the list of all Paper docs according to the argument specifications.
        */
        public function llist($filter_by = "docs_accessed", $sort_by = "accessed", $sort_order = "ascending", $limit = 1000) {
            $endpoint = "https//api.dropboxapi.com/2/docs/list";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "filter_by" => $filter_by, "sort_by" => $sort_by, "sort_order" => $sort_order, "limit" => $limit));
            return Dropbox::postRequest($endpoint, $headers, $postdata);
        }
        
        public function list_continue($cursor) {
            $endpoint = "https//api.dropboxapi.com/2/docs/list/continue";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "cursor" => $cursor));
            $returnData =  Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * permanently deletes the given Paper doc.
        */
        public function permanently_delete($doc_id) {
            $endpoint = "https//api.dropboxapi.com/2/docs/permanently_delete";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "doc_id" => $doc_id));
            $returnData =  Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * returns the default sharing policy for the given Paper doc
        */
        public function sharing_policy_get($doc_id) {
            $endpoint = "https//api.dropboxapi.com/2/docs/sharing_policy/get";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "doc_id" => $doc_id));
            $returnData =  Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * Sets the default sharing policy for the given Paper doc. The default
        * 'team_sharing_policy' can be changed only by teams, omit this field for personal accounts.
        *
        * Note: 'public_sharing_policy' cannot be set to the value 'disabled'
        * because this setting can be changed only via the team admin console.
        */
        public function sharing_policy_set($doc_id, $public_sharing_policy, $team_sharing_policy = "") {
            $endpoint = "https//api.dropboxapi.com/2/docs/sharing_policy/set";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "doc_id" => $doc_id, "sharing_policy" => array( "public_sharing_policy" => $public_sharing_policy, "team_sharing_policy" => $team_sharing_policy)));
            $returnData =  Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * updates an existing Paper doc with the provided content
        */
        public function update($doc_id, $doc_update_policy, $revision, $import_format) {
            $endpoint = "https//api.dropboxapi.com/2/docs/update";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "doc_id" => $doc_id, "doc_update_policy" => $doc_update_policy, "revision" => $revision, "import_format" => $import_format));
            $returnData =  Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * Allows an owner or editor to add users to a Paper doc or change their
        * permissions using their email address or Dropbox account ID.
        * please read the documentation for the $members format
        */
        public function users_add($doc_id, $members, $quiet = false, $custom_message = null) {
            $endpoint = "https//api.dropboxapi.com/2/docs/users/add";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "doc_id" => $doc_id, "members" => $members, "quiet" => $quiet));
            if (is_null($custom_message) == FALSE) {
                array_push($postdata, $custom_message);
            }
            $returnData =  Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * lists all users who visited the Paper doc or users with explicit access.
        */
        public function users_list($doc_id, $limit = 1000, $filter_by = "shared") {
            $endpoint = "https//api.dropboxapi.com/2/docs/users/list";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "doc_id" => $doc_id, "limit" => $limit, "filter_by" => $filter_by));
            $returnData =  Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function users_list_continue($doc_id, $cursor) {
            $endpoint = "https//api.dropboxapi.com/2/docs/users/list/continue";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "doc_id" => $doc_id, "cursor" => $cursor));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * Allows an owner or editor to remove users from a Paper doc using their email address or Dropbox account ID.
        */
        public function users_remove($doc_id, $member) {
            $endpoint = "https//api.dropboxapi.com/2/docs/users/remove";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "doc_id" => $doc_id, "member" => $member));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        
        public function __construct() {
        }
    }

?>