// get request time
var RequestTime = Math.round((new Date()).getTime()/1000);
// generate UUID
function generateUUID() { // Public Domain/MIT
    var d = new Date().getTime();//Timestamp
    var d2 = ((typeof performance !== 'undefined') && performance.now && (performance.now()*1000)) || 0;//Time in microseconds since page-load or 0 if unsupported
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = Math.random() * 16;//random number between 0 and 16
        if(d > 0){//Use timestamp until depleted
            r = (d + r)%16 | 0;
            d = Math.floor(d/16);
        } else {//Use microseconds since page-load if supported
            r = (d2 + r)%16 | 0;
            d2 = Math.floor(d2/16);
        }
        return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
    });
}
function ShowError(id='',error_id='',value,msg='',is_focus=true) {
    if(!value) {
        $('#'+error_id).text('');
        $('#'+error_id).removeClass('error_msg');
        return true;
    }else{
        if(is_focus){ $('#'+id).focus(); }
        $('#'+error_id).text(msg);
        $('#'+error_id).addClass('error_msg');
        return false;
    }
}
function ShowBulkError(DataArr,is_focus=true) {
    var error = false;
    DataArr.forEach(function(item) {
        if(!item['value']) {
            $('#'+item['error_id']).text('');
            $('#'+item['error_id']).removeClass('error_msg');
            $('#'+item['id']).removeClass('error_bdr');
            error = true;
        }else{
            if(is_focus){ $('#'+item['id']).focus(); }
            $('#'+item['error_id']).text(item['msg']);
            $('#'+item['error_id']).addClass('error_msg');
            $('#'+item['id']).addClass('error_bdr');
            error = false;
        }
    });
    return error;
}
function IsEmpty(id='',error_id='',value,msg='',delimeter){
    if(value != delimeter) {
        $('#'+error_id).text('');
        $('#'+error_id).removeClass('error_msg');
        $('#'+id).removeClass('error_bdr');
        return false;
    }else{
        $('#'+id).focus();
        $('#'+id).addClass('error_bdr');
        $('#'+error_id).addClass('error_msg');
        $('#'+error_id).text(msg);
        return true;
    }
}
function checkBulkEmpty(DataArr){
    var error = false;
    var errCount = 0;
    var delimeter = '';
    DataArr.forEach(function(item) {
        delimeter = item['delimeter'].toLowerCase();
        if((item['value'] != item['delimeter']) && (delimeter != 'password')) {
            $('#'+item['error_id']).text('');
            $('#'+item['error_id']).removeClass('error_msg');
            $('#'+item['id']).removeClass('error_bdr');
        }else if(delimeter == 'password') {
            if($('#'+item['id']).val() != item['value']){
                $('#'+item['id']).focus();
                $('#'+item['id']).addClass('error_bdr');
                $('#'+item['error_id']).addClass('error_msg');
                $('#'+item['error_id']).text(item['msg']);
                errCount++;
            }else{
                $('#'+item['error_id']).text('');
                $('#'+item['error_id']).removeClass('error_msg');
                $('#'+item['id']).removeClass('error_bdr');
            }
        }else{
            $('#'+item['id']).focus();
            $('#'+item['id']).addClass('error_bdr');
            $('#'+item['error_id']).addClass('error_msg');
            $('#'+item['error_id']).text(item['msg']);
            errCount++;
        }
    });
    if(errCount > 0){
        error = true;
    }
    return error;
}
function IsValidEmail(id='',error_id='',value,msg='') {
    var RegExp = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (RegExp.test(value)) {
        $('#'+error_id).text('');
        $('#'+error_id).removeClass('error_msg');
        return true;
    }else{
        $('#'+id).focus();
        $('#'+error_id).text(msg);
        $('#'+error_id).addClass('error_msg');
        return false;
    }
}
function IsValidMobile(id='',error_id='',value,msg='') {
    var RegExp = /^[6-9]{1}\d{9}$/;
    if(value.match(RegExp)){
        $('#'+error_id).text('');
        $('#'+error_id).removeClass('error_msg');
        return true;
    }else{
        $('#'+id).focus();
        $('#'+error_id).text(msg);
        $('#'+error_id).addClass('error_msg');
        return false;
    }
}
function IsNumeric(id='',error_id='',value,msg='') {
    var RegExp = /^[0-9]+$/;
    if(value.match(RegExp)) {
        $('#'+error_id).text('');
        $('#'+error_id).removeClass('error_msg');
        return true;
    }else{
        $('#'+id).focus();
        $('#'+error_id).text(msg);
        $('#'+error_id).addClass('error_msg');
        return false;
    }
}
function IsAlphaNumeric(id='',error_id='',value,msg='') {
    var RegExp = /^[0-9A-Za-z]+$/;
    if(value.match(RegExp)) {
        $('#'+error_id).text('');
        $('#'+error_id).removeClass('error_msg');
        return true;
    }else{
        $('#'+id).focus();
        $('#'+error_id).text(msg);
        $('#'+error_id).addClass('error_msg');
        return false;
    }
}
function IsText(id='',error_id='',value,msg='') {
    var RegExp = /^[a-zA-Z -_]+$/;
    if(value.match(RegExp)) {
        $('#'+error_id).text('');
        $('#'+error_id).removeClass('error_msg');
        return true;
    }else{
        $('#'+id).focus();
        $('#'+error_id).text(msg);
        $('#'+error_id).addClass('error_msg');
        return false;
    }
}
function IsPureText(id='',error_id='',value,msg='') {
    var RegExp = /^[a-zA-Z]+$/;
    if(value.match(RegExp)) {
        $('#'+error_id).text('');
        $('#'+error_id).removeClass('error_msg');
        return true;
    }else{
        $('#'+id).focus();
        $('#'+error_id).text(msg);
        $('#'+error_id).addClass('error_msg');
        return false;
    }
}
$(document).on('keypress','.number',function(e){
    // Allow: backspace, delete, tab, escape, enter, ctrl+A and 
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
         // Allow: Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true) || 
         // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
             // let it happen, don't do anything
             return false;
    }
    var charValue = String.fromCharCode(e.keyCode)
        , valid = /^[0-9]+$/.test(charValue);

    if (!valid) {
        e.preventDefault();
    }
});
// encode to base64
function encodeToBase64(event,id){
    let reader = new FileReader();
    reader.onload = function(){
      let output = document.getElementById(id);
      output.value = reader.result;
      console.log(reader.result);
    }
    if(event.target.files[0]){
      reader.readAsDataURL(event.target.files[0]);
    }
}

