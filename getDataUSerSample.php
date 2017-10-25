<?php
/**
 * Created by PhpStorm.
 * User: Shruti
 * Date: 2/11/2017
 * Time: 2:53 PM



session_start();
error_reporting(E_ALL);

$host='localhost';
$uname='root';
$pwd='root';
$db="android"; //:D you fool open postmapn
include "connection.php";
 //copt here
$name = mysqli_real_escape_string($db, trim($_POST['id']));
$mobile = mysqli_real_escape_string($db, trim($_POST['name']));

//$id=$_REQUEST['id'];
//$name=$_REQUEST['name']; // are yar id to AUto incremanet wali di hogi n table me???? nahi di he isliye to mention kar rahi hu sabhi jagah
// ky atume thik se copy kiya h?
//ha yar. par me tumhari file hi copy kar lu ab puri?
//query thik se likho ho jayega
// thik to hai yar
$get_events = mysqli_query($db, "insert into `sample` values('$name','$mobile')") or trigger_error(mysqli_error()); // can't you copy paste?
print(json_encode("Inserted"));
	mysqli_close($con);
?>
*/


session_start();
error_reporting(1);
include ("connection1.php");

$id= mysqli_real_escape_string($db, trim($_POST['id']));
$name = mysqli_real_escape_string($db, trim($_POST['name']));



$insertion = mysqli_query($db, "INSERT INTO `sample` (`id`, `name`) VALUES ('$id', '$name')") or trigger_error(mysqli_error());
echo $name;
print(json_encode("Inserted"));

/*if ($insertion) {
    $id = mysqli_insert_id($db);
   $insert_into_user_details = mysqli_query($db, "INSERT INTO `user_detail` (`id`, `job`, `dept`, `user_id`, `mobile`) VALUES ('', '$job', '$dept', '$id', '$mobile')") or trigger_error(mysqli_error());

    if ($insert_into_user_details) {

        $master = array(
            'status' => 'Thanks for registering');
        print_r(stripslashes(json_encode($master)));

    }

} else {
    echo "shit";
}
*/
?>