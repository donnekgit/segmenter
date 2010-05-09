<html>

<head>
<title>Swahili verb segmenter</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Free (GPL) Swahili verb segmenter">
<meta name="keywords" content="Swahili language Bantu languages verb conjugator analyser analyzer segmenter split segment analyse analyze verbform radical root morphology morphological free software GPL">
<link rel="stylesheet" href="css/blueprint/screen.css" type="text/css"
media="screen, projection">
<link rel="stylesheet" href="css/blueprint/print.css" type="text/css"
media="print">	
<!--[if lt IE 8]><link rel="stylesheet" href="css/blueprint/ie.css"
type="text/css" media="screen, projection"><![endif]-->
</head>

<body>

<div class="banner">
  <a href="index.php"><img src="images/header.png" width="671" height="129"
/></a>
</div>


<div class="container">  <!-- begin content container -->  


<div class="span-24">  <!-- begin top matter -->

<h1>A segmenter for Swahili verbs</h1>

<hr>
<div class="span-24 center">

	<form action="parse.php" method="POST">
	<input type="text" maxlength="30" size="30" value="<?php echo $_POST['myverb']; ?>" name="myverb">
	<input type="submit" name="submit" value="<?php echo _("Segment this verbform"); ?>">
	</form>

</div>
<hr>

</div>  <!-- end top matter -->
