function confirm(dis, url, type, ask, yes, no, elm) {

    var ask = ask ? ask : 'Are you sure',
        yes = yes ? yes : 'Yes',
        type = type ? type : 'post',
        no = no ? no : 'No';
    Notiflix.Confirm.Show(
        'Confirm',
        `${ask}`,
        `${yes}`, `${no}`,
        function() { // Yes button
            $.ajax({
                url: `${url}`,
                type: `${type}`,
                data: {},
                beforeSend: function() {

                },
                success: function(response) {
                    if (response.success === true) {
                        $(`#${elm}`).load(window.location.href + ' #' + elm);
                        Notiflix.Notify.Success(response.message);
                    } else {
                        Notiflix.Notify.Failure(response.message);
                    }
                },
                error: function(xhr) {
                    $(dis).attr('disabled', false);
                    Notiflix.Report.Failure('Server error', `Code: ${xhr.status}, Exception: ${xhr.statusText}`, 'OK');
                }
            });
        },
        function() { // No button
            if ($(dis).is(':checked')) {
                $(dis).prop('checked', false);
            } else {
                $(dis).prop('checked', true);
            }
        });
}

function confirm2(dis, id, url, ask, yes, no, status, type1, type2) {

    var ask = ask ? ask : 'Are you sure',
        yes = yes ? yes : 'Yes',
        type = 'post',
        no = no ? no : 'No';

    Notiflix.Confirm.Show(
        'Confirm',
        `${ask}`,
        `${yes}`, `${no}`,
        function() { // Yes button
            if (type2 == 'appointment') {
                confirmAppointment(dis, url, id, status, type1);
            } else {
                confirmPharmacyOrder(dis, url, id, status);
            }
        },
        function() { // No button

        });
}

function confirmAppointment(dis, url, id, status, type1) {
    $.ajax({
        url: `${url}`,
        type: `post`,
        data: { id, status },
        beforeSend: function() {
            $(dis).attr('disabled', true);
        },
        success: function(response) {

            if (response.success === true) {
                debugger;
                if (type1 == 'list') {
                    $(`#appointmentList`).load(window.location.href + " #appointmentList");
                } else {
                    getAppointment();
                }
                $(`#main_modal`).modal('hide');
                Notiflix.Notify.Success(response.message);
            } else {
                $(dis).attr('disabled', false);
                Notiflix.Notify.Failure(response.message);
            }
        },
        error: function(xhr) {
            $(dis).attr('disabled', false);
            Notiflix.Report.Failure('Server error', `Code: ${xhr.status}, Exception: ${xhr.statusText}`, 'OK');
        }
    });
}

function confirmPharmacyOrder(dis, url, id, status) {
    $.ajax({
        url: `${url}`,
        type: `post`,
        data: { id, status },
        beforeSend: function() {
            $(dis).attr('disabled', true);
        },
        success: function(response) {

            if (response.success === true) {
                $(`#registration_table`).load(window.location.href + " #registration_table");
                $(`#main_modal`).modal('hide');
                Notiflix.Notify.Success(response.message);
            } else {
                $(dis).attr('disabled', false);
                Notiflix.Notify.Failure(response.message);
            }
        },
        error: function(xhr) {
            $(dis).attr('disabled', false);
            Notiflix.Report.Failure('Server error', `Code: ${xhr.status}, Exception: ${xhr.statusText}`, 'OK');
        }
    });
}

function showDetail(id, url, type) {
    $.ajax({
        url: url,
        type: "get",
        data: { id },
        beforeSend: function() {
            $(`#main_modalBody`).html('');
            Notiflix.Block.Circle('#main_modalBody', 'Please wait...');
            $(`#main_modal`).modal('toggle');
        },
        success: function(response) {

            if (response.success === true) {
                $(`#main_modalBody`).html(response.view);
            } else {
                $(`#main_modal`).modal('hide');

            }
        },
        error: function(xhr) {
            $(`#main_modal`).modal('hide');
            Notiflix.Notify.Failure(`Code: ${xhr.status}, Exception: ${xhr.statusText}`);
        }
    });
}

//**Show appointment status */
function changeStatus(dis, id, url, type) {
    $.ajax({
        url: url,
        type: "get",
        data: { id, type },
        beforeSend: function() {
            $(`#main_modalBody`).html('');
            Notiflix.Block.Circle('#main_modalBody', 'Please wait...');
            $(`#main_modal`).modal('toggle');
        },
        success: function(response) {

            if (response.success === true) {
                $(`#main_modalBody`).html(response.view);
            } else {
                $(`#main_modal`).modal('hide');

            }
        },
        error: function(xhr) {
            $(`#main_modal`).modal('hide');
            Notiflix.Notify.Failure(`Code: ${xhr.status}, Exception: ${xhr.statusText}`);
        }
    });
}