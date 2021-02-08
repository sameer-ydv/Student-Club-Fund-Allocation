<?php
    if(isset($_COOKIE["student_loggedIn"])){
        header("Location: http://localhost/ST3PROJECT/views/studentAccess.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Chapter Login</title>
    <link rel="stylesheet" href="../css/studentstyle.css">
</head>
<body>
<div class="container" style="max-width: 45rem !important">
                <div class="row text-center" id="error-div" style="max-width: 45rem;">
                    <!-- Error Alert -->
                    <?php
                        require "../php/function_studentAccess.php";
                        validate_student_login();
                    ?>
                </div>
            </div>
    <form class="box" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <h1>Student Chapter Login</h1>
        <input type="text" name="username" placeholder="Club name">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="" value="Login">
    </form>
</body>
</html>