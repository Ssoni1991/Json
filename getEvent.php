<?php
/**
 * Created by PhpStorm.
 * User: Shruti
 * Date: 2/10/2017
 * Time: 8:13 AM
 */
session_start();
error_reporting(E_ALL);
include ("connection1.php");

$get_events = mysqli_query($db, "SELECT * FROM `events`") or trigger_error(mysqli_error());

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
    echo "no events available";
}

?>