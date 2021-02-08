<?php


    function validate_student_login() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $errors = [];
            $con = mysqli_connect('localhost', 'root', '', 'fundallocation');
            if($con === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }else{
                $username    = $_POST["username"];
                $password    = $_POST["password"];
                $query =    "SELECT password FROM logindetails 
                            WHERE clubname = '$username'";
                $result = mysqli_query($con, $query);
                if(!$result){
                    die("ERROR: Could not connect.");
                }else{
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $row_cnt = mysqli_num_rows($result);
                    if($row_cnt == 1){
                        if($row["password"] == $password){

                            setcookie("student_loggedIn", $username, time() + (86400 * 30), '/');
                            // setcookie("professor_loggedIn", "", time() - 3600,"/");
                            setcookie("admin_loggedIn", "", time() - 3600,"/");

                            header("Location: http://localhost/ST3PROJECT/views/studentAccess.php");
                        }else{
                            $mssg = "
                                <div class=\"alert alert-danger alert-dismissible fade show \" role=\"alert\" style=\"display:block !important; margin-left:auto !important; margin-right:auto !important; top:3vh !important;\">
                                    <strong>Error!</strong> The credentials which you have entered, are not correct.
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                </div>
                            ";
                            $errors[] = $mssg;
                        }
                    }else{
                        $mssg = "
                        <div class=\"alert alert-danger alert-dismissible fade show \" role=\"alert\"  style=\"display:block !important; margin-left:auto !important; margin-right:auto !important;top:3vh !important;\">
                            <strong>Error!</strong> The credentials which you have entered, are not correct.
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                            </button>
                        </div>
                        ";
                        $errors[] = $mssg;
                    }
                }
                foreach($errors as $error){
                    echo $error;
                }
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
                $clubname = $_COOKIE["student_loggedIn"];

                $query = "SELECT * FROM fundrequests WHERE clubname = '$clubname' ";
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
                            </div>
                            
                    ";
                    echo $HTML;
    
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
                $clubname = $_COOKIE["student_loggedIn"];

                $query = "SELECT * FROM grantedrequests WHERE clubname = '$clubname' ";
                $result = mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
                    // $clubname = $row[0];
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

    function request_funds(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            
            $conn = mysqli_connect('localhost', 'root', '', 'fundallocation');
            if($conn === false){
                die("Error: Could not Connect".mysqli_connect_error());
            }
            else{
                $clubname      =   $_COOKIE["student_loggedIn"];
                $queryx = "DELETE FROM fundrequests WHERE clubname='$clubname' ";
                $resultx = mysqli_query($conn,$queryx);

                $queryy = "DELETE FROM clubevents WHERE clubname='$clubname' ";
                $resulty = mysqli_query($conn,$queryy);

                for($i=1; $i<=5; $i++){
                    $eventname = $_POST["event".$i];
                    $eventcost = $_POST["cost".$i];
                    $query = "INSERT INTO clubevents(clubname, eventname, eventcost) VALUES ('$clubname','$eventname','$eventcost')";
                    $result = mysqli_query($conn,$query);
                }
                
                $query2 = "SELECT SUM(eventcost) AS sum_cost FROM clubevents WHERE clubname='$clubname'";
                $result1 = mysqli_query($conn,$query2);
                $row = mysqli_fetch_assoc($result1); 
                $sum = $row['sum_cost'];
            
                 $query3 = "INSERT INTO fundrequests(clubname, requestedamount) VALUES ('$clubname','$sum')";
                $result2 = mysqli_query($conn,$query3);

                // setcookie("newclub_registered", $clubname, time() + (86400 * 30), '/');
                echo '
                        <script>
                        alert("Your request has been sent to the administrator for consideration.");
                        window.location.href="http://localhost/ST3PROJECT/views/studentAccess.php";
                        </script>';
                // // header("Location: http://localhost/ST3PROJECT/views/index.html");
            }
        }




    }

    
?>