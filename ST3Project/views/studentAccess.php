<?php
 require "../php/function_studentAccess.php";
// allotfund();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/studenthome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <title>Club Home</title>
</head>
<body>
    <div class="header">
        <div class="head1"><h2>Student Chapter Fund Allocation</h2></div>
        <div class="head2"><h1>Welcome <?php $user = $_COOKIE["student_loggedIn"];
                    echo $user;?></h1></div>
    </div>
    <div class="flex-container">
        <div class="column1">
            <div class="menu-item">
                <ul>
                    <li class=""><a href="#" id="pending">Pending Requests</a></li>
                    <li class= ""><a href="#" id="granted">Granted Requests</a></li>
                    <li class= ""><a href="./requestfund.php" id="requestfunds">Request Funds</a></li>
                    <li class= ""><a href="../logout-system/stud_logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="column2" style="border:none;">
            <div id="pending1">
            <?php
           
                pending_requests();
            ?>
            </div>
            <div id="granted1" style="display:none;">
            <?php
                 granted_requests();
            ?>
            </div>
             <div id="new1" style="display:none;">
            //<?php
            
              //  gen_requests();
            //?> -->
             </div> 
        </div>

    </div>
    <script type="text/javascript">
    
    
    document.getElementById('granted').addEventListener('click', function(){

    });
    $(document).ready(function(){
        
        $("#pending").click(function(){
            $("#pending1").css("display", "block");
            $("#granted1").css("display", "none");
            
        })

        $("#granted").click(function(){
            $("#granted1").css("display", "block");
            $("#pending1").css("display", "none");
            
        })

        // $("#newclubs").click(function(){
        //     $("#new1").css("display", "block");
        //     $("#granted1").css("display", "none");
        //     $("#pending1").css("display", "none");
        // })

    });

    // function toggle_granted() {
    //     windows.alert("you clicked me");
    //     // document.getElementByClassName("granted").style.display="block";
    //     // document.getElementByClassName("pending").style.display="none";
    //     // document.getElementByClassName("new").style.display="none";
    //     // return true;
    // }
    
    </script>
</body>
</html>