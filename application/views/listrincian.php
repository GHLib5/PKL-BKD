<?php 
    require_once('templates/session.php');
?>
<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view("templates/auth_header") ?>
<body id="page-top">
  <div id="wrapper">
    <?php $this->load->view("templates/auth_sidebar") ?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
    
      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php $this->load->view("templates/auth_topbar") ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <?=$this->session->flashdata('message');?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Rincian SPPD</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                  <col width="15%">
                  <col width="25%">
                  <col width="38%">
                  <col width="22%">
                  <thead>
                    <tr>
                      <th>Nomor Surat Tugas</th>
                      <th>Pegawai diperintah</th>
                      <th>Maksud</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    foreach($list as $li){
                      echo "<tr style='font-size:13px;'>
                            <td>800/" .$li->ID_ST."/35.73.403/".date("Y")."</td>
                            <td>" .$li->NAMA."</td>
                            <td>" .$li->TUJUAN." </td>
                            <td><a href=\"".site_url("sppdController/rincian/").$li->ID_SPPD."\" class=\"d-none d-sm-inline-block btn btn-sm btn-info\"><i class=\"fas fa-sm fa-edit\"></i> Edit </a>"; 
                            ?>
                            <a href="<?php echo site_url('sppdController/exportRincianPeserta/'.$li->ID_SPPD);?>"  class="d-none d-sm-inline-block btn btn-sm btn-success">
                            <i class="fas fa-sm  fa-download "></i> Rincian Peserta </a>
                            <br><br>
                            <a href="<?php echo site_url('sppdController/exportRincianNominatif/'.$li->ID_SPPD);?>"  class="d-none d-sm-inline-block btn btn-sm btn-success">
                            <i class="fas fa-sm  fa-download "></i> Nominatif </a>

                            </td>
                            </tr>
                            <?php
                            
                    }
                  ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
                    
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php $this->load->view("templates/auth_footer") ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">

          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?=base_url('auth/logout');?>">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <select>
  <option>Choose Your Name</option>
  <option>Frank</option>
  <option>George</option>
  <option>Other</option>
</select>
<label id="tes" style="display:none;">Enter your Name
<input>
</label>



</body>

</html>
<script>
  $(document).ready(function(){
    $('select').change(function(){
        if($('select option:selected').text() == "George"){
        $('#tes').show();
        }
        else{
        $('#tes').hide();
        }
    })
});
</script>