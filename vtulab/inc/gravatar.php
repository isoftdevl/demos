<?php
$email = $data['email'];
$default = "assets/images/user.png";
$size = 40;

$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;

?>