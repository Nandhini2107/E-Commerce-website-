<html>
    <head>
        <style>
            body {
            font-family: Arial, sans-serif;
            background-color: Orchid;
            margin: 0;
            padding: 0;
        }

        .own-card {
            width: 300px;
            height: 400px;
            display: inline-block;
            background-color: MistyRose;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            margin: 10px;
            padding: 10px;
            box-sizing: border-box;
            overflow: hidden;
        }

        .own-card:hover {
            transform: scale(1.05);
        }

        .own-card div {
            margin-bottom: 5px;
        }

        .name {
            font-size: 25px; 
            font-weight: bold; /* Updated from font-style */
            color: Black; 
        }

        .price {
            font-size: 20px; 
            font-style: italic;
            color: #9F10C8; 
        }

        .detail {
            font-size: 16px;
            font-style: oblique;
            color: Blue;
        }

        .own-card img {
            width: 75%;
            height: auto;
            margin-bottom: 10px;
        }
        .own-card {
            position: relative;
            text-align: center;
        }

        


        .order-form {
            width: 70%;
            margin-top: 20px;
            padding: 12px;
            background-color: Yellow; /* Blue color */
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
}

.order-form:hover {
    background-color: #0056b3; /* Darker blue on hover */
}

        
            
        </style>
        
    </head>
</html>           




<?php
include "authguard.php";

include "menu.html";


//$conn=new mysqli("localhost","root","","major_project",3306);
include "../shared/connection.php";

$sql_result=mysqli_query($conn,"select * from cart join product on cart.pid=product.pid where userid=$_SESSION[userid]");

$total=0;
while($dbrow=mysqli_fetch_assoc($sql_result)){
    $total=$total+$dbrow["price"];
    echo "<div class='own-card'>
             <div class='name'>$dbrow[name]</div>
             <div class='price'>Price: $$dbrow[price]</div>
             <div class='detail'>Description:$dbrow[detail]</div>
             <div class='pdtimg'>
                 <img src='$dbrow[impath]'>
            </div>
            <div>            
            
            <button class='p-1 btn btn-danger'onclick ='deleteCart($dbrow[cartid])' >Remove Cart</button>
            


            </div>         
        </div>";
}

echo"<div class ='mt-3'>
   <form method='post' action='placeholder.php' class='w-50'>
        <h3>Place Order</h3>
        <textarea  class='form-control' name='address' placeholder='Enter Delivery Address'></textarea>
        <input value='$total' hidden name='total'><br>
        <button class='p-3 btn btn-success'>Place Order $.$total  </button>


   </form>

   
  </div>";
?>
<html>
    <body>
</body>
<script>
    function deleteCart(cartid){
        res=confirm("Are you sure want to delete?")
        if(res){
            window.location.href='delete.php?cartid=' + cartid;
        }
    }
    </script>
</html>

