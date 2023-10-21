<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<style>
.regimage{
    padding: 0px; 
    margin-bottom: 50px;
    background-attachment: fixed;
    background-size: cover;
    float: right;
    width: 750px;
    height: 800px;
    position: absolute;
    right: 30px;
}
    .rbox{
    margin-top: 5px;
    margin-left: 100px;
    padding-left: 40px;
    padding-right: 50px;
    padding-top: 10;
    width: 30%;
    height: 600px;
    background-color:aliceblue;
    float: left;
    border-radius: 15px;
    margin-bottom: 25px;
}
.tfields{
    padding: 10px;
    margin-top: 20px;
    margin-bottom: 10px;
    border: 2px solid olive;
    border-radius: 10px;
    width:90%;
}
.nav{
    position: relative;
}
</style>
<body>
    <div class="nav">
    <ul>
            <li><a href="./login.php">Login</a></li>
            <li><a href="./about.php">About</a></li>
            <li><a href="./home.php">Home</a></li>
  </ul>
  </div>
  <div class="regimage">
    <img class="regimage" src="imgs/6368592.png" alt="">
        </div>
<div class="rbox">
    <p class="spaned">Create Account</p>
    <p id="p2">Get started by creating an account</p>
    <form action="register.php" method = "post">
        <input type="text" name="username" class="tfields" placeholder="Username"><br>
        <input type="text" name="email" class="tfields" placeholder="Email"><br>
        <input type="password" name="password" class="tfields"  placeholder="Password"><br>
        <input type="password" name="confirm_password" class="tfields"  placeholder="Confirm password"><br>
        <input type="submit" value="Register" name="register" class="tfields"><br>
    </form>
    <?php
include("conn.php");
if(isset($_POST["register"])){
    $uname = $_POST["username"];
    $email = $_POST["email"];
    $pass = md5($_POST["password"]);
    $conf = md5($_POST["confirm_password"]);
   // $hash = password_hash($pass,PASSWORD_DEFAULT);
   if($conf==$pass){
    $query = "INSERT INTO user(username,email,password) VALUES('$uname','$email','$pass')";

    try{
    mysqli_query($conn,$query);
    echo "Welcome you have registered succesfully!";
    }
    catch(mysqli_sql_exception){
        echo "Something went wrong";
    }
}
else{
    echo '<p style="color: red;">password mismatch!<p>';
}
}

?>
    </div>
</body>
</html>
</body>
</html>
