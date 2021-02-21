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

// json duomenys i masyva 

function jsonIntoMassive($fileName)
{
    $data = json_decode(file_get_contents($fileName), 1);

    return $data;
}


// print_r(jsonIntoMassive('data.json'));


##########################################################################


// xml duomenys i masyva

function xmlIntoMassive($fileName)
{
    $objXmlDocument = simplexml_load_file($fileName);
    $objJsonDocument = json_encode($objXmlDocument);
    $arrOutput = json_decode($objJsonDocument, 1);

    return $arrOutput;
}


// print_r(xmlIntoMassive('data.xml'));

##########################################################################

//csv duomenys i masyva
function csvIntoMassive($fileName)
{
    $csv = array_map('str_getcsv', file($fileName));
    array_walk($csv, function (&$a) use ($csv) {
        $a = array_combine($csv[0], $a);
    });
    array_shift($csv);

    return $csv;
}

// print_r(csvIntoMassive('data.csv'));

##############################################################################

// bendra funkcija 


function readGivenFile($fileName)
{

    if ($fileName == 'data.xml') {
        _d($fileName);
        return xmlIntoMassive($fileName);
    } elseif ($fileName == 'data.json') {
        return jsonIntoMassive($fileName);
    } elseif ($fileName == 'data.csv') {
        return csvIntoMassive($fileName);
    } else {
        return 'check  file name';
    }
}

// echo '<pre>';
// print_r(readGivenFile('data.json'));
