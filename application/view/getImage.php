<?php
error_reporting(0);
include_once("../../db_connector/config.php");
/**
 * @author Andrew
 * @copyright 2016
 */
$id=$_GET['id'];
$sql="SELECT Passport_photo FROM `passports` where emp_id='$id'";
					$result = mysqli_query($sql);
					($row = mysql_fetch_array($result));
                    header("Content-type: image/jpeg");
                    echo $row['Passport_photo'];
                    
?>
