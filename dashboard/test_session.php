
<div class="container jumbotron bg-light shadow">

<h3>Test Session Details</h3>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Session Data</th>
      <th scope="col">Note</th>
    </tr>
  </thead>
  <tbody>

  <?
        $sql = "SELECT * FROM Test_Session where Test_IDtest=".$testid;
        $result = $conn->query($sql);
        if (isset($result->num_rows) && $result->num_rows  > 0) {
            while($row = $result->fetch_assoc()) { 
                $sql_note = 'SELECT * FROM Note  where Test_Session_IDtest_session='.$row['test_SessionID'];
                $result_note = $conn->query($sql_note);
                while($row_note= $result_note->fetch_assoc()){ 
                    $note = $row_note['note'];
                }
                ?>
                <tr>
                    <td> <a href="data/<? echo $row['DataURL']?>.csv" target="_blank"><? echo $row['DataURL']?></a> </td>
                    <td><?  
                    if(isset($note)){
                        echo $note;
                    } else { echo 'Nill'; } ?></td>
                </tr>

        <?   
          }
        }
  
  ?>
  </tbody>
</table>

</div>

