<?php

/*
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
*/

// =====Disambiguation=====
// Remember to escape + and [] in the pattern part of preg_replace.
// Remember to use == when testing absence of entries (eg tense=='')

$result_vb=query("select * from parsed");
while ($vb=pg_fetch_object($result_vb))
{

// Rule 1: remove ku17 entry from prefix if no tense is present (ie we have an infinitive)
if ( ($vb->tense=="") && (preg_match('/ku\[infin15,sp17\]/', $vb->prefix)) )
{
	$r1=preg_replace("/,sp17/u", "", $vb->prefix);
	$r1da=query("update parsed set prefix='$r1'");
// // // 	echo "Applied Rule 1\n";
}

// Rule 2: remove ku15 entry from prefix if a tense is present
if ( (!empty($vb->tense)) && (preg_match('/^ku/', $vb->prefix)) )
{
	$r2=preg_replace("/infin15,/u", "", $vb->prefix);
	$r2_da=query("update parsed set prefix='$r2'");
// 	echo "Applied Rule 2\n";
}

// Rule 4: remove sp entries from ineg if a prefix is present - hawangejua
if ( (!empty($vb->prefix)) && (preg_match('/neg\+sp/', $vb->ineg)) )
{
	$r4=preg_replace("/,neg\+sp.+\]/u", "]", $vb->ineg);
	$r4_da=query("update parsed set ineg='$r4'");
// 	echo "Applied Rule 4\n";
}

// Rule 5: remove +gen entries from prefix if a tense is present - hawangejua
if ( (!empty($vb->tense)) && (preg_match('/\+gen/', $vb->prefix)) )
{
	$r5=preg_replace("/,sp.+\+gen\]/u", "]", $vb->prefix);
	$r5_da=query("update parsed set prefix='$r5'");
// 	echo "Applied Rule 5\n";
}

// Rule 7: remove imp entry if no -e mode is present
if ( (preg_match('/neg-imp/', $vb->prefix)) && ($vb->mode=="") )
{
	$r7=preg_replace("/,neg-imp/u", "", $vb->prefix);
	$r7_da=query("update parsed set prefix='$r7'");
// 	echo "Applied Rule 6\n";
}

// Rule 8: remove neg-imp entry from si- prefix if -i mode is present - sipigi
if ( (preg_match('/i\[/', $vb->mode)) && (preg_match('/^si/', $vb->prefix)) )
{
	$r8=preg_replace("/,neg-imp/u", "", $vb->prefix);
	$r8_da=query("update parsed set prefix='$r8'");
// 	echo "Applied Rule 8\n";
}

// Rule 9: remove sp entry from si- prefix if -e mode is present - sipige
if ( (preg_match('/e\[/', $vb->mode)) && (preg_match('/^si/', $vb->prefix)) )
{
	$r9=preg_replace("/neg\+sp1-1s,/u", "", $vb->prefix);
	$r9_da=query("update parsed set prefix='$r9'");
// 	echo "Applied Rule 9\n";
}

// Rule 10: remove subj entry from -e mode if prefix contains imp - sipige
if ( (preg_match('/e\[/', $vb->mode)) && (preg_match('/neg-imp/', $vb->prefix)) )
{
	$r10=preg_replace("/,subj/u", "", $vb->mode);
	$r10_da=query("update parsed set mode='$r10'");
// 	echo "Applied Rule 10\n";
}

// Rule 11: remove hab entry from hu- prefix if -i mode is present - hutaki
if ( (preg_match('/i\[/', $vb->mode)) && (preg_match('/^hu/', $vb->prefix)) )
{
	$r11=preg_replace("/,hab/u", "", $vb->prefix);
	$r11_da=query("update parsed set prefix='$r11'");
// 	echo "Applied Rule 11\n";
}

// Rule 12: remove sp entry from hu- prefix if -i mode is not present - hutaka
if ( (empty($vb->mode)) && (preg_match('/^hu/', $vb->prefix)) )
{
	$r12=preg_replace("/neg\+sp1-2s,/u", "", $vb->prefix);
	$r12_da=query("update parsed set prefix='$r12'");
// 	echo "Applied Rule 12\n";
}

// Rule 14: remove imp entry from -e mode if tense contains ka - kaende
if ( (preg_match('/e\[/', $vb->mode)) && (preg_match('/^ka/', $vb->tense)) )
{
	$r14=preg_replace("/imp,/u", "", $vb->mode);
	$r14_da=query("update parsed set mode='$r14'");
// 	echo "Applied Rule 14\n";
}

// Rule 15: remove all but neg-gen-rel entry from tense if rel is present- asiyefika
if ( (!empty($vb->rel)) && (preg_match('/^si/', $vb->tense)) )
{
	$r15=preg_replace("/,.+\]/u", "]", $vb->tense);
	$r15_da=query("update parsed set tense='$r15'");
// 	echo "Applied Rule 15\n";
}

// Rule 16: remove sp1-2s from prefix if ha- is present - haufiki
if ( (!empty($vb->ineg)) && (preg_match('/^u/', $vb->prefix)) )
{
	$r16=preg_replace("/sp1-2s,/u", "", $vb->prefix);
	$r16_da=query("update parsed set prefix='$r16'");
// 	echo "Applied Rule 16\n";
}

// Rule 17: remove entries not containing +gen from prefix if no tense is present - waitaka
if ( (empty($vb->tense)) && (preg_match('/\+gen/', $vb->prefix)) )
{
	$r17=preg_replace("/\[.+[^\+gen],/u", "[", $vb->prefix);
	$r17_da=query("update parsed set prefix='$r17'");
// 	echo "Applied Rule 17\n";
}



// =====Error correction=====

// Correction 1: remove ha- entry if -singe- is present - *hawasingejua -> wasingejua
if ( (!empty($vb->ineg)) && (preg_match('/singe/', $vb->tense)) )
{
// 	echo "\nApplied Correction 1\n";
// 	echo "Incorrect: There are two negatives here.  Either remove the initial negative 'ha-' (corrected below), or use 'nge' instead of 'singe'.  Re-enter the form below for a correct analysis.";
	$c1_da=query("update parsed set ineg=''");
}

// Correction 2: move endrel if -si- is present - *asifikaye -> asiyefika
if ( (preg_match('/endrel/', $vb->suffix)) && (!empty($vb->tense)) )
{
// 	echo "\nApplied Correction 2\n";
// 	echo "Incorrect: An end-relative cannot be used with any tense other than the general present (-a-) - put the relative after the tense marker (corrected below).  Re-enter the form below for a correct analysis.";
	$c2_da=query("update parsed set rel='$vb->suffix', suffix=''");
}

// Correction 3: use -taka- (not -ta-) if rel is present - *atayeona -> atakayeona
if ( (!empty($vb->rel)) && (preg_match('/^ta(?!ka)/', $vb->tense)) )
{
// 	echo "\nApplied Correction 3\n";
// 	echo "Incorrect: Use -taka- for the future tense when a relative particle is attached (corrected below).  Re-enter the form below for a correct analysis.";
	$c3_da=query("update parsed set tense='taka[fut-rel]'");
}

// Correction 4: use -taka- (not -ta-) if rel is present - *atayeona -> atakayeona
if ( (preg_match('/e\[/', $vb->mode)) && (preg_match('/^ka/', $vb->tense)) )
{
// 	echo "\nApplied Correction 4\n";
// 	echo "Incorrect: The consecutive subjunctive does not take a subject prefix (corrected below).  Re-enter the form below for a correct analysis.";
	$c4_da=query("update parsed set prefix=''");
}


} // end of disambiguation

?>