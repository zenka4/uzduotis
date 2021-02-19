<!-- Commitai turi tureti prasmingus komentarus.
Kodas turi būti rašomas laikantis PSR-1 ir PSR-2.
Būtina taikyti SOLID, nepamirštam DRY bei KISS.
Privaloma komentuoti kodą (minimum bent blokais) bei privaloma rašyti PHP Doc. -->

<!-- Skaitymas iš failo:

Reikia parašyti mini programėlę, kuri gali nuskaityti duomenys iš failo į asociatyvinį masyvą.
Duomenys gali būti pateikti vienu iš šių formatu: CSV, XML, JSON.
Programa turi būti parašyta taip, kad pridėjus naują (ar pašalinus esamą) failo formatą nereiktų nieko koreguoti esamame kode (išskyrus konfiguraciją). 

Kaip tai daugmaž turėtų veikti:
Perduodame programai failo pavadinimą.
Ekrane pamatome failo turinį. -->

<?php

// json duomenys i masiva 

$data = json_decode(file_get_contents('data.json'), 1);

// $data = file_get_contents('data.json');
print_r($data);


##########################################################################


// xml duomenys i masiva


$objXmlDocument = simplexml_load_file("data.xml");
$objJsonDocument = json_encode($objXmlDocument);
$arrOutput = json_decode($objJsonDocument, 1);


print_r($arrOutput);
