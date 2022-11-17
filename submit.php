<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Offer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     

<?php

$connection = mysqli_connect("localhost","root","","bitvolunteer");

if(isset($_POST['Make']))
{
    $Offer = $_POST['Offer'];
    $Status = $_POST['Status'];
    

        $qry = "INSERT INTO offer (Offer,Status) VALUES ('$Offer','$Status')";
        $insert = mysqli_query($connection,$qry);

        if($qry){
            echo "done";
            $_SESSION['success'] =  "Submitted";
            header('Location: register.php');
        }
        else{
            echo "not done";
            $_SESSION['status'] =  "Not Submitted";
            header('Location: register.php');
}
        }
?>