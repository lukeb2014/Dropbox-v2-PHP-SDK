<?php
    
    include 'Dropbox.php';
    include 'Misc.php';

    class Paper {
        private $token;
        
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
        
        
        public function __construct($accesstoken) {
            $this->token = $accesstoken;
        }
    }

?>