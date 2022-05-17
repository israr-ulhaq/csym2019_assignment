<?php 
session_start();
include('database_connection.php');
if(!isset($_SESSION['SESSION_KEY_VARIABLE'])){ 
     if ($_SESSION['SESSION_KEY_VARIABLE']==''){
         header('location:index.php');
        exit();  
    }
header('location:index.php'); 
exit();
} 

function trim_datafields($data){
        $data		= trim($data);
		$data		= htmlentities($data);
		return $data;
}
if(isset($_POST['submit-btn'])){
		try{ 
        $id = rand ( 100000 , 999999 );   
		
		
			    $title	    = trim_datafields($_POST['r_title']);
            	$author	    = trim_datafields($_POST['r_author']);
            	$prepcooking	    = trim_datafields($_POST['r_pcooking']);
            	$cooking	    = trim_datafields($_POST['r_ccooking']);
            	$serves	    = trim_datafields($_POST['r_serves']);
            	$ingredients	    = trim_datafields($_POST['r_ings']);
            	$recipe	    = trim_datafields($_POST['r_steps']);
                $kcal	    = trim_datafields($_POST['r_kcal']);
                $fat	    = trim_datafields($_POST['r_fats']);
                  $saturates	    = trim_datafields($_POST['r_sats']);
            $carbs    = trim_datafields($_POST['r_carbs']);
            $sugars	    = trim_datafields($_POST['r_sugars']);
            $fibers    = trim_datafields($_POST['r_fibers']);
            $protein	    = trim_datafields($_POST['r_pro']);
                   $salt	    = trim_datafields($_POST['r_salt']);

$query ="INSERT INTO recipedatabase (
`id`,
`title`,
`author`,
`preparation`,
`cooking`,
`serves`,
`ingredients`,
`recipe`,
`kcal`,
`fat`,
`saturates`,
`carbs`,
`sugars`,
`fibers`,
`protein`,
`salt`) VALUES (
'$id',
'$title',
'$author',
'$prepcooking',
'$cooking',
'$serves',
'$ingredients',
'$recipe',
'$kcal',
'$fat',
'$saturates',
'$carbs',
'$sugars',
'$fibers',
'$protein',
'$salt');"; 
   

$insert	= mysqli_query( $connection,$query);
	if(!$insert){ 
	    echo '<p>Record not inserted, may be due to any wrong data entry. Please re-check all fields and change data according to given instructions/ type of data</p>'; 
		}
else{ 
    header('location:dashboard.php'); 
}              
        }catch(Exception $e){
           echo $e->getMessage();
        }
}

?>
<html>
<head>
<meta charset="utf-8">
	<title>Add Recipe</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css"/>
   
    <script type="text/javascript"></script>

    </head>
        
