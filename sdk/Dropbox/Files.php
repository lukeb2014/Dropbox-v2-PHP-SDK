<?php
    namespace Dropbox\Dropbox;
    
    use Dropbox\Entry;
    use Dropbox\Dropbox;

    class Files {        
        // ****  *****  *     ****   ****
        // *       *    *     *     *    
        // ***     *    *     ***    *** 
        // *       *    *     *         *
        // *     *****  ****  ****  ***  
        
        /**
        * Copies a file from one location to another
        * 
        */
        public function copy($from_path, $to_path, $allow_shared_folder = FALSE, $autorename = FALSE, $allow_ownership_transfer = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/files/copy";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "from_path" => $from_path, "to_path" => $to_path, "allow_shared_folder" => $allow_shared_folder, "autorename" => $autorename, "allow_ownership_transfer" => $allow_ownership_transfer));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * Copies a list of entries between paths
        * $entries contains a list of RelocationPath objects (objects with a "from_path" value and a "to_path" value)
        * returns either completed response data or an async_job_id if the processing is asynchronous
        */
        public function copy_batch($entries, $allow_shared_folder = FALSE, $autorename = FALSE, $allow_ownership_transfer = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/files/copy_batch";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "entries" => $entries, "allow_shared_folder" => $allow_shared_folder, "autorename" => $autorename, "allow_ownership_transfer" => $allow_ownership_transfer));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * Checks the progress of an asynchronous copy_batch operation
        *
        */
        public function copy_batch_check($async_job_id) {
            $endpoint = "https://api.dropboxapi.com/2/files/copy_batch/check";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "async_job_id" => $async_job_id ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * Get a copy reference to a file or folder.
        * This reference string can be used to save that file or folder to another user's Dropbox by passing it to copy_reference/save
        */
        public function copy_reference_get($path) {
            $endpoint = "https://api.dropboxapi.com/2/files/copy_reference/get";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * Save a copy reference returned by copy_reference/get to the user's Dropbox
        */
        public function copy_reference_save($path, $copy_reference) {
            $endpoint = "https://api.dropboxapi.com/2/files/copy_reference/save";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "copy_reference" => $copy_reference, "path" => $path ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * Copies a file from one location to another
        * 
        */
        public function copy_v2($from_path, $to_path, $allow_shared_folder = FALSE, $autorename = FALSE, $allow_ownership_transfer = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/files/copy_v2";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "from_path" => $from_path, "to_path" => $to_path, "allow_shared_folder" => $allow_shared_folder, "autorename" => $autorename, "allow_ownership_transfer" => $allow_ownership_transfer));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * creates a folder at a given path
        * DEPRECATED BY create_folder_v2
        */
        public function create_folder($path, $autorename = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/files/create_folder";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path, "autorename" => $autorename ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * creates a folder at a given path
        */
        public function create_folder_v2($path, $autorename = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/files/create_folder_v2";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path, "autorename" => $autorename ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * deletes a file or folder at a given path
        * DEPRECATED by delete_v2
        */
        public function delete($path) {
            $endpoint = "https://api.dropboxapi.com/2/files/delete";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        
        /**
        * deletes files and/or folders in $entries
        * $entries contains a list of a single value "path"
        */
        public function delete_batch($entries) {
            $endpoint = "https://api.dropboxapi.com/2/files/delete_batch";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "entries" => $entries ));
            return Dropbox::postRequest($endpoint, $headers, $postdata);
        }
        
        
        /**
        * Checks the progress of an asynchronous delete_batch operation
        *
        */
        public function delete_batch_check($async_job_id) {
            $endpoint = "https://api.dropboxapi.com/2/files/delete_batch/check";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "async_job_id" => $async_job_id ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * deletes a file or folder at a given path
        * 
        */
        public function delete_v2($path) {
            $endpoint = "https://api.dropboxapi.com/2/files/delete_v2";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * downloads a file to the given path
        * pass false to $target to return rawdata
        */
        public function download($path, $target) {
            $endpoint = "https://content.dropboxapi.com/2/files/download";
            $headers = array(
                "Content-Type: ",
                "Dropbox-API-Arg: {\"path\": \"$path\"}"
            );
            $returnData = Dropbox::postRequest($endpoint, $headers, '', FALSE);
            if ($target !== false) {
                $file = fopen($target, 'w');
                fwrite($file, $returnData);
                fclose($file);
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * Returns the metadata for a file or folder
        */
        public function get_metadata($path, $include_media_info = FALSE, $include_deleted = FALSE, $include_has_explicit_shared_members = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/files/get_metadata";
            $headers = array(
                "Content-Type: application/json",
            );
            $postdata = json_encode(array( "path" => $path, "include_media_info" => $include_media_info, "include_deleted" => $include_deleted, "include_has_explicit_shared_members" => $include_has_explicit_shared_members));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * gets a preview for a file
        * $path: the dropbox path, id:, rev:, of a file
        * $target: where the file is being downloaded to
        */
        public function get_preview($path, $target) {
            $endpoint = "https://content.dropboxapi.com/2/files/get_preview";
            $headers = array(
                "Dropbox-API-Arg: {\"path\": \"$path\"}"
            );
            $returnData = Dropbox::postRequest($endpoint, $headers, '', FALSE);
            // check for errors
            $eData = json_decode($returnData, true);
            if (isset($eData["error"])) {
                return $eData["error_summary"];
            }
            else {
                $file = fopen($target, 'w');
                fwrite($file, $returnData);
                fclose($file);
            }
        }
        
        /**
        * gets a termporary link to stream content of a file
        * the link expires in 4 hours, after which it will return 410 GONE
        */
        public function get_temporary_link($path) {
            $endpoint = "https://api.dropboxapi.com/2/files/get_temporary_link";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * gets the thumbnail for an image
        * $format: jpeg or png
        * $size: default w64h64
        */
        public function get_thumbnail($path, $target, $format = 'jpeg', $size = 'w64h64') {
            $endpoint = "https://content.dropboxapi.com/2/files/get_thumbnail";
            
            $headers = array(
                "Content-Type: application/octet-stream",
                "Dropbox-API-Arg: {\"path\": \"$path\", \"format\": \"$format\", \"size\": \"$size\"}"
            );
            
            $returnData = Dropbox::postRequest($endpoint, $headers, '', FALSE);

            // Check for Errors

            $eData = json_decode($returnData, true);

            if (isset($eData["error"])) {
                return $eData["error_summary"];
            }
            else {
                $file = fopen($target, 'w');
                fwrite($file, $returnData);
                fclose($file);
            }
        }

        public function getThumbnailSize($size)
        {
            $thumbnailSizes = array(
                'thumb' => 'w32h32',
                'small' => 'w64h64',
                'medium' => 'w128h128',
                'large' => 'w640h480',
                'huge' => 'w1024h768'
            );
            return isset($thumbnailSizes[$size]) ? $thumbnailSizes[$size] : $thumbnailSizes['small'];
        }

        public function getContents($file)
        {
            return $file->contents;
        }
        
        /**
        * gets the contents of a folder
        */
        public function list_folder($path, $recursive = FALSE, $include_media_info = FALSE, $include_has_explicit_shared_members = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/files/list_folder";
            $headers = array(
                "Content-Type: application/json",
            );
            $postdata = json_encode(array( "path" => $path, "recursive" => $recursive, "include_media_info" => $include_media_info, "include_has_explicit_shared_members" => $include_has_explicit_shared_members));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * continue listing the contents of a folder given a cursor from list_folder or
        *     a previous call of list_folder_continue
        */
        public function list_folder_continue($cursor) {
            $endpoint = "https://api.dropboxapi.com/2/files/list_folder/continue";
            $headers = array(
                "Content-Type: application/json",
            );
            $postdata = json_encode(array( "cursor" => $cursor));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * gets the latest cursor for a folder
        */
        public function get_latest_cursor($path, $recursive = FALSE, $include_media_info = FALSE, $include_deleted = FALSE, $include_has_explicit_shared_members = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/files/list_folder/get_latest_cursor";
            $headers = array(
                "Content-Type: application/json",
            );
            $postdata = json_encode(array( "path" => $path, "recursive" => $recursive, "include_media_info" => $include_media_info, "include_deleted" => $include_deleted, "include_has_explicit_shared_members" => $include_has_explicit_shared_members));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * A longpoll endpoint to wait for changes on an account. 
        * In conjunction with list_folder/continue, this call gives you a low-latency way to monitor an account for file changes.
        * The connection will block until there are changes available or a timeout occurs. This endpoint is useful mostly for client-side apps.
        */
        public function list_folder_longpoll($cursor, $timeout = 30) {
            $endpoint = "https://notify.dropboxapi.com/2/files/list_folder/longpoll";
            $headers = array(
                "Content-Type: application/json",
            );
            $postdata = json_encode(array( "cursor" => $cursor, "timeout" => $timeout));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * returns the revisions of a file
        */
        public function list_revisions($path, $limit = 10) {
            $endpoint = "https://api.dropboxapi.com/2/files/list_revisions";
            $headers = array(
                "Content-Type: application/json",
            );
            $postdata = json_encode(array( "path" => $path, "limit" => $limit));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * moves a file from one location to another
        * DEPRECATED by move_v2
        */
        public function move($from_path, $to_path, $allow_shared_folder = FALSE, $autorename = FALSE, $allow_ownership_transfer = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/files/move";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "from_path" => $from_path, "to_path" => $to_path, "allow_shared_folder" => $allow_shared_folder, "autorename" => $autorename, "allow_ownership_transfer" => $allow_ownership_transfer));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * moves a list of entries between paths
        * $entries contains a list of RelocationPath objects (objects with a "from_path" value and a "to_path" value)
        * returns either completed response data or an async_job_id if the processing is asynchronous
        */
        public function move_batch($entries, $allow_shared_folder = FALSE, $autorename = FALSE, $allow_ownership_transfer = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/files/move_batch";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "entries" => $entries, "allow_shared_folder" => $allow_shared_folder, "autorename" => $autorename, "allow_ownership_transfer" => $allow_ownership_transfer));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * Checks the progress of an asynchronous move_batch operation
        *
        */
        public function move_batch_check($async_job_id) {
            $endpoint = "https://api.dropboxapi.com/2/files/move_batch/check";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "async_job_id" => $async_job_id ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * moves a file from one location to another
        */
        public function move_v2($from_path, $to_path, $allow_shared_folder = FALSE, $autorename = FALSE, $allow_ownership_transfer = FALSE) {
            $endpoint = "https://api.dropboxapi.com/2/files/move_v2";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "from_path" => $from_path, "to_path" => $to_path, "allow_shared_folder" => $allow_shared_folder, "autorename" => $autorename, "allow_ownership_transfer" => $allow_ownership_transfer));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * permanently deletes a file or folder
        * Note: this endpoint is only available for Dropbox Business apps
        */
        public function permanently_delete($path) {
            $endpoint = "https://api.dropboxapi.com/2/files/permanently_delete";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * restore a file to a specific revision
        */
        public function restore($path, $rev) {
            $endpoint = "https://api.dropboxapi.com/2/files/restore";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path, "rev" => $rev));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * saves a specified URL into a file in user's Dropbox
        */
        public function save_url($path, $url) {
            $endpoint = "https://api.dropboxapi.com/2/files/save_url";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path, "url" => $url));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * Checks the progress of an asynchronous save_url operation
        */
        public function save_url_check_job_status($async_job_id) {
            $endpoint = "https://api.dropboxapi.com/2/files/save_url/check_job_status";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "async_job_id" => $async_job_id ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * searches for files and folders
        * $query, the string to search for
        * $start, starting index (default 0)
        * $max_results, maximum number of results (default 100)
        * $mode, SearchMode 'filename', 'filename_and_content', 'deleted_filename' (default filename)
        */
        public function search($path, $query, $start = 0, $max_results = 100, $mode = "filename") {
            $endpoint = "https://api.dropboxapi.com/2/files/search";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "path" => $path, "query" => $query, "start" => $start, "max_results" => $max_results, "mode" => $mode));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * $file_data can be either raw string data or a path to a file
        * @parameter $mode: "add", "update", "overwrite"
        */
        public function upload($target_path, $file_data, $mode = "add") {
            $endpoint = "https://content.dropboxapi.com/2/files/upload";
            $headers = array(
                "Content-Type: application/octet-stream",
                "Dropbox-API-Arg: {\"path\": \"$target_path\", \"mode\": \"$mode\"}"       
            );
            $postdata = "";
            if (file_exists($file_data))
                $postdata = file_get_contents($file_data);
            else
                $postdata = $file_data;
            
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData["path_display"];
            }
        }
        
        /**
        * append more data to an upload session.
        * a single request should not upload more than 150 MB.
        * DEPRECATED by upload_session/append_v2
        */
        public function upload_session_append($session_id, $offset, $file_path) {
            $endpoint = "https://content.dropboxapi.com/2/files/upload_session/append";
            $headers = array(
                "Content-Type: application/octet-stream",
                "Dropbox-API-Arg: {\"session_id\": \"$session_id\", \"offset\": \"$offset\"}"       
            );
            $postdata = file_get_contents($file_path);
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return true;
            }
        }
        
        /**
        * append more data to an upload session.
        * a single request should not upload more than 150 MB.
        */
        public function upload_session_append_v2($session_id, $offset, $file_path, $close = FALSE) {
            $endpoint = "https://content.dropboxapi.com/2/files/upload_session/append_v2";
            $headers = array(
                "Content-Type: application/octet-stream",
                "Dropbox-API-Arg: {\"cursor\": {\"session_id\": \"$session_id\", \"offset\": \"$offset\"}, \"close\": $close}"
            );
            $postdata = file_get_contents($file_path);
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return true;
            }
        }
        
        /*
        * Entry must be an instanceof Entry (Dropbox\Entry)
        */
        public function upload_session_finish(Entry $entry) {
            $endpoint = "https://content.dropboxapi.com/2/files/upload_session/finish";
            $headers = array(
                "Content-Type" => 'application/octet-stream',
                "Dropbox-API-Arg" => $entry.toJson()
            );
            $headers = json_encode($headers);
            $postdata = file_get_contents($file_path);
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * Finishes uploading a list of elements
        * $entries contains a list of elements of type 'Entry'
        * returns either completed response data or an async_job_id if the processing is asynchronous
        */
        public function finish_batch($entries) {
            $endpoint = "https://api.dropboxapi.com/2/files/finish_batch";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "entries" => $entries ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /**
        * Checks the progress of an asynchronous finish_batch operation
        */
        public function finish_batch_check($async_job_id) {
            $endpoint = "https://api.dropboxapi.com/2/files/finish_batch/check";
            $headers = array(
                "Content-Type: application/json"
            );
            $postdata = json_encode(array( "async_job_id" => $async_job_id ));
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData;
            }
        }
        
        /*
        * starts an upload session, needed where the size of a file is greater than 150 MB
        * can last up to 48 hours
        */
        public function upload_session_start($file_path, $close = false) {
            $endpoint = "https://content.dropboxapi.com/2/files/upload_session/start";
            $headers = array(
                "Content-Type: application/octet-stream",
                "Dropbox-API-Arg: {\"close\": $close}"
            );
            $postdata = file_get_contents($file_path);
            $returnData = Dropbox::postRequest($endpoint, $headers, $postdata);
            if (isset($returnData["error"])) {
                return $returnData["error_summary"];
            }
            else {
                return $returnData["session_id"];
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
