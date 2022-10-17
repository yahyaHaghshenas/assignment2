<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Home</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<link rel="stylesheet" href="style.css">

<script src=""></script>
<body>



    <div class="container ">
        
        <form action="registerSchool.php" method="get">
            <div class="row">
                <label class="col-sm-1 col-form-label" for="username">Username:</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control"id="username" name="username"><br>
                </div> 
                <label class="col-sm-1 col-form-label" for="password">Password:</label>
                <div class="col-sm-2">
                    <input type="password" class="form-control"id="password" name="password"><br>
                </div>  
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-primary"  id="login">Login</button>
                </div>  
            </div>
        </form>
    </div>
    <div class="container">
        <div class="mb-5">
            <h1>Welcom to Volunteers Mangement System</h1>
        </div>
        <div id="volReg">
            <form>
            <div class="row">
                        <label class="col-sm-1 col-form-label" for="volName">Full Name:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control"id="volName" name="volName" ><br>
                        </div>    
                    </div> 
                    <div class="row">
                        <label class="col-sm-1 col-form-label" for="volPass">Password:</label>
                        <div class="col-sm-3">
                            <input type="password" class="form-control"id="volPass" name="volPass" ><br>
                        </div>    
                    </div> 
                    <div class="row">
                        <label class="col-sm-1 col-form-label" for="Dob">Date of Birth:</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control"id="Dob" name="Dob" ><br>
                        </div>    
                    </div> 
                    <div class="row">
                        <label class="col-sm-1 col-form-label" for="occupation">Occupation:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control"id="occupation" name="occupation" ><br>
                        </div>    
                    </div> 
                    <div class="row">
                        <label class="col-sm-1 col-form-label" for="volPhone">Phone:</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control"id="volPhone" name="volPhone" ><br>
                        </div>    
                    </div> 
                    <div class="row">
                        <label class="col-sm-1 col-form-label" for="volEmail">Email:</label>
                        <div class="col-sm-3">
                            <input type="email" class="form-control"id="volEmail" name="volEmail" ><br>
                        </div>    
                    </div> 
            </form>
        </div>
        <div class="col-sm-6">
            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has 
                roots in a piece of classical Latin literature from 45 BC, making it over 
                2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College
                in Virginia, looked up one of the more obscure Latin words, consectetur,
                from a Lorem Ipsum passage, and going through the cites of the word in classical 
                literature, discovered the undoubtable source. Lorem Ipsum comes from sections
                1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)
                by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular
                    during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..",
                    comes from a line in section 1.10.32.
                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
                Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced 
                in their exact original form, accompanied by English versions from the 1914 translation 
                by H. Rackham.</p>

            <!-- <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has 
                roots in a piece of classical Latin literature from 45 BC, making it over 
                2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College
                in Virginia, looked up one of the more obscure Latin words, consectetur,
                from a Lorem Ipsum passage, and going through the cites of the word in classical 
                literature, discovered the undoubtable source. Lorem Ipsum comes from sections
                1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)
                by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular
                    during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..",
                    comes from a line in section 1.10.32.
                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
                Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced 
                in their exact original form, accompanied by English versions from the 1914 translation 
                by H. Rackham.</p> -->
        </div>
    </div>


</body>
</html>