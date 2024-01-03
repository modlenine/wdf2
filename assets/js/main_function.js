
function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}


function checkVatInputAll(vat3 , vat7 , priceNoneVat)
{
    vat3 = parseFloat(vat3);
    vat7 = parseFloat(vat7);
    priceNoneVat = parseFloat(priceNoneVat);

    let priceVat7 = 0;
    let priceVat3 = 0;
    let totalWithVat = 0;

    if(vat7 != "" && vat3 == ""){//เมื่อมี vat 7% แต่ไม่มี vat 3%
        priceVat7 = (priceNoneVat * vat7) / 100;
        priceVat3 = 0;
    }else if(vat7 != "" && vat3 != ""){//เมื่อมี vat 7% และมี vat 3%
        priceVat7 = (priceNoneVat * vat7) / 100;
        priceVat3 = (priceNoneVat * vat3) / 100;
    }else if(vat7 == "" && vat3 != ""){//เมื่อไม่มี vat 7% แต่มี vat 3%
        priceVat7 = 0;
        priceVat3 = (priceNoneVat * vat3) / 100;
    }else if(vat7 == "" && vat3 == ""){//เมื่อไม่มี vat 7% และไม่มี vat 3%
        priceVat7 = 0;
        priceVat3 = 0;
    }else if(priceNoneVat < 1){
        priceVat7 = 0;
        priceVat3 = 0;
        priceNoneVat = 0;
    }
    totalWithVat = (priceNoneVat + priceVat7) - priceVat3;

    $('#ip-advdetail-vat7Price').val(priceVat7.toFixed(2));
    $('#ip-advdetail-vat3Price').val(priceVat3.toFixed(2));
    $('#ip-advdetail-priceTotal').val(totalWithVat.toFixed(2));

    $('#ip-advdetail-vat7Price').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    $('#ip-advdetail-vat3Price').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    $('#ip-advdetail-priceTotal').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    console.log(priceNoneVat);
    console.log(priceVat7);
    console.log(priceVat3);
    console.log(totalWithVat);
}


function checkVatInputAllClear(vat3 , vat7 , priceNoneVat)
{
    vat3 = parseFloat(vat3);
    vat7 = parseFloat(vat7);
    priceNoneVat = parseFloat(priceNoneVat);

    let priceVat7 = 0;
    let priceVat3 = 0;
    let totalWithVat = 0;

    if(vat7 != "" && vat3 == ""){//เมื่อมี vat 7% แต่ไม่มี vat 3%
        priceVat7 = (priceNoneVat * vat7) / 100;
        priceVat3 = 0;
    }else if(vat7 != "" && vat3 != ""){//เมื่อมี vat 7% และมี vat 3%
        priceVat7 = (priceNoneVat * vat7) / 100;
        priceVat3 = (priceNoneVat * vat3) / 100;
    }else if(vat7 == "" && vat3 != ""){//เมื่อไม่มี vat 7% แต่มี vat 3%
        priceVat7 = 0;
        priceVat3 = (priceNoneVat * vat3) / 100;
    }else if(vat7 == "" && vat3 == ""){//เมื่อไม่มี vat 7% และไม่มี vat 3%
        priceVat7 = 0;
        priceVat3 = 0;
    }else if(priceNoneVat < 1){
        priceVat7 = 0;
        priceVat3 = 0;
        priceNoneVat = 0;
    }
    totalWithVat = (priceNoneVat + priceVat7) - priceVat3;

    $('#ip-advdetail-vat7Price-clear').val(priceVat7.toFixed(2));
    $('#ip-advdetail-vat3Price-clear').val(priceVat3.toFixed(2));
    $('#ip-advdetail-priceTotal-clear').val(totalWithVat.toFixed(2));

    $('#ip-advdetail-vat7Price-clear').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    $('#ip-advdetail-vat3Price-clear').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    $('#ip-advdetail-priceTotal-clear').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    console.log(priceNoneVat);
    console.log(priceVat7);
    console.log(priceVat3);
    console.log(totalWithVat);
}


