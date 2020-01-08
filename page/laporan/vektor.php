<div class="row">
    <div class="col-xs-12">

      <div class="box box-primary box-solid">
          <div class="box-header with-border">
            <h3 class="box-title"> Alternatif Promosi</h3>
              <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div><!-- /.box-tools -->
          </div>

            <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                  <?php
                  $sql = "select * from kriteria";
                  $query = mysqli_query($con, $sql);
                  ?>
                    <tr>
                        <th>No</th>
                        <th>Nama Alternatif</th>
                       <?php while($row = mysqli_fetch_array($query)) {?>
                            <td><?php echo $row['kriteria']; ?></td>
                      <?php
                            }?>
                    </tr>

                    <?php 
                      $no = 0;
                      $sql = "select * from alternatif";
                      $query = mysqli_query($con, $sql);
                      while ($row = mysqli_fetch_assoc($query)):
                        $no++;
                     ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= $row['nama_alternatif'] ?></td>
                      <?php
                        $sql2 = "select * from kriteria";
                        $query2 = mysqli_query($con, $sql2);
                        while ($row2 = mysqli_fetch_assoc($query2)) {
                          $sql3 = "select * from nilai_alternatif where id_alternatif='$row[id_alternatif]' and id_kriteria='$row2[id_kriteria]'";
                          $query3 = $con->query($sql3);
                          $fetch = mysqli_fetch_array($query3);
                          echo "<td>$fetch[nilai]</td>";
                        }
                        ?>  
                    </tr>
                    <?php endwhile; ?>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div>
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->