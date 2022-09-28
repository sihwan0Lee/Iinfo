


<?php
set_time_limit(0);
date_default_timezone_set('UTC');

require __DIR__.'/vendor/autoload.php';

$username = $argv[1];
$csrf_token = $argv[2];


$debug = false;			//false;
$truncatedDebug = false;

echo '$csrf_token=' . $csrf_token;
echo '|$username=' . $username;
echo '|$debug=' . $debug;
echo '|$truncatedDebug=' . $truncatedDebug;
$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);

try {
    $ig->setVerifySSL(false);
    $getUserInfo = $ig-> web -> getMediaInfo($username, $csrf_token);
} catch (\Exception $e) {
	echo $e->getMessage() . "\n";
    echo 'error_message: '.base64_encode($e->getMessage())."\n";
}