function checkVatInputAll_nor(vat3 , vat7 , priceNoneVat)
{
    vat3 = parseFloat(vat3);
    vat7 = parseFloat(vat7);
    priceNoneVat = parseFloat(priceNoneVat);

    let priceVat7 = 0;
    let priceVat3 = 0;
    let totalWithVat = 0;

    if(vat7 != "" && vat3 == ""){//เมื่อมี vat 7% แต่ไม่มี vat 3%
        priceVat7 = (priceNoneVat * vat7) / 100;
        priceVat3 = 0;
    }else if(vat7 != "" && vat3 != ""){//เมื่อมี vat 7% และมี vat 3%
        priceVat7 = (priceNoneVat * vat7) / 100;
        priceVat3 = (priceNoneVat * vat3) / 100;
    }else if(vat7 == "" && vat3 != ""){//เมื่อไม่มี vat 7% แต่มี vat 3%
        priceVat7 = 0;
        priceVat3 = (priceNoneVat * vat3) / 100;
    }else if(vat7 == "" && vat3 == ""){//เมื่อไม่มี vat 7% และไม่มี vat 3%
        priceVat7 = 0;
        priceVat3 = 0;
    }else if(priceNoneVat < 1){
        priceVat7 = 0;
        priceVat3 = 0;
        priceNoneVat = 0;
    }
    totalWithVat = (priceNoneVat + priceVat7) - priceVat3;

    $('#ip-nordetail-vat7Price').val(priceVat7.toFixed(2));
    $('#ip-nordetail-vat3Price').val(priceVat3.toFixed(2));
    $('#ip-nordetail-priceTotal').val(totalWithVat.toFixed(2));

    $('#ip-nordetail-vat7Price').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    $('#ip-nordetail-vat3Price').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    $('#ip-nordetail-priceTotal').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    console.log(priceNoneVat);
    console.log(priceVat7);
    console.log(priceVat3);
    console.log(totalWithVat);
}

function checkVatInputAll_sal(vat3 , vat7 , priceNoneVat)
{
    vat3 = parseFloat(vat3);
    vat7 = parseFloat(vat7);
    priceNoneVat = parseFloat(priceNoneVat);

    let priceVat7 = 0;
    let priceVat3 = 0;
    let totalWithVat = 0;

    if(vat7 != "" && vat3 == ""){//เมื่อมี vat 7% แต่ไม่มี vat 3%
        priceVat7 = (priceNoneVat * vat7) / 100;
        priceVat3 = 0;
    }else if(vat7 != "" && vat3 != ""){//เมื่อมี vat 7% และมี vat 3%
        priceVat7 = (priceNoneVat * vat7) / 100;
        priceVat3 = (priceNoneVat * vat3) / 100;
    }else if(vat7 == "" && vat3 != ""){//เมื่อไม่มี vat 7% แต่มี vat 3%
        priceVat7 = 0;
        priceVat3 = (priceNoneVat * vat3) / 100;
    }else if(vat7 == "" && vat3 == ""){//เมื่อไม่มี vat 7% และไม่มี vat 3%
        priceVat7 = 0;
        priceVat3 = 0;
    }else if(priceNoneVat < 1){
        priceVat7 = 0;
        priceVat3 = 0;
        priceNoneVat = 0;
    }
    totalWithVat = (priceNoneVat + priceVat7) - priceVat3;

    $('#ip-saldetail-vat7Price').val(priceVat7.toFixed(2));
    $('#ip-saldetail-vat3Price').val(priceVat3.toFixed(2));
    $('#ip-saldetail-priceTotal').val(totalWithVat.toFixed(2));

    $('#ip-saldetail-vat7Price').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    $('#ip-saldetail-vat3Price').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    $('#ip-saldetail-priceTotal').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    console.log(priceNoneVat);
    console.log(priceVat7);
    console.log(priceVat3);
    console.log(totalWithVat);
}


