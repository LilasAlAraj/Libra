(() => {
    'use strict'

    feather.replace({ 'aria-hidden': 'true' })
})()



function setNumClients() {

    let num_clients = 0;

    $.ajax({
        url: IP_PORT+"/clients/count",
        type: "get",

        success: function (response) {
            num_clients = response.num_clients;
            document.getElementById('num_clients').innerHTML = num_clients;

        },

        error: function (response) {
            console.log(response);
        }
    });

}

function setNumUnarchivedCases() {

    let num_unarchived_cases = 0;


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: IP_PORT+"/cases/unarchive/count",
        type: "get",

        success: function (response) {
            num_unarchived_cases = response.num_unarchived_cases;
            document.getElementById('num_unarchived_cases').innerHTML = num_unarchived_cases;
        },
        error: function (response) {
            console.log(response.responseJSON);
        }
    });
}



function setNumArchivedCases() {
    let num_arc_cases = 0;
    $.ajax({
        url: IP_PORT+"/cases/archive/count",
        type: "get",
        success: function (response) {
            num_arc_cases = response.num_arc_cases;
            document.getElementById('num_arc_cases').innerHTML = num_arc_cases;
        },
        error: function (response) {
            console.log(response.responseJSON);
        }
    });
}



function setTotalNumAssignedCases() {

    let num_cases = 0;
    $.ajax({
        url: IP_PORT+"/cases/total/count",
        type: "get",

        success: function (response) {
            num_cases = response.num_cases;
            document.getElementById('num_cases').innerHTML = num_cases;

        },

        error: function (response) {
            console.log(response.responseJSON);
        }
    });

}



