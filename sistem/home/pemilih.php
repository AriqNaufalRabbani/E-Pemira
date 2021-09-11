<?php

	$data_id = $_SESSION["ses-id"];

	$sql = $koneksi->query("select * from tb_user where id_user=$data_id");
	while ($data= $sql->fetch_assoc()) {

	$status=$data['status'];

}
?>

<?php if($status==1){ ?>

<div class="row">
	<tbody>

		<?php
		$sql = $koneksi->query("select * from tb_kandidat");
		while ($data= $sql->fetch_assoc()) {
		?>
		<!-- Profile Image -->

		<div class="col-md-4">
			<div class="card card-primary card-outline">
                <div class="card-header">
                    <h4 class="profile-username text-center">
                        <?php echo $data['id_kandidat']; ?>
                    </h4>
                </div>
				<div class="card-body">
					<div class="text-center">
						<img src="foto/<?php echo $data['foto_paslon']; ?>" width="235px" />
					</div>

					<h3 class="profile-username text-center">
						<?php echo $data['nama_ketua']; ?> || <?php echo $data['nama_wakil']; ?>
					</h3>

					<center>
						<a href="?page=view&kode=<?php echo $data['id_kandidat']; ?>" class="btn btn-success btn-sm">
							<i class="fa fa-file"></i> Detail
						</a>
						<a href="?page=PsSQBBK&kode=<?php echo $data['id_kandidat']; ?>" class="btn btn-primary">
							<i class="fa fa-edit"></i> Pilih
						</a>
					</center>
				</div>
			</div>
		</div>

		<!-- /.card -->
		<?php
              }
            ?>
	</tbody>
</div>

<!-- /.card-body -->
<?php }elseif ($status==0) { ?>

<div class="alert alert-info alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h4>
		<i class="icon fas fa-info"></i>Info</h4>
	<h3>Anda sudah menggukan Hak Suara dengan baik, Terimakasih.</h3>
</div>

<?php }  