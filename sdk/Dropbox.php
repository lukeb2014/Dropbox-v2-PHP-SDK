<?php
    namespace Dropbox;
    
    use Dropbox\Dropbox\Auth;
    use Dropbox\Dropbox\Files;
    use Dropbox\Dropbox\FileProperties;
    use Dropbox\Dropbox\FileRequests;
    use Dropbox\Dropbox\Paper;
    use Dropbox\Dropbox\Misc;
    use Dropbox\Dropbox\Sharing;
    use Dropbox\Dropbox\Users;

    class Dropbox {
        private static $token;
        public $auth;
        public $files;
        public $file_properties;
        public $file_requests;
        public $paper;
        public $misc;
        public $sharing;
        public $users;
        public $app;
        public $client;
        
        public function __construct($accesstoken) {
            self::$token = $accesstoken;
            $this->auth = new Auth();
            $this->files = new Files();
            $this->file_properties = new FileProperties();
            $this->file_requests = new FileRequests();
            $this->paper = new Paper();
            $this->misc = new Misc();
            $this->sharing = new Sharing();
            $this->users = new Users();
        }
        
        /*
        * Main function for handling post requests.
        */
        public static function postRequest($endpoint, $headers, $data, $json = TRUE) {
            $ch = curl_init($endpoint);
            array_push($headers, "Authorization: Bearer " . self::$token);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $r = curl_exec($ch);
            curl_close($ch);
            
            if ($json)
                return json_decode($r, true);
            else
                return $r;
        }
        
        /*
        * Special case function for handling the from_oauth1 request
        */
        public static function oauth1Request($endpoint, $data, $app_key, $app_secret) {
            $ch = curl_init($endpoint);
            $headers = array("Content-Type: application/json");
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_USERPWD, "$app_key:$app_secret");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $r = curl_exec($ch);
            curl_close($ch);
            return json_decode($r, true);
        }
        
        /*
        * Updates the access token.
        */
        public function updateAccessToken($accesstoken) {
            self::$token = $accesstoken;
        }
    }

?>