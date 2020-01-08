<?php 

	$id = $_GET['id'];
  $sql = "select * from kriteria where id_kriteria='$id'";
  $query = mysqli_query($con, $sql);
  $data = mysqli_fetch_array($query);


  if (isset($_POST['simpan'])) {

    $kriteria = $_POST['kriteria'];
    $seo = str_replace(" ", "_", $kriteria);
    $sql = "update kriteria set kriteria='$kriteria', seo='$seo' where id_kriteria='$id'";
    $query = mysqli_query($con, $sql);
    if ($query) {
      echo "<script>alert('Data berhasil diubah!');window.location.href='index.php?p=criteria'</script>";
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
              <label for="exampleInputEmail1">Kriteria</label>
              <input type="text" class="form-control input-lg" id="exampleInputEmail1" placeholder="Masukan Kriteria" name="kriteria" required value="<?= $data['kriteria'] ?>">
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