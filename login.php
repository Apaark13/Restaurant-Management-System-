


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login
    </title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap');
        *{
            font-family: 'Poppins', sans-serif;

        }
        body{
            background: url("Img/pexels-ella-olsson-1640772.jpg");
            background-size: cover;
            
        }
        .container {
            font-family: 'Poppins', sans-serif;

            display: flex;
            flex-direction: column;

            align-items: center;
            height: 80vh;
            justify-content: space-evenly;
           
        }



        form {
            width: 35rem;
            align-items: center;
          
             background-color: #f8f8ff99;
            
        
             border-radius: 10px;
             padding: 2rem;
        }
        form h1{
            text-align: center;
        }


        .formgroup {
            display: flex;
            flex-direction: column;
            margin: 1rem auto;
        }
       

        .formgroup label,
        input,button {
            font-size: 1.5rem;

            margin: 1px 5px;
            padding: 5px 10px;
            border-radius: 5px;
        }
        button{
            padding:2px 10px;
        }
        button:hover{
            padding:2px 10px;
            background-color: aliceblue;
            cursor:pointer;
        }

        .formgroup input {
            background-color: rgba(202, 202, 202, 0.75);
            font-size:1.3rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="#" method="post">
            <h1>Login to our Restaurant Management System </h1>
            <div class="formgroup">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter the username">
            </div>
            <div class="formgroup">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter the password">
            </div>
            <button type="submit" name="login">submit</button>
        </form>
    </div>
    <script>
        function problemn(){
            alert("wrong password");
        }
    </script>
</body>


</html>
<?php 
require "connection.php";
// echo"php is running";

if (isset($_POST['login'])){
    
    $username=$_POST['username'];
    $password=$_POST['password'];
    // $sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password');";
    
    $sql = "SELECT * FROM `users` WHERE `username`='$username';";   
    $result=mysqli_query($conn,$sql);
    $num= mysqli_num_rows($result);
    $row=mysqli_fetch_assoc($result);

    // echo $num;
    // echo $row['password'];
    if(($result==true)&&($row['password']==$password)){
        echo "username exists";

        session_start();
        $_SESSION['user_name'] = $row['username'];
        echo $_SESSION['user_name'];
        header("Location:index.php");
        exit();
        
        // $_SESSION['id'] = $row['id'];
    }
    else{
        echo"error";
        echo '<script type="text/javascript">',
     'problemn();',
     '</script>'
;
    }
}

   
?>