function setCasesChart(winning, losing, running, blocked) {

    var casesValues = []
    var types = ['قضايا رابحة', 'قضايا خاسرة', 'قضايا جارٍ العمل عليها', 'قضايا معلقة'];
    var barColors = [
        "#52b462",
        "#b45d52",
        "#52a0b4",
        "#1b1b1b"

    ];


    casesValues[0] = winning;
    casesValues[1] = losing;
    casesValues[2] = running;
    casesValues[3] = blocked;





    new Chart("casesChart", {
        type: "doughnut",
        data: {
            labels: types,
            datasets: [{
                backgroundColor: barColors,
                data: casesValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "إحصائيات القضايا"
            }
        }
    });

}

function set_Cases_Chart() {


    let winning = 0, losed = 0, running = 0, blocked = 0;



    $.ajax({
        url: IP_PORT+"/cases/statistics",
        type: "get",

        success: function (response) {

            console.log(response)
            winning = response.winnedCase;
            losed = response.lostCase;
            running = response.runningCase;
            blocked = response.blockedCase;
            setCasesChart(winning, losed, running, blocked)

        },

        error: function (response) {
            console.log(response.responseJSON);
        }
    });

}



function fillCasesTable() {
    let data;
    $.ajax({
        url: IP_PORT+'/cases/latest',
        type: 'get',
        success: function (response) {
            console.log(response);

            data = response.cases;
            // عرض الصفوف
            table = $('#cases-body-table');
            table.empty();
            for (var i = 0; i < data.length; i++) {
                const case_ = data[i];
                addCaseRow(table, case_, i + 1)
            }



            var table = document.getElementById("cases-table");
            if (table.rows.length == 1) {

                var headerRow = table.rows[0];
                var numColumns = headerRow.cells.length;
                var row = table.insertRow(1);
                var cell = row.insertCell(0);
                cell.colSpan = numColumns;
                cell.innerHTML = "لا يوجد أي قضايا مضافة حديثاً";
                cell.style.textAlign = 'center'

            }

        },
        error: function (response) {
            console.log(response);
        }
    });

}


function addCaseRow(table, case_, num) {


    var plaintiff_names = '';
    for (var j = 0; j < case_.plaintiff_names.length; j++) {
        plaintiff_names += case_.plaintiff_names[j].first_name + ' ' + case_.plaintiff_names[j].father_name + ' ' + case_.plaintiff_names[j].last_name;
        if (j !== case_.plaintiff_names.length - 1)
            plaintiff_names += "\n____________\n";
    }
    const row = $('<tr>').append(
        $('<td>').append($('<b>').append(num)),
        $('<td>').append(case_.case.title),
        $('<td>').append(plaintiff_names)
    );
    row.addClass('clickable-row')
    row.click(function () {
        window.location = IP_PORT+"/cases/view/" + case_.case.id
    });
    row.attr('title', 'اضغط لعرض تفاصيل هذه القضية كاملة');

    table.append(row);

}





function nextTasksSearch() {
    $('#getTasksForDate').validate(
        {
            submitHandler: function (form) {

                $('#errorNextTask').html()

                var date = $('#date').val();


                $.ajax({
                    url: IP_PORT+'/tasks/filter',
                    type: 'get',
                    data: {
                        'search_key': '3',
                        'date': date,
                    },
                    success: function (response) {

                        console.log(response)
                        data = response;
                        // عرض الصفوف
                        var table = document.getElementById("tasks-table");
                        if (table.rows.length === 2)
                            table.rows[1].remove();
                        body = $('#tasks-body-table');
                        body.text('');
                        for (var i = 0; i < data.length; i++) {
                            addTaskRow(data[i], body, i + 1)
                        }



                        if (table.rows.length === 1) {

                            var headerRow = table.rows[0];
                            var numColumns = headerRow.cells.length;
                            var row = table.insertRow(1);
                            var cell = row.insertCell(0);
                            cell.colSpan = numColumns;
                            cell.innerHTML = "لا يوجد أي مهام لليوم ";
                            cell.style.textAlign = 'center'

                        }

                    },
                    error: function (response) {
                        console.log(response);

                    }
                });



            }
        }
    )
}


function fillTasksTable() {
    let data;
    $.ajax({
        url: IP_PORT+'/tasks/filter',
        type: 'get',
        data: {
            'search_key': '4'
        },
        success: function (response) {

            data = response;
            // عرض الصفوف
            table = $('#tasks-body-table');
            table.empty();
            for (var i = 0; i < data.length; i++) {
                addTaskRow(data[i], table, i + 1)
            }



            var table = document.getElementById("tasks-table");
            if (table.rows.length == 1) {

                var headerRow = table.rows[0];
                var numColumns = headerRow.cells.length;
                var row = table.insertRow(1);
                var cell = row.insertCell(0);
                cell.colSpan = numColumns;
                cell.innerHTML = "لا يوجد أي مهام لليوم ";
                cell.style.textAlign = 'center'

            }

        },
        error: function (response) {
            console.log(response);
        }
    });

}


function addTaskRow(data, table, num) {

    const task = data.task;
    const lawyers = data.lawyers;
    var lawyersString = '';
    for (var j = 0; j < lawyers.length; j++) {


        lawyersString += lawyers[j].first_name + ' ' + lawyers[j].last_name;
        if (j < lawyers.length - 1)
            lawyersString += '<hr>';
    }



    const status = document.createElement('span');
    status.id = 'status-' + task.id;
    status.classList.add('badge', 'state');

    if (task.Value_Status === 1) {
        status.classList.add('text-bg-info');
        status.innerHTML = 'قيد التنفيذ'
    } else if (task.Value_Status === 2) {
        status.innerHTML = 'ملغاة'
        status.classList.add('text-bg-danger');
    } else if (task.Value_Status === 3) {
        status.innerHTML = 'مكتملة'
        status.classList.add('text-bg-success');
    } else if (task.Value_Status === 4) {
        status.innerHTML = 'مؤجلة'
        status.classList.add('text-bg-dark');
    }

    var row = $('<tr>').append(

        $('<td>').text(num),
        $('<td>').text(task.name),
        $('<td>').text(task.priority),
        $('<td>').text(task.start_date),
        $('<td>').text(task.end_date),
        $('<td>').append(lawyersString),
        $('<td>').append(status)

    );

    table.append(row);

}


function fillMembershipRequestTable() {
    let data;
    $.ajax({
        url: IP_PORT+'/users/requests',
        type: 'get',

        success: function (response) {

            data = response;
            // عرض الصفوف

            var table = document.getElementById("membership-request-table");
            if (table.rows.length === 2)
                table.rows[1].remove();
            body = $('#membership-request-body-table');
            body.text('');
            for (var i = 0; i < data.length; i++) {
                addMembershipRequsetRow(data[i], body, i + 1)
            }



            if (table.rows.length == 1) {

                var headerRow = table.rows[0];
                var numColumns = headerRow.cells.length;
                var row = table.insertRow(1);
                var cell = row.insertCell(0);
                cell.colSpan = numColumns;
                cell.innerHTML = "لا يوجد أي طلبات";
                cell.style.textAlign = 'center'

            }

        },
        error: function (response) {
            console.log(response);
        }
    });

}


function addMembershipRequsetRow(data, table, num) {

    const request = data;

    const name = request.first_name + ' ' + request.last_name;
    const role = request.role_name;
    const id = request.id;


    const approveRequest = document.createElement('button');
    approveRequest.title = 'قبول الطلب';
    approveRequest.classList.add('btn', 'btn-success','btn-sm');
    approveRequest.innerHTML = '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="20 6 9 17 4 12"></polyline></svg>'
        + " قبول";
    approveRequest.onclick = function () {
        processRequest(id, 'approve');
    }
    approveRequest.style.marginLeft='1em';

    const denyRequest = document.createElement('button');
    denyRequest.title = 'رفص الطلب';
    denyRequest.classList.add('btn', 'btn-danger','btn-sm');
    denyRequest.innerHTML = '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>'
        + " رفض";
    denyRequest.onclick = function () {
        processRequest(id, 'deny');
    }


    const opperation = document.createElement('div');
    opperation.classList.add('d-flex','container');
    opperation.append(approveRequest, denyRequest)
    var row = $('<tr>').append(

        $('<td>').text(num),
        $('<td>').text(name),
        $('<td>').text(role),
        $('<td>').append(opperation),

    );

    row.attr('id','request-' + id);
    table.append(row);

}

function processRequest(id, operation) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: IP_PORT+"/users/requests/process",
        type: "put",
        data: {
            'userId': id,
            'operation': operation
        },
        success: function (response) {

            console.log(response)
            console.log(response.status)
            console.log(response.message)
            document.getElementById('message-text').innerHTML = response.message;
            $('#messageBackdrop').modal('show');
            $('#messageBackdrop').css('background', 'rgba(0,0,0,.3)');
            if (response.status === 'success') {

                document.getElementById('request-' + id).remove();
                var table = document.getElementById("membership-request-table");
                if (table.rows.length == 1) {

                    var headerRow = table.rows[0];
                    var numColumns = headerRow.cells.length;
                    var row = table.insertRow(1);
                    var cell = row.insertCell(0);
                    cell.colSpan = numColumns;
                    cell.innerHTML = "لا يوجد أي طلبات";
                    cell.style.textAlign = 'center'

                }

            }
        },

        error: function (response) {
            console.log(response)

            $('.error').html(response.message);

        }
    });


}
$(document).ready(function () {

    setNumUnarchivedCases();
    setNumArchivedCases();
    setTotalNumAssignedCases();
    setNumClients();
    set_Cases_Chart()
    fillCasesTable();
    fillTasksTable();
    fillMembershipRequestTable();

    document.getElementById('content').style.display = 'block';
    document.getElementById('spinner').style.display = 'none';
});




/*************************** */



//////////import report
var button = document.getElementById("import");
button.addEventListener("click", function () {
    var makepdf = '<h1>' + new Date() + '</h1>' +
        '<ul style="font-size: 1000; font-weight: bolder; padding:50px">' +
        '<li\>' +
        '					<h4 style="text-align: left;" dir="rtl">' +
        '						القضايا الرابحة: ' + '5' +
        '					</h4 >' +
        '			</li >' +
        '         <li>' +
        '           <h4>' +
        '             This is an example of generating' +
        '           pdf from HTML during runtime' +
        '        </h4>' +
        '     </li>' +
        '		</ul > ';

    html2pdf().from(makepdf).save();

});

