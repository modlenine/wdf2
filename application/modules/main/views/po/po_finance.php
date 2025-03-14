<!-- Modal Mix วัตถุดิบ  -->
<div class="modal fade " id="md_po_uploadfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">อัพโหลดเอกสาร</h5>
                <button id="close_md_getValMix" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm-po-uploadfile" class="needs-validation" novalidate>
            <div class="modal-body">

                <div class="row form-group">
                    <div class="col-lg-12">
                        <div id="ip-po-fnSec-file" class="row form-group">
                            <div class="col-lg-12">
                                <label>อัพโหลดรูปภาพ , เอกสารที่เกี่ยวข้อง</label><br>
                                <input id="ip-po-fnSec-file" name="ip-po-fnSec-file[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true" accept="image/*,.pdf" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="button" id="btn-po-savefile" name="btn-po-savefile" class="btn btn-success">อัพโหลด</button>
                    </div>
                </div>

                <input hidden type="text" name="ip-pof-formcode" id="ip-pof-formcode">
                <input hidden type="text" name="ip-pof-areaid" id="ip-pof-areaid">

            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Mix วัตถุดิบ  -->

<section id="checkbudger_section_po">
    <form id="frm-po-savefn" autocomplete="off" class="needs-validation" novalidate>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h4>FINANCE ดำเนินการ</h4>
            </div>
        </div>
        <div class="poHr mt-3"></div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-po-fnSec-appro-yes" name="ip-po-fnSec-appro" value="ผ่าน" class="custom-control-input"> 
                                        <label for="ip-po-fnSec-appro-yes" class="custom-control-label">ผ่าน</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-po-fnSec-appro-no" name="ip-po-fnSec-appro" value="ไม่ผ่าน" class="custom-control-input"> 
                                        <label for="ip-po-fnSec-appro-no" class="custom-control-label">ไม่ผ่าน</label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <textarea name="ip-po-fnSec-memo" id="ip-po-fnSec-memo" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้ดำเนินการ</b></label>
                        <input type="text" name="ip-po-fnSec-user" id="ip-po-fnSec-user" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-po-fnSec-dept" id="ip-po-fnSec-dept" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-po-fnSec-date" id="ip-po-fnSec-date" class="form-control">
                    </div>
                </div>
            </div>
        </div>


        <div id="ip-po-fnSecshowfile" class="row form-group" style="display:none;">
            <div class="col-lg-12 form-group uploadFileFnSec" style="display:none;">
                <button type="button" id="btn-po-fnSec-file" name="btn-po-fnSec-file" class="btn btn-info btn-po-fnSec-file">อัพโหลดเอกสาร</button>
            </div>
            <div class="col-lg-12 form-group">
                <label for="">อัพโหลดรูปภาพ , เอกสารที่เกี่ยวข้อง</label>
                <div id="ip_showImageFn" class="row form-group"></div><br>
            </div>
        </div>

        <div id="btn-po-savefn-section" class="row align-items-center">
            <div class="col-md-12 text-center">
            <button type="submit" id="btn-po-saveFn" name="btn-po-saveFn" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <input hidden type="text" name="check-fnsec-formcode-po" id="check-fnsec-formcode-po">
        <input hidden type="text" name="check-fnsec-areaid-po" id="check-fnsec-areaid-po">

    </div>
    </form>
</section>

<script>
    $(document).ready(function(){

        $('#frm-po-savefn').on('submit' , function(e){
            e.preventDefault();
            if($('input:radio[name=ip-po-fnSec-appro]:checked').length == 0){
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else{
                if($('input:radio[name=ip-po-fnSec-appro]:checked').val() == "ไม่ผ่าน"){
                    if($('#ip-po-fnSec-memo').val() == ""){
                        swal({
                            title: 'กรุณาระบุเหตุผลกำกับด้วยค่ะ',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else{
                        saveFn_po();
                    }
                }else{
                    saveFn_po();
                }

            }
        });

        function saveFn_po()
        {
            $('#btn-po-saveFn').prop('disabled',true);
            const form = $('#frm-po-savefn')[0];
            const data = new FormData(form);

            axios.post(url+'main/po/saveFn_po' , data , {
                header:{
                        'Content-Type' : 'multipart/form-data'
                },
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Update Data Success"){
                    swal({
                        title: 'บันทึกข้อมูลสำเร็จ',
                        type: 'success',
                        showConfirmButton: false,
                        timer:1000
                    }).then(function(){
                        location.href = url+'po.html';
                    });
                }
            });
        }

        $(document).on('click' , '.btn-po-fnSec-file' , function(){
            $('#md_po_uploadfile').modal('show');
            const formcode = $('.btn-po-fnSec-file').attr('formcode');
            const areaid = $('.btn-po-fnSec-file').attr('areaid');
            $('#ip-pof-formcode').val(formcode);
            $('#ip-pof-areaid').val(areaid);
        });
        $(document).on('click' , '#btn-po-savefile' , function(){
            // check Input
            uploadfileFnSec();

        });
        function uploadfileFnSec()
        {
            if($('#ip-pof-formcode').val() != "" && $('#ip-pof-areaid').val() != ""){
                const form = $('#frm-po-uploadfile')[0];
                const data = new FormData(form);

                axios.post(url+'main/po/uploadfileFnSec' ,data,{
                    header:{
                        'Content-Type' : 'multipart/form-data'
                    },
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Update Data Success"){
                        swal({
                            title: 'บันทึกข้อมูลสำเร็จ',
                            type: 'success',
                            showConfirmButton: false,
                            timer:1000
                        }).then(function(){
                            location.reload();
                        });
                    }else if(res.data.status == "Update Data Not Success"){
                        swal({
                            title: 'บันทึกข้อมูลไม่สำเร็จ',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else if(res.data.status == "Please Choose File"){
                        swal({
                            title: 'กรุณาเลือกไฟล์ที่ต้องการอัพโหลด',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }


                });
            }
        }


    });
</script>