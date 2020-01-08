<?php 

  $id_kriteria = $_GET['id'];
  $id_desc = $_GET['id_desc'];

  $sql = "select * from desc_kriteria where id_desc='$id_desc'";
  $query = mysqli_query($con, $sql);
  $data = mysqli_fetch_assoc($query);

	if (isset($_POST['simpan'])) {

		$deskripsi = $_POST['deskripsi'];
    $nilai = $_POST['nilai'];
    

		$sql = "update desc_kriteria set deskripsi='$deskripsi', nilai='$nilai' where id_desc='$id_desc'";
		$query = mysqli_query($con, $sql);
		if ($query) {
			echo "<script>alert('Data berhasil diubah!');window.location.href='index.php?p=criteria&act=show&id=$id_kriteria'</script>";
		} else {
			echo "Error : " . mysqli_error($con);
		}
	}

 ?>

<div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Kriteria</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Deskripsi</label>
              <input type="text" class="form-control input-lg" id="exampleInputEmail1" placeholder="Masukan Deskripsi" name="deskripsi" required value="<?= $data['deskripsi'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nilai</label>
              <input type="number" class="form-control input-lg" id="exampleInputEmail1" placeholder="Masukan Nilai" name="nilai" required value="<?= $data['nilai'] ?>">
            </div>
            
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.box -->


    </div>
    <!--/.col (left) -->
    
  </div>
  <!-- /.row -->