<?php
require dirname(__FILE__).'/config.php';
use League\OAuth2\Client\Provider\Github;

$provider = new Github([
    'clientId'          => GITHUB_CLIENT_ID,
    'clientSecret'      => GITHUB_CLIENT_SECRET,
    'redirectUri'       => GITHUB_CLIENT_CALLBACK_URI,
]);


// $authUrl = $provider->getAuthorizationUrl();
// $_SESSION['oauth2state'] = $provider->getState();

//echo '<pre>';print_r($authUrl);echo '</pre>';exit;
// header('Location: '.$authUrl);
// exit;



if (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

    unset($_SESSION['oauth2state']);
    exit('Invalid state');

} else {


    try {

         // Try to get an access token (using the authorization code grant)
        $token = $provider->getAccessToken('authorization_code', [
            'code' => $_GET['code']
        ]);
        // We got an access token, let's now get the user's details
        $user = $provider->getResourceOwner($token);

        // Use these details to create a new profile
        $userArr = $user->toArray();
       

        // if (!empty($userArr)) {
        //     $data = [
        //         'user' => [
        //             'first_name' => $userArr['name'],
        //             'last_name' => null,
        //             'email' => null,
        //             'password' => null,
        //             'gender' => null,
        //             // 'uuid' => generateUUID(),
        //         ],
        //         'user_meta' => [
        //             'oauth_provider_type_id' => GITHUB,
        //             'oauth_uid' => $userArr['id'],
        //             'oauth_token' => $token->getToken(),
        //             'oauth_username' => $userArr['login'],
        //             'avatar' => $userArr['avatar_url'],
        //         ],
        //     ];

        //     checkLogin($data);
        // }
        

    } catch (Exception $e) {

        header('Location: index.php');exit;
    }

    // Use this to interact with an API on the users behalf
    // echo $token->getToken();
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Dashboard</title>
  </head>
  <body>

  <div class="card mx-auto mt-5" style="width: 30rem;">
  <div class="card-body text-center">
    <h3 class="card-title text-center">Welcome User</h3>
    <p class="card-text">
    
    
    <?
      
    // echo '<img src="'.$_SESSION["user_image"].'" class="img-fluid img-circle img-thumbnail" />';
    echo '<p><b>Name :</b> '.$userArr['name'].'</p>';
    // echo '<p><b>Email :</b> '.$_SESSION['user_email_address'].'</p>';
    
    ?>
    </p>

    <br>
    <form action="formuser.php" method="POST">
        <div class="form-group p-3">
            <label for="">Select Type of User:</label>
            <select class="form-control" name="usertype" id="exampleFormControlSelect1">
                <option value="1">Patient</option>
                <option value="2">Physician</option>
                <option value="3">Researcher</option>
                <option value="4">Junior Researcher</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" >Submit</button>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </form>
   
  </div>
</div>
   
   


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>