<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESTAURANT MANAGEMENT SYSTEM</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="responsive.css"> -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap');
    </style>
    <style>
        .mapouter {
            position: relative;
            text-align: right;
            width: 100%;
            height: 400px;
        }

        .gmap_canvas {
            overflow: hidden;
            background: none !important;
            width: 100%;
            height: 400px;


        }

        .gmap_iframe {
            height: 400px !important;
        }

        .material-symbols-outlined {

            color: #0a0908;
            font-size: 2rem;

        }
        h3{
            font-size: 2rem;
        }
    </style>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="responsive.css">
</head>
<?php
session_start();
if ($_SESSION['user_name']) {

} else {

    header("Location: login.php");

}
;

//creating connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "trial";

$conn = mysqli_connect($servername, $username, $password, $database);

// $sql="select * from `order`";
$user = $_SESSION['user_name'];
$sql = "SELECT * FROM `order` WHERE itemname!=\"\" AND user='$user';";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
// echo $num;


?>
<!-- ---------------------sticky bar------------------------------ -->
<!-- <div class="leftbar"><span class="material-symbols-outlined">
            face
        </span>
        <a href="login.php"><span class="material-symbols-outlined">
                login
            </span></a>
        <a href="logout.php"><span class="material-symbols-outlined">
                logout
            </span></a>
        <a href="signp.php"> <span class="material-symbols-outlined">
                edit_square
            </span></a>




    </div> -->
    <a href="#home" class="circle">↑</a>
<!-- --------------------home front page------------------------------------ -->
<div class="home" id="home">
    <ul> <a href="logout.php">
            <span class="material-symbols-outlined">
                token
            </span>
        </a>
        <span class="head">
            RESTAURANT MANAGEMENT SYSTEM</span>
        <li><a href="#home">HOME</a></li>
        <li><a href="#menu">MENU</a></li>
        <li><a href="#staff">STAFF</a></li>
        <li><a href="#order">ORDER</a></li>

        <li><a href="#about">ABOUT US</a></li>

    </ul>



    <?php echo " <p>Welcome " . $_SESSION['user_name'] . "  !</p> " ?>
    <!-- <div class="left">
            <h2>This is our DBMS Project </h2>
            <h1>" <br> RESTAURANT MANAGEMENT SYSTEM <br>  &#09; &#09; &#09; &#09; &#09; &#09; &#09; &#09; &#09; &#09;" </h1>
        </div> -->
