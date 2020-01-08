<?php
        $sql = "DELETE FROM temp WHERE periode = '".$_GET['ta']."'";
        $query = mysqli_query($con, $sql);
        if ($query){
            echo "<script>alert('Data telah direset ulang');window.location.href='index.php?p=fuzzy-upload'</script>";
        }
        else{
          echo mysqli_error($con);
      }

      
?>