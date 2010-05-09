<?php 
header("Content-type: text/html; charset=utf-8");
include("includes/header.php");
?>

<div class="span-24">  <!-- begin parse output -->

<?php

// do the segmentation
include("segment.php");

// run disambiguations and (a few) corrections
include("disambiguate.php");

// print out the results nicely coloured and formatted
include("display.php");

// print out abbreviations for reference
include("abbrevs.php");

?>

</div>  <!-- end parse output -->


<?php
include("includes/footer.php");
?>
