<section id="checkbudger_section">
    <form id="frm-savefnClear2" autocomplete="off" class="needs-validation" novalidate>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h4>FINANCE ดำเนินการ</h4>
            </div>
        </div>
        <div class="advHr mt-3"></div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-fnClearSec2-appro-yes" name="ip-fnClearSec2-appro" value="ผ่าน" class="custom-control-input" required> 
                                        <label for="ip-fnClearSec2-appro-yes" class="custom-control-label">ผ่าน</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-fnClearSec2-appro-no" name="ip-fnClearSec2-appro" value="ไม่ผ่าน" class="custom-control-input" required> 
                                        <label for="ip-fnClearSec2-appro-no" class="custom-control-label">ไม่ผ่าน</label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <textarea name="ip-fnClearSec2-memo" id="ip-fnClearSec2-memo" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้ดำเนินการ</b></label>
                        <input type="text" name="ip-fnClearSec2-user" id="ip-fnClearSec2-user" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-fnClearSec2-dept" id="ip-fnClearSec2-dept" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-fnClearSec2-date" id="ip-fnClearSec2-date" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div id="btn-savefnClear2-section" class="row align-items-center">
            <div class="col-md-12 text-center">
            <button type="submit" id="btn-saveFnClear2" name="btn-saveFnClear2" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <input hidden type="text" name="check-fnClearSec2-formcode" id="check-fnClearSec2-formcode">
        <input hidden type="text" name="check-fnClearSec2-areaid" id="check-fnClearSec2-areaid">

    </div>
    </form>
</section>

<script>
    $(document).ready(function(){

        $('#frm-savefnClear2').on('submit' , function(e){
            e.preventDefault();
            if($('input:radio[name=ip-fnClearSec2-appro]:checked').length == 0){
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else{
                if($('input:radio[name=ip-fnClearSec2-appro]:checked').val() == "ไม่ผ่าน"){
                    if($('#ip-fnClearSec2-memo').val() == ""){
                        swal({
                            title: 'กรุณาระบุเหตุผลกำกับด้วยค่ะ',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else{
                        saveFnClear2();
                    }
                }else{
                    saveFnClear2();
                }

            }
        });

        function saveFnClear2()
        {
            $('#btn-saveFnClear2').prop('disabled',true);
            const form = $('#frm-savefnClear2')[0];
            const data = new FormData(form);

            axios.post(url+'main/advance/saveFnClear2' , data , {

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


    });
</script>