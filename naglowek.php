<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Galeria zdjęć">
    <meta name="author" content="Marek Słowik">
    <title>Galeria zdjęć</title>

    <link href="dist/css/bootstrap.css" rel="stylesheet">
	<link href="dist/css/bootstrap-theme.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="javascript/highslide-with-gallery.js"></script>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
	<script type="text/javascript">
	hs.graphicsDir = 'javascript/images/';
	hs.align = 'center';
	hs.transitions = ['expand', 'crossfade'];
	hs.outlineType = 'rounded-white';
	hs.fadeInOut = true;
	//hs.dimmingOpacity = 0.75;

	// Add the controlbar
	if (hs.addSlideshow) hs.addSlideshow({
		//slideshowGroup: 'group1',
		interval: 5000,
		repeat: false,
		useControls: true,
		fixedControls: 'fit',
		overlayOptions: {
			opacity: .75,
			position: 'bottom center',
			hideOnMouseOut: true
		}
	});
</script>
</head>

<body>
<div class="container">


