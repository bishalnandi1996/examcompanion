<?php
    require 'tchr_authenticate.php';
    
    $question=new stdClass();
    $i=1;
    $c="qstn_name";
    foreach($_POST as $key=>$val) {
        if((int)$key==0) {
            $qstn[$c]=$val;
            $c="qstn_time";
        }
        else {
            $sql="select * from question_subjectwise where question_subjectwise.subj_id=".$key." order by rand() limit ".$val;
            $result=mysqli_query($link,$sql);
            while($row=mysqli_fetch_assoc($result)) {
                $question->$i=new stdClass();
                $question->$i->question=$row['qstn'];
                $question->$i->a=$row['option_a'];
                $question->$i->b=$row['option_b'];
                $question->$i->c=$row['option_c'];
                $question->$i->d=$row['option_d'];
                $question->$i->answer=strtolower($row['answer']);
                $i++;
            }
        }
    }

    $question=json_encode($question);

    $file_key=substr(hash("md5",rand(),FALSE),0,16); # key for encryption and decryption
    $iv=substr(hash("md5",rand(),FALSE),0,16); # $iv=initial vector
    $question=openssl_encrypt($question,"aes-128-cbc",$file_key,TRUE,$iv);

    $tchr_id_forqstn=explode('_',$_GET['user']);
    $sql="select strm_id from teacher where teacher.tchr_id=".$tchr_id_forqstn[1];
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);

    $sql="insert into question(qstn_key,qstn_name,qstn_vector,strm_id,time) values('".$file_key."','".$qstn['qstn_name']."','".$iv."',".$row['strm_id'].",".$qstn['qstn_time'].")";
    mysqli_query($link,$sql);

    $sql="select * from question where question.qstn_key='".$file_key."' and question.qstn_vector='".$iv."'";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);
    $file_name=$row['qstn_id'];
    $file_handle=fopen("../questions/".$file_name,"w");
    fwrite($file_handle,$question);
    fclose($file_handle);

    header('Location: tchr_create_qstn_set.php?user='.$_GET['user'].'&key='.$_GET['key'].'&status=1');
?>