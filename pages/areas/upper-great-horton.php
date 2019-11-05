<dl>
<dt>Crime Rate</dt>
<dd>20%</dd>
<dt>Residents</dt>
<dd>Families</dd>
<dt>Ethnic Group</dt>
<dd>Asian</dd>
<dt>Male | Female</dt>
<dd>41% | 59%</dd>
<dt>Environment</dt>
<dd>Clean</dd>
</dl>

<div id="more-area-details">
<p><a href="/details/">BDF Details</a></p>
</div>

<h3>General Area Map</h3>
<?php
$image_url = '/images/areas/upper-great-horton.gif';
list($width, $height) = getimagesize($_SERVER['DOCUMENT_ROOT'] . $image_url);
echo '<div id="area_map"><img src="'.$image_url.'" alt="Street Map View of '.$area_output.'" height="'.$height.'px" width="'.$width.'px" /></div>'."\n\n";
?>