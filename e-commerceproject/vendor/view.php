    <html>
    <head>

        <style>
            .own-card {
            width: 300px;
            height: 400px;
            display: inline-block;
            background-color: Thistle;
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
            font-style:Bold;
            color: Black; 
        }
        .price {
            font-size: 20px; 
            font-style:italic;
            color: MediumVioletRed; 
        }
        .detail {
            font-size: 16px;
            color: Blue;
        }
            
            img{
                width:80%;
            
            }
            .own-card img {
            width: 65%;
            height: auto;
            margin-bottom: 10px;
        }
        .own-card {
            position: relative;
            text-align: center;
        }

            .edit-button{
                background-color: #4CAF50;
                color: white;
                padding: 5px 10px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
                margin: 5px;
            }
            .delete-button {
                background-color: #4CAF50;
                color: white;
                padding: 5px 10px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
                margin: 5px;
            }
            .edit-button:hover {
                background-color: #3e8e41;
            }
            .delete-button:hover {
            background-color:#cc0000;
            }
        </style>
    </head>
</html>

<?php
include "authguard.php";

include "menu.html";


//$conn=new mysqli("localhost","root","","major_project",3306);
include "../shared/connection.php";

$sql_result=mysqli_query($conn,"select * from product where owner=$_SESSION[userid]");
while($dbrow=mysqli_fetch_assoc($sql_result)){
    echo "<div class='own-card'>
             <div class='name'>$dbrow[name]</div>
             <div class='price'>$ $dbrow[price]</div>
             <div class='detail'>$dbrow[detail]</div>
             <div class='pdtimg'>
                 <img src='$dbrow[impath]'>
            </div>
            <div>
                <a href='edit.php?pid=$dbrow[pid]'>
                     <button class='edit-button'>Edit</button>
                </a>
                    <button onclick='deletePdt($dbrow[pid])' class='delete-button'>Delete</button>
            </div>         
        </div>";
}
?>
<html>
    <body>
    <!--  -->
</body>
<script>
    function deletePdt(pid){
        res=confirm("Are you sure want to delete?")
        if(res){
            window.location.href='delete.php?pid=' + pid;
        }
    }
    </script>
    </html>