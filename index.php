<?php
    session_start();
    if (!isset($_SESSION['attempt'])) {
        $_SESSION['attempt'] = 97;
        $_SESSION['starting'] = $_SESSION['attempt'];
    }
    if (!isset($_SESSION['score'])) {
        $_SESSION['score'] = 5000;
    }
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database ="kbc";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    // Check connection error
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // else continue with logic
    if($_SESSION['attempt']<$_SESSION['starting']+14) {
        $sql = "SELECT * FROM questions WHERE id =".$_SESSION['attempt'];
        // insert in db
        $result = $conn->query($sql);
        if($result){
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $_SESSION['current']=$row;
                }
            } else {
                $finish = "Final Score is: ".$_SESSION['score'];
            }
        } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo '
        <style>
            #end{
            position: fixed;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            background: #ffffff;
            z-index: 10;
            }

        </style>

        <div id="end">
        <h1>You have won KBC!</h1>
        </div>
        ';
    }
    $conn->close();
    //vanish
    // $path = "img/" . $new_name;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESSA Presents KBC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    
    
    <div class="centerbox">
        <div class="myContainer">
            <div class="header">
                <div class="logo">
                    <img height="70" width="70" src="img/logo.png" alt="">
                </div>
                ESSA presents KBC
            </div>
            <div class="question">
                
                <?php echo $_SESSION['current']['question']; ?>
            </div>
            <form action= "<?php echo $_SERVER['PHP_SELF'];?>" method="POST" id="answered">
                <div class="options" id="<?php echo $_SESSION['current']['answer'];?>">
                    <div class="option" id="divoption1" >
                        <input type="radio" id="option1" name="option" value="option1" required>
                        <?php echo $_SESSION['current']['option1'];?>                            
                    </div>
                    <div class="option" id="divoption2" >
                        <input type="radio" id="option2" name="option" value="option2">
                        <label for="option2"><?php echo $_SESSION['current']['option2'];?></label>
                    </div>
                    <div class="option" id="divoption3" >
                        <input type="radio"  id="option3" name="option" value="option3">
                        <?php echo $_SESSION['current']['option3'];?>
                    </div>
                    <div class="option" id="divoption4" >
                        <input type="radio" id="option4" name="option" value="option4">
                        <?php echo $_SESSION['current']['option4'];?>
                    </div>
                </div>
            <div class="submitfield">
                <div class="stbtn">
                    <div>
                        <p onclick="myFunction()" id="check" class="btn btn-primary lock">Check</p>
                        <audio id="audioW" src="wrong.mp3"></audio>
                        <audio id="audioR" src="right.mp3"></audio>
                    </div>
                </div>
                <div class="stbtn">
                    <input type="submit" name="answered" class="btn btn-primary lock">  
                </div>
                <div class="score" id="score">
                Question for: <?php echo $_SESSION['score'];?>
                </div>
            </div>
            </form>
            <?php
            if($_POST) {
                if ($_POST['answered']) {
                    if($_POST['option'] == $_SESSION['current']['answer']) {
                        // $_SESSION['score'] = $_SESSION['score'] * 2;
                        if($_SESSION['attempt']<$_SESSION['starting']+7) {
                            $_SESSION['score'] = $_SESSION['score'] * 2;
                        }
                        if ($_SESSION['attempt']==$_SESSION['starting']+7) {
                            $_SESSION['score'] = $_SESSION['score'] + 610000;
                        }
                        if ( ($_SESSION['attempt']>$_SESSION['starting']+7) and ($_SESSION['attempt']<$_SESSION['starting']+11)) {
                            $_SESSION['score'] = $_SESSION['score'] * 2;
                        }
                        if (($_SESSION['attempt']==$_SESSION['starting']+11)) {
                            $_SESSION['score'] = $_SESSION['score'] + 60000000;
                        }
                    } else {
                    }
                    $_SESSION['attempt'] = $_SESSION['attempt'] + 1;
                    header('Location: index.php');
                }
            }?>
            <?php
            // if(isset($finish)) {
            //     echo '<div class = "overlay">Bole toh, Game Over!<br>
            //     Final Score is '.$_SESSION['score'].'</div>';
            // }
            ?>
        </div>
    </div>
    <div class="moneymeter">
            <img src="img/<?php echo $_SESSION['score']?>.png">
    </div>
    <div class="lifelines">
        <img class="lifeline" id="exp" onclick="vanish1()" src="img/1.png">
        <img class="lifeline" id="50" onclick="vanish2()" src="img/2.png">
        <img class="lifeline" id="int" onclick="vanish3()" src="img/3.png">
    </div>
    <?php if($_SESSION['attempt']<$_SESSION['starting']+5)
    echo '
    <div class="timer" >
        <div id="timer">
        </div>
    </div>'
    ;?>
    <div class="audio">
        <audio id="nextQ" src="nextq.mp3"></audio>
    </div>
    <?php if($_SESSION['attempt']<$_SESSION['starting']+5)
    echo '
    <style>
        .centerbox {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(-45deg, #a54149 , #2a0845, #450816);
            background-size: 400% 400%;
            animation: gradient 3s ease infinite;
            height: 100%;
            width: 100%;
        }
    </style>'
    ;?>
    <?php if($_SESSION['attempt']>$_SESSION['starting']+5)
    echo '
    <style>
        .centerbox {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(-45deg, #6441A5, #2a0845);
            background-size: 400% 400%;
            animation: gradient 18s ease infinite;
            height: 100%;
            width: 100%;
        }
    </style>'
    ;?>
    <?php if($_SESSION['attempt']>$_SESSION['starting']+11)
    echo '
    <style>
        .centerbox {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(-45deg, #a54149, #45081e);
            background-size: 400% 400%;
            animation: gradient 18s ease infinite;
            height: 100%;
            width: 100%;    
        }
    </style>'
    ;?>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>
