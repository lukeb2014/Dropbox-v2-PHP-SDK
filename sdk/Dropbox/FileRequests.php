<?php
    namespace Dropbox\Dropbox;
    
    use Dropbox\Dropbox;

    class FileRequests {        
        // ****  *****  *     ****        ***    ****   ***    *   *  ****   ****  *****   **** 
        // *       *    *     *           *  *   *     *   *   *   *  *     *        *    *     
        // ***     *    *     ***         ***    ***   *   *   *   *  ***    ***     *     ***  
        // *       *    *     *           *  *   *     *   *   *   *  *         *    *        * 
        // *     *****  ****  ****        *   *  ****   *** *   ***   ****  ****     *    ****  
        
        
        /*
        * Creates a file request for this user
        * @param $deadline: the deadline for the file request. type FileRequestDeadline with values deadline and allow_late_uploads
        */
        public function create($title, $destination, $deadline = "", $open = TRUE) {
            $endpoint = "https://api.dropboxapi.com/2/file_requests/create";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "title" => $title, "destination" => $destination, "deadline" => "$deadline", "open" => $open ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * returns the specified file request
        */
        public function get($id) {
            $endpoint = "https://api.dropboxapi.com/2/file_requests/get";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "id" => $id ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * Returns a list of file requests owned by this user.
        */
        public function llist() {
            $endpoint = "https://api.dropboxapi.com/2/file_requests/list";
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
        * Update a file request
        * @param $deadline: the deadline for the file request. type UpdateFileRequestDeadline, either .tag: "no_update" or a tag of update with a FileRequestDeadline
        */
        public function update($id, $title = "", $destination = "", $deadline = array(".tag" => "no_update"), $open = TRUE) {
            $endpoint = "https://api.dropboxapi.com/2/file_requests/create";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "id" => $id, "title" => $title, "destination" => $destination, "deadline" => "$deadline", "open" => $open ));
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