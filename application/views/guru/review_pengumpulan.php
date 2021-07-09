<!-- Begin Page Content -->
<style>

</style>
<script src="<?= base_url('assets/ckeditor/') ?>ckeditor.js"></script>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="text-black">Pengerjaan Soal</h3>
        </div>
    </div>
    <br>
    <div class="">
        <!-- =================================================================== -->
        <div class="card">
            <div class="container">
                <br>
                <div class="text-left">
                </div> 
                <br>
                <div class="card">
                    <div class="col">
                        <form action="<?= base_url('siswa/pengumpulan_soal/').$id_tugas_main ?>" method="POST">
                        <?php 
                            if(isset($soal)){ 
                            $nos = 1;
                            foreach ($soal as $key_soal => $value_soal){
                        ?>
                            <div class="soal_">
                                <br>
                                <div class="row">
                                    <div class="col-md-1"><p><?= $nos ?> )
                                    <?php if($value_soal['jenis_soal']==1){ ?>
                                        <i class="fas fa-lg <?= $jawaban[$value_soal['id']]==$value_soal['jawaban_benar'] ? 'fa-check text-success' : 'fa-times text-danger' ?>"></i></p>
                                    <?php } ?>
                                    </div>

                                    <div class="col">
                                        <textarea class="form-control" disabled><?= $value_soal['soal'] ?></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="col">
                                    <?php if($value_soal['jenis_soal']==1){ ?>
                                    <div class="row">
                                        <div class="col-md-2"> </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col">
                                                    <span class="btn <?= $jawaban[$value_soal['id']]==a ? 'btn-warning' : 'btn-secondary text-white' ?> opsi_<?= $key_soal ?>" style="color: black" onclick="jawaban('<?= $key_soal ?>', 'a')"><b>A)</b> <?= $value_soal['soal_opsi_a'] ?></span>
                                                </div>
                                                <div class="col">
                                                    <span class="btn <?= $jawaban[$value_soal['id']]==b ? 'btn-warning' : 'btn-secondary text-white' ?> opsi_<?= $key_soal ?>" style="color: black" onclick="jawaban('<?= $key_soal ?>', 'b')"><b>B)</b> <?= $value_soal['soal_opsi_b'] ?></span>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <span class="btn <?= $jawaban[$value_soal['id']]==c ? 'btn-warning' : 'btn-secondary text-white' ?> opsi_<?= $key_soal ?>" style="color: black" onclick="jawaban('<?= $key_soal ?>', 'c')"><b>C)</b> <?= $value_soal['soal_opsi_c'] ?></span>
                                                </div>
                                                <div class="col">
                                                    <span class="btn <?= $jawaban[$value_soal['id']]==d ? 'btn-warning' : 'btn-secondary text-white' ?> opsi_<?= $key_soal ?>" style="color: black" onclick="jawaban('<?= $key_soal ?>', 'd')"><b>D)</b> <?= $value_soal['soal_opsi_d'] ?></span>
                                                </div>
                                                <input type="hidden" name="jawaban[<?=  $key_soal ?>]" class="abcd_<?=  $key_soal ?>">
                                                <input type="hidden" name="id_soal[<?=  $key_soal ?>]" value="<?= $value_soal['id'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2"> </div>
                                    </div>
                                    <?php } else {?>
                                    <div class="row">
                                        <div class="col">
                                            <div class="col">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jawaban kamu :
                                            <br>
                                            <div class="col">
                                                <div class="col">
                                                    <div class="col">
                                                    <textarea id="ckeditor" class="form-control abcd_<?=  $key_soal ?>" name="jawaban[<?=  $key_soal ?>]" rows="5" readonly><?= $jawaban[$value_soal['id']] ?></textarea>
                                                    <input type="hidden" name="id_soal[<?=  $key_soal ?>]" value="<?= $value_soal['id'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col">
                                            <div class="card col">
                                                <div class="col">
                                                    <div class="col">
                                                        <div class="col text-center">
                                                            <?php if(strlen($file[$value_soal['id']])>0 AND isset($file[$value_soal['id']]) AND $file[$value_soal['id']]!=NULL){ ?>
                                                            <img src="<?= base_url('upload/').$file[$value_soal['id']] ?>" style="width: 200px; height: 200px;">
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php } ?>
                                </div>
                                <br>
                            </div>
                        <?php $nos++;}} ?>
                            <hr>
                            <!-- <div class="text-right">
                                <button class="btn btn-success" type="submit"><i class="fas fa-sign-in-alt"></i> Submit</button>
                            </div> -->
                        </form>
                        <br>
                    </div>
                </div>
                <script type="text/javascript">
                
                    var x = <?= $nos ?>+0
                    var no_soal = x
                    var no_div = 0
                    function tambah_soal(){
                        no_soal+=1
                        no_div+=1
                        html = '<hr><div class="soal_'+no_soal+'">'
                        html += '<div class="row">'
                        html += '<div class="col-md-1"><p>'+no_soal+')</p></div>'
                        html += '<div class="col">'
                        html += '<textarea class="form-control" required="" name="soal['+no_soal+']"></textarea>'
                        html += '</div></div><br><div class="row"><div class="col-md-3">'

                        html += '<input type="radio" name="jenis['+no_soal+']" value="0" class="text-right" required="" checked onclick="check_checked('+no_soal+', 0)">&nbsp;Essay'
                        html += '</div><div class="col-md-3"><input type="radio" name="jenis['+no_soal+']" value="1" required="" onclick="check_checked('+no_soal+', 1)">&nbsp;Objektif</div>'

                        html += '<div class="col-md-6"><div class="row"><div class="col">A <input type="text" name="opsi_a['+no_soal+']" class="form-control" disabled></div>'
                        html += '<div class="col">B <input type="text" name="opsi_b['+no_soal+']" class="form-control" disabled></div></div>'
                        html += '<div class="row"><div class="col">C <input type="text" name="opsi_c['+no_soal+']" class="form-control" disabled></div>'
                        html += '<div class="col">D <input type="text" name="opsi_d['+no_soal+']" class="form-control" disabled></div></div></div></div>'
                        html += '<button class="btn btn-danger" onclick="remove_tugas('+no_soal+')"><i class="fas fa-trash"></i> Remove</button><br><br></div>'
                        $('#tugas').append(html)
                    }

                    function check_checked(nomor, status) {
                        if ($("input[name='jenis["+nomor+"]']").prop("checked")) {
                            console.log('check '+nomor)
                            $("input[name='opsi_a["+nomor+"]']").prop("disabled", true)
                            $("input[name='opsi_b["+nomor+"]']").prop("disabled", true)
                            $("input[name='opsi_c["+nomor+"]']").prop("disabled", true)
                            $("input[name='opsi_d["+nomor+"]']").prop("disabled", true)
                        } else {
                            $("input[name='opsi_a["+nomor+"]']").prop("disabled", false)
                            $("input[name='opsi_b["+nomor+"]']").prop("disabled", false)
                            $("input[name='opsi_c["+nomor+"]']").prop("disabled", false)
                            $("input[name='opsi_d["+nomor+"]']").prop("disabled", false)
                        }
                    }

                    function remove_tugas(nomor){
                        $('.soal_'+nomor).remove();
                        no_soal-=1
                        no_div-=1
                    }

                    function jawaban(no_soal, jawaban){
                        console.log(jawaban)
                        $('.abcd_'+no_soal).val(jawaban)
                    }

                    CKEDITOR.replace( 'ckeditor' );


                </script>
                <br>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalScore">
                    <i class="fas fa-plus"></i>Add Score
                </button>
                <br><br>
            </div>
        </div>
    </div>
<!-- /.container-fluid -->
</div>

<!-- Modal -->

<div class="modal fade" id="modalScore" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Add Score</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('guru/add_score/')?>" method="POST">
                           
                        <div class="modal-body">
                                <label for="nilai">Nilai</label>
                                <input type="number" class="form-control" id="nilai" name="nilai" placeholder="Masukan Nilai" min="0" max="100">
                        </div>

                        <input type="hidden" name="id_tugas" id="id_tugas"  value="<?= $id_tugas_main ?>">
                        <?php foreach ($siswa as $list): ?>
                        <input type="hidden" name="id_siswa" id="id_siswa"  value="<?= $list['id'] ?>">
                        <?php endforeach ?>
                        <?php foreach ($kelas as $list): ?>
                        <input type="hidden" name="id_kelas" id="id_kelas"  value="<?= $list['id'] ?>">
                        <?php endforeach ?>
                        <?php foreach ($mapel as $list): ?>
                        <input type="hidden" name="id_mapel" id="id_mapel"  value="<?= $list['id'] ?>">
                        <?php endforeach ?>
                        <?php foreach ($semester as $list): ?>
                        <input type="hidden" name="semester" id="semester"  value="<?= $list['semester'] ?>">
                        <?php endforeach ?>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save </button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>