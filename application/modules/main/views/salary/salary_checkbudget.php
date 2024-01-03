<section id="checkbudger_section_zone_sal">
    <form id="frm-checkbudget-sal" autocomplete="off" class="needs-validation" novalidate>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h4>บัญชีตรวจสอบวงเงิน</h4>
            </div>
        </div>
        <div class="salHr mt-3"></div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>วงเงินคงเหลือ</b></label>
                        <input type="text" name="ip-sal-bgsec-creditlimit" id="ip-sal-bgsec-creditlimit" class="form-control" required>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <textarea name="ip-sal-bgsec-memo" id="ip-sal-bgsec-memo" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้ดำเนินการ</b></label>
                        <input type="text" name="ip-sal-bgsec-user" id="ip-sal-bgsec-user" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-sal-bgsec-dept" id="ip-sal-bgsec-dept" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-sal-bgsec-datetime" id="ip-sal-bgsec-datetime" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <button type="submit" id="btn-sal-savecheckbudget" name="btn-sal-savecheckbudget" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <input hidden type="text" name="check_formcode_bg_sal" id="check_formcode_bg_sal">
        <input hidden type="text" name="check_areaid_bg_sal" id="check_areaid_bg_sal">

    </div>
    </form>
</section>

<script>
    $(document).ready(function(){

        $('#frm-checkbudget-sal').on('submit' , function(e){
            e.preventDefault();
            if($('#ip-sal-bgsec-creditlimit').val() == ""){
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วนด้วยค่ะ',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else{
                save_checkbudget_sal();
            }
        });
        function save_checkbudget_sal()
        {
            $('#btn-sal-savecheckbudget').prop('disabled' , true);
            
            const form = $('#frm-checkbudget-sal')[0];
            const data = new FormData(form);
            axios.post(url+'main/salary/save_checkbudget_sal' , data , {

            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Insert Data Success"){
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
    });
</script>