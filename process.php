<?php
    require('connect.php'); // เรียกใช้ไฟล์...    
    mysqli_set_charset($conn, "utf8");

    function select($conn) {
        $sql = "SELECT text FROM to_do_list";
        $result = mysqli_query($conn, $sql);
       
        while ($row = mysqli_fetch_array($result)) {
            $text = $row['text'];
            echo "<p>- ".$text."</p>";    
        }
    }

    if (isset($_POST['text'])) {
        $text = $_POST['text'];
        if ($text != '') {
            $sql = "INSERT INTO to_do_list (text)
            VALUES ('$text')";
            $result = mysqli_query($conn, $sql);

            select($conn);
        }
    } else {
        select($conn);
    }
        
?>