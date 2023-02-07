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
    <form action="addPatient.php" method="POST">
        <input type="text" placeholder="Enter Patient ID" name="ID">
            <br> <br>
        <input type="text" placeholder="Enter Patient Name" name="Pname">
            <br> <br>
        <input type="Date" placeholder="Enter Patient Birthdate" name="Birth">
            <br> <br>
        <input type="text" placeholder="Enter Patient Debt" name="Debt">
            <br> <br>
        <input type="submit">
    </form>
    
</body>
</html>

<?php
    if(!empty($_POST['ID'])&& !empty($_POST['Pname'])&& !empty($_POST['Birth'])&& !empty($_POST['Debt'])):
        require 'connect.php';
        $sql = "INSERT INTO patient VALUES (:ID,:Pname,:Birth,:Debt)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ID',$_POST['ID']);
        $stmt->bindParam(':Pname',$_POST['Pname']);
        $stmt->bindParam(':Birth',$_POST['Birth']);
        $stmt->bindParam(':Debt',$_POST['Debt']);

        if($stmt->execute()):
            $message = 'Successful add new Patient';
            header('location:addPermission.php');
        else:
            $message = 'Failed to add new Patient';
        endif;
        echo '<br>';
        echo $message;
        $conn = null;
    endif;

?>