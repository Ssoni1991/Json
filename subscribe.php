<?php
/**
 * Created by PhpStorm.
 * User: Shruti
 * Date: 2/11/2017
 * Time: 2:53 PM

 */


session_start();
error_reporting(1);
include ("connection.php");

$id= mysqli_real_escape_string($db, trim($_POST['id']));
$name = mysqli_real_escape_string($db, trim($_POST['name']));
$email = mysqli_real_escape_string($db, trim($_POST['email']));
$phone = mysqli_real_escape_string($db, trim($_POST['phone']));

$sql=mysqli_query($db, "SELECT * FROM subscribe WHERE email= '$email'") or trigger_error(error_msg);
 if(mysqli_num_rows($sql)>=1)
   {
       $master = array
       ('status' => 'false' ,
           /**'users' => $data, */
           'message' => "User Already Exist");
       print_r(stripslashes(json_encode($master)));

   }
 else
    {
    	$insertion = mysqli_query($db, "INSERT INTO `subscribe` (`email`,`name`, `phone`) VALUES ('$email','$name', '$phone')") or
trigger_error(mysqli_error());

        if ($insertion) {

            $get_user = mysqli_query($db, 'SELECT * FROM `subscribe`');

            if (mysqli_num_rows($get_user) > 0) {

                $data = array();
                while ($row = mysqli_fetch_assoc($get_user)) {
                    array_push($data, $row);
                }

                $master = array(
                    'status' => 'true',
                    /**'users' => $data, */
                    'message' => "Subscribed Successfully");
                print_r(stripslashes(json_encode($master)));


            }

        } else {

            $master = array
            ('status' => 'false' ,
                /**'users' => $data, */
                'message' => "User Already exist");
            print_r(stripslashes(json_encode($master)));

        }
    }


?>