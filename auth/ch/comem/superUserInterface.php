<?php

interface superUserInterface
{
    public function createSuperUser($username, $is_superUser);
    public function getSuperUser($username);
    public function updateSuperUser($username, $is_superUser);
    public function deleteSuperUser($username);
    public function getStatus($username);
    public function emailExist($username);

}