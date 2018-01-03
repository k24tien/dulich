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