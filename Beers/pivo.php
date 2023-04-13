<?php
$url = 'https://random-data-api.com/api/beer/random_beer?size=10';
$data = file_get_contents($url);
$beers = json_decode($data);

usort($beers, function($a, $b) {
    return $a-> alcohol <=> $b-> alcohol;
});

foreach ($beers as $beer) {
    echo '<tr>';
    echo '<td>' . $beer->brand . '</td>';
    echo '<td>' . $beer->name . '</td>';
    echo '<td>' . $beer->alcohol . '</td>';
    echo '</tr>';
}
?>
