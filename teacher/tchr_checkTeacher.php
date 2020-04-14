<?php
    require '../linkDB.php';

    $sql="select * from teacher where tchr_employee_id='".mysqli_real_escape_string($link,$_GET['emp'])."'";
    $result=mysqli_query($link,$sql);

    if(mysqli_num_rows($result)==0) {
        echo "0";
    }
    else {
        $row=mysqli_fetch_assoc($result);
        if($row['tchr_signup']==1)
            echo "1";
        else
            echo "2";
    }
?>