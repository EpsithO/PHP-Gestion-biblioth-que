<?php

require_once __DIR__."/../../vendor/autoload.php";
require_once "test/Utils/couleur.php";

echo "Test N°1 : vérifier que la date d’emprunt, à la création, est égale à la date du jour \n";
$adherent=  new \App\Adherent("Mathéo","Maire","matheo.maire.25@gmail.com");
$livre = new \App\Livre("Stick Action Spécial", "isbn-51678", "Alexandre Alex", 183);
$emprunt = new \App\Emprunt($adherent, $livre);
$dateJour = (new \DateTime())->format("d/m/Y");

if ($emprunt->getDateEmprunt()->format("d/m/Y") == $dateJour) {
    echo GREEN."Réussite du test".RESET.PHP_EOL;
} else {
    echo RED."Echec du test".RESET.PHP_EOL;
}



echo "Test N°2 : vérifier que la date de retour estimée, à la création, est égale à la date du jour + 15 jours pour l’emprunt d’un blu-ray \n";
$adherent = new \App\Adherent("michel", "maurice", "mm@test.fr");
$bluRay = new \App\BluRay("Les Rebels de la forets", "Je sais plus", 120, "2007");
$emprunt = new \App\Emprunt($adherent, $bluRay);
$dateActuelPlus21Jour = (new \DateTime())->modify("+15 days")->format("d/m/Y");

if ($emprunt->getDateRetourEstime()->format("d/m/Y") == $dateActuelPlus21Jour) {
    echo GREEN."Réussite du test".RESET.PHP_EOL;
} else {
    echo RED."Echec du test".RESET.PHP_EOL;
}



echo "Test N°3 : vérifier que la date de retour estimée, à la création, est égale à la date du jour + 10 jours pour l’emprunt d’un magazine \n";
$adherent=  new \App\Adherent("Mathéo","Maire","matheo.maire.25@gmail.com");
$magazine = new \App\Magazine(141234, "Cosmo", "01/05/2020");
$emprunt = new \App\Emprunt($adherent, $magazine);
$dateActuelPlus21Jour = (new \DateTime())->modify("+10 days")->format("d/m/Y");
if ($emprunt->getDateRetourEstime()->format("d/m/Y") == $dateActuelPlus21Jour) {
    echo GREEN."Réussite du test".RESET.PHP_EOL;
} else {
    echo RED."Echec du test".RESET.PHP_EOL;
}


echo "Test N°4 : vérifier que l’emprunt est en cours quand la date de retour n’est pas renseignée \n";
$adherent=  new \App\Adherent("Mathéo","Maire","matheo.maire.25@gmail.com");
$magazine = new \App\Magazine(141234, "Cosmo", "01/05/2020");
$emprunt = new \App\Emprunt($adherent, $magazine);
if ($emprunt->empruntEnCours()) {
    echo GREEN."Réussite du test".RESET.PHP_EOL;
} else {
    echo RED."Echec du test".RESET.PHP_EOL;
}


echo "Test N°5 : vérifier que l’emprunt est en cours quand la date de retour n’est pas renseignée \n";
$adherent=  new \App\Adherent("Mathéo","Maire","matheo.maire.25@gmail.com");
$magazine = new \App\Magazine(141234, "Cosmo", "01/05/2020");
$emprunt = new \App\Emprunt($adherent, $magazine);
if ($emprunt->empruntEnCours()) {
    echo GREEN."Réussite du test".RESET.PHP_EOL;
} else {
    echo RED."Echec du test".RESET.PHP_EOL;
}


echo "Test N°6 : vérifier que l’emprunt est en alerte quand la date de retour estimée est antérieure à la date du jour et que l’emprunt est en cours\n";
$adherent=  new \App\Adherent("Mathéo","Maire","matheo.maire.25@gmail.com");
$magazine = new \App\Magazine(141234, "Cosmo", "01/05/2020");
$emprunt = new \App\Emprunt($adherent, $magazine);
$emprunt->setDateRetourEstime($emprunt->getDateRetourEstime()->modify("-40 days"));
if ($emprunt->empruntEnAlerte()) {
    echo GREEN."Réussite du test".RESET.PHP_EOL;
} else {
    echo RED."Echec du test".RESET.PHP_EOL;
}


echo "Test N°7 : vérifier que la durée de l’emprunt a été dépassée quand la date de retour est postérieure à la date de retour estimée \n";
$adherent=  new \App\Adherent("Mathéo","Maire","matheo.maire.25@gmail.com");
$magazine = new \App\Magazine(141234, "Cosmo", "01/05/2020");
$emprunt = new \App\Emprunt($adherent, $magazine);
$emprunt->setDateRetour(DateTime::createFromFormat("d/m/Y", "20/11/2023"));
if ($emprunt->dateRetourDepasser()) {
    echo GREEN."Réussite du test".RESET.PHP_EOL;
} else {
    echo RED."Echec du test".RESET.PHP_EOL;
}

