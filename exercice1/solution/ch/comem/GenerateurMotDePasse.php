<?php

namespace ch\comem;

/**
 * Crée un générateur de mot de passe
 */
class GenerateurMotDePasse {

    /**
     * Génère un mot de passe unique
     * @param int $nbCarSpec Nombre de caractères spéciaux
     * @param int $nbChiffres Nombre de chiffres
     * @param int $nbMin Nombre de minuscules
     * @param int $nbMaj Nombre de majuscules
     * @return string Le mot de passe unique
     */
    public static function genereMotDePasse(int $nbCarSpec, int $nbChiffres, int $nbMin, int $nbMaj): string {
        $motDePasse = '';
        if (($nbCarSpec + $nbChiffres + $nbMin + $nbMaj)>0) {
            $carsSpec = ['[', ']', '{', '}', '(', ')', '$', '€', '_'];
            $chiffres = range('0', '9');
            $minuscules = range('a', 'z');
            $majuscules = range('A', 'Z');
            $cars = [$carsSpec, $chiffres, $minuscules, $majuscules];
            $nbrs = [$nbCarSpec, $nbChiffres, $nbMin, $nbMaj];
            for ($i = 0; $i < count($cars); $i++) {
                for ($j = 1; $j <= $nbrs[$i]; $j++) {
                    $index = mt_rand(0, count($cars[$i]) - 1);
                    $car = $cars[$i][$index];
                    $motDePasse .= $car;
                }
            }
            $motDePasseMelange = GenerateurMotDePasse::mb_str_shuffle($motDePasse);
        }
        return $motDePasseMelange;
    }

    // Merci internet ;-)
    /**
     * Mélange les caractères de la chaine spécifiée
     * @param string la chaîne à mélanger
     * @return string La chaîne mélangée
     */
    public static function mb_str_shuffle(string $str): string {
        $tmp = preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
        shuffle($tmp);
        return join("", $tmp);
    }

}
