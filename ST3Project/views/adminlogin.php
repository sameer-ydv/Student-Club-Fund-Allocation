<?php
     if(isset($_COOKIE["admin_loggedIn"])){
	 	header("Location: http://localhost/ST3PROJECT/views/adminAccess.php");
     }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login as Admin</title>
		<link rel="stylesheet" type="text/css" href="..\css\adminstyle.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<body>
		<div class="container" style="max-width: 45rem !important">
                <div class="row text-center" id="error-div" style="max-width: 45rem;">
                    <!-- Error Alert -->
                    <?php
                        require "../php/function_adminAccess.php";
                        validate_admin_login();
                    ?>
                </div>
            </div>
			<div class="login-box">
				<img src="../images/admin.png">
				<h1>Admin Login</h1>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
				<div class="textbox">
					<i class="fa fa-user" aria-hidden="true"></i>
					<input type="text" placeholder="Username" name="name" id="username" value="">
				</div>
					
				<div class="textbox">
					<i class="fa fa-lock" aria-hidden="true"></i>
					<input type="password" placeholder="Password" name="password" id="password" value="">
				</div>
					<input class="btn" type="submit" name="" value="Sign In">
				</form>
		</div>
		
		</body>
</head>
</html>