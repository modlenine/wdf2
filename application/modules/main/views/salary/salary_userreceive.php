<section id="checkbudger_section_sal">
    <form id="frm-sal-saveUserreceive" autocomplete="off" class="needs-validation" novalidate>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h4>ผู้ร้องขอเซ็นรับเงิน</h4>
            </div>
        </div>
        <div class="salHr mt-3"></div>

        <div class="row mt-3">
            <div class="col-md-6">

                <div class="sigPad" id="smoothed-sal" style="width:100%;">
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

                <div id="show_signature_sal" style="display:none;">
                    <img id="show_sign_sal" src="" class="img-fluid">
                </div>

                <div class="col-md-12 form-group">
                    <textarea name="output_sal" id="output_sal" cols="30" rows="10" style="display:none;"></textarea>
                    <img src='' id='sign_prev'class="img-fluid" style="display:none;"/>
                </div>

            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้ดำเนินการ</b></label>
                        <input type="text" name="ip-sal-userReceiveSec-user" id="ip-sal-userReceiveSec-user" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-sal-userReceiveSec-dept" id="ip-sal-userReceiveSec-dept" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-sal-userReceiveSec-date" id="ip-sal-userReceiveSec-date" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <input type="text" name="ip-sal-userReceiveSec-memo" id="ip-sal-userReceiveSec-memo" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div id="btn-sal-saveUserreceive-section" class="row align-items-center">
            <div class="col-md-12 text-center">
            <button type="submit" id="btn-sal-saveUserreceive" name="btn-sal-saveUserreceive" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <input hidden type="text" name="check-userreceivesec-formcode-sal" id="check-userreceivesec-formcode-sal">
        <input hidden type="text" name="check-userreceivesec-areaid-sal" id="check-userreceivesec-areaid-sal">

    </div>
    </form>
</section>


<script>
$(document).ready(function(){
    $('#smoothed-sal').signaturePad({
        drawOnly: true,
        drawBezierCurves: true,
        lineTop: 400
    });

var signaturePad = new SignaturePad(document.getElementById('canvas_sign'));

    $('#frm-sal-saveUserreceive').on('submit' , function(e){
        e.preventDefault();

        getSign_sal();

        if($('#output_sal').val() == ""){
            swal({
                title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                type: 'error',
                showConfirmButton: false,
                timer:1000
            });
        }else{
            saveUserReceive_sal();
        }
    });



    function saveUserReceive_sal()
    {
        $('#btn-sal-saveUserreceive').prop('disabled',true);
        const form = $('#frm-sal-saveUserreceive')[0];
        const data = new FormData(form);

        axios.post(url+'main/salary/saveUserReceive_sal' , data , {

        }).then(res=>{
            console.log(res.data);
            if(res.data.status == "Update Data Success"){
                swal({
                    title: 'บันทึกข้อมูลสำเร็จ',
                    type: 'success',
                    showConfirmButton: false,
                    timer:1000
                }).then(function(){
                    location.href = url+'salary.html';
                });
            }
        });
    }

    function getSign_sal() {
        var data = signaturePad.toDataURL('image/png' , 1.0);
        $('#output_sal').val(data);
        $("#sign_prev").attr("src", data);
        // Open image in the browser
        //window.open(data);
    }



});


</script>