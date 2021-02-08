 <?php
    // if(isset($_COOKIE["newclub_registered"])){
    //     setcookie("newclub_registered",$clubname,time() - (86400 * 30), '/');
    //     header("Location: http://localhost/ST3PROJECT/views/index.html");
    // }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register New Clubs</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
    body,html{
        height: 100%;
        margin: 0;
        padding: 0;
        background: url(../images/newclubs.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        font-family:'Roboto', sans-serif;
    }
    
    .register{
        width: 85%;
        max-width: 600px;
        background: rgba(25, 25, 25,0.75);
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        padding: 30px 40px;
        box-sizing: border-box;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 0 20px #000000b3;
        /* font-family: "Montserrat",sans-serif; */
    }
    .register h1{
        color: white;
        margin-top: 0;
        font-weight: 200;
        text-transform: uppercase;
    }
    .txtb{
        border: 1px solid grey;
        margin: 8px 0;
        padding: 12px 8px;
        border-radius: 8px;
    }
    .txtb label{
        display: block;
        text-align: left;
        color: white;
        text-transform: uppercase;
        font-size: 16px;
    }
    .txtb input,.txtb textarea{
        width: 100%;
        border: none;
        background: none;
        outline: none;
        font-size: 18px;
        margin-top: 6px;
        color: white;
    }
    .btn{
        display: block;
        padding: 10px 0;
        color: #2ecc71;
        text-transform: uppercase;
        cursor: pointer;
        margin-top: 8px;
        margin-left: 150px;
        border-radius: 8px;
        width: 40%;
        background: none;
    }
    </style>
</head>
<body>
<?php
                    require "../php/function_newclubs.php";
                    register_details();
                ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <div class="register">
            <h1>Register Your Club</h1>
            <div class="txtb">
                <label for="club name">Club Name :</label>
                <input type="text" name="name" value="" >
            </div>
            <div class="txtb">
                <label for="description">Describe Your Club :</label>
                <textarea name="description" rows="6"></textarea>
            </div>       
            <input type="submit" class="btn" value="Register">
        </div>
    </form>
</body>
</html>