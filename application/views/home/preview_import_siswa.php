    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="text-black">Preview Data Siswa</h3>
            </div>
            <br>
            <form action="<?= base_url('home/process_import_siswa') ?>" method="POST">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>NIP</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Kelas</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($sheet as $key => $value) { ?>
                        <?php 
                            if($key>1){ 

                                if($cek_kelas[$value['E']]!=1){
                                    $status = 'Kelas Tidak Ditemukan/Kode Kelas Belum Terdaftar!';
                                    $disable = 'disabled';
                                }

                                if($nip_terdaftar[$value['B']]==1){
                                    $status = 'NIP yang dimasukkan, telah terdaftar!';
                                    $disable = 'disabled';
                                }

                                $nips[] = $value['B'];

                                if ( count( $nips ) !== count( array_unique( $nips ) ) ){
                                    $status = 'Terdapat Duplikat NIP!';
                                    $disable = 'disabled';
                                };
                        ?>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="nama[]" value="<?= $value['A'] ?>" <?= $disable ?>>  
                            </td>

                            <td>
                                <input type="text" class="form-control" name="nip[]" value="<?= $value['B'] ?>" <?= $disable ?>>    
                            </td>

                            <td>
                                <input type="text" class="form-control" name="alamat[]" value="<?= $value['C'] ?>" <?= $disable ?>>   
                            </td>

                            <td>
                                <input type="text" class="form-control" name="telepon[]" value="<?= $value['D'] ?>" <?= $disable ?>>    
                            </td>

                            <td>
                                <input type="text" class="form-control" name="kelas_view" value="<?= $kelas[$value['E']] ?>" readonly <?= $disable ?>> 
                                <input type="hidden" class="form-control" name="kelas[]" value="<?= $value['E'] ?>" readonly <?= $disable ?>> 
                            </td>

                            <td>
                                <?= $status ?>
                            </td>
                        </tr>
                        <?php } ?>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="text-right">
                    <?php if($status){ ?>
                        <span class="btn btn-danger"><i class="fas fa-info"></i> Please Check Error Status</span>
                    <?php } else { ?>
                        <button type="submit" class="btn btn-success"> Save</button>
                    <?php } ?>
                </div>
                </form>
            </div>
        </div>
    </div>
<!-- /.container-fluid -->
</div>