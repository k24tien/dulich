// check empty value
function validateEmptyValue(arrayInput) {
    var hasError = false;

    // nếu là mảng thì lập từng đối tượng
    if (Object.prototype.toString.call(arrayInput) === '[object Array]') {

        for (var i = 0; i < arrayInput.length; ++i) {
            var input = arrayInput[i];
            if (input.val() == '0' || input.val() == '') {
                highlightInput(input);
                hasError = true;
            } else {
                input.css('background-color', '#FFF');
            }
        }
    } else {
        if (arrayInput.val() == '0' || arrayInput.val() == '') {
            highlightInput(arrayInput);
            hasError = true;
        } else {
            arrayInput.css('background-color', '#FFF');
        }
    }
    return hasError;
}
function postAjax(postPage, dataString, divLoadingName, async) {
    var result = false;
    var asynchronous = false;

    if (async != null) {
        asynchronous = async;
    }
    $.ajax({
        url: postPage,
        type: "POST",
        data: dataString,
        async: asynchronous,
        beforeSend: function () {
            if (divLoadingName != null) {
                $('.' + divLoadingName).show();
            }
        },
        success: function (data) {
            result = $.trim(data);
        },
        complete: function () {
            if (divLoadingName != null) {
                $('.' + divLoadingName).hide();
            }
        }
    });
    return result;
}
function removeSigns(text) {
    var str = text;
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g, "-");
    str = str.replace(/-+-/g, "-"); //thay thế 2- thành 1-
    str = str.replace(/^\-+|\-+$/g, "");//cắt bỏ ký tự - ở đầu và cuối chuỗi
    str = str.replace(/[&\/\\#,+()$~%.'":*?“”<>{}]/g, "");
    return str;
}
function highlightInput(arrayInput) {
    // nếu là mảng thì lập từng đối tượng
    if (Object.prototype.toString.call(arrayInput) === '[object Array]') {
        for (var i = 0; i < arrayInput.length; ++i) {
            var input = arrayInput[i];
            input.css('background-color', '#FFEDEF');
        }
    } else {
        arrayInput.css('background-color', '#FFEDEF');
    }
}