<?php include('./controllers/userActivationValidation.php'); ?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
        <title>User Activation</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron text-center">
                <h1 class="display-4">Verification du compte</h1>
                <div class="col-12 mb-5 text-center">
                    <?php echo $activationMsg; ?>
                </div>
                <p class="lead">Si votre compte a été validé, cliquez sur le bouton suivant pour vous authentifier</p>
                <?php
                $url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
                $url .= "://" . $_SERVER['HTTP_HOST'];
                $url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
                ?>
                <a class="btn btn-lg btn-success" href="<?php echo $url ?>login.php">Connexion</a>
            </div>
        </div>
    </body>
</html>