<?php
/**
 * Created by PhpStorm.
 * User: Shruti
 * Date: 2/10/2017
 * Time: 10:12 AM

session_start();
error_reporting(E_ALL);
include ("connection.php");

$get_events = mysqli_query($db, "SELECT * FROM `gallary`") or trigger_error(mysqli_error());

if (mysqli_num_rows($get_events) > 0) {

    $data = array();
    while ($row = mysqli_fetch_assoc($get_events)) {
        array_push($data,$row);
    }

    $master = array(
        'status' => 'true',
        'events' => $data);
    print_r(stripslashes(json_encode($master)));

} else {
    echo "no community members found";
}
 *
 * */



session_start();
error_reporting(E_ALL);
include("connection1.php");
//$db = new PDO('mysql:host=localhost;dbname=lagc', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

$get_events = mysqli_query($db, "SELECT * FROM `event_gallery`") or trigger_error(mysqli_error());

if (mysqli_num_rows($get_events) > 0) {

    $data = array();
    $data1 = array();
// Loop through each event
    while ($row = mysqli_fetch_assoc($get_events)) {

        /**
         * $getDetails = mysqli_query($db, "SELECT image_url FROM `url_gallery` WHERE  id = ".$row['id']) or trigger_error(mysqli_error());
         **/
        $getDetails = mysqli_query($db, "SELECT * FROM `url_gallery` WHERE  url_gallery.id = " . $row['id']) or trigger_error(mysqli_error());

//print stripcslashes(json_encode($getDetails));

        // Loop through each image associated with an event and add the images to the event
        $images = array();
        while ($event_row = mysqli_fetch_assoc($getDetails)) {
            $images[] = (object) $event_row['url'];
//            var_dump($event_row);
//            $images = $event_row['url'];
        }
//minnime2k6@gmail.com
        $data[] = array_merge($row, array('images' => $images));
    }

    $master = array(
        'status' => 'true',
        'events' => $data);
    print_r(stripslashes(json_encode($master)));

} else {
    echo "no events available";
}


?>