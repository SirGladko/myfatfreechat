<!DOCTYPE html>
<html>
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
            <div class="col-lg-12 centered">
                <div class="loginbox">
                    <div class="login">
		                <?php echo $this->render($template,NULL,get_defined_vars(),0); ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>