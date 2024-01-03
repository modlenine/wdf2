<section id="checkbudger_section_sal">
    <form id="frm-sal-saveap" autocomplete="off" class="needs-validation" novalidate>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h4>AP ดำเนินการ</h4>
            </div>
        </div>
        <div class="salHr mt-3"></div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <div class="row">
                            <div class="col-lg-12 form-inline">
                                <div class="custom-control custom-radio mb-5 ml-3">
                                    <input type="radio" id="ip-sal-apsec-appro-yes" name="ip-sal-apsec-appro" value="ผ่าน" class="custom-control-input" required> 
                                    <label for="ip-sal-apsec-appro-yes" class="custom-control-label">ผ่าน</label>
                                </div> 
                                <div class="custom-control custom-radio mb-5 ml-3">
                                    <input type="radio" id="ip-sal-apsec-appro-no" name="ip-sal-apsec-appro" value="ไม่ผ่าน" class="custom-control-input" required> 
                                    <label for="ip-sal-apsec-appro-no" class="custom-control-label">ไม่ผ่าน</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <div class="row">
                            <div class="col-lg-12 form-inline">
                                <div class="custom-control custom-radio mb-5 ml-3">
                                    <input type="radio" id="ip-sal-apsec-money-1" name="ip-sal-apsec-money" value="เงินสด/โอน" class="custom-control-input" checked required> 
                                    <label for="ip-sal-apsec-money-1" class="custom-control-label">เงินสด/โอน</label>
                                </div> 
                                <div class="custom-control custom-radio mb-5 ml-3">
                                    <input type="radio" id="ip-sal-apsec-money-2" name="ip-sal-apsec-money" value="เช็ค" class="custom-control-input" required> 
                                    <label for="ip-sal-apsec-money-2" class="custom-control-label">เช็ค</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <textarea name="ip-sal-apsec-memo" id="ip-sal-apsec-memo" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้ดำเนินการ</b></label>
                        <input type="text" name="ip-sal-apsec-user" id="ip-sal-apsec-user" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-sal-apsec-dept" id="ip-sal-apsec-dept" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-sal-apsec-date" id="ip-sal-apsec-date" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div id="btn-sal-saveap-section" class="row align-items-center">
            <div class="col-md-12 text-center">
            <button type="submit" id="btn-sal-saveAP" name="btn-sal-saveAP" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <input hidden type="text" name="check-apsec-formcode-sal" id="check-apsec-formcode-sal">
        <input hidden type="text" name="check-apsec-areaid-sal" id="check-apsec-areaid-sal">
    </div>
    </form>
</section>

<script>
    $(document).ready(function(){

        $('#frm-sal-saveap').on('submit' , function(e){
            e.preventDefault();
            if($('input:radio[name=ip-sal-apsec-appro]:checked').length == 0){
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else{
                if($('input:radio[name=ip-sal-apsec-appro]:checked').val() == "ไม่ผ่าน"){
                    if($('#ip-sal-apsec-memo').val() == ""){
                        swal({
                            title: 'กรุณาระบุเหตุผลกำกับด้วยค่ะ',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else{
                        saveAp_sal();
                    }
                    
                }else{
                    saveAp_sal();
                }
            }
        });

        function saveAp_sal()
        {
            $('#btn-sal-saveAP').prop('disabled' , true);
            const form = $('#frm-sal-saveap')[0];
            const data = new FormData(form);

            axios.post(url+'main/salary/saveAp_sal' , data , {

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


    });
</script>