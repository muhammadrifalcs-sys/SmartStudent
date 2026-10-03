<?php
function tgl_tampil($date){
    $pecah = explode('-', $date);
    if ($pecah[1] == "1") {
        $bulan = "Jan";
    } elseif ($pecah[1] == "2") {
        $bulan = "Feb";
    } elseif ($pecah[1] == "3") {
        $bulan = "Mar";
    } elseif ($pecah[1] == "4") {
        $bulan = "Apr";
    } elseif ($pecah[1] == "5") {
        $bulan = "Mei";
    } elseif ($pecah[1] == "6") {
        $bulan = "Jun";
    } elseif ($pecah[1] == "7") {
        $bulan = "Jul";
    } elseif ($pecah[1] == "8") {
        $bulan = "Agu";
    } elseif ($pecah[1] == "9") {
        $bulan = "Sep";
    } elseif ($pecah[1] == "10") {
        $bulan = "Okt";
    } elseif ($pecah[1] == "11") {
        $bulan = "Nov";
    } elseif ($pecah[1] == "12") {
        $bulan = "Des";
    }
        $datang = $pecah[2].'-'.$bulan.'-'.$pecah[0];
    return $date;
}
?>
