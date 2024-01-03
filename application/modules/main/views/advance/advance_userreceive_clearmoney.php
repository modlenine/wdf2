<section id="checkbudger_section">
    <form id="frm-saveUserreceiveClear" autocomplete="off" class="needs-validation" novalidate>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h4>ผู้ร้องขอเซ็นรับเงิน</h4>
            </div>
        </div>
        <div class="advHr mt-3"></div>

        <div class="row mt-3">
            <div class="col-md-6">

                <div class="sigPad" id="smoothedClear" style="width:100%;">
                    <ul class="sigNav">
                        <li class="drawIt"><a href="#draw-it">เซ็นชื่อที่นี่</a></li>
                        <li class="clearButton"><a href="#clear">Clear</a></li>
                    </ul>
                    <div class="sig sigWrapper" style="height:auto;">
                        <!-- <div class="typed"></div> -->
                        <canvas id="canvas_signClear" class="pad" width="500" height="300"></canvas>
                        <input type="hidden" name="outputt" class="outputt">
                    </div>
                </div>

                <div id="show_signatureClear" style="display:none;">
                    <img id="show_sign_advClear" src="" class="img-fluid">
                </div>

                <div class="col-md-12 form-group">
                    <textarea name="output_clear" id="output_clear" cols="30" rows="10" style="display:none;"></textarea>
                    <img src='' id='sign_prev'class="img-fluid" style="display:none;"/>
                </div>

            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้ดำเนินการ</b></label>
                        <input type="text" name="ip-userReceiveClearSec-user" id="ip-userReceiveClearSec-user" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-userReceiveClearSec-dept" id="ip-userReceiveClearSec-dept" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-userReceiveClearSec-date" id="ip-userReceiveClearSec-date" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <input type="text" name="ip-userReceiveClearSec-memo" id="ip-userReceiveClearSec-memo" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div id="btn-saveUserreceiveClear-section" class="row align-items-center">
            <div class="col-md-12 text-center">
            <button type="submit" id="btn-saveUserreceiveClear" name="btn-saveUserreceiveClear" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <input hidden type="text" name="check-userReceiveClearSec-formcode" id="check-userReceiveClearSec-formcode">
        <input hidden type="text" name="check-userReceiveClearSec-areaid" id="check-userReceiveClearSec-areaid">

    </div>
    </form>
</section>


<script>
$(document).ready(function(){
    $('#smoothedClear').signaturePad({
        drawOnly: true,
        drawBezierCurves: true,
        lineTop: 400
    });

var signaturePadClear = new SignaturePad(document.getElementById('canvas_signClear'));

    $('#frm-saveUserreceiveClear').on('submit' , function(e){
        e.preventDefault();

        getSignClear();

        if($('#output_clear').val() == ""){
            swal({
                title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                type: 'error',
                showConfirmButton: false,
                timer:1000
            });
        }else{
            saveUserReceiveClear();
        }
    });



    function saveUserReceiveClear()
    {
        $('#btn-saveUserreceiveClear').prop('disabled', true);
        const form = $('#frm-saveUserreceiveClear')[0];
        const data = new FormData(form);

        axios.post(url+'main/advance/saveUserReceiveClear' , data , {

        }).then(res=>{
            console.log(res.data);
            if(res.data.status == "Update Data Success"){
                swal({
                    title: 'บันทึกข้อมูลสำเร็จ',
                    type: 'success',
                    showConfirmButton: false,
                    timer:1000
                }).then(function(){
                    location.href = url+'advance.html';
                });
            }
        });
    }

    function getSignClear() {
        var data = signaturePadClear.toDataURL('image/png' , 1.0);
        $('#output_clear').val(data);
        $("#sign_prev").attr("src", data);
        // Open image in the browser
        //window.open(data);
    }



});


</script>