</div>
<!---------------------------------------menu--------------------------------------------------------- -->
<div class="main" id="menu">
    <div class="section-title">
        <h2>our menu</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, eum!</p>
    </div>
    <div class="menus">
        <div class="menu-column">
            <h4>breakfast</h4>
            <div class="single-menu">
                <div class="menuimage"><img src="Img/food (1).jpg" alt=""> <button onclick="additem()">Add +</button >
             </div>
                
                <div class="menu-content">
                    <h5>Bread<span>$50</span></h5>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
            <!-- <div class="single-menu">
                <img src="Img/food (2).jpg" alt="">
                <div class="menu-content">
                    <h5>Noodles<span>$50</span></h5>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
            <div class="single-menu">
                <img src="Img/food (3).jpg" alt="">
                <div class="menu-content">
                    <h5>Egg<span>$50</span></h5>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div> -->
            <!-- ---------------------------------------------dynamic menu item------------------------------------------ -->
            <?php
            require_once "connection.php";
            $sql2 = "SELECT * FROM `menu` WHERE mealtype = 'breakfast';";
            $result2 = mysqli_query($conn, $sql2);

            if ($result2 == true) {
                $num2 = mysqli_num_rows($result2);
                // echo $num2;  
                $i = 0;
                while ($row = mysqli_fetch_assoc($result2)) {

                    $foodstring = "\"Img/food (" . ($num2 + $i) . ").jpg\"";
                    // echo $foodstring;
                    echo "<div class=\"single-menu\">
                <img src=" . $foodstring . " alt=" . ">
                <div class=" . "menu-content" . ">
                    <h5>" . $row['name'] . "<span>₹" . ($row['price']) . "</span></h5>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>";
                    $i++;

                }
            } else {
                echo "no such data";
            }

            ?>

            <!-- --------------------------------------------dynamic card end------------------------------------------------- -->

        </div>
        <div class="menu-column">
            <h4>lunch</h4>
            <!-- <div class="single-menu">
                <img src="Img/food (4).jpg" alt="">
                <div class="menu-content">
                    <h5>food title <span>$50</span></h5>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
            <div class="single-menu">
                <img src="Img/food (5).jpg" alt="">
                <div class="menu-content">
                    <h5>food title <span>$50</span></h5>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
            <div class="single-menu">
                <img src="Img/food (6).jpg" alt="">
                <div class="menu-content">
                    <h5>food title <span>$50</span></h5>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div> -->
            <?php
            require_once "connection.php";
            $sql2 = "SELECT * FROM `menu` WHERE mealtype = 'lunch';";
            $result2 = mysqli_query($conn, $sql2);

            if ($result2 == true) {
                $num2 = mysqli_num_rows($result2);
                // echo $num2;  
                while ($row = mysqli_fetch_assoc($result2)) {
                    $foodstring = "\"Img/food (" . ($num2 + $i) . ").jpg\"";
                    // echo $foodstring;
                    echo "<div class=\"single-menu\">
                <img src=" . $foodstring . " alt=" . ">
                <div class=" . "menu-content" . ">
                    <h5>" . $row['name'] . "<span>₹" . ($row['price']) . "</span></h5>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>";
                    $i++;

                }
            } else {
                echo "no such data";
            }

            ?>
        </div>
        <div class="menu-column">
            <h4>dinner</h4>
            <!-- <div class="single-menu">
                <img src="Img/food (7).jpg" alt="">
                <div class="menu-content">
                    <h5>food title <span>$50</span></h5>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
            <div class="single-menu">
                <img src="Img/food (8).jpg" alt="">
                <div class="menu-content">
                    <h5>food title <span>$50</span></h5>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
            <div class="single-menu">
                <img src="Img/food (9).jpg" alt="">
                <div class="menu-content">
                    <h5>food title <span>$50</span></h5>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div> -->
            <?php
            require_once "connection.php";
            $sql2 = "SELECT * FROM `menu` WHERE mealtype = 'dinner';";
            $result2 = mysqli_query($conn, $sql2);

            if ($result2 == true) {
                $num2 = mysqli_num_rows($result2);
                // echo $num2;  
                while ($row = mysqli_fetch_assoc($result2)) {
                    $foodstring = "\"Img/food (" . ($num2 + $i) . ").jpg\"";
                    // echo $foodstring;
                    echo "<div class=\"single-menu\">
                <img src=" . $foodstring . " alt=" . ">
                <div class=" . "menu-content" . ">
                    <h5>" . $row['name'] . "<span>₹" . ($row['price']) . "</span></h5>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>";
                    $i++;

                }
            } else {
                echo "no such data";
            }

            ?>
        </div>
    </div>
