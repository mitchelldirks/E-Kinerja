<?php 

  if (isset($_POST['simpan'])) {

    $kriteria = $_POST['kriteria'];
    $ktr=$kriteria;
    $seo = str_replace(" ", "_", $ktr);

    $sql = "insert into kriteria values(null, '$kriteria','$seo')";
    $con->query($sql);
    $insert_id =  $con->insert_id;

    $count =  $_POST['countSkor'];
    for ($i = 1; $i <= $count; $i++) {
      $deskripsi = $_POST['deskripsi'.$i];
      $nilai = $_POST['nilai'.$i];
      
      $sql = "insert into desc_kriteria values(null, '$insert_id', '$deskripsi', '$nilai')";
      mysqli_query($con, $sql);
    }

    echo "<script>alert('Data berhasil ditambahkan!');window.location.href='index.php?p=bobot'</script>";
  }

 ?>


  <script>
      var id = 0;
  </script>

<div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Kriteria</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Kriteria</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Kriteria" name="kriteria" required>
            </div>
            <h4 style="margin-top: 40px;" id="text">Pemberian Nilai</h4>
            <div class="form-group" id="addElement">
              <div class="col-md-12">
                <!-- <div class="col-md-8">
                  <input type="text" class="form-control" placeholder="Deskripsi" name="deskripsi1" required>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" placeholder="Nilai" name="nilai1" required>
                </div> -->
                <!-- Jumlah data skor -->
                <input type="hidden" name="countSkor" value="0" id="countAnswer">
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="button" class="btn btn-primary" name="simpan" id="btnAdd">Tambah Deskripsi</button>
            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.box -->


    </div>
    <!--/.col (left) -->
    
  </div>
  <!-- /.row -->

  <script src="assets/jquery.js"></script>
      <script>
        $("#text").hide();

        $("#btnAdd").click(function(){
          $("#text").show();
          
          id++;
          var deskripsi   = "deskripsi"+id;
          var dataawal    = "nilai"+id;
          var konversi    = "konversi"+id;

          var scr = "<div class='col-md-12' style='margin-top:5px'><div class='col-md-8'><input type='text' class='form-control' placeholder='Deskripsi' name='"+ deskripsi +"' required></div><div class='col-md-4'><input type='number' class='form-control' placeholder='Nilai' name='"+ dataawal +"' required></div></div></div>";

          $("#addElement").append(scr);
          $("#countAnswer").val(id);
        })
      </script>