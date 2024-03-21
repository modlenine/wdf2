<section id="checkbudger_section">
    <form id="frm-savefnClear" autocomplete="off" class="needs-validation" novalidate>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h4>FINANCE ตรวจสอบข้อมูล</h4>
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
                                    <input type="radio" id="ip-fnClearSec-method-1" name="ip-fnClearSec-method" value="รับเงินคืนจากผู้ขอ" class="custom-control-input"> 
                                    <label for="ip-fnClearSec-method-1" class="custom-control-label">รับเงินคืนจากผู้ขอ</label>
                                </div> 
                                <div class="custom-control custom-radio mb-5 ml-3">
                                    <input type="radio" id="ip-fnClearSec-method-2" name="ip-fnClearSec-method" value="จ่ายเงินคืนให้ผู้ขอ" class="custom-control-input"> 
                                    <label for="ip-fnClearSec-method-2" class="custom-control-label">จ่ายเงินคืนให้ผู้ขอ</label>
                                </div>
                                <div class="custom-control custom-radio mb-5 ml-3">
                                    <input type="radio" id="ip-fnClearSec-method-3" name="ip-fnClearSec-method" value="ไม่มีรายการเพิ่มเติม" class="custom-control-input"> 
                                    <label for="ip-fnClearSec-method-3" class="custom-control-label">ไม่มีรายการเพิ่มเติม</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ยอดทั้งสิ้น</b></label>
                        <input type="text" name="ip-fnClearSec-money" id="ip-fnClearSec-money" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <div class="row">
                            <div class="col-lg-12 form-inline">
                                <div class="custom-control custom-radio mb-5 ml-3">
                                    <input type="radio" id="ip-fnClearSec-appro-yes" name="ip-fnClearSec-appro" value="ผ่าน" class="custom-control-input"> 
                                    <label for="ip-fnClearSec-appro-yes" class="custom-control-label">ผ่าน</label>
                                </div> 
                                <div class="custom-control custom-radio mb-5 ml-3">
                                    <input type="radio" id="ip-fnClearSec-appro-no" name="ip-fnClearSec-appro" value="ไม่ผ่าน" class="custom-control-input"> 
                                    <label for="ip-fnClearSec-appro-no" class="custom-control-label">ไม่ผ่าน</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <textarea name="ip-fnClearSec-memo" id="ip-fnClearSec-memo" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้ดำเนินการ</b></label>
                        <input type="text" name="ip-fnClearSec-user" id="ip-fnClearSec-user" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-fnClearSec-dept" id="ip-fnClearSec-dept" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-fnClearSec-date" id="ip-fnClearSec-date" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div id="btn-savefnClear-section" class="row align-items-center">
            <div class="col-md-12 text-center">
            <button type="submit" id="btn-savefnClear" name="btn-savefnClear" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <div id="btn-editfnClear-section" class="row align-items-center" style="display:none;">
            <div class="col-md-12 text-center">
            <button type="button" id="btn-editfnClear" name="btn-editfnClear" class="btn btn-warning btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>แก้ไข</button>
            </div>
        </div>

        <input hidden type="text" name="check-fnClearSec-formcode" id="check-fnClearSec-formcode">
        <input hidden type="text" name="check-fnClearSec-areaid" id="check-fnClearSec-areaid">
        <input hidden type="text" name="check-fnClearSec-clearingstatus" id="check-fnClearSec-clearingstatus">
        <input hidden type="text" name="check-fnClearSec-appGroup" id="check-fnClearSec-appGroup">

    </div>
    </form>
</section>

<script>
    $(document).ready(function(){

        $('#frm-savefnClear').on('submit' , function(e){
            e.preventDefault();
            if($('input:radio[name=ip-fnClearSec-method]:checked').length == 0){
                swal({
                    title: 'กรุณาเลือกผลลัพท์ของการเคลียร์เงิน',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else if($('input:radio[name=ip-fnClearSec-appro]:checked').length == 0){
                swal({
                    title: 'กรุณาเลือกผลการดำเนินงาน',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else{
                if($('input:radio[name=ip-fnClearSec-appro]:checked').val() == "ไม่ผ่าน"){
                    // Check memo
                    if($('#ip-fnClearSec-memo').val() == ""){
                        swal({
                            title: 'กรุณาระบุเหตุผลกำกับด้วยค่ะ',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else{
                        saveFnClear();
                    }
                }else{
                    saveFnClear();
                }
                
            }
        });

        function saveFnClear()
        {
            $('#btn-savefnClear').prop('disabled' , true);
            const form = $('#frm-savefnClear')[0];
            const data = new FormData(form);

            axios.post(url+'main/advance/saveFnClear' , data , {

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

        $(document).on('click' , '#btn-editfnClear' , function(){
            const data_formcode = $(this).attr('data_formcode');
            const data_areaid = $(this).attr('data_areaid');
            swal({
                title: 'ท่านต้องการแก้ไขรายการนี้ ใช่หรือไม่',
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText:'ยกเลิก'
            }).then((result)=> {
                if(result.value == true){
                    $('input:radio[name="ip-fnClearSec-appro"]').removeAttr('onclick');
                    $('input:radio[name="ip-fnClearSec-method"]').removeAttr('onclick');
                    $('#btn-editfnClear-section').css('display' , 'none');
                    $('#btn-savefnClear-section').css('display' , '');
                    $('#ip-fnClearSec-money').prop('readonly' , false);
                    $('#ip-fnClearSec-memo').prop('readonly' , false);
                    $('#check-fnClearSec-formcode').val(data_formcode);
                    $('#check-fnClearSec-areaid').val(data_areaid);
                    $('#check-fnClearSec-clearingstatus').val('re clearing');
                }
            });
        });


    });
</script>