<?php

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
	$verb='';
	
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
	lookup_cli($remnant);
	if (isset($found)) {$got_verb=1; $verb=$found;}
	$result2=query("update parsed set prefix='$parse', verb='$found', mode='$mode'");
	unset($found,$mode,$parse,$end);
	}
	
	if ($got_verb==0)
	{
	// tense/mood markers and negative particles
	$tense=tenses($remnant);
	//echo "tense: ".$tense."\n";
	cutter($tense);
	lookup_cli($remnant);
	if (isset($found)) {$got_verb=1; $verb=$found;}
	$result3=query("update parsed set tense='$parse', verb='$found', mode='$mode'");
	unset($found,$mode,$parse,$end);
	}
	
	if ($got_verb==0)
	{
	// relatives
	$rel=relatives($remnant);
	//echo "rel: ".$rel."\n";
	cutter($rel);
	lookup_cli($remnant);
	if (isset($found)) {$got_verb=1; $verb=$found;}
	$result4=query("update parsed set rel='$parse', verb='$found', mode='$mode'");
	unset($found,$mode,$parse,$end);
	}
	
	if ($got_verb==0)
	{
	// object pronouns and ku-/kw- monosyllabic prop
	$obj=objects($remnant);
	//echo "obj: ".$obj."\n";
	cutter($obj);
	lookup_cli($remnant);
	if (isset($found)) {$got_verb=1; $verb=$found;}
	$result5=query("update parsed set object='$parse', verb='$found', mode='$mode'");
	unset($found,$mode,$parse,$end);
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
		$final=$row_layout->ineg.$row_layout->prefix.$row_layout->tense.$row_layout->rel.$row_layout->object.$row_layout->verb.$row_layout->mode.$row_layout->suffix;
	}
	echo "\n".$final."\n\n";

	$v++;  // number the next verb
	
	fwrite($fpw,$line."\t\t".$final."\n");
}

fclose($fpw);

?>