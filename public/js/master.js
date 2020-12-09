function getCity(dis, url, elm, oldCity) {
    const state_id = $(dis).val();
    $.ajax({
        url: url,
        type: 'get',
        data: { state_id, oldCity },
        beforeSend: function() {

        },
        success: function(response) {
            if (response.success === true) {
                $(`#${elm}`).html(response.view);
            } else {
                Notiflix.Notify.Failure(response.message);
            }
        },
        error: function(xhr) {
            Notiflix.Report.Failure('Server error', `Code: ${xhr.status}, Exception: ${xhr.statusText}`, 'OK');
        }
    });
}

function getNN(dis, url, elm, elm1, elm2, oldId) {
    const id = $(`#${elm1}`).val(),
        id2 = $(`#${elm2}`).val();
    if (id && id2) {
        $.ajax({
            url: url,
            type: 'get',
            data: { id, id2, oldId },
            beforeSend: function() {

            },
            success: function(response) {
                if (response.success === true) {
                    $(`#${elm}`).html(response.view);
                } else {
                    Notiflix.Notify.Failure(response.message);
                }
            },
            error: function(xhr) {
                Notiflix.Report.Failure('Server error', `Code: ${xhr.status}, Exception: ${xhr.statusText}`, 'OK');
            }
        });
    }
}

function getWard(dis, url, elm, oldId) {
    const id = $(dis).val();
    $.ajax({
        url: url,
        type: 'get',
        data: { id, oldId },
        beforeSend: function() {

        },
        success: function(response) {
            if (response.success === true) {
                $(`#${elm}`).html(response.view);
            } else {
                Notiflix.Notify.Failure(response.message);
            }
        },
        error: function(xhr) {
            Notiflix.Report.Failure('Server error', `Code: ${xhr.status}, Exception: ${xhr.statusText}`, 'OK');
        }
    });
}

function getPart(dis, url, elm, oldId) {
    const id = $(dis).val();
    $.ajax({
        url: url,
        type: 'get',
        data: { id, oldId },
        beforeSend: function() {

        },
        success: function(response) {
            if (response.success === true) {
                $(`#${elm}`).html(response.view);
            } else {
                Notiflix.Notify.Failure(response.message);
            }
        },
        error: function(xhr) {
            Notiflix.Report.Failure('Server error', `Code: ${xhr.status}, Exception: ${xhr.statusText}`, 'OK');
        }
    });
}

function getSection(dis, url, elm, oldId) {
    const id = $(dis).val();
    $.ajax({
        url: url,
        type: 'get',
        data: { id, oldId },
        beforeSend: function() {

        },
        success: function(response) {
            if (response.success === true) {
                $(`#${elm}`).html(response.view);
            } else {
                Notiflix.Notify.Failure(response.message);
            }
        },
        error: function(xhr) {
            Notiflix.Report.Failure('Server error', `Code: ${xhr.status}, Exception: ${xhr.statusText}`, 'OK');
        }
    });
}

function getSectionData(dis, url, elm, oldId) {
    const id = $(dis).val();
    $.ajax({
        url: url,
        type: 'get',
        data: { id, oldId },
        beforeSend: function() {

        },
        success: function(response) {
            if (response.success === true) {
                $(`#${elm}`).html(`<p>Total Voter : <b>${response.data.total_voter}</b></p> <p>Total Allotted : <b>${response.totalAllotted}</b></p>`);
                $(`#minSNo`).val(response.totalAllotted);
                $(`#maxSNo`).val(response.data.total_voter);
            } else {
                Notiflix.Notify.Failure(response.message);
            }
        },
        error: function(xhr) {
            Notiflix.Report.Failure('Server error', `Code: ${xhr.status}, Exception: ${xhr.statusText}`, 'OK');
        }
    });
}

function getPolling(dis, url, elm, oldId) {
    const id = $(dis).val();
    $.ajax({
        url: url,
        type: 'get',
        data: { id, oldId },
        beforeSend: function() {

        },
        success: function(response) {
            if (response.success === true) {
                $(`#${elm}`).html(response.view);
            } else {
                Notiflix.Notify.Failure(response.message);
            }
        },
        error: function(xhr) {
            Notiflix.Report.Failure('Server error', `Code: ${xhr.status}, Exception: ${xhr.statusText}`, 'OK');
        }
    });
}