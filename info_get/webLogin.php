<?php
set_time_limit(0);
date_default_timezone_set('UTC');

require __DIR__.'/vendor/autoload.php';

$proxy_ip = $argv[1];
$username = $argv[2];
$password = $argv[3];

$debug = false;			//false;
$truncatedDebug = false; 
//debug
//echo '|$proxy ip=' . $proxy_ip;
//echo '$username=' . $username;
//echo '|$password=' . $password;

$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);
try {
    $ig->setVerifySSL(false);
    #$ig->setProxy("http://herren:HgKbeaPw93nK95YBFnF4k8UBmzu@" . $proxy);
    $loginResponse = $ig->login($username, $password);
	
	// debugging code
	//echo 'webLogin.php -> $loginResponse=' . $loginResponse;
} catch (\Exception $e) {
	echo $e->getMessage() . "\n";
    echo 'error_message: '.base64_encode($e->getMessage())."\n";
}

$csrftoken = json_decode($ig->web->sendPreLogin(), true)['config']['csrf_token'];
$ig->web->login($username, $password, $csrftoken);
$ig->client->saveCookieJar();
$json = $ig->client->getCookieJarAsJSON();
echo base64_encode($json);