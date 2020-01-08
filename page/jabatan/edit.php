<?php 
  if (isset($_POST['simpan'])) {
    $NJ=$_POST['NJ'];
    $JD=$_POST['JD'];
    $id=$_POST['id'];
    $update=mysqli_query($con,"UPDATE jabatan set nama_jabatan = '$NJ', job_desc='$JD' where id='$id'");
        if ($update) {
      echo "<script>alert('Data ".$label." Berhasil Diubah!');window.location.href='index.php?p=jabatan'</script>";
        }else{
      echo "<script>alert('Data ".$label." Gagal dieksekusi!');window.location.href='index.php?p=jabatan&act=edit&id=".$_GET['id']."'</script>";
        }
  }
$edit=mysqli_query($con,"SELECT * from jabatan where id = '".$_GET['id']."'");
$r=mysqli_fetch_array($edit);


 ?>
 <style type="text/css">
   #textarea{
    height: 250px;
   }
 </style>
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form edit jabatan</h3>
          
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post">
          <input type="text" name="id" hidden value="<?php echo $_GET['id']; ?>">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Jabatan</label>
              <input type="text" name="NJ" value="<?php echo $r['nama_jabatan']; ?>" class="form-control input-lg"  <?php if (isset($_GET['n'])) {echo "readonly";} ?>>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Job Description</label>
              <textarea name="JD" placeholder="Masukan Job Description" class="form-control input-lg" id="textarea" <?php if (isset($_GET['n'])) {echo "readonly";} ?> ><?=$r['job_desc']?></textarea>
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
