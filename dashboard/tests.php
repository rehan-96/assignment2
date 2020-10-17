
<div class="container jumbotron bg-light shadow">

<h3>Test Details</h3>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Therapy</th>
      <th scope="col">Time</th>
      <th scope="col">Test Data</th>
    </tr>
  </thead>
  <tbody>

  <?
        $sql = "SELECT * from Test where Therapy_IDtherapy=".$therapyid;
        $result = $conn->query($sql);
        if (isset($result->num_rows) && $result->num_rows  > 0) {
            while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><? echo $therapy_name ?></td>
                <td><? echo $row['dateTime'] ?>  </td>
                <td>
                    <a href="therapy.php?patient=<? echo $patientid ?>&therapyid=<?echo $therapyid ?>&role=<? echo $role_id ?>&testid=<? echo $row['testID'] ?>"> Data</a>
                </td>
            </tr>
        <?    }
        }
  
  ?>
  </tbody>
</table>

</div>


<?
if(isset($_GET['testid'])){
    $testid = $_GET['testid'];
    include_once 'test_session.php';
}
?>