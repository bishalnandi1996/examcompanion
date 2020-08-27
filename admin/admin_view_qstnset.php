<?php
	require 'admin_authenticate.php';
	require 'admin_header.php';
?>

<div id="accordion">

<?php

function loadQstn($strmID,$link) {
    $content="";
    $i=1;
    $sql_qstn="select * from question where question.strm_id=".$strmID;
    $result_qstn=mysqli_query($link,$sql_qstn);
    while($row_qstn=mysqli_fetch_assoc($result_qstn)) {
        $content.="<div class='row' style='font-weight: bold;'>".$i.") ".$row_qstn['qstn_name']."</div>";
        $i++;
    }
    return $content;
}


$sql="select * from stream";
$result=mysqli_query($link,$sql);
    while($row=mysqli_fetch_assoc($result)) {
        echo '<div class="card">
            <div class="card-header" id="headingOne">
                <h6 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse'.$row['strm_id'].'" aria-expanded="true" aria-controls="collapse'.$row['strm_id'].'">
                '.$row['strm_name'].'
                </button>
                </h6>
            </div>

            <div id="collapse'.$row['strm_id'].'" class="collapse" aria-labelledby="heading'.$row['strm_id'].'" data-parent="#accordion">
                <div class="card-body">
                '.loadQstn($row['strm_id'],$link).'
                </div>
            </div>
        </div>';
    }
?>


</div>

<?php
	require 'admin_footer.php';
?>