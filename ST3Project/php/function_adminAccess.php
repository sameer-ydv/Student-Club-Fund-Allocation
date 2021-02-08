<?php

function validate_admin_login() {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
            $username    = $_POST["name"];
            $password    = $_POST["password"];
            if($username == "admin" && $password == "admin123"){

                        setcookie("admin_loggedIn", $username, time() + (86400 * 30), '/');
                        setcookie("student_loggedIn", "", time() - 3600,"/");

                        header("Location: http://localhost/ST3PROJECT/views/adminAccess.php");
            }
    }
}

function add_clubs() {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $conn = mysqli_connect('localhost', 'root', '', 'fundallocation');
            if($conn === false){
                die("Error: Could not Connect".mysqli_connect_error());
            }
            else{
                $clubname = $_POST["clubname"];
                $password = $_POST["password"];
                $email = $_POST["email"];
                $head = $_POST["head"];
                $description = $_POST["description"];
                
                $query= "INSERT INTO logindetails(clubname, password, email, head, description) VALUES ('$clubname','$password','$email', '$head', '$description')";
                $result = mysqli_query($conn,$query);
                $query2 = "DELETE FROM newclubs WHERE clubname='$clubname'
                ";
                $result2= mysqli_query($conn,$query2);
                
                echo '
                        <script>
                        var name= \'<? php echo $clubname; ?>\';
                        alert("Congratulations!! Your club has been officially registered.");
                        window.location.href="http://localhost/ST3PROJECT/views/adminAccess.php";
                        </script>';
            }
    }
}

function pending_requests(){
    $conn = mysqli_connect('localhost', 'root', '', 'fundallocation');
        if($conn === false)
        {
            die("Error: Could not Connect".mysqli_connect_error());
        }
        else{
            $query = "SELECT * FROM fundrequests";
            $result = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
                $clubname = $row[0];
                $requestedamount = $row[1];

                $query2= "SELECT eventname,eventcost FROM clubevents WHERE clubname='$clubname' ";
                $result2 = mysqli_query($conn,$query2);
                
                $allevents ='';
                
                while($row2 = mysqli_fetch_array($result2,MYSQLI_NUM)){
                    $eventname = $row2[0];
                    $eventcost = $row2[1];
                    $temp="
                        <div class=\"container\" style=\"display:flex;border-bottom:2px solid white;\">
                            <div class=\"event\" style=\"flex:2;\"><p style=\"font-family: 'Roboto', sans-serif;\">$eventname</p></div>
                            <div class=\"event\" style=\"flex:1;text-align:right\"><p style=\"font-family: 'Roboto', sans-serif;\">$eventcost</p></div>
                        </div>
                    ";

                    $allevents.= $temp;
                }

                $HTML ="
                        <div class=\"card-container\" style=\"font-family: 'Roboto', sans-serif;background-color: #ccddff;border-radius:12px;margin-bottom:15px;width: 50%;margin-left:200px;padding: 2px 16px;\"><h3 style=\"text-align:center;font-size:24px;\">$clubname</h3>
                        <div class=\"data\" style=\"font-family: 'Roboto', sans-serif;font-size:16px\">
                        $allevents
                        </div>
                        <div class=\"container\" style=\"display:flex;\">
                            <div class=\"event\" style=\"flex:2;\"><p style=\"font-family: 'Roboto', sans-serif;font-weight:bold;\">Total Amount Requested</p></div>
                            <div class=\"event\" style=\"flex:1;text-align:right\"><p style=\"font-family: 'Roboto', sans-serif;\">$requestedamount</p></div>
                        </div>
                        <form method=\"GET\" action=\"".$_SERVER["PHP_SELF"]."\">
                        <label for='amount' style=\"font-family: 'Roboto', sans-serif;font-weight:bold;text-transform:uppercase;\">Allocate Amount :
                        <input type='number' id='amount' name='amount' style=\"border:none;outline:none;border-radius:4px;margin-left:20px;padding:8px 12px;margin-bottom:8px;\">
                        <input type='number' id='reqamount' name='reqamount' value='$requestedamount' style=\"display:none;\">
                        <input type='submit' value='SUBMIT' name='$clubname' style=\"font-family: 'Roboto', sans-serif;margin-left:30px;cursor:pointer;background: #33cc33;color:white;font-size:18px;outline:none;border:none;padding:4px 12px;\">
                        </form>
                        </div>
                        
                ";
                echo $HTML;

            }
        }
}

