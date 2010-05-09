<?php

function query($sql)
// simplify the query writing
// use this as: $result=query("select * from table")
{
    global $db_handle;
    return pg_query($db_handle,$sql);
}

function checktext($var)
// check the input
{
    for ($i = 0; $i < strlen($var); $i++) 
    {
        if (!ereg("[-A-Za-z_0-9' ]", $var[$i]))
        {
            echo _("It's best to remove everything other than letters, numbers and spaces from the search string, otherwise the segmentation won't work ...");
            exit;
        }
    }
}

function show_array($array)
// shows the contents of an array
{
    foreach ($array as $value)
    {
        if (is_array($value))
        {
            show_array($value); 
        }
        else
        {
            echo $value . "\n"; // for CLI
			//echo $value . "<br>";  // for webpages
        } 
    }
}

function getAvailableLangs()
// add supported languages here
{
    $langs["en"] = array(_("English, Kiingereza"), "en_GB.UTF-8");
    $langs["sw"] = array(_("Kiswahili, Swahili"), "sw_TZ.UTF-8");
    reset($langs);
    return $langs;
}

function getLang()
{
    global $default_language;
    $lang = $_COOKIE['lang'];
    $alangs = getAvailableLangs();
    if (empty($lang) || empty($alangs[$lang]))
    {
        $lang=$default_language;
    }
    return($lang);
}

function cutter_end($text)
{
	global $end;
	global $remnant;
	if (preg_match("/::/u", $text)) 
	{ 
		$cut=preg_split('/::/u', $text, 2);
		$end=$cut[1];
		$remnant=$cut[0];
	}
	else
	{
		$remnant=$text;
	}
	return $end;
	return $remnant;
}

function cutter($text)
{
	global $parse;
	global $remnant;
	if (preg_match("/::/u", $text)) 
	{ 
		$cut=preg_split('/::/u', $text, 2);
		$parse=$cut[0];
		$remnant=$cut[1];
	}
	else
	{
		$remnant=$text;
	}
	return $parse;
	return $remnant;
}

// Look up a sequence in the dictionary.  If a straight lookup doesn't produce a result, try changeing a final -e (subjunctive) to -a and look that up, and then try changing a final -i (negative) to -a and look that up.  CLI version - without subscripts.
function lookup_cli($text)
{
	global $found;
	global $mode;
	$result=query("select * from vbdict where swahili='$text' and pos='v'");
	if (pg_num_rows($result) > 0)
	{
		while ($row=pg_fetch_object($result))
		{
			$found=strtoupper($row->root)."_".$row->plus."(".$row->english.")";
			$mode="a[unmarked]";
		}
	}
	else
	{
		$text=preg_replace("/e$/u", "a", $text);
		$result=query("select * from vbdict where swahili='$text' and pos='v'");
		if (pg_num_rows($result) > 0)
		{
			while ($row=pg_fetch_object($result))
			{
				$found=strtoupper($row->root)."_".$row->plus."(".$row->english.")";
				$mode="e[imp,subj]";
			}
		}
		else
		{
			$text=preg_replace("/i$/u", "a", $text);
			$result=query("select * from vbdict where swahili='$text' and pos='v'");
			while ($row=pg_fetch_object($result))
			{
				$found=strtoupper($row->root)."_".$row->plus."(".$row->english.")";
				$mode="i[neg-gen]";
			}
		}
	}
	return $found;
	return $mode;
}

// Look up a sequence in the dictionary.  If a straight lookup doesn't produce a result, try changeing a final -e (subjunctive) to -a and look that up, and then try changing a final -i (negative) to -a and look that up.  Web version - more formatting possibilities.
function lookup($text)
{
	global $root;
	global $plus;
	global $english;
	global $mode;

	$result=query("select * from vbdict where swahili='$text' and pos='v'");
	if (pg_num_rows($result) > 0)
	{
		while ($row=pg_fetch_object($result))
		{
			$root=$row->root;
			$plus=$row->plus;
			$english=$row->english;
			$mode="a[unmarked]";
		}
	}
	else
	{
		$text=preg_replace("/e$/u", "a", $text);
		$result=query("select * from vbdict where swahili='$text' and pos='v'");
		if (pg_num_rows($result) > 0)
		{
			while ($row=pg_fetch_object($result))
			{			
				$root=$row->root;
				$plus=$row->plus;
				$english=$row->english;
				$mode="e[imp,subj]";
			}
			
		}
		else
		{
			$text=preg_replace("/i$/u", "a", $text);
			$result=query("select * from vbdict where swahili='$text' and pos='v'");
			while ($row=pg_fetch_object($result))
			{
				$root=$row->root;
				$plus=$row->plus;
				$english=$row->english;				
				$mode="i[neg-gen]";
			}
			
		}
	}
	return $root;
	return $plus;
	return $english;
	return $mode;
}

