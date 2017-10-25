<?php
/**
 * Created by PhpStorm.
 * User: Shruti
 * Date: 2/11/2017
 * Time: 12:32 PM
 */
session_start();
error_reporting(E_ALL);
include ("connection.php");

$sql = "select * from subscribe";

$res = mysqli_query($con,$sql);

$result = array();

while($row = mysqli_fetch_array($res)){
    array_push($result,
        array('id'=>$row[0],
            'email'=>$row[1],
            'phone'=>$row[2]
        ));
}

echo json_encode(array("result"=>$result));

mysqli_close($con);

?>