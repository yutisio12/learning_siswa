<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>

    <link href="<?= base_url('assets/bootstrap/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/bootstrap/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/') ?>login.css" rel="stylesheet">

  </head>
  <body>
    
  <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row"></div>
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="<?= base_url('assets/images/') ?>c.png" class="image"> </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                <form action="<?= base_url('auth/checking') ?>" method="POST">

                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Username</h6>
                        </label> <input required class="mb-4" type="text" name="username" placeholder="Enter a valid username"> </div>
                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Password</h6>
                        </label> <input required type="password" name="password" placeholder="Enter password"> </div>
                    <div class="row px-3 mb-4">
                        <div class="custom-control custom-checkbox custom-control-inline"> </div>
                    </div>
                    <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Login</button> </div>
                    <div class="row mb-3 px-3">
                    <input type="button" class="btn btn-red text-center" onclick="play()" value="Help"><audio id="audio" src="<?= base_url('assets/audio/') ?>a.mpeg"></audio>
                    </div>
                    <div class="row mb-4 px-3"></div>
                </div>
                </form>
            </div>
        </div>
        <div class="bg-blue py-4">
            <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2021. All rights reserved.</small>
                <div class="social-contact ml-4 ml-sm-auto">
                
            </div>
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

<script>
      function play() {
        var audio = document.getElementById("audio");
        audio.play();
      }
    </script>
  </body>
</html>