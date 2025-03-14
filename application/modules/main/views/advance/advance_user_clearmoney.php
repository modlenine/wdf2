<!-- add new detail modal -->
<div class="modal fade bs-example-modal-lg" id="addnewdetailClear-modal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">

        <form id="frm_savenewdetailtoTblClear" autocomplete="off" style="width:100%;" class="needs-validation" novalidate>
        <div class="modal-content">
            <div class="modal-header">
                <h4>เพิ่มรายการ (Clear)</h4>
                <div>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
            </div>

            <div class="modal-header">
                
                <div>
                    <button type="submit" class="btn btn-success" id="btn-saveAdvAddnewDetail-clear" name="btn-saveAdvAddnewDetail-clear"><i class="fi-save mr-2"></i>บันทึก</button>
                </div>
                <div>

                </div>
            </div>

            <div class="modal-body">
                <div class="row form-group">
                    <div class="col-md-12">
                        <label for=""><b>รายการค่าใช้จ่าย</b></label>
                        <input type="text" name="adv-detaillist-addnew-clear" id="adv-detaillist-addnew-clear" class="form-control" required>
                        <div id="show-accodelist-clear"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for=""><b>Ac Code</b></label>
                        <input type="text" name="adv-accode-addnew-clear" id="adv-accode-addnew-clear" class="form-control" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for=""><b>รหัสฝ่าย</b></label>
                        <i class="fa fa-edit btnEditDept-clear"></i>
                        <input type="text" name="adv-deptcode-addnew-clear" id="adv-deptcode-addnew-clear" class="form-control" value="<?=getUser()->DeptCode?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for=""><b>Ac Code (Name)</b></label>
                        <input type="text" name="adv-accodename-addnew-clear" id="adv-accodename-addnew-clear" class="form-control" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for=""><b>จำนวนเงิน (<span class="bgBath2">THB</span>)</b><span class="textRequest"> * </span></label>
                        <input type="text" name="adv-price-addnew-clear" id="adv-price-addnew-clear" class="form-control" required>
                        <div id="alert-adv-price-addnew-clear"></div>
                    </div>

                    <input hidden type="text" name="adv-autoid-addnew-clear" id="adv-autoid-addnew-clear">
                </div>
            </div>
        
        </div>
        </form>
    </div>
</div>
<!-- add new detail modal -->


