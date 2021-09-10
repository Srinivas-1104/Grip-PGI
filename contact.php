<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $msg = $_POST['msg'];
    $sql = " INSERT INTO `pgi`.`contact` (`name`, `email`, `phone`,`msg`) VALUES ('$name', '$email', '$phone', '$msg') ";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" media="screen and (max-width: 1170px)" href="phone.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">

    <style>
/* CSS Reset */

* {
    margin: 0;
    padding: 0;
}

html {
    scroll-behavior: smooth;
}


/* CSS Variables */

:root {
    --navbar-height: 59px;
}


/* Navigation Bar */

#navbar {
    display: flex;
    align-items: center;
    position: sticky;
    top: 0px;
}

#navbar::before {
    content: "";
    background-color: black;
    position: absolute;
    top: 0px;
    left: 0px;
    height: 100%;
    width: 100%;
    z-index: -1;
    opacity: 0.7;
}


/* Navigation Bar: Logo and Image */

#logo {
    margin: 10px 34px;
}

#logo img {
    height: 59px;
    margin: 3px 6px;
}


/* Navigation Bar: List Styling */

#navbar ul {
    display: flex;
    font-family: cursive;
}

#navbar ul li {
    list-style: none;
    font-size: 1.3rem;
}

#navbar ul li a {
    color: white;
    display: block;
    padding: 24px 190px;
    border-radius: 20px;
    text-decoration: none;
}

#navbar ul li a:hover {
    color: black;
    background-color: white;
}


/* Home Section */

#home {
    display: flex;
    flex-direction: column;
    padding: 3px 200px;
    height: 550px;
    justify-content: center;
    align-items: center;
}

#home::before {
    content: "";
    position: absolute;
    background: url('../img/bg.jpg') no-repeat center center/cover;
    background-size: fixed;
    height: 642px;
    top: 0px;
    left: 0px;
    width: 100%;
    z-index: -1;
    opacity: 1.00;
}

body {
    background: url('bg.jpg')no-repeat center center/cover;
    background-size: fixed;
}

#home h1 {
    color: black;
    text-align: center;
    font-family: cursive;
}

#home p {
    color: black;
    text-align: center;
    font-size: 1.5rem;
    font-family: cursive;
    font-style: oblique;
    font-weight: bold;
}


/* Services Section */

#services {
    margin: 34px;
    display: flex;
}

#services .box {
    border: 2px solid brown;
    padding: 35px;
    margin: 2px 55px;
    border-radius: 33px;
    background: #f2f2f2;
    margin-bottom: 15px;
}

#services .box img {
    height: 160px;
    margin: auto;
    display: block;
}

#services .box p {
    font-family: cursive;
}


/* Clients Section */

#client-section {
    position: relative;
}

#client-section::before {
    content: "";
    position: absolute;
    background: url('../bg.jpg');
    width: 100%;
    height: 100%;
    z-index: -1;
    opacity: 0.3;
}

#clients {
    display: flex;
    justify-content: center;
    align-items: center;
}

.client-item {
    padding: 34px;
}

#clients img {
    height: 124px;
}


/* Contact Section */

#contact {
    position: relative;
}

#contact::before {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: -1;
    opacity: 0.7;
    background: url('../contact.jpg') no-repeat center center/cover;
}

#contact-box {
    display: flex;
    justify-content: center;
    align-items: center;
    padding-bottom: 34px;
}

#contact-box input,
#contact-box textarea {
    width: 100%;
    padding: 0.5rem;
    border-radius: 9px;
    font-size: 1.1rem;
}

#contact-box form {
    width: 40%;
}

#contact-box label {
    font-size: 1.3rem;
    font-family: 'Bree Serif', serif;
}

footer {
    background: black;
    color: white;
    padding: 9px 20px;
}


/* Utility Classes */

.h-primary {
    font-family: cursive;
    font-size: 2.8rem;
    padding: 2px;
}

.h-secondary {
    font-family: 'Bree Serif', serif;
    font-size: 2.3rem;
    padding: 12px;
}

.btn {
    padding: 5px 40px;
    border: 2px solid white;
    background-color: brown;
    color: white;
    margin: 25px;
    font-size: 1.5rem;
    border-radius: 10px;
    cursor: pointer;
    font-family: cursive;
}

input, textarea{
    
    border: 2px solid black;
    border-radius: 6px;
    outline: none;
    font-size: 16px;
    width: 80%;
    margin: 11px 0px;
    padding: 7px;
}

form{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.submitMsg{ 
    color: green;
}

.center {
    text-align: center;
}
    </style>

</head>

<body>
<nav id="navbar">
        <div id="logo">
            <img src="peace.jpg" alt="Peace">
        </div>
        <ul>
            <li class="item"><a href="index.html">Home</a></li>
            <li class="item"><a href="contact.php">Contact Us</a></li>
            <li class="item"><a href="https://www.thesparksfoundationsingapore.org/">TSF</a></li>
        </ul>
    </nav>

        <?php
        if($insert == true){
        echo "<h3 class='submitMsg'>Thanks for submitting the form. We would communicate with you later. </h3>";
        }
    ?>
    <section id="contact">
        <h1 class="h-primary center">Contact Us</h1>
        <div id="contact-box">
            <form action="contact.php" method='post'>
            <input type="text" name="name" id="name" placeholder="Enter your name">

            <input type="email" name="email" id="email" placeholder="Enter your email">

            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">

            <textarea name="msg" id="msg" cols="30" rows="10" placeholder="Enter your message"></textarea>

                <button onclick="myFunction()" class="btn">Submit</button>
                
                <script>
                    function myFunction() {
                        alert ('Form Submitted Successful!')
                    }
                </script>

            </form>
        </div>
    </section>

    <footer>
        <div class="center">
            Copyright &copy; TSF-Banking All rights reserved!
        </div>
    </footer>
    </div>
    <script src="index.js"></script>
    
</body>
</html>
