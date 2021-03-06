<!-- Begin Page Content -->
<style>

</style>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="text-black">Data Soal</h3>
        </div>
    </div>
    <br>
    <div class="">
        <!-- =================================================================== -->
        <div class="card">
            <div class="container">
                <br>
                <div class="text-left">
                    <button type="button" class="btn btn-success" onclick="tambah_soal()">
                        <i class="fas fa-plus"></i>
                         Tambah soal
                    </button>
                </div> 
                <br>
                <?php if(!isset($soal[0]['jenis_soal'])){ ?>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="radio" name="jenis_soal" value="0" class="text-right" required="" onclick="mass_type_soal(0)">&nbsp;Essay
                        </div>
                        <div class="col-md-3">
                            <input type="radio" name="jenis_soal" value="1" required="" onclick="mass_type_soal(1)">&nbsp;Objektif
                        </div>
                        <script>
                            function mass_type_soal(types){
                                if(types==0){
                                    $('.abc_only').addClass('d-none')
                                    $('.jenis_soal_all').val(0)
                                    $('.opsi_abc_only').attr('disabled', true)
                                } else {                        
                                    $('.abc_only').removeClass('d-none')
                                    $('.jenis_soal_all').val(1)
                                    $('.opsi_abc_only').attr('disabled', false)
                                }
                            }
                        </script>
                    </div>
                <?php } ?>
                <div class="card">
                    <div class="col">
                        <?php 
                            if(isset($soal)){ 
                            $nos = 1;
                            foreach ($soal as $key_soal => $value_soal){
                        ?>
                            <div class="soal_">
                                <br>
                                <div class="row">
                                    <div class="col-md-1"><p><?= $nos ?> )</p></div>
                                    <div class="col">
                                        <textarea class="form-control" disabled><?= $value_soal['soal'] ?></textarea>
                                    </div>
                                </div>
                                <br>
                                <?php if($value_soal['jenis_soal']==1){ ?>
                                <div class="row">
                                    <!-- <div class="col-md-3">
                                        <input type="radio" <?= $value_soal['jenis_soal']==0 ? 'checked' : '' ?> class="text-right" disabled>&nbsp;Essay
                                    </div>
                                    <div class="col-md-3">
                                        <input type="radio" <?= $value_soal['jenis_soal']==1 ? 'checked' : '' ?> disabled>&nbsp;Objektif
                                    </div> -->
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col">
                                                A <input class="form-control"  type="text" value="<?= $value_soal['soal_opsi_a'] ?>" disabled>
                                            </div>
                                            <div class="col">
                                                B <input class="form-control"  type="text" value="<?= $value_soal['soal_opsi_b'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                C <input class="form-control"  type="text" value="<?= $value_soal['soal_opsi_c'] ?>" disabled>
                                            </div>
                                            <div class="col">
                                                D <input class="form-control"  type="text" value="<?= $value_soal['soal_opsi_d'] ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <br>
                                <div class="row abc_only">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4 text-right">
                                        <label>Jawaban Benar :</label>
                                        <select class="form-control" readonly>
                                            <option value="a" <?= $value_soal['jawaban_benar']=='a' ? 'selected' : '' ?>>A</option>
                                            <option value="b" <?= $value_soal['jawaban_benar']=='b' ? 'selected' : '' ?>>B</option>
                                            <option value="c" <?= $value_soal['jawaban_benar']=='c' ? 'selected' : '' ?>>C</option>
                                            <option value="d" <?= $value_soal['jawaban_benar']=='d' ? 'selected' : '' ?>>D</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <br>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-danger" onclick="hapus_soal('<?= $value_soal['id'] ?>')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </div>
                            <hr>
                        <?php $nos++;}} ?>
                        <form action="<?= base_url('guru/add_soal_process/').$id_tugas ?>" method="POST">
                        <?php if(isset($soal[0]['jenis_soal'])){ ?>
                            <?php if($soal[0]['jenis_soal']==1){ ?>
                                <input type="hidden" name="jenis_soal_all" class="jenis_soal_all" value="1">
                            <?php } else { ?>
                                <input type="hidden" name="jenis_soal_all" class="jenis_soal_all" value="0">
                            <?php } ?>
                        <?php } else { ?>
                            <input type="hidden" name="jenis_soal_all" class="jenis_soal_all">
                        <?php } ?>
                            
                        <div id="tugas">
                        <br>
                        <div class="soal_1">
                            <div class="row">
                                <div class="col-md-1"><p><?= $nos ?> )</p></div>
                                <div class="col">
                                    <textarea class="form-control" required="" name="soal[]"></textarea>
                                </div>
                            </div>
                            <br>
                            <?php if(COUNT($soal)==0 OR $soal[0]['jenis_soal']==1){ ?>
                            <div class="row">
                                <div class="col-md-12 abc_only">
                                    <div class="row">
                                        <div class="col">
                                            A <input type="text" name="opsi_a[0]" class="form-control opsi_abc_only">
                                        </div>
                                        <div class="col">
                                            B <input type="text" name="opsi_b[0]" class="form-control opsi_abc_only">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            C <input type="text" name="opsi_c[0]" class="form-control opsi_abc_only">
                                        </div>
                                        <div class="col">
                                            D <input type="text" name="opsi_d[0]" class="form-control opsi_abc_only">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row abc_only">
                                <div class="col-md-8"></div>
                                <div class="col-md-4 text-right">
                                    <label>Jawaban Benar :</label>
                                    <select class="form-control" name="jawaban_benar[0]">
                                        <option value="a">A</option>
                                        <option value="b">B</option>
                                        <option value="c">C</option>
                                        <option value="d">D</option>
                                    </select>
                                </div>
                            </div>
                        <?php } ?>

                        </div>
                        <br>
                        </div>
                        <hr>
                        <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Save</button>
                        </form>
                        <br>
                    </div>
                </div>
                <script type="text/javascript">
                
                    var x = <?= $nos ?>+0
                    var no_soal = x
                    var no_div = 0
                    <?php if(isset($soal[0]['jenis_soal'])){ ?>
                        var jenis_all = "<?= $soal[0]['jenis_soal'] ?>"
                    <?php } else { ?>
                        var jenis_all = 999
                    <?php } ?>
                    function tambah_soal(){
                        console.log(jenis_all)
                        no_soal+=1
                        no_div+=1
                        html = '<hr><div class="soal_'+no_soal+'">'
                        html += '<div class="row">'
                        html += '<div class="col-md-1"><p>'+no_soal+')</p></div>'
                        html += '<div class="col">'
                        html += '<textarea class="form-control" required="" name="soal['+no_soal+']"></textarea>'
                        html += '</div></div><br>'

                        // html += '<div class="col-md-3"><input type="radio" name="jenis['+no_soal+']" value="0" class="text-right" required="" checked onclick="check_checked('+no_soal+', 0)">&nbsp;Essay'
                        // html += '</div><div class="col-md-3"><input type="radio" name="jenis['+no_soal+']" value="1" required="" onclick="check_checked('+no_soal+', 1)">&nbsp;Objektif</div>'
                        if($('input[type=radio][name=jenis_soal]:checked').val()==1 || jenis_all==1){
                            console.log('abc')
                            html += '<div class="row"><div class="col-md-12 abc_only"><div class="row"><div class="col">A <input type="text" name="opsi_a['+no_soal+']" class="form-control"></div>'
                            html += '<div class="col">B <input type="text" name="opsi_b['+no_soal+']" class="form-control"></div></div>'
                            html += '<div class="row"><div class="col">C <input type="text" name="opsi_c['+no_soal+']" class="form-control"></div>'
                            html += '<div class="col">D <input type="text" name="opsi_d['+no_soal+']" class="form-control"></div></div></div></div>'
                            
                            html += '<br>'
                                html += '<div class="row abc_only">'
                                    html += '<div class="col-md-8"></div>'
                                    html += '<div class="col-md-4 text-right">'
                                        html += '<label>Jawaban Benar :</label>'
                                        html += '<select class="form-control" name="jawaban_benar['+no_soal+']">'
                                            html += '<option value="a">A</option>'
                                            html += '<option value="b">B</option>'
                                            html += '<option value="c">C</option>'
                                            html += '<option value="d">D</option>'
                                        html += '</select>'
                                    html += '</div>'
                                html += '</div>'
                        } else {
                            console.log('essay')
                            html += '<div class="row"><div class="col-md-12 abc_only d-none"><div class="row"><div class="col">A <input type="text" name="opsi_a['+no_soal+']" class="form-control opsi_abc_only" disabled></div>'
                            html += '<div class="col">B <input type="text" name="opsi_b['+no_soal+']" class="form-control opsi_abc_only" disabled></div></div>'
                            html += '<div class="row"><div class="col">C <input type="text" name="opsi_c['+no_soal+']" class="form-control opsi_abc_only" disabled></div>'
                            html += '<div class="col">D <input type="text" name="opsi_d['+no_soal+']" class="form-control opsi_abc_only" disabled></div></div></div></div>'
                            
                            html += '<br>'
                                html += '<div class="row abc_only d-none">'
                                    html += '<div class="col-md-8"></div>'
                                    html += '<div class="col-md-4 text-right">'
                                        html += '<label>Jawaban Benar :</label>'
                                        html += '<select class="form-control" name="jawaban_benar['+no_soal+']">'
                                            html += '<option value="a">A</option>'
                                            html += '<option value="b">B</option>'
                                            html += '<option value="c">C</option>'
                                            html += '<option value="d">D</option>'
                                        html += '</select>'
                                    html += '</div>'
                                html += '</div>'
                        }

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

                    function hapus_soal(id_soal){
                        console.log(id_soal)
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
                                url: "<?php echo base_url();?>guru/hapus_soal",
                                type: "post",
                                data: {
                                  id_soal: id_soal
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
                <br>
            </div>
        </div>
        <!-- =================================================================== -->
    </div>
</div>
<!-- /.container-fluid -->
</div>