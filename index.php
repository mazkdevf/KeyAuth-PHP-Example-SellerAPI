<?php

require 'KeyAuth.php';

if (isset($_SESSION['user_data'])) 
{
	  header("Location: dashboard/");
    exit();
}

$name = ""; // your application name
$ownerid = ""; // your KeyAuth account's ownerid, located in account settings 
$KeyAuthApp = new KeyAuth\api($name, $ownerid);

if (!isset($_SESSION['sessionid'])) 
{
  	$KeyAuthApp->init();
}
//echo $_SESSION['sessionid']; //Will print current sessionid, that you can make request manually with like postman
?>


<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" sizes="25x25" href="https://cdn.discordapp.com/icons/824397012685291520/c2bd444560b2aa72d33c01925934c5e4.png?size=4096">

<title>KeyAuth PHP Example</title>
<meta name="theme-color" content="#5271ef">
<meta name="description" content="KeyAuth PHP Example Created by mazk#9154">
<meta name="og:image" content="https://cdn.discordapp.com/icons/824397012685291520/c2bd444560b2aa72d33c01925934c5e4.png?size=4096">


<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/util.css">
<link rel="stylesheet" href="css/normalize.css">
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
</head>

<style>
  a {
      font-family: Ubuntu-Regular;
      font-size: 14px;
      line-height: 1.7;
      color: #12acff;
      margin: 0px;
  }
</style>

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form class="login100-form validate-form flex-sb flex-w" method="post">
					<span class="login100-form-title p-b-51 font-semibold">
						KeyAuth PHP Example
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Key is required">
						<input class="input100" type="text" name="key" placeholder="Key">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button name="login" class="login100-form-btn">
							Login
						</button>
					</div>
					
					<div class="container-login100-form-btn m-t-17">
						<button name="register" class="login100-form-btn">
							Register
						</button>
					</div>
          <div class="container-login100-form-btn m-t-17">
						<button name="license" class="login100-form-btn">
							License
						</button>
					</div>
				</form>
        <div class="centeredtext">
          <span class="centeredtext text-gray-400 font-semibold">When you login you accept </span> <a href="https://keyauth.win/terms"> Terms of Service</a>
        </div>
			</div>	
		</div>
	</div>
</div>
<pre>

</div>
<div class="centeredtext">
  <span class="centeredtext text-lg text-gray-400 font-semibold">Copyright © <script type="text/javascript">document.write(new Date().getFullYear())</script> <?php echo "$_SERVER[HTTP_HOST]";?></span>
</div>
</pre>

<?php
        if (isset($_POST['login']))
        {
		// login with username and password
		if($KeyAuthApp->login($_POST['username'],$_POST['password']))
		{
			echo "<meta http-equiv='Refresh' Content='2; url=dashboard/'>";
			                            echo '
                            <script type=\'text/javascript\'>
                            
                            const notyf = new Notyf();
                            notyf
                              .success({
                                message: \'You have successfully logged in!\',
                                duration: 3500,
                                dismissible: true
                              });                
                            
                            </script>
                            ';     
		}
		}
		
		if (isset($_POST['register']))
        {
		// register with username,password,key
		if($KeyAuthApp->register($_POST['username'],$_POST['password'],$_POST['key']))
		{
			echo "<meta http-equiv='Refresh' Content='2; url=dashboard/'>";
			                            echo '
                            <script type=\'text/javascript\'>
                            
                            const notyf = new Notyf();
                            notyf
                              .success({
                                message: \'You have successfully logged in!\',
                                duration: 3500,
                                dismissible: true
                              });                
                            
                            </script>
                            ';     
		}
		}
		
		if (isset($_POST['license']))
        {
		// login with just key
		if($KeyAuthApp->license($_POST['key']))
		{
			echo "<meta http-equiv='Refresh' Content='2; url=dashboard/'>";
			                            echo '
                            <script type=\'text/javascript\'>
                            
                            const notyf = new Notyf();
                            notyf
                              .success({
                                message: \'You have successfully logged in!\',
                                duration: 3500,
                                dismissible: true
                              });                
                            
                            </script>
                            ';     
		}
		}
    ?>

</body>
</html>
