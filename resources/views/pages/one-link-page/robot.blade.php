<?php
//        echo 'robot.php start';
    echo 'Sender_IP='.$_SERVER['REMOTE_ADDR'].'<br>';
    rbt_start();

//    foreach (DB::table('turn')->where('t_status','=',0)->orderBy('id','DESC')->get() as $item) {
//        echo '<br>id='.$item->id.'   '.$item->t_command.'   rep='.$item->t_repeat;
//    }
//    $item=DB::table('turn')->where('t_status','=',0)->orderBy('id','desc')->first();
//    if ($item) echo $item->id;
?>