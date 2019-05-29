<?php
require_once 'AccountController.php';
$user = new AccountController();
if(isset($_POST['register'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $companyName = $_POST['companyName'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    
    $user->registerMember($firstName, $lastName, $companyName, $userName, $password);
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Employee</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <script>
    function validateform(){
       
        var splChars = "*|,\":<>[]{}0123456789\';()@#$%&";
        var firstName = document.register.firstName.value;
        var lastName = document.register.lastName.value;
        var companyName = document.register.companyName.value;
        var userName = document.register.userName.value;
        var password = document.register.password.value;
        var passRepeat = document.register.password_repeat.value;
        if((firstName=="")|| (lastName == "") || (userName == "") || (password == "") ||( passRepeat == "") ||( companyName == "")){
            alert("Fill Empty Fields");
            return false;
        }
       
        for(var i = 0;i<firstName.length;i++){
            if(splChars.indexOf(firstName.charAt(i)) != -1){
              alert("Illegal Characters Entered");
              return false;
            }
        }
        
        
        for(var i =0; i<userName.length;i++){
            if(splChars.indexOf(userName.charAt(i)) != -1){
              alert("Illegal Characters Entered");
              return false;
            }

        }

        for(var i =0; i<lastName.length;i++){
            if(splChars.indexOf(lastName.charAt(i)) != -1){
              alert("Illegal Characters Entered");
              return false;
            }

        }

        if(userName.length < 3 || userName.length > 30 || userName==""){
            alert("Empty or Invalid Name length Entered");
            return false;
        }

        
        if( password.length < 4 || password_repeat.length < 4){
            alert("incorrect password length");
            return false;
        }
        if(password!==password_repeat){
            alert("password doesn't match");
            return false;
        }
      
        return true;
        }

    </script>
</head>

<body>
        <div class="row" style="background-color:#184e8e; height: 80px;">
                <div class="col">
                    <img src="assets/img/kurtu_logo.jpg" style="height: 60px; margin: 10px; margin-left:20px;">
                    <span style="color:white; font-size:1.5rem">Kurtu Int.</span>
                </div>
                <div class="col">
                    <div class="row">
                            <div class="col">
                                    
                                </div>
                        <div class="col" style="margin-top:14px; margin-right:7px;">
                            <span style="color:white; font-size:1.2rem; ">Manager</span>
                            <button class="btn btn-primary" type="button" style="background-color:#444444;"><a href="login.php">Sign Out</a></button>
                        </div>
                        
                    </div>
                </div>
            </div>
    <ul class="nav nav-tabs" style="font-size:21px;">
        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link active" href="#">Register Employee</a></li>
        <li class="nav-item"><a class="nav-link" href="#">View Record</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Message</a></li>
    </ul>
    <div class="card"></div>
    <div class="card-group">
        <div class="card"></div>
        <div class="card"></div>
    </div>
    <div class="media" style="margin:33px;"></div>
    <div class="media"></div>
    <div class="register-photo" style="padding-top:55px;">
        <div class="form-container">
            <form name="register" method="POST"  action="Register.php" onsubmit="return validateform();">
                <h2 class="text-center"><strong>Register Employee</strong></h2>
                <div class="form-group"><input class="form-control" type="text" name="firstName" id="firstName"  placeholder="First Name"></div>
                <div class="form-group"><input class="form-control" type="text" name="lastName" placeholder="Last Name"></div>
                <div class="form-group"><input class="form-control" type="text" name="companyName" placeholder="Company Name"></div>
                <div class="form-group"><input class="form-control" type="text" name="userName" placeholder="Username"></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                <div class="form-group"><input class="form-control" type="password" name="password_repeat" placeholder="Confirm Password"></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name = "register" style="background-color:#184e8e;">Register</button></div>
            </form>
        </div>
    </div>
    <header></header>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>