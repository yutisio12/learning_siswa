<!-- Begin Page Content -->
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
                <?php if(isset($nilai['nilai'])){ ?>
                <div class="card">
                    <div class="col">
                        <br>
                        <div class="col">
                            <tr>
                                <td>
                                    <h4>Nilai Kamu</h4>
                                </td>
                                <td>
                                    <button class="btn btn-success">
                                        <?php  
                                            
                                            if($nilai['nilai']<=70){
                                                $warna = 'btn-danger';
                                                $pesan = 'Lumayan, jangan patah semangat dan tetap rajin ya!';
                                                
                                            } elseif($nilai['nilai']<=80){
                                                $warna = 'btn-success';
                                                $pesan = 'Luar biasa, pertahanin prestasi kamu ya!';
                                
                                            } else {
                                                $warna = 'btn-success';
                                                $pesan = 'Hebat, terus tingkatkan prestasi kamu ya!';
                                                
                                            }
                                        ?>
                                        <div class="row">
                                            <div class="col">
                                                <h1 class="text-middle text-center">
                                                    <?= $nilai['nilai'] ?>
                                                </h1>
                                            </div>
                                            <div class="col">
                                                <?php if($nilai['nilai']>=90){ ?>
                                                    <i class="fas fa-praying-hands fa-3x"></i>
                                                <?php } elseif($nilai['nilai']>=70){ ?>
                                                    <i class="fas fa-thumbs-up fa-3x"></i>
                                                <?php } else { ?>
                                                    <i class="fas fa-smile fa-3x"></i>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </button>
                                </td>
                                <td>
                                    &nbsp;&nbsp;<?= $pesan ?>
                                </td>
                            </tr>
                        </div>
                        <br>
                    </div>
                </div>
                <?php } ?>
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
                                    <div class="col-md-1"><p><?= $nos ?> )</p></div>
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
                                                    <span class="btn <?= $jawaban[$value_soal['id']]=='a' ? 'btn-warning' : 'btn-secondary text-white' ?> opsi_<?= $key_soal ?>" style="color: black" onclick="jawaban('<?= $key_soal ?>', 'a')"><b>A)</b> <?= $value_soal['soal_opsi_a'] ?></span>
                                                </div>
                                                <div class="col">
                                                    <span class="btn <?= $jawaban[$value_soal['id']]=='b' ? 'btn-warning' : 'btn-secondary text-white' ?> opsi_<?= $key_soal ?>" style="color: black" onclick="jawaban('<?= $key_soal ?>', 'b')"><b>B)</b> <?= $value_soal['soal_opsi_b'] ?></span>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <span class="btn <?= $jawaban[$value_soal['id']]=='c' ? 'btn-warning' : 'btn-secondary text-white' ?> opsi_<?= $key_soal ?>" style="color: black" onclick="jawaban('<?= $key_soal ?>', 'c')"><b>C)</b> <?= $value_soal['soal_opsi_c'] ?></span>
                                                </div>
                                                <div class="col">
                                                    <span class="btn <?= $jawaban[$value_soal['id']]=='d' ? 'btn-warning' : 'btn-secondary text-white' ?> opsi_<?= $key_soal ?>" style="color: black" onclick="jawaban('<?= $key_soal ?>', 'd')"><b>D)</b> <?= $value_soal['soal_opsi_d'] ?></span>
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
                                                        <?php $answer = $jawaban[$value_soal['id']] ?>
                                                    <textarea class="form-control abcd_<?=  $key_soal ?>" name="jawaban[<?=  $key_soal ?>]" rows="5" readonly><?= htmlentities($answer) ?></textarea>
                                                    <input type="hidden" name="id_soal[<?=  $key_soal ?>]" value="<?= $value_soal['id'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card col">
                                                <div class="col">
                                                    <div class="col">
                                                        <div class="col text-center">
                                                            <img src="<?= base_url('upload/').$file[$value_soal['id']] ?>" style="width: 200px; height: 200px;">
                                                        </div>
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

                </script>
                <br>
            </div>
        </div>
        <!-- =================================================================== -->
    </div>
</div>
<!-- /.container-fluid -->
</div>