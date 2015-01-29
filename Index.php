<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Forum Parthenope</title>
<link href="tabs.css" rel="stylesheet" type="text/css"/>
<script> 
function load_home(){
	document.getElementById("includedContent").innerHTML='<object width="100%" height="100%" type="text/html" data="home.php" ></object>';
	document.getElementById("1").className = "current";
	document.getElementById("2").className = "null";
	document.getElementById("3").className = "null";
	document.getElementById("4").className = "null";
	document.getElementById("5").className = "null";
	}
function load_msg(){
	document.getElementById("includedContent").innerHTML='<object width="100%" height="100%" type="text/html" data="msg.php" ></object>';
	var x = document.getElementsByClassName("current");
    x[0].className = "null";
	document.getElementById("2").className = "current";
	}
function load_info(){
	document.getElementById("includedContent").innerHTML='<object width="100%" height="100%" type="text/html" data="info.php" ></object>';
	var x = document.getElementsByClassName("current");
    x[0].className = "null";
	document.getElementById("3").className = "current";
	}
function load_adv(){
	document.getElementById("includedContent").innerHTML='<object width="100%" height="100%" type="text/html" data="adv.php" ></object>';
	var x = document.getElementsByClassName("current");
    x[0].className = "null";
	document.getElementById("4").className = "current";
	}
function load_sub(){
	document.getElementById("includedContent").innerHTML='<object width="100%" height="100%" type="text/html" data="sub.php" ></object>';
	var x = document.getElementsByClassName("current");
    x[0].className = "null";
	document.getElementById("5").className = "current";
	}
function load_profile(){
	document.getElementById("includedContent").innerHTML='<object width="100%" height="100%" type="text/html" data="profile.php" ></object>';
	}
</script> 
</head>

<body onLoad="load_home()">
	<div class="logo"></div>
    <div>
    <table style="width:100%">
    <tr>
    	<td align="left" width="20%">
			<table><tr>
                <td align="left" width="70%" class="user">
                	<span>
					<?php if(strlen($_SESSION["myusername"])>0)
                            echo "Welcome, ".$_SESSION["myusername"];
                            else
                            echo "Guest";
                    ?>
                    </span>
                </td></tr>
            <tr>
                <td align="left" width="30%" class="user">
                	<span>
                    <?php if(strlen($_SESSION["myusername"])>0)
						echo '<a id="logout" href="logout.php">Logout</a> | <a id="profile" href="#" onClick="load_profile()">Profile</a>';
						else
						echo '<a id="login" href="login.html">Login/Signup</a>';
					?>    
                    </span>       
                </td>
			</tr>
        	</table>
        </td>         
   		<td align="center" width="60%"><ul class="menu">
    	<li><a id="1" href="#" title="home" 	onClick="load_home()"><span>Home</span></a></li>
        <?php 	if(isset($_SESSION['myusername']))
    				echo '<li><a id="2" href="#" title="messages" onClick="load_msg()"><span>Messages</span></a></li>';
				else
					echo '<a id="2"></a>';	
        ?>
		<li><a id="3" href="#" title="info"    	onClick="load_info()"><span>Info</span></a></li>
        <li><a id="4" href="#" title="adv" 	   	onClick="load_adv()"><span>Ads</span></a></li>
        <li><a id="5" href="#" title="sub" 	   	onClick="load_sub()"><span>Subjects</span></a></li>
        </ul></td> 
        <td align="right" width="20%"></td>
    </tr>
    </table>
    </div>
	<div id="includedContent"></div>
</body>
</html>
