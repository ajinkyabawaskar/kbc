<?php
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
    
    $id = $_POST['id'];
    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $answer = $_POST['answer'];

    // else continue with logic
    $sql = "INSERT INTO questions (question, option1, option2, option3, option4, answer)
    VALUES ('$question', '$option1', '$option2', '$option3', '$option4', '$answer')";

    // insert in db
    if ($conn->query($sql) === TRUE) {
        echo '<script type="text/javascript">
        alert("Upload successful!");
        </script>';
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();

?>