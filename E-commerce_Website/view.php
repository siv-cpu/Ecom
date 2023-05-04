<?php
   
    if (isset($_GET['id'])) {
       echo 'correct';
       if (!isset($_GET['categories'])) {
        if (!isset($_GET['brand'])) {
            if (!isset($_GET['search'])) {
       
    global $con;
    $select_query = "Select * from `product_table` order by rand() limit 6";
    $result = mysqli_query($con,$select_query);
    while($row =mysqli_fetch_assoc($result)){
          echo " 
          <div class='col-md-4 w-100'>
          <div class='card-deck' >
                  <img src='./images/$row[product_image1]' class='card-img-top' alt='...'>
          <div class='card-body'>
                  <h5 class='card-title text-center'>$row[product_title]</h5>
                  <p class='card-text text-center'>".number_format($row['product_price'],2)."/-</p>
                 <div class='text-center'>
                 
                  <a href='index?pid' class='btn btn-info' >Add Cart</a>
                    <a href='view.php?id=".$row['id']."' class='btn btn-dark'>View</a>
                 </div>   
          </div>
          </div>  
  </div>";
 
    }
            }
        }
    }
    }
?>