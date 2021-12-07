<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>justCircle</title>
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Just Circle</h1>
    <form name="test" method="get" action="main.php">
        <input type="text" size="40" name="firstDevice"> <br>
        <input type="text" size="40" name="secondDevice"> <br>
        <input type="submit" value="Отправить">
    </form>
    <div>
    <?php 
        $first = $_GET["firstDevice"];
        $second = $_GET["secondDevice"];
        $link = mysqli_connect('sql210.hostingem.ru','gnioo_30264237','78452710','gnioo_30264237_devices');
        if(mysqli_connect_errno()){
            echo 'Ошибка в подключении к базе данных ('.mysqli_connect_errno().'): '.mysqli_connect_error();
            exit();
        }
        function getDevice($link, $first){
            $sql1 = "SELECT * FROM `devices` WHERE `short_name` = $first";
            $result = mysqli_query($link, $sql1);
            $device = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $device;
        }
        function getSecondDevice($link, $second){
            $sql2 = "SELECT * FROM `devices` WHERE `short_name` = $second";
            $result = mysqli_query($link, $sql2);
            $secondDevice = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $secondDevice;
        }
        $device = getDevice($link, $first, $second);
        echo '<pre>';
        print_r($device);
        echo '</pre>';
        $secondDevice = getSecondDevice($link, $second);
        echo '<pre>';
        print_r($secondDevice);
        echo '</pre>';
    ?>
    <p1 id="searchResult">введите названия устройств</p1>
    </div>
</body>
</html>