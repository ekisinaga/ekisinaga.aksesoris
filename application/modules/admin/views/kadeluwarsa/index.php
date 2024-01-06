<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Header -->
<div class="header bg-info pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Kelola Product Kadeluwarsa</h6>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Order</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
       
      <div class="card">
        <!-- Card header -->
        <div class="card-header"> 
            <div class="col-lg-12 col-12 text-right">
              <a href="<?php echo site_url('admin/kadeluwarsa/add'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> ADD</a>
            </div>
          <h3 class="mb-0">Kelola Product</h3>
        </div>
        

        <?php if (count($kadeluwarsa ) > 0) : ?>
          <div class="card-body p-0">
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Tanggal Kadeluwarsa</th>
                    <th><th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach($ferdinan as $kimochi) {?>
                    <?php $namaproduk = $this->db->where('id', $kimochi->id_product)->get('products')->result(); 
                    foreach($namaproduk as $ki) {
                      $namap = $ki->name;
                    }
                    ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td>
                      <?=  $namap ?>
                      </td>
                      <td>
                      <?= $kimochi->tanggal_kadeluwarsa ?>
                      </td>
                      <td>
                        
                          <a href="<?php echo site_url('admin/kadeluwarsa/hapus/').$kimochi->id; ?>" class="btn btn-danger">Hapus</a>
                        
                      <a href="<?php echo site_url('admin/kadeluwarsa/edit/').$kimochi->id; ?>" class="btn btn-warning">Edit</a>
                      </td>
                    </tr>
                    <?php }?>
                </tbody>
              </table>
            </div>
          </div>

        <?php else : ?>
          <div class="card-body">
            <div class="alert alert-primary">
              Belum ada order
            </div>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </div>