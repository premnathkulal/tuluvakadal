<!DOCTYPE html>
<html>
    <head>
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css" />
    </head>
    <body>
            <?php
                require "php/init.php";
                session_start();
                $search_key =  $_SESSION['search_k'];
                //echo($search_key);
                $query = "select * from user_post WHERE topic LIKE '%$search_key%' and verifed = '1'";
                //echo("<br>".$query);
                $result = mysqli_query($con, $query);
                $no_result = mysqli_num_rows($result);
                $search_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                echo("<u>".$no_result." Results found for ' ".$search_key." '</u><br><br>");
                foreach($search_data as $row){
                    $post_article = $row['content'];
                    $info = "";
                    $counter = 0;
                    for($i=0; $i<strlen($post_article); $i++){
                        if($post_article[$i] == '<'){
                            if($counter > 500){
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
                                if($row['topic'] == $info){
                                    $info = "";
                                    $counter -= 1;
                                }
                            }
                        }
                    }

                    ?>
                    <a style="text-decoration: none;" href="php/post_session.php?post_id=<?php echo $row['id']; ?>&catogory=<?php echo $row['post_type']; ?>" target="_blank">                        
                       <h3><u><?php echo $row['topic']; ?></u></h3>
                       <?php 
                            $info = str_replace("&nbsp;"," ",$info);
                            $str = str_replace("&nbsp; "," ",$info);
                            echo(substr($str,0,200)."...");
                       ?>
                    </a>
                    <br>
                <?php
                }
            ?>
             <hr>
             <a href="https://www.google.com/search?q=<?php echo $search_key; ?>" style="text-decoration: none; color:green;" target="_blank"><i class="ti-search"></i>&nbsp;Search for ' <?php echo $search_key; ?> ' on Google</a>
    <body>
<html>
