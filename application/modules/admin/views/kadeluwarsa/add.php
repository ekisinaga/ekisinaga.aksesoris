<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Header -->
    <div class="header bg-info pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Tambah Produk</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="<?php echo site_url('admin/products'); ?>">Produk</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tambah</li>
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
        <div class="col-md-8">
          <div class="card-wrapper">
            <div class="card">
              <div class="card-header">
                <h3 class="mb-0">Data Produk Kadeluwarsa</h3>
              </div>
        
              <div class="card-body">
                <form action="<?php echo site_url('admin/kadeluwarsa/tambah'); ?>" method="post">
                <div class="form-group">
                    <label>Nama produk</label>
                    <select id="penduduk" name="id_product" class="form-control"> 
                    <?php foreach ($product as $rowa) { ?>
                    <option value="<?= $rowa->id; ?>"><?= $rowa->name; ?></option>    
                    <?php } ?>
                    </select>
                    
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="name">Tanggal Kadeluwarsa</label>
                  <input type="date" name="date" value="" class="form-control" id="date" >
                </div>
                <button class="btn btn-primary" type="submit">submit</button>
                </form>
              </div>
              
            </div>
            
          </div>

        </div>
      </div>
    <script type="text/javascript">
 $(document).ready(function() {
     $('#penduduk').select2({
      placeholder: 'Pilih product',
      allowClear: true
     });
 });
</script>