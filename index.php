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
<body id="home">

    <div >

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
            <p>Covid-19 changed the shape of our world. Since 2019 our world has been changed in so many ways 
                and pandemic had a huge impact on every aspect of our life. Certainly, education was not an 
                exception in this regard. Many kids and youth were not able to continue their studies as pandemic
                 shot down every school and education across the world. Fortunately, as we are in 21st century 
                 technology can provide solutions to overcome this. Now we can hold our classes online and no 
                 matter where students or teachers are physically located, they can communicate through the 
                 internet via various online platforms. Our organization at HELP school tries to provide tutors 
                 and digital resources to students all across the country, thus no one would left behind during 
                 this hard era.</p>

            
        </div>
    </div>
    </div>

</body>
</html>