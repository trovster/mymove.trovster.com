<?php
if(!isset($_GET['edit']))
{
	echo '<h2 id="content">Assistant</h2>'."\n\n";
	echo '<p>The myMove assistant is a tool that allows you to measure the quality of a house.
	You can add a house by <strong>browsing</strong> an area. Rating of houses is based upon
	six categories. All properties in the assistant can then be compared.</p>'."\n";
}

if(isset($_GET['edit']))
{
	$house_name = ucwords(str_replace('-',' ',$_GET['edit']));
	echo '<h2 id="content">'.$house_name.'</h2>'."\n\n";
	
	echo '<form action="assistant/" method="post" id="rating_form">'."\n";
	echo '<fieldset>'."\n";
	echo '<legend>Rating for '.$house_name.'</legend>'."\n";
	
	echo '<input type="hidden" name="house" value="'.$_GET['edit'].'" />'."\n\n";
	
	$rating_sections_array = array(1=> 'Bedroom','Living Room','Shower & WC','Kitchen','Security & Safety','Environment');
	$rating_values = array(1 => 'Rate', 'Crap', 'Poor', 'Okay', 'Nice', 'Lovely', 'Perfect');

	for($t=1; $t<=count($rating_sections_array); $t++)
	{
		$rating_label_id = strtolower(str_replace(array(' &',' '),array('','_'),$rating_sections_array[$t]));
		$rating_values_lower = strtolower($rating_values[$_SESSION[$_GET['edit']][$t-1]]);
		
		
		$background = '';
		if(isset($_SESSION[$_GET['edit']]))
		{
			$background = ' class="'.$rating_values_lower.'"';
		}
	
		echo '<div id="background_'.$rating_label_id.'"'.$background.'>'."\n";
		echo '<label for="'.$rating_label_id.'">'.$t.'. '.$rating_sections_array[$t].'</label>'."\n";
		echo '<span>'."\n".'<select id="'.$rating_label_id.'" name="'.$rating_label_id.'" onkeyup="changeClassOf(this, \'background_'.$rating_label_id.'\');" onchange="changeClassOf(this, \'background_'.$rating_label_id.'\');">'."\n";
		for($i=1; $i<=count($rating_values); $i++)
		{
			$rating_values_class = strtolower($rating_values[$i]);
			$selected = '';
			
			if(isset($_SESSION[$_GET['edit']]))
			{
				if($i==($_SESSION[$_GET['edit']][$t-1]))
				{
					$selected = ' selected="selected"';
				}
			}
			else
			{
				if($i==1)
				{
					$selected = ' selected="selected"';
				}
			}
			echo '<option value="'.$i.'"'.$selected.'>'.$rating_values[$i].'</option>'."\n";
		}
	
		echo '</select>'."\n".'</span>'."\n";
		echo '</div>'."\n\n";
	}
	
	echo '<input type="image" src="/images/ok.gif" alt="ok" name="submit" value="Ok" id="submit" />'."\n";
	echo '<p id="delete"><a href="/assistant/'.$_GET['edit'].'/remove/">Delete</a></p>'."\n";
	
	echo '</fieldset>'."\n";
	echo '</form>'."\n\n";
}
elseif(isset($_SESSION['mymove']) && !empty($_SESSION['mymove']))
{
	global $dbase;
	for($i=0; $i<count($_SESSION['mymove']); $i++)
	{	
		$address_search = strtolower(str_replace('-',' ',$_SESSION['mymove'][$i]));
		$sql = "SELECT address,rent,available,area,bedrooms FROM houses WHERE address='$address_search' ORDER BY address ASC";
		$sql_query = mysqli_query($dbase, $sql);
		
		while($sql_query_row = mysql_fetch_assoc($sql_query))
		{
			extract($sql_query_row);
			$address_output = ucwords($address);
			$address_lower = strtolower(str_replace(' ','-',$address));
			$area_lower = strtolower(str_replace(' ','-',$area));
			$address_url = 'assistant/'.$address_lower;
			$total_rooms = $bedrooms;
			if(substr($bedrooms, 0, strpos($bedrooms, ',')))
			{
				$total_rooms = substr($bedrooms, 0, strpos($bedrooms, ','));
			}
			$available_date = date('d.m.y',strtotime($available));
			
			$in_assistant = '';
			if(in_array($address_lower,$_SESSION['mymove']))
			{
				$in_assistant = '<span class="in_assistant"></span>';
			}
			echo '<h3><a href="/'.$address_url.'/">'.$in_assistant.$address_output.'</a></h3>'."\n";
			
			$image_url = '/images/'.$area_lower.'/'.$address_lower.'-small.jpg';
			list($width, $height) = getimagesize($_SERVER['DOCUMENT_ROOT'] . $image_url);
			if(getimagesize($_SERVER['DOCUMENT_ROOT'] . $image_url)===false)
			{
				list($width, $height) = getimagesize($_SERVER['DOCUMENT_ROOT'] . 'images/no_image_small.gif');
				echo '<p id="image"><img src="/images/no_image_small.gif" alt="No Image Provided" height="'.$height.'px" width="'.$width.'px" /></p>'."\n";
			}
			else
			{
				echo '<p id="image"><img src="'.$image_url.'" alt="Front View of '.$address_output.'" height="'.$height.'px" width="'.$width.'px" /></p>'."\n";
			}
			
			echo '<dl class="info_with_image">'."\n";
			echo '<dt>Bedrooms</dt>'."\n";
			echo '<dd>'.$total_rooms.'</dd>'."\n";
			echo '<dt>Rent</dt>'."\n";;
			echo '<dd>�'.$rent.' <abbr title="Price Per Person Per Week">PPW</abbr></dd>'."\n";
			echo '<dt>Available</dt>'."\n";
			echo '<dd>'.$available_date.'</dd>'."\n";
			echo '</dl>'."\n";
			
			if(isset($_SESSION[$address_lower]))
			{
				$score = $_SESSION[$address_lower][6];
				//$rounded_score = 'rounded_'.round($score, -1);
				//$rounded_score = 'rounded_'.floor($score, -1);
				
				$rounded_score = 'rounded_'.floor($score/10)*10;
				
				echo '<p class="rated '.$rounded_score.'">Rated: '.$score.'%</p>'."\n\n";
			}
			else
			{
				echo '<p class="not_rated">Unrated:</p>'."\n\n";
			}
		}
	}
	echo '<div id="nuke"><p><a href="/assistant/nuke/">Remove All?</a></p></div>'."\n\n";
}
else
{
	echo '<h2>Please add a house.</h2>'."\n\n";
	echo '<p id="please_add">In order to add a house, please start at the \'Browse\' section.
	Once you are in this section you can get further guidance by selecting \'help\'
	at the bottom.</p>'."\n\n";
}

?>