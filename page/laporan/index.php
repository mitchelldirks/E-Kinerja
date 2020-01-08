<div class="row">
    <div class="col-xs-12">

      <div class="box box-primary box-solid">
          <div class="box-header with-border">
            <h3 class="box-title"> Vektor Pioritas</h3>
              <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div><!-- /.box-tools -->
          </div>


          <?php 
            $sql = "select * from nilai_kriteria";
            $query = mysqli_query($con, $sql);
            $jumlah = mysqli_num_rows($query);
          if ($jumlah > 0): ?>
            <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kriteria</th>
                  <?php 
                    $sql = "select * from kriteria";
                    $query = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($query);
                    while ($row = mysqli_fetch_assoc($query)):
                   ?>
                  <th><?= $row['kriteria'] ?></th>
                  <?php endwhile; ?>
                </tr>
                </thead>
                <tbody>
                  <?php 
                      $x = 1;
                      $sql = "select * from kriteria";
                      $query = mysqli_query($con, $sql);
                      $count = mysqli_num_rows($query);
                      while ($row = mysqli_fetch_assoc($query)):
                     ?>
                  <tr>
                    <td><b><?= $row['kriteria'] ?></b></td>
                    <?php 
                      for ($y=1; $y<=$count ; $y++):
                        $sql = "select * from nilai_kriteria where baris='$x' and kolom='$y'";
                        $query2 = mysqli_query($con, $sql);
                        $data = mysqli_fetch_assoc($query2);
                     ?>
                      <td><?= round($data['nilai'], 3) ?></td>
                    <?php endfor; ?>
                  </tr>
                  <?php 
                    $x++; 
                    endwhile; 
                  ?>
                  <tfoot>
                    <tr>
                      <td>Total</td>
                      <?php 
                          $i = 1;
                          $total = [];
                          $sql = "SELECT SUM(nilai) as nilai FROM `nilai_kriteria` GROUP BY kolom";
                          $query = mysqli_query($con, $sql);
                          while ($row = mysqli_fetch_assoc($query)):
                            $total[$i] = $row['nilai'];
                       ?>
                       <td><b><?= round($row['nilai'], 3) ?></b></td>
                      <?php $i++; endwhile; ?>
                    </tr>
                  </tfoot>
                </tbody>
                
              </table>
              
              <?php echo "<br><br>"; ?>
              <h4><b>Normalisasi</b></h4>
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kriteria</th>
                  <?php 
                    $sql = "select * from kriteria";
                    $query = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($query);
                    while ($row = mysqli_fetch_assoc($query)):
                   ?>
                  <th><?= $row['kriteria'] ?></th>
                  <?php endwhile; ?>
                </tr>
                </thead>
                <tbody>
                  <?php 
                      $x = 1;
                      $sql = "select * from kriteria";
                      $query = mysqli_query($con, $sql);
                      $count = mysqli_num_rows($query);
                      while ($row = mysqli_fetch_assoc($query)):
                     ?>
                  <tr>
                    <td><b><?= $row['kriteria'] ?></b></td>
                    <?php 
                      for ($y=1; $y<=$count ; $y++):
                        $sql = "select * from nilai_kriteria where baris='$x' and kolom='$y'";
                        $query2 = mysqli_query($con, $sql);
                        $data = mysqli_fetch_assoc($query2);
                     ?>
                      <td><?= round($data['nilai']/$total[$y], 3) ?></td>
                    <?php endfor; ?>
                  </tr>
                  <?php 
                    $x++; 
                    endwhile; 
                  ?>
                </tbody>
                
              </table>
            </div>

          <?php endif; ?>
      </div>
      <!-- /.box -->

      <div class="box box-primary box-solid">
          <div class="box-header with-border">
            <h3 class="box-title"> Perhitungan TFN Matriks</h3>
              <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div><!-- /.box-tools -->
          </div>
          
          <?php 
            $sql = "select * from nilai_kriteria";
            $query = mysqli_query($con, $sql);
            $jumlah = mysqli_num_rows($query);
          if ($jumlah > 0): ?>
            
            <div class="box-body table-responsive">
              <h4><b>Nilai TFN</b></h4>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th rowspan="2" align="center" class="text-center" style="width: 10%;"><p>TFN</p></th>
                  <?php 
                    $sql = "select * from kriteria";
                    $query = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($query);
                    while ($row = mysqli_fetch_assoc($query)):
                   ?>
                   <?php $persen=90/$count; ?>
                  <th colspan="3" align="center" class="text-center" style="width: <?= $persen ?>%"><?= $row['kriteria'] ?></th>
                  <?php endwhile; ?>
                </tr>
                <tr>
                  <?php 
                      for ($i=0; $i<$count; $i++):
                   ?>
                    <th align="center" class="text-center">I</th>
                    <th class="text-center">M</th>
                    <th class="text-center">U</th>
                  <?php endfor; ?>
                </tr>
                </thead>
                <tbody>
                  <?php 
                      $x = 1;
                      $sql = "select * from kriteria";
                      $query = mysqli_query($con, $sql);
                      $count = mysqli_num_rows($query);
                      while ($row = mysqli_fetch_assoc($query)):
                     ?>
                  <tr>
                    <td><b><?= $row['kriteria'] ?></b></td>
                    <?php 
                      
                      for ($y=1; $y<=$count ; $y++):
                        $sql = "select * from nilai_kriteria where baris='$x' and kolom='$y'";
                        $query2 = mysqli_query($con, $sql);
                        $data = mysqli_fetch_assoc($query2);
                        
                     ?>
                      <td align="center">
                        <?php 
                          
                            if ($data['kolom'] >= $x){
                              if ($data['nilai'] == 1) {
                                echo "1";
                              } else {
                                echo $data['nilai'] - 1;
                              }
                            }else {
                              $sql3 = "select * from nilai_kriteria where baris='$data[kolom]' and kolom='$data[baris]'";
                              $query3 = mysqli_query($con, $sql3);
                              $fetch3 = mysqli_fetch_assoc($query3);
                              $nilai3 = 1;
                              if ($fetch3['nilai'] != 1)
                                $nilai3 = $fetch3['nilai'] + 1;

                              $nilai3 = round(1/$nilai3, 2);
                              echo "<p style='background-color:#7befb2;color:white;'>$nilai3</p>";
                            }

                        ?>
                      </td>
                      <td align="center">
                        <?php  
                            $m = round($data['nilai'], 2);
                            if ($data['kolom'] < $x){
                              echo "<p style='background-color:#7befb2;color:white;'>$m</p>";
                            } else {
                              echo $m;
                            }
                        ?>  
                        </td>
                      <td align="center">
                        <?php 
                          
                            if ($data['kolom'] >= $x){
                              if ($data['nilai'] == 1) {
                                echo "1";
                              } else {
                                echo $data['nilai'] + 1;
                              }
                            }else {
                              $sql3 = "select * from nilai_kriteria where baris='$data[kolom]' and kolom='$data[baris]'";
                              $query3 = mysqli_query($con, $sql3);
                              $fetch3 = mysqli_fetch_assoc($query3);
                              $nilai3 = 1;
                              if ($fetch3['nilai'] != 1)
                                $nilai3 = $fetch3['nilai'] - 1;

                              $nilai3 = round(1/$nilai3, 2);
                              echo "<p style='background-color:#7befb2;color:white;'>$nilai3</p>";
                            }

                        ?>
                      </td>
                    <?php endfor; ?>
                  </tr>
                  <?php 
                    $x++; 
                    endwhile; 
                  ?>
                </tbody>
              </table>

              <!-- <br><br>

              <h4><b>Nilai Inverst dan Matriks Berpasangan</b></h4>
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>  
                    <th></th>
                    <th class="text-center">I</th>
                    <th class="text-center">M</th>
                    <th class="text-center">U</th>
                  </tr>
                </thead>
                <tbody> 
                    <?php   
                          $x = 1;
                          $sql = "select * from kriteria";
                          $query = mysqli_query($con, $sql);
                          $count = mysqli_num_rows($query);
                          while ($row = mysqli_fetch_assoc($query)):
                     ?>
                     <tr> 
                        <td><?= $row['kriteria'] ?></td>
                        <td class="text-center">
                          <?php
                          $total = 0;
                              for ($y=1; $y<=$count ; $y++){
                                  $sql = "select * from nilai_kriteria where baris='$x' and kolom='$y'";
                                  $query2 = mysqli_query($con, $sql);
                                  $data = mysqli_fetch_assoc($query2);   

                                    $nilai = 0;
                                  if ($data['kolom'] >= $x){
                                    if ($data['nilai'] == 1) {
                                      $nilai = 1;
                                    } else {
                                      $nilai = $data['nilai'] - 1;
                                    }
                                  }else {
                                    $sql3 = "select * from nilai_kriteria where baris='$data[kolom]' and kolom='$data[baris]'";
                                    $query3 = mysqli_query($con, $sql3);
                                    $fetch3 = mysqli_fetch_assoc($query3);
                                    $nilai3 = 1;
                                    if ($fetch3['nilai'] != 1)
                                      $nilai3 = $fetch3['nilai'] + 1;

                                      $nilai3 = round(1/$nilai3, 3);
                                    $nilai = $nilai3;
                                  }   
                                  $total = $total + $nilai;
                            }
                            echo round($total, 2);
                           ?>
                        </td>
                        <td class="text-center">
                          <?php
                              $total = 0;
                              for ($y=1; $y<=$count ; $y++){
                                  $sql = "select * from nilai_kriteria where baris='$x' and kolom='$y'";
                                  $query2 = mysqli_query($con, $sql);
                                  $data = mysqli_fetch_assoc($query2);   

                                    $nilai = 0;
                                     $nilai = round($data['nilai'], 2);
                                
                                  $total = $total + $nilai;
                                  // echo $nilai." ";
                            }
                            echo round($total, 2);
                           ?>
                        </td>
                        <td class="text-center">
                          <?php
                          $total = 0;
                              for ($y=1; $y<=$count ; $y++){
                                  $sql = "select * from nilai_kriteria where baris='$x' and kolom='$y'";
                                  $query2 = mysqli_query($con, $sql);
                                  $data = mysqli_fetch_assoc($query2);   

                                    $nilai = 0;
                                  if ($data['kolom'] >= $x){
                                      if ($data['nilai'] == 1) {
                                        $nilai = 1;
                                      } else {
                                        $nilai = $data['nilai'] + 1;
                                      }
                                    }else {
                                      $sql3 = "select * from nilai_kriteria where baris='$data[kolom]' and kolom='$data[baris]'";
                                      $query3 = mysqli_query($con, $sql3);
                                      $fetch3 = mysqli_fetch_assoc($query3);
                                      $nilai3 = 1;
                                      if ($fetch3['nilai'] != 1)
                                        $nilai3 = $fetch3['nilai'] - 1;

                                      $nilai3 = round(1/$nilai3, 3);
                                      $nilai = $nilai3;
                                    }   
                                  $total = $total + $nilai;
                                  // echo $nilai." ";
                            }
                            echo round($total, 2);
                           ?>
                        </td>
                     </tr>
                    <?php $x++; endwhile; ?>
                </tbody>
              </table>
 -->
              <br><br>

              <h4><b>Nilai Bobot</b></h4>
              <table class="table table-bordered table-striped">
                <tbody>
                  <tr>
                    <th class="text-center">Kriteria</th>
                    <?php 
                        $sql = "select * from kriteria";
                        $query = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($query)) {
                          echo "<th>$row[kriteria]</th>";
                        }
                     ?>
                  </tr>
                </tbody>
                <body>
                  <?php 
                        $nilaibobot = [];
                        $x = 1;
                        $sql = "select * from kriteria";
                        $query = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($query);
                        for ($i=1; $i <= $count; $i++) { 
                          $nilaibobot[$i] = 0;
                        }
                        while ($row = mysqli_fetch_assoc($query)) :
                     ?>
                  <tr>
                    <td><b><?= $row['kriteria'] ?></b></td>
                    <?php 
                        for ($y=1; $y <=$count ; $y++) { 
                          $sql = "select * from nilai_kriteria where baris='$x' and kolom='$y'";
                          $query2 = mysqli_query($con, $sql);
                          $data = mysqli_fetch_assoc($query2);
                          if ($data['nilai'] == 1)
                            echo "<td>1</td>";
                          else{
                            $b = 0;
                            $c = 0;
                            $d = 0;
                            if ($data['kolom'] >= $x){
                              if ($data['nilai'] == 1) {
                                $b = 1;
                                $d = 1;
                              } else {
                                $b = $data['nilai'] - 1;
                                $d = $data['nilai'] + 1;
                              }
                              $c = $data['nilai'];
                            }else {
                              $c = round($data['nilai'], 2);
                              $sql3 = "select * from nilai_kriteria where baris='$data[kolom]' and kolom='$data[baris]'";
                              $query3 = mysqli_query($con, $sql3);
                              $fetch3 = mysqli_fetch_assoc($query3);
                              $nilai3 = 1;
                              $nilai4 = 1;
                              if ($fetch3['nilai'] != 1){
                                $nilai3 = $fetch3['nilai'] + 1;
                                $nilai4 = $fetch3['nilai'] - 1;
                              }

                              $nilai3 = round(1/$nilai3, 2);
                              $nilai4 = round(1/$nilai4, 2);
                              $b = $nilai3;
                              $d = $nilai4;
                            }
                            $bobot = round($b-$d/($c-$d)-($c-$b), 2);
                            // echo "<td>$b-$d ($c-$d)-($c-$b) </td>";
                            $nilaibobot[$y] = $bobot + $nilaibobot[$y];
                            echo "<td>$bobot</td>";                            

                          }
                        }
                     ?>
                  </tr>
                <?php $x++; endwhile; ?>
                </body>
                <tfoot>
                  <tr>
                    <th>Bobot</th>
                    <?php 
                        $x = 1;
                        for ($i=1; $i <= $count ; $i++) { 
                          $nilai = $nilaibobot[$i];
                          $nilai=round(($nilai+1)/$count, 2);
                          echo "<th>$nilai</th>";
                        }
                     ?>
                  </tr>
                </tfoot>
              </table>
              
            </div>

            <?php endif ?>
      </div>
      <!-- /.box -->


      


    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->