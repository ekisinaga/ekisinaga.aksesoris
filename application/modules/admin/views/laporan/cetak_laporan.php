<!doctype html>
<html lang="en" class="h-100">
  <head>
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  <style>

.judul-surat{
    font-size: 13pt;
}

.full-width {
    width : 100%;
}

.line   {
    height: 2px;
    /* border-top : 4px solid #000; */
    border-bottom : 2px solid #000
}

.m-0 {
    margin : 0;

}

.mt-0 {
    margin-top : 0 !important
}
.mb-0 {
    margin-bottom : 0 !important
}

@page {
    margin : 1cm 1.5cm
}

p {
    line-height: 1.3
}

.tab-space {
    display: inline-block;
    width: 40px;
}
</style>
  </head>
    <body>
<?php if (count($orders) > 0) : ?>
  <div class="card-header ">
    <h3>LAPORAN BULANAN TOKO ADIT ACCESORIES</h3>
  </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Customer</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jumlah Item</th>
                    <th scope="col">Jumlah Harga</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($orders as $order) : ?>
                    <tr>
                      <td><?php echo $order->customer; ?></td>
                      <td>
                        <?php echo get_formatted_date($order->order_date); ?>
                      </td>
                      <td>
                        <?php echo $order->total_items; ?>
                      </td>
                      <td>
                        Rp <?php echo format_rupiah($order->total_price); ?>
                      </td>
                      <td><?php echo get_order_status($order->order_status, $order->payment_method); ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="card-footer">
           
          </div>
        <?php else : ?>
          <div class="card-body">
            <div class="alert alert-primary">
              Belum ada order
            </div>
          </div>
        <?php endif; ?>

    <script>
        window.print()
    </script>
    </body>
    </html>
