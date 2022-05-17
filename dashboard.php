<?php
session_start();
if(!isset($_SESSION['SESSION_KEY_VARIABLE'])){ 
     if ($_SESSION['SESSION_KEY_VARIABLE']==''){
         header('location:index.php');
        exit();  
    }
header('location:index.php'); 
exit();
} 
include('database_connection.php');?>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <?php
    if(isset($_POST['apply-add'])){
        
            header('location:add_recipe.php'); 
    }
        if(isset($_POST['apply-submit'])){
            
            if(!empty($_POST['checkboxArray'])) {    
            
                $_SESSION['checkboxArrayed'] = $_POST['checkboxArray'];
                   header('location:recipe_chart.php'); 
                
                }else{
                echo "<script>alert(\"Please Select Something\");</script>";
            }
          }
        ?>

    <style>

    </style>


</head>

<body>

    <div id="header-div" class="header">
    </div>
    <div style="width:100%;" id="logicaldiv" class="center">
    </div>


    <div id="footer-div" class="footer">
    </div>

</body>

<script type="text/javascript">
    var temp = "<form method=\"post\" action=\"\"><table id=\"table\" class=\"table-style\"><thead><tr><th>Check</th><th>ID</th><th>Title</th><th>Author</th><th>Servings</th><th>Preparation</th><th>Cooking Time</th></tr></thead><tbody>";

    <?php

$connection->set_charset("utf8");
    
$sql = "SELECT * FROM recipedatabase;";
$res = $connection->query($sql);
while($rows=$res->fetch_assoc()){
    ?>
    temp += "<tr>";
    temp += "<td><input name='checkboxArray[]' value=\"<?=$rows['id'];?>\" type=\"checkbox\"/></td>";
    temp += "<td><?=$rows['id'];?></td>";
    temp += "<td><?=$rows['title'];?></td>";
    temp += "<td><?=$rows['author'];?></td>";
    temp += "<td><?=$rows['serves'];?></td>";
    temp += "<td><?=$rows['preparation'];?></td>";
    temp += "<td><?=$rows['cooking'];?></td>";
 
    temp += "</tr>";

    <?php
}            ?>
    temp += "</tbody></table><div style=\"width:100% text-align:center;\"><input class=\"general-btn\" style=\"padding:10px; margin-top: 20px;  font-size:20px; text-align:center;\" type=\"submit\" name=\"apply-submit\" value=\"Show Nutrition\"/> <input class=\"general-btn\" style=\"padding:10px; margin-top: 20px;  font-size:20px; text-align:center;\" type=\"submit\" name=\"apply-add\" value=\"+ Recipe\"/></div></form>";
    document.getElementById("logicaldiv").innerHTML +=temp;
</script>

</html>