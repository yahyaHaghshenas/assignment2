  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

<?php

$connection = mysqli_connect("localhost","root","","bitvolunteer");

if(isset($_POST['Register']))
{
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $Fullname = $_POST['Fullname'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];
    $Occupation = $_POST['Occupation'];
    $BirthDate = $_POST['BirthDate'];

        $qry = "INSERT INTO assignment (Username,Password,Fullname,Phone,Email,Occupation,BirthDate) VALUES ('$Username','$Password','$Fullname','$Phone','$Email','$Occupation','$BirthDate')";
        $insert = mysqli_query($connection,$qry);

        if($qry){
            echo "done";
            $_SESSION['success'] =  "Volunteer is Added";
            header('Location: register.php');
        }
        else{
            echo "not done";
            $_SESSION['status'] =  "Volunteer is Not Added";
            header('Location: register.php');
}
        }
?>