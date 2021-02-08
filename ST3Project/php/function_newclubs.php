<?php

    function register_details() {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            
            $conn = mysqli_connect('localhost', 'root', '', 'fundallocation');
            if($conn === false){
                die("Error: Could not Connect".mysqli_connect_error());
            }
            else{
                $clubname      =   $_POST["name"];
                $description   =   $_POST["description"];

                $query = "INSERT into newclubs(clubname , descr) VALUES ('$clubname', '$description')";
                $result = mysqli_query($conn,$query);

                // setcookie("newclub_registered", $clubname, time() + (86400 * 30), '/');
                echo '
                        <script>
                        alert("Your request has been sent to the administrator for consideration.");
                        window.location.href="http://localhost/ST3PROJECT/views/index.html";
                        </script>';
                // header("Location: http://localhost/ST3PROJECT/views/index.html");
            }
        }
    }   

?>