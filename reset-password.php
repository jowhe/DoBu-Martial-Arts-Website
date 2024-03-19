<html>
    <head>
        <title>DoBu Martial Arts | Reset Password</title>
        
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="HTML, CSS, Javascript, Martial Arts, Karate, Judo, Jiu-Jitsu, Kids Martial Arts">
        <meta name="description" content="DoBu Martial Arts">
        <meta name="author" content="Joe Howe">
        
        <!-- Page Icon -->
        <link rel="icon" type="img/png" href="res/img/logo.png">
        
        <!-- Linking Tags -->
        <link rel="stylesheet" type="text/css" href="res/css/reset-pass.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    </head>
    
    <body>
        <!-- Link the logo and change the background image -->
        <center><img src="res/img/logo.png" width="240" height="auto"></center>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="content">
            <div class="container" style="background-color: white;border-radius: 25px;width: 25vw;border: 2px solid #ff7878;box-shadow: 0 0 10px 0 #000;">
                <center>
                <div id="register-form">
                    <form action="_/reset-password.php" method="post">
                        <div class="form-group">
                            <label>Current Password</label>
                            <br>
                            <input type="password" name="email" class="form-control " value="" id="curPass">
                        </div>    
                        <div class="form-group">
                            <label>Password</label>
                            <br>
                            <input type="password" name="password" class="form-control" value="" id="newPass">
                        </div>
                        <div class="form-group">
                            <label>Password Confirmation</label>
                            <br>
                            <input type="password" name="password" class="form-control" value="" id="newPassC">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
                </center>
            </div>
        </div>        
    </body>
    
</html>