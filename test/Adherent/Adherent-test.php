<?php

require __DIR__."/../../vendor/autoload.php";
require "test/Utils/couleur.php";

echo "Test n°1 : vérifier que la date d’adhésion, si non précisée à la création, est égale à la date du jour \n";
$adherent=  new \App\Adherent("Mathéo","Maire","matheo.maire.25@gmail.com");

$dateJour = new \DateTime();

if ($adherent->getDateAdhesion()->format("d/m/Y") == $dateJour->format("d/m/Y")) {
    echo GREEN."Réussite du test".RESET.PHP_EOL;
} else {
    echo RED."Echec du test".RESET.PHP_EOL;
}


echo "Test n°2 : vérifier que la date d’adhésion, si précisée à la création, est bien prise en compte \n";
$adherent=  new \App\Adherent("Mathéo","Maire","matheo.maire.25@gmail.com","10/10/2023");

$dateJour = \DateTime::createFromFormat("d/m/Y","10/10/2023");

if ($adherent->getDateAdhesion()->format("d/m/Y") == $dateJour->format("d/m/Y")) {
    echo GREEN."Réussite du test".RESET.PHP_EOL;
} else {
    echo RED."Echec du test".RESET.PHP_EOL;
}

echo "Test n°3 : vérifier que le numéro d’adhérent, à la création, est valide \n";

$adherent=  new \App\Adherent("Mathéo","Maire","matheo.maire.25@gmail.com","11/10/2023");

$debutNumAdherent =  substr($adherent->getNumeroAdherent(),0,3);

$numeroAdherent =  substr($adherent->getNumeroAdherent(),3,9);

if ($debutNumAdherent == "AD-" && ($numeroAdherent > 000000 && $numeroAdherent < 999999)) {
    echo GREEN."Réussite du test".RESET.PHP_EOL;
} else {
    echo RED."Echec du test".RESET.PHP_EOL;
}

echo "Test n°4 : vérifier que le numéro d’adhérent, à la création, est valide \n";
$adherent=  new \App\Adherent("Mathéo","Maire","matheo.maire.25@gmail.com");

$debutNumAdherent =  substr($adherent->getNumeroAdherent(),0,3);

$numeroAdherent =  substr($adherent->getNumeroAdherent(),3,9);

if ($debutNumAdherent == "AD-" && ($numeroAdherent > 000000 && $numeroAdherent < 999999)) {
    echo GREEN."Réussite du test".RESET.PHP_EOL;
} else {
    echo RED."Echec du test".RESET.PHP_EOL;
}

echo "Test n°5 : vérifier que l’adhésion est valable (valide) quand la date d’adhésion n’est pas dépassée (moins d’un an)  \n";

$adherent=  new \App\Adherent("Mathéo","Maire","matheo.maire.25@gmail.com");

if ($adherent->IsadhesionValable()) {
    echo GREEN."Réussite du test".RESET.PHP_EOL;
} else {
    echo RED."Echec du test".RESET.PHP_EOL;
}

echo "Test n°6 : vérifier que l’adhésion est non valable (invalide) quand la date d’adhésion est dépassée (plus d’un an)   \n";

$adherent=  new \App\Adherent("Mathéo","Maire","matheo.maire.25@gmail.com", "02/10/2022");

if (!$adherent->IsadhesionValable()) {
    echo GREEN."Réussite du test".RESET.PHP_EOL;
} else {
    echo RED."Echec du test".RESET.PHP_EOL;
}

echo "Test n°7 : vérifier que l’adhésion est renouvelée  \n";
$adherent=  new \App\Adherent("Mathéo","Maire","matheo.maire.25@gmail.com", "12/10/2022");

$dateAdhesion1ans = DateTime::createFromFormat("d/m/Y","02/10/2022");

$dateAdhesion1ans = $dateAdhesion1ans->modify("+1 year")->format("d/m/Y");

$adherent->renouvelerAdhesionAdherent();
if ($dateAdhesion1ans == $adherent->getDateAdhesion()->format("d/m/Y")) {
    echo GREEN."Réussite du test".RESET.PHP_EOL;
} else {
    echo RED."Echec du test".RESET.PHP_EOL;
}


