<?php
session_start();
include('database_connection.php');

function trim_datafields($data){
		$data		= trim($data);
		$data		= htmlentities($data);
return $data;
}

if(isset($_POST['send-general-btn']))
{   
	$ufield=trim_datafields($_POST["ufield"]);
	$pfield=trim_datafields($_POST['pfield']);

$sql="SELECT * FROM `users` WHERE `username`='".$ufield."' AND `password`='".$pfield."';";
    
if ($res = $connection -> query($sql)) {
		
		$row = $res -> fetch_row();
    
		if(empty($row[1])){
			echo '<h4>Incorrect Username or Password</h4>';
		}
		else{
            
            $_SESSION['SESSION_KEY_VARIABLE'] =$row[0];
            header('location:dashboard.php'); 
            exit();
                
		}
}
else{
		$message = '<label>User not found</label>';
	}
}

$connection -> close();
	?>
<html>

<head>
    <meta charset="utf-8">
    <title>Sign in - Food Web Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css" />

</head>

<body>


    <div class="main-div">

        <div class="basic_div">

            <div class="ui-form">

                <div class="content-header">
                  


                </div>
                <div id="form-total" >

                    <br>

                    <div align="center" style=" font-size:24px; width: 100%; margin: 0 auto;">
                        <h1>Login</h1>

                        <div id="form-total">

                            <section>
                                <div class="insider">


                                    <form action="" method="post">
                                        <div class="ui-row">
                                            <div class="ui-cap ui-cap-2">
                                              
                                                <input type="email" name="ufield" class="textField" placeholder="Email" required="required" />

                                              <br><br>
                                                <input type="password" name="pfield" class="textField" placeholder="Password" required="required" />

                                            </div>
                                        </div>
                                        <div class="ui-row">
                                            <div class="ui-cap ui-cap-2">
                                                <input class="general-btn" style="color:#fff;" type="submit" name="send-general-btn" class="buttonField" value="LOGIN" />

                                            </div>
                                        </div>
                                    </form>


                                </div>
                                <div class="insider">
                                    <div class="ui-row">
                                        <div class="ui-cap ui-cap-2">
                                            <form action="institution_login.php" method="post">
                                                <a href="add_user.php">Get Registered Now</a>
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <div></div>
        </div>

    </div>
</body>

</html>
