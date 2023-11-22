<?php
    $link = mysqli_connect("sdb-54.hosting.stackcp.net",
                        "Pasha1-353030360654",
                        "mypage12", "Pasha1-353030360654");

    if(mysqli_connect_error()){
        die("error");
    }

    

    $queryUpdate = "UPDATE users SET email = 'someon123@co.uk'  WHERE id = '2' LIMIT 1";

    mysqli_query($link, $queryUpdate);

    $query = "SELECT * FROM users";

    if($result = mysqli_query($link,$query)){  
        $row = mysqli_fetch_array($result);

        echo "Your email is " . $row [1]. " and your password " . $row [2];
    }
?>
