(() => {
    'use strict'
    feather.replace({ 'aria-hidden': 'true' })
})();
/**************************** */

function setAuth() {
    addNewCourtBtn = document.getElementById('addNewCourtBtn');
    if (role == 2) {

        addNewCourtBtn.innerHTML =
            '<button type="button" id="add-courts-button" class="operations-btn btn" data-bs-toggle="modal" data-bs-target="#addCourtModal">'
            + '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle align-text-bottom" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>'
            + ' إضافة  محكمة جديدة'
            + '</button>'
    }
}


function add_court() {
    $('#addCourtError').css('color', 'red');
    $('#addCourtError').html('');

    $('#addCourt_form').validate({
        rules: {

            court_name: {
                required: true

            }, court_location: {
                required: true
            }
        },
        messages: {

            court_name: {
                required: "الرجاء إدخال اسم المحكمة",
            }, court_location: {
                required: "الرجاء إدخال موقع المحكمة",

            }
        },
        submitHandler: function (form) {
            $('.addCourtError').html("")


            var court_name = $('#court_name').val();
            var court_location = $('#court_location').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "http://127.0.0.1:8000/courts/",
                type: "POST",
                data: {
                    "name": court_name,
                    "place": court_location
                }
                , dataType: 'json',
                success: function (response) {
                    if (response.status == 'success') {
                        court = [];
                        court["name"] = court_name
                        court["place"] = court_location
                        // عرض الصفوف

                        if (document.getElementById('NoData') != undefined) {
                            document.getElementById('NoData').remove();
                        }
                        table = $('#table-body');

                        addCourtRow(table, court)
                        $('#addCourtError').css('color', 'green');
                        $('#addCourtError').html('تم إضافة المحكمة بنجاح');



                    } else {
                        $('#addCourtError').html(response.message);

                    }
                },

                error: function (response) {
                    console.log(response)
                    // If the login is unsuccessful, display the error message
                    // $('#error').html(response.responseJSON.errors.phone[0]);
                    $('#addCourtError').html(response.responseJSON);
                }
            });
        }
    })
}



let data;

$(document).ready(function () {
    setAuth();

    // جلب البيانات من ملف JSON
    $.ajax({
        url: '/courts/show',
        type: 'get',
        success: function (response) {

            data = response;
            // تحديث Pagination
            displayAll();

        },
        error: function (response) {
            console.log(response);

        }
    });

});



function displayAll() {

    // عرض الصفوف
    table = $('#table-body');
    table.empty();
    for (var i = 0; i < data.length; i++) {
        const court = data[i];
        addCourtRow(table, court)
    }



    var table = document.getElementsByClassName("table")[0];
    if (table.rows.length == 1) {

        var headerRow = table.rows[0];
        var numColumns = headerRow.cells.length;
        var row = table.insertRow(1);
        var cell = row.insertCell(0);
        cell.colSpan = numColumns;
        cell.innerHTML = "لا يوجد بيانات";
        cell.id = 'NoData'

    }
}


function addCourtRow(table, court) {

    const remove_btn = document.createElement('button')
    remove_btn.type = "button"
    remove_btn.id = "remove-button"
    remove_btn.classList.add('operations-btn', 'btn', 'btn-danger')
    remove_btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-text-bottom" aria-hidden="true"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>'
        + ' إزالة المحكمة'

    const row = $('<tr>').append(

        $('<td>').append(court.name),
        $('<td>').append(court.place),
        $('<td>').append(court.place),

    );
    remove_btn.onclick = function () {
        confirmDeleteSession(session.id);
    }
    row.attr('id', court.id);
    table.append(row);

}


function closeModal() {
    // حذف المعلومات المخزنة في ذاكرة التخزين المؤقت للجلسة
    sessionStorage.clear();

}
