<?php

$origColors = file('colors.txt');

$colors = array();

foreach ($origColors as $color) {
	$colors[] = (explode(" ", $color));
}

?>