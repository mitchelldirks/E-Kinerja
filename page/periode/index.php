
<?php 

  if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $sql = "delete from periode where id_periode='$id'";
    $query = mysqli_query($con, $sql);
    if ($query) {
      echo "<script>alert('Data berhasil dihapus!');window.location.href='index.php?p=periode'</script>";
    } else {
      echo mysqli_error($con);
    }
  }

 ?>

<div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Periode Penilaian</h3><h3 class="box-title pull-right"><a href="?p=periode&act=create" class="btn btn-success"><i class="fa fa-user"></i> Tambah Data periode</a></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Periode Ajaran</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            	<?php 

            		$sql = "SELECT * from periode order by label DESC";
            		$query = mysqli_query($con, $sql);
            		while ($row = mysqli_fetch_assoc($query)):

            	 ?>
            	 <tr>
            	 	<td><?= $row['label'] ?></td>
                <td>
                  <a href="index.php?p=periode&act=edit&id=<?= $row['id_periode'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                  <a href="index.php?p=periode&delete&id=<?= $row['id_periode'] ?>" class="btn btn-danger" onclick="return confirm('Apakah data akan dihapus?')"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            	 </tr>
            	<?php endwhile; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->