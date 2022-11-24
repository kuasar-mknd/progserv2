<?php

//check if superUser session is set
if (isset($_SESSION['superUser'])) {
    //if superUser session is set, then check if it's true
    if ($_SESSION['superUser'] == true) {
        //if superUser session is true, then display the header
        ?>
        <p>We care about you !</p>
        <?php
    }
}