function allotFund(){
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $con = mysqli_connect('localhost', 'root','', 'fundallocation');
        if($con == false){
            die("Error: Could not Connect".mysqli_connect_error());
        }else{
            $clubname = '';
            $grantedamount = 0;
            $requestedamount = 0;
            foreach($_GET as $key => $value){
                    if($value == 'SUBMIT'){
                        $clubname = $key;
                    }
                    if($key == 'amount'){
                        $grantedamount = (int)$value;
                    }
                    if($key == 'reqamount'){
                        $requestedamount = (int)$value;
                    }
            }
            // echo gettype($clubname);
            // echo gettype($grantedamount);
            // echo gettype($requestedamount);
            if($grantedamount > 0){
            $query = "
                    INSERT INTO grantedrequests(clubname, requestedamount, grantedamount)
                    VALUES('$clubname', $requestedamount, $grantedamount);
            ";
            $result = mysqli_query($con, $query);
            if(!$result){
                die('Could not retrieve');
            }else{
                $query = "
                    DELETE FROM fundrequests
                    WHERE clubname = '$clubname';
                ";
                $query2 = "DELETE FROM clubevents WHERE clubname = '$clubname' ";
                $result = mysqli_query($con, $query);
                $result2 = mysqli_query($con, $query2);
            }
        }
        }
    }
}

function granted_requests(){
    $conn = mysqli_connect('localhost', 'root', '', 'fundallocation');
        if($conn === false)
        {
            die("Error: Could not Connect".mysqli_connect_error());
        }
        else{
            $query = "SELECT * FROM grantedrequests";
            $result = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
                $clubname = $row[0];
                $requestedamount = $row[1];
                $grantedamount = $row[2];
                
                // while($row2 = mysqli_fetch_array($result2,MYSQLI_NUM)){
                //     $eventname = $row2[0];
                //     $eventcost = $row2[1];
                //     $temp="
                //         <div class=\"container\" style=\"display:flex;border-bottom:2px solid white;\">
                //             <div class=\"event\" style=\"flex:2;\"><p style=\"font-family: 'Roboto', sans-serif;\">$eventname</p></div>
                //             <div class=\"event\" style=\"flex:1;text-align:right\"><p style=\"font-family: 'Roboto', sans-serif;\">$eventcost</p></div>
                //         </div>
                //     ";

                //     $allevents.= $temp;
                // }

                $HTML ="
                        <div class=\"card-container\" style=\"font-family: 'Roboto', sans-serif;background-color: #99ff66;border-radius:12px;margin-bottom:15px;width: 50%;margin-left:200px;padding: 2px 16px;\"><h3 style=\"text-align:center;font-size:24px;\">$clubname</h3>
                        <div class=\"container\" style=\"display:flex;\">
                            <div class=\"event\" style=\"flex:2;\"><p style=\"font-family: 'Roboto', sans-serif;\">Total Amount Requested</p></div>
                            <div class=\"event\" style=\"flex:1;text-align:right\"><p style=\"font-family: 'Roboto', sans-serif;\">$requestedamount</p></div>
                        </div>
                        <div class=\"container\" style=\"display:flex;\">
                            <div class=\"event\" style=\"flex:2;\"><p style=\"font-family: 'Roboto', sans-serif;font-weight:bold;\">Total Amount Granted</p></div>
                            <div class=\"event\" style=\"flex:1;text-align:right\"><p style=\"font-family: 'Roboto', sans-serif;\">$grantedamount</p></div>
                        </div>
                        
                        </div>
                ";
                echo $HTML;

            }
        }
}

function newclub_requests() {
    $conn = mysqli_connect('localhost', 'root', '', 'fundallocation');
        if($conn === false)
        {
            die("Error: Could not Connect".mysqli_connect_error());
        }
        else{
            $query = "SELECT * FROM newclubs";
            $result = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
                $clubname = $row[0];
                $description = $row[1];

                $HTML ="
                <div class=\"card-container\" style=\"font-family: 'Roboto', sans-serif;background-color: #ffd9b3;border-radius:12px;margin-bottom:15px;width: 50%;margin-left:200px;padding: 2px 16px;\"><h3 style=\"text-align:center;font-size:24px;\"><a href=\"addclubs.php\" style=\"text-decoration:none;text-align:center;font-size:24px;color:black;\">$clubname</a></h3>
                <div class=\"event\" style=\"text-align:center\"><p style=\"font-family: 'Roboto', sans-serif;\"><a href=\"addclubs.php\" style=\"text-decoration:none;text-align:center;color:black;\">$description</a?</p></div>
                <div class=\"submit\"></div>
                </div>
                ";
                echo $HTML;
            }
        }

}


?> 