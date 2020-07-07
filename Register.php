
<?php
session_start();

$username = "";
$email    = "";
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'registration');

if (isset($_POST['reg_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }


  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="Register-css.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="RegisterJavaScript.js">

    </script>
    <script src="jquery-1.4.3.js">

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
            <button type="submit" style="height: 41.6px;"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="orclass">
        <p><b>OR</b></p>
    </div>
    <div class="uploadbuttonc" style="padding: 15px;width: auto;display: inline-flex;margin-left: 48px;">
        <button id="uploadbutton">UPLOAD PRESCRIPTION</button>
    </div>
</div>

<div class="middle" style="display:flex;">
    <div class="RegisterForm" style="margin-top: 8px;margin-left: 50px">
        <h2 style="color: white;font-family: 'Leelawadee UI'; text-align: center">Regitration Form</h2>
        <form class="Registerationform" method="post" style="background: #02b7c2;">
            <div class="genderimageofuser">
                <img id="genderimage" name="gender" >

            </div>
            <div class="userfirstname" style="margin-left: 15px;margin-bottom: 15px">
                <h2 style="color: white;font-family: 'Leelawadee UI';font-size: 20px; margin-left: 8px">First Name</h2>
                <input type="text" placeholder="Enter First name">
            </div>
            <div class="userlastname"style="margin-left: 15px;margin-bottom: 15px">
                <h2 style="color: white;font-family: 'Leelawadee UI';font-size: 20px; margin-left: 8px">Last Name</h2>
                <input type="text" placeholder="Enter Last name">
            </div>
            <div class="email-id"style="margin-left: 15px;margin-bottom: 15px">
                <h2 style="color: white;font-family: 'Leelawadee UI';font-size: 20px; margin-left: 8px">Email Id</h2>
                <input type="text" placeholder="Enter E-mail id">
            </div>
            <div class="password" style="margin-left: 15px;margin-bottom: 15px">
                <h2 style="color: white;font-family: 'Leelawadee UI';font-size: 20px; margin-left: 8px">Password</h2>
                <input type="text" placeholder="Enter Password">
            </div>
            <div class="confirm-password" style="margin-left: 15px;margin-bottom: 15px">
                <h2 style="color: white;font-family: 'Leelawadee UI';font-size: 20px; margin-left: 8px">Confirm Password</h2>
                <input type="text" placeholder="Confirm Password Password">
            </div>
            <div class="contact-no." style="margin-left: 15px;margin-bottom: 15px">
                <h2 style="color: white;font-family: 'Leelawadee UI';font-size: 20px; margin-left: 8px">Contact Number</h2>
                <input type="text" placeholder="Enter Contact number">
            </div>
            <div class="radiobuttons"style="margin-left: 15px;margin-bottom: 15px; display: inline-flex;">
                <div  style="margin-right: 15px">
                    <input type="radio" id="maleradio" name="gender" style="margin-top: 15px" onclick="addimage()"><b style="font-size: 18px;color: white;">Male</b></div>
                <div style="margin-top: 15px; margin-bottom: 15px">
                    <input type="radio" id="femaleradio" name="gender" onclick="addimage()"><b style="font-size: 18px;color: white">Female</b></div>
            </div>
            <div class="submitdetails" style="margin: 15px;">
                <button class="submitbutton" type="submit" style="margin-bottom: 20px; height: 50px" onclick="alertforlogin()">Submit</button>
            </div>

        </form>


    </div>
</div>


<div class="footer">

</div>
</body>
</html>
