<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>result</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .rbox{
    margin-top: 30px;
    margin-left: 100px;
    padding-left: 100px;
    padding-top: 10;
    width: 30%;
    height: 550px;
    background-color:aliceblue;
    float: left;
    border-radius: 15px;
}
    </style>
</head>
<body>
    <div class="rbox">
<?php
if(isset($_GET['mark'])){
//$result=$_SESSION['m'];
$result = $_GET['mark'];
if ($result>=5){
echo "Congrajulation you passed the quiz!!";
echo " Your total score is: $result";
}
else{
     echo "Sorry you failed the quiz u can always try again";
     echo " Your total score is: $result";
}
}
session_destroy();
?>
    </div>
</body>
</html>
