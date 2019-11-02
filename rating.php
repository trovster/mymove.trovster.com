<?php
if(isset($_POST['house']))
{
	$_SESSION[$_POST['house']] = array();
	$rating_sections_array = array(1=> 'Bedroom','Living Room','Shower & WC','Kitchen','Security & Safety','Environment');
	$total = 30;
	
	for($t=1; $t<=count($rating_sections_array); $t++)
	{
		$rating_result = strtolower(str_replace(array(' &',' '),array('','_'),$rating_sections_array[$t]));
		$rating_number = $_POST[$rating_result];
		
		$rating_number_scaled = $rating_number-2;
		if($rating_number-2<=0)
		{
			$rating_number_scaled = 0;
		}
		$rating_total += $rating_number_scaled;
		
		$_SESSION[$_POST['house']][] = $rating_number;
	}
	$rating_average = ceil(($rating_total/$total)*100);
	if($rating_average<0)
	{
		$rating_average = 0;
	}	
	$_SESSION[$_POST['house']][] = $rating_average;
}
?>