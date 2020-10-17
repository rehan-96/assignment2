
<?php

//start session on web page

ob_start();
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('1045131371485-3b4joq81e4ir2s9nivtuqvf85i6m4o2d.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('o9_ZSc-w4ruKblYf29kQpprF');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost:8080/patient/usertype.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');   



// require dirname(__FILE__).'vendor/autoload.php';


CONST BASE_PATH = "http://localhost:8080/patient/";

/**
 * Database details
 */
const DB_HOST = "localhost";
const DB_USER = "root";
const DB_PASSWORD = "";
const DB_NAME = "pd";




/**
 * Github Client
 */
const GITHUB_CLIENT_ID = "b64990305661116346cb";
const GITHUB_CLIENT_SECRET = "5d89eb8ecb449a67c724cc3dbe20e30cfefc46b0";
const GITHUB_CLIENT_CALLBACK_URI = BASE_PATH."usertypegithub.php";

