<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="proses.php" method="post">
    <?php
    $nilai = 75;
    if($nilai >= 80){
        echo "Nilai A";
    }elseif($nilai >= 70){
        echo "Nilai B";
    }else {
        echo "Nilai C";
    }
    ?>
</form>
</body>
</html>
