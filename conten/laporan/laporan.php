<h3>Cari Data Laporan</h3>
<hr>
<form action="media.php?conten=hasil_laporan" method="post">
    <table>
        <tr>
            <td>Dari Tanggal</td>
            <td>:</td>
            <td>
                <input type="date" name="dari" autocomplete="off" required>
            </td>
        </tr>
        <tr>
            <td>Sampai Tanggal</td>
            <td>:</td>
            <td>
                <input type="date" name="sampai" autocomplete="off" required>
            </td>
        </tr>
        <tr>
            <td>Status Pinjaman</td>
            <td>:</td>
            <td>
                <input type="radio" name="status" value="1" checked>Dipinjam
                <input type="radio" name="status" value="2">Selesai
                <input type="radio" name="status" value="3">Semua
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit">&#128269; Cari</button>
                <button type="reset">&#128465; Hapus</button>
            </td>
        </tr>
    </table>
</form>
