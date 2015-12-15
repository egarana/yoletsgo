<?php
/*function LoadPNG($imgname)
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

	$user_photo = imagecreatefromjpeg('img/user.jpg');

	$profile_image = imagecreatetruecolor(1000, 1000);

	list($width, $height) = getimagesize('img/user.jpg');

	imagecopyresized($profile_image, $user_photo, 0, 0, 0, 0, 1000, 1000, $width, $height);

	imagecopymerge($frame, $profile_image, 140, 150, 0, 0, 1000, 1000, 100);

	imagecopy($frame, $frame_overlay, 0, 0, 0, 0, 1200, 1200);

    return $frame;
}

header('Content-Type: image/png');

$img = LoadPNG('img/frame-1.png');

imagepng($img, 'img/user/user.png');
imagedestroy($img);*/


include "dbcrud.php";

$db = new connect();

$db->connect_it("yoletsgo");

for ($i=101; $i < 200; $i++) { 
   $db->setdata("INSERT INTO `yoletsgo`.`user_table` (`id`, `name`, `partner_name`, `age`, `email_address`, `phone_number`, `address`, `city`, `country`, `favourite_sport`, `reason`, `pic_name`) VALUES (NULL, 'User $i', 'User $i Partner', '24', 'user$i@test.com', '081234567891$i', 'User $i Address', 'User $i City', 'Unknown', 'Mini Soccer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam qu', '5670eaay0wqpp_700b.jpg')");
}

/*include "dbcrud.php";

$db = new connect();

$db->connect_it("yoletsgo");

$user_data = array(
            'users' => array(
                        
                    )
        );

$db->getdata("SELECT * FROM `user_table` ORDER BY `id` DESC");

while($db->showdata()){

    $reasonType = rand(1,3);

    array_push($user_data['users'], array('id' => $db->data[0], 'name' => $db->data[1], 'partner_name' => $db->data[2], 'age' => $db->data[3], 'email_address' => $db->data[4], 'phone_number' => $db->data[5], 'address' => $db->data[6], 'city' => $db->data[7], 'country' => $db->data[8], 'favourite_sport' => $db->data[9], 'reason' => $db->data[10], 'pic_name' => $db->data[11]));

}

echo json_encode($user_data);*/

?>
