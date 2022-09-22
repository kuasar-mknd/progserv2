<?php
require_once 'DatabasePassword.php';


class passwordGen extends DatabasePassword
{
    private $authorizedChars = array(
        'special' => array('(', ')', '[', ']', '{', '}', '$', '€', '_'),
        'numbers' => array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9'),
        'lowercase' => array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'),
        'uppercase' => array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z')
    );
    
    public function generatePassword($nbSpecial, $nbNumber, $nbLower, $nbUpper)
    {

        if (!file_exists('passwords.sqlite')) {
            $this->createDatabase();
        }

        $arrayPassword = array_merge($this->generateChars($nbSpecial, 'special'));
        $arrayPassword = array_merge($arrayPassword, $this->generateChars($nbNumber, 'numbers'));
        $arrayPassword = array_merge($arrayPassword, $this->generateChars($nbLower, 'lowercase'));
        $arrayPassword = array_merge($arrayPassword, $this->generateChars($nbUpper, 'uppercase'));

        shuffle($arrayPassword);
        $password = implode('', $arrayPassword);

        if($this->checkPassword($password)) {
            $this->insertPassword($password);
            return $password;
        } else {
            return false;
        }

    }

    private function generateChars($nbChar, $string)
    {
        $array = array();

        for ($i = 0; $i < $nbChar; $i++) {
           $array[] = $this->authorizedChars[$string][array_rand($this->authorizedChars[$string])];
        }
        return $array;
    }


}