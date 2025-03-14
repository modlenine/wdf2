<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าเพิ่มรายการ ใบขอเบิกจ่าย (PO)</title>

</head>
<body>

    <!-- add new detail modal -->
    <div class="modal fade bs-example-modal-lg" id="addnewdetail-po-modal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">

            <form id="frm_savenewdetailtoTbl_po" autocomplete="off" style="width:100%;" class="needs-validation" novalidate>
            <div class="modal-content">
                <div class="modal-header">
                    <h4>เพิ่มรายการ</h4>
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                </div>

                <div class="modal-header">
                    
                    <div>
                        <button type="submit" class="btn btn-success" id="btn-savePoAddnewDetail" name="btn-savePoAddnewDetail"><i class="fi-save mr-2"></i>บันทึก</button>
                    </div>
                    <div>

                    </div>
                </div>

                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>รายการค่าใช้จ่าย</b></label>
                            <input type="text" name="po-detaillist-addnew" id="po-detaillist-addnew" class="form-control" required>
                            <div id="po-show-accodelist"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for=""><b>Ac Code</b></label>
                            <input type="text" name="po-accode-addnew" id="po-accode-addnew" class="form-control" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for=""><b>รหัสฝ่าย</b></label>
                            <i class="fa fa-edit po-btnEditDept"></i>
                            <input type="text" name="po-deptcode-addnew" id="po-deptcode-addnew" class="form-control" value="<?=getUser()->DeptCode?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for=""><b>Ac Code (Name)</b></label>
                            <input type="text" name="po-accodename-addnew" id="po-accodename-addnew" class="form-control" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for=""><b>จำนวนเงิน (<span class="bgBath2">THB</span>)</b><span class="textRequest"> * </span></label>
                            <input type="text" name="po-price-addnew" id="po-price-addnew" class="form-control" required>
                            <div id="alert-po-price-addnew"></div>
                        </div>

                        <input hidden type="text" name="po-autoid-addnew" id="po-autoid-addnew">
                    </div>
                </div>
            
            </div>
            </form>
        </div>
    </div>

    <div class="modal fade bs-example-modal-lg" id="showPo-po-modal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">

            <div class="modal-content">
                <div class="modal-header">
                    <h4>รายการ Po รอดำเนินการ</h4>
                    <div>
                        <button type="button" class="close closePolist" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                </div>
                <div class="modal-body">
                    <div id="show-po-byVendor"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- add new detail modal -->



    <div class="main-container">
		<div class="pd-ltr-20">

			<div class="card-box pd-20 height-100-p mb-30">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h4>หน้าเพิ่มรายการ ใบขอเบิกจ่าย (PO)</h4>
                        <h6>PO</h6>
                    </div>
                </div>
                <hr class="poHr">
                
                <div class="card-box pd-20 height-100-p mb-30">
                <form id="frm_saveDataPoNew" autocomplete="off" style="width:100%;" class="needs-validation" enctype="multipart/form-data" novalidate>

                    <section id="add-po-sec1">
                        <div class="row form-group" id="ip-po-sec1">
                            <div class="col-md-12">
                                <label for=""><b>กรุณาเลือกบริษัท</b></label>
                                <div class="row">
                                    <div class="col-lg-12 form-inline">
                                        <div class="custom-control custom-radio mb-5 ml-3">
                                            <input type="radio" id="ip-po-areaid-sc" name="ip-po-areaid" value="sc" class="custom-control-input" required> 
                                            <label for="ip-po-areaid-sc" class="custom-control-label">Salee Colour Public Company Limited.</label>
                                        </div> 
                                        <div class="custom-control custom-radio mb-5 ml-3">
                                            <input type="radio" id="ip-po-areaid-pa" name="ip-po-areaid" value="pa" class="custom-control-input" required> 
                                            <label for="ip-po-areaid-pa" class="custom-control-label">Poly Meritasia Co.,Ltd.</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-5 ml-3">
                                            <input type="radio" id="ip-po-areaid-ca" name="ip-po-areaid" value="ca" class="custom-control-input" required> 
                                            <label for="ip-po-areaid-ca"class="custom-control-label">Composite Asia Co.,Ltd.</label>
                                        </div> 
                                        <div class="custom-control custom-radio mb-5 ml-3">
                                            <input type="radio" id="ip-po-areaid-st" name="ip-po-areaid" value="st" class="custom-control-input" required> <label for="ip-po-areaid-st" class="custom-control-label">Subterra Co.,Ltd.</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-5 ml-3">
                                            <input type="radio" id="ip-po-areaid-tb" name="ip-po-areaid" value="tb" class="custom-control-input" required> 
                                            <label for="ip-po-areaid-tb"class="custom-control-label">The bubbles Co.,Ltd.</label>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group" id="ip-po-sec2" style="display:none;">
                            <div class="col-md-6 form-group">
                                <label for=""><b>กรุณาพิมพ์ข้อมูล Vendor ( ค้นหาโดย Taxid , TH , ชื่อบริษัท )</b></label>
                                <input type="text" name="ip-po-chooseVendor" id="ip-po-chooseVendor" class="form-control">
                                <div id="po-show-vendorList" class="mt-3"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><b>Vendor ที่เลือก</b></label>
                                <input type="text" name="ip-po-selectVendor" id="ip-po-selectVendor" class="form-control" readonly>
                            </div>
                        </div>
                    </section>

                    <section id="add-po-sec2" style="display:none;">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for=""><b>หมายเหตุ</b></label>
                                <input type="text" name="ip-po-memo" id="ip-po-memo" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-3">
                                <label for=""><b>ชื่อผู้ร้องขอ</b></label>
                                <input type="text" name="ip-po-username" id="ip-po-username" class="form-control" value="<?=getUser()->Fname." ".getUser()->Lname?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <label for=""><b>รหัสพนักงาน</b></label>
                                <input type="text" name="ip-po-ecode" id="ip-po-ecode" class="form-control" value="<?=getUser()->ecode?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <label for=""><b>แผนก</b></label>
                                <input type="text" name="ip-po-dept" id="ip-po-dept" class="form-control" value="<?=getUser()->Dept?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <label for=""><b>วันที่ออกเอกสาร</b></label>
                                <input type="text" name="ip-po-date" id="ip-po-date" class="form-control" value="<?=date("d/m/Y H:i:s")?>" readonly>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for=""><b>ชื่อผู้รับเงิน</b></label>
                                <input type="text" name="ip-po-userreceive" id="ip-po-userreceive" class="form-control">
                            </div>
                            <div class="col-md-8">
                                <label for=""><b>รายละเอียดผู้รับเงิน</b></label>
                                <input type="text" name="ip-po-userreceiveDetail" id="ip-po-userreceiveDetail" class="form-control">
                            </div>
                        </div>
                        <hr>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for=""><b>สกุลเงิน</b></label>
                                <select name="ip-po-currency" id="ip-po-currency" class="form-control"></select>
                            </div>
                            <div class="col-md-6">
                                <label for=""><b>เลขที่ PO</b></label>
                                <input type="text" name="ip-po-ponumber" id="ip-po-ponumber" class="form-control" required>
                            </div>
                        </div>

                        <div class="card card-box">
                            <div class="card-header">
                                รายการ
                            </div>
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col-md-12">
                                    <i class="fa fa-plus-circle poAddDetail" data-toggle="tooltip" data-placement="left" title="" data-original-title="เลือกรายการเบิกตรงนี้"></i>
                                        <div id="" class="table-responsive">
                                            <table id="tbl_po_new" class="table table-bordered table-striped">
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
                                                <tbody id="showDataPolistAftersave"></tbody>
                                                
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" name="ip-podetail-priceNonVat" id="ip-podetail-priceNonVat" class="form-control" placeholder="ยอดรวม" readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <select name="ip-podetail-vat7" id="ip-podetail-vat7" class="form-control">
                                            <option value="0">ไม่มี Vat</option>
                                            <option value="7">Vat 7%</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" name="ip-podetail-vat7Price" id="ip-podetail-vat7Price" class="form-control" placeholder="จำนวนเงิน Vat" readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <select name="ip-podetail-vat3" id="ip-podetail-vat3" class="form-control">
                                            <option value="0">ไม่มี หัก ณ ที่จ่าย</option>
                                            <option value="1">หัก ณ ที่จ่าย 1%</option>
                                            <option value="2">หัก ณ ที่จ่าย 2%</option>
                                            <option value="3">หัก ณ ที่จ่าย 3%</option>
                                            <option value="5">หัก ณ ที่จ่าย 5%</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" name="ip-podetail-vat3Price" id="ip-podetail-vat3Price" class="form-control" placeholder="จำนวนเงินหัก ณ ที่จ่าย" readonly>
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
                                            <input type="text" name="ip-podetail-priceTotal" id="ip-podetail-priceTotal" class="form-control" placeholder="ยอดรวมสุทธิ" readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <input hidden type="text" name="checkMaxmoney" id="checkMaxmoney">

                                <div class="row form-group">
                                    <div class="col-lg-12 bottommargin">
                                        <label>อัพโหลดรูปภาพ , เอกสารที่เกี่ยวข้อง</label><br>
                                        <input id="ip-podetail-file" name="ip-podetail-file[]" type="file" class="file" multiple accept="image/*,.pdf" data-show-upload="false" required>
                                    
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <button type="submit" id="btn-savePoData" name="btn-savePoData" class="btn btn-success m-2" ><i class="dw dw-diskette1 mr-2"></i>บันทึกข้อมูล</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </form>
                </div>
			</div>

		</div>

	</div>


