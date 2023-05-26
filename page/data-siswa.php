<?php 

$url	= "http://psb.baytalhikmah.sch.id/api/get_santri";
$get = file_get_contents($url);
$parse = json_decode($get, TRUE);

foreach($parse as $data){
	// echo $data['siswa_id']."<br>".$data['nama_lengkap']."<br>".$data['jekel'];

}
?>

<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href=" https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> -->

	<div class="container fluid py-4">
		<div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
			<h6 class="text-white text-capitalize ps-3">Data Siswa</h6>
		</div>

		<div class="card-body px-0 pb-2">
			<div class="table-responsive p-0">
				<table id="tableBuku" class="table table-striped table-hover" >
					<thead class="text-center">
						<tr>      
							<th>NO</th>
							<th>SISWA ID</th>
							<th>NAMA LENGKAP</th>
							<th>JENIS KELAMIN</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						<?php foreach($parse as $data){ ?>
							<tr>  
								<td><?=$no++;?></td>      
								<td><?php echo $data['siswa_id']; ?></td>
								<td><?php echo $data['nama_lengkap']; ?></td>
								<td><?php echo $data['jekel']; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src=" https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script src=" https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

	<script>
		$(document).ready(function() {
			$('#tableBuku').DataTable();
		} );
	</script>