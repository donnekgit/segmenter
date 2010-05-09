<?php

// do initial setup
include("swahili/config.php");
include("includes/fns.php");

if ($_POST['myverb'])
{
    $myverb=pg_escape_string($_POST['myverb']);
}
else
{
    $myverb=pg_escape_string($_GET['myverb']);
}

checktext($myverb);

$verbform=$myverb;

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
	lookup($remnant);
	if (isset($root)) {$got_verb=1;}
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

?>
