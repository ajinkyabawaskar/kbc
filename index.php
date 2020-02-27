<?php
    session_start();
    if (!isset($_SESSION['attempt'])) {
        $_SESSION['attempt'] = 29;
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
    if($_SESSION['attempt']<$_SESSION['starting']+13) {
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
    } 
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESSA Presents KBC</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    <div class="centerbox">
        <div class="myContainer">
            <div class="header">
                ESSA presents KBC
            </div>
            <div class="question">
                <?php echo $_SESSION['current']['id'];?>. 
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
                        <?php echo $_SESSION['current']['option2'];?>
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
            if(isset($finish)) {
                echo '<div class = "overlay">Bole toh, Game Over!<br>
                Final Score is '.$_SESSION['score'].'</div>';
            }
            ?>
        </div>
    </div>
    <div class="moneymeter">
            <img src="img/<?php echo $_SESSION['score']?>.png">
    </div>
    <?php if($_SESSION['attempt']<$_SESSION['starting']+5)
    echo '
    <div class="timer" >
        <div id="timer">

        </div>
    </div>'
    ;?>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>