function ineg($text)
{
	$text=preg_replace("/^ha/u", "ha[initneg,neg+sp1-3s]::", $text);
	return $text;
}

function prefixes($text)
{	
	$text=preg_replace("/^(mwa)/u", "$1[sp2-2p+gen,sp18+gen]::", $text);
	$text=preg_replace("/^(twa)/u", "$1[sp2-1p+gen]::", $text);
	$text=preg_replace("/^(cha)/u", "$1[sp7+gen]::", $text);
	$text=preg_replace("/^(vya)/u", "$1[sp8+gen]::", $text);
	$text=preg_replace("/^(kwa)/u", "$1[sp15+gen,sp17+gen]::", $text);
	$text=preg_replace("/^(ni)/u", "$1[sp1-1s]::", $text);
	$text=preg_replace("/^(n)(?=na)/u", "$1[sp1-1s]::", $text);
	$text=preg_replace("/^(tu)/u", "$1[sp2-1p]::", $text);
	$text=preg_replace("/^(wa)/u", "$1[sp2-3p,sp2-3p+gen,sp3+gen,sp11+gen,sp14+gen]::", $text);
	$text=preg_replace("/^(li)/u", "$1[sp5]::", $text);
	$text=preg_replace("/^(ya)/u", "$1[sp6,sp6+gen,sp4+gen,sp9+gen]::", $text);
	$text=preg_replace("/^(ki)/u", "$1[sp7]::", $text);
	$text=preg_replace("/^(vi)/u", "$1[sp8]::", $text);
	$text=preg_replace("/^(zi)/u", "$1[sp10]::", $text);
	$text=preg_replace("/^(ku)/u", "$1[infin15,sp17]::", $text);
	$text=preg_replace("/^(pa)/u", "$1[sp16,sp16+gen]::", $text);
	$text=preg_replace("/^(mu)/u", "$1[sp18]::", $text);
	$text=preg_replace("/^(na)/u", "$1[sp1-1s+gen]::", $text);
	$text=preg_replace("/^(la)/u", "$1[sp5+gen]::", $text);
	$text=preg_replace("/^(za)/u", "$1[sp10+gen]::", $text);
	$text=preg_replace("/^(si)/u", "$1[neg+sp1-1s,neg-imp]::", $text);
	$text=preg_replace("/^(hu)/u", "$1[neg+sp1-2s,hab]::", $text);
	$text=preg_replace("/^(u)/u", "$1[sp1-2s,sp3,sp11,sp14]::", $text);
	$text=preg_replace("/^(a)/u", "$1[sp1-3s,sp1-3s+gen]::", $text);
	$text=preg_replace("/^(m)(?!u)/u", "$1[sp2-2p]::", $text);
	$text=preg_replace("/^(i)/u", "$1[sp4,sp9]::", $text);
	return $text;
}

function tenses($text)
{	
	$text=preg_replace("/^(singali)/u", "$1[neg-supp]::", $text);
	$text=preg_replace("/^(ngali)/u", "$1[supp]::", $text);
	$text=preg_replace("/^(singe)/u", "$1[neg-cond]::", $text);
	$text=preg_replace("/^(japo)/u", "$1[hypo]::", $text);
	$text=preg_replace("/^(nge)/u", "$1[cond]::", $text);
	$text=preg_replace("/^(nga)(?!li)/u", "$1[conc]::", $text);
	$text=preg_replace("/^(na)/u", "$1[curr]::", $text);
	$text=preg_replace("/^(li)(?!(kwi)?sha)/u", "$1[past]::", $text);
	$text=preg_replace("/^(li(kwi)?sha)/u", "$1[past-comp]::", $text);
	$text=preg_replace("/^(ku)/u", "$1[neg-past]::", $text);
	$text=preg_replace("/^(lo)/u", "$1[past-rel]::", $text);
	$text=preg_replace("/^(to)/u", "$1[neg]::", $text);
	$text=preg_replace("/^(taka)/u", "$1[fut-rel]::", $text);
	$text=preg_replace("/^(ta)(?!ka)/u", "$1[fut]::", $text);
	$text=preg_replace("/^(ka)/u", "$1[cons]::", $text);
	$text=preg_replace("/^(me)(?!(kwi)?sha)/u", "$1[perf]::", $text);
	$text=preg_replace("/^(me(kwi)?sha)/u", "$1[perf-comp]::", $text);
	$text=preg_replace("/^(ja)(?!po)/u", "$1[neg-perf]::", $text);
	$text=preg_replace("/^(ki)(?!(kwi)?sha)/u", "$1[part]::", $text);
	$text=preg_replace("/^(ki(kwi)?sha)/u", "$1[part-comp]::", $text);
	$text=preg_replace("/^(sipo)/u", "$1[part]::", $text);
	$text=preg_replace("/^(si)(?!ngali|nge|po)/u", "$1[neg-gen,neg-subj,neg-imp]::", $text);
	return $text;
}