function checkVatInputAll_po(vat3 , vat7 , priceNoneVat)
{
    vat3 = parseFloat(vat3);
    vat7 = parseFloat(vat7);
    priceNoneVat = parseFloat(priceNoneVat);

    let priceVat7 = 0;
    let priceVat3 = 0;
    let totalWithVat = 0;

    if(vat7 != "" && vat3 == ""){//เมื่อมี vat 7% แต่ไม่มี vat 3%
        priceVat7 = (priceNoneVat * vat7) / 100;
        priceVat3 = 0;
    }else if(vat7 != "" && vat3 != ""){//เมื่อมี vat 7% และมี vat 3%
        priceVat7 = (priceNoneVat * vat7) / 100;
        priceVat3 = (priceNoneVat * vat3) / 100;
    }else if(vat7 == "" && vat3 != ""){//เมื่อไม่มี vat 7% แต่มี vat 3%
        priceVat7 = 0;
        priceVat3 = (priceNoneVat * vat3) / 100;
    }else if(vat7 == "" && vat3 == ""){//เมื่อไม่มี vat 7% และไม่มี vat 3%
        priceVat7 = 0;
        priceVat3 = 0;
    }else if(priceNoneVat < 1){
        priceVat7 = 0;
        priceVat3 = 0;
        priceNoneVat = 0;
    }
    totalWithVat = (priceNoneVat + priceVat7) - priceVat3;

    $('#ip-podetail-vat7Price').val(priceVat7.toFixed(2));
    $('#ip-podetail-vat3Price').val(priceVat3.toFixed(2));
    $('#ip-podetail-priceTotal').val(totalWithVat.toFixed(2));

    $('#ip-podetail-vat7Price').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    $('#ip-podetail-vat3Price').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    $('#ip-podetail-priceTotal').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    console.log(priceNoneVat);
    console.log(priceVat7);
    console.log(priceVat3);
    console.log(totalWithVat);
}



function checkVatInputAll_edit(vat3 , vat7 , priceNoneVat)
{
    vat3 = parseFloat(vat3);
    vat7 = parseFloat(vat7);
    priceNoneVat = parseFloat(priceNoneVat);

    let priceVat7 = 0;
    let priceVat3 = 0;
    let totalWithVat = 0;

    if(vat7 != "" && vat3 == ""){//เมื่อมี vat 7% แต่ไม่มี vat 3%
        priceVat7 = (priceNoneVat * vat7) / 100;
        priceVat3 = 0;
    }else if(vat7 != "" && vat3 != ""){//เมื่อมี vat 7% และมี vat 3%
        priceVat7 = (priceNoneVat * vat7) / 100;
        priceVat3 = (priceNoneVat * vat3) / 100;
    }else if(vat7 == "" && vat3 != ""){//เมื่อไม่มี vat 7% แต่มี vat 3%
        priceVat7 = 0;
        priceVat3 = (priceNoneVat * vat3) / 100;
    }else if(vat7 == "" && vat3 == ""){//เมื่อไม่มี vat 7% และไม่มี vat 3%
        priceVat7 = 0;
        priceVat3 = 0;
    }else if(priceNoneVat < 1){
        priceVat7 = 0;
        priceVat3 = 0;
        priceNoneVat = 0;
    }
    totalWithVat = (priceNoneVat + priceVat7) - priceVat3;

    $('#ipe-advdetail-vat7Price').val(priceVat7.toFixed(2));
    $('#ipe-advdetail-vat3Price').val(priceVat3.toFixed(2));
    $('#ipe-advdetail-priceTotal').val(totalWithVat.toFixed(2));

    $('#ipe-advdetail-vat7Price').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    $('#ipe-advdetail-vat3Price').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    $('#ipe-advdetail-priceTotal').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    console.log(priceNoneVat);
    console.log(priceVat7);
    console.log(priceVat3);
    console.log(totalWithVat);
}

