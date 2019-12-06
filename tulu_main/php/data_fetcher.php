<?php

    function get_data($parm){
            require "init.php";

            $post_article =  $parm;

            $strFirstImage = "";
            $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_article, $ContentImages);
            $strFirstImage = $ContentImages[1][0];
            
            $flag = 1;
            $info = "";
            $counter = 0;
            for($i=0; $i<strlen($post_article); $i++){
                if($post_article[$i] == '<'){
                    if($counter > 0){
                        break;
                    }
                    $f = 0;
                }else if($post_article[$i] == '>'){
                    $f = 1;
                }
                if($f == 1){
                    if($post_article[$i] != '>'){
                        $counter += 1;
                        $info = $info.$post_article[$i];
                    }
                }
            }
            return array($strFirstImage, $info);
    }
?>