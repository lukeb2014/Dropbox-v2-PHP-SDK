<?php
    require 'vendor/autoload.php';

    $dropbox = new Dropbox\Dropbox('YOUR-DROPBOX-ACCESS-TOKEN');

    $dropbox->files->list_folder('/example_path');
?>