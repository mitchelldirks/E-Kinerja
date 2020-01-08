<?php 
  error_reporting(0);
   // if ($_POST['Password']!=$_POST['CPassword']) {
   //     echo "<script>//alert('Password Berbeda, harap lakukan registrasi kembali');
   //     window.location.href='index.php?p=karyawan&act=create&s=dm&nip=".$_POST[NIP]."&nama=".$_POST[karyawan]."&JK=".$_POST[JK]."&uname=".$_POST[username]."&jabatan=".$_POST[jabatan]."&uname=".$_POST[username]."'</script>";
   //   }
   //   else{
      	if (isset($_POST['simpan'])) {
      		$sql = "insert into karyawan values('".$_POST[NIP]."','".$_POST[karyawan]."', '".$_POST[JK]."','".$_POST[jabatan]."','na')";
      		$query = mysqli_query($con, $sql);
      		if ($query) {
      			echo "<script>alert('Data berhasil ditambahkan!');window.location.href='index.php?p=karyawan'</script>";
      		} else {
      			echo "Error : " . mysqli_error($con);
      		}
        }
    //}

 ?>
 <style>
 .dm{
    margin:5px;
    padding: 10px;
     background: #E65E4C;
      color: white;
      border-left: #ED2B12 solid 5px;
      font-weight:35px;
   } 
   </style>

<div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form karyawan</h3>
          
        </div>
        <?php if($_GET['s']=="dm"){ echo "<div class='dm'>Password berbeda, coba lagi</div>";}else{echo"";}?>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">NIP</label>
              <input type="text" class="form-control input-lg" id="exampleInputEmail1" placeholder="Masukan NIP" name="NIP" <?php if (isset($_GET['nip'])) { echo "value='".$_GET['nip']."'";}else{echo "";} ?> required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama karyawan</label>
              <input type="text" class="form-control input-lg" id="exampleInputEmail1" placeholder="Masukan Nama karyawan" name="karyawan" <?php if (isset($_GET['nama'])) { echo "value='".$_GET['nama']."'";}else{echo "";} ?> required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Jenis Kelamin</label>
              <select class="form-control custom-select input-lg" name="JK">
                <option disabled selected>-- Pilih Gender --</option>
                <option value="Pria" <?php if($_GET[JK]=="Pria"){echo"selected";}else{echo "";} ?>>Pria</option>
                <option value="Wanita" <?php if($_GET[JK]=="Wanita"){echo"selected";}else{echo "";} ?>>Wanita</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Jabatan</label>
             <select class="form-control input-lg" name="jabatan" required>
              <option disabled selected>-- Pilih Jabatan --</option>
              <?php 
              $jabat = mysqli_query($con, "SELECT * FROM jabatan order by nama_jabatan");
              while($jab = mysqli_fetch_array($jabat)){
                $id = $jab['id'];
                $najab = $jab['nama_jabatan'];
              ?>
                <option value='<?php echo $jab['id']; ?>'><?php echo $jab['nama_jabatan']; ?></option>
              <?php } ?>
             </select>
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
    <!-- <div class="col-md-4">
      <a href="?p=karyawan&act=upload&ta=<?php echo $_GET['ta'];?>" class="btn btn-primary"><i class="fa fa-upload"></i> Import Excel File </a>
  </div> -->

  </div>



  <!-- /.row -->
  <script>
  var check = function() {
  if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
  </script>
