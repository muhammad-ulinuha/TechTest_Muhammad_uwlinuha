<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'test';

$koneksi = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_error() ) {
	exit('Gagal konek ke MySQL: ' . mysqli_connect_error());
}


$sql = "SELECT MAX(mhsn.nilai) as nilai, mk.mk_nama as mk_nama, mhs.mhs_nama as mhs_nama from tb_mahasiswa_nilai as mhsn INNER JOIN tb_matakuliah as mk ON mk.mk_id = mhsn.mk_id JOIN tb_mahasiswa as mhs ON mhsn.mhs_id = mhs.mhs_id WHERE mk.mk_kode = 'MK303' GROUP BY mk_nama, mhs_nama";


$query = mysqli_query($koneksi, $sql);
if (!$query) {
	die ('SQL Error: ' . mysqli_error($koneksi));
}
while ($row = mysqli_fetch_array($query)){
    echo '<tr>
                <td>'.$row['mk_nama'].'</td>
                <td>'.$row['mhs_nama'].'</td>
                <td>'.$row['nilai'].'</td>
                <br>

          </tr>';
}
