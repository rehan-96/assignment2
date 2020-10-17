<?php

//index.php

//Include Configuration File
include('config.php');

$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];


  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}


if(!isset($_SESSION['access_token']))
{

//  $login_button = '<a href="'.$google_client->createAuthUrl().'">Login With Google</a>';
 $login_button =  $google_client->createAuthUrl();
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

  <div class="card bg-light shadow mx-auto mt-5" style="width: 30rem;">
  <div class="card-body text-center">
    <h3 class="card-title text-center">Welcome User</h3>
    <p class="card-text">
    
    
    <?
       if($login_button == '')
   {
    echo '<img src="'.$_SESSION["user_image"].'" class="img-fluid img-circle img-thumbnail" />';
    echo '<p><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</p>';
    echo '<p><b>Email :</b> '.$_SESSION['user_email_address'].'</p>';
    // echo '<p><a href="logout.php">Logout</a></div>';
   }
   else
   {
    echo '<div align="center">'.$login_button . '</div>';
   }
    
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