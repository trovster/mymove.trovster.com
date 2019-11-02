<ul id="footer">
<?php

switch($_GET['section'])
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
		$help_link = $_GET['section'];
}

echo '<li id="back"><a href="javascript:history.go(-1)"><span>Back</span></a></li>'."\n";
echo '<li id="help"><a href="help/'.$help_link.'"><span>Help Me</span></a></li>'."\n";
?>
</ul>

</body>
</html>