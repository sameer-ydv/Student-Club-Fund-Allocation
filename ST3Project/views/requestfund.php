<?php
    require "../php/function_studentAccess.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Request Funds</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Arimo:700|Montserrat|Oswald|PT+Sans&display=swap');
        @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
    body, html{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background: #34495e;
    }
    form{
        background: #191919;
        margin: 50px 65px 0 65px;
        padding-bottom: 12px;
    }
    h1{
        margin-top: 40px;
    color: white;
    text-transform: uppercase;
    font-weight: 500;
    text-align: center;
    font-family:'Roboto', sans-serif;
}

    .flex-container{
        display: flex;
    }
    .events{
        flex: 1;
        margin: 16px 0;
        text-align: center;
    }
    .events label, .costs label{
        font-size: 1.3rem;
        font-family: 'Montserrat', sans-serif;
        text-transform: uppercase;
        color: white;
    }
    .events input, .costs input{
        padding: 8px 16px;
        color: white;
        font-size: 1.3rem;
        margin-left: 12px;
        border-radius: 8px;
        border: none;
        outline: none;
        background: none;
    }
    input[type="submit"] {
        margin-top: 10px;
        padding: 10px 18px;
        font-family:'Roboto', sans-serif;
        font-size: 18px;
        outline: none;
        color: white;
        border: none;
        border-radius: 4px;
        text-align: center;
        background-color: #2ecc71;
        margin-left: 580px;
    }
    input[type="submit"]:hover{
        cursor: pointer;
    }
    .costs{
        flex: 1;
        text-align: center;
        margin: 16px 0;
    }
    

    </style>
</head>
<body>
    <div>
        <?php
        request_funds();
        ?>
    </div>

    <h1>Request Funds for Events</h1>
    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <div class="flex-container">
            <div class="events">
                <label for="event1" required>Name of Event</label>
                <input type="text" name="event1">
            </div>
            <div class="costs">
                <label for="event_cost">Cost</label>
                <input type="number" name="cost1" id="">
            </div>
        </div>
        <div class="flex-container">
            <div class="events">
                <label for="event2" required>Name of Event</label>
                <input type="text" name="event2">
            </div>
            <div class="costs">
                <label for="event_cost">Cost</label>
                <input type="number" name="cost2" id="">
            </div>
        </div>
        <div class="flex-container">
            <div class="events">
                <label for="event3" required>Name of Event</label>
                <input type="text" name="event3">
            </div>
            <div class="costs">
                <label for="event_cost">Cost</label>
                <input type="number" name="cost3" id="">
            </div>
         </div>
                <div class="flex-container">
                        <div class="events">
                            <label for="event4" required>Name of Event</label>
                            <input type="text" name="event4">
                        </div>
                        <div class="costs">
                            <label for="event_cost">Cost</label>
                            <input type="number" name="cost4" id="">
                        </div>
                    </div>
                    <div class="flex-container">
                            <div class="events">
                                <label for="event5" required>Name of Event</label>
                                <input type="text" name="event5">
                            </div>
                            <div class="costs">
                                <label for="event_cost">Cost</label>
                                <input type="number" name="cost5" id="">
                            </div>
                        </div>    
             <input type="submit" value="Request" name="submit">           

    </form>
</body>
</html>