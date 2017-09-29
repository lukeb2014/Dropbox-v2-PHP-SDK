<?php
    namespace Dropbox\Dropbox;
    
    use Dropbox\Dropbox;

    class FileProperties {        
        // ****  *****  *     ****        ***   ***     ***   ***   ****  ***    *****  *****  ****   ****
        // *       *    *     *           *  *  *  *   *   *  *  *  *     *  *     *      *    *     *
        // ***     *    *     ***         ***   ***    *   *  ***   ***   ***      *      *    ***    ***
        // *       *    *     *           *     *  *   *   *  *     *     *  *     *      *    *         *
        // *     *****  ****  ****        *     *   *   ***   *     ****  *   *    *    *****  ****  ****
        
        
        /*
        * Add property groups to a Dropbox file
        * @param $property_groups: list of PropertyGroup with values template_id and fields
        */
        public function add($path, $property_groups) {
            $endpoint = "https://api.dropboxapi.com/2/file_properties/properties/add";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path, "property_groups" => $property_groups ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * Overwrite property groups associated with a file
        */
        public function overwrite($path, $property_groups) {
            $endpoint = "https://api.dropboxapi.com/2/file_properties/properties/overwrite";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path, "property_groups" => $property_groups ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * Remove the specified property group from the file
        */
        public function remove($path, $property_groups) {
            $endpoint = "https://api.dropboxapi.com/2/file_properties/properties/remove";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path, "property_groups" => $property_groups ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * Search across property templates for particular property field values
        */
        public function search($queries, $template_filter) {
            $endpoint = "https://api.dropboxapi.com/2/file_properties/properties/search";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "queries" => $queries, "template_filter" => $template_filter ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * Remove the specified property group from the file
        */
        public function update($path, $update_property_groups) {
            $endpoint = "https://api.dropboxapi.com/2/file_properties/properties/update";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path, "update_property_groups" => $update_property_groups ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * Add a template associated with a user.
        */
        public function templates_add_for_user($name, $description, $fields) {
            $endpoint = "https://api.dropboxapi.com/2/file_properties/templates/add_for_user";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "name" => $name, "description" => $description, "fields" => $fields ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * Get the schema for a specified template
        */
        public function templates_get_for_user($name, $description, $fields) {
            $endpoint = "https://api.dropboxapi.com/2/file_properties/templates/get_for_user";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "name" => $name, "description" => $description, "fields" => $fields ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * Get the template identifiers for a team
        */
        public function templates_list_for_user() {
            $endpoint = "https://api.dropboxapi.com/2/file_properties/templates/list_for_user";
            $headers = array();
            $postdata = json_encode(array());
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * Update a template associated with a user
        * @param $add_fields: a list of PropertyFieldTemplate with values name, description, and type
        */
        public function templates_update_for_user($template_id, $name, $description, $add_fields) {
            $endpoint = "https://api.dropboxapi.com/2/file_properties/templates/update_for_user";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "template_id" => $template_id, "name" => $name, "description" => $description, "add_fields" => $add_fields ));
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