function relatives($text)
{	
	$text=preg_replace("/^(cho)/u", "$1[rel7]::", $text);
	$text=preg_replace("/^(vyo)/u", "$1[rel8]::", $text);
	$text=preg_replace("/^(ye)/u", "$1[rel1-3s]::", $text);
	$text=preg_replace("/^(yo)/u", "$1[rel4,rel6,rel9]::", $text);
	$text=preg_replace("/^(lo)/u", "$1[rel5]::", $text);
	$text=preg_replace("/^(zo)/u", "$1[rel10]::", $text);
	$text=preg_replace("/^(po)/u", "$1[rel16]::", $text);
	$text=preg_replace("/^(ko)/u", "$1[rel17]::", $text);
	$text=preg_replace("/^(mo)/u", "$1[rel18]::", $text);
	$text=preg_replace("/^(o)/u", "$1[rel2-3p,rel3,rel11,rel14]::", $text);
	return $text;
}

function objects($text)
{
	$text=preg_replace("/^(ni)/u", "$1[op1-1s]::", $text);
	$text=preg_replace("/^(ku)/u", "$1[op1-2s,op15,op17,ms]::", $text);
	$text=preg_replace("/^(mw)/u", "$1[op2-3s]::", $text);
	$text=preg_replace("/^(tu)/u", "$1[op2-1p]::", $text);
	$text=preg_replace("/^(wa)/u", "$1[op2-2p,op2-3p]::", $text);
	$text=preg_replace("/^(li)/u", "$1[op5]::", $text);
	$text=preg_replace("/^(ya)/u", "$1[op6]::", $text);
	$text=preg_replace("/^(ki)/u", "$1[op7]::", $text);
	$text=preg_replace("/^(vi)/u", "$1[op8]::", $text);
	$text=preg_replace("/^(zi)/u", "$1[op10]::", $text);
	$text=preg_replace("/^(kw)/u", "$1[ms]::", $text);
	$text=preg_replace("/^(pa)/u", "$1[op16]::", $text);
	$text=preg_replace("/^(mu)/u", "$1[op2-3s,op18]::", $text);
	$text=preg_replace("/^(m(?!w|u))/u", "$1[op1-3s]::", $text);
	$text=preg_replace("/^(i)/u", "$1[op4,op9]::", $text);
	$text=preg_replace("/^(u)/u", "$1[op3]::", $text);
	$text=preg_replace("/^(ji)/u", "$1[refl]::", $text);
	return $text;
}

function suffixes($text)
{	
	$text=preg_replace("/(cho)$/u", "::$1[endrel7]", $text);
	$text=preg_replace("/(vyo)$/u", "::$1[endrel8]", $text);
	$text=preg_replace("/(?<!n)(ye)$/u", "::$1[endrel1-3s]", $text);
	$text=preg_replace("/(yo)$/u", "::$1[endrel4,endrel6,endrel9]", $text);
	$text=preg_replace("/(lo)$/u", "::$1[endrel5]", $text);
	$text=preg_replace("/(zo)$/u", "::$1[endrel10]", $text);
	$text=preg_replace("/(po)$/u", "::$1[endrel16]", $text);
	$text=preg_replace("/(ko)$/u", "::$1[endrel17]", $text);
	$text=preg_replace("/(mo)$/u", "::$1[endrel18]", $text);
	$text=preg_replace("/(o)$/u", "::$1[endrel2-3p,endrel3,endrel11,endrel14]", $text);
	$text=preg_replace("/(je)$/u", "::$1[int-how]", $text);
	$text=preg_replace("/(pi)$/u", "::$1[int-where]", $text);
	$text=preg_replace("/(ni)$/u", "::$1[int-what,pl]", $text);
	return $text;
}

?>