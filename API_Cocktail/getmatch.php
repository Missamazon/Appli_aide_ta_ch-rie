<?php

$curl = curl_init('https://www.thecocktaildb.com/api/json/v1/1/search.php?s=mojito');
curl_setopt($curl, CURLOPT_CAINFO, 'C:\wamp64\www\Appli_aide_ta_chérie\API_Cocktail\cert.cer');
$data = curl_exec($curl);
if ($data === false) 
{
    var_dump(curl_error($curl));
} else {

}
curl_close($curl);

// $urlByName = 'www.thecocktaildb.com/api/json/v1/1/search.php?s=';
// $urlByIngredient = 'www.thecocktaildb.com/api/json/v1/1/search.php?i=';
// $randomCocktail = 'www.thecocktaildb.com/api/json/v1/1/random.php';

// $data = [
//     'name' => 'strDrink',
//     'alcoholic' => 'strAlcoholic',
//     'ingredients' => 'strIngredient1'." - ".
// ]
// if ($match != '' && (time() - filemtime($match) < 60)) {
//     $raw = file_get_contents($match);
//     $json = json_decode($raw);
// } else {
//     $url = "";
//     $raw = file_get_contents($url);
//     file_put_contents($dir . '/' . $motRecherche . '.json', $raw);
//     $json = json_decode($raw);
// }


// // Search cocktail by name
// // www.thecocktaildb.com/api/json/v1/1/search.php?s=margarita

// // Search ingredient by name
// // www.thecocktaildb.com/api/json/v1/1/search.php?i=vodka

// // Lookup a random cocktail
// // www.thecocktaildb.com/api/json/v1/1/random.php