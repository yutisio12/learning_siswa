<!-- Begin Page Content -->
<style>

</style>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="text-black">Data Siswa</h3>
        </div>
    </div>
    <br>
    <div class="">
        <!-- =================================================================== -->
        <div class="card">
            <div class="container">
                <br>
                <div class="text-left">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus"></i>
                         Tambah Siswa
                    </button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#importModal">
                        <i class="fas fa-plus"></i>
                         Import Data Siswa
                    </button>

                    <!-- Import Modal -->
                    <div class="modal fade" id="importModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Data Siswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('home/import_siswa')?>" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <label for="nama_siswa">File Siswa</label>
                                <input type="file" class="form-control" name="file_siswa">
                                <a href="<?= base_url('file/Template Import Siswa.xlsx') ?>">Template Import Siswa.xlsx</a>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                    <!-- End Import Modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Data Siswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('home/tambah_siswa')?>" method="POST">
                            <div class="modal-body">
                                <label for="nama_siswa">Nama Siswa</label>
                                <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Masukan Nama Siswa">
                            </div>

                            <div class="modal-body">
                                <label for="nip_siswa">NIP Siswa</label>
                                <input type="text" class="form-control" name="nip_siswa" id="nip_siswa" placeholder="Masukan NIP Siswa" required="">
                            </div>

                            <div class="modal-body">
                                <label for="kelas_siswa">Kelas</label>
                                <br>
                                <select class="select2 form-control" name="kelas_siswa" style="width: 100%;">
                                <option value="<?= $list['kelas_siswa'] ?>"><?= $nama_kelas[$list['kelas_siswa']] ?></option>
                                    <?php foreach($kelas as $v_kelas){ ?>
                                        <option value="<?= $v_kelas['id'] ?>"><?= $v_kelas['nama_kelas'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="modal-body">
                                <label for="alamat_siswa">Alamat Siswa</label>
                                <input type="text" class="form-control" id="alamat_siswa" name="alamat_siswa" placeholder="Masukan Kelas">
                            </div>

                            <div class="modal-body">
                                <label for="telpon_siswa">No Telphone Siswa</label>
                                <input type="text" class="form-control" id="telpon_siswa" name="telpon_siswa" placeholder="Masukan Kelas">
                            </div>
                            <input type="hidden" name="status" id="status">

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
                <br>
                

                    <table class="table table-hover table-bordered data-table-filter">
                    <thead class="bg-primary text-white">

                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">NIP Siswa</th>
                            <th scope="col">Alamat Siswa</th>
                            <th scope="col">No Telphone</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach ($siswa as $list):
                    ?>
                     <?php if ( $list['status'] != '1' ) : ?>

                    <?php else : ?>

                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?= $list['nama_siswa'] ?></td>
                            <td><?= $nama_kelas[$list['kelas_siswa']] ?></td>
                            <td><?= $list['nip_siswa'] ?></td>
                            <td><?= $list['alamat_siswa'] ?></td>
                            <td><?= $list['telpon_siswa'] ?></td>
                            <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal<?= $list['id']; ?>">
                            <i class="fas fa-edit"></i>
                            Edit Siswa
                            </button>
                            <button class="btn btn-danger"  onclick="hapus_siswa('<?= $list['id'] ?>')">
                            <i class="fas fa-trash"></i> Hapus
                            </button></td>

                        </tr>
                        <?php endif; ?>

                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- =================================================================== -->
    </div>
</div>
<!-- /.container-fluid -->
</div>


<!-- Modal Edit -->
<?php 
foreach ($siswa as $list):
?>

<div class="modal fade" id="modal<?= $list['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('home/edit_siswa')?>" method="POST">
      
        <div class="modal-body">
                                <label for="nama_siswa">Nama Siswa</label>
                                <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" value="<?= $list['nama_siswa'] ?>" placeholder="Masukan Nama Siswa">
                            </div>

                            <div class="modal-body">
                                <label for="nip_siswa">NIP Siswa</label>
                                <input type="text" class="form-control" name="nip_siswa" id="nip_siswa" value="<?= $list['nip_siswa'] ?>"placeholder="Masukan NIP Siswa">
                            </div>

                            <div class="modal-body">
                                <label for="kelas_siswa">Kelas</label>
                                <br>
                                <select class="select2 form-control" name="kelas_siswa" style="width: 100%;" required>
                                <option value="<?= $list['kelas_siswa'] ?>"><?= $nama_kelas[$list['kelas_siswa']] ?></option>
                                    <?php foreach($kelas as $v_kelas){ ?>
                                        <option value="<?= $v_kelas['id'] ?>"><?= $v_kelas['nama_kelas'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="modal-body">
                                <label for="alamat_siswa">Alamat Siswa</label>
                                <input type="text" class="form-control" id="alamat_siswa" name="alamat_siswa" value="<?= $list['alamat_siswa'] ?>" placeholder="Masukan Alamat Siswa">
                            </div>

                            <div class="modal-body">
                                <label for="telpon_siswa">No Telphone Siswa</label>
                                <input type="text" class="form-control" id="telpon_siswa" name="telpon_siswa" value="<?= $list['telpon_siswa'] ?>" placeholder="Masukan No Telphone Siswa">
                            </div>

                            <input type="hidden" name="id" id="id" value="<?= $list['id']; ?>">

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>

<script>

$(document).ready(function() {
    $('.data-table-filter').DataTable({
        dom: 'Bfrtlp',
        buttons: [ {
            extend: 'excelHtml5',
            autoFilter: true,
            sheetName: 'Exported data',
            title: 'List Siswa',
            exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                }
        } ],
        
                initComplete: function () {
                     this.api().columns(2).every(function () {
                         var column = this;
                         $(column.header()).append("<br>")
                var select = $('<select><option value=""></option></select>')
                    .appendTo($(column.header()))
                             .on('change', function () {
                                 var val = $.fn.dataTable.util.escapeRegex(
                                     $(this).val()
                                 );

                                 column
                                     .search(val ? '^' + val + '$' : '', true, false)
                                     .draw();
                             });
                         column.data().unique().sort().each(function (d, j) {
                             select.append('<option value="' + d + '">' + d + '</option>')
                } );
            } );
        }
            });
        });

 function hapus_siswa(id){
                        console.log(id)
                        Swal.fire({
                            title: 'Are you sure to <b class="text-danger">&nbsp;Delete&nbsp;</b> this?',
                            // text: "This joint will permanent deleted!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, Delete it!'
                          }).then((result) => {
                            if (result.value) {
                              $.ajax({
                                url: "<?php echo base_url();?>home/hapus_siswa",
                                type: "post",
                                data: {
                                  id: id
                                },
                                success: function(data) {
                                if(data.includes("Error")){
                                   Swal.fire(
                                      'Ops..',
                                      data,
                                      'error'
                                    );
                                    
                                } else {

                                    Swal.fire(
                                      'Success',
                                      'Your data has been Updated!',
                                      'success'
                                    );
                                    location.reload();
                                  }
                                }
                              });
                            }
                          })
                    }
</script>