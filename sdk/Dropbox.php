<?php
    class Dropbox {
        private $token;
        
        include 'Auth.php'
        include 'Files.php';
        include 'Paper.php';
        include 'Misc.php';
        include 'Sharing.php';
        include 'Users.php';
        
        use Dropbox;
        
        public function __construct($accesstoken) {
            $this->token = $accesstoken;
        }
        
        public static function postRequest($endpoint, $headers, $data, $json = TRUE) {
            $ch = curl_init($endpoint);
            array_push($headers, "Authorization: Bearer $this->token");
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $r = curl_exec($ch);
            curl_close($ch);
            if ($json)
                return $json_decode($r, true);
            else
                return $r;
        }
    }

?>