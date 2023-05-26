<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="ليبرا هو بيتك القانوني.. وأكثر! يقوم بإدارة مكتبك وعملائك.. ويقوم بتنظيم الملفات والمهام.">
    <meta name="keywords"
        content="law firms management system, law, cases management system, cases, tasks, lawyers, lawyer, court">
    <meta name="author" content="Lilas">
    <meta name="generator" content="Lilas">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Libra</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <link href="../../css/navs.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">


</head>

<body>
    <header class="navbar sticky-top sticky-top flex-md-nowrap p-0 shadow" style="background-color:  rgb(7, 48, 78);">
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">
            <div class="imgcontainer">

                <img src="../../Img/Logo.jpg" alt="Avatar" class="avatar">
            </div>
        </a>
        <div class="d-flex justify-content-between w-100">
            <div class="navbar-nav">
                <div class="nav-item text-nowrap ">
                    <p class=" px-3 m-2" id="time">time</p>
                </div>
            </div>
            <div class="navbar-nav" style="">
                <div class="nav-item text-nowrap ">

                    <a class="nav-link px-3"href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        تسجيل الخروج
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">


            <nav id="sidebarMenu" class="col-md-3 col-lg-2 col-sm-12 d-md-block  sidebar collapse">
                <div class="position-sticky pt-3  sidebar-sticky ">
                    <ul class=" nav nav-pills flex-column mb-auto ">
                        <li class="mb-1 nav-item" id="dashboardNav">

                        </li>
                        <li class="mb-1 nav-item ">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                data-bs-toggle="collapse" data-bs-target="#cases-collapse" aria-expanded="false">
                                <span data-feather="file" class="align-text-bottom"></span>
                                القضايا
                            </button>

                            <div class="collapse collapse-items" id="cases-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ">
                                    <li id="addNewCaseNav">

                                    </li>
                                    <li id="addNewPrivateCaseNav">

                                    </li>
                                    <li id="viewCaseNav">
                                        <a href="http://127.0.0.1:8000/cases"
                                            class="nav-link d-inline-flex  collapse-items">
                                            <span data-feather="file-text" class="align-text-bottom"></span>
                                            عرض القضايا
                                        </a>
                                    </li>
                                    <li id="viewPrivateCaseNav">

                                    </li>
                                    <li id="viewPrivateCaseNav">

                                    </li>
                                    <li id="retreiveCaseNav">

                                    </li>
                                    <li id="archiveCaseNav">

                                    </li>
                                </ul>
                            </div>
                        </li>

                        <div id="tasksLi">
                        </div>

                        <div id="clientsLi">
                        </div>

                        <div id="membersLi">
                        </div>

                        <li class="mb-1 nav-item ">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                data-bs-toggle="collapse" data-bs-target="#settings-collapse" aria-expanded="false">
                                <span data-feather="settings" class="align-text-bottom"></span>
                                الإعدادات
                            </button>

                            <div class="collapse" id="settings-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ">
                                    <li id="courtSettingsNav">
                                    </li>
                                    <li id="recommendationsNav">
                                    </li>
                                    <li id="role_permessionSettingsNav">
                                    </li>

                                    <li><a href="http://127.0.0.1:8000/account/setting"
                                            class="nav-link d-inline-flex  collapse-items">
                                            <span data-feather="tool" class="align-text-bottom"></span>
                                            إعدادات حسابي
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>


            <main class="col-md-9 col-lg-10 col-sm-12">
                <div id="big-frame">
                    <div class="container  d-flex justify-content-between">

                        <h1>عرض القضايا</h1>
                        <div id="addNewCaseButton" style="display: flex; align-items: center;">
                        </div>
                    </div>
                    <hr>
                    <div class="container">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                            <div id="displayAllTapAuth">

                            </div>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link tab searchBy" id="by-title-tab" data-bs-toggle="tab"
                                    data-bs-target="#by-title-tab-pane" type="button" role="tab"
                                    aria-controls="by-title-tab-pane" aria-selected="false">
                                    بحث بموضوع الدعوى
                                </button>
                            </li>


                            <li class="nav-item" role="presentation">
                                <button class="nav-link tab searchBy" id="by-number-tab" data-bs-toggle="tab"
                                    data-bs-target="#by-number-tab-pane" type="button" role="tab"
                                    aria-controls="by-number-tab-pane" aria-selected="false">
                                    بحث برقم القضية
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link tab searchBy" id="by-state-tab" data-bs-toggle="tab"
                                    data-bs-target="#by-state-tab-pane" type="button" role="tab"
                                    aria-controls="by-state-tab-pane" aria-selected="false">
                                    بحث بحالة القضية
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link tab searchBy" id="by-court-tab" data-bs-toggle="tab"
                                    data-bs-target="#by-court-tab-pane" type="button" role="tab"
                                    aria-controls="by-court-tab-pane" aria-selected="false">
                                    بحث باسم المحكمة
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link tab searchBy" id="by-plaintiff_name-tab" data-bs-toggle="tab"
                                    data-bs-target="#by-plaintiff_name-tab-pane" type="button" role="tab"
                                    aria-controls="by-plaintiff_name-tab-pane" aria-selected="false">
                                    بحث باسم الموكل
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link tab searchBy" id="by-plaintiff_lawyer-tab"
                                    data-bs-toggle="tab" data-bs-target="#by-plaintiff_lawyer-tab-pane"
                                    type="button" role="tab" aria-controls="by-plaintiff_lawyer-tab-pane"
                                    aria-selected="false">
                                    بحث باسم المحامي
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link tab searchBy" id="by-years-tab" data-bs-toggle="tab"
                                    data-bs-target="#by-years-tab-pane" type="button" role="tab"
                                    aria-controls="by-years-tab-pane" aria-selected="false">
                                    بحث بالعام
                                </button>
                            </li>

                        </ul>


                        <div class="tab-content" id="myTabContent">
                            <div id="displayAllTapPaneAuth">
                            </div>
                            <div class="tab-pane fade" id="by-title-tab-pane" role="tabpanel"
                                aria-labelledby="by-title-tab" tabindex="0">
                                <form id="searchByTitle" class="search-options">

                                    <div class="row">
                                        <div class="col-12">
                                            <label for="title"><b>موضوع الدعوى</b></label>
                                            <input type="text" id="title" name="title" required>
                                        </div>


                                    </div>
                                    <div class="container" style="padding: 0;">
                                        <button type="submit" id="search-button"
                                            class="operations-btn btn btn-success" onclick="searchByTitle()">
                                            <span data-feather="search" class="align-text-bottom"></span>
                                            ابحث

                                        </button>
                                        <button type="reset" id="remove-button"
                                            class="operations-btn btn btn-danger">
                                            <span data-feather="x-circle" class="align-text-bottom"></span>
                                            امسح
                                        </button>


                                        <span id="error" class="error">
                                        </span>
                                    </div>
                                    <hr>


                                </form>
                            </div>


                            <div class="tab-pane fade" id="by-number-tab-pane" role="tabpanel"
                                aria-labelledby="by-title-tab" tabindex="0">
                                <form id="searchByBaseNumber" class="search-options">

                                    <div class="row">
                                        <div class="col-6">

                                            <label for="base_number"><b>رقم الأساس</b></label>
                                            <input type="number" id="base_number" placeholder="أدخل رقم الأساس"
                                                name="base_number">

                                        </div>
                                        <div class="col-6">
                                            <label for="year"><b>العام</b></label>
                                            <select id="year" class='year' name="year">
                                            </select>
                                        </div>



                                    </div>
                                    <div class="container" style="padding: 0;">
                                        <button type="submit" id="search-button"
                                            class="operations-btn btn btn-success" onclick="searchByBaseNumber()">
                                            <span data-feather="search" class="align-text-bottom"></span>
                                            ابحث

                                        </button>
                                        <button type="reset" id="remove-button"
                                            class="operations-btn btn btn-danger">
                                            <span data-feather="x-circle" class="align-text-bottom"></span>
                                            امسح
                                        </button>


                                        <span id="error" class="error">
                                        </span>
                                    </div>
                                    <hr>


                                </form>
                            </div>




                            <div class="tab-pane fade" id="by-state-tab-pane" role="tabpanel"
                                aria-labelledby="by-state-tab" tabindex="0">
                                <form id="searchByState" class="search-options">

                                    <div class="row">
                                        <div class="col-12">
                                            <label for="state"><b>الحالة</b></label>
                                            <select id="state" name="state" required>
                                                <option value="3" style="color: blue">جارٍ العمل عليها</option>
                                                <option value="1" style="color: green">رابحة</option>
                                                <option value="2" style="color: red">خاسرة</option>
                                                <option value="4" style="color: black">معلقة</option>
                                            </select>
                                        </div>


                                    </div>
                                    <div class="container" style="padding: 0;">
                                        <button type="submit" id="search-button"
                                            class="operations-btn btn btn-success" onclick="searchByState()">
                                            <span data-feather="search" class="align-text-bottom"></span>
                                            ابحث

                                        </button>
                                        <button type="reset" id="remove-button"
                                            class="operations-btn btn btn-danger">
                                            <span data-feather="x-circle" class="align-text-bottom"></span>
                                            امسح
                                        </button>


                                        <span id="error" class="error">
                                        </span>
                                    </div>
                                    <hr>


                                </form>
                            </div>


                            <div class="tab-pane fade " id="by-court-tab-pane" role="tabpanel"
                                aria-labelledby="by-court-tab" tabindex="0">
                                <form id="searchByCourt" class="search-options">

                                    <div class="row">
                                        <div class="col-12">
                                            <label for="court"><b> المحكمة</b></label>
                                            <select id="court" name="court">

                                                <option disabled selected>اختر المحكمة</option>

                                            </select>
                                        </div>

                                    </div>
                                    <div class="container" style="padding: 0;">
                                        <button type="submit" id="search-button"
                                            class="operations-btn btn btn-success" onclick="searchByCourt()">
                                            <span data-feather="search" class="align-text-bottom"></span>
                                            ابحث

                                        </button>
                                        <button type="reset" id="remove-button"
                                            class="operations-btn btn btn-danger">
                                            <span data-feather="x-circle" class="align-text-bottom"></span>
                                            امسح
                                        </button>
                                        <span id="error" class="error">
                                        </span>
                                    </div>
                                    <hr>
                                </form>
                            </div>
                            <div class="tab-pane fade " id="by-plaintiff_name-tab-pane" role="tabpanel"
                                aria-labelledby="by-plaintiff_name-tab" tabindex="0">
                                <form id="searchByplaintiffName" class="search-options">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="court_name"><b>اسم المدعي</b></label>
                                            <input type="text" id="plaintiff_name" name="plaintiff_name" required>
                                        </div>
                                    </div>
                                    <div class="container" style="padding: 0;">
                                        <button type="submit" id="search-button"
                                            class="operations-btn btn btn-success" onclick="searchByplaintiffName()">
                                            <span data-feather="search" class="align-text-bottom"></span>
                                            ابحث
                                        </button>
                                        <button type="reset" id="remove-button"
                                            class="operations-btn btn btn-danger">
                                            <span data-feather="x-circle" class="align-text-bottom"></span>
                                            امسح
                                        </button>
                                        <span id="error" class="error">
                                        </span>
                                    </div>
                                    <hr>
                                </form>
                            </div>
                            <div class="tab-pane fade " id="by-plaintiff_lawyer-tab-pane" role="tabpanel"
                                aria-labelledby="by-plaintiff_lawyer-tab" tabindex="0">
                                <form id="searchByplaintiffLawyer" class="search-options">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="plaintiff_lawyer"><b>اسم المحامي</b></label>
                                            <select id="plaintiff_lawyer" name="plaintiff_lawyer" required>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="container" style="padding: 0;">
                                        <button type="submit" id="search-button"
                                            class="operations-btn btn btn-success"
                                            onclick="searchByplaintiff_lawyer()">
                                            <span data-feather="search" class="align-text-bottom"></span>
                                            ابحث
                                        </button>
                                        <button type="reset" id="remove-button" onmouseenter=""
                                            class="operations-btn btn btn-danger">
                                            <span data-feather="x-circle" class="align-text-bottom"></span>
                                            امسح
                                        </button>
                                        <span id="error" class="error">
                                        </span>
                                    </div>
                                    <hr>
                                </form>
                            </div>

                            <div class="tab-pane fade " id="by-years-tab-pane" role="tabpanel"
                                aria-labelledby="by-years-tab" tabindex="0">
                                <form id="searchByYears" class="search-options">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="from_year"><b>من عام</b></label>
                                            <select id="from_year" class='year' name="from_year">
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="to_year"><b>إلى عام</b></label>
                                            <select id="to_year" class='year' name="to_year">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="container" style="padding: 0;">
                                        <button type="submit" id="search-button"
                                            class="operations-btn btn btn-success" onclick="searchByYears()">
                                            <span data-feather="search" class="align-text-bottom"></span>
                                            ابحث
                                        </button>
                                        <button type="reset" id="remove-button" onmouseenter=""
                                            class="operations-btn btn btn-danger">
                                            <span data-feather="x-circle" class="align-text-bottom"></span>
                                            امسح
                                        </button>
                                        <span id="errorSearchByYear" class="error">
                                        </span>
                                    </div>
                                    <hr>
                                </form>
                            </div>
                        </div>
                        <table class="table table-bordered  table-striped ">
                            <thead>
                                <tr>
                                    <th>رقم الأساس/العام</th>
                                    <th>موضوع الدعوى</th>
                                    <th>المحكمة/الغرفة</th>
                                    <th>اسم المدعي</th>
                                    <th>محامي المدعي</th>
                                    <th>اسم المدعي عليه</th>
                                    <th>محامي المدعي عليه</th>
                                    <th>حالة القضية</th>
                                    <th>العمليات</th>
                                </tr>

                            </thead>
                            <tbody id="table-body"></tbody>
                        </table>
                        <div class="container" style="text-align: right;display: flex; justify-content:space-between">
                            <nav aria-label="Page navigation example" class="row">
                                <ul id="pagination" class="pagination"></ul>
                            </nav>


                            <button style='height: 100%;' id='reverse-btn' type="button" data-display='asc'
                                class="operations-btn btn" onclick="reverseData()">
                                <span data-feather="refresh-cw" class="align-text-bottom"></span>

                                عرض تنازلي

                            </button>

                        </div>
                    </div>


                </div>

            </main>
        </div>
    </div>


    <!--popup archive case-->
    <div class="modal fade" id="archiveCaseBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="archiveCaseBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="height: fit-content; ">
            <div class="modal-content">
                <div class="modal-header" style=" background-color: rgb(87, 126, 155);">
                    <h1 class="modal-title fs-5" id="archiveCaseBackdropLabel" style=" color:white;">
                        تأكيد عملية الأرشفة
                    </h1>
                </div>
                <div class=" modal-body">
                    <p>
                        هل أنت متأكد من أرشفة هذه القضية؟
                    </p>
                </div>
                <div class="modal-footer " style="width:auto;">
                    <button type="submit" class="operations-btn btn btn-warning" id="archiveBtnBackdrop">
                        <span data-feather="archive" class="align-text-bottom"></span>
                        أرشف
                    </button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="closeModal()">
                        <span data-feather="x" class="align-text-bottom"></span>
                        أغلق
                    </button>
                    <br>
                </div>
            </div>
        </div>
    </div>


    <!--popup delete case-->
    <div class="modal fade" id="deleteCaseBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="deleteCaseBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="height: fit-content; ">
            <div class="modal-content">
                <div class="modal-header" style=" background-color: rgb(87, 126, 155);">
                    <h1 class="modal-title fs-5" id="deleteCaseBackdropLabel" style=" color:white;">
                        تأكيد عملية الحذف
                    </h1>
                </div>
                <div class=" modal-body">
                    <p>
                        هل أنت متأكد من حذف هذه القضية؟
                    </p>
                </div>
                <div class="modal-footer " style="width:auto;">
                    <button type="submit" class="operations-btn btn btn-danger" id="deleteBtnBackdrop">
                        <span data-feather="trash" class="align-text-bottom"></span>
                        احذف
                    </button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="closeModal()">
                        <span data-feather="x" class="align-text-bottom"></span>
                        أغلق
                    </button>
                    <br>

                </div>
            </div>
        </div>
    </div>


    <!--popup edit case-->
    <div class="modal fade" id="editCaseBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editCaseBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="height: fit-content; ">
            <div class="modal-content">
                <div class="modal-header" style=" background-color: rgb(87, 126, 155);">
                    <h1 class="modal-title fs-5" id="editCaseBackdropLabel" style=" color:white;">
                        تأكيد عملية التعديل
                    </h1>
                </div>
                <div class=" modal-body">
                    <p>
                        هل أنت متأكد من تعديل هذه القضية؟
                    </p>
                </div>
                <div class="modal-footer " style="width:auto;">
                    <button type="submit" class="operations-btn btn btn-secondary" id="editBtnBackdrop">
                        <span data-feather="edit-2" class="align-text-bottom"></span>
                        انتقل للتعديل
                    </button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="closeModal()">
                        <span data-feather="x" class="align-text-bottom"></span>
                        أغلق
                    </button>
                    <br>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="messageBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="messageBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="height: fit-content; ">
            <div class="modal-content">
                <div class="modal-header" style=" background-color: rgb(87, 126, 155);">
                    <h1 class="modal-title fs-5" id="messageBackdropLabel" style=" color:white;">
                        رسالة
                    </h1>
                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" id="closeModal"
                        aria-label="Close"></button>

                </div>
                <div class=" modal-body">
                    <p id="message-text">
                    </p>
                </div>

            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>

    <script src="../../js/users/auth.js"></script>
    <script src="../../js/navs.js"></script>
    <script src="../../js/cases/view.js"></script>




</body>

</html>
