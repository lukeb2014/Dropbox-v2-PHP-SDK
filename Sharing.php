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