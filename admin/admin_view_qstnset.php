<?php
	require 'admin_authenticate.php';
	require 'admin_header.php';
?>

<div id="accordion">

<?php

function loadQstn($strmID,$link) {
    $content="<table class='table table-striped'>";
    $content.="<thead>
                <tr>
                    <th>Sl No.</th>
                    <th>Question Name</th>
                    <th>Created By</th>
                    <th>Date</th>
                </tr>
            </thead>";
    $content.="<tbody>";
    $i=1;
    $sql_qstn="select qstn_name, tchr_name, qstn_key, qstn_vector, time, qstn_date from question, teacher where question.tchr_id=teacher.tchr_id and question.strm_id=".$strmID;
    $result_qstn=mysqli_query($link,$sql_qstn);
    while($row_qstn=mysqli_fetch_assoc($result_qstn)) {
        $content.="<tr>";
        $content.="<td>".$i."</td>";
        $content.="<td>".$row_qstn['qstn_name']."</td>";
        $content.="<td>".$row_qstn['tchr_name']."</td>";
        $content.="<td>".$row_qstn['qstn_date']."</td>";
        $content.="</tr>";
        $i++;
    }
    $content.="</tbody>";
    $content.="</table>";
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