<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>023-Kittipat</title>
</head>
<body>
    <?php
    require "connect.php";
    if(isset($_GET["P_Name"]))
    {
        $strP_Name = $_GET["P_Name"];
        echo"<br>"."strP_Name = ".$strP_Name;
    
        $sql = "SELECT * FROM patient,permissions WHERE P_Name LIKE %'" . $strP_Name ."'%";
    
        echo "<br>" . " sql =
        " .$sql . "<br>";
    
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // print_r($result);

    }

    ?>
    
    <table width="300" border="1">
        <tr>
            <th width="325">ชื่อ</th>
            <td width="240"><?php echo $result["P_Name"]; ?></td>
        </tr>

        <tr>
            <th width="130">ยอดหนี้</th>
            <td><?php echo $result["P_debt"]; ?></td>
        </tr>

        <tr>
            <th width="130">บัญชีผู้ใช้</th>
            <td><?php echo $result["P_Username"]; ?></td>
        </tr>

    </table>
    <?php
    $conn = null;
    ?>

</body>
</html>