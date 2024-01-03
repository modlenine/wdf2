<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าเพิ่มรายการ ใบขอเบิกจ่าย</title>
</head>
<body>

    <!-- add new detail modal -->
    <div class="modal fade bs-example-modal-lg" id="addnewdetail-nor-modal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">

            <form id="frm_savenewdetailtoTbl_nor" autocomplete="off" style="width:100%;" class="needs-validation" novalidate>
            <div class="modal-content">
                <div class="modal-header">
                    <h4>เพิ่มรายการ</h4>
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                </div>

                <div class="modal-header">
                    
                    <div>
                        <button type="submit" class="btn btn-success" id="btn-saveNorAddnewDetail" name="btn-saveNorAddnewDetail"><i class="fi-save mr-2"></i>บันทึก</button>
                    </div>
                    <div>

                    </div>
                </div>

                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>รายการค่าใช้จ่าย</b></label>
                            <input type="text" name="nor-detaillist-addnew" id="nor-detaillist-addnew" class="form-control" required>
                            <div id="nor-show-accodelist"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for=""><b>Ac Code</b></label>
                            <input type="text" name="nor-accode-addnew" id="nor-accode-addnew" class="form-control" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for=""><b>รหัสฝ่าย</b></label>
                            <i class="fa fa-edit nor-btnEditDept"></i>
                            <input type="text" name="nor-deptcode-addnew" id="nor-deptcode-addnew" class="form-control" value="<?=getUser()->DeptCode?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for=""><b>Ac Code (Name)</b></label>
                            <input type="text" name="nor-accodename-addnew" id="nor-accodename-addnew" class="form-control" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for=""><b>จำนวนเงิน (<span class="bgBath2">THB</span>)</b><span class="textRequest"> * </span></label>
                            <input type="text" name="nor-price-addnew" id="nor-price-addnew" class="form-control" required>
                            <div id="alert-nor-price-addnew"></div>
                        </div>

                        <input hidden type="text" name="nor-autoid-addnew" id="nor-autoid-addnew">
                    </div>
                </div>
            
            </div>
            </form>
        </div>
    </div>
    <!-- add new detail modal -->



    <div class="main-container">
		<div class="pd-ltr-20">

			<div class="card-box pd-20 height-100-p mb-30">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h4>หน้าเพิ่มรายการ ใบขอเบิกจ่าย</h4>
                        <h6>Normal</h6>
                    </div>
                </div>
                <hr class="norHr">
                
                <div class="card-box pd-20 height-100-p mb-30">
                <form id="frm_saveDataNormalNew" autocomplete="off" style="width:100%;" class="needs-validation" novalidate>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>กรุณาเลือกบริษัท</b></label>
                            <div class="row">
                                <div class="col-lg-12 form-inline">
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-nor-areaid-sc" name="ip-nor-areaid" value="sc" class="custom-control-input" required> 
                                        <label for="ip-nor-areaid-sc" class="custom-control-label">Salee Colour Public Company Limited.</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-nor-areaid-pa" name="ip-nor-areaid" value="pa" class="custom-control-input" required> 
                                        <label for="ip-nor-areaid-pa" class="custom-control-label">Poly Meritasia Co.,Ltd.</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-nor-areaid-ca" name="ip-nor-areaid" value="ca" class="custom-control-input" required> 
                                        <label for="ip-nor-areaid-ca"class="custom-control-label">Composite Asia Co.,Ltd.</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-nor-areaid-st" name="ip-nor-areaid" value="st" class="custom-control-input" required> <label for="ip-nor-areaid-st" class="custom-control-label">Subterra Co.,Ltd.</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-nor-areaid-tb" name="ip-nor-areaid" value="tb" class="custom-control-input" required> 
                                        <label for="ip-nor-areaid-tb"class="custom-control-label">The bubbles Co.,Ltd.</label>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>หมายเหตุ</b></label>
                            <input type="text" name="ip-nor-memo" id="ip-nor-memo" class="form-control">
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for=""><b>ชื่อผู้ร้องขอ</b></label>
                            <input type="text" name="ip-nor-username" id="ip-nor-username" class="form-control" value="<?=getUser()->Fname." ".getUser()->Lname?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>รหัสพนักงาน</b></label>
                            <input type="text" name="ip-nor-ecode" id="ip-nor-ecode" class="form-control" value="<?=getUser()->ecode?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>แผนก</b></label>
                            <input type="text" name="ip-nor-dept" id="ip-nor-dept" class="form-control" value="<?=getUser()->Dept?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>วันที่ออกเอกสาร</b></label>
                            <input type="text" name="ip-nor-date" id="ip-nor-date" class="form-control" value="<?=date("d/m/Y H:i:s")?>" readonly>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for=""><b>ชื่อผู้รับเงิน</b></label>
                            <input type="text" name="ip-nor-userreceive" id="ip-nor-userreceive" class="form-control" value="<?=getUser()->Fname." ".getUser()->Lname?>">
                        </div>
                        <div class="col-md-8">
                            <label for=""><b>รายละเอียดผู้รับเงิน</b></label>
                            <input type="text" name="ip-nor-userreceiveDetail" id="ip-nor-userreceiveDetail" class="form-control">
                        </div>
                    </div>
                    <hr>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for=""><b>สกุลเงิน</b></label>
                            <select name="ip-nor-currency" id="ip-nor-currency" class="form-control"></select>
                        </div>
                    </div>

                    <div class="card card-box">
                        <div class="card-header">
                            รายการ
                        </div>
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-md-12">
                                <i class="fa fa-plus-circle norAddDetail" data-toggle="tooltip" data-placement="left" title="" data-original-title="เลือกรายการเบิกตรงนี้"></i>
                                    <div id="" class="table-responsive">
                                        <table id="tbl_normal_new" class="table table-bordered table-striped">
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
                                            <tbody id="showDataNorlistAftersave"></tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ip-nordetail-priceNonVat" id="ip-nordetail-priceNonVat" class="form-control" placeholder="ยอดรวม" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <select name="ip-nordetail-vat7" id="ip-nordetail-vat7" class="form-control">
                                        <option value="0">ไม่มี Vat</option>
                                        <option value="7">Vat 7%</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ip-nordetail-vat7Price" id="ip-nordetail-vat7Price" class="form-control" placeholder="จำนวนเงิน Vat" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <select name="ip-nordetail-vat3" id="ip-nordetail-vat3" class="form-control">
                                        <option value="0">ไม่มี หัก ณ ที่จ่าย</option>
                                        <option value="1">หัก ณ ที่จ่าย 1%</option>
                                        <option value="2">หัก ณ ที่จ่าย 2%</option>
                                        <option value="3">หัก ณ ที่จ่าย 3%</option>
                                        <option value="5">หัก ณ ที่จ่าย 5%</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ip-nordetail-vat3Price" id="ip-nordetail-vat3Price" class="form-control" placeholder="จำนวนเงินหัก ณ ที่จ่าย" readonly>
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
                                        <input type="text" name="ip-nordetail-priceTotal" id="ip-nordetail-priceTotal" class="form-control" placeholder="ยอดรวมสุทธิ" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                    </div>
                                </div>
                                <input hidden type="text" name="checkMaxmoney_nor" id="checkMaxmoney_nor">
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-12 bottommargin">
                                    <label>อัพโหลดรูปภาพ , เอกสารที่เกี่ยวข้อง</label><br>
                                    <input id="ip-nordetail-file" name="ip-nordetail-file[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true" accept="image/*,.pdf" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <button type="submit" id="btn-saveNormalData" name="btn-saveNormalData" class="btn btn-success" ><i class="dw dw-diskette1 mr-2"></i>บันทึกข้อมูล</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                </div>
			</div>

		</div>

	</div>


