<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    
        $sql = "SELECT * FFROM data;";
        $result = mysqli_query($conn, $sql);
        $datas = array();

        if (mysqli_num_rows($result) > 0)
        {
            while ($row = mysqli_fetch_assoc($result))
            {
                // $datas[] = $row;
                echo $row['text'];
            }
        }

        foreach ($datas as $data)
        {
            echo $data['text'];
        }

        foreach ($datas[0] as $data)
        {
            echo $data;
        }

    ?>
</body>
</html>