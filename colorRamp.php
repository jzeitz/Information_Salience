<?php

$origColors = file('colorsOrange.txt');

$colors = array();

foreach ($origColors as $color) {
	$colors[] = (explode(" ", $color));
}

?>