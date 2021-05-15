<?php

//src/UserBundle/Credential/Username

namespace UserBundle\Credential;

class Username{


function username($longueur)
{
      $minuscules = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z','A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

    $code = ''; //On déclare notre variable
    for ($i = 1; $i <= $longueur; $i++)
    {
        //On génère un type aléatoire
        $type = rand(0,2);
        if ($type == 0)
        {
            $caractere = rand(0,9);
            $code .= $caractere;
        }
        if ($type == 2)
        {
            $nbre_aleatoire = rand(0, 25);
            $caractere = $minuscules[$nbre_aleatoire];
            $code .= $caractere;
        }
    }
    return $code; //On retourne le code généré au complet
}
}
?>