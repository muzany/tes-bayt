<?php 
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
	$sql = $connection->query("SELECT * FROM admin WHERE id_admin='$_GET[key]'");
	$row = $sql->fetch_assoc();
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
						<h6 class="text-white text-capitalize ps-3">Data Admin</h6>
					</div>

				</div>

				<div class="card-body px-0 pb-2">
					<div class="table-responsive p-0">
						<div class="col-2 text-end">
							<a href = "?page=tambah-admin" class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Tambah Admin</a>
						</div>
						<table class="table align-items-center mb-0">
							<thead>
								<tr>
									<th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama</th>
									<th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Username</th>
									<th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Bagian</th>
									<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No. HP</th>
									<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php $query=$connection->query("SELECT * FROM admin"); ?>
								<?php while($row=$query->fetch_assoc()) { ?>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm"><?php echo $row["nama"]; ?></h6>
													<p class="text-xs text-secondary mb-0"><?php echo $row["email"]; ?></p>
												</div>
											</div>
										</td>
										<td>
											<p class="text-xs font-weight-bold mb-0"><?php echo $row["username"]; ?></p>
										</td>
										<td>
											<p class="text-xs font-weight-bold mb-0"><?php echo $row["bagian"]; ?></p>
										</td>
										<td class="align-middle text-center text-sm">
											<p class="text-xs font-weight-bold mb-0"><?php echo $row["no_hp"]; ?></p>
										</td>
										<td class="align-middle">
											<div class="text-center ms-auto text-end">
												<a class="btn btn-link text-danger text-gradient px-3 mb-0" href="?page=data-admin&action=delete&key=<?=$row['id_admin']?>"><i class="material-icons text-sm me-2">delete</i>Delete</a>
												<a class="btn btn-link text-dark px-3 mb-0" href="?page=tambah-admin&action=update&key=<?=$row['id_admin']?>"><i class="material-icons text-sm me-2">edit</i>Edit</a>
											</div>
										</td>
									</tr>
								<?php }  ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>