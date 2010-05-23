<?php 
header("Content-type: text/html; charset=utf-8");
include("includes/header.php");
?>

<!--
*********************************
Copyright Kevin Donnelly 2010

This file is part of the Swahili verb segmenter - http://kevindonnelly.org.uk/swahili/segmenter

The segmenter is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

The segmenter is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with the segmenter.  If not, see <http://www.gnu.org/licenses/>.
**********************************
-->

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
