<section id="checkbudger_section_nor">
    <form id="frm-nor-saveUserreceive" autocomplete="off" class="needs-validation" novalidate>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h4>ผู้ร้องขอเซ็นรับเงิน</h4>
            </div>
        </div>
        <div class="norHr mt-3"></div>

        <div class="row mt-3">
            <div class="col-md-6">

                <div class="sigPad" id="smoothed-nor" style="width:100%;">
                    <ul class="sigNav">
                        <li class="drawIt"><a href="#draw-it">เซ็นชื่อที่นี่</a></li>
                        <li class="clearButton"><a href="#clear">Clear</a></li>
                    </ul>
                    <div class="sig sigWrapper" style="height:auto;">
                        <!-- <div class="typed"></div> -->
                        <canvas id="canvas_sign" class="pad" width="500" height="300"></canvas>
                        <input type="hidden" name="outputt" class="outputt">
                    </div>
                </div>

                <div id="show_signature_nor" style="display:none;">
                    <img id="show_sign_nor" src="" class="img-fluid">
                </div>

                <div class="col-md-12 form-group">
                    <textarea name="output_nor" id="output_nor" cols="30" rows="10" style="display:none;"></textarea>
                    <img src='' id='sign_prev'class="img-fluid" style="display:none;"/>
                </div>

            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้ดำเนินการ</b></label>
                        <input type="text" name="ip-nor-userReceiveSec-user" id="ip-nor-userReceiveSec-user" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-nor-userReceiveSec-dept" id="ip-nor-userReceiveSec-dept" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-nor-userReceiveSec-date" id="ip-nor-userReceiveSec-date" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <input type="text" name="ip-nor-userReceiveSec-memo" id="ip-nor-userReceiveSec-memo" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div id="btn-nor-saveUserreceive-section" class="row align-items-center">
            <div class="col-md-12 text-center">
            <button type="submit" id="btn-nor-saveUserreceive" name="btn-nor-saveUserreceive" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <input hidden type="text" name="check-userreceivesec-formcode-nor" id="check-userreceivesec-formcode-nor">
        <input hidden type="text" name="check-userreceivesec-areaid-nor" id="check-userreceivesec-areaid-nor">

    </div>
    </form>
</section>


<script>
$(document).ready(function(){
    $('#smoothed-nor').signaturePad({
        drawOnly: true,
        drawBezierCurves: true,
        lineTop: 400
    });

var signaturePad = new SignaturePad(document.getElementById('canvas_sign'));

    $('#frm-nor-saveUserreceive').on('submit' , function(e){
        e.preventDefault();

        getSign_nor();

        if($('#output_nor').val() == ""){
            swal({
                title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                type: 'error',
                showConfirmButton: false,
                timer:1000
            });
        }else{
            saveUserReceive_nor();
        }
    });



    function saveUserReceive_nor()
    {
        $('#btn-nor-saveUserreceive').prop('disabled',true);
        const form = $('#frm-nor-saveUserreceive')[0];
        const data = new FormData(form);

        axios.post(url+'main/normal/saveUserReceive_nor' , data , {

        }).then(res=>{
            console.log(res.data);
            if(res.data.status == "Update Data Success"){
                swal({
                    title: 'บันทึกข้อมูลสำเร็จ',
                    type: 'success',
                    showConfirmButton: false,
                    timer:1000
                }).then(function(){
                    location.href = url+'normal.html';
                });
            }
        });
    }

    function getSign_nor() {
        var data = signaturePad.toDataURL('image/png' , 1.0);
        $('#output_nor').val(data);
        $("#sign_prev").attr("src", data);
        // Open image in the browser
        //window.open(data);
    }



});


</script>