</div>
<!-- ------------------------------------------staff--------------------------------------------------------------- -->
<div class="staff" id="staff"> <div class="staff-tittle">
        <h2>Our Staff</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio expedita quasi delectus nesciunt, fuga
            asperiores obcaecati!</p>
    </div>
    <!-- <div class="staffcontainer">
   
    <div class="staffrow">
        <h3>Management Staff</h3>
        <?php 
    require_once "connection.php";
    $sql4 = "SELECT * FROM `employees` WHERE r_service = 'management';";
    $result4 = mysqli_query($conn, $sql4);
    if ($result4 == true) {
        $num4 = mysqli_num_rows($result4);

            while ($row4= mysqli_fetch_assoc($result4)) {
                echo "<div class=\"staffcard\">
            <img src=\"Img/food (1).jpg\">
            <div class=\"staffcardbody\">
                <h2>" . ($row4['efname']) . " " . ($row4['elname']) . "</h2>
                <p>".($row4['description'])."</p>
            </div>
        </div>";
            
            }
         }


    ?>  
       
        
    </div>
    <div class="staffrow">
        <h3>Service staff</h3><?php 
    require_once "connection.php";
    $sql4 = "SELECT * FROM `employees` WHERE r_service = 'waiter';";
    $result4 = mysqli_query($conn, $sql4);
    if ($result4 == true) {
        $num4 = mysqli_num_rows($result4);
            $j = 1;
            while ($row4= mysqli_fetch_assoc($result4)) {
                echo "<div class=\"staffcard\">
            <img src=\"Img/waiter".($j).".jpg\">
            <div class=\"staffcardbody\">
                <h2>" . ($row4['efname']) . " " . ($row4['elname']) . "</h2>
                <p>".($row4['description'])."</p>
            </div>
        </div>";
                $j++;
            }
         }


    ?>  
    </div>
   
    <div class="staffrow">
        <h3>Hygene staff</h3>
        <?php 
    require_once "connection.php";
    $sql4 = "SELECT * FROM `employees` WHERE r_service = 'cleaning';";
    $result4 = mysqli_query($conn, $sql4);
    if ($result4 == true) {
        $num4 = mysqli_num_rows($result4);
      

            while ($row4= mysqli_fetch_assoc($result4)) {
                echo "<div class=\"staffcard\">
            <img src=\"Img/food (1).jpg\">
            <div class=\"staffcardbody\">
                <h2>" . ($row4['efname']) . " " . ($row4['elname']) . "</h2>
                <p>".($row4['description'])."</p>
            </div>
        </div>";
            
            }
         }?>
    </div>
    <div class="staffrow">
        <h3>Cashier & billing</h3>
        <div class="staffcard">
            <img src="Img/food (1).jpg" alt="">
            <div class="staffcardbody">
                <h2>Employee 1</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam dolor velit optio itaque totam.
                    Atque officia distinctio quas perspiciatis quod.</p>
            </div>
        </div>
        
       
       
        
    </div>
    </div> -->
</div>
<!-- --------------------------------------------------------Order--------------------------------------------------------- -->
<div class="order" id="order">
    <div class="ordertittle">
        <h2>Your Order Summary</h2>
        <ul>
            <li>
                <div class="button">
                   <a href="takeorder.php">Place your order </a>  
                </div>
               
            </li>
        </ul>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint voluptates doloribus necessitatibus dicta
            assumenda in pariatur deleniti?</p>
    </div>
    <div class="ordercontent">
        <table>
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Cost</th>
                </tr>

            </thead>
            <tbody>
                <?php
                $sum = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo " <tr>
                    <td>" . $row['itemname'] . "</td>
                    <td>" . $row['qty'] . "</td>
                    <td>" . $row['price'] . "</td>
                    <td>" . $row['cost'] . "</td>
                </tr>";
                    }

                    
                    ?>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td>--------------</td>
                    
                </tr>
                <tr>
                    <td>Total</td>
                    <td></td>
                    <td></td>
                    <td> <?php
                    $sql5= "SELECT SUM(`cost`) AS sumcost FROM `order` WHERE user='$user';";
                    $result5 = mysqli_query($conn, $sql5);
                        $num5 = mysqli_num_rows($result4);
                    $row5 = mysqli_fetch_array($result5);
                    echo $row5['sumcost'];

                     ?></td>
                </tr>
            </tbody>
        </table>

    </div>
</div>
<!-- --------------------------------------------------------About--------------------------------------------------------- -->
<div class="about" id="about">
    <div class="abouttittle">
        <h2>About US</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint voluptates doloribus necessitatibus dicta
            assumenda in pariatur deleniti?
            <br>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero tempore reprehenderit eveniet ratione.
            Culpa, minima? Assumenda mollitia ad quas quo, nulla numquam doloribus iure id culpa vel minima
            molestias
            tempore eveniet reiciendis dolorem laborum inventore saepe ab. Unde vel, modi, autem ex, optio commodi
            nisi
            numquam fugiat inventore aperiam assumenda.
        </p>
    </div>
    <div class="lowerleft">
        <div class="lowercontent">


        </div>
        <div class="mapouter">
            <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no"
                    marginheight="0" marginwidth="0"
                    src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=University of Oxford&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                    href="https://piratebay-proxys.com/">Piratebay</a></div>

        </div>
    </div>

</div>

<!-- <?php
    echo "php is working"
        ?> -->

<script src="index.js"></script>
</body>

</html>