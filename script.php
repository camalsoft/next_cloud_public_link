<?php

$username='';
$password='';
$domain='';
$basepath=''; # path on user directory NextCloud

if ($file = fopen("listing.txt", "r")) {
    while(!feof($file)) {
        $line = fgets($file);
        $line = str_replace(' ', '', $line);
        $line = str_replace(PHP_EOL, '', $line);
        $line = str_replace(array("\r\n", "\r", "\n"), '', strip_tags($line));
        $outputCloud = shell_exec('curl -u "'.$username.':'.$password.'" -H "OCS-APIRequest: true" -X POST https://'.$domain.'/ocs/v2.php/apps/files_sharing/api/v1/shares -d path="'.$basepath.'/'.$line.'" -d shareType=3 -d permissions=1');
        $xml = simplexml_load_string($outputCloud);
        $link='https://'.$domain.'/index.php/s/'.$xml->data->token;
        file_put_contents('out.csv', $line.';'.$link.PHP_EOL, FILE_APPEND);
    }
    fclose($file);
}

?>
