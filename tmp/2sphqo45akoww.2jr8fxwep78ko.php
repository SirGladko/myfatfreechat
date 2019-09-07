<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>register</title>
        <link rel="stylesheet" type="text/css" href="ui/css/style.css">
        <link rel="stylesheet" href="ui/css/bootstrap.css">
        <link rel="stylesheet" href="ui/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
        </script>
    </head>
    <body>
        <div class="container">
            <div class="col-lg-12 centered">
                <div class="loginbox">
                    <div class="login">
                        <form action="" method="POST">
                            <input class="logininput" id="input" name="newlogin" placeholder="Login" type="text" maxlength="" required autofocus>
                            <input class="logininput" id="input" name="newpassw" placeholder="Hasło" type="password" maxlength="" required>
                            <p class="error mg-b-20"></p>
                            <button class="btn" type="submit" name="register">Register</button>
                        </form>
                        <form action="login.php" method="POST">
                            <a class="vanilla mg-t-10"><button class="btn">Back to login</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
