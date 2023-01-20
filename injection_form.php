<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>023-Kittipat</title>
</head>
<body>
    <h1>Search Patient</h1>
    <form action="injection_form.php" method="GET">
    <input type="text" placeholder="Enter Patient Name" name="P_Name">
    <br><br>
    <input type="submit">
    </form>
</body>
</html>

<?php
if(isset($_GET['P_Name'])):
    echo"<br>" . $_GET['P_Name'];
    require 'connect.php';
    $count = 0;
    $sql = "SELECT * FROM patient,permissions WHERE patient.P_id = permission.P_CID AND P_Name = :P_Name";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':P_Name',$_GET['P_Name']);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    echo "<br> *************** <br>";

    while($row = $stmt->fetch()) {
        echo $row['P_Name'].' '.$row['P_debt'].' '.$row['P_Username']."<br/>";
        $count++;
    }
    //echo "count ... "$count;
    if($count==0)
        echo"<br>No data ... <br>";
        $conn = null;
endif;
?>