function checkVatInputAll_edit_nor(vat3 , vat7 , priceNoneVat)
{
    vat3 = parseFloat(vat3);
    vat7 = parseFloat(vat7);
    priceNoneVat = parseFloat(priceNoneVat);

    let priceVat7 = 0;
    let priceVat3 = 0;
    let totalWithVat = 0;

    if(vat7 != "" && vat3 == ""){//เมื่อมี vat 7% แต่ไม่มี vat 3%
        priceVat7 = (priceNoneVat * vat7) / 100;
        priceVat3 = 0;
    }else if(vat7 != "" && vat3 != ""){//เมื่อมี vat 7% และมี vat 3%
        priceVat7 = (priceNoneVat * vat7) / 100;
        priceVat3 = (priceNoneVat * vat3) / 100;
    }else if(vat7 == "" && vat3 != ""){//เมื่อไม่มี vat 7% แต่มี vat 3%
        priceVat7 = 0;
        priceVat3 = (priceNoneVat * vat3) / 100;
    }else if(vat7 == "" && vat3 == ""){//เมื่อไม่มี vat 7% และไม่มี vat 3%
        priceVat7 = 0;
        priceVat3 = 0;
    }else if(priceNoneVat < 1){
        priceVat7 = 0;
        priceVat3 = 0;
        priceNoneVat = 0;
    }
    totalWithVat = (priceNoneVat + priceVat7) - priceVat3;

    $('#ipe-nordetail-vat7Price').val(priceVat7.toFixed(2));
    $('#ipe-nordetail-vat3Price').val(priceVat3.toFixed(2));
    $('#ipe-nordetail-priceTotal').val(totalWithVat.toFixed(2));

    $('#ipe-nordetail-vat7Price').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    $('#ipe-nordetail-vat3Price').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    $('#ipe-nordetail-priceTotal').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    console.log(priceNoneVat);
    console.log(priceVat7);
    console.log(priceVat3);
    console.log(totalWithVat);
}

function checkVatInputAll_edit_sal(vat3 , vat7 , priceNoneVat)
{
    vat3 = parseFloat(vat3);
    vat7 = parseFloat(vat7);
    priceNoneVat = parseFloat(priceNoneVat);

    let priceVat7 = 0;
    let priceVat3 = 0;
    let totalWithVat = 0;

    if(vat7 != "" && vat3 == ""){//เมื่อมี vat 7% แต่ไม่มี vat 3%
        priceVat7 = (priceNoneVat * vat7) / 100;
        priceVat3 = 0;
    }else if(vat7 != "" && vat3 != ""){//เมื่อมี vat 7% และมี vat 3%
        priceVat7 = (priceNoneVat * vat7) / 100;
        priceVat3 = (priceNoneVat * vat3) / 100;
    }else if(vat7 == "" && vat3 != ""){//เมื่อไม่มี vat 7% แต่มี vat 3%
        priceVat7 = 0;
        priceVat3 = (priceNoneVat * vat3) / 100;
    }else if(vat7 == "" && vat3 == ""){//เมื่อไม่มี vat 7% และไม่มี vat 3%
        priceVat7 = 0;
        priceVat3 = 0;
    }else if(priceNoneVat < 1){
        priceVat7 = 0;
        priceVat3 = 0;
        priceNoneVat = 0;
    }
    totalWithVat = (priceNoneVat + priceVat7) - priceVat3;

    $('#ipe-saldetail-vat7Price').val(priceVat7.toFixed(2));
    $('#ipe-saldetail-vat3Price').val(priceVat3.toFixed(2));
    $('#ipe-saldetail-priceTotal').val(totalWithVat.toFixed(2));

    $('#ipe-saldetail-vat7Price').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    $('#ipe-saldetail-vat3Price').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    $('#ipe-saldetail-priceTotal').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    console.log(priceNoneVat);
    console.log(priceVat7);
    console.log(priceVat3);
    console.log(totalWithVat);
}


