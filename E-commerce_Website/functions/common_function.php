<?php
//connect file
include("./includes/connect.php");
//condition is isset or not


   
//getting products
    function get_products(){
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
                     
                      <a href='index.php?add_to_cart=".$row['id']."' class='btn btn-info'>Add Cart</a>
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


      //search products with keyword


      function search_products(){
       
        global $con;  
        if (isset($_GET['search'])) {
            //  echo "<script>alert('clicked')</script>";
            $search=$_GET['search_value'];
            
            $select_query = "Select * from `product_table` where product_keyword like '%$search%'";
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
                   
                    <a href='index.php?add_to_cart=".$row['id']."' class='btn btn-info'>Add Cart</a>
                      <a href='view.php?id=".$row['id']."' class='btn btn-dark'>View</a>
                   </div>   
            </div>
            </div>  
    </div>";
   
        }
    }

 }


        


//getting unique categories
function get_unique_cat(){
    global $con;
    if(isset($_GET['categories'])){
        $category_id =$_GET['categories'];
            
            $select_query = "Select * from `product_table` where category_id='$category_id' ";
            $result = mysqli_query($con,$select_query);
            $num_of_row = mysqli_num_rows($result);
            if( $num_of_row == 0){

                echo"<script>alert('product out of stock')</script>";
                
            }else{
                while($row =mysqli_fetch_assoc($result)){
                    echo " 
              <div class='col-md-4 w-100'>
              <div class='card-deck' >
                      <img src='./images/$row[product_image1]' class='card-img-top' alt='...'>
              <div class='card-body'>
                      <h5 class='card-title text-center'>$row[product_title]</h5>
                      <p class='card-text text-center'>".number_format($row['product_price'],2)."/-</p>
                     <div class='text-center'>
                     
                      <a href='index.php?add_to_cart=".$row['id']."' class='btn btn-info'>Add Cart</a>
                        <a href='view.php?id=".$row['id']."' class='btn btn-dark'>View</a>
                     </div>   
              </div>
              </div>  
      </div>";
     
                }
            }
           
}
}


//get unique brands click based in id and fetch data from Db

function get_unique_brands(){
    global $con;
    if(isset($_GET['brand'])){
        $brand_id =$_GET['brand'];
            
            $select_query = "Select * from `product_table` where brand_id='$brand_id' ";
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
                     
                      <a href='index.php?add_to_cart=".$row['id']."' class='btn btn-info'>Add Cart</a>
                        <a href='view.php?id=".$row['id']."' class='btn btn-dark'>View</a>
                     </div>   
              </div>
              </div>  
      </div>";
     
            }
}
}

//get brands
    function get_brands(){
            global $con;
        $select_query= "select * from `brands`";
        $result = mysqli_query($con,$select_query);
        while($row_data = mysqli_fetch_assoc($result)){
                echo "<li class='nav-item'>
                <a href='index.php?brand=$row_data[brand_id]' class='navlink text-light'><h5>$row_data[brand_title]</h5></a>";
        };
}

//get categories

    function get_cat(){
                global $con;
                $select_query = "Select * from categories";
                $result = mysqli_query($con,$select_query); 

                while($row_data = mysqli_fetch_assoc($result)){
        //id ah url la show panrathuku href la vangirukom.    
                echo "<li class='nav-item ''>
                <a href='index.php?categories=$row_data[category_id]' class='navlink text-light'><h5>$row_data[category_title]</h5></a>";
                }
    }

    // get the ip address function

  
    function getIPAddress() {  
    //whether ip is from the share internet  
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        }  
    //whether ip is from the remote address  
        else{  
                $ip = $_SERVER['REMOTE_ADDR'];  
        }  
        return $ip;  
    }  

    //cart_function

    function cart(){
        global $con;
        if (isset($_GET['add_to_cart'])) {
           $get_ip = getIPAddress();
           $get_id = $_GET['add_to_cart'];
           
           $select_query = "Select * from `cart_details` where ip_address='$get_ip' and id='$get_id'";
            $result =mysqli_query($con, $select_query);
            $num_of_row = mysqli_num_rows($result);

            if ($num_of_row > 0) {
                echo "<script>alert('already present the item')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }else{
                $insert_query = "insert into `cart_details` (id,ip_address,quantity) values ($get_id,'$get_ip',0)";
                $result = mysqli_query($con,$insert_query);
                echo "<script>alert('added u r cart successfully')</script>";
                echo "<script>window.open('index.php','_self')</script>";

            }


        }



  }
        
    //displaying cart item in icon
    
    function cart_item(){
  
        if (isset($_GET['add_to_cart'])) {
            global $con;
            $get_ip = getIPAddress();
         
            
            $select_query = "Select * from `cart_details` where ip_address='$get_ip'";
            $result =mysqli_query($con, $select_query);
            $count = mysqli_num_rows($result);
        
        }else{
            global $con;
            $get_ip = getIPAddress();
       
            
            $select_query = "Select * from `cart_details` where ip_address='$get_ip'";
            $result =mysqli_query($con, $select_query);
            $count = mysqli_num_rows($result);
        }
        echo "$count";
    }





?>