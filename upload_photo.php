<?php

$photo = $_FILES['photo'];
$photo_name = basename($photo['name']); //daje samo ime slike a ne lokaciju
$Photo_path = 'member_photos/' . $photo_name;   //spremanje slike u folder
var_dump($Photo_path);


$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];  //dozvoljeni nastavci
$ext = pathinfo($photo_name, PATHINFO_EXTENSION);  //exstenzija mog file

if(in_array($ext, $allowed_ext) && $photo ['size'] < 2000000){
    move_uploaded_file($photo['tmp_name'],$Photo_path);
    echo json_encode(['success' => true, 'Photo_path'=>$Photo_path]);
}
else{
    echo json_encode(['success' => false, 'error'=> 'Invalid file']);
}
$Members_ID = $conn->insert_id;
$sql = "UPDATE members SET Photo_path = '$Photo_path' WHERE Members_ID = $Members_ID";
    $conn -> query($sql);
    $conn -> close();

var_dump($photo_name);
?>