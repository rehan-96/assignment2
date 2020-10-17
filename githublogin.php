<?php
require dirname(__FILE__).'/config.php';
use League\OAuth2\Client\Provider\Github;

$provider = new Github([
    'clientId'          => GITHUB_CLIENT_ID,
    'clientSecret'      => GITHUB_CLIENT_SECRET,
    'redirectUri'       => GITHUB_CLIENT_CALLBACK_URI,
]);


$authUrl = $provider->getAuthorizationUrl();
$_SESSION['oauth2state'] = $provider->getState();

//echo '<pre>';print_r($authUrl);echo '</pre>';exit;
header('Location: '.$authUrl);
exit;