<section id="checkbudger_section">
    <form id="frm-saveUserclearmoney" autocomplete="off" class="needs-validation" novalidate>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h4>ผู้ร้องขอ เคลียร์เงินทดรองจ่าย</h4>
            </div>
        </div>
        <div class="advHr mt-3"></div>

        <div class="card card-box mt-3">
            <div class="card-header">
                รายการ (Clear)
            </div>
            <div class="card-body">
                <div class="row form-group">
                    <div class="col-md-12">
                    <i class="fa fa-plus-circle advAddDetailClear" data-toggle="tooltip" data-placement="left" title="" data-original-title="เลือกรายการเบิกตรงนี้"></i>
                        <div id="tbl-sectionclear-add" class="table-responsive">
                            <table id="tbl_advance_newClear" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="advN-th1">ลำดับ</th>
                                        <th class="advN-th2">รายการเบิก</th>
                                        <th class="advN-th3">รหัสฝ่าย</th>
                                        <th class="advN-th4">Account Code</th>
                                        <th class="advN-th5">Account Code (Name)</th>
                                        <th class="advN-th6">จำนวนเงิน</th>
                                        <th class="advN-th7">#</th>
                                    </tr>
                                </thead>
                                <tbody id="showDataAdvlistAftersave-clear"></tbody>
                                
                            </table>
                        </div>

                        <div id="tbl-sectionclear-view" class="table-responsive" style="display:none;">
                            <table id="tbl_advance_newClear" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="advN-th1">ลำดับ</th>
                                        <th class="advN-th2">รายการเบิก</th>
                                        <th class="advN-th3">รหัสฝ่าย</th>
                                        <th class="advN-th4">Account Code</th>
                                        <th class="advN-th5">Account Code (Name)</th>
                                        <th class="advN-th6">จำนวนเงิน</th>
                                    </tr>
                                </thead>
                                <tbody id="showDataAdvlistAftersave-view-clear"></tbody>
                                
                            </table>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" name="ip-advdetail-priceNonVat-clear" id="ip-advdetail-priceNonVat-clear" class="form-control" placeholder="ยอดรวม" readonly>
                            <div class="input-group-prepend">
                                <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <select name="ip-advdetail-vat7-clear" id="ip-advdetail-vat7-clear" class="form-control">
                            <option value="0">ไม่มี Vat</option>
                            <option value="7">Vat 7%</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" name="ip-advdetail-vat7Price-clear" id="ip-advdetail-vat7Price-clear" class="form-control" placeholder="จำนวนเงิน Vat" readonly>
                            <div class="input-group-prepend">
                                <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <select name="ip-advdetail-vat3-clear" id="ip-advdetail-vat3-clear" class="form-control">
                            <option value="0">ไม่มี หัก ณ ที่จ่าย</option>
                            <option value="1">หัก ณ ที่จ่าย 1%</option>
                            <option value="2">หัก ณ ที่จ่าย 2%</option>
                            <option value="3">หัก ณ ที่จ่าย 3%</option>
                            <option value="5">หัก ณ ที่จ่าย 5%</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" name="ip-advdetail-vat3Price-clear" id="ip-advdetail-vat3Price-clear" class="form-control" placeholder="จำนวนเงินหัก ณ ที่จ่าย" readonly>
                            <div class="input-group-prepend">
                                <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" name="ip-advdetail-priceTotal-clear" id="ip-advdetail-priceTotal-clear" class="form-control" placeholder="ยอดรวมสุทธิ" readonly>
                            <div class="input-group-prepend">
                                <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                            </div>
                        </div>
                    </div>
                    <input hidden type="text" name="checkMaxmoney_adv-clear" id="checkMaxmoney_adv-clear">
                </div>

                <div id="show_imageClearMoney" class="row form-group"></div>

                <div id="userclearUploadfile_section" class="row form-group">
                    <div class="col-lg-12 bottommargin">
                        <label><b>อัพโหลดรูปภาพ , เอกสารที่เกี่ยวข้อง</b></label><br>
                        <input id="ip-userClearSec-file" name="ip-userClearSec-file[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true" accept="image/*,.pdf" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <!-- <div class="col-md-12 form-group">
                        <label for=""><b>จำนวนเงินที่ใช้จริง</b></label>
                        <input type='text' name="ip-userClearSec-money" id="ip-userClearSec-money" class="form-control" required>
                    </div> -->
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <textarea name="ip-userClearSec-memo" id="ip-userClearSec-memo" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้ดำเนินการ</b></label>
                        <input type="text" name="ip-userClearSec-user" id="ip-userClearSec-user" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-userClearSec-dept" id="ip-userClearSec-dept" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-userClearSec-date" id="ip-userClearSec-date" class="form-control">
                    </div>
                </div>
            </div>
        </div>



        <div id="btn-saveUserclearmoney-section" class="row align-items-center">
            <div class="col-md-12 text-center">
            <button type="submit" id="btn-saveUserclearmoney" name="btn-saveUserclearmoney" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <div id="btn-editUserclearmoney-section" class="row align-items-center" style="display:none;">
            <div class="col-md-12 text-center">
            <button type="button" id="btn-editUserclearmoney" name="btn-editUserclearmoney" class="btn btn-warning btnSaveBg"><i class="dw dw-edit-file mr-2"></i>แก้ไข</button>
            </div>
        </div>

        <input hidden type="text" name="check-userClearSec-formcode" id="check-userClearSec-formcode">
        <input hidden type="text" name="check-userClearSec-areaid" id="check-userClearSec-areaid">
        <input hidden type="text" name="check-userClearSec-appGroup" id="check-userClearSec-appGroup">

    </div>
    </form>
</section>

