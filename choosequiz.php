<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>choosequiz</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .cardgp{
    max-width: 1260px;
    display: flex;
    column-gap: 16px;
    padding: 50px;
    margin-left: 100px;
    /*overflow-x: scroll;*/
}
.card{
    flex: 0 0 300px;
    display: flex;
    flex-direction: column;
    height: 370px;
    background-image: linear-gradient(85deg,#434343,#ADD8E6);
    padding: 32px;
    box-shadow: -16px 0 32px rgba(0, 0, 0, 0.5);
    border-radius: 8px;
    transition: transform 250ms;
}
.card:not(:first-child){
    margin-left: -130px;
}
.card:hover{
    transform:translate(-8px,-16px)rotate(3deg);
}
.card:hover~.card{
    transform: translateX(130px);
}
.cardgp p{
    color:black;
    font-family: sans-serif;
}
.cardgp input{
    width: 100px;
    height: 40px;
    margin-left: 20px;
    margin-top: 25px;
    background-color: #ADD8E6;
    border-radius: 10px;
    border: transparent;

}
h2{
    font-size: 40px;
    font-style: oblique;
    color:darkslategray;
}
    </style>
</head>
<body>
    <h2><center>Pick Your Topic Of Interest</center></h2>
    <div class="cardgp">
        <article class="card">
            <h3>C++</h3>
            <p>10 multiple-choice questions covering basic syntax, variables, operators, control flow, functions, arrays, strings, classes, objects, pointers, references, input/output, and exceptions.</p>
            <form action="" method="$_GET">
            <input type="submit" name="c++" value="Take quiz">
            </form>

        </article>
        <article class="card">
            <h3>JAVA</h3>
            <p>Test your knowledge of the basics of Java with this 10-question multiple-choice quiz. Topics covered include variables, operators, control flow, methods, arrays, strings, classes, objects, inheritance, polymorphism, interfaces, and exceptions.</p>
            <form action="" method="$_GET">
            <input type="submit" name="java" value="Take quiz">
            </form>
        </article>
        <article class="card">
            <h3>DSA</h3>
            <p>This quiz is designed to test your knowledge of the basics of data structures and algorithms. It is a 10-question multiple-choice quiz that covers topics like Searching,Sorting,linked lists,stacks,queues and trees </p>
            <form action="" method="$_GET">
            <input type="submit" name="dsa" value="Take quiz">
            </form>
           
        </article>
        <article class="card">
            <h3>CSS</h3>
            <p>This quiz is designed to test your knowledge of the basics of Cascading Style Sheets (CSS). It is a 10-question multiple-choice quiz that covers the following topics:Selectors,Properties,Values,Units,Layout and Animations</p>
            <form action="" method="$_GET">
            <input type="submit" name="css" value="Take quiz">
            </form>
        </article>
    </div>
    <?php
            include("conn.php");
            if(isset($_GET["c++"])){
                header("location:c++questions.php");
                exit;                
                }
             if(isset($_GET["dsa"])){
                header("location:DSAquestions.php");
                exit;                
               }
    ?>

</body>
</html>

