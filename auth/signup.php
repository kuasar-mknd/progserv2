<?php
    @session_start();
    require_once('./controllers/signupValidation.php');
?>
<?php include('./controllers/_rememberOriginPage.php'); ?>
<?php include('./controllers/_protect.php'); ?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
        <title>Sign Up</title>
        <!-- jQuery + Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php include('./header.php'); ?>
        <div class="App">
            <div class="vertical-center">
                <div class="inner-block">
                    <?php if ($successMsg) : ?>
                        <?php echo $successMsg; ?>
                    <?php else : ?>
                        <form action="" method="post">
                            <h3>Infos nouveau compte</h3>
                            <?php echo $emailValidationErr; ?>
                            <div class="form-group">
                                <label for="firstName">Prénom</label>
                                <input type="text" class="form-control" name="firstname" id="firstName" value="<?php echo $firstname ?? "" ?>" />
                                <?php echo $firstnameErr; ?>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Nom</label>
                                <input type="text" class="form-control" name="lastname" id="lastName" value="<?php echo $lastname ?? "" ?>" />
                                <?php echo $lastnameErr; ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?php echo $email ?? "" ?>" />
                                <?php echo $emailErr; ?>
                            </div>
                            <div class="form-group">
                                <label for="mobileNumber">Mobile</label>
                                <input type="text" class="form-control" name="mobilenumber" id="mobileNumber" value="<?php echo $mobilenumber ?? "" ?>" />
                                <?php echo $mobileErr; ?>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" />
                                <?php echo $passwordErr; ?>
                            </div>
                            <button type="submit" name="submit" id="submit" class="btn btn-outline-primary btn-lg btn-block">Crée compte</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </body>
</html>