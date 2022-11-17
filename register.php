<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="modal fade" id="addvolunteerprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Volunteer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="register.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="Username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="Password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Fullname</label>
                <input type="text" name="Fullname" class="form-control" placeholder="Enter Fullname">
            </div>
             <div class="form-group">
                <label>Phone</label>
                <input type="text" name="Phone" class="form-control" placeholder="Enter Phone">
            </div>
             <div class="form-group">
                <label>Email</label>
                <input type="text" name="Email" class="form-control" placeholder="Enter Email">
            </div>
             <div class="form-group">
                <label>Occupation</label>
                <input type="text" name="Occupation" class="form-control" placeholder="Enter Occupation">
            </div>
             <div class="form-group">
                <label>BirthDate</label>
                <input type="text" name="BirthDate" class="form-control" placeholder="Enter BirthDate">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="Register" class="btn btn-primary">Register</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
               
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addvolunteerprofile">
              Add Volunteer Profile 
            </button>

    </button>  
</div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Username </th>
            <th>Password </th>
            <th>Fullname</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Occupation</th>
            <th>BirthDate</th>
            <th>EDIT </th>
          </tr>
        </thead>
        <tbody>

            <?php
                $query = "SELECT * FROM assignment";
                $query_run = mysqli_query($connection, $query);
            ?>
            
                    <tbody>
                        <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <tr>
                                <td><?php  echo $row['Username']; ?></td>
                                <td><?php  echo $row['Password']; ?></td>
                                <td><?php  echo $row['Fullname']; ?></td>
                                <td><?php  echo $row['Phone']; ?></td>
                                <td><?php  echo $row['Email']; ?></td>
                                <td><?php echo $row['Occupation']; ?></td>
                                <td><?php echo $row['BirthDate']; ?></td>
                                <td>
                                    <form action="edit.php" method="post">
                                        <input type="hidden" name="edit_username" value="<?php echo $row['Username']; ?>">
                                        <button type="submit" name="edit" class="btn btn-success"> EDIT</button>
                                    </form>
                                </td>
                                
                            </tr>
                        <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
     
          <tr>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td>
               
            </td>
            <td>
            
            </td>
          </tr>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/index.php');
include('includes/footer.php');
?>