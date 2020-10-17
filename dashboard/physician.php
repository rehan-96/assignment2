
<div class="container jumbotron bg-light shadow">
<table class="table">
  <thead class="">
    <tr>
      <th scope="col">Patient</th>
      <th scope="col">email</th>
      <th scope="col">organization</th>
      <th scope="col">Opt</th>
    </tr>
  </thead>
  <tbody>

    <? 

    $sql = "SELECT * from User where Role_IDrole=1";
    // $sql = "SELECT User.username, User.email, User.Organization, Organization.organizationID, Organization.name FROM User INNER JOIN Organization ON User.Organization = Organization.organizationID ";
    $result = $conn->query($sql);
   
    if (isset($result->num_rows) && $result->num_rows  > 0) {
        while($row = $result->fetch_assoc()) {
            $sql_org = 'SELECT * from Organization where organizationID='.$row['Organization'];
            $result_org = $conn->query($sql_org);
            while($row_org = $result_org->fetch_assoc()){
                ?>
            <tr>
                <td><? echo $row['username'] ?></td>
                <td><? echo $row['email'] ?></td>
                <td><? echo $row_org['name'] ?></td>
                <td>
                    <a href="therapy.php?patient=<? echo $row['userID'] ?>&role=<? echo $role_id ?> "> Therapy</a>
                </td>
            </tr>
        <? }
        }
    } else {
        echo '<tr> No Result Found!</tr>';
    }
    $conn->close();
    ?>
  
    
   
  </tbody>
</table>

</div>