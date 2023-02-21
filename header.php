<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
ini_set('session.use_trans_sid', false);
date_default_timezone_set('UTC');

session_start();
require_once('rating.php');

$redirect_location = '/';

if(isset($_GET['remove']) && $_GET['remove']=='nuke')
{
	session_destroy();
	header('Location: '.$redirect_location.'assistant/');
}
if(isset($_GET['remove']) && $_GET['remove'])
{
	$delete_key = array_search($_GET['edit'],$_SESSION['mymove']);
	unset($_SESSION['mymove'][$delete_key]);
	sort($_SESSION['mymove']);
	header('Location: '.$redirect_location.'assistant/');
}
require_once('includes/general.php');
require_once('includes/database.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<title>myMove</title>

<?php
echo '<base href="'.$redirect_location.'" />'."\n";
?>

<link rel="stylesheet" type="text/css" href="/style/style.css" media="screen" />

<script type="text/javascript" src="/scripts/domcollapse.js"></script>
<script type="text/javascript" src="/scripts/rating.js"></script>

</head>

<?php
$section = 'browse';
if(isset($_GET['section']))
{
	$section = $_GET['section'];
}

echo '<body id="page-'.$section.'">'."\n\n";

echo '<ul id="skip_links">'."\n";
echo '<li><a href="http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'#content">Skip to content</a></li>'."\n";
echo '<li><a href="http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'#footer">Skip to footer</a></li>'."\n";
echo '</ul>'."\n\n";

$image_path = '/images/logo.gif';
list($width, $height) = getimagesize($_SERVER['DOCUMENT_ROOT'] . $image_path);
echo '<h1><a href="/" tabindex="50"><img src="'.$image_path.'" alt="my.move student housing" width="'.$width.'px" height="'.$height.'px" /></a></h1>'."\n\n";

$menu_array = array(1 => 'Browse','Assistant','About');
echo '<ul id="navigation">'."\n";
for($i=1; $i<=count($menu_array); $i++)
{
	$menu_output = $menu_array[$i];
	$menu_id = strtolower(str_replace(' ','-',$menu_array[$i]));
	echo '<li class="'.$menu_id.'"><a href="/'.$menu_id.'/" tabindex="'.$i.'">'.$menu_output.'</a></li>'."\n";
}
echo '</ul>'."\n\n";
?>
