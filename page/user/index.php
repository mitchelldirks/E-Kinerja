<?php 
  if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $sql = "delete from user where id_user='$id'";
    $query = mysqli_query($con, $sql);
    if ($query) {
      echo "<script>alert('Data berhasil dihapus!');window.location.href='index.php?p=user'</script>";
    } else {
      echo mysqli_error($con);
    }
  }
 ?>

<div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Table With Full Features</h3><span class="pull-right"><a class="btn btn-success" href="?p=user&act=create">Tambah Data User</a></span>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Username</th>
              <!-- <th>Password</th> -->
              <!-- <th>Peran</th> -->
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            	<?php 

                $no = 0;
            		$sql = "select * from user";
            		$query = mysqli_query($con, $sql);
            		while ($row = mysqli_fetch_assoc($query)):
                  $no++;
            	 ?>
            	 <tr>
            	 	<td><?= $no ?></td>
            	 	<td><?= $row['nama'] ?></td>
                <td><?= $row['username'] ?></td>
                <!-- <td><?= $row['password'] ?></td> -->
                <!-- <td><?= $row['peran'] ?></td> -->
                <td>
                  <a href="index.php?p=user&act=edit&id=<?= $row['id_user'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                  <a href="index.php?p=user&delete&id=<?= $row['id_user'] ?>" class="btn btn-danger" onclick="return confirm('Apakah data akan dihapus?')"><i class="glyphicon glyphicon-trash"></i></a>
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