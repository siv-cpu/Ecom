<?php
include('includes/connect.php');
include('./functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- title bar icon  -->
        <link rel="icon" type="image/x-icon" href="images\fav-icon.png">
        <title>E-commerce Site </title>
        <!--Bootstrap Cdn css-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <!-- font awasome Cdn -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- css link -->
        <link rel="stylesheet" href="style.css">
        <!-- jquery cdn   -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       
        <style>
                
        </style>


</head>

<body>
        <header >
                <!-- Nav Bar -->
                <div class="container-fluid p-0 nav_fst ">
                        <nav class="navbar navbar-expand-lg navbar-light bg-info">
                                <img src="images\ecommerce-icon.png" class="logo" style="width:3%;height:3%">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                                        <a class="navbar-brand" href="#"></a>
                                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                                <li class="nav-item active">
                                                        <a class="nav-link" href="index.php">HOME </a>
                                                </li>
                                                <li class="nav-item">
                                                        <a class="nav-link" href="#">PRODUCTS</a>
                                                </li>
                                                <li class="nav-item">
                                                        <a class="nav-link" href="#">REGISTER</a>
                                                </li>
                                                <li class="nav-item">
                                                        <a class="nav-link" href="#">CONTACT</a>
                                                </li>
                                               
                                                 <li class="nav-item">
                                                        <a class="nav-link" href="#"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><span class="badge-pill badge-dark"><?php cart_item();?></span></sup></a>
                                                </li>
                                                <li class="nav-item">
                                                        <a class="nav-link" href="#">Total Price:100/-</a>
                                                </li>

                                        </ul>
                                        <form class="form-inline my-2 my-lg-0" id="search" action="" method="get">
                                                <input class="form-control mr-sm-2" type="search" name="search_value" placeholder="Search" aria-label="Search">
                                                <input class="btn btn-outline-light my-2 my-sm-0" type="submit" name="search" value="Search"></input>
                                        </form>
                                </div>
                </div>
                </nav>



                <!-- cart function -->
                        <?php cart(); ?>               
                

                <!-- second child -->

                <nav class="navbar navbar-expand-lg navbar-dark navbar-dark bg-secondary p-3 nav_sec">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                <li class="nav-item ">
                                        <a class="nav-link" href="#">WELCOME GUEST </a>
                                </li>
                                <li class="nav-item ">
                                        <a class="nav-link" href="#">LOGIN</a>
                                </li>
                        </ul>
                </nav>


                <!-- third child -->
                <div class="bg-light nav_the">
                        <h3 class="text-center">Modern Ecommerce Platform</h3>
                        <p class="text-center">Come Fly The Friendly Ecommerce. We Bring The Good Cart To Life. </p>
                </div>
        </header>

        <section class="pro">

                <!-- fourth child -->

                <div class="row ">

                        <div class="col-md-10" id="display">
                                <div class="row">
                                        <!-- products -->
                                        <?php
                                        get_products();
                                        get_unique_cat(); //show unique products with category wise
                                        get_unique_brands();
                                        search_products();
                            // get user ip address:            
                                        // $ip = getIPAddress();  
                                        // echo 'User Real IP Address - '.$ip;  
                                        ?>

                                </div>
                        </div>

                        <div class="col-md-2 bg-secondary p-0">
                                <!-- sidenav           -->




                                <!-- brand display -->


                                <ul class="navbar-nav  text-center">
                                        <li class="nav-item bg-info">
                                                <a href="#" class="navlink text-light">
                                                        <h4>Derivery Brands</h4>
                                                </a>
                                        </li>

                                        <?php
                                        get_brands();
                                        ?>

                                </ul>


                                <!-- catogiries display -->



                                <ul class="navbar-nav me-auto text-center">
                                        <li class="nav-item bg-info">
                                                <a href="#" class="navlink text-light">
                                                        <h4>Catagories</h4>
                                                </a>
                                        </li>

                                        <?php

                                        get_cat();

                                        ?>

                                        </li>

                                </ul>
                                <div>

                                </div>
                        </div>

        </section>







        <footer class="foot">
                <!-- footer -->
                <div class="bottom bg-info p-1 text-center footer ">
                        <p>Copyright © 2023 A.J.Siva </p>
                </div>


        </footer>





        <!--Bootstrap Cdn js-->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>


<!-- <script>
                $(document).ready(function(){
                        $('#search').keyup(function(){
                           var search=$('#search').val();
                           if(search != ''){
                                $.post("common_function.php",{s:search},function(data){
                                        $('#display').html(data);
                           });
                        }  
                    })        
                });
        </script> -->