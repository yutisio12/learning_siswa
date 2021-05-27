<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>

    <link href="<?= base_url('assets/bootstrap/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/bootstrap/') ?>css/sb-admin-2.min.css" rel="stylesheet">
  </head>
  <body>
    
    <div class="container">
        <div class="col">
            <br>
            <div class="col text-center">
                <h3><b>Selamat Datang</b></h3>
            </div>
            <br>
            <div class="card bg-primary">
                <form action="<?= base_url('auth/checking') ?>" method="POST">
                <div class="col">
                <br>
                    <div class="form-group">
                        <label for="" class="text-white"><b>Username :</b></label>
                        <input required class="form-control" type="text" placeholder="Username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="" class="text-white"><b>Password :</b></label>
                        <input required class="form-control" type="password" placeholder="Password" name="password">
                    </div>
                    <div class="form-group text-right">
                        <button class="btn btn-success">Login</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </footer>
    <script src="<?= base_url('assets/jquery/') ?>jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/bs/') ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/swal2/') ?>swal.js"></script>
    <script>
    <?php if(strlen($this->session->flashdata('success'))>1){ ?>
        Swal.fire({
            icon: 'success',
            title: "<?= $this->session->flashdata('success') ?>",
            showConfirmButton: false,
            timer: 1500
        })
    <?php } elseif(strlen($this->session->flashdata('warning'))>1) { ?>
        Swal.fire({
            icon: 'warning',
            title: "<?= $this->session->flashdata('warning') ?>",
            showConfirmButton: false,
            timer: 1500
        })
    <?php } ?>
    </script>
  </body>
</html>