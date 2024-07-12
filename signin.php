

<?php
session_start();
if (isset($_POST['submit'])) {
    if (empty($_POST['signinEmail']) || empty($_POST['signinPassword'])) {
        $_SESSION['errors'] = "Please fill out all fields below.";
        header('location: signin.php');
        exit();
    } else {
        $signinEmail = $_POST['signinEmail'];
        $signinPassword = $_POST['signinPassword'];
        if ($signinEmail == $_SESSION['email'] && $signinPassword == $_SESSION['password']) {
            // Redirect the user to the dashboard
            header('location: index.php');
            exit();
        } else {
            $_SESSION['errors'] = "Sorry, incorrect email or password.";
            header('Location: signin.php');
            exit();
        }
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

        <form action="signin.php" method="POST">

            <div>
                <h3 class="text-center fs-1 text-primary">Login Page</h3>


            </div>

            <p>

                <?php

                if (isset($_SESSION['errors'])) {

                    echo "<p id='error-message' class='bg-danger p-2 rounded-2 text-white' >" .$_SESSION['errors']. "</p>" ;

                }

                unset($_SESSION['errors']);


                ?>


            </p>

            <div>
                <label class="fw-bold mb-1" for="">Email</label>
                <input type="email" class="form-control mb-2" placeholder="Email" name="signinEmail">

            </div>

            <div>

                <label class="fw-bold mb-1" for="">Pasword</label>
                <input type="password" class="form-control mb-2" placeholder="password" name="signinPassword">

            </div>


            <button type="submit" name="submit" class="btn btn-primary d-block mx-auto w-50 my-2">Login</button>


        </form>
    </div>

    <h2 class=" ">

        <?php
        echo $_SESSION['firstName'] . ' ' . $_SESSION['lastName'] . ' ' . $_SESSION['email'] . ' ' . $_SESSION['password'];

        ?>
    </h2>

<script src="app.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>