<?php
session_start();
if (isset($_POST['submit'])){

if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['email']) || empty($_POST['password'])  ){
 
    $message ="Please fill all fields";
    
    $_SESSION['error']= $message;
    
    header('location: signup.php');
    exit(); // Ensure script stops executing after redirection
}

else{
    
    $_SESSION['firstName'] = $_POST['firstName'];
    $_SESSION['lastName'] = $_POST['lastName'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    
    header('location: signin.php');
    exit(); // Ensure script stops executing after redirection

}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="bootstrap.css">

    <link rel="stylesheet" href="style.css">

   </head>
<body>
    <div class="border shadow w-50 p-3 mx-auto rounded my-5">
    
        <form action="signup.php" method="POST">
        
            <div>
                <h3 class="text-center fs-1 text-primary">Registration form</h3>

            </div>
       
            <p>
                
                <?php 

if (isset($_SESSION['error'])){
    
    echo "<p id='error-message' class='bg-danger p-2 rounded-2 text-white text-center' >" .$_SESSION['error']. "</p>" ;
    
    
}
unset($_SESSION['error']);


?>


        </p>
            
            
            <div class="form-group mb-2">
                <label  class="fw-bold mb-1" for="">First Name</label>
            <input type="text" class="form-control mb-2" placeholder="First Name" name="firstName">
        
        </div>
        
        <div>
        <label  class="fw-bold mb-1" for="">Last Name</label>
        <input type="text" class="form-control mb-2" placeholder="Last Name" name="lastName">
        
        </div>
        
        <div>
        <label  class="fw-bold mb-1" for="">Email</label>
        <input type="email" class="form-control mb-2" placeholder="Email" name="email">
        
        </div>
        
        <div>
        
        <label  class="fw-bold mb-1" for="">Pasword</label>
        <input type="password" class="form-control mb-2" placeholder="password" name="password">
        
        </div>
       
        <button type="submit" name="submit" class="btn btn-primary d-block mx-auto w-50 my-2">Submit</button>
        
           </form>
       </div>

    <script src="app.js"></script>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>