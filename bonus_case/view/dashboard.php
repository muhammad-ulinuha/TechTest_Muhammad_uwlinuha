<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
$username = $_SESSION['username'];

include '../controller/instansi.php';
$instansi = new Instansi();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboardt</title>
    <link href="../../../bonus_case/assets/images/Logo-MUW.png" rel="icon" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>


    <?php include '../view/components/navbar.php' ?>

    <div class="container">
        <div class="row d-flex justify-content-center align-item-center mt-5">
            <div class="col-md-8">
            <button type="button" class="btn btn-primary btn-outline-success text-white" data-bs-toggle="modal" data-bs-target="#tambahdata"><i class="bi bi-plus-circle"></i> Instansi</button>

            <div class="col-md-6 mt-3">
                <form class="d-flex" role="search" method="GET">
                    <input class="form-control me-2" type="search" name="key" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered rounded mt-3">
                    <thead class="table-primary">
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Instansi</th>
                        <th scope="col">Deskrispsi</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Updated at</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $key = '';
                        if(isset($_GET['key'])){
                            $key = $_GET['key'];
                        }
                        $no=1;
                        foreach($instansi->getData($key) as $data){
                        ?>
                        <tr>
                        <th><?php echo $no++; ?></th>
                        <td><?php echo $data['nama_instansi']; ?></td>
                        <td><?php echo $data['deskripsi']; ?></td>
                        <td><?php echo $data['created_at']; ?></td>
                        <td><?php echo $data['updated_at']; ?></td>
                        <td class="d-flex justify-content-around">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#editdata<?php echo $data['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="green" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg></a>
                                <!-- modal edit data -->
                                <div class="modal fade" id="editdata<?php echo $data['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editdataLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editdataLabel">Edit Instansi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="../route/route.php?id=<?php echo $data['id']; ?>&aksi=update" method="post">
                                        <div class="modal-body">
                                            <label for="namaInstansi" class="form-label">Nama Instansi</label>
                                            <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                                            <input type="text" id="namaInstansi" name="nama_instansi" class="form-control" value="<?php echo $data['nama_instansi']; ?>">
                                            <label for="deksripsi" class="form-label">Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control" id="deskripsi" cols="10" rows="5"><?php echo $data['deskripsi']; ?></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                </div>

                            <a href="../route/route.php?id=<?php echo $data['id']; ?>&aksi=hapus" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya ?')"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg></a>
                        </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah-->
    <div class="modal fade" id="tambahdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahdataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="tambahdataLabel">Tambah Instansi</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="../route/route.php?aksi=tambah" method="post">
            <div class="modal-body">
                <label for="namaInstansi" class="form-label">Nama Instansi</label>
                <input type="text" id="namaInstansi" name="nama_instansi" class="form-control" required placeholder="Input Nama Instansi">
                <label for="deksripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" cols="10" rows="5" placeholder="Input Deskripsi"></textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
    </div>
    </div>


    <?php include './components/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>