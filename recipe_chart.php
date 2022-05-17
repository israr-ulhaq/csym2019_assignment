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
?>
<html>

<head>
    <meta charset="utf-8">
    <title>BBC GOOD FOODS</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>

</head>

<body>

    <div class="main-div">
<div id="logicaldiv" class="center">
    </div>
           
        <div class="basic_div">

            <div class="ui-form">
     <div class="content-header">
                    
                </div>
                <div id="form-total">

                    <h1 style="font-size:40px; background-color:red; width:100%; color:#fff; text-align:center; font-style:bold;"></h1><br>

                    <div align="center" style=" font-size:24px; width: 100%; margin: 0 auto;">
                      

                        <div id="form-total">

                            <section>
                                <div class="insider">
                                    <form id="target" role="form" name="doable" action="" method="post">


                                        <div class="ui-row">
                                            <div class="ui-cap ui-cap-2">
                                                <div class="mainbox">
                                                    <h2>Nutrition Chart</h2>
                                                    <div>
                                                        <canvas id="mychart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

                                                        

</body>


<script>
    var dataArray = [];
    var count = 0;
    var uichart = document.getElementById("mychart").getContext('2d');
    var mychart;
    <?php
  include('database_connection.php');  
    
function makeArrayFrom($objs,$str){ 
         
$mysql_hostname = "localhost";
$mysql_user =     "root";
$mysql_password = "";
$mysql_database = "recipedatabase";

$connection = mysqli_connect($mysql_hostname, $mysql_user,   
$mysql_password,$mysql_database) ;
    
    $arr = [];

    for($i=0;$i<count($objs); $i++){
               
$sql = "SELECT `".$str."` FROM recipedatabase where id='".$objs[$i]."';";
 
      
$res = $connection->query($sql);

         while($rows=$res->fetch_assoc()){
             $arr[$i]=$rows[''.$str.''];      
         }    
}
         return $arr;    
} 
            

            if(count($_SESSION['checkboxArrayed'])==1){
                $connection->set_charset("utf8");
    
       
                
$sql = "SELECT * FROM recipedatabase where id='".$_SESSION['checkboxArrayed'][0]."';";
$res = $connection->query($sql);
$count = 0;    
       while($rows=$res->fetch_assoc()){
  
            ?>

    mychart = new Chart(uichart, {
        type: 'pie',
        data: {
            labels: ["Fats ", "Saturates ", "Carbs ", "sugars ", "fibers ", "Proteins ", "Salt "],
            datasets: [{
                backgroundColor: [
                    "#3b9cf7",
                    "#73f73b",
                    "#f7e43b",
                    "#f76a3b",
                    "#f43bf7",
                    "#c71a20",
                    "#1ac7b6"
                ],
                data: [<?php echo $rows['fat'];?>, <?php echo $rows['saturates'];?>, <?php echo $rows['carbs'];?>, <?php echo $rows['sugars'];?>, <?php echo $rows['fibers'];?>, <?php echo $rows['protein'];?>, <?php echo $rows['salt'];?>]
            }]
        }
    });
 
    <?php 
       $count++;
       } ?><?php   
            }else{
      
     
            
            $connection->set_charset("utf8");
            $fats = makeArrayFrom($_SESSION['checkboxArrayed'],"fat");
            $title = makeArrayFrom($_SESSION['checkboxArrayed'],"title");
            $sats = makeArrayFrom($_SESSION['checkboxArrayed'],"saturates");
            $carbs = makeArrayFrom($_SESSION['checkboxArrayed'],"carbs");
            $sugars = makeArrayFrom($_SESSION['checkboxArrayed'],"sugars");
            $fibers = makeArrayFrom($_SESSION['checkboxArrayed'],"fibers");
            $pros = makeArrayFrom($_SESSION['checkboxArrayed'],"protein");
            $salt = makeArrayFrom($_SESSION['checkboxArrayed'],"salt");?>

    var ftarr = <?php echo json_encode($fats);?>;
    var tiarr = <?php echo json_encode($title);?>;
    var saarr = <?php echo json_encode($sats);?>;
    var caarr = <?php echo json_encode($carbs);?>;
    var suarr = <?php echo json_encode($sugars);?>;
    var fiarr = <?php echo json_encode($fibers);?>;
    var prarr = <?php echo json_encode($pros);?>;
    var salarr = <?php echo json_encode($salt);?>;


    var uichart = document.getElementById("mychart").getContext("2d");




    var data = {
        labels: tiarr,
        datasets: [{
                label: "Fat",
                backgroundColor: "#21c90e",
                data: ftarr
            },
            {
                label: "Saturates",
                backgroundColor: "#c99d0e",
                data: saarr
            },
            {
                label: "Carbs",
                backgroundColor: "#c94c0e",
                data: caarr
            },
            {
                label: "sugars",
                backgroundColor: "#0eb0c9",
                data: suarr
            },
            {
                label: "fibers",
                backgroundColor: "#0e46c9",
                data: fiarr
            },
            {
                label: "Protein",
                backgroundColor: "#a40ec9",
                data: prarr
            },
            {
                label: "Salt",
                backgroundColor: "#c90e46",
                data: salarr
            },
        ]
    };


    var myBarChart = new Chart(uichart, {
        type: 'bar',
        data: data,
        options: {
            barValueSpacing: 10,
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                    }
                }]
            }
        }
    });

    <?php } ?>
</script>

    

    
<script type="text/javascript">
   
    var temp = "";

    <?php

    for($i=0;$i<count($_SESSION['checkboxArrayed']);$i++){
    
    $connection->set_charset("utf8");

    
$sql = "SELECT * FROM recipedatabase where id='".$_SESSION['checkboxArrayed'][$i]."';";
$res = $connection->query($sql);

while($rows=$res->fetch_assoc()){
    ?>
    temp += "<h2>Title           : <?=$rows['title'];?></h2>";
    temp += "<h2>Author          : <?=$rows['author'];?></h2>";
    temp += "<p>Ingredients      : <?=$rows['ingredients'];?></p>";
    temp += "<h2>Preparation Time: <?=$rows['preparation'];?></h2>";
    temp += "<h2>Cooking Time    :<?=$rows['cooking'];?></h2>";



    temp += "Method : <p><?=$rows['recipe'];?></p>";
 
  

    <?php
}
}            ?>
  
    document.getElementById("logicaldiv").innerHTML +=temp;
</script>

    
    
    
</html>