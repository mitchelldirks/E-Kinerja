<?php 
  if (isset($_POST['simpan'])) {
    $bulan=$_POST['bulan'];
    $tahun=$_POST['tahun'];
    //$akhir=$_POST['tahun_akhir'];
    //$cek=$akhir-$tahun;
    //if ($cek == 1) {
      $label=$tahun." ".$bulan;
      $seo=$tahun."-".$bulan;  
      $cekagy=mysqli_query($con,"SELECT * from periode where label like '".$label."'");
      if (mysqli_num_rows($cekagy) > 0) {
        echo "<script>alert('Data ".$label." Sudah Tersedia!');window.location.href='index.php?p=periode'</script>";
      }else{
        $input=mysqli_query($con,"INSERT INTO periode values (null, '$seo','$label','$tahun','$bulan')");
        if ($input == TRUE) {
          echo "<script>alert('Data ".$label." Berhasil Ditambahkan!');window.location.href='index.php?p=periode'</script>";
        }else{
          echo "<script>alert('Data ".$label." Gagal dieksekusi!');window.location.href='index.php?p=periode&act=create'</script>";
        }
      }

    // }else{
    //   echo "<script>alert('Tahun Ajaran Salah!');window.location.href='index.php?p=periode&act=create'</script>";
    // }

    
  }

 ?>
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form input Periode</h3>
          
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Periode</label>
              <select name="bulan" class="form-control input-lg" required>
                <option value="Januari" <?php if (date('m')==1) {echo "selected";}?>>Januari</option>
                <option value="Februari" <?php if (date('m')==2) {echo "selected";} ?>>Februari</option>
                <option value="Maret" <?php if (date('m')==3) {echo "selected";} ?>>Maret</option>
                <option value="April" <?php if (date('m')==4) {echo "selected";} ?>>April</option>
                <option value="Mei" <?php if (date('m')==5) {echo "selected";}?>>Mei</option>
                <option value="Juni" <?php if (date('m')==6) {echo "selected";}?>>Juni</option>
                <option value="Juli" <?php if (date('m')==7) {echo "selected";}?>>Juli</option>
                <option value="Agustus" <?php if (date('m')==8) {echo "selected";}?>>Agustus</option>
                <option value="September" <?php if (date('m')==9) {echo "selected";}?>>September</option>
                <option value="Oktober" <?php if (date('m')==10) {echo "selected";}?>>Oktober</option>
                <option value="November" <?php if (date('m')==11) {echo "selected";}?>>November</option>
                <option value="Desember" <?php if (date('m')==12) {echo "selected";}?>>Desember</option>


              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Tahun</label>
              <input type="number" class="form-control input-lg" id="exampleInputEmail1" placeholder="Tahun tahun" name="tahun" value="<?php echo date('Y'); ?>" required>
              
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

  </div>
