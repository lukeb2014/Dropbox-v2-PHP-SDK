<?php
    namespace Dropbox\Dropbox;
    
    use Dropbox\Dropbox;

    class Auth {
        public function __construct() {
        }
        
        //     *      *   *  *****  *   *
        //    * *     *   *    *    *   *
        //   *****    *   *    *    *****
        //  *     *   *   *    *    *   *
        // *       *   ***     *    *   *
        
        /*
        * Generates a new access token based on an oauth1 token, secret, app key, and app secret
        * You can use $dropbox->updateAccessToken($token) to update the SDK with your new token
        */
        public function from_oauth1($oauth1_token, $oauth1_token_secret, $app_key, $app_secret) {
            $endpoint = "https://api.dropboxapi.com/2/token/from_oauth1";
            $postdata = json_encode(array( "oauth1_token" => $oauth1_token, "oauth1_token_secret" => $oauth1_token_secret ));
            $returnData = Dropbox::oauth1Request($endpoint, $postdata, $app_key, $app_secret);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData["oauth2_token"];
            }
        }
        
        /*
        * Revokes an access token
        */
        public function revoke() {
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