<body>
    
   <div class="main-div">

        <div class="basic_div">

            <div class="ui-form">

                <div class="content-header">
                   


                </div>
                <div id="form-total" >

                    <h1 style="font-size:40px; background-color:red; width:100%; color:#fff; text-align:center; font-style:bold;"></h1>

                    <div align="center" style=" font-size:24px; width: 100%; margin: 0 auto;">
                      

                        <div id="form-total">

                            <section>
                                <div class="insider">
                            <form id="target" role="form" name="doable" action="" method="post">  
                                
                        
								<div class="ui-row">
								    <div class="ui-cap ui-cap-2">
								        
								        <input type="text" id="r_title" name="r_title" required placeholder="Recipe Title">
								    </div>
								</div>

                                <div class="ui-row">
								    <div class="ui-cap ui-cap-2">
								     
								        <input type="text" id="r_author" name="r_author" required placeholder=Author Name>
								    </div>
								</div>

                                <div class="ui-row">
								    <div class="ui-cap ui-cap-2">
								   
                                        <textarea class="textAreaField" id="r_ing" name="r_ing" required placeholder="Recipe Ingredients"></textarea>
								    </div>
								</div>

                                <div class="ui-row">
								    <div class="ui-cap ui-cap-2">
								    
								       
                                         <select required id="r_pcooking" name="r_pcooking" class="select-general-btn">
                                             <option selected value="" disabled>Select Cooking cooking</option>
                                        <option value="5 mins">5 mins</option>
                                             <option value="10 mins">10 mins</option>
                                             <option value="15 mins">15 mins</option>
                                             <option value="20 mins">20 mins</option>
                                             <option value="25 mins">25 mins</option>
                                             <option value="30 mins">30 mins</option>
                                             <option value="40 mins">40 mins</option>
                                             <option value="50 mins">50 mins</option>
                                            <option value="60 mins">60 mins</option>
                                       
                                            <option value="2hrs">2hrs</option>
                                        </select>
								    </div>
								</div>
                                
                                
                                
                                <div class="ui-row">
								    <div class="ui-cap ui-cap-2">
								
								        
                                        <select required id="r_ccooking" name="r_ccooking" class="select-general-btn">
                                             <option selected value="" disabled>Select Cooking cooking</option>
                                        <option value="5 mins">5 mins</option>
                                             <option value="10 mins">10 mins</option>
                                             <option value="15 mins">15 mins</option>
                                             <option value="20 mins">20 mins</option>
                                             <option value="25 mins">25 mins</option>
                                             <option value="30 mins">30 mins</option>
                                             <option value="40 mins">40 mins</option>
                                             <option value="50 mins">50 mins</option>
                                            <option value="60 mins">60 mins</option>
                                            <option value="1hr 10 mins">1hr 10 mins</option>
                                            <option value="1hr 20 mins">1hr 20 mins</option>
                                            <option value="1hr 30 mins">1hr 30 mins</option>
                                    
                                        </select>
                                        
                                        
                                        
								    </div>
								</div>
                                
                                
                                
                                <div class="ui-row">
								    <div class="ui-cap ui-cap-2">
								        
								        
                                        <select required name="r_serves" class="select-general-btn">
                                             <option selected value="" disabled>Select Serves</option>
                                        <option value="1">1</option>
                                             <option value="2">2</option>
                                             <option value="3">3</option>
                                             <option value="4">4</option>
                                             <option value="5">5</option>
                                             <option value="6 to 10">6 to 10</option>
                                             <option value="11 to 14">11 to 14</option>
                                             <option value="14 to 18">14 to 18</option>
                                        </select>
								    </div>
								</div>
                                
                                
                                
                                
                                <div class="ui-row">
								    <div class="ui-cap ui-cap-2">
								  
                                        <textarea class="textAreaField" id="r_steps" name="r_steps" required placeholder="Recipe Steps"></textarea>
								    </div>
								</div>
                                
                                
                    
                                <div class="ui-row">
                                    
                                    
                                    <div class="ui-cap ui-cap-2">
								        <label for="comment">Recipe Kcal*</label>
								        <input min=0 type="number" id="r_kcal" name="r_kcal" required placeholder="Recipe KCal">
                                    
                                    <label for="comment">Recipe Fats*</label>
								        <input min=0 type="number" id="r_fats" name="r_fats" required placeholder="Recipe Fats">
                                    
                                    
                                    <label for="comment">Recipe Saturates*</label>
								        <input  min=0  type="number" id="r_sats" name="r_sats" required placeholder="Recipe Sats">
                                    
                                    
                                    <label for="comment">Recipe Carbs*</label>
								        <input min=0 type="number" id="r_carbs" name="r_carbs" required placeholder="Recipe Carbs">
                                    
                                    
                                    <label for="comment">Recipe sugars*</label>
								        <input min=0 type="number" id="r_sugars" name="r_sugars" required placeholder="Recipe sugars">
                                    
                                    
								        <label for="comment">Recipe fibers*</label>
								        <input min=0 type="number" id="r_fibers" name="r_fibers" required placeholder="Recipe fibers">
                                        
                                        
								        <label for="comment">Recipe Protein*</label>
								        <input min=0 type="number" id="r_pro" name="r_pro" required placeholder="Recipe Protein">
                                        
                                        
                                        <label for="comment">Recipe Salt*</label>
								        <input min=0 type="number" id="r_salt" name="r_salt" required placeholder="Recipe Salt">
                                    </div>
								</div>
                                
                                <div class="ui-row">
								    <div class="ui-cap ui-cap-2">
								    <input style="color:#fff;" class="general-btn" type="submit" value="Register Recipe" name="submit-btn" />
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

</html>