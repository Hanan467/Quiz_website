<?php
session_start();
function questions($qid,$qno){
include("conn.php");
$query = "SELECT question FROM questions where qtype = 'dsa' and qid = '$qid'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$question = $row["question"];
echo "$qno:$question";
echo "<br>";
}
function options($qid){
include("conn.php");
$query2 = "SELECT qoption FROM option where qid = '$qid'";
$result = mysqli_query($conn,$query2);
while($row = mysqli_fetch_assoc($result)){
   $option[] = $row['qoption'];
}
for($i=0;$i<4;$i++) {  
 echo "<li><input type='radio' name='$qid' id='option' value='".$option[$i]."' required/> ".$option[$i]."</li>";
}
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
    <link rel="stylesheet" href="">
    <style>
      .questions{
      margin-left: 100px;
      padding-left: 10px;
      padding-top: 30px;
      width: 75%;
      height: 600px;
      background-color:aliceblue;
      font: bold;
      font-family:monospace;
      font-size: larger;
      margin-top: 30px;
      overflow-y: scroll;
     } 
     .O{
      list-style-type: none;
      padding:5px;
     }
     li{
      list-style-type: none;
     }
    </style>
</head>
<body>
   <div class="questions" id="q">  
      <form action="result.php" method="$_GET">
<p id="pp">
<?php
$qid = 11;
$qno=1;
?>
</li >

<?php
   $total  = 0;
   while($qid<21){   
    echo"<br>";   
    questions($qid,$qno);
    echo"<br>";
    options($qid);
    echo"<br>";  
    $ans = $_GET["$qid"];
    $fans=answers($qid);    
   if($ans==$fans){
      $total++;   
   }
   $qid++;
   $qno++;
   }
   //$_SESSION['m'] = $total; 
   ?>
   <a href="./result.php?mark=<?php echo $total ?>">Submit</a>
<?php  
//echo '<a href="./result.php?mark=' . $total . '>Submit</a>';   
if(isset($_GET["Submit"])){
   //echo $total;
   }  
?>
</form>
   </div> 
   <script>
      button=document.getElementById('b');
      function check()
    {
      var selectedOption = document.querySelector('input[type=radio]:checked');
      var answer = selectedOption.value;
      if(<?php $ans==$fans ?>)
      {
        document.getElementsByName('option').style.color="green";         
      }
      else{
        document.getElementsByName('option').style.color="red";         

          }
    } 
      
   </script>
</body>
</html>