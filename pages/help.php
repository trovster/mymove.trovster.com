<?php
$browse_help_array = array('area selection','area search','area details','house fishing','house details');
$assistant_help_array = array('what it Does','house Rating');

if(isset($_GET['type']))
{
	$section_help_output = ucwords(str_replace('-',' ',$_GET['type']));
	
	$part_output = '';
	if(isset($_GET['part']))
	{
		$part_output = ' - '.ucwords(str_replace('-',' ',$_GET['part']));
	}
	
	echo '<h2 id="help_title">'.$section_help_output.$part_output.'</h2>'."\n";
	
	require_once('help/'.$_GET['type'].'.php');
}
else
{
	echo '<h2 id="help_title">Welcome to the help!</h2>'."\n";
	echo '<ul id="help_overview">'."\n";
	echo '<li><a href="help/general-navigation/">General Navigation</a></li>'."\n\n";
	
	echo '<li class="expand"><a href="help/browse/">Browse</a>'."\n";
	echo ' <ul>'."\n";
	for($i=0; $i<count($browse_help_array); $i++)
	{
		$browse_help_url = strtolower(str_replace(' ','-',$browse_help_array[$i]));
		$browse_help_output = ucwords(str_replace('-',' ',$browse_help_array[$i]));
		
		$last = '';
		if($i==count($browse_help_array)-1)
		{
			$last = ' class="last"';
		}
		echo '<li'.$last.'><a href="help/browse/'.$browse_help_url.'/">'.$browse_help_output.'</a></li>'."\n";	
	}
	echo ' </ul>'."\n";
	echo '</li>'."\n\n";
	
	
	echo '<li class="expand"><a href="help/assistant/">Assistant</a>'."\n";
	echo ' <ul>'."\n";
	for($i=0; $i<count($assistant_help_array); $i++)
	{
		$browse_help_url = strtolower(str_replace(' ','-',$assistant_help_array[$i]));
		$browse_help_output = ucwords(str_replace('-',' ',$assistant_help_array[$i]));
		
		$last = '';
		if($i==count($assistant_help_array)-1)
		{
			$last = ' class="last"';
		}
		echo '<li'.$last.'><a href="help/assistant/'.$browse_help_url.'/">'.$browse_help_output.'</a></li>'."\n";	
	}
	echo ' </ul>'."\n";
	echo '</li>'."\n\n";
	
	echo '<li><a href="help/about/">About</a></li>'."\n\n";
	
	echo '</ul>'."\n\n";
}
?>