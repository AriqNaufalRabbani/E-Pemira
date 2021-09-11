<!DOCTYPE html>
<html>
<head>
	<title>E-Pemira || BEM STMIK Nusa Mandiri</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
 
	<center>
 
		<h2>DATA LAPORAN PEMILIH</h2>
		<h4>Pemira BEM STMIK Nusa Mandiri</h4>
		<br>
 
	</center>
 
	<?php 
	include '../../koneksi.php';
	?>
 
	<table border="1" style="width: 100%" class="table table-bordered table-striped">
		<tr>
			<th width="1%">No</th>
			<th>Nim</th>
			<th>Nama Pemilih</th>
			<th>Status</th>
		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"select * from tb_pemilih where status='1'");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['nim']; ?></td>
			<td><?php echo $data['nama_user']; ?></td>
			<td>
                <?php $stt = $data['suara']  ?>
				<?php if($stt == '1'){ ?>
					<span class="badge badge-warning">Belum memilih</span>
				<?php }elseif($stt == '0'){ ?>
					<span class="badge badge-primary">Sudah memilih</span>
            </td>
            <?php } ?>
		</tr>
		<?php 
		}
		?>
	</table>
 
	<script>
		window.print();
	</script>
 
 	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>