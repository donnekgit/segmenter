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

// do initial setup
include("swahili/config.php");
include("includes/fns.php");

$v='1';  // set up numbers for each line, so that the printout shows how far through we are

$input="test/verbs.txt";  // a default input file with some verbforms supplied - change this as required
$output="test/parsed_verbs.txt";  // a default output file - change this as required

$lines=file($input,FILE_SKIP_EMPTY_LINES);  // open the input file and start reading

$fpw=fopen($output, "w");  // open the output file for writing

foreach ($lines as $line)
{ // begin reading the file

	$line=trim($line);
	
	echo "(".$v.")" .$line."=================\n";  // some feedback - for more feedback, uncomment the various echo lines below
	
	$verbform=$line;

	// empty the table that will hold the parse
	$result=query("truncate parsed");
	$result=query("alter sequence parsed_parse_id_seq restart 1");
	
	$got_verb=0;  // set up a check so that once a verb match is found, we stop trying to segment
	
	//suffixes
	$suff=suffixes($verbform);
	//echo "suff: ".$suff."\n";
	cutter_end($suff);
	$suffix=$end;
	
	// negative ha-
	$neg=ineg($remnant);
	//echo "neg: ".$neg."\n";
	cutter($neg);
	$result1=query("insert into parsed (ineg) values ('$parse')");
	unset($parse);
	
	if ($got_verb==0)
	{
	// prefixes (subject pronouns, negatives, infinitive, habitual)
	$pref=prefixes($remnant);
	//echo "pref: ".$pref."\n";
	cutter($pref);
	lookup($remnant);
	if (isset($found)) {$got_verb=1;}
	$result2=query("update parsed set prefix='$parse', root='$root', plus='$plus', english='$english', mode='$mode'");
	unset($verb,$root,$plus,$english,$mode,$parse,$end);
	}
	
	if ($got_verb==0)
	{
	// tense/mood markers and negative particles
	$tense=tenses($remnant);
	//echo "tense: ".$tense."\n";
	cutter($tense);
	lookup($remnant);
	if (isset($root)) {$got_verb=1; $verb=$root."_".$plus."(".$english.")";}
	$result3=query("update parsed set tense='$parse', root='$root', plus='$plus', english='$english', mode='$mode'");
	unset($verb,$root,$plus,$english,$mode,$parse,$end);
	}
	
	if ($got_verb==0)
	{
	// relatives
	$rel=relatives($remnant);
	//echo "rel: ".$rel."\n";
	cutter($rel);
	lookup($remnant);
	if (isset($root)) {$got_verb=1; $verb=$root."_".$plus."(".$english.")";}
	$result4=query("update parsed set rel='$parse', root='$root', plus='$plus', english='$english', mode='$mode'");
	unset($verb,$root,$plus,$english,$mode,$parse,$end);
	}
	
	if ($got_verb==0)
	{
	// object pronouns and ku-/kw- monosyllabic prop
	$obj=objects($remnant);
	//echo "obj: ".$obj."\n";
	cutter($obj);
	lookup($remnant);
	if (isset($root)) {$got_verb=1; $verb=$root."_".$plus."(".$english.")";}
	$result5=query("update parsed set object='$parse', root='$root', plus='$plus', english='$english', mode='$mode'");
	unset($verb,$root,$plus,$english,$mode,$parse,$end);
	}
	
	//echo "verb: ".$verb."\n";
	
	//echo "suffix: ".$suffix."\n";
	
	// add the endings if there are any to add
	if (!empty($suffix))
	{
		$result_suffix=query("update parsed set suffix='$suffix'");
	}
	
	// run disambiguations and corrections
	include("cli_disambiguate.php");
	
	// print out the parse on one line
	$result_layout=query("select * from parsed");
	while ($row_layout=pg_fetch_object($result_layout))
	{
		$final=$row_layout->ineg.$row_layout->prefix.$row_layout->tense.$row_layout->rel.$row_layout->object.$row_layout->root.$row_layout->plus."(".$row_layout->english.")".$row_layout->mode.$row_layout->suffix;
	}
	echo "\n".$final."\n\n";

	$v++;  // number the next verb
	
	fwrite($fpw,$line."\t\t".$final."\n");
}

fclose($fpw);

?>