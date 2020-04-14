<?php
    require '../linkDB.php';

    $sql="select * from student where st_univ_roll=".mysqli_real_escape_string($link,$_GET['roll']);
    $result=mysqli_query($link,$sql);

    if(mysqli_num_rows($result)==0) {
        echo "0";
    }
    else {
        $row=mysqli_fetch_assoc($result);
        if($row['st_signup']==1)
            echo "1";
        else
            echo "2";
    }
?>