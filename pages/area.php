<?php
$area_output = ucwords(str_replace('-',' ',$_GET['section']));
$area_search = str_replace('-',' ',$_GET['section']);
$session = array_key_exists('mymove', $_SESSION) ? $_SESSION['mymove'] : [];

if(!empty($_GET['find']) && $_GET['find']=='true')
{
	global $dbase;
	$sql = "SELECT area,address,bedrooms,rent,available FROM houses WHERE area='$area_search' ORDER BY address ASC";
	$sql_query = mysqli_query($dbase, $sql);
	if(!$sql_query || mysqli_num_rows($sql_query)==0)
	{
		echo '<p id="error">Sorry, <strong>no houses</strong> found.</p>'."\n\n";
	}
	else
	{
		$first = 0;
		while($sql_query_row = mysqli_fetch_assoc($sql_query))
		{
			extract($sql_query_row);
			$address_output = ucwords($address);
			$address_lower = strtolower(str_replace(' ','-',$address));
			$area_lower = strtolower(str_replace(' ','-',$area));
			$address_url = $area_lower.'/'.$address_lower;

			$total_rooms = $bedrooms;
			if(substr($bedrooms, 0, strpos($bedrooms, ',')))
			{
				$total_rooms = substr($bedrooms, 0, strpos($bedrooms, ','));
			}

			$available_date = date('d.m.y',strtotime($available));

			$in_assistant = '';
			if(in_array($address_lower, $session))
			{
				$in_assistant = '<span class="in_assistant">*</span>';
			}
			$first++;
			$first_header = '';
			if($first==1)
			{
				$first_header = ' id="content"';
			}
			echo '<h2'.$first_header.'><a href="'.$address_url.'/">'.$in_assistant.$address_output.'</a></h2>'."\n";

			$image_url = '/images/'.$area_lower.'/'.$address_lower.'-small.jpg';
			if(@getimagesize($_SERVER['DOCUMENT_ROOT'] . $image_url)===false) {
				list($width, $height) = getimagesize($_SERVER['DOCUMENT_ROOT'] . '/images/no_image_small.gif');
				echo '<p id="image"><img src="/images/no_image_small.gif" alt="No Image Provided" height="'.$height.'px" width="'.$width.'px" /></p>'."\n";
			} else {
				list($width, $height) = getimagesize($_SERVER['DOCUMENT_ROOT'] . $image_url);
				echo '<p id="image"><img src="'.$image_url.'" alt="Front View of '.$address_output.'" height="'.$height.'px" width="'.$width.'px" /></p>'."\n";
			}

			echo '<dl class="info_with_image">'."\n";
			echo '<dt>Bedrooms</dt>'."\n";
			echo '<dd>'.$total_rooms.'</dd>'."\n";
			echo '<dt>Rent</dt>'."\n";;
			echo '<dd>£'.$rent.' <abbr title="Price Per Person Per Week">PPW</abbr></dd>'."\n";
			echo '<dt>Available</dt>'."\n";
			echo '<dd>'.$available_date.'</dd>'."\n";
			echo '</dl>'."\n\n";
		}
	}
}
elseif(!empty($_GET['details']) && $_GET['details']=='true')
{
	echo '<h2 id="content">'.$area_output.'</h2>';

	$area_include = strtolower(str_replace(' ','-',$area_output)).'.php';
	require_once('areas/'.$area_include);
}
elseif(isset($_GET['add']))
{
	if(in_array($_GET['add'], $session))
	{
		echo '<h2 id="content">House In Assistant</h2>';
		$added_house = ucwords(str_replace('-',' ',$_GET['add']));
		echo '<p id="house_add">The house <strong>'.$added_house.'</strong> already exists in your assistant.</p>'."\n\n";
	}
	else
	{
		echo '<h2 id="content">House Added</h2>';
		$added_house = ucwords(str_replace('-',' ',$_GET['add']));
		echo '<p id="house_add"><strong>'.$added_house.'</strong> has been added to your assistant.</p>'."\n\n";
	}

	echo '<p id="check_assistant">If you want to rate the house simply <strong>check the <a href="/assistant/">Assistant</a></strong>.</p>';

	//$added_array = $_GET['add'];
	//$expire_time = time()+(3600*24*7); // 1 hour x 1 day x 1 week.
	//setcookie('mymove', 'test', time()+4320000, '/');
	//setcookie('test', 'value', false, '/mymove/site/', false, 0);
	//setcookie('mymove', $added_house, $expire_time, '/');

	if($_SESSION['mymove'])
	{
		$added_array = $_SESSION['mymove'];
		if(!in_array($_GET['add'], $_SESSION['mymove']))
		{
			$added_array[] = $_GET['add'];
		}
	}
	else
	{
		$added_array = array();
		$added_array[] = $_GET['add'];
	}
	$_SESSION['mymove'] = $added_array;

}
elseif(isset($_GET['find']))
{
	global $dbase;
	$address_search = strtolower(str_replace('-',' ',$_GET['find']));
	$section_search = strtolower(str_replace('-',' ',$_GET['section']));
	$sql = "SELECT * FROM houses WHERE address='$address_search' AND area='$section_search'";
	$sql_query = mysqli_query($dbase, $sql);
	if(!$sql_query || mysqli_num_rows($sql_query)==0)
	{
		echo '<p id="error">Sorry, <strong>no houses</strong> found.</p>'."\n\n";
	}
	else
	{
		while($sql_query_row = mysqli_fetch_assoc($sql_query))
		{
			extract($sql_query_row);
			$address_output = ucwords($address);
			$bedrooms_output = ucwords($bedrooms);
			$address_output = ucwords($address);
			$address_lower = strtolower(str_replace(' ','-',$address));
			$area_lower = strtolower(str_replace(' ','-',$area));
			$address_url = $area_lower.'/'.$address_lower;
			$available_date = date('jS F Y',strtotime($available));

			$in_assistant = '';
			if(in_array($address_lower, $session)) {
				$in_assistant = '<span class="in_assistant">*</span>';
			}
			echo '<h2 id="content">'.$in_assistant.$address_output.'</h2>'."\n";

			echo '<dl>'."\n";
			echo '<dt>Bedrooms</dt>'."\n";
			echo '<dd>'.$bedrooms_output.'</dd>'."\n";
			echo '<dt>Living Room</dt>'."\n";
			echo '<dd>'.ucwords($living_room).'</dd>'."\n";
			echo '<dt>Kitchen</dt>'."\n";
			echo '<dd>'.ucwords($kitchen).'</dd>'."\n";
			echo '<dt>Laundry</dt>'."\n";
			echo '<dd>'.ucwords($laundry).'</dd>'."\n";
			echo '<dt>Shower / WC</dt>'."\n";
			echo '<dd>'.ucwords($shower_wc).'</dd>'."\n";
			echo '</dl>'."\n\n";

			echo '<h3 class="trigger"><span></span>Safety &amp; Security</h3>'."\n";
			echo '<dl>'."\n";
			echo '<dt>Fire Alarm</dt>'."\n";;
			echo '<dd>'.ucwords($fire_alarm).'</dd>'."\n";
			echo '<dt>Security <acronym title="System">Sys.</acronym></dt>'."\n";
			echo '<dd>'.ucwords($security_sys).'</dd>'."\n";
			echo '<dt>Front Door</dt>'."\n";
			echo '<dd>'.ucwords($front_door).'</dd>'."\n";
			echo '<dt>Glazing</dt>'."\n";
			echo '<dd>'.ucwords($glazing).'</dd>'."\n";
			echo '</dl>'."\n\n";

			echo '<h3 class="trigger"><span></span>Living</h3>'."\n";
			echo '<dl>'."\n";
			echo '<dt>Telephone</dt>'."\n";
			echo '<dd>'.ucwords($telephone).'</dd>'."\n";
			echo '<dt>Internet</dt>'."\n";
			echo '<dd>'.ucwords($internet).'</dd>'."\n";
			echo '<dt><acronym title="Local Area Network">LAN</acronym></dt>'."\n";
			echo '<dd>'.ucwords($lan).'</dd>'."\n";
			echo '<dt><acronym title="Television">TV</acronym></dt>'."\n";
			echo '<dd>'.ucwords($tv).'</dd>'."\n";
			echo '</dl>'."\n\n";

			echo '<h3 class="trigger"><span></span>Costs</h3>'."\n";
			echo '<dl>'."\n";
			echo '<dt>Rent</dt>'."\n";
			echo '<dd>£'.ucwords($rent).' <abbr title="Price Per Person Per Week">PPW</abbr></dd>'."\n";
			echo '<dt>Deposit</dt>'."\n";
			echo '<dd>£'.ucwords($deposit).'</dd>'."\n";
			echo '<dt>Water</dt>'."\n";
			echo '<dd>'.ucwords($water).'</dd>'."\n";
			echo '<dt>Gas</dt>'."\n";
			echo '<dd>'.ucwords($gas).'</dd>'."\n";
			echo '</dl>'."\n\n";

			echo '<h3 class="trigger"><span></span>Contact</h3>'."\n";
			echo '<dl id="contact">'."\n";
			echo '<dt>Available From:</dt>'."\n";
			echo '<dd>'.$available_date.'</dd>'."\n";
			echo '<dt>Landlord:</dt>'."\n";
			echo '<dd>'.ucwords($landlord).'</dd>'."\n";
			echo '<dt>Telephone Number:</dt>'."\n";
			echo '<dd>'.$telephone_no.'</dd>'."\n";

			if(strtoupper($email)!='NA')
			{
				echo '<dt>Email Address:</dt>'."\n";
				echo '<dd>'.$email.'</dd>'."\n";
			}
			echo '</dl>'."\n\n";

			echo '<h3 class="trigger"><span></span>Property Photo</h3>'."\n";

			$photo_url = '/images/'.$address_url.'.jpg';
			$image_url = '/images/'.$area_lower.'/'.$address_lower.'.jpg';

			if(@getimagesize($_SERVER['DOCUMENT_ROOT'] . $image_url)===false)
			{
				list($width, $height) = getimagesize($_SERVER['DOCUMENT_ROOT'] . '/images/no_image_large.gif');
				echo '<div id="property"><img src="/images/no_image_large.gif" alt="No Image Provided" height="'.$height.'px" width="'.$width.'px" /></div>'."\n\n";
			}
			else
			{
				list($width, $height) = getimagesize($_SERVER['DOCUMENT_ROOT'] . $image_url);
				echo '<div id="property"><img src="'.$image_url.'" alt="Front View of '.$address_output.'" height="'.$height.'px" width="'.$width.'px" /></div>'."\n\n";
			}

			echo '<ul id="add_house">'."\n";
			echo '<li id="info"><a href="/'.$_GET['section'].'/details/">Area Details</a></li>'."\n";
			echo '<li><a href="/'.$_GET['section'].'/'.$_GET['find'].'/add/">Add House</a></li>'."\n";
			echo '</ul>'."\n\n";
		}
	}
}
else
{
	echo '<h2 id="content">'.$area_output.'</h2>'."\n\n";

	$information_array = array(
	'Lower Great Horton' => array('BD7 + BD5','1500','12'),
	'City Centre'        => array('BD8','1000','8'),
	'Lister Hills'       => array('BD6','500','4'),
	'Lidget Green'       => array('BD7','1500','12'),
	'Upper Great Horton' => array('BD9','2000','17')
	);

	echo '<dl id="area_details">'."\n";
	echo '<dt>Postcode</dt>'."\n";
	echo '<dd>'.$information_array[$area_output][0].'</dd>'."\n";
	echo '<dt><acronym title="University">Uni</acronym> Distance</dt>'."\n";;
	echo '<dd>'.$information_array[$area_output][1].' m</dd>'."\n";
	echo '<dt><acronym title="University">Uni</acronym> Walk</dt>'."\n";
	echo '<dd>'.$information_array[$area_output][2].' mins</dd>'."\n";
	echo '</dl>'."\n\n";

	echo '<ul id="more_details">'."\n";
	echo '<li id="find"><a href="/'.$_GET['section'].'/find/">Find A House</a></li>'."\n";
	echo '<li id="details"><a href="/'.$_GET['section'].'/details/">Area Details</a></li>'."\n";
	echo '</ul>'."\n\n";
}
?>
