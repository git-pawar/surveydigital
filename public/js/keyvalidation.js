$(document).ready(function() {
    let thisLenth, isDot;
    $(`.only-num`).on('keydown', function(e) {
        thisLenth = $(this).data('len') ? $(this).data('len') : '';
        isDot = $(this).data('dot') ? $(this).data('dot') : false;

        onlyNum(e, this, thisLenth, isDot);
    });
    $(`.only-alpha`).on('keydown', function(e) {
        thisLenth = $(this).data('len') ? $(this).data('len') : '';
        onlyAlphabet(e, this, thisLenth);
    });
    $(`.float-val`).on('focusout', function() {
        convertFloat(this);
    });
    $(`.minMax`).on('focusout', function() {
        let minElm = $(this).data('min') ? $(this).data('min') : '';
        let maxElm = $(this).data('max') ? $(this).data('max') : '';
        minMax(this, minElm, maxElm);
    });
    $(`.minMax2`).on('focusout', function() {
        let minElm = $(this).data('min') ? $(this).data('min') : '';
        let maxElm = $(this).data('max') ? $(this).data('max') : '';
        minMax2(this, minElm, maxElm);
    });
});

function onlyNum(e, dis, len, dot) {
    let key = e.charCode || e.keyCode || e.key || e.keyIdentifier;
    let length = $(dis).val().length;
    let v = $(dis).val();

    if (key >= 48 && key <= 57 || key >= 96 && key <= 105 || key === 8 || key === 9 || key === 116 || key === 110) {
        if (key === 110 && dot && v.indexOf('.') !== -1) {
            e.preventDefault();
        }
        if (key === 110 && !dot) {
            e.preventDefault();
        }
        if (len != '' && length >= len) {
            if (key === 8 || key === 9) {

            } else e.preventDefault();

        }

    } else {
        e.preventDefault();
    }
}

function onlyAlphabet(e, dis, len) {

    let key = e.charCode || e.keyCode || e.key || e.keyIdentifier;
    let length2 = $(dis).val().length;
    let v = $(dis).val();
    if ((key >= 65 && key <= 90) || key === 8 || key === 9 || key === 20 || key === 16 || key === 32) {
        if (len != '' && length2 >= len) {
            if (key === 8 || key === 9) {

            } else e.preventDefault();
        }
    } else e.preventDefault();
}

function convertFloat(dis) {
    let el = $(dis);
    if (el.val()) {
        if ($.isNumeric(el.val())) {
            el.val(parseFloat(el.val()));
            $(el.css('border', '1px solid #ccc'));
        } else {
            $(el.css('border', '1px solid red'));
            el.focus();
        }
    }
}

function minMax(dis, minElm, maxElm) {

    let el = $(dis);
    let min = $(`#${minElm}`).val() ? parseInt($(`#${minElm}`).val()) : '';
    let max = $(`#${maxElm}`).val() ? parseInt($(`#${maxElm}`).val()) : '';
    let v = parseInt(el.val());
    if (v) {
        if ($.isNumeric(v)) {
            if (min && max) {
                if (v >= min && v <= max) {
                    $(el.css('border', '1px solid #ccc'));
                    $(`.submit_button`).attr('disabled', false);
                } else {
                    $(el.css('border', '1px solid red'));
                    el.focus();
                    $(`.submit_button`).attr('disabled', true);
                }
            }
        } else {
            $(el.css('border', '1px solid red'));
            el.focus();
            $(`.submit_button`).attr('disabled', true);
        }
    }
}

function minMax2(dis, minElm, maxElm) {

    let el = $(dis);
    let min = $(`#${minElm}`).val() ? parseInt($(`#${minElm}`).val()) : '';
    let max = $(`#${maxElm}`).val() ? parseInt($(`#${maxElm}`).val()) : '';
    let v = parseInt(el.val());
    if (v) {
        if ($.isNumeric(v)) {
            if (min && max) {
                if (v >= min && v <= max) {
                    $(el.css('border', '1px solid #ccc'));
                    $(`.submit_button`).attr('disabled', false);
                } else {
                    $(el.css('border', '1px solid red'));
                    el.focus();
                    $(`.submit_button`).attr('disabled', true);
                }
            } else {
                $(el.css('border', '1px solid red'));
                el.focus();
                $(`.submit_button`).attr('disabled', true);
            }
        } else {
            $(el.css('border', '1px solid red'));
            el.focus();
            $(`.submit_button`).attr('disabled', true);
        }
    } else {
        $(el.css('border', '1px solid red'));
        el.focus();
        $(`.submit_button`).attr('disabled', true);
    }
}