<script>
    $(document).ready(function(){
        let adv_addDetailClear_array = [];
        load_advance_listClear();

        let checkfile = 0;
        $('#frm-saveUserclearmoney').on('submit' , function(e){
            e.preventDefault();
            if($('#btn-saveUserclearmoney').text() == "บันทึก"){
                if($('#ip-userClearSec-money').val() == ""){
                    swal({
                        title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                        type: 'error',
                        showConfirmButton: false,
                        timer:1000
                    });
                }else if($('#ip-userClearSec-file').val() == ""){
                        swal({
                            title: 'กรุณาอัพโหลดเอกสารเพื่อเคลียร์เงิน',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                }else{
                    saveUserclearmoney();
                }
            }else{
                if($('#ip-userClearSec-money').val() == ""){
                    swal({
                        title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                        type: 'error',
                        showConfirmButton: false,
                        timer:1000
                    });
                }else if(checkfile == 0){
                    swal({
                        title: 'กรุณาอัพโหลดเอกสารเพื่อเคลียร์เงิน',
                        type: 'error',
                        showConfirmButton: false,
                        timer:1000
                    });
                }else{
                    saveUserclearmoney();
                }
            }




        });

        function saveUserclearmoney()
        {
            $('#btn-saveUserclearmoney').prop('disabled',true);
            const form = $('#frm-saveUserclearmoney')[0];
            const data = new FormData(form);

            axios.post(url+'main/advance/saveUserclearmoney' , data , {
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
                        location.href = url+'advance.html';
                    });
                }
            });
        }

        // var checkPriceAdvPrice = $('input[name=adv_price]').val();
        // var checkNumber = /[^A-Za-zก-เ]/.test(checkPriceAdvPrice);
        $(document).on('keyup' , '#ip-userClearSec-money' , function(){
            let moneyData = $(this).val();
            let userClearSec_money = /[^-]/.test(moneyData);
            
            if(userClearSec_money == false){
                // e.preventDefault();
                moneyData = moneyData.replace(new RegExp('-','g'),"");
                
            }
            $(this).val(moneyData);
            console.log(userClearSec_money);

            // $(this).val(function (index, value) { 
            //     value = value.replace(/,/g, '');
            //     return numberWithCommas(value);
            // });
        });


        // Section Edit Data
        $(document).on('click' , '#btn-editUserclearmoney' , function(){
            const data_formcode = $(this).attr("data_formcode");
            const data_areaid = $(this).attr("data_areaid");
            adv_addDetailClear_array = [];

            if(data_formcode != "" && data_areaid != ""){
                $('#ip-userClearSec-money').prop('readonly' , false);
                $('#ip-userClearSec-memo').prop('readonly' , false);
                $('#btn-saveUserclearmoney-section').css('display' , '');
                let editbtnText = `<i class="dw dw-diskette1 mr-2"></i>บันทึกการแก้ไข`;
                $('#btn-saveUserclearmoney').html(editbtnText);
                $('#userclearUploadfile_section').css('display' , '');
                $('#btn-editUserclearmoney-section').css('display' , 'none');
                $('#check-userClearSec-formcode').val(data_formcode);
                $('#check-userClearSec-areaid').val(data_areaid);

                $('.delclear-file-edit').css('display' , '');

                checkUserClearFile(data_formcode , data_areaid);
                // editStatusUserclearmoney(data_formcode , data_areaid);

                $('.advAddDetailClear').css('display' , '');
                $('#tbl-sectionclear-add').css('display' , '');
                $('#tbl-sectionclear-view').css('display' , 'none');

                $('#ip-advdetail-priceNonVat-clear').val(0.00);
                $('#ip-advdetail-vat7Price-clear').val(0.00);
                $('#ip-advdetail-vat3Price-clear').val(0.00);
                $('#ip-advdetail-priceTotal-clear').val(0.00);

                $('#ip-advdetail-vat7-clear').removeAttr("style").removeAttr("readonly");
                $('#ip-advdetail-vat3-clear').removeAttr("style").removeAttr("readonly");

                getdata_userClearMoney_edit(data_formcode , data_areaid);
                $('#check-userClearSec-appGroup').val(99);
            }
        });

        function editStatusUserclearmoney(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/advance/editStatusUserclearmoney' , {
                    action:"editStatusUserclearmoney",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                });
            }
        }

        function checkUserClearFile(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/advance/checkUserClearFile' , {
                    action:"checkUserClearFile",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    checkfile = res.data.checkfile;
                });
            }
        }



        //Data table
        function load_advance_listClear()
        {

            $('#tbl_advance_newClear').DataTable().destroy();
            $('#tbl_advance_newClear').DataTable();

            if(adv_addDetailClear_array.length != 0){
                let tbl_detaillistAftersave = ``;
                let runningnumber = 1;
                let priceWithVat7 = 0;
                let vat7 = 0;
                let priceNoneVat = 0;
                
                
                vat7 = parseFloat($('#ip-advdetail-vat7-clear').val());


                for(let i = 0; i < adv_addDetailClear_array.length; i++){
                    tbl_detaillistAftersave += `
                    <tr>
                        <td>`+runningnumber+`</td>
                        <td>`+adv_addDetailClear_array[i].detaillist+`<input hidden type="text" id="input-detaillist" name="input-detaillist[]" value="`+adv_addDetailClear_array[i].detaillist+`"></td>
                        <td>`+adv_addDetailClear_array[i].deptcode+`<input hidden type="text" id="input-deptcode" name="input-deptcode[]" value="`+adv_addDetailClear_array[i].deptcode+`"></td>
                        <td>`+adv_addDetailClear_array[i].accode+`<input hidden type="text" id="input-accode" name="input-accode[]" value="`+adv_addDetailClear_array[i].accode+`"></td>
                        <td>`+adv_addDetailClear_array[i].accodename+`<input hidden type="text" id="input-accodename" name="input-accodename[]" value="`+adv_addDetailClear_array[i].accodename+`"></td>
                        <td>`+adv_addDetailClear_array[i].price+`<input hidden type="text" id="input-price" name="input-price[]" value="`+adv_addDetailClear_array[i].price+`"></td>
                        <td>
                            <i class="fa fa-trash del-detailList-clear" aria-hidden="true"
                                data_detailIndex="`+i+`"
                            ></i>
                            <input hidden type="text" id="input-detailautoid" name="input-detailautoid[]" value="`+adv_addDetailClear_array[i].detailautoid+`">
                        </td>
                       
                    </tr>
                    `;
                    runningnumber++;
                    let conPrice = adv_addDetailClear_array[i].price.split(",").join("");
                    priceNoneVat = priceNoneVat+parseFloat(conPrice);
                }

                $('#showDataAdvlistAftersave-clear').html(tbl_detaillistAftersave);
                $('#ip-advdetail-priceNonVat-clear').val(priceNoneVat.toFixed(2));
                $('#ip-advdetail-priceNonVat-clear').val(function(index , value){
                    value = value.replace(/,/g, '');
                    return numberWithCommas(value);
                });


                checkVatInputAllClear($('#ip-advdetail-vat3-clear').val() , $('#ip-advdetail-vat7-clear').val() , priceNoneVat);

                
            }else{
                $('#ip-advdetail-priceNonVat-clear').val(0.00);
                $('#ip-advdetail-vat7Price-clear').val(0.00);
                $('#ip-advdetail-vat3Price-clear').val(0.00);
                $('#ip-advdetail-priceTotal-clear').val(0.00);
            }

        }


        $(document).on('change' , '#ip-advdetail-vat7-clear' , function(){
            let vat3 = $('#ip-advdetail-vat3-clear').val();
            let vat7 = $('#ip-advdetail-vat7-clear').val();
            let priceNoneVat = $('#ip-advdetail-priceNonVat-clear').val().replace(/,/g, "");
            checkVatInputAllClear(vat3 , vat7 , priceNoneVat);
        });

        $(document).on('change' , '#ip-advdetail-vat3-clear' , function(){
            let vat3 = $('#ip-advdetail-vat3-clear').val();
            let vat7 = $('#ip-advdetail-vat7-clear').val();
            let priceNoneVat = $('#ip-advdetail-priceNonVat-clear').val().replace(/,/g, "");
            checkVatInputAllClear(vat3 , vat7 , priceNoneVat);
        });


        $(document).on('click' , '.advAddDetailClear' , function(){
            $('#addnewdetailClear-modal').modal('show');
            clearAddnewDetailModal_clear();
        });

        $(document).on('click' , '.btnEditDept-clear' , function(){
            $('#adv-deptcode-addnew-clear').prop('readonly' , false);
        });


        function clearAddnewDetailModal_clear()
        {
            $('#adv-deptcode-addnew-clear').prop('readonly' , true);
            $('#adv-detaillist-addnew-clear').val('');
            $('#adv-accode-addnew-clear').val('');
            $('#adv-accodename-addnew-clear').val('');
            $('#adv-price-addnew-clear').val('');
            $('#frm_savenewdetailtoTblClear').removeClass('was-validated');
        }


        $(document).on('keyup' , '#adv-detaillist-addnew-clear' , function(){
            if($(this).val() != ""){
                if(notKeySingleQ($(this).val()) == true){
                    getAcCodeList($(this).val());
                }
                console.log(notKeySingleQ($(this).val()));
            }else{
                $('#show-accodelist-clear').html('');
            }
        });


        function getAcCodeList(accodeInput)
        {
            if(accodeInput != ""){
                axios.post(url+'main/advance/getAcCodeList' , {
                    action:"getAcCodeList",
                    accodeInput:accodeInput
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let accodelistData = res.data.result;
                        let outputHtml = `<ul class="list-group mt-2 selectAcCodeListUl">`;
                                for(let i = 0; i < accodelistData.length; i++){
                                    outputHtml += `
                                    <li class="list-group-item list-group-item list-group-item-action selectAcCodeListLi"
                                        data_detailwdf_name = "`+accodelistData[i].detailwdf_name+`"
                                        data_detailwdf_accodename = "`+accodelistData[i].detailwdf_accodename+`"
                                        data_detailwdf_accode = "`+accodelistData[i].detailwdf_accode+`"
                                        data_detailwdf_id = "`+accodelistData[i].detailwdf_id+`"
                                    >
                                        <span>`+accodelistData[i].detailwdf_name+` | `+accodelistData[i].detailwdf_accodename+` | `+accodelistData[i].detailwdf_accode+`</span>
                                    </li>
                                    `;
                                }
                                outputHtml += `</ul>`;
                                $('#show-accodelist-clear').html(outputHtml);
                    }
                });
            }
        }


        $(document).on('click' , '.selectAcCodeListLi' , function(){
            const data_detailwdf_name = $(this).attr("data_detailwdf_name");
            const data_detailwdf_accodename = $(this).attr("data_detailwdf_accodename");
            const data_detailwdf_accode = $(this).attr("data_detailwdf_accode");
            const data_detailwdf_id = $(this).attr("data_detailwdf_id");

            $('#adv-detaillist-addnew-clear').val(data_detailwdf_name);
            $('#adv-accode-addnew-clear').val(data_detailwdf_accode);
            $('#adv-accodename-addnew-clear').val(data_detailwdf_accodename);
            $('#adv-autoid-addnew-clear').val(data_detailwdf_id);
            $('#show-accodelist-clear').html('');
        });


        $(document).on('keyup' , '#adv-price-addnew-clear' , function(event){
            // skip for arrow keys 
            if (event.which >= 37 && event.which <= 40) 
                    return; 
                // format number 
                $(this).val(function (index, value) { 
                    value = value.replace(/,/g, '');
                    return numberWithCommas(value);
                });

            if(keynumberOnly($(this).val()) == false){
                let alert = `
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    <strong>แจ้งเตือน !</strong> กรุณากรอกเฉพาะตัวลขเท่านั้น !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                `;
                $('#btn-saveAdvAddnewDetail-clear').prop('disabled' , true);
                $('#alert-adv-price-addnew-clear').html(alert);
            }else{
                $('#btn-saveAdvAddnewDetail-clear').prop('disabled' , false);
                $('#alert-adv-price-addnew-clear').html('');
            }

        });


        $('#frm_savenewdetailtoTblClear').on('submit' , function(e){
            e.preventDefault();
            if($('#adv-detaillist-addnew-clear').val() != "" && $('#adv-accode-addnew-clear').val() != "" && $('#adv-accodename-addnew-clear').val() != "" && $('#adv-deptcode-addnew-clear').val() != "" && $('#adv-price-addnew-clear').val() != ""){

                $('#btn-saveAdvAddnewDetail-clear').prop('disabled' , true);
                saveDetailDataToArrayClear();
            }else{
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วนด้วยค่ะ',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }
        });

        function saveDetailDataToArrayClear()
        {
            const detaillist = $('#adv-detaillist-addnew-clear').val();
            const accode = $('#adv-accode-addnew-clear').val();
            const accodename = $('#adv-accodename-addnew-clear').val();
            const deptcode = $('#adv-deptcode-addnew-clear').val();
            const price = $('#adv-price-addnew-clear').val();
            const autoid = $('#adv-autoid-addnew-clear').val();

            let saveDataDetail = {
                "detaillist":detaillist,
                "accode":accode,
                "accodename":accodename,
                "deptcode":deptcode,
                "price":price,
                "detailautoid":autoid
            }

            adv_addDetailClear_array.push(saveDataDetail);
            console.log(adv_addDetailClear_array);
            $('#btn-saveAdvAddnewDetail-clear').prop('disabled' , false);
            $('#addnewdetailClear-modal').modal('hide');
            load_advance_listClear();
        }

        $(document).on('click' , '.del-detailList-clear' , function(){
            swal({
                title: 'ท่านต้องการลบรายการนี้ ใช่หรือไม่',
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText:'ยกเลิก'
            }).then((result)=> {
                if(result.value == true){
                    const data_detailIndex = $(this).attr("data_detailIndex");
                    adv_addDetailClear_array.splice(data_detailIndex , 1);
                    load_advance_listClear();
                }
            });

        });

        function getdata_userClearMoney_edit(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/advance/getdata_userClearMoney' , {
                    action:"getdata_userClearMoney",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){

                        let userClearMoneyData = res.data.userClearMoneyData;

                        if(userClearMoneyData.wdf_urc_money != null){
                            
                            let condateUserClearMoney = moment(userClearMoneyData.wdf_urc_datetime).format('DD/MM/Y HH:mm:ss');

                            let wdf_trans = res.data.userClearMoneyTrans;

                         
                            for(let i = 0; i < wdf_trans.length; i++){

                                // let conPrice = wdf_trans[i].tr_money.split(",").join("");
                                

                                // wdf_trans_html += `
                                // <tr>
                                //     <td>`+runningnumber+`</td>
                                //     <td>`+wdf_trans[i].tr_detailname+`</td>
                                //     <td>`+wdf_trans[i].tr_deptcode+`</td>
                                //     <td>`+wdf_trans[i].tr_detailaccode+`</td>
                                //     <td>`+wdf_trans[i].tr_detailaccodename+`</td>
                                //     <td>`+numberWithCommas(conPrice)+`</td>
                                // </tr>
                                // `;
                                // runningnumber++;
                                let saveDataDetail = {
                                    "detaillist":wdf_trans[i].tr_detailname,
                                    "accode":wdf_trans[i].tr_detailaccode,
                                    "accodename":wdf_trans[i].tr_detailaccodename,
                                    "deptcode":wdf_trans[i].tr_detaildeptcode,
                                    "price":wdf_trans[i].tr_money,
                                    "detailautoid":wdf_trans[i].tr_detail_refid,
                                }

                                adv_addDetailClear_array.push(saveDataDetail);
                                load_advance_listClear();
                            }

                        }
                        

                    }
                });
            }
        }




    });
</script>