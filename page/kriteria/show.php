<?php 

	$id = $_GET['id'];
	$sql = "select * from kriteria where id_kriteria='$id'";
	$query = mysqli_query($con, $sql);
	$data = mysqli_fetch_assoc($query);

	if (isset($_GET['delete'])) {
	    $id_desc = $_GET['id_desc'];
	    $sql = "delete from desc_kriteria where id_desc='$id_desc'";
	    $query = mysqli_query($con, $sql);
	    if ($query) {
	        echo "<script>alert('Data berhasil dihapus!');window.location.href='index.php?p=criteria&act=show&id=$id'</script>";
	    } else {
	      echo mysqli_error($con);
	    }
	  }

 ?>

<div class="row">
    <div class="col-xs-12">
		
		<div class="box">
	        <div class="box-header">
	          <h3 class="box-title">Detail Kriteria</h3>
	        </div>
	        <div class="box-body">
	        	<h4><?= $data['kriteria'] ?></h4>
	        	<br>
	        	<table class="table table-bordered table-striped">
		        	<thead>
		        		<tr>
		        			<td>No</td>
		        			<td>Deskripsi</td>
		        			<td>Nilai</td>
		        			<td>Aksi</td>
		        		</tr>
		        	</thead>
		        	<tbody>
		        		<?php 

		        			$sql = "select * from desc_kriteria where id_kriteria='$id'";
		        			$query = mysqli_query($con, $sql);
		        			$no = 0;
		        			while ($row = mysqli_fetch_assoc($query)):
		        				$no++;
		        		 ?>
		        		 <tr>
		        		 	<td><?= $no ?></td>
		        		 	<td><?= $row['deskripsi'] ?></td>
		        		 	<td><?= $row['nilai'] ?></td>
		        		 	<td>
		        		 		<a href="index.php?p=create_skor&act=edit&id=<?= $id ?>&id_desc=<?= $row['id_desc'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                  				<a href="index.php?p=criteria&act=show&delete&id=<?= $id ?>&id_desc=<?= $row['id_desc'] ?>" class="btn btn-danger" onclick="return confirm('Data akan terhapus?')"><i class="glyphicon glyphicon-trash"></i></a>
		        		 	</td>
		        		 </tr>
		        		<?php endwhile; ?>
		        	</tbody>
		        	<tfoot>
		        		<tr>
		        			<td colspan="5" align="left">
		        				<a href="index.php?p=create_skor&id=<?= $id ?>" class="btn btn-primary">Tambah Deskripsi</a>
		        			</td>
		        		</tr>
		        	</tfoot>
		        </table>
	        </div>
	    </div>

    </div>
</div>