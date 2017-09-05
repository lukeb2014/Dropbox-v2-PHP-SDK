<?php
    
    include 'Dropbox.php';
    include 'Misc.php';

    class Auth {
        private $token;
        public function __construct($accesstoken) {
            $this->token = $accesstoken;
        }
        
        //     *      *   *  *****  *   *
        //    * *     *   *    *    *   *
        //   *****    *   *    *    *****
        //  *     *   *   *    *    *   *
        // *       *   ***     *    *   *
        
        public function from_oauth1($oauth1_token, $oauth1_token_secret) {
            $endpoint = "https://api.dropboxapi.com/2/token/from_oauth1";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "oauth1_token" => $oauth1_token, "oauth1_token_secret" => $oauth1_token_secret ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData["oauth2_token"];
            }
        }
        
        public function from_oauth1() {
            $endpoint = "https://api.dropboxapi.com/2/token/revoke";
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
    }

?>