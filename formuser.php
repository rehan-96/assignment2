<?php 

if($_POST['usertype']){
    echo $_POST['usertype'];
    header('Location: dashboard/dashboard.php?role='.$_POST['usertype']);
}

?>