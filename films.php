* Afficher le top10 des films sous cette forme :

```
1 Mission: Impossible - Rogue Nation
2 …
…
10 … <br><br>

<?php
$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
$brut = json_decode($string, true);
$top = $brut["feed"]["entry"]; # liste de films

for ($i = 0; $i <= 9; $i ++){
echo $i+1;
print_r ($top[$i]["im:name"]["label"]);
echo'<br>'.'<br>';
}
?>

* Quel est le classement du film « Gravity » ?<br><br>

<?php

foreach($top as $key=>$value){
//var_dump ($value["im:name"]["label"]);
if ($value["im:name"]["label"]=="Gravity"){
    echo $value["im:name"]["label"];
    echo $key+1;
}
};
?>

<br><br>* Quel est le réalisateur du film « The LEGO Movie » ?<br><br>

<?php

foreach($top as $key=>$value ){
    if ($value["im:name"]["label"]=="The LEGO Movie"){
        echo $value["im:artist"]["label"];
        
    }
}

?>
<br><br>* Combien de films sont sortis avant 2000 ?<br><br>

<?php
$i=0; 
foreach($top as $key=>$value){
    if ($value["im:releaseDate"]["label"]<2000){
        //echo $value["im:releaseDate"]["label"];
        $i++;
    }
}
echo $i;
?>

<br><br>*Quel est le film le plus récent ? Le plus vieux ?<br><br>

<?php
$plusrecent= ("2000-01-01");
$o="";
$plusvieux= ("2000-01-01");
$p="";
foreach($top as $key=>$value){
    if (strtotime($value["im:releaseDate"]["label"])>strtotime($plusrecent)){
        $plusrecent=$value["im:releaseDate"]["label"];
        $o=$value["im:name"]["label"];
    }if (strtotime($value["im:releaseDate"]["label"])<strtotime($plusvieux)){
        $plusvieux=$value["im:releaseDate"]["label"];
        $p=$value["im:name"]["label"];
    }
}
//echo $plusrecent;        

echo $o;
echo'<br>'.'<br>';
echo $p;
?>


<br><br>* Quelle est la catégorie de films la plus représentée ?<br><br>
<?php

$r="";
foreach ($top as $key=>$value){
if ($value["category"]["attributes"]["label"]){
    $r=$array_count_values["category"]["attributes"]["label"];
}
};
echo $r;

?>

<br><br>* Quel est le réalisateur le plus présent dans le top100 ?<br><br>
<?php
$s="";
foreach ($top as $key=>$value){
    if ($value["im:artist"]["label"]){
        $s=$array_count_value["im:artist"]["label"];
    }
    };
    echo $s;
?>
<br><br>*Combien cela coûterait-il d'acheter le top10 sur iTunes ? de le louer ?<br><br>
<?php


?>

<br><br>*Quel est le mois ayant vu le plus de sorties au cinéma ?<br><br>
<br><br>*Quels sont les 10 meilleurs films à voir en ayant un budget limité ?<br><br>
