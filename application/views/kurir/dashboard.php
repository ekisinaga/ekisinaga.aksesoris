<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dasbor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div>
        </div>
      </div>
    </div>
   
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                
              <h3><?php echo $total_order; ?></h3>
                <p>Tugas</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <?php foreach ($kurir as $row) { ?>
              <a href="<?php echo site_url('kurir/dashboard/task/'.$row->id); ?>" class="small-box-footer">Lihat Order <i class="fas fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>
          
          <!-- <div class="col-lg-3 col-6"> -->
            <!-- small box -->
            <!-- <div class="small-box bg-primary">
              <div class="inner">
              <h3><?php echo $total_process_order; ?></h3>
                <p>Order dalam proses</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <?php foreach ($kurir as $row) { ?>
              <a href="<?php echo site_url('kurir/dashboard/task/'.$row->id); ?>" class="small-box-footer">Lihat Order <i class="fas fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div> -->
          <!-- </div> -->
        </div>
       
      </div>
    </section>
  </div>