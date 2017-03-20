<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style/style.css">
	<title>Фантазийные животные.</title>
</head>
<body>
<?php
$zoo = array
    (
    "Africa" =>
    array("Smilodon", "Equus grevyi", "Calotragus scoparius"), 
    "North America" =>
    array("Stylinodon", "Coryphodon", "Embolotherium ergilense", "Mammuthus primigenius"),
    "South America" =>
    array("Astrapotherium magnum", "Toxodon", "Thalassocnus", "Mammuthus columbi"), 
    "Eurasia" =>
    array("Platybelodon", "Coelodonta antiquitatis"), 
    "Australia" =>
    array("Palorchestes azael", "Diprotodon")
    );

$zoo1 = null;

echo "<h1>Выводим наш массив на экран</h1>";

echo "<table border = \"5\">";
foreach($zoo as $continent => $ziv){
    echo "<tr><td><b>$continent</b></td>";
    for ($i = 0; $i < count($ziv); $i ++){
        echo "<td>".$ziv[$i]."</td>";
        $names  = str_word_count($ziv[$i], 1);
        $zoo1[$continent][] = $names[0]; 
        if ( isset ( $names[1] ) ) $zoo1[$continent][] = $names[1]; 
    }
echo "</tr>\n";
}
echo "</table>";
 
echo "<h1>Выводим массив животных с двумя словами</h1>";
echo "<table border = \"5\">";
foreach($zoo as $continent => $ziv){
    $spisok = null;
    echo "<tr><td><b>$continent</b></td>";
    for ($i = 0; $i < count($ziv); $i ++){
        if (preg_match ("/\w+ \w+/",$ziv[$i])){
            echo "<td>".$ziv[$i]."</td>";
            $spisok[] = $ziv[$i];
        }
    }
$zoo_two[$continent] = $spisok; 
echo "</tr>\n";
}
echo "</table>";

echo "<h1>Выводим массив животных с первым словом</h1>";

echo "<table border = \"3\">";
foreach($zoo_two as $continent => $ziv){
    $spisok = null;
    echo "<tr><td><b>$continent</b></td>";
    for ($i = 0; $i < count( $ziv ); $i ++){
    	$a = explode(" ", $ziv[ $i ] );
    	echo "<td>".$a[ 0 ]."</td>";
        $spisok[] = $a[ 0 ];
    }
$zoo_first[$continent] = $spisok;
echo "</tr>\n";
}
echo "</table>";

#######
echo "<h1>Выводим массив животных со вторым словом</h1>";

echo "<table border = \"3\">";
foreach($zoo_two as $continent => $ziv){
    $spisok = null;
    echo "<tr><td><b>$continent</b></td>";
    for ($i = 0; $i < count( $ziv ); $i ++){
    	$a = explode(" ", $ziv[ $i ] );
    	echo "<td>".$a[ 1 ]."</td>";
        $spisok[] = $a[ 1 ];
    }
shuffle( $spisok );
$zoo_second[$continent] = $spisok;
echo "</tr>\n";
}
echo "</table>";

echo "<h1>Выводим массив животных с перемешанными именами (из вторых слов)</h1>";

echo "<table border = \"3\">";
foreach($zoo_second as $continent => $ziv){
    $spisok = null;
    echo "<tr><td><b>$continent</b></td>";
    for ($i = 0; $i < count( $ziv ); $i ++){
    	echo "<td>".$ziv[$i]."</td>";
        $spisok[] = $ziv[$i];
    }
$zoo_rnd_second[$continent] = $spisok;
echo "</tr>\n";
}
echo "</table>";
echo "<h1>Выводим массив фантазийных животных.</h1>";

echo "<table border = \"3\">";
foreach($zoo_first as $continent => $ziv){
    $spisok = null;
    echo "<tr><td><b>$continent</b></td>";
    for ($i = 0; $i < count( $ziv ); $i ++){
    	echo "<td>".$ziv[$i]." ".$zoo_rnd_second[$continent][$i]."</td>";
        $spisok[] = $ziv[$i]." ".$zoo_rnd_second[$continent][$i];
    }
$zoo_fan[$continent] = $spisok;
echo "</tr>\n";
}
echo "</table>";
echo "<h1>Выводим массив фантазийных животных заголовком h2.</h1>";

foreach($zoo_fan as $continent => $ziv){
    echo "<h2>$continent</h2>";
    echo "<p>";
    for ($i = 0; $i < count( $ziv ); $i ++){
        if ( $i == count( $ziv ) - 1) $znak = "."; 
        else $znak = ",";
    	echo $ziv[$i].$znak;
    }
    echo "</p>";
}
?>
</body>
<footer>
	<p>Copyright.Андрей Мурашов.</p>
</footer>
</html>