function checkVatInputAll_edit_po(vat3 , vat7 , priceNoneVat)
{
    vat3 = parseFloat(vat3);
    vat7 = parseFloat(vat7);
    priceNoneVat = parseFloat(priceNoneVat);

    let priceVat7 = 0;
    let priceVat3 = 0;
    let totalWithVat = 0;

    if(vat7 != "" && vat3 == ""){//เมื่อมี vat 7% แต่ไม่มี vat 3%
        priceVat7 = (priceNoneVat * vat7) / 100;
        priceVat3 = 0;
    }else if(vat7 != "" && vat3 != ""){//เมื่อมี vat 7% และมี vat 3%
        priceVat7 = (priceNoneVat * vat7) / 100;
        priceVat3 = (priceNoneVat * vat3) / 100;
    }else if(vat7 == "" && vat3 != ""){//เมื่อไม่มี vat 7% แต่มี vat 3%
        priceVat7 = 0;
        priceVat3 = (priceNoneVat * vat3) / 100;
    }else if(vat7 == "" && vat3 == ""){//เมื่อไม่มี vat 7% และไม่มี vat 3%
        priceVat7 = 0;
        priceVat3 = 0;
    }else if(priceNoneVat < 1){
        priceVat7 = 0;
        priceVat3 = 0;
        priceNoneVat = 0;
    }
    totalWithVat = (priceNoneVat + priceVat7) - priceVat3;

    $('#ipe-podetail-vat7Price').val(priceVat7.toFixed(2));
    $('#ipe-podetail-vat3Price').val(priceVat3.toFixed(2));
    $('#ipe-podetail-priceTotal').val(totalWithVat.toFixed(2));

    $('#ipe-podetail-vat7Price').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    $('#ipe-podetail-vat3Price').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    $('#ipe-podetail-priceTotal').val(function(index , value){
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });

    console.log(priceNoneVat);
    console.log(priceVat7);
    console.log(priceVat3);
    console.log(totalWithVat);
}


function checkStatus_text(status)
{
    let colortext = '';

    if(//Approve zone
        status == "Open" ||
        status == "Edit" ||
        status == "Check budget already" ||
        status == "Manager approved" ||
        status == "Wait Executive Group 0 Approve" ||
        status == "Wait Executive Group 1 Approve" ||
        status == "Wait Executive Group 2 Approve" ||
        status == "Wait Executive Group 3 Approve" ||
        status == "Wait Executive Group 4 Approve" ||
        status == "Executive Group 0 Approved" ||
        status == "Executive Group 1 Approved" ||
        status == "Executive Group 2 Approved" ||
        status == "Executive Group 3 Approved" ||
        status == "Executive Group 4 Approved" ||
        status == "AP passed inspection" ||
        status == "Account passed inspection" ||
        status == "Wait user receive money"
    ){
        colortext = 'style="color:#3399FF;"';
    }else if(//Not approve zone
        status == "Executive Group 0 Not Approve" ||
        status == "Executive Group 1 Not Approve" ||
        status == "Executive Group 2 Not Approve" ||
        status == "Executive Group 3 Not Approve" ||
        status == "Executive Group 4 Not Approve" ||
        status == "Manager not approve" ||
        status == "AP not pass inspection" ||
        status == "Account not pass inspection" ||
        status == "Finance not pass inspection" ||
        status == "Manager not approve (Clear Money)" ||
        status == "Executive Group 0 Not Approve (Clear Money)" ||
        status == "Executive Group 1 Not Approve (Clear Money)" ||
        status == "Executive Group 2 Not Approve (Clear Money)" ||
        status == "Executive Group 3 Not Approve (Clear Money)" ||
        status == "Executive Group 4 Not Approve (Clear Money)" ||
        status == "AP not pass inspection (Clear Money)" ||
        status == "Account not pass inspection (Clear Money)" ||
        status == "Finance 2 not pass inspection (Clear Money)"
    ){
        colortext = 'style="color:#CC0000;"';
    }else if(//Complete And Go to nextstep
        status == "Complete & Wait User Clear Money"
    ){
        colortext = 'style="color:#FF9900;"';
    }else if(//Complete
        status == "Clear money complete" ||
        status == "Complete"
    ){
        colortext = 'style="color:#33CC00;"';
    }

    return colortext;
}


function keynumberOnly(str){
    return /^[0-9,.]*$/.test(str);
}

function notKeySingleQ(str)
{
    return /^[^'"]*$/.test(str);
}



