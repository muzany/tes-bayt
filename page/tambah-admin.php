    <?php
    require_once "./koneksi.php";
    $update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
    if ($update) {
        $sql = $connection->query("SELECT * FROM admin WHERE id_admin='$_GET[key]'");
        $row = $sql->fetch_assoc();
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($update) {
            $sql = "UPDATE admin SET nama='$_POST[nama]', username='$_POST[username]', email='$_POST[email]', bagian='$_POST[bagian]', no_hp='$_POST[no_hp]'";
            if ($_POST["password"] != "") {
                $sql .= ", password='".md5($_POST["password"])."'";
            }
            $sql .= " WHERE id_admin='$_GET[key]'";
        } else {
            $sql = "INSERT INTO admin VALUES (NULL, '$_POST[nama]', '$_POST[username]', '$_POST[email]', '$_POST[bagian]', '$_POST[no_hp]','".md5($_POST["password"])."')";
        }
        if ($connection->query($sql)) {
            echo alert("Berhasil!", "?page=data-admin");
        } else {
            echo alert("Gagal!", "?page=data-admin");
        }
    }
    if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
      $connection->query("DELETE FROM admin WHERE id_admin='$_GET[key]'");
      echo alert("Berhasil!", "?page=data-admin");
  }
  ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Tambah Admin</h6>
                    </div>
                </div>


                <div class="card-content">
                    <div class="card-body">
                        <form action="" method="POST" class="form form-vertical">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">Nama</label>
                                                <input type="text" class="form-control" <?= (!$update) ?: 'value="'.$row["nama"].'"' ?> name="nama">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control" <?= (!$update) ?: 'value="'.$row["username"].'"' ?> name="username">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" <?= (!$update) ?: 'value="'.$row["email"].'"' ?> name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Bagian</label>
                                            <input type="text" class="form-control" <?= (!$update) ?: 'value="'.$row["bagian"].'"' ?> name="bagian">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">No. HP</label>
                                            <input type="text" class="form-control" <?= (!$update) ?: 'value="'.$row["no_hp"].'"' ?> name="no_hp">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" <?= (!$update) ?: 'value="'.$row["password"].'"' ?> name="password">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success mr-1 mb-1">Simpan</button>
                                    <button type="reset" class="btn btn-light-danger mr-1 mb-1">Reset</button>
                                    <?php if ($update): ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
