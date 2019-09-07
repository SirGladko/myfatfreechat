<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
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
                            <input class="logininput" name="login" placeholder="Login" type="text" maxlength="" required autofocus>
                            <input class="logininput" name="passw" placeholder="Password" type="password" maxlength="" required>
                            <div class="mg-b-20 error"></div>
                            <div class="tooltipx">
                                <img class="tip" src="ui/images/tip.png">
                                <span class="tooltiptextx">Logujesz sie na czat o podanej nazwie z podanym hasłem. Jeżeli chcesz się zalogować na czat domyślny, zostaw pole czatu puste.</span>
                            </div>
                            <input class="logininput tipbox" name="chat" placeholder="Chat name" type="text" maxlength="" >
                            <input class="logininput mg-b-20" name="chatpassw" placeholder="Chat password" type="password" maxlength="">
                            <p class="mg-b-20 error"></p>
                            <button class="btn mg-b-10" name="submitek" type="submit">Log in</button>
                        </form>
                        <form action="register.php" method="POST">
                            <a class="vanilla mg-t-10"><button class="btn">Register</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
