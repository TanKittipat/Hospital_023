<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Patient</title>
</head>
<body>
    <h1>Add new Patient</h1>
    <form action="addPermission.php" method="POST">
        <input type="text" placeholder="Enter Patient ID" name="PID">
            <br> <br>
        <input type="text" placeholder="Enter Patient Username" name="Email">
            <br> <br>
        <input type="submit">
    </form>
    
</body>
</html>

<?php
    if(!empty($_POST['PID'])&& !empty($_POST['Email'])):
        require 'connect.php';
        $sql = "INSERT INTO permissions VALUES (:PID,:Email)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':PID',$_POST['PID']);
        $stmt->bindParam(':Email',$_POST['Email']);

        if($stmt->execute()):
            $message = 'Successful add new Permission';
            header('location:select_All.php');
        else:
            $message = 'Failed to add new Permission';
        endif;
        echo '<br>';
        echo $message;
        $conn = null;
    endif;

?>