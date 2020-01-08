<?php 
$period=mysqli_query($con,"SELECT * from periode order by id_periode desc");
  $kalimat = 'Andi Pergi Ke Pasar';
    // if(preg_match("/Pergi/", $kalimat)) {
    //   echo 'Ketemu';
    // } else {
    //   echo 'Tidak Ketemu';
    // }
  
if (isset($_GET['ta'])) {
  $ta=$_GET['ta'];
  echo '';


	if (isset($_POST['simpan'])) {


      $sql = "insert into alternatif values(null, '$_POST[NIP]','$_POST[ta]', 0)";
      $con->query($sql);
      $last_id = $con->insert_id;
      $dos="UPDATE karyawan SET status='ok' where nip='$_POST[NIP]'";
      $con->query($dos);

	    $sql = "select * from kriteria";
      $query = mysqli_query($con, $sql);
      while ($row = mysqli_fetch_assoc($query)){
        $nilai = $_POST['kriteria'.$row['id_kriteria']];
        $sql = "insert into nilai_alternatif values(null, '$last_id', '$row[id_kriteria]', '$nilai', '".$_POST['ta']."')";
        mysqli_query($con, $sql);
      }

      echo "<script>alert('Data $_POST[NIP] berhasil disimpan!');window.location.href='index.php?p=alternatif&ta=$ta'</script>";

	}

 ?>
<style>
.file-drop-area {
  position: relative;
  display: flex;
  align-items: center;
  width: 450px;
  max-width: 100%;
  padding: 25px;
  border: 1px dashed #999;
  border-radius: 3px;
  transition: 0.2s;
  &.is-active {
    background-color: rgba(255, 255, 255, 0.05);
  }
}

.fake-btn {
  flex-shrink: 0;
  background-color: rgba(255, 255, 255, 0.04);
  border: 1px solid #999;
  border-radius: 3px;
  padding: 8px 15px;
  margin-right: 10px;
  font-size: 12px;
  text-transform: uppercase;
}
.file-msg {
  font-size: small;
  font-weight: 300;
  line-height: 1.4;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.file-input {
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  cursor: pointer;
  opacity: 0;
  &:focus {
    outline: none;
  }
}
</style>

<div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Penilaian</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Periode Pengajaran</label>
              <input type="text" class="form-control" name="ta" value="<?php echo $_GET['ta']; ?>" required readonly>
              <label for="exampleInputEmail1">Alternatif</label>
              <select name="NIP" id="" class="form-control" required>
                <option disabled selected>-- Pilih Alternatif --</option>
                <?php 
                //$sql = "select * from karyawan where status='$_GET[d]'";
                $sql = "SELECT * from karyawan 
                where NIP NOT IN (select NIP from alternatif where periode ='$ta')
                order by NIP
                ";
                $query = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($query)) {
                  echo "<option value=$row[NIP]>$row[NIP] - $row[nama_karyawan]</option>";
                }
               ?>
              </select>
            </div>
            <?php 

              $sql = "select * from kriteria";
              $query = mysqli_query($con, $sql);
              while ($row = mysqli_fetch_assoc($query)):
             ?>
            <div class="form-group">
              <label for="exampleInputEmail1"><?= $row['kriteria'] ?></label>
              <?php if (preg_match("/status/i", $row['kriteria'])){ ?>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan <?= $row['kriteria'] ?>" name="kriteria<?= $row['id_kriteria'] ?>" required value='5' readonly>
              <?php } else {
                $sql2 = "select * from desc_kriteria where id_kriteria='$row[id_kriteria]'";
                $query2 = mysqli_query($con, $sql2);
                $jumlah = mysqli_num_rows($query2);
                  if ($jumlah > 0) {
                    ?>
                   <!--  <input type="number" class="form-control" name="kriteria<?= $row['id_kriteria'] ?>" placeholder="Masukan Nilai" required> -->
                  <select class="form-control" name="kriteria<?= $row['id_kriteria'] ?>" required>
                    <?php 
                       while ($row2 = mysqli_fetch_assoc($query2)) {
                         echo "<option value='$row2[nilai]'>$row2[deskripsi]</option>";
                       }
                     ?>
                  </select>
                <?php
                  } else {
                    ?>
                  <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan <?= $row['kriteria'] ?>" name="kriteria<?= $row['id_kriteria'] ?>" required>
                <?php
                  }
                } 
                ?>
            </div>
            <?php endwhile; ?>
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
    <div class="col-lg-4" hidden>
        <a href="index.php?p=rank&ta=<?php echo $_GET[ta]; ?>" class="btn btn-primary" style="width: 100%"><i class="fa fa-trophy"></i> Lihat Ranking</a>
        <hr>
        <center><label>-- Atau --</label></center>
       <!--  <a href="index.php?p=alternatif&act=upload" class="btn btn-success" style="width: 100%"><i class="fa fa-upload"></i> Upload Nilai via Excel</a> -->
        <center><h2>Upload Data karyawan<br><small>Import via Excel</small></h2></center>
        
<form method="post" enctype="multipart/form-data" action="page/alternatif/import.php">

<div class="file-drop-area">
  <span class="fake-btn">Choose files</span>
  <span class="file-msg">or drag and drop files here</span>
  <input class="file-input" type="file" name="fileexcel" accept=".xls" multiple required>
  <input type="text" name="ta" value="<?php echo $_GET[ta]; ?>" hidden required>
  <input type="text" name="author" value="<?php echo $_SESSION['name']; ?>" hidden>
</div>

  <button type="submit" class="btn btn-success" value="Upload" style="width: 100%"><i class="fa fa-upload"></i> Upload</button>

</form>
</div>
    </div>
    
  </div>
  <!-- /.row -->
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script type="text/javascript">
  var $fileInput = $('.file-input');
var $droparea = $('.file-drop-area');

// highlight drag area
$fileInput.on('dragenter focus click', function() {
  $droparea.addClass('is-active');
});

// back to normal state
$fileInput.on('dragleave blur drop', function() {
  $droparea.removeClass('is-active');
});

// change inner text
$fileInput.on('change', function() {
  var filesCount = $(this)[0].files.length;
  var $textContainer = $(this).prev();

  if (filesCount === 1) {
    // if single file is selected, show file name
    var fileName = $(this).val().split('\\').pop();
    $textContainer.text(fileName);
  } else {
    // otherwise show number of files
    $textContainer.text(filesCount + ' files selected');
  }
});
</script>

<?php
}else{  
  echo '<div class="box box-primary">
        <div class="box-header with-border">
          <center>
          <h3 class="box-title">
          <form action="" method="">
          <input type="text" value="alternatif" name="p" hidden>
          <label>Periode Pengajaran: </label>
            <select class="custom-select" name="ta" required>';
            while ($per=mysqli_fetch_array($period)) {
              echo '<option  value="'.$per['periode'].'" ';
               if ($_GET['ta']== $per['periode']) {
                echo "selected";
              }else{
                echo "";
              }
            echo  '>'.$per['label'].'</option>';
            }
echo '            </select>
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
          </form>
          </h3>
          </center>
        </div>
        </div>';

}
?>