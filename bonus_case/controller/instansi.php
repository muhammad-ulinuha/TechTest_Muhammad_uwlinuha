<?php 
// session_start();
// include '../config.php';
class Instansi{

    var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "bonus_case";
    var $koneksi ="";

    function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}
    
    function getData($key)
    {
        // if ($_GET['key']){
        //     $key = $_GET['key'];
        //     $data = mysqli_query($this->koneksi,"SELECT * FROM instansi WHERE nama_instansi LIKE '%$key%'");
        //     while($n = mysqli_fetch_array($data)){
        //         $hasil[] = $n;
        //     }
    
        //     if(empty($hasil)){
        //         return $hasil = [];
        //     }else{
        //         return $hasil;
        //     }
        // }

        $data = mysqli_query($this->koneksi,"SELECT * FROM instansi WHERE nama_instansi LIKE '%$key%' ORDER BY created_at DESC");
        while($n = mysqli_fetch_array($data)){
            $hasil[] = $n;
        }

        if(empty($hasil)){
            return $hasil = [];
        }else{
            return $hasil;
        }
    }

    function searchData($key)
    {
        // var_dump($key);
        $data = mysqli_query($this->koneksi,"SELECT * FROM instansi WHERE nama_instansi LIKE '%$key%'");
        while($n = mysqli_fetch_array($data)){
            $hasil[] = $n;
        }

        if(empty($hasil)){
            return $hasil = [];
        }else{
            return $hasil;
        }
    }

    function inputData($namaInstansi, $deskripsi)
    {
        $date = new DateTime('now');
        $created_at = $date->format('Y-m-d h:i:s');

        $query = "INSERT INTO instansi (nama_instansi, deskripsi, created_at) VALUES('$namaInstansi','$deskripsi','$created_at')";

        if ($this->koneksi->query($query) === true){
            echo "<script>alert('berhasil tambah data')
            window.location.replace('../view/dashboard.php');</script>";
        }else{
            echo "<script>alert('gagal tambah data')
            window.location.replace('../view/dashboard.php');</script>";
        }
    }

    function updateData($id, $namaInstansi, $deskripsi)
    {
        $date = new DateTime('now');
        $updated_at = $date->format('Y-m-d h:i:s');

        $query = "UPDATE instansi SET nama_instansi='$namaInstansi', deskripsi='$deskripsi', updated_at='$updated_at' WHERE id = '$id'";

        if ($this->koneksi->query($query) === true){
            echo "<script>alert('berhasil update data')
            window.location.replace('../view/dashboard.php');</script>";
        }else{
            echo "<script>alert('gagal update data')
            window.location.replace('../view/dashboard.php');</script>";
        }
    }

    function hapusData($id)
    {
        $query = "DELETE FROM instansi WHERE id='$id'";

        if ($this->koneksi->query($query) === true){
            echo "<script>alert('berhasil hapus data')
            window.location.replace('../view/dashboard.php');</script>";
        }else{
            echo "<script>alert('gagal hapus data')
            window.location.replace('../view/dashboard.php');</script>";
        }
    }
 
} 
 
?>