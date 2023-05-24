(() => {
    'use strict'

    feather.replace({ 'aria-hidden': 'true' })
})()




function setNumNextTasks() {

    let num_next_tasks = 10;

    /*
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "http://127.0.0.1:8000/login",
            type: "get",

            success: function (response) {
                num_next_tasks = response.data.num_next_tasks;
            },

            error: function (response) {
                console.log(response.responseJSON);
            }
        });
    */
    document.getElementById('num_next_tasks').innerHTML = num_next_tasks;
}




function setTotalNumAssignedCases() {

    let num_assigned_cases = 0;
    $.ajax({
        url: "http://127.0.0.1:8000/cases/lawyer",
        type: "get",
        success: function (response) {
            num_assigned_cases = response.num_assigned_cases;
            document.getElementById('num_assigned_cases').innerHTML = num_assigned_cases;
        },
        error: function (response) {
            console.log(response.responseJSON);
        }
    });
}


function fillCasesTable() {
    let data;
    $.ajax({
        url: 'http://127.0.0.1:8000/cases/latest',
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
        window.location = "http://127.0.0.1:8000/cases/view/" + case_.case.id
    });
    row.attr('title', 'اضغط لعرض تفاصيل هذه القضية كاملة');

    table.append(row);

}





function fillTasksTable() {
    let data;
    $.ajax({
        url: '../tasks/test.json',
        dataType: 'json',
        success: function (response) {

            data = response;
            // عرض الصفوف
            table = $('#tasks-body-table');
            table.empty();
            for (var i = 0; i < data.length; i++) {
                const task = data[i];
                addTaskRow(table, task, i + 1)
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
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('حدث خطأ: ' + textStatus + ' ' + errorThrown);
        }
    });

}


function addTaskRow(table, task, num) {


    const row = $('<tr>').append(
        $('<td>').append($('<b>').append(num)),
        $('<td>').append(task.name),
        $('<td>').append(task.description)
    );
    row.addClass('clickable-row')
    row.click(function () {
        window.location = "../tasks/view_task.html?id=" + task.id
    });
    row.attr('title', 'اضغط لعرض تفاصيل هذه المهمة كاملة');

    table.append(row);

}



$(document).ready(function () {

    setNumNextTasks();
    setTotalNumAssignedCases();
    fillCasesTable();
    fillTasksTable();
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
