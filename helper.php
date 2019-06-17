<?php
// s = success, e = error , i = info, w = warning
function msg($msg,$type='i'){
    if($type=='s'){
        $class = 'success';
        $title = 'Success' ;
    }elseif($type=='i'){
        $class = 'info';
        $title = 'Info' ;
    }elseif($type=='e'){
        $class = 'danger';
        $title = 'Error' ;
    }elseif($type=='w'){
        $class = 'warning';
        $title = 'Warning' ;
    }
    ?>

    <div class="alert alert-<?=$class?> role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <strong><?=$title?>!</strong> <?php echo $msg; ?>
    </div>
    <?php
}
?>