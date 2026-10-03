<?php
include "../../koneksi/koneksi.php";

$data = mysqli_query($koneksi,"
SELECT *
FROM tbl_rfid_temp
ORDER BY id DESC
LIMIT 1
");

if(mysqli_num_rows($data)>0){

    $d=mysqli_fetch_assoc($data);

    echo $d['uid'];

}else{

    echo "";

}
?>