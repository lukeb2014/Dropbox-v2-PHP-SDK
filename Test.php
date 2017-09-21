<?php
    require 'vendor/autoload.php';
    $dropbox = new Dropbox('API_TOKEN');
    echo Dropbox\Files->getMetadata('/something.txt');
?>