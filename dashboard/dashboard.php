<?php 

require_once 'config.php';


if($_GET['role']){
    $role_id = $_GET['role'];
    $role_title = '';

    if($role_id == 1){
        $role_title = 'Patient';
    } elseif($role_id == 2){
        $role_title = 'Physician';
    }
    elseif($role_id == 3){
        $role_title = 'Researcher';
    }elseif($role_id == 4){
        $role_title = 'Junior Researcher';
    }
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
    <script src="https://cdn.rawgit.com/oauth-io/oauth-js/c5af4519/dist/oauth.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/4.12.0/bootstrap-social.min.css">
    <title>Dashboard</title>
  </head>
  <body>


  <nav class="navbar navbar-expand-md shadow navbar-light bg-light fixed-top">
      <a class="navbar-brand" href="http://localhost:8080/patient/">PD</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="http://localhost:8080/patient/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../logout.php">Logout</a>
          </li>
         
         
        </ul>
        
      </div>
    </nav>

   <!-- Main jumbotron for a primary marketing message or call to action -->
   <div class="jumbotron bg-light">
        <div class="container">
          <h1 class="display-3 text-center mx-auto">Hello, <? echo $role_title; ?> </h1>

        </div>
    </div>

    <!-- code to view list of videos for patients -->
    <? 
    if($role_id == 1){
        include_once 'videos.php';
    }
    ?>

    <? 
    if($role_id == 2){
        include_once 'physician.php';
    }
    ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>