<?php

if (isset($_GET['conten'])) {

    // =======================
    // DASHBOARD
    // =======================
    if (
        $_GET['conten'] == "dashboard" ||
        $_GET['conten'] == "home"
    ) {

        include "conten/home.php";

    }

    // =======================
    // DATA MAHASASISWA
    // =======================
    elseif ($_GET['conten'] == "biodata") {

        include "conten/biodata/biodata.php";

    }

    elseif ($_GET['conten'] == "tambah_mahasiswa") {

        include "conten/biodata/tambah_mahasiswa.php";

    }

    elseif ($_GET['conten'] == "edit_mahasiswa") {

        include "conten/biodata/edit_mahasiswa.php";

    }

    // =======================
    // REGISTRASI RFID
    // =======================
    elseif ($_GET['conten'] == "registrasi_rfid") {

        include "conten/registrasi_rfid.php";

    }

    // =======================
    // ABSENSI
    // =======================
    elseif ($_GET['conten'] == "buku") {

        include "conten/buku/buku.php";

    }

    elseif ($_GET['conten'] == "edit_buku") {

        include "conten/buku/edit_buku.php";

    }

    elseif ($_GET['conten'] == "tambah_buku") {

        include "conten/buku/tambah_buku.php";

    }

    // =======================
    // RIWAYAT
    // =======================
    elseif ($_GET['conten'] == "laporan") {

        include "conten/laporan/laporan.php";

    }

    elseif ($_GET['conten'] == "hasil_laporan") {

        include "conten/laporan/hasil_laporan.php";

    }

    // =======================
    // KOMPATIBILITAS PROJECT LAMA
    // =======================
    elseif ($_GET['conten'] == "anggota") {

        include "conten/anggota/anggota.php";

    }

    elseif ($_GET['conten'] == "edit_anggota") {

        include "conten/anggota/edit_anggota.php";

    }

    elseif ($_GET['conten'] == "tambah_anggota") {

        include "conten/biodata/tambah_mahasiswa.php";

    }

    // =======================
    // MODUL TIDAK DITEMUKAN
    // =======================
    else {

        echo "<h3 style='text-align:center;color:red;'>MODUL BELUM DIBUAT</h3>";

    }

} else {

    include "conten/home.php";

}

?>