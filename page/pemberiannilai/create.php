<?php 

  $id_kriteria = $_GET['id'];

	if (isset($_POST['simpan'])) {

		$deskripsi = $_POST['deskripsi'];
    $nilai = $_POST['nilai'];

		$sql = "insert into desc_kriteria values(null, '$id_kriteria', '$deskripsi', '$nilai')";
		$query = mysqli_query($con, $sql);
		if ($query) {
			echo "<script>alert('Data berhasil ditambahkan!');window.location.href='index.php?p=criteria&act=show&id=$id_kriteria'</script>";
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
          <h3 class="box-title">Form Deskripsi Kriteria</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Deskripsi</label>
              <input type="text" class="form-control input-lg" id="exampleInputEmail1" placeholder="Masukan Deskripsi" name="deskripsi" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nilai</label>
              <input type="number" class="form-control input-lg" id="exampleInputEmail1" placeholder="Masukan Nilai" name="nilai" required>
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