<?php
include "../connection.php";
?>
<head>
<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" crossorigin="anonymous">
   <link rel="stylesheet" href="/IntoCode/CSS/Sign_inup_style.css">
</head>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="post" action="">
			<h1>Create Account</h1>
			<div class="social-container">
                <span>Our:</span>
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
			</div>
			<input name="RName" type="text" placeholder="Name" />
			<input name="REmail" type="email" placeholder="Email" />
            <input name="RPassword" type="password" placeholder="Password" />
            <input name="RCPassword" type="password" placeholder="Confirm Password" />
			<button type="submit">Sign Up</button>
		</form>



	</div>

	<div class="form-container sign-in-container">
		<form method="post" action="">
			<h1>Sign in</h1>
			<div class="social-container">
             <span>Our:</span>
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
			</div>
			<input name="Email" type="email" placeholder="Email" />
			<input name="Password" type="password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button type="submit">Sign In</button>
		</form>
	</div>


	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
<script>
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>


<?php 
if(isset($_POST['RName']) && !empty($_POST['RName']) && isset($_POST['REmail']) && !empty($_POST['REmail']) && isset($_POST['RPassword']) && !empty($_POST['RPassword']) && isset($_POST['RCPassword']) && !empty($_POST['RCPassword']))
{
    $Name=$_POST['RName'];
    $Email=$_POST['REmail'];
    $password=$_POST['RPassword'];
    $Cpassword=$_POST['RCPassword'];
    //if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $Email)){
        // Return Error format: xxx@xx.xxx
   //     $msg = 'The email you have entered is invalid, please try again.';
  //  }
    if(isset($msg))
    {
        echo "<script>alert('Invalid Email Adress')</script>";
        if (count($_POST) > 0) {
            foreach ($_POST as $k=>$v) {
                unset($_POST[$k]);
            }
        }
        exit;
    }
    if ($password != $Cpassword)
    {  echo "<script>alert('Passwords don't match')</script>";} 
    else{
        $sql = "SELECT * FROM `users` WHERE Email='".$Email."'";
        $res=$conn->query($sql);
        if($res->num_rows>0)
        { echo "<script>alert('Email is already taken')</script>";}

        else{
        $password=md5($Cpassword);
        $sql = "INSERT INTO `users`(`Name`, `Password`, `Email`) VALUES ('{$Name}','{$password}','{$Email}')";
            if ($conn->query($sql) === TRUE) 
            {
                $_SESSION['user']=$Name;
                header('Location: ../index.php');
            } 
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
if(isset($_POST['Email']) && !empty($_POST['Email']) && isset($_POST['Password']) && !empty($_POST['Password'])){
    				
    $Email=$_POST['Email'];
    $password=md5($_POST['Password']);
    $sql = "Select * from users where  Email='".$Email."' and password='".$password."'";
    $res = $conn->query($sql);
    if($res->num_rows > 0){
        $row = $res->fetch_assoc();
        $Email = $row['Email'];
        if($Email=='alemak2002@gmail.com'){$_SESSION['admin'] = $row['Name'];}

        else {$_SESSION['user'] = $row['Name'];}
        header('Location: ../index.php');
    }else{
        echo "<script>alert('Wrong Email or password')</script>";
    }
    

}          


?>