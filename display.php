<?php

// print out the parse on one line
$result_layout=query("select * from parsed");
while ($row_layout=pg_fetch_object($result_layout))
{
	$ineg=preg_split('/\[/u', $row_layout->ineg, 2);
	$prefix=preg_split('/\[/u', $row_layout->prefix, 2);
	$tense=preg_split('/\[/u', $row_layout->tense, 2);
	$rel=preg_split('/\[/u', $row_layout->rel, 2);
	$object=preg_split('/\[/u', $row_layout->object, 2);
	$root=$row_layout->root;
	$plus=$row_layout->plus;
	$english=$row_layout->english;
	$mode=preg_split('/\[/u', $row_layout->mode, 2);
	$suffix=preg_split('/\[/u', $row_layout->suffix, 2);
	
/*
	echo $ineg[0]."<br />";
	echo preg_replace('/\]/','',$ineg[1])."<br />";
	echo $prefix[0]."<br />";
	echo preg_replace('/\]/','',$prefix[1])."<br />";
	echo $tense[0]."<br />";
	echo preg_replace('/\]/','',$tense[1])."<br />";
	echo $rel[0]."<br />";
	echo preg_replace('/\]/','',$rel[1])."<br />";
	echo $object[0]."<br />";
	echo preg_replace('/\]/','',$object[1])."<br />";
	echo $root."<br />";
	echo $plus."<br />";
	echo $english."<br />";
	echo $mode[0]."<br />";
	echo preg_replace('/\]/','',$mode[1])."<br />";
	echo $suffix[0]."<br />";
	echo preg_replace('/\]/','',$suffix[1])."<br />";
*/

	if (isset($ineg[0])) {$ineg_f=$ineg[0];$ineg_p=preg_replace('/\]/','',$ineg[1]);} else {$ineg=''; $ineg_p='';}
	if (isset($prefix[0])) {$prefix_f=$prefix[0];$prefix_p=preg_replace('/\]/','',$prefix[1]);} else {$prefix=''; $prefix_p='';}
	if (isset($tense[0])) {$tense_f=$tense[0];$tense_p=preg_replace('/\]/','',$tense[1]);} else {$tense=''; $tense_p='';}
	if (isset($rel[0])) {$rel_f=$rel[0];$rel_p=preg_replace('/\]/','',$rel[1]);} else {$rel=''; $rel_p='';}
	if (isset($object[0])) {$object_f=$object[0];$object_p=preg_replace('/\]/','',$object[1]);} else {$object=''; $object_p='';}
	if (isset($mode[0])) {$mode_f=$mode[0];$mode_p=preg_replace('/\]/','',$mode[1]);} else {$mode=''; $mode_p='';}
	if (isset($suffix[0])) {$suffix_f=$suffix[0];$suffix_p=preg_replace('/\]/','',$suffix[1]);} else {$suffix=''; $suffix_p='';}
	if ($plus!='') {$plus_f="_".$plus;} else {$plus_f='';}

	$ineg_s="<strong>".$ineg_f."</strong> <sub><i>".$ineg_p."</i></sub> ";
	$prefix_s="<strong>".$prefix_f."</strong> <sub><i>".$prefix_p."</i></sub> ";
	$tense_s="<strong>".$tense_f."</strong> <sub><i>".$tense_p."</i></sub> ";
	$rel_s="<strong>".$rel_f."</strong> <sub><i>".$rel_p."</i></sub> ";
	$object_s="<strong>".$object_f."</strong> <sub><i>".$object_p."</i></sub> ";
	$root_s="<strong>".strtoupper($root)."</strong><i>".$plus_f."</i><sub><i>(=".$english.")</i></sub> ";
	$mode_s="<strong>".$mode_f."</strong> <sub><i>".$mode_p."</i></sub> ";
	$suffix_s="<strong>".$suffix_f."</strong> <sub><i>".$suffix_p."</i></sub>";

	$final=$ineg_s.$prefix_s.$tense_s.$rel_s.$object_s.$root_s.$mode_s.$suffix_s;
}

echo "<div class=\"center\">";
echo "<br /><br /><span class=\"highlight\">&nbsp;".$myverb."&nbsp;</span><br /><br />";
echo $final."<br /><br />";
echo "</div>";

?>
