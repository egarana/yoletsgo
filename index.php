<?php

if(!isset($_POST["step"])){

	$step = 1;

	$pages = "register.php";

} else {

	$step = $_POST["step"];

}

function ip_visitor_country()
{

    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    $country  = "Unknown";

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=".$ip);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $ip_data_in = curl_exec($ch); // string
    curl_close($ch);

    $ip_data = json_decode($ip_data_in,true);
    $ip_data = str_replace('&quot;', '"', $ip_data); 
    if($ip_data && $ip_data['geoplugin_countryName'] != null) {
        $country = $ip_data['geoplugin_countryName'];
    }

    return $country;
}

$visitor_country = ip_visitor_country();

if($_POST){

	if($step == 1){

		$name 			= trim($_POST['name']);
		$partnerName	= trim($_POST['partnerName']);
		$age 			= trim($_POST['age']);
		$emailAddress 	= trim($_POST['emailAddress']);
		$phoneNumber 	= trim($_POST['phoneNumber']);
		$address 		= trim($_POST['address']);
		$city 			= trim($_POST['city']);
		$country 		= trim($_POST['country']);
		$favouriteSport = trim($_POST['favouriteSport']);
		$reason 		= trim($_POST['reason']);

		$error_require = false;
		$error_msg = "<div class=\"error-report form-bg-body\">
						  <div class=\"error-msg\">This field can't be empty</div>
					  </div>";

		if ($name == NULL || $name == '') {
			$error_require = true;
			$name_error = true;
		}

		if ($partnerName == NULL || $partnerName == '') {
			$error_require = true;
			$partnerName_error = true;
		}

		if ($age == NULL || $age == '') {
			$error_require = true;
			$age_error = true;
		}

		if ($emailAddress == NULL || $emailAddress == '') {
			$error_require = true;
			$emailAddress_error = true;
		}

		if ($phoneNumber == NULL || $phoneNumber == '') {
			$error_require = true;
			$phoneNumber_error = true;
		}

		if ($address == NULL || $address == '') {
			$error_require = true;
			$address_error = true;
		}

		if ($city == NULL || $city == '') {
			$error_require = true;
			$city_error = true;
		}

		if ($country == NULL || $country == '') {
			$error_require = true;
			$country_error = true;
		}

		if ($favouriteSport == NULL || $favouriteSport == '') {
			$error_require = true;
			$favouriteSport_error = true;
		}

		if ($reason == NULL || $reason == '') {
			$error_require = true;
			$reason_error = true;
		}

		if (!$error_require){
			$step = 2;
			/*$name 			= trim($_POST['name']);
			$partnerName	= trim($_POST['partnerName']);
			$age 			= trim($_POST['age']);
			$emailAddress 	= trim($_POST['emailAddress']);
			$phoneNumber 	= trim($_POST['phoneNumber']);
			$address 		= trim($_POST['address']);
			$city 			= trim($_POST['city']);
			$country 		= trim($_POST['country']);
			$favouriteSport = trim($_POST['favouriteSport']);
			$reason 		= trim($_POST['reason']);*/
		}

		switch ($step) {
			case 1:
				$pages = "register.php";
				break;
			
			case 2:
				$pages = "upload.php";
				break;

			case 3:
				$pages = "done.php";
				break;

			default:
				$pages = false;
				break;
		}

	} else if ($step == 2) {
		
		$name 			= trim($_POST['name']);
		$partnerName	= trim($_POST['partnerName']);
		$age 			= trim($_POST['age']);
		$emailAddress 	= trim($_POST['emailAddress']);
		$phoneNumber 	= trim($_POST['phoneNumber']);
		$address 		= trim($_POST['address']);
		$city 			= trim($_POST['city']);
		$country 		= trim($_POST['country']);
		$favouriteSport = trim($_POST['favouriteSport']);
		$reason 		= trim($_POST['reason']);
		$the_file  		= $_FILES['photo']['tmp_name'];
		$foto 			= substr(md5(uniqid(rand(1,6))), 0, 6).str_replace(" ", "-", $_FILES['photo']['name']);
		if(isset($_POST['agreement'])){
			$agreement 		= $_POST['agreement'];
		} else {
			$agreement 		= NULL;
		}
		$frameSelect		= $_POST['frameSelect'];

		$error_require = false;
		$error_msg = "<div class=\"error-report form-bg-body\">
						  <div class=\"error-msg\">Photo can't be empty</div>
					  </div>";

		if ($the_file == NULL || $the_file == '') {
			$error_require = true;
			$photo_error = true;
		}

		$error_agree_msg = "<div class=\"error-report form-bg-body\">
						  <div class=\"error-msg\">You must agree to the term & conditions</div>
					  </div>";

		if ($agreement == NULL || $agreement == '') {
			$error_require = true;
			$agreement_error = true;
		}

		if (!$error_require){
			$step = $step + 1;

			function LoadPNG($imgname)
			{
			    $frame = @imagecreatefrompng($imgname);

			    if(!$frame)
			    {
			        $frame  = imagecreatetruecolor(1200, 1200);
			        $bgc = imagecolorallocate($im, 255, 255, 255);
			        $tc  = imagecolorallocate($im, 0, 0, 0);

			        imagefilledrectangle($frame, 0, 0, 150, 30, $bgc);

			        imagestring($frame, 1, 5, 5, 'Error loading ' . $imgname, $tc);
			    }

			    imagealphablending($frame, true);

				imagesavealpha($frame, true);

				$frame_overlay = @imagecreatefrompng($imgname);

				imagealphablending($frame_overlay, true);

				imagesavealpha($frame_overlay, true);

				$user_photo = imagecreatefromjpeg($GLOBALS["the_file"]);

				$profile_image = imagecreatetruecolor(1000, 1000);

				list($width, $height) = getimagesize($GLOBALS["the_file"]);

				imagecopyresized($profile_image, $user_photo, 0, 0, 0, 0, 1000, 1000, $width, $height);

				imagecopymerge($frame, $profile_image, 140, 150, 0, 0, 1000, 1000, 100);

				imagecopy($frame, $frame_overlay, 0, 0, 0, 0, 1200, 1200);

			    return $frame;
			}

			$img = LoadPNG('img/'.$frameSelect.'.png');

			imagepng($img, 'img/user/'.$foto.'.png');
			imagedestroy($img);

			include "dbcrud.php";

			$db = new connect();

			$db->connect_it("yoletsgo");

			$db->setdata("INSERT INTO `user_table` (`id`, `name`, `partner_name`, `age`, `email_address`, `phone_number`, `address`, `city`, `country`, `favourite_sport`, `reason`, `pic_name`) VALUES (NULL, '$name', '$partnerName', '$age', '$emailAddress', '$phoneNumber', '$address', '$city', '$country', '$favouriteSport', '$reason', '$foto');");

		}

		switch ($step) {
			case 1:
				$pages = "register.php";
				break;
			
			case 2:
				$pages = "upload.php";
				break;

			case 3:
				$pages = "done.php";
				break;

			default:
				$pages = false;
				break;
		}

	}

}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Page Title</title>
		<meta http-equiv="cache-control" content="max-age=0" />
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="expires" content="0" />
		<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</head>
	<?php include "./page/".$pages; ?>
</html>