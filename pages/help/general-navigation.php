<p id="intro">The application divides into three main areas:</p>

<ol>
<li id="help-header"><a href="help/general-navigation/#main-navigation"><span></span>Header</a></li>
<li id="help-body"><a href="help/general-navigation/#main-content"><span></span>Body</a></li>
<li id="help-footer"><a href="help/general-navigation/#sub-navigation"><span></span>Footer</a></li>
</ol>

<h3 id="main-navigation">1. Header | Main Navigation</h3>

<p>At the top of the application is the main navigation area. This area allows you to easily
switch between the three application categories:</p>

<ul id="help_icons">
<li class="browse">Browse through all the properties in the <strong>MyMove</strong> database.</li>
<li class="assistant">Rate and compare properties with the assistant.</li>
<li class="about">The about section contains information regarding <strong>MyMove</strong>.</li>
</ul>

<h3 id="main-content">2. Body | Main Content</h3>

<p>This area displays content of the application. Moreover it enables you to browse for detailed house or area information.
The title bars and buttons are used for navigation within this area.</p>

<h3 id="sub-navigation">3. Footer | Sub Navigation</h3>

<p>The footer contains the application's sub-naviation. By clicking on the
<strong id="back_button">back button</strong> you can browse one step back in the
application's history. <strong id="help_me">Help me</strong> provides page specific guidance.</p>

<h3>Further Icons and Symbols</h3>

<?php

$help_icon_array = array('area_information','assistant','error','no_photo','active_link','in_assistant');

$help_icon_alt_array = array(
'An \'i\' within a circle',
'A bust with a plus sign',
'Exclamation mark within a triangle',
'',
'',
'');

$help_description_array = array(
'Links directly to the detailed area information of a district',
'Adds a property to the rating assistant',
'An error has occured or no information is available',
'No photo available for the property',
'Denotes an active link while browsing properties',
'Indicates that this house is already in the assistant');

echo '<dl>'."\n";
for($i=0; $i<count($help_icon_array); $i++)
{
	$image_url = 'images/help/'.$help_icon_array[$i].'.gif';
	list($width, $height) = getimagesize($image_url);
	echo '<dt><img src="'.$image_url.'" alt="'.$help_icon_alt_array[$i].'" width="'.$width.'px" height="'.$height.'px" /></dt>'."\n";
	echo '<dd>'.$help_description_array[$i].'.</dd>'."\n";
}
echo '</dl>'."\n\n";

?>
