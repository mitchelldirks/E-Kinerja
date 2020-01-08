<?php 
if (isset($_POST['simpan'])) {
   $bulan=$_POST['bulan'];
    $tahun=$_POST['tahun'];
    $label=$tahun." ".$bulan;
    $seo=$tahun."-".$bulan;  
      $update=mysqli_query($con,"UPDATE periode set periode = '$seo', label='$label', tahun='$tahun', bulan='$bulan' where id_periode='".$_GET['id']."'");
        if ($update == TRUE) {
          echo "<script>alert('Data ".$label." Berhasil Diubah!');window.location.href='index.php?p=periode'</script>";
        }else{
          echo "<script>alert('Data ".$label." Gagal dieksekusi!');window.location.href='index.php?p=periode&act=edit&id=".$_GET['id']."'</script>";
        }
      

}
$edit=mysqli_query($con,"SELECT * from periode where id_periode = '".$_GET['id']."'");
$r=mysqli_fetch_array($edit);


 ?>
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form edit Periode <?php echo $r['bulan'].' '.$r['tahun'];?></h3>
          
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Periode</label>
              <select name="bulan" class="form-control input-lg" required>
  <option value="Januari" <?php if ($r['bulan']=='Januari') {echo "selected";}?>>Januari</option>
  <option value="Februari" <?php if ($r['bulan']=='Februari') {echo "selected";} ?>>Februari</option>
  <option value="Maret" <?php if ($r['bulan']=='Maret') {echo "selected";} ?>>Maret</option>
  <option value="April" <?php if ($r['bulan']=='April') {echo "selected";} ?>>April</option>
  <option value="Mei" <?php if ($r['bulan']=='Mei') {echo "selected";}?>>Mei</option>
  <option value="Juni" <?php if ($r['bulan']=='Juni') {echo "selected";}?>>Juni</option>
  <option value="Juli" <?php if ($r['bulan']=='Juli') {echo "selected";}?>>Juli</option>
  <option value="Agustus" <?php if ($r['bulan']=='Agustus') {echo "selected";}?>>Agustus</option>
  <option value="September" <?php if ($r['bulan']=='September') {echo "selected";}?>>September</option>
  <option value="Oktober" <?php if ($r['bulan']=='Oktober') {echo "selected";}?>>Oktober</option>
  <option value="November" <?php if ($r['bulan']=='November') {echo "selected";}?>>November</option>
  <option value="Desember" <?php if ($r['bulan']=='Desember') {echo "selected";}?>>Desember</option>


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
