<?php
//include('./controllers/_protectAdmin.php');
?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Page 2</title>
    <!-- jQuery + Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php include('header.php'); ?>
<div class="App">
    <!-- Formulaire de création d'un super utilisateur -->
        <div class="vertical-center">
            <div class="inner-block">
                <form action="./controllers/superUserValidation.php" method="post">
                    <h3>Ajout Super utilisateur</h3>
                    <div class="form-group">
                        <label for="userName">Nom</label>
                        <input type="email" class="form-control" name="username" id="username"/>
                    </div>
                    <div class="form-group">
                        <label for="is_superUser">Super utilisateur</label><input type="checkbox" class="form-control" name="is_superUser" id="is_superUser"/>
                    </div>
                    <button type="submit" name="addSuperUser" id="add_superUser" class="btn btn-outline-primary btn-lg btn-block">Ajouter</button>
                </form>
            </div>
        </div>
</div>
</body>