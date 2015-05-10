<?php
include_once 'src/Laufsport.php';

if (isset($_POST['invio']) && $_POST['invio']==1) {
	$oCorsa = new Laufsport();
	$oCorsa->addTime($_POST['secondi']);
	$oCorsa->addDistance($_POST['metri']);
	echo '<pre>';
	echo 'velocità media (m/sec): '.$oCorsa->getAverageSpeed()."\n";
	echo 'velocità media (km/h): '.$oCorsa->getAverageSpeed('kmh')."\n";
	echo 'passo (min/km): '.$oCorsa->getPace('minperkm')."\n";
	echo 'passo (min/mi): '.$oCorsa->getPace('minpermi')."\n";
	echo '</pre>';
}
?>
<hr>
<form method="post">
	<input type="hidden" name="invio" value="1">
	Calcolo corsa<br>
	metri <input type="text" name="metri" value="<?php echo isset($_POST['metri'])?$_POST['metri']:''; ?>"><br>
	secondi <input type="text" name="secondi" value="<?php echo isset($_POST['secondi'])?$_POST['secondi']:''; ?>"><br>
	<input type="submit">
</form>
