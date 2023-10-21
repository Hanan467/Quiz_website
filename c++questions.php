<?php
session_start();

function questions($qid){
include("conn.php");
$query = "SELECT question FROM questions where qtype = 'c++' and qid = '$qid'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$question = $row["question"];
echo "$qid:$question";
echo "<br>";
}
function options($qid){
include("conn.php");
$query2 = "SELECT qoption FROM option where qid = '$qid'";
$result = mysqli_query($conn,$query2);
while($row = mysqli_fetch_assoc($result)){
   $option[] = $row['qoption'];
}
 echo "<li><input type='radio' name='$qid' id='option1' value='".$option[0]."' required/> ".$option[0]."</li>";
 echo "<li><input type='radio' name='$qid' id='option2' value='".$option[1]."' required/> ".$option[1]."</li>";
 echo "<li><input type='radio' name='$qid' id='option3' value='".$option[2]."' required/> ".$option[2]."</li>";
 echo "<li><input type='radio' name='$qid' id='option4' value='".$option[3]."' required/> ".$option[3]."</li>";

}
function answers($qid){
   include("conn.php");
   $query3 = "SELECT option.qoption FROM option,answers where option.qid='$qid' and option.oid=answers.oid";
$result = mysqli_query($conn,$query3);
$row = mysqli_fetch_assoc($result);
$answer = $row["qoption"];
return $answer;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>questions</title>
    <link rel="stylesheet" href="styles.css">
    <style>
      .questions{
      margin-left: 100px;
      padding-left: 10px;
      padding-top: 30px;
      width: 65%;
      height: 600px;
      background-color:#ADD8E6;
      font: bold;
      font-family:monospace;
      font-size: larger;
      margin-top: 30px;
      overflow-y: scroll;
      scroll-behavior: smooth;
      border-radius: 20px;
      position: absolute;
      top: 5px;
      left: 15px;
     }
     .O{
      list-style-type: none;
      padding:5px;
     }
     li{
      list-style-type: none;
     }
     ::-webkit-scrollbar {
    display: none;
}
    </style>
</head>
<body>

   <div class="questions" id="q">  
      <form action="result.php" method="$_GET">
<p id="pp">
<?php
$qid = 1;
/*$qi=1;
questions($qid);
?>
</p>
<ul id="u">
<li id ="l">
<?php
options($qid);*/
?>
</li >

<?php
   $total=0;
   while($qid<11){
    
    echo"<br>";   
    questions($qid);
    echo"<br>";
    options($qid);
    echo"<br>";  
    error_reporting(E_ERROR | E_PARSE);
    $ans = $_GET["$qid"];
    $fans=answers($qid);
    error_reporting(E_ERROR | E_PARSE);

   if($ans==$fans){
      $total++;
   }
   $qid++;
   //error_reporting(E_ERROR | E_PARSE);
   }
   $_SESSION['results']=$total;   
   ?>
<a href="./result.php">submit</a>
<?php

   /*if(isset($_GET["submit"])){
      header("location:result.php");
      exit;
   }*/

?>   

</form>
   </div> 
   <script>
      button=document.getElementById('b');

      function check() {
  var selectedOptions = document.querySelectorAll('input[type=radio]:checked');
  var answer = [];
  for (var i = 0; i < selectedOptions.length; i++) {
    answer.push(selectedOptions[i].value);
  }

  if (<?php $ans==$fans ?>) {
    document.querySelectorAll('input[name="<?php $qid?>"]').forEach(function(el) {
      el.style.color = "green";
    });
  } else {
    document.querySelectorAll('input[name="<?php $qid?>"]').forEach(function(el) {
      el.style.color = "red";
    });
  }
}
      
   </script>
  
</body>
</html>
