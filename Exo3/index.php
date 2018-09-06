<h1>Typage: </h1>
	<p>1 + 1 = <?php var_dump (1 + 1); ?></p>
	<p>010 + 2 = <?php var_dump (010 + 2); ?></p>
	<p>012801 = <?php //echo (012801); ?></p>
	<p>39 % 3 = <?php var_dump (39 % 3); ?></p>
	<p>2**3 = <?php var_dump (2**3); ?></p>
	<p>1.5 - 1.0 = <?php var_dump (1.5 - 1.0); ?></p>
	<p>0.6 == 0.7 - 0.1 = <?php var_dump (0.6 == 0.7 - 0.1); ?></p>
	<p>.7 == .8 - .1 = <?php var_dump( 0.7 == 0.8 - 0.1); ?></p>
	<p>'text'{2} = <?php var_dump ('text'{2}); ?></p>

<?php
$array = [1, 3 => 2, 3];
$array[0] = 4;
$array[] = 5;

?>
// Contexte plus complet 
$array = [1, 3 => 2, 3];
$array[0] = 4;
$array[] = 5;

// Que contient $array ?
<?php 
var_dump($array);
?>


<h1>Transtypage: </h1>

<p>1 + .7 = <?php var_dump (1 + .7); ?></p>
<p>12345678901234567890 = <?php var_dump (12345678901234567890); ?></p>
<p>10 + null = <?php var_dump (10 + null); ?></p>
<p>"0.50 euros + 2.50 euros" == .5 = <?php var_dump ('0.50 euros + 2.50 euros' == .5); ?></p>
<p>[] > 0 = <?php var_dump ([] > 0); ?></p>
<p>[] == null = <?php var_dump ([] == null); ?></p>
<p>[1, 2] + [3, 4] = <?php var_dump ([1, 2] + [3, 4]); ?></p>
<p>(int) 'Bonjour' = <?php var_dump ((int) 'Bonjour'); ?></p>
<p>(array) 12 = <?php var_dump ((array) 12); ?></p>

