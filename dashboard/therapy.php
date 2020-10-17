<? include_once 'header.php' ?>

<?
    if(isset($_GET['patient'])){
        $patientid = $_GET['patient'];
        $patient_name = '';

        $sql = "SELECT * from User where userID=". $patientid;
        $result = $conn->query($sql);
        if(isset($result)){
            while($row = $result->fetch_assoc()){
                $patient_name = $row['username'];
            }
        }
    }

    if($_GET['role']){
        $role_id = $_GET['role'];
    }

    if(isset($_GET['therapyid'])){
        $therapyid = $_GET['therapyid'];

    }
?>

<div class="container jumbotron bg-light shadow">

<h2>Therapy Details</h2>
<table class="table">
  <thead class="">
    <tr>
      <th scope="col">Patient</th>
      <th scope="col">Therapy</th>
      <th scope="col">Medicine</th>
      <th scope="col">Dossage</th>
      <th scope="col">Tests</th>
    </tr>
  </thead>
  <tbody>

    <? 

    $sql = "SELECT * from Therapy where User_IDpatient=". $patientid;
    $result = $conn->query($sql);

    $therapy_name = '';
    $medid = '';
   
    if (isset($result->num_rows) && $result->num_rows  > 0) {
        while($row = $result->fetch_assoc()) {
            $sql_org = 'SELECT * FROM Therapy_List where therapy_listID='.$row['TherapyList_IDtherapylist'];
            $result_org = $conn->query($sql_org);
            while($row_org = $result_org->fetch_assoc()){
                $medid = $row_org['Medicine_IDmedicine'];

                $sql_med = 'SELECT * FROM Medicine  where medicineID='.$medid;
                $result_med = $conn->query($sql_med);
                while($row_med= $result_med->fetch_assoc()){   
                    $therapy_name = $row_org['name']; ?>
            <tr>
                <td><? echo $patient_name ?></td>
                <td><? echo $row_org['name'] ?></td>
                <td><? echo $row_med['name']  ?></td>
                <td><? echo $row_org['Dosage']  ?></td>
                <td>
                <a href="therapy.php?patient=<? echo $patientid ?>&therapyid=<? echo $row['therapyID'] ?>&role=<? echo $role_id ?> "> Tests</a>

                </td>
                
            </tr>
        <? } 
         }
        }
    } else {
        echo '<tr> No Result Found!</tr>';
    }
    // $conn->close();
    ?>
  
    
   
  </tbody>
</table>

</div>


<?
if(isset($therapyid)){
 include 'tests.php';
}
?>

<? include_once 'footer.php' ?>