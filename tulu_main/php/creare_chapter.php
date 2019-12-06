<?php
    require "init.php";
    $antNum = $_POST['antNum'][0];
    mysqli_query($con,"insert into tulu_chapter(chapter_name) values('$antNum')");
?>