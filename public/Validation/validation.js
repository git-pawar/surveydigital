// $(document).ready(function () {

$(`.submit_button`).on("click", (function(e) {
    e.preventDefault();
    let dis = $(this);
    let check = true;
    let idName = $(dis).data('id');
    let thisHtml = $(dis).html();
    $(dis).html(`<i class="fas fa-spinner fa-pulse"></i>`);
    $(dis).attr('disabled', true);
    $(`.validate_this`).each(function() {
        let input = $(this);
        if (validate(input) === false) {
            showAlert(input);
            check = false;
        } else {
            input.parent().removeClass('validation-alert');
        }
    });

    if (check) {
        $(`#${idName}`).submit();
        $(dis).attr('disabled', true);
    } else {
        $(dis).html(thisHtml);
        $(dis).attr('disabled', false);
    }
}));

$(`.submit_btn2`).on("click", (function(e) {

    e.preventDefault();
    let dis = $(this);
    let check = true;
    let idName = $(dis).data('id');
    let thisHtml = $(dis).html();
    $(dis).html(`<i class="fas fa-spinner fa-pulse"></i>`);
    $(dis).attr('disabled', true);
    $(`.validate_this`).each(function() {
        let input = $(this);
        if (validate(input) === false) {
            showAlert2(input);
            check = false;
        } else {
            input.parent().removeClass('validation-alert2');
        }
    });

    if (check) {
        $(`#${idName}`).submit();
        $(dis).attr('disabled', true);
    } else {
        debugger
        $(dis).html(thisHtml);
        $(dis).attr('disabled', false);
    }
}));
$(`.submit_btn3`).on("click", (function(e) {

    e.preventDefault();
    let dis = $(this);
    let check = true;
    let idName = $(dis).data('id');
    let thisHtml = $(dis).html();
    $(dis).html(`<i class="fas fa-spinner fa-pulse"></i>`);
    $(dis).attr('disabled', true);
    $(`.validate_this_edit`).each(function() {
        let input = $(this);
        if (validate(input) === false) {
            showAlert2(input);
            check = false;
        } else {
            input.parent().removeClass('validation-alert2');
        }
    });

    if (check) {
        $(`#${idName}`).submit();
        $(dis).attr('disabled', true);
    } else {
        debugger
        $(dis).html(thisHtml);
        $(dis).attr('disabled', false);
    }
}));
$(`.frontSubmitProduct`).click(function(e) {

    e.preventDefault();
    let check = true;
    $(`.validate_this`).each(function() {
        let input = $(this);
        if (validate(input) === false) {
            showAlert(input);
            check = false;
        }
    });
    if (check) {
        $(this).attr('disabled', true);
        checkOther(this);
        // $(`.form_data`).submit();
    }
});
// });
function frontValidation(dis, type, id) {
    let check = true;
    $(`.validate_this`).each(function() {
        let input = $(this);
        if (validate(input) === false) {
            showAlert(input);
            check = false;
        }
    });
    if (check) {
        $(dis).attr('disabled', true);
        if (type === 'xhr') {
            return check;
        } else {
            $(`#${id}`).submit();
        }
    }
}

function validate(input) {

    if (input.attr('type') === 'email' || input.attr('email') === 'email') {
        if (input.val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
            return false;
        }
    } else if (input.attr('type') === 'file') {
        if (!input.val()) {
            return false;
        }

    } else if (input.data('type') == 'select') {

        if (!input.val()) {
            return false;
        }
        // } else if (input.attr('type') === 'password') {
        //     if (!input.val() || input.length < 8 || input.length > 15) {
        //         return false;
        //     }

    } else {
        if (input.val().trim() === '' || !input.val()) {
            return false;
        }
    }

    if (input.attr('type') === 'checkbox' && input.hasClass('validateTerms')) {

        if (!input.is(':checked')) {
            return false;
        }
    }
}

function showAlert(input) {
    let thisAlert = input.parent();
    $(thisAlert).addClass('validation-alert');
}

function showAlert2(input) {
    let thisAlert = input.parent();
    $(thisAlert).addClass('validation-alert2');
}