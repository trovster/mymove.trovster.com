<dl>
<dt>Crime Rate</dt>
<dd>25%</dd>
<dt>Residents</dt>
<dd>Students</dd>
<dt>Ethnic Group</dt>
<dd>Asian</dd>
<dt>Male | Female</dt>
<dd>51% | 49%</dd>
<dt>Environment</dt>
<dd>Dirty</dd>
</dl>

<div id="more-area-details">
<p><a href="/details/">BDF Details</a></p>
</div>

<h3>General Area Map</h3>
<?php
$image_url = '/images/areas/lower-great-horton.gif';
list($width, $height) = getimagesize($_SERVER['DOCUMENT_ROOT'] . $image_url);
echo '<div id="area_map"><img src="'.$image_url.'" alt="Street Map View of '.$area_output.'" height="'.$height.'px" width="'.$width.'px" /></div>'."\n\n";
?>
