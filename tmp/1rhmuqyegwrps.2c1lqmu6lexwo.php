<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title><?= ($title) ?></title>
    <link rel="stylesheet" type="text/css" href="ui/css/style.css">
    <link rel="stylesheet" href="ui/css/bootstrap.css">
    <link rel="stylesheet" href="ui/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
</head>
<body>
    <div class="container">
        <div class="col-lg-12">
            <div class="col-lg-9">
                <div id="hellomsg">Hello // on chat //</div>
                <div class="chatbox">
                    <div class="chat scroll" id="scroll"> 
                    </div>
                </div>
            </div> 
            <div class="col-lg-3">
                <div class="userlist">
                    <div class="title centered">
                        Userlist
                    </div>
                    <div id="userlist">
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="col-lg-8"><input class="chatinput" id="wiadomosc" type="text" maxlength="<?= ($max_char) ?>" autofocus autocomplete="off"></div>
                <div class="col-lg-2"><button class="btn send" onclick="submitek()">Send</button></div>
                <div class="col-lg-2"><button class="btn" onclick="logout()">Logout</button></div>
            </div>
        </div>
    </div>
    <script src="ui/js/js.js"></script>
</body>