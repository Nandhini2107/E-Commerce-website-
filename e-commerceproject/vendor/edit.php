
<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            
            form {
                max-width: 500px;
                margin: 0 auto;
                padding: 20px;
                border: 2px solid Teal;
                border-radius: 5px;
                box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
                background-color: PaleGreen;
            }
            label {
                display: block;
                margin-bottom: 10px;
                font-weight: bold;
            }
            input[type='text'], input[type='number'], textarea {
                width: 100%;
                padding: 10px;
                border: 2px solid Magenta;
                border-radius: 5px;
                box-shadow: 0px 0px 2px rgba(0,0,0,0.1);
                margin-bottom: 20px;
            }
            input[type='file'] {
                margin-bottom: 20px;
            }
            input[type='submit'] {
                background-color: Olive;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
            }
            input[type='submit']:hover {
                background-color: #3e8e41;
            }
        </style>
    </head>
    <body>
    
        <?php
        include "authguard.php";
        include "menu.html";

        $pid=$_GET['pid'];

        //$conn=new mysqli("localhost","root","","major_project",3306);
        include "../shared/connection.php";

        $sql_result=mysqli_query($conn,"select * from product where pid=$pid");
        $dbrow=mysqli_fetch_assoc($sql_result);

        echo "<form action='update.php' method='post' enctype='multipart/form-data'>
                <input type='hidden' name='pid' value='$pid'>
                <label>Name:</label>
                <input type='text' name='name' value='$dbrow[name]' required><br>
                <label>Price:</label>
                <input type='number' name='price' value='$dbrow[price]' required><br>
                <label>Detail:</label>
                <textarea name='detail' required>$dbrow[detail]</textarea><br>
                <label>Image:</label>
                <input type='file' name='image'><br>
                <input type='submit' value='Update'>
            </form>";
        ?>
    </body>
</html>

