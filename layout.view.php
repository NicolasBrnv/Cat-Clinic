<?php
/**
 * Fichier de mise en page
 * @author Christian Bonhomme
 * @version 1.0
 * @package EXERCICE-MOOC
 */

global $content;
$vheader = new VHeader();
$vcontent = new $content['class']();
?>

<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?=$content['title']?></title>
		<link rel="stylesheet" href="../css/app.css">
	</head>
<body>
	
	<header>
		<nav><?php $vheader->showHeader(); ?></nav>
	</header>

	<div id="content">
		<?php $vcontent->{$content['method']}($content['arg']); ?>

		<footer><?php $vheader->showHeader(); ?></footer>
	</div>

	<script src="node_modules/jquery/dist/jquery.js"></script>
	<script src="node_modules/what-input/dist/what-input.js"></script>
	<script src="node_modules/foundation-sites/dist/js/foundation.js"></script>
	<script src="js/app.js"></script>
	<script src="../js/exercice.js"></script>
</body>
</html>
