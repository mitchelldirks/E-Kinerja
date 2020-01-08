<?php 

  if (isset($_GET['delete'])) {
    $sql = "truncate table nilai_kriteria";
    $query = mysqli_query($con, $sql);
    if ($query) {
      echo "<script>alert('Data telah dihapus!');window.location.href='index.php?p=bobot'</script>";
    }else {
      echo mysqli_error($con);
    }
  }

  $sql = "select * from kriteria";
  $query = mysqli_query($con, $sql);
  $count = mysqli_num_rows($query);

  if (isset($_POST['simpan'])) {
    $insum=0;
    for ($i=1; $i <= $count; $i++) { 
      $nilai=$_POST['input'.$i];
      $insum=$insum+$nilai;
    }
    if ($insum!=100) {
       echo "<script>alert('Bobot tidak 100% harap cek kembali');window.location.href='index.php?p=bobot'</script>";
       break;
    }

    $i=0;
    while ($row=mysqli_fetch_array($query)) {
      $i++;
      $id=$row['id_kriteria'];
      $nilai=$_POST['input'.$i];
      $sql = "INSERT into nilai_kriteria values(null, '$id', '$nilai')";
         mysqli_query($con, $sql);
    
    }
    echo "<script>alert('Data berhasil disimpan!');window.location.href='index.php?p=bobot'</script>";
  }

  $query = mysqli_query($con, "select * from nilai_kriteria");
  $sudah_isi = mysqli_num_rows($query);

 ?>
<div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Pembobotan Kriteria<br><small>Dalam Persen %</small></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

    <?php if ($sudah_isi == 0): ?>
        <form method="post">
          <table class="table table-bordered table-striped">
            <thead>
            <tr>
              <?php 
                $sql = "select * from kriteria";
                $query = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($query)):
               ?>
              <th><?= $row['kriteria'] ?></th>
              <?php endwhile; ?>
            </tr>
            </thead>
            <tbody>
              <tr>
            	<?php 
                  $sql = "select * from kriteria";
                  $query = mysqli_query($con, $sql);
                  $count = mysqli_num_rows($query);
                  while ($row = mysqli_fetch_assoc($query)):
                    $id = $row['id_kriteria'];
                 ?>
              
                <td><input id="input<?= $id;?>" type="number" style="width: 90%;" name="input<?php echo $id; ?>"></td>
                
              
              <?php 
                endwhile; 
              ?>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="<?= $count + 1 ?>" align="right">
                  <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </td>
              </tr>
            </tfoot>
          </table>
        </form>
    <?php else: ?>
      <table class="table table-bordered table-striped">
            <thead>
            <tr>
              <?php 
                $sql = "select * from kriteria";
                $query = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($query)):
               ?>
              <th><?= $row['kriteria'] ?></th>
              <?php endwhile; ?>
            </tr>
            </thead>
            <tbody>
                <tr>
              <?php 
                  $sql = "select * from kriteria";
                  $query = mysqli_query($con, $sql);
                  $count = mysqli_num_rows($query);
                  while ($row = mysqli_fetch_assoc($query)):
                    $id = $row['id_kriteria'];
                    $sql = "SELECT * FROM nilai_kriteria";
                    $query = mysqli_query($con, $sql);
                    while ($n=mysqli_fetch_array($query)) {?>
                <td><?= $n['nilai']?></td>
                  <?php }  ?>
                
                
              
              <?php 
                endwhile; 
              ?>
              </tr>
            </tbody>

              <tfoot>
                <tr>
                  <th colspan="<?= ($count-1) ?>"><span class="pull-right">Total</span></th>
                  <?php 
                      $i = 1;
                      $sql = "SELECT SUM(nilai) as nilai FROM `nilai_kriteria`";
                      $query = mysqli_query($con, $sql);
                      while ($row = mysqli_fetch_array($query)):
                   ?>
                   <td><?= round($row['nilai'], 3) ?></td>
                  <?php $i++; endwhile; ?>
                </tr>
                <tr>
                  <td colspan="<?= ($count+1) ?>" align="right">
                    <a href="index.php?p=bobot&delete" class="btn btn-danger" onclick="return confirm('Semua nilai akan terhapus, Ingin melanjutkan?')">Hapus</a>
                  </td>
                </tr>
              </tfoot>
            
          </table>
    <?php endif; ?>
        

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <script type="text/javascript">
    <?php 
    $sql = "select * from kriteria";
    $query = mysqli_query($con, $sql);
    $count = mysqli_num_rows($query);
     ?>
     var sum = 0
     var plus = 0
     for (var i = 1;i <= <?= $count ?>; i++) {
      plus=$('#input').val()
      sum=sum+sum
     }

     if (sum!=100) {
      alert('Nilai Tidak 100%');
     }

    <?php?>
  </script>