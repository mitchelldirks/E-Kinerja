<?php 

  if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $sql = "delete from kriteria where id_kriteria='$id'";
    $query = mysqli_query($con, $sql);
    if ($query) {
      $sql = "TRUNCATE TABLE nilai_kriteria";
      $query = mysqli_query($con, $sql);
      if ($query) 
        echo "<script>alert('Data berhasil dihapus!');window.location.href='index.php?p=criteria'</script>";
      else
        echo mysqli_error($con);
    } else {
      echo mysqli_error($con);
    }
  }

 ?>

<div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Table With Full Features</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Id</th>
              <th>Kriteria</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            	<?php 

            		$sql = "select * from kriteria";
            		$query = mysqli_query($con, $sql);
            		while ($row = mysqli_fetch_assoc($query)):

            	 ?>
            	 <tr>
            	 	<td><?= $row['id_kriteria'] ?></td>
            	 	<td><a href="index.php?p=criteria&act=show&id=<?= $row['id_kriteria'] ?>"><?= $row['kriteria'] ?></a></td>
                <td>
                  <a href="index.php?p=criteria&act=edit&id=<?= $row['id_kriteria'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                  <a href="index.php?p=criteria&delete&id=<?= $row['id_kriteria'] ?>" class="btn btn-danger" onclick="return confirm('Jika data dihapus, maka data bobot kriteria akan direset?')"><i class="glyphicon glyphicon-trash"></i></a>
                
                </td>
            	 </tr>
            	<?php endwhile; ?>
            </tbody>
            <tfoot>
            <!-- <tr>
              <th>Id</th>
              <th>Kriteria</th>
              <th>Aksi</th>
            </tr> -->
            <tr>
              <th colspan="3">Index Criteria may vary</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->