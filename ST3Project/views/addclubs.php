<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/addclubs_style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <title>Add Student Chapter</title>
</head>
<body>
<?php

        require "../php/function_adminAccess.php";
        add_clubs();
?>
    <div class="container">
        <h2>Add Student Chapter</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
            <div class="row">
                <label for="clubname" required>Club Name *</label>
                <input type="text" name="clubname" required>
            </div>
            <div class="row">
                <label for="password">Set Password *</label>
                <input type="password" name="password" required>
            </div>
            <div class="row">
                <label for="email">Email *</label>
                <input type="email" name="email" required>
            </div>
            <div class="row">
                <label for="clubhead">Head *</label>
                <input type="text" name="head" required>
            </div>
            <div class="row" style="border-bottom: 1.5px solid white;">
                <label for="description">Description *</label>
                <textarea name="description" id="" cols="15" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn" value="Add">ADD<i class="fas fa-paper-plane"></i></button>
        </form>
    </div>
</body>
</html> 