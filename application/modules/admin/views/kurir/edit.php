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
                  <?php foreach ($kurir as $kuir) {?>
                <form action="<?php echo site_url('admin/kurir/update'); ?>" method="post">
                <input type="hidden" name="id" value="<?= $kuir->id ?>">
                <div class="form-group">
                    <label>Nama Kurir</label>
                    <input type="text" name="nama" value="<?= $kuir->nama ?>" class="form-control" id="nama" >
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="name">email</label>
                  <input type="text" name="email" value="<?= $kuir->email ?>" class="form-control" id="email" >
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="name"><span class="text-danger">*</span> password</label>
                  <input require type="password" name="password" value="" class="form-control" placeholder="masukan password lama atau baru">
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="name">telephone</label>
                  <input type="text" name="tlp" value="<?= $kuir->tlp ?>" class="form-control">
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="name">status</label>
                  <?php
                  if ($kuir->status == 1) {
                      $strus = 'active';
                  }else{
                    $strus = 'non active';
                  }
                  ?>
                    <select id="penduduk" name="status" class="form-control"> 
                    <option value="1"<?php echo ($kuir->status == 1) ? ' selected' : ''; ?>>Active</option>
                    <option value="2"<?php echo ($kuir->status == 2) ? ' selected' : ''; ?>>Libur</option>
                    </select>
                </div>
                
                <button class="btn btn-primary" type="submit">submit</button>
                </form>
                <?php } ?>
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