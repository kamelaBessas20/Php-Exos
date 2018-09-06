<?php
$factoriel = function($n) use (&$factoriel)
{
	if($n==1) return 1;
	return $factoriel($n - 1) * $n;
};

// echo $factoriel(1000);


function goto_factoriel($n)
{
	$acc = 1;

facto:
	if($n == 1) return $acc;

	$acc *= $n--;
	goto facto;
}

echo goto_factoriel(1000);