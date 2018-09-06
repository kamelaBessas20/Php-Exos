<?php
$atomes = include "atomes.php";

$nbAtomes = rand(1, 10);
var_dump($nbAtomes);

$mesAtomes = [];
$maFormule = [];
for ($i=0; $i < $nbAtomes; $i++) { 
	$key = array_rand($atomes, 1);
	$mesAtomes[] = &$atomes[$key];
	$maFormule[] = $atomes[$key]['label'];
}
var_dump($maFormule);
var_dump(array_count_values($maFormule));
$str = '';
foreach (array_count_values($maFormule) as $key => $value) {
	if($value == 1){
		$value = '';
	}
	$str .= $key . $value;
};


var_dump($str);
$maMolecule = [
	'formule' => array_count_values($maFormule),
	'atomes' => $mesAtomes
];

var_dump($maMolecule);