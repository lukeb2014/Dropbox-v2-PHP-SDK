<?php
    namespace Dropbox;
    
    use Dropbox\Dropbox\Auth;
    use Dropbox\Dropbox\Files;
    use Dropbox\Dropbox\Paper;
    use Dropbox\Dropbox\Misc;
    use Dropbox\Dropbox\Sharing;
    use Dropbox\Dropbox\Users;

    class Dropbox {
        private static $token;
        public $auth;
        public $files;
        public $paper;
        public $misc;
        public $sharing;
        public $users;
        
        public function __construct($accesstoken) {
            self::$token = $accesstoken;
            $this->auth = new Auth();
            $this->files = new Files();
            $this->paper = new Paper();
            $this->misc = new Misc();
            $this->sharing = new Sharing();
            $this->users = new Users();
        }
        
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
        
        public function updateAccessToken($accesstoken) {
            self::$token = $accesstoken;
        }
    }

?>