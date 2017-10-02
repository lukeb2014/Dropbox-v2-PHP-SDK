<?php
    // Include Composer libraries
    require 'vendor/autoload.php';

    // Initialize Dropbox client
    $dropbox = new Dropbox\Dropbox('YOUR-DROPBOX-ACCESS-TOKEN');

    // Download a file
    $dropbox->files->download('/target/file.txt', '/path-to-download-to/downloadedfile.txt');

    // Upload a file, overwriting if the file already exists in Dropbox
    $dropbox->files->upload('/target/file.txt', '/path-to-upload-from/uploadthisfile.txt', "overwrite");

    // List all the files in a folder
    $dropbox->files->list_folder('/example_path');

    /***Documentation will be added/updated in the future***/
?>