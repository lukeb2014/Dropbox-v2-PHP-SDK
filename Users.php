<?php
    
    include 'Dropbox.php';
    include 'Misc.php';

    class Users {
        private $token;        
        
        // *   *    ****  ****  ***     ****
        // *   *   *      *     *  *   *    
        // *   *    ***   ***   ***     *** 
        // *   *       *  *     *  *       *
        //  ***    ****   ****  *   *  **** 
        
        public function __construct($accesstoken) {
            $this->token = $accesstoken;
        }
    }

?>