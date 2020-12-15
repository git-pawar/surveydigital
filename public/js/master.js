$(document).ready(function() {
    $(`.getImage`).focusout(function() {
        const url = $(this).data('url'),
            previw = $(this).data('previw'),
            ward = $(this).data('ward'),
            part = $(this).data('part');
        getImage($(this), url, previw, ward, part);
    });
});

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

function getSection(dis, url, elm, ward_id, oldId) {
    const id = $(dis).val();
    $.ajax({
        url: url,
        type: 'get',
        data: { id, oldId, ward_id },
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
                $(`#${elm}`).html(`<p>Total Voter : <b>${response.data.total_voter}</b></p> <p>Total Allotted : <b>${response.totalAllotted}</b></p> <p>Serial No : <b>${response.startingVoter} - ${response.lastVoter}</b></p>`);
                $(`#minSNo`).val(response.startingVoter);
                $(`#s_no_from`).val(response.startingVoter);
                $(`#maxSNo`).val(response.lastVoter);
                $(`#s_no_to`).val(response.lastVoter);
            } else {
                Notiflix.Notify.Failure(response.message);
            }
        },
        error: function(xhr) {
            Notiflix.Report.Failure('Server error', `Code: ${xhr.status}, Exception: ${xhr.statusText}`, 'OK');
        }
    });
}

function getImage(dis, url, elm, ward, part) {
    const s_no = $(dis).val();
    if (s_no) {
        $.ajax({
            url: url,
            type: 'get',
            data: {
                s_no,
                ward,
                part
            },
            beforeSend: function() {
                Notiflix.Block.Circle(`#${elm}`, '');
            },
            success: function(response) {
                if (response.success === true) {
                    $(`#${elm}`).html(`<img class="w-100" id="imgPreview" src="${response.url}" />`);
                } else {
                    Notiflix.Notify.Failure(response.message);
                    Notiflix.Block.Remove(`#${elm}`);
                }
            },
            error: function(xhr) {
                Notiflix.Block.Remove(`#${elm}`);
                Notiflix.Report.Failure('Server error', `Code: ${xhr.status}, Exception: ${xhr.statusText}`, 'OK');
            }
        });
    }
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

function changeColor(dis, url, elm, oldId) {
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

function updateColor(dis) {
    let color = '';
    const ward_id = $(`#wardid`).val(),
        part_id = $(`#partid`).val(),
        s_no = $(`#sno`).val(),
        url = $(`#url_this`).val();
    $(`.checkedColor`).each(function() {
        if ($(this).is(':checked')) {
            color = $(this).val();
        }
    });
    $.ajax({
        url: url,
        type: 'get',
        data: {
            color,
            ward_id,
            part_id,
            s_no
        },
        beforeSend: function() {

        },
        success: function(response) {
            if (response.success === true) {
                $(`#refreshList`).load(window.location.href + " #refreshList");
                toggleColorModal(dis);
            } else {
                Notiflix.Notify.Failure(response.message);
            }
        },
        error: function(xhr) {
            Notiflix.Report.Failure('Server error', `Code: ${xhr.status}, Exception: ${xhr.statusText}`, 'OK');
        }
    });
}