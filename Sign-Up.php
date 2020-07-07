
<?php
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en" xmlns:color="http://www.w3.org/1999/xhtml">
<head>
    <title>Sign-up</title>
    <link href="Sign-in-css.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="SignUpJavaScript.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#fbbutton").click(function () {
                window.open(href="https://www.facebook.com/");
            });
            $("#googlebutton").click(function () {
                window.open(href="https://accounts.google.com/signin/v2/identifier?hl=en&continue=https%3A%2F%2Fmail.google.com%2Fmail&service=mail&flowName=GlifWebSignIn&flowEntry=AddSession");
            });
            $("#twitterbutton").click(function () {
                window.open(href="https://twitter.com/login?lang=en");
            });
        });
    </script>
</head>
<body>
<div class="Top">
    <div class="Head"  >
        <p ><b>SPitmeds.com<sub id="tag">India ki online pharmacy</sub></b></p>
    </div>
    <div class="logoimg" style="width: 25%">
        <img src="logo.jpg" id="logoimg1" >
    </div>
</div>
<div class="nav">
    <div class="tab" >
        <button class="tablinks" onclick="openWinHome()">HOME</button>
        <button class="tablinks">PRESCRIPTIONS</button>
        <button class="tablinks">PERSONAL CARE</button>
        <button class="tablinks">LIFESTYLE</button>
        <button class="tablinks">TREATMENTS</button>
        <button class="tablinks">HEALTH LIBRARY</button>
        <button class="tablinks">DEVICES</button>
    </div>
</div>


<div class="Search_content" style="display: inline-flex;width: -moz-available;">
    <div class="search_bar">
        <form class="example"  style="margin-left:115px;max-width:650px">
            <input type="text" placeholder="Search for Medicines... " name="search2" style="border-radius: 0px">
            <button type="submit" style="height: 41.6px;margin-top: 8px;"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="orclass">
        <p><b>OR</b></p>
    </div>
    <div class="uploadbuttonc" style="padding: 15px;width: auto;display: inline-flex;margin-left: 48px;">
        <button id="uploadbutton">UPLOAD PRESCRIPTION</button>
    </div>
</div>



<div class="middle" style="display: flex">
    <div class="Inputdetails" style="width: 550px;margin-left: 25px;">
        <h2 id="log" style="color: white;text-align: center; font-size: 25px; font-family: 'Leelawadee UI' ">Login Form</h2>

        <form id="formsignin">
            <div class="imgcontainer">
                <img src="loginmale.png" class="avatar">
            </div>

            <div class="container">
                <b style="color: white; font-size: 25px">Username</b>
                <input type="text" placeholder="Enter Username" name="uname" class="uname1" required id="usernameinput">

                <b style="color: white; font-size: 25px">Password</b>
                <input type="password" placeholder="Enter Password" name="psw" class="psw1" required id="passwordinput">

                <button type="submit" style="font-size: 20px" onclick="verify()">Login</button>
            </div>

            <div class="container1">
                <button type="button" class="cancelbtn">Cancel</button>
                <span class="psw"><a href="#"><b>Forgot password?</b></a></span>
            </div>
        </form>
    </div>
    <div style="margin: 25px;width: auto;margin-top: 0px">
        <h1 style="color: white; text-align: center">Social Media Log in</h1>
        <div class="col" style="width: 400px;margin-top: 10px">
            <button id="fbbutton" class="fb btn" style="text-align: center">Login with Facebook</button>
            <button id="twitterbutton" class="twitter btn" style="text-align: center">Login with Twitter</button>
            <button id="googlebutton" class="google btn" style="text-align: center">Login with Google+</button>

        </div>
    </div>
    <div style="margin: 50px">
        <img name="slide" width="300px" height="auto" style="border-radius: 25px">
    </div>
    <script>

    </script>
</div>

<div class="footer">

</div>
</body>
</html>
