
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Tuluvakadal</title>
    <link rel="icon" href="img/favicon.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css" />
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css" />
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css" />
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css" />
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="img/favicon.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="ckeditor/ckeditor.js"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
    <style> 
        table { 
            border-collapse: collapse; 
            width: 100%; 
        } 
          
        th, td { 
            text-align: left; 
            padding: 8px; 
        } 
          
        tr:nth-child(even) { 
            background-color: rgba(0,0,0,0.2); 
        } 

        tr:nth-child(odd) { 
            background-color: rgba(0,0,0,0.1); 
        } 
        #myInput{
            width: 50%; /* Full-width */
            font-size: 10px; /* Increase font-size */
            padding: 12px 20px 12px 40px; /* Add some padding */
            border: 1px solid #ddd; /* Add a grey border */
            margin-bottom: 12px; /* Add some space below the input */
        }

        #myTable {
            border-collapse: collapse; /* Collapse borders */
            width: 100%; /* Full-width */
            border: 1px solid #ddd; /* Add a grey border */
            font-size: 12px; /* Increase font-size */
        }


        #myTable tr {
            /* Add a bottom border to all table rows */
            border-bottom: 1px solid #ddd;
        }

        #myTable tr.header, #myTable tr:hover {
            /* Add a grey background color to the table header and on hover */
            background-color: #f1f1f1;
        }
    </style> 
    
  </head>

  <body>    <!--::header part start::-->

        <?php
            require "php/init.php";
            $query = "select * from tulu_chapter";
            $result = mysqli_query($con, $query);
            $tulu_chapter = mysqli_fetch_all($result, MYSQLI_ASSOC);
        ?>

        <header class="main_menu home_menu" style="background-color: #1c1130;">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                  <a class="navbar-brand" href="index.php">
                    <img src="img/logo.png" alt="logo" />
                  </a>
                  <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="ti-menu"></span>
                  </button>

                  <div
                    class="collapse navbar-collapse main-menu-item justify-content-center"
                    id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-center">
                          <li class="nav-item">
                               <a class="nav-link" href="#login_section"></a>
                          </li>
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </header>
        <!-- Header part end-->
          <br><br><br><br>
          <!-- our_service start-->
          <section class="our_service">
              <div class="container">

                <form action="" method="POST">
                    <h2><strong>Upload Article To Learn Tulu Page</strong></h2>
                    <textarea class="ckeditor" name="editor" ></textarea>
                    <br>
                    Enter the Topic name : <input type="text" name="topic" required>
                    <br><br>
                    Select Chapter Id :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    <input type="text" name = "chap_id"  required/>
                    <button type="button" class="btn" style="background-color:#AF7AC5;" onclick="view_list();">View Chapter List</button>
                    <button type="button" class="btn" style="background-color:#A569BD;"  onclick="create_chapter();">Create New Chapter</button>
                    <br><br>
                    <input class="button" type="submit" name="submit_p"/>
                </form>
                
                <button id="view_list" type="button" value="123" style="display:none;" data-toggle="modal" data-target="#view_list_popup">Search</button>
               
                <script>
                  function view_list(){
                    document.getElementById('view_list').click();
                  }
                  function create_chapter(){
                    Swal.mixin({
                          input: 'text',
                          confirmButtonText: 'Create',
                          showCancelButton: true
                        }).queue([
                          'Enter Chapter Name'
                        ]).then((result) => {
                          if (result.value) {

                            var antNum = result.value;
                            $.post("php/creare_chapter.php", {antNum});

                            Swal.fire({
                              title: 'All done!',
                              html:
                                'Chapter Name is <pre><code><br>' +
                                  result.value +
                                '</code></pre>',
                              confirmButtonText: 'Ok'
                            })
                          }
                        })
                    }
                    
                </script>

              </div>
            </section>
            <!-- our_service part end-->
    <br><br><br>
     <!-- footer part start-->
     <?php include "footer.php"; ?>
    
     
    <div class="modal fade" id="view_list_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height:90%;">
        <div class="modal-dialog" style="height:100%;">
            <div class="modal-content" style="height:100%;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chapter list</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search here.."/><br><br>
                      <table id="myTable" width="100%" border="1px" style="color:black;">
                        <tr>
                          <th width="15%"><center>Chapter Id</center></th>
                          <th><center>Chapter Name</center></th>
                        </tr>
                        <?php foreach($tulu_chapter as $row){ ?>
                            <tr>
                              <td><center><?php echo $row['id']; ?></center></td>
                              <td><center><?php echo $row['chapter_name']; ?></center></td>
                            </tr>
                        <?php } ?>
                      <table>
                </div>
            </div>
        </div>
    </div>

    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- isotope js -->
    <script src="js/isotope.pkgd.min.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>

    <script>
      function myFunction() {
          // Declare variables
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          // Loop through all table rows, and hide those who don't match the search query
          for (i = 0; i < tr.length; i++) {
              td1 = tr[i].getElementsByTagName("td")[0];
              td2 = tr[i].getElementsByTagName("td")[1];
              if (td || td2) {
              txtValue1 = td1.textContent || td1.innerText;
              txtValue2 = td2.textContent || td2.innerText;
              if ((txtValue1.toUpperCase().indexOf(filter) > -1) || (txtValue2.toUpperCase().indexOf(filter) > -1)) {
                  tr[i].style.display = "";
              } else {
                  tr[i].style.display = "none";
              }
              }
              
          }
      }
    </script>
  </body>
  <?php 
  if(isset($_POST['submit_p'])){
    
      require "php/init.php";
      $topic = $_POST['topic'];
      $text = $_POST['editor'];
      $today =  date("Y-m-d");
      $chap_id = $_POST['chap_id']; 
      $query = "INSERT INTO tulu_topic(chapter_id,topic,content,date) VALUES ($chap_id,'$topic','$text','$today');";
      if(mysqli_query($con,$query)){
        echo "Success";
      }else{
        echo "please enter correct chaptr Id";
      }
      unset($_POST['submit_p']);
      
    }
  ?>
</html>