</body>
</html>

<script>

    $(document).ready(function(){
        let po_addDetail_array = [];
        load_po_list();
        getPoCurrencyFromDb();

        let vendorData = {
            'accountnum':'',
            'address':'',
            'bpc_whtid':'',
            'dataareaid':'',
            'dataareaid_long':'',
            'email':'',
            'name':'',
            'paymtermid':'',
            'phone':'',
            'slc_fname':'',
            'slc_lname':'',
            'street':'',
            'vendgroup':''
        };

        let poMainData = {
            'amount':0,
            'batchid':'',
            'bpc_documentdate':'',
            'bpc_purchasereqno':'',
            'dataareaid':'',
            'deliverydate':'',
            'invoiceaccount':'',
            'itemnames':'',
            'items':'',
            'purchaseorderid':'',
            'purchid':'',
            'purchorderdate':'',
            'purchorderdocnum':'',
            'purchunit':'',
            'qty':0,
            'salesorderbalance':0
        }

        // ตรวจสอบการคลิกที่ radio
        $('input[name="ip-po-areaid"]').on('change', function() {
            let selectedValue = $('input[name="ip-po-areaid"]:checked').val();
            $('#ip-po-selectVendor').val('');
            $('#ip-po-chooseVendor').val('');
            $('#show-po-byVendor').html('');
            $('#po-show-vendorList').html('');
            po_addDetail_array = [];
            $('#ip-po-ponumber').val('');
            $('.fileinput-remove').click();

            if(selectedValue){
                $('#ip-po-sec2').css("display" , "");
            }else{
                $('#ip-po-sec2').css("display" , "none");
            }

            $('#add-po-sec2').css('display' , 'none');
            load_po_list();
            
        });

        function load_po_list()
        {

            $('#tbl_po_new').DataTable().destroy();
            $('#tbl_po_new').DataTable();

            if(po_addDetail_array.length != 0){
                let tbl_detaillistAftersave = ``;
                let runningnumber = 1;
                let priceWithVat7 = 0;
                let vat7 = 0;
                let priceNoneVat = 0;
                
                
                vat7 = parseFloat($('#ip-podetail-vat7').val());


                for(let i = 0; i < po_addDetail_array.length; i++){
                    tbl_detaillistAftersave += `
                    <tr>
                        <td>`+runningnumber+` <span style="font-size:10px;">( <b>`+po_addDetail_array[i].purchstatus_text+ `</b>)</span></td>
                        <td>`+po_addDetail_array[i].detaillist+`<input hidden type="text" id="input-detaillist" name="input-detaillist[]" value="`+po_addDetail_array[i].detaillist+`"></td>
                        <td>`+po_addDetail_array[i].deptcode+`<input hidden type="text" id="input-deptcode" name="input-deptcode[]" value="`+po_addDetail_array[i].deptcode+`"></td>
                        <td>`+po_addDetail_array[i].accode+`<input hidden type="text" id="input-accode" name="input-accode[]" value="`+po_addDetail_array[i].accode+`"></td>
                        <td>`+po_addDetail_array[i].accodename+`<input hidden type="text" id="input-accodename" name="input-accodename[]" value="`+po_addDetail_array[i].accodename+`"></td>
                        <td>`+po_addDetail_array[i].price+`<input hidden type="text" id="input-price" name="input-price[]" value="`+po_addDetail_array[i].price+`"></td>
                        <td>
                            <i class="fa fa-trash del-detailList-po" aria-hidden="true"
                                data_detailIndex="`+i+`"
                            ></i>
                            <input hidden type="text" id="inputs-itemid" name="inputs-itemid[]" value="`+po_addDetail_array[i].itemid+`">
                            <input hidden type="text" id="inputs-itemname" name="inputs-itemname[]" value="`+po_addDetail_array[i].itemname+`">
                            <input hidden type="text" id="inputs-itemgroup" name="inputs-itemgroup[]" value="`+po_addDetail_array[i].itemgroup+`">
                        </td>
                       
                    </tr>
                    `;
                    runningnumber++;
                    let conPrice = po_addDetail_array[i].price.split(",").join("");
                    priceNoneVat = priceNoneVat+parseFloat(conPrice);
                }

                $('#showDataPolistAftersave').html(tbl_detaillistAftersave);
                $('#ip-podetail-priceNonVat').val(priceNoneVat.toFixed(2));
                $('#ip-podetail-priceNonVat').val(function(index , value){
                    value = value.replace(/,/g, '');
                    return numberWithCommas(value);
                });


                checkVatInputAll_po($('#ip-podetail-vat3').val() , $('#ip-podetail-vat7').val() , priceNoneVat);

                
            }else{
                $('#ip-podetail-priceNonVat').val(0.00);
                $('#ip-podetail-vat7Price').val(0.00);
                $('#ip-podetail-vat3Price').val(0.00);
                $('#ip-podetail-priceTotal').val(0.00);
            }

        }

        $(document).on('change' , '#ip-podetail-vat7' , function(){
            let vat3 = $('#ip-podetail-vat3').val();
            let vat7 = $('#ip-podetail-vat7').val();
            let priceNoneVat = $('#ip-podetail-priceNonVat').val().replace(/,/g, "");
            checkVatInputAll_po(vat3 , vat7 , priceNoneVat);
        });

        $(document).on('change' , '#ip-podetail-vat3' , function(){
            let vat3 = $('#ip-podetail-vat3').val();
            let vat7 = $('#ip-podetail-vat7').val();
            let priceNoneVat = $('#ip-podetail-priceNonVat').val().replace(/,/g, "");
            checkVatInputAll_po(vat3 , vat7 , priceNoneVat);
        });


        $(document).on('click' , '.poAddDetail' , function(){
            $('#addnewdetail-po-modal').modal('show');
            clearAddnewDetailModal_po();
        });

        $(document).on('click' , '.po-btnEditDept' , function(){
            $('#po-deptcode-addnew').prop('readonly' , false);
        });

        function clearAddnewDetailModal_po()
        {
            $('#po-deptcode-addnew').prop('readonly' , true);
            $('#po-detaillist-addnew').val('');
            $('#po-accode-addnew').val('');
            $('#po-accodename-addnew').val('');
            $('#po-price-addnew').val('');
            $('#frm_savenewdetailtoTbl_po').removeClass('was-validated');
        }

        $(document).on('keyup' , '#po-detaillist-addnew' , function(){
            if($(this).val() != ""){
                if(notKeySingleQ($(this).val()) == true){
                    getAcCodeList($(this).val());
                }
                console.log(notKeySingleQ($(this).val()));
            }else{
                $('#po-show-accodelist').html('');
            }
        });
        function getAcCodeList(accodeInput)
        {
            if(accodeInput != ""){
                axios.post(url+'main/po/getAcCodeList' , {
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
                                $('#po-show-accodelist').html(outputHtml);
                    }
                });
            }
        }

        $(document).on('click' , '.selectAcCodeListLi' , function(){
            const data_detailwdf_name = $(this).attr("data_detailwdf_name");
            const data_detailwdf_accodename = $(this).attr("data_detailwdf_accodename");
            const data_detailwdf_accode = $(this).attr("data_detailwdf_accode");
            const data_detailwdf_id = $(this).attr("data_detailwdf_id");

            $('#po-detaillist-addnew').val(data_detailwdf_name);
            $('#po-accode-addnew').val(data_detailwdf_accode);
            $('#po-accodename-addnew').val(data_detailwdf_accodename);
            $('#po-autoid-addnew').val(data_detailwdf_id);
            $('#po-show-accodelist').html('');
        });


        $(document).on('keyup' , '#po-price-addnew' , function(event){
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
                $('#btn-savePoAddnewDetail').prop('disabled' , true);
                $('#alert-po-price-addnew').html(alert);
            }else{
                $('#btn-savePoAddnewDetail').prop('disabled' , false);
                $('#alert-po-price-addnew').html('');
            }

        });

        $('#frm_savenewdetailtoTbl_po').on('submit' , function(e){
            e.preventDefault();
            if($('#po-detaillist-addnew').val() != "" && $('#po-accode-addnew').val() != "" && $('#po-accodename-addnew').val() != "" && $('#po-deptcode-addnew').val() != "" && $('#po-price-addnew').val() != ""){

                $('#btn-savePoAddnewDetail').prop('disabled' , true);
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
            const detaillist = $('#po-detaillist-addnew').val();
            const accode = $('#po-accode-addnew').val();
            const accodename = $('#po-accodename-addnew').val();
            const deptcode = $('#po-deptcode-addnew').val();
            const price = $('#po-price-addnew').val();
            const autoid = $('#po-autoid-addnew').val();

            let saveDataDetail = {
                "detaillist":detaillist,
                "accode":accode,
                "accodename":accodename,
                "deptcode":deptcode,
                "price":price,
                "detailautoid":autoid
            }

            po_addDetail_array.push(saveDataDetail);
            console.log(po_addDetail_array);
            $('#btn-savePoAddnewDetail').prop('disabled' , false);
            $('#addnewdetail-po-modal').modal('hide');
            load_po_list();
        }

        
        $(document).on('click' , '.del-detailList-po' , function(){
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
                    po_addDetail_array.splice(data_detailIndex , 1);
                    load_po_list();
                }
            });

        });

        $('input:radio[name="ip-po-areaid"]').on('change' , function(){
            console.log($(this).val());
            let groupAreaid = $(this).val();
            if(groupAreaid != "tb"){
                groupAreaid = "sc,pa,ca,st";
            }
            // getMaximumMoney_po(groupAreaid , "po");
        });

        $('#frm_saveDataPoNew').on('submit' , function(e){

            e.preventDefault();

            if($('input:radio[name="ip-po-areaid"]:checked').length == 0){
                swal({
                    title: 'กรุณาเลือกบริษัท',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else if($('#ip-podetail-priceTotal').val() == 0){
                swal({
                    title: 'กรุณากรอกรายละเอียดการทำรายการ',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else{
                saveDataPoNew();
            }

        });

        function saveDataPoNew()
        {
            $('#btn-savePoData').prop('disabled' , true);

            if($('#ip-podetail-priceTotal').val() != ""){

                const form = $('#frm_saveDataPoNew')[0];
                const data = new FormData(form);

                axios.post(url+'main/po/saveDataPoNew' , data , {
                    header:{
                        'Content-Type' : 'multipart/form-data'
                    },
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Insert Data Success"){
                        let formcode = res.data.formcode;
                        let formno = res.data.formno;
                        swal({
                            title: 'บันทึกข้อมูลเรียบร้อย',
                            type: 'success',
                            showConfirmButton: false,
                            timer:1000
                        }).then(function(){
                            location.href = url+'po.html/';
                        });
                    }
                });
            }else{
                $('#btn-savePoData').prop('disabled' , false);
            }

            
        }


        function getPoCurrencyFromDb()
        {
            axios.get(url+'main/po/getPoCurrencyFromDb').then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let result = res.data.result;
                    let output = ``;
                    for(let i = 0; i < result.length ; i++){
                        output +=`
                        <option value="`+result[i].cu_name+`">`+result[i].cu_name+`</option>
                        `;
                    }
                    $('#ip-po-currency').html(output);

                    $(document).on('change' , '#ip-po-currency' , function(){
                        if($(this).val() !== ""){
                            $('.bgBath').text($(this).val());
                            $('.bgBath2').text($(this).val());

                        }

                        $('#ip-podetail-vat3').val("0");
                        $('#ip-podetail-vat7').val("0")

                        let vat3 = $('#ip-podetail-vat3').val();
                        let vat7 = $('#ip-podetail-vat7').val();
                        let priceNoneVat = $('#ip-podetail-priceNonVat').val().replace(/,/g, "");

                        if($(this).val() !== "THB"){
                            $('#ip-podetail-vat7').attr("style", "pointer-events: none;");
                            $('#ip-podetail-vat3').attr("style", "pointer-events: none;");
                            vat3 = 0;
                            vat7 = 0;
                        }else{
                            $('#ip-podetail-vat7').attr("style", "pointer-events: ;");
                            $('#ip-podetail-vat3').attr("style", "pointer-events: ;");
                        }

                        checkVatInputAll_po(vat3 , vat7 , priceNoneVat);
                    });
                }
            });
        }


        //search vendor data
        $("#ip-po-chooseVendor").keyup(function(){
            let vendDataSearch = $(this).val();
            let selectedValue = $('input[name="ip-po-areaid"]:checked').val();

            if(selectedValue == "sc"){
                selectedValue = "sln";
            }else if(selectedValue == "pa"){
                selectedValue = "poly";
            }else if(selectedValue == "ca"){
                selectedValue = "ca";
            }else if(selectedValue == "st"){
                selectedValue = "st";
            }else if(selectedValue == "tb"){
                selectedValue = "tbb";
            }else{
                selectedValue = "";
            }

            if($(this).val() != ""){
                getVendinformation(vendDataSearch , selectedValue);
            }else{
                $('#po-show-vendorList').html("");
            }
        });

        function getVendinformation(vendDataSearch , dataareaid)
        {
            const formdata = new FormData();
            formdata.append('vendDataSearch' , vendDataSearch);
            formdata.append('dataareaid' , dataareaid)

            axios.post(url+'main/po/getVendinformation' , formdata).then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let vendorDataList = res.data.result;
                    let outputHtml = `<ul class="list-group mt-2 selectVendorListUl">`;
                    for(let i = 0; i < vendorDataList.length; i++){
                        outputHtml += `
                        <li class="list-group-item list-group-item list-group-item-action selectVendorListLi"
                            data_accountnum = "`+vendorDataList[i].accountnum+`"
                            data_address = "`+vendorDataList[i].address+`"
                            data_bpc_whtid = "`+vendorDataList[i].bpc_whtid+`"
                            data_dataareaid = "`+vendorDataList[i].dataareaid+`"
                            data_dataareaid_long = "`+vendorDataList[i].dataareaid_long+`"
                            data_email = "`+vendorDataList[i].email+`"
                            data_name = "`+vendorDataList[i].name+`"
                            data_paymtermid = "`+vendorDataList[i].paymtermid+`"
                            data_phone = "`+vendorDataList[i].phone+`"
                            data_slc_fname = "`+vendorDataList[i].slc_fname+`"
                            data_street = "`+vendorDataList[i].street+`"
                            data_vendgroup = "`+vendorDataList[i].vendgroup+`"
                        >
                            <span>`+vendorDataList[i].name+`</span><br>
                            <span><b>Tax ID.</b> `+vendorDataList[i].bpc_whtid+`</span><br>
                            <span><b>`+vendorDataList[i].accountnum+` ( `+vendorDataList[i].dataareaid_long+` )</b></span>
                        </li>
                        `;
                    }
                    outputHtml += `</ul>`;
                    $('#po-show-vendorList').html(outputHtml);
                }
            });
        }

        $(document).on('click' , '.selectVendorListLi' , function(){
            const data_bpc_whtid = $(this).attr('data_bpc_whtid');
            const data_accountnum = $(this).attr('data_accountnum');
            const data_dataareaid = $(this).attr('data_dataareaid');
            const name = $(this).attr('data_name');

                vendorData = {
                'accountnum':data_accountnum,
                'address':'',
                'bpc_whtid':data_bpc_whtid,
                'dataareaid':data_dataareaid,
                'dataareaid_long':'',
                'email':'',
                'name':name,
                'paymtermid':'',
                'phone':'',
                'slc_fname':'',
                'slc_lname':'',
                'street':'',
                'vendgroup':''
            };

            if(data_dataareaid === 'sln' || data_dataareaid === 'ca'){
                $('#showPo-po-modal').modal('show');
                getPoByVendor(data_bpc_whtid , data_accountnum , data_dataareaid);
            }
            $('#ip-po-selectVendor').val(name);
            $('#add-po-sec2').css('display' , '');
            $('#po-show-vendorList').html('');
            $('#ip-po-userreceiveDetail').val(vendorData.name);
            $('#ip-po-userreceive').val(vendorData.name);


            console.log(vendorData);
        });

        async function getPoByVendor(data_bpc_whtid , data_accountnum , data_dataareaid)
        {
            const formdata = new FormData();
            formdata.append('data_bpc_whtid' , data_bpc_whtid);
            formdata.append('data_accountnum' , data_accountnum);
            formdata.append('data_dataareaid' , data_dataareaid);

            try {
                const res = await axios.post(url+'main/po/getPoByVendor' , formdata);
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let poDataList = res.data.result;
                    let outputHtml = `<ul class="list-group mt-2 poDataListUl">`;
                    for(let i = 0; i < poDataList.length; i++){
                        outputHtml += `
                        <li class="list-group-item list-group-item list-group-item-action poDataListLi"
                            data_purchid="`+poDataList[i].purchid+`"
                            data_dataareaid="`+poDataList[i].dataareaid+`"
                            data_amount="`+poDataList[i].ampunt+`"
                            data_batchid="`+poDataList[i].batchid+`"
                            data_bpc_documentdate="`+poDataList[i].bpc_documentdate+`"
                            data_bpc_purchasereqno="`+poDataList[i].bpc_purchasereqno+`"
                            data_deliverydate="`+poDataList[i].deliverydate+`"
                            data_invoiceaccount="`+poDataList[i].invoiceaccount+`"
                            data_itemnames="`+poDataList[i].itemnames+`"
                            data_items="`+poDataList[i].items+`"
                            data_purchaseorderid="`+poDataList[i].purchaseorderid+`"
                            data_purchorderdate="`+poDataList[i].purchorderdate+`"
                            data_purchorderdocnum="`+poDataList[i].purchorderdocnum+`"
                            data_purchunit="`+poDataList[i].purchunit+`"
                            data_qty="`+poDataList[i].qty+`"
                            data_salesorderbalance="`+poDataList[i].salesorderbalance+`"
                            data_currencycode="`+poDataList[i].currencycode+`"
                        >
                            <span><b>`+poDataList[i].purchid+`</b></span><br>
                            <span><b>เลขที่ PR : `+poDataList[i].bpc_purchasereqno+`</b></span><br>
                            <span><b>สินค้า : `+poDataList[i].items+`</b></span><br>
                            <span><b>Batch : `+poDataList[i].batchid+`</b></span>
                        </li>
                        `;
                    }
                    outputHtml += `</ul>`;
                    $('#show-po-byVendor').html(outputHtml);
                }
            } catch (error) {
                console.error('Error:', error); // แสดงข้อผิดพลาดใน console
                throw error; // สามารถโยนข้อผิดพลาดกลับเพื่อให้ฟังก์ชันที่เรียกใช้รู้ว่ามีปัญหาเกิดขึ้น
            }

        }



        $(document).on('click' , '.closePolist' , function(){
            $('#ip-po-selectVendor').val('');
            $('#ip-po-chooseVendor').val('');
            $('#show-po-byVendor').html('');
            $('#po-show-vendorList').html('');
        });
        

        $(document).on('click' , '.poDataListLi' , function (){
            po_addDetail_array = [];
            const data_purchid = $(this).attr("data_purchid");
            const data_dataareaid = $(this).attr("data_dataareaid");
            const data_purchaseorderid = $(this).attr("data_purchaseorderid");

            const data_amount = $(this).attr("data_amount");
            const data_batchid = $(this).attr("data_batchid");
            const data_bpc_documentdate = $(this).attr("data_bpc_documentdate");
            const data_bpc_purchasereqno = $(this).attr("data_bpc_purchasereqno");
            const data_currencycode = $(this).attr("data_currencycode");




            poMainData = {
                'amount':0,
                'batchid':'',
                'bpc_documentdate':'',
                'bpc_purchasereqno':'',
                'dataareaid':data_dataareaid,
                'deliverydate':'',
                'invoiceaccount':'',
                'itemnames':'',
                'items':'',
                'purchaseorderid':data_purchaseorderid,
                'purchid':data_purchid,
                'purchorderdate':'',
                'purchorderdocnum':'',
                'purchunit':'',
                'qty':0,
                'salesorderbalance':0,
                'currencycode':data_currencycode
            }

            $('#showPo-po-modal').modal('hide');
            $('#add-po-sec2').css('display' , '');
            $('#po-show-vendorList').html('');

            $('#ip-po-userreceiveDetail').val(vendorData.name);
            $('#ip-po-userreceive').val(vendorData.name);
            $('#ip-po-ponumber').val(poMainData.purchid);
            $('#ip-po-currency').val(poMainData.currencycode);

            getPoDetail(poMainData.dataareaid , poMainData.purchid , poMainData.purchaseorderid);
            console.log(po_addDetail_array);
        });

        async function getPoDetail(dataareaid , purchid , purchaseorderid)
        {
            if(dataareaid && purchid && purchaseorderid){
                const formdata = new FormData();
                formdata.append('dataareaid' , dataareaid);
                formdata.append('purchid' , purchid);
                formdata.append('purchaseorderid' , purchaseorderid);

                try {
                    const res = await axios.post(url+'main/po/getPoDetail' , formdata);
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let result = res.data.result;

                        for(let key in result){
                            let saveDataDetail = {
                                "detaillist":result[key].name,
                                "accode":result[key].ledgeraccountid,
                                "accodename":result[key].accountname,
                                "deptcode":result[key].dimension,
                                "price":result[key].lineamount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }),
                                "itemid":result[key].itemid,
                                "itemname":result[key].name,
                                "itemgroup":result[key].itemgroupid,
                                "purchstatus_text":result[key].purchstatus_text,
                                "purchstatus":result[key].purchstatus
                            }

                            po_addDetail_array.push(saveDataDetail);
                            saveDataDetail = [];
                        }

                        console.log(po_addDetail_array);
                        load_po_list();
                    }
                }catch (error) {
                    console.error('Error:', error); // แสดงข้อผิดพลาดใน console
                    throw error; // สามารถโยนข้อผิดพลาดกลับเพื่อให้ฟังก์ชันที่เรียกใช้รู้ว่ามีปัญหาเกิดขึ้น
                }
            }
        }






    });
</script>