<?php
$host = "ec2-52-21-252-142.compute-1.amazonaws.com";
$port = "5432";
$dbname = "d1ioiur69ghpgi";
$user = "lcjfcfidaomkpx";
$password = "55771f6df732b531c46690ff3e0ef25c11b2f343eafc4678305082563ef1873b"; 
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string);
if(!$dbconn){
    echo "loi";
}
?>