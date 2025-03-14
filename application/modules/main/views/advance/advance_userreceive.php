<section id="checkbudger_section">
    <form id="frm-saveUserreceive" autocomplete="off" class="needs-validation" novalidate>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h4>ผู้ร้องขอเซ็นรับเงิน</h4>
            </div>
        </div>
        <div class="advHr mt-3"></div>

        <div class="row mt-3">
            <div class="col-md-6">

                <div class="sigPad" id="smoothed" style="width:100%;">
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

                <div id="show_signature" style="display:none;">
                    <img id="show_sign_adv" src="" class="img-fluid">
                </div>

                <div class="col-md-12 form-group">
                    <textarea name="output" id="output" cols="30" rows="10" style="display:none;"></textarea>
                    <img src='' id='sign_prev'class="img-fluid" style="display:none;"/>
                </div>

            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้ดำเนินการ</b></label>
                        <input type="text" name="ip-userReceiveSec-user" id="ip-userReceiveSec-user" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-userReceiveSec-dept" id="ip-userReceiveSec-dept" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-userReceiveSec-date" id="ip-userReceiveSec-date" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <input type="text" name="ip-userReceiveSec-memo" id="ip-userReceiveSec-memo" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div id="btn-saveUserreceive-section" class="row align-items-center">
            <div class="col-md-12 text-center">
            <button type="submit" id="btn-saveUserreceive" name="btn-saveUserreceive" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <input hidden type="text" name="check-userreceivesec-formcode" id="check-userreceivesec-formcode">
        <input hidden type="text" name="check-userreceivesec-areaid" id="check-userreceivesec-areaid">
        <input hidden type="text" name="check-userreceivesec-appGroup" id="check-userreceivesec-appGroup">

    </div>
    </form>
</section>


<script>
$(document).ready(function(){
    $('#smoothed').signaturePad({
        drawOnly: true,
        drawBezierCurves: true,
        lineTop: 400
    });

var signaturePad = new SignaturePad(document.getElementById('canvas_sign'));

    $('#frm-saveUserreceive').on('submit' , function(e){
        e.preventDefault();

        getSign();

        if($('#output').val() == ""){
            swal({
                title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                type: 'error',
                showConfirmButton: false,
                timer:1000
            });
        }else{
            saveUserReceive();
        }
    });



    function saveUserReceive()
    {
        $('#btn-saveUserreceive').prop('disabled',true);
        const form = $('#frm-saveUserreceive')[0];
        const data = new FormData(form);

        axios.post(url+'main/advance/saveUserReceive' , data , {

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

    function getSign() {
        var data = signaturePad.toDataURL('image/png' , 1.0);
        $('#output').val(data);
        $("#sign_prev").attr("src", data);
        // Open image in the browser
        //window.open(data);
    }



});


</script>