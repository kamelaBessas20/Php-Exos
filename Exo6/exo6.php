<?php

$hydrogene = [
	'nom' =>  'hydrogene',
	'label' => 'H',
	'numero_atomique' => 1
];
$oxygene = [
	'nom' =>  'oxygene',
	'label' => 'O',
	'numero_atomique' => 8
];
$sodium = [
	'nom' => 'sodium',
	'label' => 'Na',
	'cout' => 4
];
$chlore = [
	'nom' => 'chlore',
	'label' => 'Cl',
	'cout' => 7
];

$molecules = [
	[
		'nom' => 'eau',
		'formule' => 'H2O',
		'atomes' => [
			&$hydrogene,
			&$hydrogene,
			&$oxygene,
		]
	],
	[
		'nom' => 'chlorure de sodium',
		'formule' => 'NaCl',
		'atomes' =>[
			&$sodium,
			&$chlore
		],
	],
	[
		'nom' => 'Dioxygene',
		'formule' => 'o2',
		'atomes' =>[
			&$oxygene,
			&$oxygene
		],
	],
	[
		'nom' => 'Peroxyde d\'hydrogène',
		'formule' => 'H2O2',
		'atomes' =>[
			&$hydrogene,
			&$hydrogene,
			&$oxygene,
			&$oxygene,
		],
	],
];
var_dump($molecules);


$tris = [
	'croissant' => function(&$molecules){
		uasort($molecules,  function($a, $b)
		{
		    return count($a['atomes']) <=> count($b['atomes']);
		});
		return $molecules;
	},
	'decroissant' => function(&$molecules) {
		uasort($molecules,  function($a, $b)
		{
		    return -(count($a['atomes']) <=> count($b['atomes']));
		});
		return $molecules;
	}
];

function trierMolecules(&$molecules, callable $tri) : array
{
	 return $tri($molecules);
}
trierMolecules($molecules, $tris['croissant']);
var_dump($molecules);
