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

<div class="span-11">  <!-- begin first column -->

<h2>Background</h2>

<p>This webpage allows Swahili verbforms to be segmented for use in parsers or taggers.  Although some segmenters already exist, they either handle only a few basic forms, or are not available under an open license.  This segmenter handles all the one-word tenses in Swahili, and is licensed under the <a href="http://www.gnu.org/licenses/gpl.html">GPLv3</a> and the <a href="http://www.gnu.org/licenses/agpl.html">AGPLv3</a>.</p>

<p>The segmenter uses the data from Beata Wójtowicz's <a href="www.freedict.org">FreeDict</a> Swahili dictionary, so it will not specify the verb unless it is one of the 500-odd which that dictionary already contains.  As the dictionary is expanded, the segmenter will recognise more verbs.</p>

<p>Two variants of the segmenter exist: this web version, and a version that can be run from the command line against a file listing verbforms to be analysed.  It would also be possible to use this latter version as part of an application that would tag connected text.</p>

<p>The segmenter is written in PHP, and uses a PostgreSQL database.  Many improvements could probably be made to the code.  For instance, it is relatively slow - working through a list of 140,000 possible verbforms drawn from Kevin Scannell's <a href="http://borel.slu.edu/crubadan">Crubadán</a> Swahili corpus, its average rate was around 87 per minute.</p>

<h2>Method</h2>

<p>The approach used here takes advantage of the fact that Swahili verbs have specific slots for each type of morphological affix.  There is some overlap, particularly where negative markers and the general present or habitual markers are concerned, but in general the sequence is fixed.<p>  

<p>The segmenter first removes and stores suffixes such as relative particles and the enclitics <em>-ni</em>, <em>-pi</em>, <em>-je</em>.  Prefixes are then split off the verbform slot by slot, and tagged with morphological information.  After each such split, the remainder of the verbform is checked against the dictionary to see if it can be interpreted as a verb, and whether or not it seems to have a negative (<em>-i</em>) or subjunctive (<em>-e</em>) verb ending.  If so, then no further splitting is done, and the stored suffixes are added back to give a full parsed form.</p>

<p>Once the parse has been completed, it is examined in order to see whether some tags are inconsistent with others and can therefore be struck out.  This disambiguation is similar to constraint grammar, but working within the word boundary rather than across it.  A related area is error-checking.  Initial work has been done on this, with suggestions to the user as to how to correct obvious errors, but this needs to be greatly extended.</p>

</div>  <!-- end first column -->

<div class="span-1">  <!-- begin first column -->
&nbsp;
</div>

<div class="span-11" last>  <!-- begin second column -->


<h2>Usage</h2>

<p>Simply type the word you want to check into the box above and press the button.  Suggested test forms are: <em>wanavyotaka</em>, <em>kilichompiga</em>, <em>afanyaye</em>, <em>husimama</em>, <em>sitaki</em>, <em>amekwendapi</em>, <em>utafikaje</em>.</p>

<p>Examples of incorrect forms (to test error correction) are: <em>hawasingejua</em>, <em>asifikaye</em>, <em>atayeona</em>.</p>

<h2>Source code</h2>

<p>The code and data for this application are available from the <a href="http://thinkopen.co.uk/git/">Git repositories at ThinkOpen</a>.  If you have <a href="http://git-scm.com/">Git</a> installed, you can download the files by running:
<div class="center"><em>git clone http://thinkopen.co.uk/git/segmenter</em></div>
If not, you can download the files by going to <a href="http://thinkopen.co.uk/git/">http://thinkopen.co.uk/git/</a>, clicking on <em>segmenter</em>, then on <em>tree</em>, and finally on <em>snapshot</em>.  Any suggestions for improvement in either code or data are very welcome - contact me on:<br /><img src="images/email.png" width="115" height="17" /></p>

<h2>A note on verb roots</h2>

<p>Because of the extensive use of affixes in Bantu languages, grouping related forms in a dictionary cuts across the alphabetical listing of such forms - see <a href="http://www.njas.helsinki.fi/pdf-files/vol14num3/kiango.pdf"><b>Problems of citation forms in dictionaries of Bantu languages</a> (John C Kiango), Nordic Journal of African Studies, 14(3), 2005</b> for an interesting discussion.  The system used here is intended to allow related dictionary forms to come up in queries of the expanded version of the FreeDict Swahili dictionary that I am working on.  For verbs derived from Arabic (eg <em>-fahamu</em>), the Arabic stem (in this case <em>f-h-m</em>) is used as the root. </p>


</div>  <!-- end second column -->


<?php
include("includes/footer.php");
?>
