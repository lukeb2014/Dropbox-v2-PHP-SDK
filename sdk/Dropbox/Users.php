<?php
    namespace Dropbox\Dropbox;
    
    use Dropbox\Dropbox;

    class Users {
        // *   *    ****  ****  ***     ****
        // *   *   *      *     *  *   *    
        // *   *    ***   ***   ***     *** 
        // *   *       *  *     *  *       *
        //  ***    ****   ****  *   *  **** 
        
        public function get_account($account_id) {
            $endpoint = "https://api.dropboxapi.com/2/users/get_account";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "account_id" => $account_id ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function get_account_batch($account_ids) {
            $endpoint = "https://api.dropboxapi.com/2/users/get_account/batch";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "account_ids" => $account_ids ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        public function get_current_account() {
            $endpoint = "https://api.dropboxapi.com/2/users/get_current_account";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = "null";
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            return $returnData;
        }
        
        public function get_space_usage() {
            $endpoint = "https://api.dropboxapi.com/2/users/get_space_usage";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = "null";
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            return $returnData;
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