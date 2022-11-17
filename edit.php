<?php

session_start();
include('includes/header.php'); 
include('includes/navbar.php');

?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-9 font-weight-bold text-primary"> EDIT VOLUNTEER PROFILE</h6>
    </div>
    <div class="card-body">

        <?php
        $connection = mysqli_connect("localhost","root","","bitvolunteer");

            if(isset($_POST['edit']))
            {
                $Username = $_POST['edit_username'];

                $query = "SELECT * FROM assignment WHERE Username='$Username' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>
                        <div class="form-group">
                                <label> Username </label>
                                <input type="text" name="Username" value="<?php echo $row['Username'] ?>" class="form-control"
                                    placeholder="Enter Username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="edit_password" value="<?php echo $row['Password'] ?>" class="form-control"
                                    placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <label>Fullname</label>
                                <input type="text" name="edit_fname" value="<?php echo $row['Fullname'] ?>"
                                    class="form-control" placeholder="Enter Fullname">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="edit_phone" value="<?php echo $row['Phone'] ?>"
                                    class="form-control" placeholder="Enter Phone">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="edit_email" value="<?php echo $row['Email'] ?>"
                                    class="form-control" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label>Occupation</label>
                                <input type="text" name="edit_occupation" value="<?php echo $row['Occupation'] ?>"
                                    class="form-control" placeholder="Enter Occupation">
                            </div>
                            <div class="form-group">
                                <label>BirthDate</label>
                                <input type="text" name="edit_birthDate" value="<?php echo $row['BirthDate'] ?>"
                                    class="form-control" placeholder="Enter BirthDate">
                            </div>

                            <a href="register.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>

                        </form>
                        <?php
                }
            }
        ?>
        </div>
    </div>
</div>
</div>