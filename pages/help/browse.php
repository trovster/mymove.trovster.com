<?php
if(isset($_GET['part']))
{
	//$part_output = ucwords(str_replace('-',' ',$_GET['part']));
	//echo '<h3>'.$part_output.'</h3>';
	
	require_once('browse/'.$_GET['part'].'.php');
}
else
{
	echo '<p>Looking for help on browsing? Looking for more specific information? Choose from
	the list below</p>'."\n";
	echo '<ul id="help_overview">'."\n";
	for($i=0; $i<count($browse_help_array); $i++)
	{
		$browse_help_url = strtolower(str_replace(' ','-',$browse_help_array[$i]));
		$browse_help_output = ucwords(str_replace('-',' ',$browse_help_array[$i]));
		
		$last = '';
		if($i==count($browse_help_array)-1)
		{
			$last = ' class="last"';
		}
		echo '<li'.$last.'><a href="/help/browse/'.$browse_help_url.'/">'.$browse_help_output.'</a></li>'."\n";	
	}
	echo '</ul>'."\n";
}

?>