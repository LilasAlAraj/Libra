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
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

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

        <div class="navbar-nav col-md-1 col-lg-1">
            <div class="nav-item text-nowrap ">
                <p class=" px-3 m-2" id="time">time</p>
            </div>
        </div>
        <div class="navbar-nav col-md-8 col-lg-9" style=" text-align:left;">
            <div class="nav-item text-nowrap ">
                <a class="nav-link  px-3" href="#">تسجيل الخروج</a>
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
                                        <a href="../cases/view.html" class="nav-link d-inline-flex  collapse-items">
                                            <span data-feather="file-text" class="align-text-bottom"></span>
                                            عرض القضايا
                                        </a>
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
                                    <li id="role_permessionSettingsNav">
                                    </li>

                                    <li><a href="../users/account_settings.html"
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

                <div class="container">
                    <div class="row">
                        <div class="col-12" id="account_name">
                            <b>
                                account_name:
                            </b>

                        </div>
                        <div class="col-12" id="account_type">
                            <b>
                                account_type:
                            </b>

                        </div>
                    </div>
                </div>
                <div class="container">
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                        data-bs-target="#changePasswordModal">
                        <span data-feather="key" class="align-text-bottom"></span>
                        تغيير كلمة المرور
                    </button>
                </div>
            </main>
        </div>
    </div>


    <!--change password Modal -->
    <div class="modal fade" id="changePasswordModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="height: fit-content; ">
            <div class="modal-content">
                <div class="modal-header" style=" background-color: rgb(87, 126, 155);">
                    <h1 class="modal-title fs-5" id="changePasswordModalLabel" style=" color:white;">
                        تغيير كلمة المرور الحالية
                    </h1>
                </div>
                <form id='changePassword_form' method="post"
                    style="background-color: transparent; border:none; margin: 0;">
                    <div class=" modal-body">
                        <div class="container ">

                            <div class="row">

                                <div class="col-12">
                                    <label for="current_password"><b>كلمة المرور الحالية</b></label>
                                </div>
                                <div class="col-11" style="padding: 0;">
                                    <input type="password" id="current_password" placeholder="أدخل كلمة المرور الحالية"
                                        name="current_password" required>
                                </div>
                                <div class="col-1" style="padding: 0;">
                                    <button type="button" id="show-current_password-btn"
                                        onclick="showPassword('current_password')">
                                        <span data-feather="eye" class="align-text-bottom"></span>
                                    </button>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-12">
                                    <label for="new_password"><b>كلمة المرور الجديدة</b></label>
                                </div>
                                <div class="col-11" style="padding: 0;">
                                    <input type="password" id="new_password" placeholder="أدخل كلمة المرور الجديدة"
                                        name="new_password" required>
                                </div>
                                <div class="col-1" style="padding: 0;">
                                    <button type="button" id="show-new_password-btn"
                                        onclick="showPassword('new_password')">
                                        <span data-feather="eye" class="align-text-bottom"></span>
                                    </button>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-12">
                                    <label for="confirm_new_password"><b>تأكيد كلمة المرور الجديدة</b></label>
                                </div>
                                <div class="col-11" style="padding: 0;">
                                    <input type="password" id="confirm_new_password"
                                        placeholder="أكِّد كلمة المرور الجديدة" name="confirm_new_password" required>
                                </div>
                                <div class="col-1" style="padding: 0;">
                                    <button type="button" id="show-confirm_new_password-btn"
                                        onclick="showPassword('confirm_new_password')">
                                        <span data-feather="eye" class="align-text-bottom"></span>
                                    </button>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer " style="width:auto;">
                        <button type="submit" class="operations-btn btn btn-warning" onclick="changePassword()">
                            <span data-feather="edit-3" class="align-text-bottom"></span>
                            تغيير
                        </button>
                        <button type="reset" class="btn btn-dark" data-bs-dismiss="modal" onclick="closeModal()">
                            <span data-feather="x" class="align-text-bottom"></span>
                            أغلق
                        </button>
                        <br>
                        <div id="changePasswordError" class="error">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        crossorigin="anonymous"></script>
    <script src="../../js/users/auth.js"></script>
    <script src="../../js/navs.js"></script>
    <script src="../../js/users/account_settings.js"></script>




</body>

</html>