function showInTwoDigit(Num=0) {
    if(Num>=0 && Num<9){
      Num = '0'+Num;
    }else if(Num<0 && Num>'-9'){
      Num = '-0'+Math.abs(Num);
    }
    return Num;
}
// check is matched
function isMatch(value,parent_id,error_id,msg_id="",prefix="") {
    var parent_input = document.getElementById(parent_id);
    var error_input = document.getElementById(error_id);
    var msg_input = "";
    if(msg_id){
        msg_input = document.getElementById(msg_id);
    }
    if (parent_input.value != value) {
        if(msg_input){
            msg_input.innerHTML = prefix+"Not Match.";
            msg_input.classList.remove("success_msg");
            msg_input.classList.add("error_msg");
        }
        error_input.classList.remove("success_bdr");
        error_input.classList.add("error_bdr");
        return true;
    } else {
        if(msg_input){
            msg_input.innerHTML = prefix+"Match.";
            msg_input.classList.add("success_msg");
            msg_input.classList.remove("error_msg");
        }
        error_input.classList.add("success_bdr");
        error_input.classList.remove("error_bdr");
        return false;
    }
}

// check strength
function isStrong(password,error_id) {
    var password_strength = document.getElementById(error_id);
    var passed = 0;
    var color = "";
    var error_msg = "";
    var is_valid = false;
    // check blank.
    if (password.length == 0) {
        password_strength.innerHTML = "";
        return false;
    }
    // regular expressions.
    var regex = new Array();
    regex.push("[A-Z]"); // uppercase alphabet.
    regex.push("[a-z]"); // lowercase alphabet.
    regex.push("[0-9]"); // numeric digit.
    regex.push("[$@$!%*#?&]"); // special character.
    // validate regular expression.
    for (var i = 0; i < regex.length; i++) {
        if (new RegExp(regex[i]).test(password)) {
            passed++;
        }
    }
    // validate password length.
    if (passed > 2 && password.length > 6) {
        passed++;
    }
    // check strength level
    if(passed == 0 || passed == 1) {
        error_msg = "Weak (should be atleast 6 characters & Special Character.)";
        color = "red";
        is_valid = false;
    }else if(passed == 2){
        error_msg = "Medium (should include alphabets, numbers and special characters)";
        color = "darkorange";
        is_valid = true;
    }else if(passed == 3 || passed == 4){
        error_msg = "Strong";
        color = "green";
        is_valid = true;
    }else if(passed >= 5){
        error_msg = "Very Strong";
        color = "darkgreen";
        is_valid = true;
    }
    password_strength.innerHTML = error_msg;
    password_strength.style.color = color;
    // check is all set or not
    if(is_valid){
        return true;
    }else{
        return false;
    }
}
