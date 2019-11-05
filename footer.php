<ul id="footer">
<?php

$section = !empty($_GET['section']) ? $_GET['section'] : '';
switch($section)
{
	case 'lower-great-horton':
	case 'city-centre':
	case 'lister-hills':
	case 'lidget-green':
	case 'upper-great-horton':
		$help_link = 'browse/';
		break;
	case 'help':
		$help_link = '';
		break;
	default:
		$help_link = $section;
}

echo '<li id="back"><a href="javascript:history.go(-1)"><span>Back</span></a></li>'."\n";
echo '<li id="help"><a href="/help/'.$help_link.'"><span>Help Me</span></a></li>'."\n";
?>
</ul>

</body>
</html>