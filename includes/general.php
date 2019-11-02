<?php
ini_set('display_errors', 0);
ini_set('error_reporting', 0);

ini_set('session.use_trans_sid', false);

// nulls all variables that are registered with register_globals (security fix)
foreach ($_REQUEST as $k => $v) unset($$k);

// make inputs safe by adding slashes to all incoming data (sql injection fix)
if (get_magic_quotes_gpc() == 0)
{
	function _magicSlashes($element)
	{
		if (is_array($element))
		return array_map("_magicSlashes", $element);
		else
		return addslashes($element); 
	}
	$_GET = array_map("_magicSlashes", $_GET);
	$_POST = array_map("_magicSlashes", $_POST);
	$_COOKIE = array_map("_magicSlashes", $_COOKIE);
}

function truncate($str, $len, $el='&#8230;')
{
	if (strlen($str) > $len)
	{
		$xl = strlen($el);
		if ($len < $xl)
		{
			return substr($str, 0, $len);
		}
		$str = substr($str, 0, $len-$xl);
		$spc = strrpos($str, ' ');
		
		if ($spc > 0)
		{
			$str = substr($str, 0, $spc);
		}
	return $str.$el;
	}
	return $str;
}

function wordcount($input)
{ 
	return substr_count($input,' ') + 1; 
}
?>