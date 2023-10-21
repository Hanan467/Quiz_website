<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    .loginbox{
    margin-top: -600px;
    margin-left: 100px;
    padding-left: 100px;
    padding-top: 10;
    width: 30%;
    height: 550px;
    background-color:aliceblue;
    float: left;
    border-radius: 15px;

}
.textfields{
    padding: 10px;
    margin-top: 20px;
    margin-bottom: 10px;
    border: 2px solid olive;
    border-radius: 10px;
    width:60%;
}
.login{
    padding: 10px;
    margin-top: 10px;
    margin-bottom: 10px;
    margin-left: 97px;
    border: 2px solid olive;
    border-radius: 10px;
    width:20%;
}
.createacc{
margin-top: 50px;
padding-left: 15px;
}

.logimage{
    padding-top:10px ;
    background-attachment: fixed;
    background-size: contain;
    float: right;
    width: 650px;
    height: 700px;
    margin-right: -50px; 

}
.createacc a{
    text-decoration: none;
    font-size: larger;
}
</style>
<body>
        <div class="nav">
        <ul>
            <li><a href="./home.php">Home</a></li>
            <li><a href="./about.php">About</a></li>
            <li><a href="./home.php">Login</a></li>
        </ul>
        <img src="imgs/menu_5259008.png" alt="" class="menu-icon">
        </div>
    <div class="logimage">
    <img class="logimage" src="imgs/6343845.png" alt="">
        </div>
<div class="loginbox">
    <br>
    <p class="spaned">Welcome back!</p>
    <p id="p1">You have been missed</p>
    <form action="login.php" method = "post">
        <input type="text" name="email" class="textfields" placeholder="Email"><br>
        <input type="password" name="password" class="textfields"  placeholder="Password"><br>
        <input type="submit" value="Login" name="login" class="login"><br>
    </form>
    <?php
    
    include("conn.php");

    if(isset($_POST["login"])){
        if(empty($_POST["email"]))
        {
            echo '<p style="color: red;">please enter your email<p>';
        }
        elseif(empty($_POST["password"])){
            echo '<p style="color: red;">please enter your password<p>';
        }
        else{
    $email = $_POST["email"];
    $pass = md5( $_POST["password"]);
    if( filter_var($email,FILTER_VALIDATE_EMAIL)){
        $email =  filter_var($email,FILTER_VALIDATE_EMAIL);
        $hash = password_hash($pass,PASSWORD_DEFAULT);
    $query = "SELECT * FROM user where email ='$email' and password ='$pass'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count == 1){
        header("location:choosequiz.php");
        exit;
    }
    else{
        echo '<p style="color: red;">Login failed. Incorrect username or password<p>';
    }
    }
    else{
        echo '<p style="color: red;">Invalid email!<p>';
    } 
}
}
    ?>
    <div class="createacc">
        <p>Don't have an account? <a href="./Register.php"style="display: inline-block;"><span class="loginspan">create an account</span></a></p>
    </div>
    </div>
</body>
</html>
