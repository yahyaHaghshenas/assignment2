<?php
include('security.php');

if(isset($_POST['updatebtn']))
{
    $Username = $_POST['edit_username'];
    $Password = $_POST['edit_password'];
    $Fullname = $_POST['edit_fname'];
    $Phone = $_POST['edit_phone'];
    $Email = $_POST['edit_email'];
    $Occupation = $_POST['edit_occupation'];
    $BirthDate = $_POST['edit_birthDate'];

    $query = "UPDATE assignment SET Username='$Username', Password='$Password', Fullname='$Fullname', Phone='$Phone', Email='$Email', Occupation='$Occupation', BirthDate='$BirthDate' WHERE Username='$Username' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: register.php'); 
    }
}

?>