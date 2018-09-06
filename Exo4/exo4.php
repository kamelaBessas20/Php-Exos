#!C:\xampp\php\php.exe
<?php
$data = [];
if (($handle = fopen("customers.csv", "r")) !== FALSE) {
	while(( $content = fgetcsv($handle, 1000, ',')) !== FALSE) {
		if(!empty($content)){
			$data[] = $content;
		}
	}
	fclose($handle);

	for($c = 0; $c < count($data); $c++){
		echo "[$c] : ".$data[$c][0]." \n"; 
	}

	select:
	echo "Selectionnez un client : ";
	$sel = trim(fgets(STDIN));
	if(!array_key_exists($sel, $data)){
		goto select;
	}
	echo "\n Vous avez selectionné : ". $data[$sel][0];
	echo "\n Son adresse mail : " . $data[$sel][1];

	retry:
	echo "\n Shouhaitez vous lui envoyer un Email ? [o/n]";
	$rep = trim(fgets(STDIN));
	switch ($rep) {
		case 'o':
		case 'oui':
		case 'yes':
			echo "Email envoyé";
			break;
		case 'n':
		case 'non':
			echo "Au revoir";
			break;
		default:
			echo "Mauvais choix!! retente ta chance";
			goto retry;
			break;
	}
}
