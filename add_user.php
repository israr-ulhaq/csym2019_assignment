<?php
include('database_connection.php');
?>
<html>
<head>
    <meta charset="utf-8">
    <title>User Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <script>
        function popup(x) {

            el = document.getElementById("popup");
            document.getElementById("pmsg").insiderHTML = x;
            el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
        }

        function close() {
            document.getElementById("popup").style.visibility = 'hidden';
        }
    </script>
</head>

<body>
    <div class="main-div">
        <div class="basic_div">
            <div class="ui-form">
                <div class="content-header">
                    
                </div>
                
                <div id="form-total" >

                    <br><br>

                    <div align="center" style=" font-size:24px; width: 100%; margin: 0 auto;">
                        <h1>User Registration</h1>

                        <div id="form-total">

                            <section>
                                <div class="insider">
                                    <form action="" method="post">
                                        <div class="ui-row">
                                            <div class="ui-cap ui-cap-2">
                                                
                                                <input type="email" name="uemail" class="textField" placeholder="Email Address" required="required" />
                                                <br>
                                              
                                                <input type="password" name="upass" class="textField" placeholder="Password" required="required" />
                                                <br>
                                                
                                                <input type="password" name="uretype" class="textField" placeholder="Re-Enter Password" required="required" />
                                            </div>
                                        </div>
                                        <div class="ui-row">
                                            <div class="ui-cap ui-cap-2">
                                                <input class="general-btn" style=" color: white;" type="submit" name="send-general-btn" class="buttonField" value="SIGNUP" />

                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="insider">
                                    <div class="ui-row">
                                        <div class="ui-cap ui-cap-2">
                                            <form action="index.php" method="post">
                                                <a href="index.php">Go to Login Page</a>
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
    <div id="popup">
        <div>
            <p id="pmsg"></p>
            <a href="javascript:close()">Exit</a>
        </div>
    </div>
    <div id="loading">
        <img id="loading-image" src="resources/loading.gif" alt="Please Wait" />
    </div>
    <script>
        $(window).on('load', function() {
            $('#loading').hide();
        })
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>

</html>
<?php

$message = '';

function trim_datafields($data){
		$data		= trim($data);
		$data		= htmlentities($data);
return $data;
	}


if(isset($_POST['send-general-btn']))
{
    $id = rand ( 100000 , 999999 );
	$uvar=trim_datafields($_POST["uemail"]);
	$pvar=trim_datafields($_POST['upass']);
    $rvar=trim_datafields($_POST['uretype']);


    if ($pvar!=$rvar){
               ?> <script>
    popup("Password should match in both fields");
</script> <?php 
        exit();
    }
    
$sql="SELECT * FROM users WHERE `username`='".$uvar."';";

if ($res = $connection -> query($sql)) {
		
		$row = $res -> fetch_row();

		if(!empty($row[1])){
		
?><script>
    popup("User Exists");
</script>

<?php
		}
		else{	
            try{
            $sql="INSERT INTO `users` (`id`,`username`,`password`) VALUES (".$id.",'".$uvar."','".$pvar."');";
            $insert = mysqli_query($connection,$sql);
            }catch(Exeception $e){
			  echo 'Message: ' .$e->getMessage();
		}	
	if($insert){ ?><script>
    popup("Email Successfully Registered . Please go back to Home/Login Page to Login");
</script>

<?php 
}
			else{
				echo '<p>Record not inserting.</p>';
			}

		}
}
else{
		$message = '<label>Wrong Username</label>';
	}
}
$connection -> close();
	?>