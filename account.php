<?php
    session_start();
    $email = $_SESSION['email'];
    $membership = $_SESSION['membership'];
?>

<!DOCTYPE html>
<html>

    <head>
        <title>DoBu Martial Arts | Account <?php if($_SESSION['logged'] === TRUE){ echo '(' . $email . ')';}?> </title>
        
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="HTML, CSS, Javascript, Martial Arts, Karate, Judo, Jiu-Jitsu">
        <meta name="description" content="DoBu Martial Arts">
        <meta name="author" content="Joe Howe">
        
        <!-- Page Icon -->
        <link rel="icon" type="img/png" href="res/img/logo.png">
        
        <!-- Linking Tags -->
        <link rel="stylesheet" type="text/css" href="res/css/style.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    </head>
    
    <body>
        <!-- Link the logo and change the background image -->
        <center><img src="res/img/logo.png" width="240" height="auto"></center>
        
        <!-- Navigation layout -->
        <div class="nav-container">
        
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="staff.html">Staff</a></li>
                    <li><a href="classes.html">Classes</a></li>
                    <li><a href="prices.html">Pricing</a></li>
                    <li class="active"><a href="account.php">Account</a></li>
                </ul>
            </nav>
        
            <hr style="border: none;background: linear-gradient(140deg, rgba(255,255,255,0) 0%, rgba(255,122,122,1) 50%, rgba(255,255,255,0) 100%);height: 2px;">
        </div>
        
        <div class="content">
            <div class="container" style="border-radius: 25px;width: 50vw;border: 2px solid #ff7878;box-shadow: 0 0 10px 0 #000;">
                <form action="_/change_membership.php" method="POST" style="display: inline;">
		<?php 
                
                    if($_SESSION['logged'] === TRUE){
                    echo '
                        
                        <h1>Welcome, '. $email; echo ' </h1>
                        <hr>
                        <h3>Your current membership: '.$membership; echo ' </h3>
                        <p>If you would like to change your membership please select from the dropdown below.</p>
                        
			  <select name="membership">
                            <option value="Basic">Basic: 1 Martial Arts - 2 Sessions per week.</option>
                            <option value="Intermediate">Intermediate: 1 Martial Arts - 3 Sessions per week.</option>
                            <option value="Advanced">Advanced: 2 Martial Arts - 5 Sessions per week.</option>
                            <option value="Elite">Unlimited Classes</option>
                            <hr>
                            <option value="Private Tuition">Private Martial Arts</option>
                            <option value="Junior Membership">Junior Membership - Can attend all kids sessions.</option>
                        </select>
                        <br>
                        <br>
                        <span style="float: left">
                        <form action="_/change_membership.php" method="POST" style="display:inline;">
                            <input type="submit" class="btn" value="Update Membership">
                        </form>
                        </form>
			</span>
                        <span style="position: relative; float: right;display: flex;">
                        <input type="submit" onclick="ShowModal()" class="btn" value="Reset Password" style="margin-right: 15px;">
			<form action="_/logout.php" method="POST">
                                <input type="submit" class="btn" value="Logout">
                            </form>
                        </span>
		     ';                        
                    }else{
                        echo '<script>window.location = "login.php"</script>';
                    }
		
                ?>
               <br>
            </div>
        </div>
        <script type="text/javascript">

            function ShowModal(){
                if(!document.getElementById("modal")){
                    var iframe = document.createElement("iframe");
                    iframe.setAttribute("src", "reset-password.php");
                    iframe.style.position = "absolute";
                    iframe.style.padding = "auto";
                    iframe.style.margin = "auto";
                    iframe.style.top = "0";
                    iframe.style.left = "0";
                    iframe.style.zIndex = "1";
                    iframe.style.width = "100vw";
                    iframe.style.height= "100vh";
                    iframe.style.overflow = "hidden";
                    iframe.style.border = "none";
                    iframe.setAttribute("id", "modal");
                    document.body.appendChild(iframe);

                    var closebtn = document.createElement("button");
                    closebtn.setAttribute("onclick", "ShowModal()");
                    closebtn.style.zIndex = "2";
		    closebtn.style.left = "57vw";
		    closebtn.style.top = "67vh";
                    closebtn.style.position = "absolute";
                    closebtn.innerHTML = "Close Modal";
                    closebtn.setAttribute("id", "cmodal");
		    closebtn.setAttribute("class", "btn btn-primary");

                    document.body.appendChild(closebtn);
                }else{
                    iframe = document.getElementById("modal");
                    closebtn = document.getElementById("cmodal");
                    document.body.removeChild(iframe);
                    document.body.removeChild(closebtn);
                }
            }    

        </script>
    </body>
</html>