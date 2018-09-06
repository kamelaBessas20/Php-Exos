#!C:\xampp\php\php.exe
<?php

$particulesConnues = ['gluon', 'quark', 'neutrino', 'boson'];

echo "Veuillez nous fournir la liste de vos particules utiles\n";
echo "(séparé par une virgule): ";

$particulesUtiles = explode(',', trim(fgets(STDIN)));
$particulesUtiles = array_map('clean', $particulesUtiles);

$newParticules = array_diff($particulesUtiles, $particulesConnues);
$particules = array_merge($particulesConnues, $newParticules);

$diffParticule = [];

array_walk($particules, function($particule, $key) use ($particulesConnues,$particulesUtiles, &$diffParticule){
	if(in_array($particule, $particulesConnues) && in_array($particule, $particulesUtiles)){
		$diffParticule[] = ['etat' => '=', 'name' => $particule];
	}
	if(in_array($particule, $particulesConnues) && !in_array($particule, $particulesUtiles)){
		$diffParticule[] = ['etat' => '-', 'name' => $particule];
	}
	if(!in_array($particule, $particulesConnues) && in_array($particule, $particulesUtiles)){
		$diffParticule[] = ['etat' => '+', 'name' => $particule];
	}
});
foreach ($diffParticule as $particule) {
	echo "${particule['name']}  [${particule['etat']}]\n";
}

function clean($val){
	return trim($val);
}
// var_dump($particules);
