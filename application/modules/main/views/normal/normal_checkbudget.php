<section id="checkbudger_section_zone_nor">
    <form id="frm-checkbudget-nor" autocomplete="off" class="needs-validation" novalidate>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h4>บัญชีตรวจสอบวงเงิน</h4>
            </div>
        </div>
        <div class="norHr mt-3"></div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>วงเงินคงเหลือ</b></label>
                        <input type="text" name="ip-nor-bgsec-creditlimit" id="ip-nor-bgsec-creditlimit" class="form-control" required>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <textarea name="ip-nor-bgsec-memo" id="ip-nor-bgsec-memo" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้ดำเนินการ</b></label>
                        <input type="text" name="ip-nor-bgsec-user" id="ip-nor-bgsec-user" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-nor-bgsec-dept" id="ip-nor-bgsec-dept" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-nor-bgsec-datetime" id="ip-nor-bgsec-datetime" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <button type="submit" id="btn-nor-savecheckbudget" name="btn-nor-savecheckbudget" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <input hidden type="text" name="check_formcode_bg_nor" id="check_formcode_bg_nor">
        <input hidden type="text" name="check_areaid_bg_nor" id="check_areaid_bg_nor">

    </div>
    </form>
</section>

<script>
    $(document).ready(function(){

        $('#frm-checkbudget-nor').on('submit' , function(e){
            e.preventDefault();
            if($('#ip-nor-bgsec-creditlimit').val() == ""){
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วนด้วยค่ะ',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else{
                save_checkbudget_nor();
            }
        });
        function save_checkbudget_nor()
        {
            $('#btn-nor-savecheckbudget').prop('disabled' , true);
            
            const form = $('#frm-checkbudget-nor')[0];
            const data = new FormData(form);
            axios.post(url+'main/normal/save_checkbudget_nor' , data , {

            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Insert Data Success"){
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
    });
</script>