</body>
</html>

<script>
    $(document).ready(function(){
        let nor_addDetail_array = [];
        load_normal_list();
        getNorCurrencyFromDb();


        function load_normal_list()
        {

            $('#tbl_normal_new').DataTable().destroy();
            $('#tbl_normal_new').DataTable();

            if(nor_addDetail_array.length != 0){
                let tbl_detaillistAftersave = ``;
                let runningnumber = 1;
                let priceWithVat7 = 0;
                let vat7 = 0;
                let priceNoneVat = 0;
                
                
                vat7 = parseFloat($('#ip-nordetail-vat7').val());


                for(let i = 0; i < nor_addDetail_array.length; i++){
                    tbl_detaillistAftersave += `
                    <tr>
                        <td>`+runningnumber+`</td>
                        <td>`+nor_addDetail_array[i].detaillist+`<input hidden type="text" id="input-detaillist" name="input-detaillist[]" value="`+nor_addDetail_array[i].detaillist+`"></td>
                        <td>`+nor_addDetail_array[i].deptcode+`<input hidden type="text" id="input-deptcode" name="input-deptcode[]" value="`+nor_addDetail_array[i].deptcode+`"></td>
                        <td>`+nor_addDetail_array[i].accode+`<input hidden type="text" id="input-accode" name="input-accode[]" value="`+nor_addDetail_array[i].accode+`"></td>
                        <td>`+nor_addDetail_array[i].accodename+`<input hidden type="text" id="input-accodename" name="input-accodename[]" value="`+nor_addDetail_array[i].accodename+`"></td>
                        <td>`+nor_addDetail_array[i].price+`<input hidden type="text" id="input-price" name="input-price[]" value="`+nor_addDetail_array[i].price+`"></td>
                        <td>
                            <i class="fa fa-trash del-detailList-nor" aria-hidden="true"
                                data_detailIndex="`+i+`"
                            ></i>
                            <input hidden type="text" id="input-detailautoid" name="input-detailautoid[]" value="`+nor_addDetail_array[i].detailautoid+`">
                        </td>
                       
                    </tr>
                    `;
                    runningnumber++;
                    let conPrice = nor_addDetail_array[i].price.split(",").join("");
                    priceNoneVat = priceNoneVat+parseFloat(conPrice);
                }

                $('#showDataNorlistAftersave').html(tbl_detaillistAftersave);
                $('#ip-nordetail-priceNonVat').val(priceNoneVat.toFixed(2));
                $('#ip-nordetail-priceNonVat').val(function(index , value){
                    value = value.replace(/,/g, '');
                    return numberWithCommas(value);
                });


                checkVatInputAll_nor($('#ip-nordetail-vat3').val() , $('#ip-nordetail-vat7').val() , priceNoneVat);

                
            }else{
                $('#ip-nordetail-priceNonVat').val(0.00);
                $('#ip-nordetail-vat7Price').val(0.00);
                $('#ip-nordetail-vat3Price').val(0.00);
                $('#ip-nordetail-priceTotal').val(0.00);
            }

        }

        $(document).on('change' , '#ip-nordetail-vat7' , function(){
            let vat3 = $('#ip-nordetail-vat3').val();
            let vat7 = $('#ip-nordetail-vat7').val();
            let priceNoneVat = $('#ip-nordetail-priceNonVat').val().replace(/,/g, "");
            checkVatInputAll_nor(vat3 , vat7 , priceNoneVat);
        });

        $(document).on('change' , '#ip-nordetail-vat3' , function(){
            let vat3 = $('#ip-nordetail-vat3').val();
            let vat7 = $('#ip-nordetail-vat7').val();
            let priceNoneVat = $('#ip-nordetail-priceNonVat').val().replace(/,/g, "");
            checkVatInputAll_nor(vat3 , vat7 , priceNoneVat);
        });


        $(document).on('click' , '.norAddDetail' , function(){
            $('#addnewdetail-nor-modal').modal('show');
            clearAddnewDetailModal_nor();
        });

        $(document).on('click' , '.nor-btnEditDept' , function(){
            $('#nor-deptcode-addnew').prop('readonly' , false);
        });

        function clearAddnewDetailModal_nor()
        {
            $('#nor-deptcode-addnew').prop('readonly' , true);
            $('#nor-detaillist-addnew').val('');
            $('#nor-accode-addnew').val('');
            $('#nor-accodename-addnew').val('');
            $('#nor-price-addnew').val('');
            $('#frm_savenewdetailtoTbl_nor').removeClass('was-validated');
        }

        $(document).on('keyup' , '#nor-detaillist-addnew' , function(){
            if($(this).val() != ""){
                if(notKeySingleQ($(this).val()) == true){
                    getAcCodeList($(this).val());
                }
                console.log(notKeySingleQ($(this).val()));
            }else{
                $('#nor-show-accodelist').html('');
            }
        });
        function getAcCodeList(accodeInput)
        {
            if(accodeInput != ""){
                axios.post(url+'main/normal/getAcCodeList' , {
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
                                $('#nor-show-accodelist').html(outputHtml);
                    }
                });
            }
        }

        $(document).on('click' , '.selectAcCodeListLi' , function(){
            const data_detailwdf_name = $(this).attr("data_detailwdf_name");
            const data_detailwdf_accodename = $(this).attr("data_detailwdf_accodename");
            const data_detailwdf_accode = $(this).attr("data_detailwdf_accode");
            const data_detailwdf_id = $(this).attr("data_detailwdf_id");

            $('#nor-detaillist-addnew').val(data_detailwdf_name);
            $('#nor-accode-addnew').val(data_detailwdf_accode);
            $('#nor-accodename-addnew').val(data_detailwdf_accodename);
            $('#nor-autoid-addnew').val(data_detailwdf_id);
            $('#nor-show-accodelist').html('');
        });


        $(document).on('keyup' , '#nor-price-addnew' , function(event){
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
                $('#btn-saveNorAddnewDetail').prop('disabled' , true);
                $('#alert-nor-price-addnew').html(alert);
            }else{
                $('#btn-saveNorAddnewDetail').prop('disabled' , false);
                $('#alert-nor-price-addnew').html('');
            }

        });

        $('#frm_savenewdetailtoTbl_nor').on('submit' , function(e){
            e.preventDefault();
            if($('#nor-detaillist-addnew').val() != "" && $('#nor-accode-addnew').val() != "" && $('#nor-accodename-addnew').val() != "" && $('#nor-deptcode-addnew').val() != "" && $('#nor-price-addnew').val() != ""){

                $('#btn-saveNorAddnewDetail').prop('disabled' , true);
                saveDetailDataToArray();
            }else{
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วนด้วยค่ะ',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }
        });
        function saveDetailDataToArray()
        {
            const detaillist = $('#nor-detaillist-addnew').val();
            const accode = $('#nor-accode-addnew').val();
            const accodename = $('#nor-accodename-addnew').val();
            const deptcode = $('#nor-deptcode-addnew').val();
            const price = $('#nor-price-addnew').val();
            const autoid = $('#nor-autoid-addnew').val();

            let saveDataDetail = {
                "detaillist":detaillist,
                "accode":accode,
                "accodename":accodename,
                "deptcode":deptcode,
                "price":price,
                "detailautoid":autoid
            }

            nor_addDetail_array.push(saveDataDetail);
            console.log(nor_addDetail_array);
            $('#btn-saveNorAddnewDetail').prop('disabled' , false);
            $('#addnewdetail-nor-modal').modal('hide');
            load_normal_list();
        }

        $(document).on('click' , '.del-detailList-nor' , function(){
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
                    nor_addDetail_array.splice(data_detailIndex , 1);
                    load_normal_list();
                }
            });

        });



        $('input:radio[name="ip-nor-areaid"]').on('change' , function(){
            console.log($(this).val());
            let groupAreaid = $(this).val();
            if(groupAreaid != "tb"){
                groupAreaid = "sc,pa,ca,st";
            }
            getMaximumMoney_nor(groupAreaid , "wdf");
        });


        function getMaximumMoney_nor(groupAreaid , doctype)
        {
            if(groupAreaid != "" && doctype != ""){
                axios.post(url+'main/salary/getMaximumMoney_sal' , {
                    action:"getMaximumMoney_sal",
                    groupAreaid:groupAreaid,
                    doctype:doctype
                }).then(res=>{
                    console.log(res.data);
                    $('#checkMaxmoney_nor').val(res.data.maxmoney.pay_scope_end);
                });
            }
        }



        $('#frm_saveDataNormalNew').on('submit' , function(e){
            e.preventDefault();

            if($('input:radio[name="ip-nor-areaid"]:checked').length == 0){
                swal({
                    title: 'กรุณาเลือกบริษัท',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else if($('#ip-nordetail-priceTotal').val() == 0){
                swal({
                    title: 'กรุณากรอกรายละเอียดการทำรายการ',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else if($('#ip-nordetail-file').val() == ""){
                swal({
                    title: 'กรุณาอัพโหลดเอกสาร',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else{
                saveDataNormalNew();
            }


        });



        function saveDataNormalNew()
        {
            $('#btn-saveNormalData').prop('disabled' , true);

            let realMoney = $('#ip-nordetail-priceTotal').val();
            let nor_maxmoney = $('#checkMaxmoney_nor').val();

            realMoney = realMoney.replace(/,/g, "");

            if(parseFloat(realMoney) > parseFloat(nor_maxmoney)){
                swal({
                    title: 'จำนวนเงินที่ทำรายการเกินวงเงินสูงสุด',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
                $('#btn-saveNormalData').prop('disabled' , false);
            }else{
                const form = $('#frm_saveDataNormalNew')[0];
                const data = new FormData(form);

                axios.post(url+'main/normal/saveDataNormalNew' , data , {
                    header:{
                        'Content-Type' : 'multipart/form-data'
                    },
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Insert Data Success"){
                        swal({
                            title: 'บันทึกข้อมูลเรียบร้อย',
                            type: 'success',
                            showConfirmButton: false,
                            timer:1000
                        }).then(function(){
                            location.href = url+'normal.html';
                        });
                    }
                });
            }

        }



        function getNorCurrencyFromDb()
        {
            axios.get(url+'main/normal/getNorCurrencyFromDb').then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let result = res.data.result;
                    let output = ``;
                    for(let i = 0; i < result.length ; i++){
                        output +=`
                        <option value="`+result[i].cu_name+`">`+result[i].cu_name+`</option>
                        `;
                    }
                    $('#ip-nor-currency').html(output);

                    $(document).on('change' , '#ip-nor-currency' , function(){
                        if($(this).val() !== ""){
                            $('.bgBath').text($(this).val());
                            $('.bgBath2').text($(this).val());

                        }

                        $('#ip-nordetail-vat3').val("0");
                        $('#ip-nordetail-vat7').val("0")

                        let vat3 = $('#ip-nordetail-vat3').val();
                        let vat7 = $('#ip-nordetail-vat7').val();
                        let priceNoneVat = $('#ip-nordetail-priceNonVat').val().replace(/,/g, "");

                        if($(this).val() !== "THB"){
                            $('#ip-nordetail-vat7').attr("style", "pointer-events: none;");
                            $('#ip-nordetail-vat3').attr("style", "pointer-events: none;");
                            vat3 = 0;
                            vat7 = 0;
                        }else{
                            $('#ip-nordetail-vat7').attr("style", "pointer-events: ;");
                            $('#ip-nordetail-vat3').attr("style", "pointer-events: ;");
                        }

                        checkVatInputAll_nor(vat3 , vat7 , priceNoneVat);
                    });
                }
            });
        }

        






    });
</script>