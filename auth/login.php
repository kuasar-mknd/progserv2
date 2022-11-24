<?php
    @session_start();
    require_once('./config/autoload.php');
    require_once('./controllers/loginValidation.php');
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Login</title>
        <!-- jQuery + Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php include('header.php'); ?>
        <div class="App">
            <div class="vertical-center">
                <div class="inner-block">
                    <form action="" method="post">
                        <h3>Authentification</h3>
                        <?php echo $error_msg; ?>
                        <div class="form-group">
                            <label for="email_signin">Email</label>
                            <input type="email" class="form-control" name="email_signin" id="email_signin" value="<?php echo $email ?? "" ?>" />
                        </div>
                        <div class="form-group">
                            <label for="password_signin">Password</label>
                            <input type="password" class="form-control" name="password_signin"
                                   id="password_signin" />
                        </div>
                        <button type="submit" name="login" id="sign_in" class="btn btn-outline-primary btn-lg btn-block">Connexion</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>