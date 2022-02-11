<?php
$mydir = './img/gallery/rest';
$myfiles = array_diff(scandir($mydir), array('.', '..'));
$js_array = json_encode($myfiles);
echo "$js_array";
// echo json_encode($myfiles);
?>