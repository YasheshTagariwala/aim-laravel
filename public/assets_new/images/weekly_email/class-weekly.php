<?php

function get_avatar_image_url($user_id, $size) {
    $avatar_url = get_avatar($user_id, $size);
    $regex = '/(^.*src="|" w.*$)/';
	$data = explode('" class=', preg_replace($regex, '', $avatar_url));
	
    return $data[0];
}


function get_weekly_projects()
{
	global $wpdb;
	
	$query = array('numberposts' => '10','post_type'=> 'project','post_status' => 'publish', 'orderby' => 'post_date', 'order' => 'DESC',);
	$recent_project = wp_get_recent_posts($query);
	$project = array();
	$p = 0;
	foreach($recent_project as $pr)
	{
		if($pr['post_title'] != '' && $p < 5)
		{
			$project[$p] = $pr;	
			$p++;
		}
	}
	$query = array('numberposts' => '4','post_type'=> 'investor','post_status' => 'publish', 'orderby' => 'post_date', 'order' => 'DESC',);
	$recent_investors = wp_get_recent_posts($query);
	
	$query = array('numberposts' => '4','post_type'=> 'supporter','post_status' => 'publish', 'orderby' => 'post_date', 'order' => 'DESC',);
	$recent_supporters = wp_get_recent_posts($query);
	
	$message = '';
	
	$message .= '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
		"http://www.w3.org/TR/html4/loose.dtd">
		<html lang="en">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
		<meta name="format-detection" contetnt="telephone=no">
		<style type="text/css">
		body{
		  margin:0;
		  padding:0;
		}
		.img-resonsive{
        width: 100% !important;
        max-width: 255px !Important;
    }
		@media screen and (max-width: 660px) {
		table[class="container"]{
			width:100%;
		}
		td[class="vertical-tabs"]{
			display:block;	
			margin:0px auto;
		}
		td[class="mobile-hide"]{
			display:none;
			}
		table[class="horizontal-tabs"]	{
			width:258px;
			display:block;	
			margin:0px auto;
			}
		}
		</style>
		</head>
		<body>
		<div align="center">
		<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
		<td>
		<table border="0" width="100%" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0">
		<tr>
		<td align="center" valign="top">
		<table class="container" align="center" width="560" border="0" cellspacing="0" cellpadding="0" bgcolor="#f1f1f1">
		<tr>
		<td align="center" valign="top"><a target="_blank" href="http://gybi.org"><img src="http://gybi.org/wp-content/themes/gybi/images/weekly_email/logo.jpg" width="251" border="0" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; display:block; margin:0px; padding:0px; border:0px; max-width:251px;" alt="" /></a></td>
		</tr>
		<tr>
		<td height="25" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
		</tr>';
		
		// RECENT Entrepreuiners
		
		$message .= '<tr><td align="center" style="font-family:Georgia, \'Times New Roman\', Times, serif; font-size:30px; color:#000000;">Recent Entrepreneurs
		</td>
		</tr>
		<tr><td height="20" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
		</tr><tr>';
		$message .= '<td align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#000000; line-height:20px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>';

	if(isset($project[0]))
	{
		$postID = $project[0]['ID'];
		if(!empty(get_field('project_logo', $postID)))
		{
			$im = getimagesize(get_field('project_logo', $postID));
			$width = $im[0];
			$hight = $im[1];
			if($width > 230 || $hight > 115)
			{
				$width_percentage = (230 / $width) * 100;
				$hight_percentage = (115 / $hight) * 100;
				if($width_percentage > $hight_percentage) $percentage = $hight_percentage;
				else $percentage = $width_percentage;
				
				$width = ($width * $percentage) /100 ;
				$hight = ($hight * $percentage) /100;
			}
		}else{
			$width = 230;
			$hight = 115;
		}
		$image_url = !empty(get_field('project_logo', $postID))? get_field('project_logo', $postID): 'http://gybi.org/wp-content/themes/gybi/images/weekly_email/not_found.jpg';
		$name = get_the_title($postID);
		$link = get_permalink($postID);
		$address = get_field('city', $postID).','.get_field( 'state', $postID).','. get_field('country', $postID)->name;
		$string = substr(get_field('company_overview', $postID), 0, 50);
		
	$message .= '
    <td align="center" class="vertical-tabs" width="258" style="border:2px solid #e7e7e7; padding:13px 10px ;" bgcolor="#ffffff">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" width="230px"><a href="'.$link.'" target="_blank"><img src="'.$image_url.'" class="img-resonsive" width="'.$width.'" height="'.$hight.'" border="0" alt=" " style="display:inline-block; margin:0px; padding:0px; width: '.$width.'px !important"></a></td>
  </tr>
  <tr>
<td height="15" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
</tr>
  <tr>
    <td align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#000000; line-height:100%;"><a href="'.$link.'" style="color:#f36532; font-family:Georgia, \'Times New Roman\', Times, serif; font-size:20px; line-height:100%; text-decoration: none;">'.$name.'</a>
    <br>
<font style="font-family:Arial, Helvetica, sans-serif; font-size:13px; line-height:250%;">'.$address.'</font>
    <br>
<font style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#888888; line-height:100%;">'.$string.'...</font>

</td>
  </tr>
    <tr>
<td height="10" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
</tr>

  <tr>
    <td align="center"><a href="'.$link.'" target="_blank"><img src="http://gybi.org/wp-content/themes/gybi/images/weekly_email/readmore-btn.gif" border="0" alt=" "></a></td>
  </tr>
</table>

    </td>';
	}
	$message .= '<td class="vertical-tabs" width="20" height="20" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>';
	if(isset($project[1]))
	{
		$postID = $project[1]['ID'];
		if(!empty(get_field('project_logo', $postID)))
		{
			$im = getimagesize(get_field('project_logo', $postID));
			$width = $im[0];
			$hight = $im[1];
			if($width > 230 || $hight > 115)
			{
				$width_percentage = (230 / $width) * 100;
				$hight_percentage = (115 / $hight) * 100;
				if($width_percentage > $hight_percentage) $percentage = $hight_percentage;
				else $percentage = $width_percentage;
				
				$width = ($width * $percentage) /100 ;
				$hight = ($hight * $percentage) /100;
			}
		}else{
			$width = 230;
			$hight = 115;
		}
		$image_url = !empty(get_field('project_logo', $postID))? get_field('project_logo', $postID): 'http://gybi.org/wp-content/themes/gybi/images/weekly_email/not_found.jpg';
		$name = get_the_title($postID);
		$link = get_permalink($postID);
		$address = get_field('city', $postID).','.get_field( 'state', $postID).','. get_field('country', $postID)->name;
		$string = substr(get_field('company_overview', $postID), 0, 50);
		
$message .= '<td align="center" class="vertical-tabs" width="258" style="border:2px solid #e7e7e7; padding:13px 10px;" bgcolor="#ffffff">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" width="230px"><a href="'.$link.'" target="_blank"><img src="'.$image_url.'" class="img-resonsive" width="'.$width.'" height="'.$hight.'" border="0" alt=" " style="display:inline-block; margin:0px; padding:0px; width: '.$width.'px !important"></a></td>
  </tr>
  <tr>
<td height="15" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
</tr>
  <tr>
    <td align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#000000; line-height:100%;"><a href="'.$link.'" style="color:#f36532; font-family:Georgia, \'Times New Roman\', Times, serif; font-size:20px;line-height:100%; text-decoration: none;"> '.$name.'</a>
    <br>
<font style="font-family:Arial, Helvetica, sans-serif; font-size:13px; line-height:250%;">'.$address.'</font>
    <br>
<font style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#888888; line-height:100%">'.$string.'...</font>
</td>
  </tr>
    <tr>
<td height="10" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
</tr>
  <tr>
    <td align="center"><a href="'.$link.'" target="_blank"><img src="http://gybi.org/wp-content/themes/gybi/images/weekly_email/readmore-btn.gif" border="0" alt=" "></a></td>
  </tr>
</table>
    </td>';
  
	}

	$message .= '</tr></table></td></tr>';
	foreach($project as $key=>$proj)
	{
		if($key > 1)
		{
			$postID = $proj['ID'];
			if(!empty(get_field('project_logo', $postID)))
			{
				$im = getimagesize(get_field('project_logo', $postID));
				$width = $im[0];
				$hight = $im[1];
				if($width > 230 || $hight > 115)
				{
					$width_percentage = (230 / $width) * 100;
					$hight_percentage = (115 / $hight) * 100;
					if($width_percentage > $hight_percentage) $percentage = $hight_percentage;
					else $percentage = $width_percentage;
					
					$width = ($width * $percentage) /100 ;
					$hight = ($hight * $percentage) /100;
				}
			}else{
				$width = 230;
				$hight = 115;
			}
			$image_url = !empty(get_field('project_logo', $postID))? get_field('project_logo', $postID): 'http://gybi.org/wp-content/themes/gybi/images/weekly_email/not_found.jpg';
			$name = get_the_title($postID);
			$link = get_permalink($postID);
			$address = get_field('city', $postID).','.get_field( 'state', $postID).','. get_field('country', $postID)->name;
			$string = substr(get_field('company_overview', $postID), 0, 50);
		
		$message .= '<tr>
<td height="15" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
</tr>';
		$message .= '<tr>
<td align="center" valign="top">
<table class="horizontal-tabs" width="100%" border="0" cellspacing="0" cellpadding="0" style="border:2px solid #e7e7e7; padding:13px;" bgcolor="#ffffff">
  <tr>
<td class="vertical-tabs" width="230px" align="center"><a href="'.$link.'" target="_blank"><img src="'.$image_url.'" class="img-resonsive" width="'.$width.'" height="'.$hight.'" border="0" alt=" " style="display:block; margin:0px; padding:0px; width: '.$width.'px !important"></a></td>
<td class="vertical-tabs" width="20" height="20" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
    <td align="center" valign="top" class="vertical-tabs">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#000000; line-height:100%;"><a href="'.$link.'" style="color:#286daf; font-family:Georgia, \'Times New Roman\', Times, serif; font-size:20px; line-height:100%; text-decoration: none;">'.$name.'</a>
    <br>
<font style="font-family:Arial, Helvetica, sans-serif; font-size:13px; line-height:250%;">'.$address.'</font>
    <br>
<font style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#888888;  line-height:100%;">'.$string.'...</font>
</td>
  </tr>
    <tr>
<td height="10" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
</tr>
  <tr>
    <td align="left"><a href="'.$link.'" target="_blank"><img src="http://gybi.org/wp-content/themes/gybi/images/weekly_email/readmore-blue.jpg" border="0" alt=" "></a></td>
  </tr>
</table>
    </td>
  </tr>
</table>

</td>
</tr>';
	
		}
	}
	$message .= '<tr>
		<td height="10px" ></td>
		</tr>
		
		<tr>
		<td align="center" style="background:#ffffff; border:2px solid #e7e7e7"><a href="http://gybi.org/entrepreneurs-projects/" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; height:30px; color:#666666; text-decoration:none; font-weight:bold; display:block; text-align:center; line-height: 30px;"> VIEW ALL ENTREPRENEURS </a></td>
		</tr>';
		// RECENT Investors
	$message .= '<tr>
		<td height="25" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
		</tr>
		<tr>
		<td align="center" style="font-family:Georgia, \'Times New Roman\', Times, serif; font-size:30px; color:#000000;">Recent Investors</td>
		</tr>
		
		<tr>
		<td height="20" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
		</tr>
		';
	if(isset($recent_investors[0]))
	{
		
			$postID = $recent_investors[0]['ID'];
			$userID = $recent_investors[0]['post_author'];
			um_fetch_user($userID);
			
			$postion = strpos(get_avatar_image_url( um_user('ID'), 150 ), 'http://0.gravatar.com/');
			if(!empty(get_avatar_image_url( um_user('ID'), 150 )) && $postion === false)
			{
				$image_url = get_avatar_image_url( um_user('ID'), 150 );	
				$im = getimagesize(get_avatar_image_url( um_user('ID'), 150 ));
				$width = $im[0];
				$hight = $im[1];
				if($width > 230 || $hight > 115)
				{
					$width_percentage = (230 / $width) * 100;
					$hight_percentage = (115 / $hight) * 100;
					if($width_percentage > $hight_percentage) $percentage = $hight_percentage;
					else $percentage = $width_percentage;
					
					$width = ($width * $percentage) /100 ;
					$hight = ($hight * $percentage) /100;
				}
			
			}else {
				$image_url = 'http://gybi.org/wp-content/themes/gybi/images/weekly_email/investor.jpg';
				$width = 230;
				$hight = 115;
			}
			
			$link = get_permalink($postID);
			
			$country_of_interest='';
					$country_of_interests = get_field('country_of_interest', $postID);
					$i=0;
					 foreach($country_of_interests as $item):
                    	$country_of_interest = $country_of_interest.$item->name;
   					 	if ($i < count($country_of_interests)-1){
      					    $country_of_interest = $country_of_interest.', ';
    					}
						$i++;
                     endforeach;

			$string = substr(get_field('investor_expertise', $postID), 0, 50);
			
		$message .= '<td align="center" valign="top">
	<table class="horizontal-tabs" width="100%" border="0" cellspacing="0" cellpadding="0" style="border:2px solid #e7e7e7; padding:13px;" bgcolor="#ffffff">
	  <tr>
	<td class="vertical-tabs" width="230px" align="center"><a href="'.$link.'" target="_blank"><img src="'.$image_url.'" class="img-resonsive" width="'.$width.'" height="'.$hight.'" border="0" alt=" " style="display:block; margin:0px; padding:0px; width: '.$width.'px !important"></a></td>
	<td class="vertical-tabs" width="20" height="20" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
		<td align="center" class="vertical-tabs" valign="top">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#000000; line-height:100%;"><a href="'.$link.'" style="color:#286daf; font-family:Georgia, \'Times New Roman\', Times, serif; font-size:20px; line-height:100%; text-decoration: none;">'.um_user('display_name').'</a>
		<br>
	<font style="font-family:Arial, Helvetica, sans-serif; font-size:13px; line-height:250%;">'.$country_of_interest.'</font>
	<br>
	<font style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#888888;  line-height:100%;">'.$string.'...</font>
	</td>
	  </tr>
		<tr>
	<td height="10" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
	</tr>
	  <tr>
		<td align="left"><a href="'.$link.'" target="_blank"><img src="http://gybi.org/wp-content/themes/gybi/images/weekly_email/readmore-blue.jpg" border="0" alt=" "></a></td>
	  </tr>
	</table>
		</td>
	  </tr>
	</table>
	
	</td>';
	}
	
	$message .= '<tr>
<td height="10px" ></td>
</tr>

<tr>
<td align="center" style="background:#ffffff; border:2px solid #e7e7e7"><a href="http://gybi.org/investors/" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; height:30px; color:#666666; text-decoration:none; font-weight:bold; display:block; text-align:center; line-height: 30px;"> VIEW ALL INVESTORS</a></td>
</tr>';

// Recent Supporter

$message .= '<tr>
<td height="25" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
</tr>
<tr>
<td align="center" style="font-family:Georgia, \'Times New Roman\', Times, serif; font-size:30px; color:#000000;">Recent Supporters</td>
</tr>
<tr>
<td height="20" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
</tr>
<tr>
';

$message .= '<td align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#000000; line-height:20px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>';

	if(isset($recent_supporters[0]))
	{
		$postID = $recent_supporters[0]['ID'];
		$userID = $recent_supporters[0]['post_author'];
			um_fetch_user($userID);
			
			$postion = strpos(get_avatar_image_url( um_user('ID'), 150 ), 'http://0.gravatar.com/');
			if(!empty(get_avatar_image_url( um_user('ID'), 150 )) && $postion === false)
			{
				$image_url = get_avatar_image_url( um_user('ID'), 150 );	
				$im = getimagesize(get_avatar_image_url( um_user('ID'), 150 ));
				$width = $im[0];
				$hight = $im[1];
				if($width > 230 || $hight > 115)
				{
					$width_percentage = (230 / $width) * 100;
					$hight_percentage = (115 / $hight) * 100;
					if($width_percentage > $hight_percentage) $percentage = $hight_percentage;
					else $percentage = $width_percentage;
					
					$width = ($width * $percentage) /100 ;
					$hight = ($hight * $percentage) /100;
				}
			}else
			{
				 $image_url = 'http://gybi.org/wp-content/themes/gybi/images/weekly_email/supporters.jpg';
				 $width = 230;
				 $hight = 115;
			}
		$link = get_permalink($postID);
		$string = substr(get_field('expertise', $postID), 0, 50);
		
		$country_of_interest='';
		$country_of_interests = get_field('country_of_interest', $postID);
		$i=0;
		 foreach($country_of_interests as $item):
			$country_of_interest = $country_of_interest.$item->name;
			if ($i < count($country_of_interests)-1){
			$country_of_interest = $country_of_interest.', ';
			}
			$i++;
		 endforeach;
		
	$message .= '
    <td align="center" class="vertical-tabs" width="258" style="border:2px solid #e7e7e7; padding:13px 10px ;" bgcolor="#ffffff">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" width="230px"><a href="'.$link.'" target="_blank"><img src="'.$image_url.'" class="img-resonsive" width="'.$width.'" height="'.$hight.'" border="0" alt=" " style="display:inline-block; margin:0px; padding:0px; width: '.$width.'px !important""></a></td>
  </tr>
  <tr>
<td height="15" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
</tr>
  <tr>
    <td align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#000000; line-height:100%;"><a href="'.$link.'" style="color:#f36532; font-family:Georgia, \'Times New Roman\', Times, serif; font-size:20px; line-height:100%; text-decoration: none;">'.um_user('display_name').'</a>
    <br>
<font style="font-family:Arial, Helvetica, sans-serif; font-size:13px; line-height:250%;">'.$country_of_interest.'</font>
    <br>
<font style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#888888; line-height:100%;">'.$string.'...</font>

</td>
  </tr>
    <tr>
<td height="10" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
</tr>

  <tr>
    <td align="center"><a href="'.$link.'" target="_blank"><img src="http://gybi.org/wp-content/themes/gybi/images/weekly_email/readmore-btn.gif" border="0" alt=" "></a></td>
  </tr>
</table>

    </td>';
	}
	$message .= '<td class="vertical-tabs" width="20" height="20" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>';
	if(isset($recent_supporters[1]))
	{
		$postID = $recent_supporters[1]['ID'];
		$userID = $recent_supporters[1]['post_author'];
		um_fetch_user($userID);
			$imagename = get_avatar_image_url( um_user('ID'), 150 );
					$postion = strpos($imagename, 'gravatar.com/');
			if(!empty($imagename) && $postion === false)
			{
				$image_url = get_avatar_image_url( um_user('ID'), 150 );	
				$im = getimagesize(get_avatar_image_url( um_user('ID'), 150 ));
				$width = $im[0];
				$hight = $im[1];
				if($width > 230 || $hight > 115)
				{
					$width_percentage = (230 / $width) * 100;
					$hight_percentage = (115 / $hight) * 100;
					if($width_percentage > $hight_percentage) $percentage = $hight_percentage;
					else $percentage = $width_percentage;
					
					$width = ($width * $percentage) /100 ;
					$hight = ($hight * $percentage) /100;
				}
			}else
			{
				 $image_url = 'http://gybi.org/wp-content/themes/gybi/images/weekly_email/supporters.jpg';
				 $width = 230;
				 $hight = 115;
			}
		$link = get_permalink($postID);
		$string = substr(get_field('expertise', $postID), 0, 50);
		
		$address =  '';
		$country_of_interests = get_field('country_of_interest', $postID);
		$i=0;
		 foreach($country_of_interests as $item):
			$country_of_interest = $country_of_interest.$item->name;
			if ($i < count($country_of_interests)-1){
				$address = $address.', ';
			}
			$i++;
		 endforeach;
		
$message .= '<td align="center" class="vertical-tabs" width="258" style="border:2px solid #e7e7e7; padding:13px 10px;" bgcolor="#ffffff">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
<td align="center" width="230px"><a href="'.$link.'" target="_blank"><img src="'.$image_url.'" class="img-resonsive" width="'.$width.'" height="'.$hight.'" border="0" alt=" " style="display:inline-block; margin:0px; padding:0px; width: '.$width.'px !important""></a></td>
  </tr>
  <tr>
<td height="15" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
</tr>
  <tr>
    <td align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#000000; line-height:100%;"><a href="'.$link.'" style="color:#f36532; font-family:Georgia, \'Times New Roman\', Times, serif; font-size:20px;line-height:100%; text-decoration: none;"> '.um_user('display_name').'</a>
    <br>
<font style="font-family:Arial, Helvetica, sans-serif; font-size:13px; line-height:250%;">'.$address.'</font>
    <br>
<font style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#888888; line-height:100%">'.$string.'...</font>
</td>
  </tr>
    <tr>
<td height="10" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
</tr>
  <tr>
    <td align="center"><a href="'.$link.'" target="_blank"><img src="http://gybi.org/wp-content/themes/gybi/images/weekly_email/readmore-btn.gif" border="0" alt=" "></a></td>
  </tr>
</table>
    </td>';
  
	}

	$message .= '</tr></table></td></tr>';
	foreach($recent_supporters as $key=>$proj)
	{
		if($key > 1)
		{
			$postID = $proj['ID'];
		$userID = $proj['post_author'];
		um_fetch_user($userID);
		$postion = strpos(get_avatar_image_url( um_user('ID'), 150 ), 'http://0.gravatar.com/');
		if(!empty(get_avatar_image_url( um_user('ID'), 150 )) && $postion === false)
		{
			$image_url = get_avatar_image_url( um_user('ID'), 150 );	
			$im = getimagesize(get_avatar_image_url( um_user('ID'), 150 ));
			$width = $im[0];
			$hight = $im[1];
			if($width > 230 || $hight > 115)
			{
				$width_percentage = (230 / $width) * 100;
				$hight_percentage = (115 / $hight) * 100;
				if($width_percentage > $hight_percentage) $percentage = $hight_percentage;
				else $percentage = $width_percentage;
				
				$width = ($width * $percentage) /100 ;
				$hight = ($hight * $percentage) /100;
			}
		}else
		{
			 $image_url = 'http://gybi.org/wp-content/themes/gybi/images/weekly_email/supporters.jpg';
			 $width = 230;
			 $hight = 115;
		}
		$link = get_permalink($postID);
		$string = substr(get_field('expertise', $postID), 0, 50);
		
		$address =  '';
		$country_of_interests = get_field('country_of_interest', $postID);
		$i=0;
		 foreach($country_of_interests as $item):
			$country_of_interest = $country_of_interest.$item->name;
			if ($i < count($country_of_interests)-1){
				$address = $address.', ';
			}
			$i++;
		 endforeach;
		
		$message .= '<tr>
<td height="15" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
</tr>';
		$message .= '<tr>
<td align="center" valign="top">
<table class="horizontal-tabs" width="100%" border="0" cellspacing="0" cellpadding="0" style="border:2px solid #e7e7e7; padding:13px;" bgcolor="#ffffff">
  <tr>
<td class="vertical-tabs" width="230px" align="center"><a href="'.$link.'" target="_blank"><img src="'.$image_url.'" class="img-resonsive" width="'.$width.'" height="'.$hight.'" border="0" alt=" " style="display:block; margin:0px; padding:0px; width: '.$width.'px !important"></a></td>
<td class="vertical-tabs" width="20" height="20" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
    <td align="center" valign="top" class="vertical-tabs">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#000000; line-height:100%;"><a href="'.$link.'" style="color:#286daf; font-family:Georgia, \'Times New Roman\', Times, serif; font-size:20px; line-height:100%; text-decoration: none;">'.$name.'</a>
    <br>
<font style="font-family:Arial, Helvetica, sans-serif; font-size:13px; line-height:250%;">'.$address.'</font>
    <br>
<font style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#888888;  line-height:100%;">'.$string.'...</font>
</td>
  </tr>
    <tr>
<td height="10" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
</tr>
  <tr>
    <td align="left"><a href="'.$link.'" target="_blank"><img src="http://gybi.org/wp-content/themes/gybi/images/weekly_email/readmore-blue.jpg" border="0" alt=" "></a></td>
  </tr>
</table>
    </td>
  </tr>
</table>

</td>
</tr>';
	
		}
	}
	$message .= '<tr>
		<td height="10px" ></td>
		</tr>
		
		<tr>
		<td align="center" style="background:#ffffff; border:2px solid #e7e7e7"><a href="http://gybi.org/supporters/" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; height:30px; color:#666666; text-decoration:none; font-weight:bold; display:block; text-align:center; line-height: 30px;"> VIEW ALL SUPPORTERS </a></td>
		</tr>';

$message .= '
  <tr>
<td height="50" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td>
<table border="0" width="100%" bgcolor="#f36532" cellpadding="0" cellspacing="0">
<tr>
<td align="center" valign="top">
<table class="container" align="center" width="560" border="0" cellspacing="0" cellpadding="0" bgcolor="#f36532">
<tr>
<td height="20" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
</tr>
<tr>
<td align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#f8f8f8; padding-bottom:10px;">&#169; 2015 "Global Youth Business Incubator" Right Reserved</td>
</tr>
<tr>
<td align="center" valign="top"><a target="_blank" href="https://www.facebook.com/GYIN.ORG"><img src="http://gybi.org/wp-content/themes/gybi/images/weekly_email/fb-icon.jpg" width="24" height="24" border="0" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; display:inline-block; margin:0px; padding:0px; border:0px;" alt="" /></a> &nbsp; <a target="_blank" href="https://plus.google.com"><img src="http://gybi.org/wp-content/themes/gybi/images/weekly_email/google.jpg" width="24" height="24" border="0" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; display:inline-block; margin:0px; padding:0px; border:0px;" alt="" /></a> &nbsp; <a target="_blank" href="https://www.linkedin.com/"><img src="http://gybi.org/wp-content/themes/gybi/images/weekly_email/linkedin.jpg" width="24" height="24" border="0" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; display:inline-block; margin:0px; padding:0px; border:0px;" alt="" /></a> &nbsp; <a target="_blank" href="https://twitter.com/gyin1"><img src="http://gybi.org/wp-content/themes/gybi/images/weekly_email/twitter.jpg" width="24" height="24" border="0" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; display:inline-block; margin:0px; padding:0px; border:0px;" alt="" /></a></td>
</tr>
<tr>
<td height="20" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:1px; color:#000000; line-height:1px;">&nbsp;</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</div>
</body>
</html>';
	$headers        = array(	'Content-Type: text/html; charset=UTF-8'	);
	$headers[] = 'From: Global Youth Business Incubator <contactgybi@gyin.org>' . "\r\n";
	$subject        = 'Weekly digest Email From Global Youth Business Incubator';
echo $message;	
	//wp_mail('praveenkumar.p232@gmail.com', $subject, $message, $headers, null);
	//wp_mail('praveenpkumar232@gmail.com', $subject, $message, $headers, null);
//	wp_mail('madhus@innvectra.com', $subject, $message, $headers, null);
}

// deleted users
function weekly_cronjob_action () {
	get_weekly_projects();
} add_action('weekly_cronjob_action', 'weekly_cronjob_action');
