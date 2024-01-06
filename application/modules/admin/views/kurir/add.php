<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Header -->
    <div class="header bg-krisna pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Tambah Kurir</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="<?php echo site_url('admin/kurir'); ?>">Kurir</a></li>
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
                <h3 class="mb-0">Data Kurir</h3>
              </div>
        
              <div class="card-body">
                <form action="<?php echo site_url('admin/kurir/tambah'); ?>" method="post">
                <div class="form-group">
                    <label>Nama Kurir</label>
                    <input type="text" name="nama" value="" class="form-control" id="nama" >
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="name">email</label>
                  <input type="text" name="email" value="" class="form-control" id="email" >
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="name">password</label>
                  <input type="password" name="password" value="" class="form-control">
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="name">telephone</label>
                  <input type="text" name="tlp" value="" class="form-control">
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