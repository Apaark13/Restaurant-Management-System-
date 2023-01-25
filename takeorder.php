<?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database="trial";
session_start();

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    // echo "Connection was successful<br>";
}

// Query to show elements in slidebar in the itemname/foodname input 
$sql="select * from `menu`";
$result=mysqli_query($conn,$sql);
if($result){
    // echo "The data was fetched successfully!<br>";
}
$num= mysqli_num_rows($result);
// echo $num;

// --------------------------------------------------------------------------
// taking the field input from forms by post method using $POST_ array 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
$foodname=$_POST['itemname'];
$qty=$_POST['qty'];
$sqlprice = "SELECT *  FROM `menu` WHERE `name` = '$foodname';";
$resultprice=mysqli_query($conn,$sqlprice);
if($resultprice){
    // echo "price was fetched !<br>";
}
$rowprice=mysqli_fetch_assoc($resultprice);
$price=$rowprice['price'];
// echo $price;
$cost=$price*$qty;
$foodname=$_POST['itemname'];
$user=$_SESSION['user_name'];

// -----------------------------------------------------------------------------
// Query to input element and store it into database 

$sql3 = "INSERT INTO `order` (`sno`,`itemname`, `qty`, `price`, `cost`,`user`) VALUES ('','$foodname', '$qty', '$price', '$cost','$user');";
$result3 = mysqli_query($conn, $sql3);
// -------------------------------------------------------------------------------------
// Check for the database creation success
if($result3){
    // echo "record inserted!<br>";
}
else{
    echo "The db was not created successfully because of this error ---> ". mysqli_error($conn);
}
// --------------------------------------------------------------------------------



}


  
?>
<!-- -------------------------------------pre-php-end----------------------------------------------------------------- -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>takeorder</title>
    <link rel="stylesheet" href="takeorder.css">
    <!-- ---------------------------------------------------style------------------------------------------- -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap');

       
    </style>
</head>
<!-- -------------------------------------- body here --------------------------- -->

<body>
    <div class="fbody">
         
        <form action="/DBMS_PROJECT/takeorder.php" method="post">
            <div class="form">

                <!-- <input type="text" name="itemname" id="foodname" placeholder="Enter Food Name"> -->
                <h3>Choose your meal-item <br></h3>
                <select id="itemname" name="itemname">
                    <option value="">-select-an-option-</option>
                    <?php while($row=mysqli_fetch_assoc($result)){
            
            echo "<option value=".$row['name'].">".$row['name']."</option>";
        //    echo"<option value=".$row['name'].">"."value ".$row['name']."</option>";
           }?>


                </select>
                <h3>Select qty of item <br></h3>
                <input type="number" name="qty" id="qty" placeholder="Qty">



                
                <button type="submit">submit</button>
                <button type="button" href="index.php"> <a href="index.php#order"> Done </a></button>

                
            </div>

        </form>
       


    </div>


</body>

</html>