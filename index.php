<?php
require_once('header.php');

if(isset($_GET['section']))
{
	if($_GET['section']=='lower-great-horton' || $_GET['section']=='city-centre' ||
	$_GET['section']=='lister-hills' || $_GET['section']=='lidget-green' || $_GET['section']=='upper-great-horton')
	{
		require_once('pages/area.php');
	}
	else
	{
		require_once('pages/'.$_GET['section'].'.php');
	}
}
else // this is the default homepage
{
	echo '<p class="activity" id="content">Where do you want to live?</p>'."\n\n";
	
	$image_map = '/images/map.gif';
	list($width, $height) = getimagesize($_SERVER['DOCUMENT_ROOT'] . $image_map);
	echo '<p id="map"><img src="'.$image_map.'" alt="Surrounding areas around Bradford University" width="'.$width.'px" height="'.$height.'px" usemap="#m_map" /></p>'."\n\n";
	
	$area_array = array(1 => 'Lower Great Horton','City Centre','Lister Hills','Lidget Green','Upper Great Horton');
	echo '<ol id="area_navigation">'."\n";
	for($i=1; $i<=count($area_array); $i++)
	{
		$area_output = $area_array[$i];
		$area_id = strtolower(str_replace(' ','-',$area_array[$i]));
		echo '<li id="'.$area_id.'"><a href="/'.$area_id.'/">'.$area_output.'</a></li>'."\n";
	}
	echo '</ol>'."\n\n";
?>
	<map name="m_map">
	<ul>
	<li><a shape="poly" coords="109,63,143,69,82,102,70,79,93,74,109,63" href="/lower-great-horton/" title="Lower Great Horton" /></li>
	<li><a shape="poly" coords="107,44,108,64,143,69,107,44" href="/city-centre/" title="City Centre" /></li>
	<li><a shape="poly" coords="63,63,53,55,6,66,34,25,62,31,63,63" href="/lister-hills/" title="Lister Hills" /></li>
	<li><a shape="poly" coords="52,55,64,65,69,78,22,86,7,66" href="/lidget-green/" title="Lidget Green" /></li>
	<li><a shape="poly" coords="71,79,81,103,74,122,23,86" href="/upper-great-horton/" title="Upper Great Horton" /></li>
	</ul>
	</map>
<?php
}

require_once('footer.php');
?>
