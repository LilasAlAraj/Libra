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
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <link href="../../css/navs.css" rel="stylesheet">
  <link href="../../css/style.css" rel="stylesheet">


</head>

<body>
  <div class="overlay" id="overlay"></div>

  <div id="content">
    <header class="navbar sticky-top sticky-top flex-md-nowrap p-0 shadow" style="background-color:  rgb(7, 48, 78);">
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
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

                    <li><a href="../users/account_settings.html" class="nav-link d-inline-flex  collapse-items">
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

            <div class="container">

              <div class="row ">
                <div class="col-12">
                  <h1>عرض تفاصيل القضية</h1>
                </div>

              </div>
              <hr>
              <div class=" logocontainer ">
                <img src="../../Img/naqaba_logo.png" alt="Avatar" class="naqaba-logo ">
              </div>
            </div>
            <div class="container" id="infoOfCase">
              <div class="container" id="case-court-info">
                <div class="row">
                  <div class="col-12" id="court">
                    <b>المحكمة: </b>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12" id="room">
                    <b>الغرفة: </b>
                  </div>
                </div>
                <div id="base-numbers">

                </div>
              </div>
              <div class="basic-info">
                <div class="row container">
                  <table class="table table-bordered ">
                    <thead>
                      <tr>
                        <th colspan="2">الجهة المدعية</th>
                        <th colspan="2">الجهة المدعى عليها</th>

                      </tr>

                      <th>الاسم</th>
                      <th>الوكيل</th>
                      <th>الاسم</th>
                      <th>الوكيل</th>
                    </thead>
                    <tbody id='vss_table_body'>

                    </tbody>
                  </table>
                </div>
              </div>



            </div>

            <div class="accordion" id="myAccordion">



              <div class="accordion-item">
                <h2 class="accordion-header" id="headingZero">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseZero" aria-expanded="false" aria-controls="collapseZero">
                    حالة القضية
                  </button>
                </h2>
                <div id="collapseZero" class="accordion-collapse collapse " aria-labelledby="headingZero"
                  data-bs-parent="#myAccordion">
                  <div class="accordion-body container">
                    <div class="container" id="case_state" style="display: flex;justify-content: space-between;">
                      <div id="state" class="badge state"
                        style="align-items: center; display: flex; font-weight: 900;font-size: larger; color: white;">
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    تفاصيل إضافية
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne"
                  data-bs-parent="#myAccordion">
                  <div class="accordion-body container" id="additional_details">
                    <div class="container">
                      <div class="container" id="dawa">
                        <b>الدعوى: </b>
                      </div>

                      <div class="container" id="waqae">
                        <b>الوقائع: </b>
                      </div>
                      <div class="container" id="eltemas">
                        <b>الالتماس: </b>
                      </div>
                    </div>


                  </div>
                </div>
              </div>


              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    جلسات القضية
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse " aria-labelledby="headingTwo"
                  data-bs-parent="#myAccordion">
                  <div class="accordion-body container" id="sessions">
                    <table class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr>
                          <th>رقم الجلسة</th>
                          <th>التاريخ</th>
                          <th>التفاصيل</th>
                          <th>العمليات</th>
                        </tr>
                      </thead>
                      <tbody id="sessions-table-body">

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    مرفقات القضية
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                  data-bs-parent="#myAccordion">
                  <div class="accordion-body container" id="attachments">
                    <table class="table table-bordered table-striped table-hover">
                      <thead>

                        <tr>
                          <th>رقم المرفق</th>
                          <th>النوع</th>
                          <th>التفاصيل</th>
                          <th>العمليات</th>
                        </tr>
                      </thead>
                      <tbody id='attachment-case-table-body'>

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    القرارات
                  </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                  data-bs-parent="#myAccordion">
                  <div class="accordion-body container" id="decisions">
                    <table class="table table-bordered table-striped table-hover">
                      <thead>

                        <tr>
                          <th>رقم القرار</th>
                          <th>التاريخ</th>
                          <th>التفاصيل</th>
                          <th>العمليات</th>
                        </tr>
                      </thead>
                      <tbody id="decision-table-body">

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>

  <!-- Modal popup change state-->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header" style=" background-color: rgb(87, 126, 155);">
          <h1 class="modal-title fs-5" id="staticBackdropLabel" style=" color:white;">تغيير حالة القضية</h1>
        </div>



        <form id='chang_state_form' method="post" style="background-color: transparent; border:none;width: 100%;">
          <div class=" modal-body">
            <label for="selected_state"><b>الحالة الجديدة: </b></label>
            <select id="selected_state" name="selected_state" required>

              <option value="3" style="color: blue">جارٍ العمل عليها</option>
              <option value="1" style="color: green">رابحة</option>
              <option value="2" style="color: red">خاسرة</option>
              <option value="4" style="color: black">معلقة</option>
            </select>
          </div>
          <br>
          <div class="modal-footer" style="width:auto;">
            <button type="submit" id="change-button" class="operations-btn btn btn-secondary"
              onclick="changeStateCase()">
              <span data-feather="edit-2" class="align-text-bottom"></span>
              عدّل الحالة

            </button>
            <button type="reset" class="btn btn-dark" data-bs-dismiss="modal" onclick="closeModal()">
              <span data-feather="x" class="align-text-bottom"></span>
              أغلق
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>



  <!--popup edit additional details-->
  <div class="modal fade" id="changeAdditionalDetailsBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="changeAdditionalDetailsBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="height: fit-content; ">
      <div class="modal-content">
        <div class="modal-header" style=" background-color: rgb(87, 126, 155);">
          <h1 class="modal-title fs-5" id="changeAdditionalDetailsBackdropLabel" style=" color:white;">تعديل تفاصيل
            القضية</h1>
        </div>



        <form id='edit_case_details_form' method="post" style="background-color: transparent; border:none">
          <div class=" modal-body" style="margin-right: -30%; width: 160%;">
            <div class="container">
              <div class="row ">
                <div class="col-12">
                  <label for="dawa_edit"><b>الدعوى</b></label>
                  <input type="text" id="dawa_edit" name="dawa" required style="height: 2em;">
                </div>

              </div>

              <div class="row ">
                <div class="col-12">
                  <label for="waqae_edit"><b>الوقائع</b></label>
                  <textarea class="form-control" id="waqae_edit" name="waqae" rows="5" style="max-height:8em;"
                    required></textarea>
                </div>
              </div>
              <div class="row ">
                <div class="col-12">
                  <label for="eltemas_edit"><b>الالتماس</b></label>
                  <textarea class="form-control" id="eltemas_edit" name="eltemas" rows="5" style="max-height:8em;"
                    required></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer " style="width:130%;">
            <button type="submit" class="operations-btn btn btn-secondary">
              <span data-feather="edit-3" class="align-text-bottom"></span>
              عدّل التفاصيل

            </button>
            <button type="reset" class="btn btn-dark" data-bs-dismiss="modal" onclick="closeModal()">
              <span data-feather="x" class="align-text-bottom"></span>
              أغلق
            </button>

            <div id="errorEditAdditionalDetails" class="error">

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!--popup add new session-->
  <div class="modal fade" id="addNewSessionBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="addNewSessionBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="height: fit-content; ">
      <div class="modal-content">
        <div class="modal-header" style=" background-color: rgb(87, 126, 155);">
          <h1 class="modal-title fs-5" id="addNewSessionBackdropLabel" style=" color:white;">
            إضافة جلسة جديدة
          </h1>
        </div>



        <form id='addNewSession_form' method="post" style="background-color: transparent; border:none">
          <div class=" modal-body">
            <div class="container">
              <div class="row ">
                <div class="col-6">
                  <label for="newSessionNumber"><b>رقم الجلسة</b></label>
                  <input type="number" id="newSessionNumber" name="newSessionNumber" placeholder="أدخل رقم الجلسة"
                    required>
                </div>

                <div class="col-6">
                  <label for="newSessionDate"><b>تاريخ الجلسة</b></label>
                  <input type="date" id="newSessionDate" name="newSessionDate" placeholder="أدخل تاريخ الجلسة" required>
                </div>

              </div>

              <div class="row ">
                <div class="col-12">
                  <label for="newSessionDetails"><b>تفاصيل الجلسة</b></label>
                  <textarea class="form-control" id="newSessionDetails" name="newSessionDetails" rows="5"
                    style="max-height:10em;" required></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-12">

                  <label for="sessionAttachments"><b>اختيار مرفقات الجلسة</b></label>
                  <input class="form-control" type="file" name="sessionAttachments" id="sessionAttachments" multiple>
                </div>
              </div>

            </div>
          </div>
          <div class="modal-footer " style="width:auto;">
            <button type="submit" class="operations-btn btn btn-success" onclick="addNewSession()">
              <span data-feather="plus" class="align-text-bottom"></span>
              إضافة الجلسة

            </button>
            <button type="reset" class="btn btn-dark" data-bs-dismiss="modal" onclick="closeModal()">
              <span data-feather="x" class="align-text-bottom"></span>
              أغلق
            </button>
            <br>
            <div id="errorAddSession" class="error">

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>



  <!--popup add new attachment-->
  <div class="modal fade" id="addNewAttachmentBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="addNewAttachmentBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="height: fit-content; ">
      <div class="modal-content">
        <div class="modal-header" style=" background-color: rgb(87, 126, 155);">
          <h1 class="modal-title fs-5" id="addNewAttachmentBackdropLabel" style=" color:white;">
            إضافة مرفق جديد للقضية
          </h1>
        </div>
        <form id='addNewAttachment_form' method="post" style="background-color: transparent; border:none">
          <div class=" modal-body">
            <div class="container">
              <div class="row ">
                <div class="col-12">
                  <label for="newAttachment_type"><b>نوع المرفق</b></label>
                  <input class="form-control" id="newAttachment_type" name="newAttachment_type" required>
                </div>
              </div>
              <div class="row ">
                <div class="col-12">
                  <label for="newAttachment_detail"><b>تفاصيل المرفق</b></label>
                  <textarea class="form-control" id="newAttachment_detail" name="newAttachment_detail" rows="5"
                    style="max-height:8em;" required></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <label for="newAttachmentFile"><b>اختيار المرفق</b></label>
                  <input class="form-control" type="file" name="newAttachmentFile" id="newAttachmentFile" required>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer " style="width:auto;">
            <button type="submit" class="operations-btn btn btn-success" onclick="addNewAttachment()">
              <span data-feather="plus" class="align-text-bottom"></span>
              إضافة مرفق
            </button>
            <button type="reset" class="btn btn-dark" data-bs-dismiss="modal" onclick="closeModal()">
              <span data-feather="x" class="align-text-bottom"></span>
              أغلق
            </button>
            <br>
            <div id="errorAddAttachment" class="error">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>



  <!--popup archive case-->
  <div class="modal fade" id="archiveCaseBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="archiveCaseBackdropLabel" aria-hidden="true">
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
          <button type="submit" class="operations-btn btn btn-warning" onclick="archiveCase()">
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
  <div class="modal fade" id="deleteCaseBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="deleteCaseBackdropLabel" aria-hidden="true">
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
          <button type="submit" class="operations-btn btn btn-danger" onclick="deleteCase()">
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
          <button type="submit" class="operations-btn btn btn-secondary" onclick="editCase()">
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


  <!--popup view decision-->
  <div class="modal fade" id="viewDecicionBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="viewDecicionBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered modal-dialog-scrollable"
      style="height: fit-content; ">
      <div class="modal-content">
        <div class="modal-header" style=" background-color: rgb(87, 126, 155);">
          <h1 class="modal-title fs-5" id="viewDecicionBackdropLabel" style=" color:white;">
            عرض القرار
          </h1>
        </div>
        <div class=" modal-body">

          <div class="container">
            <div>
              <b>رقم القرار </b>
              <span id="decisionNumber">
              </span>
            </div>
            <div>
              <b>تاريخ القرار: </b>
              <span id="decisionDate">
              </span>
            </div>
            <div>
              <b>تفاصيل القرار: </b>
              <span id="decisionDetails">

              </span>
            </div>
          </div>
          <div id="decisionOpperation">

          </div>


        </div>
        <div class="modal-footer " style="width:auto;">


          <button type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="closeModal()">
            <span data-feather="x" class="align-text-bottom"></span>
            أغلق
          </button>

        </div>
      </div>
    </div>
  </div>


  <!--popup view session-->
  <div class="modal fade" id="viewSessionBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="viewSessionBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered modal-dialog-scrollable"
      style="height: fit-content; ">
      <div class="modal-content">
        <div class="modal-header" style=" background-color: rgb(87, 126, 155);">
          <h1 class="modal-title fs-5" id="viewSessionBackdropLabel" style=" color:white;">
            عرض الجلسة
          </h1>
        </div>
        <div class=" modal-body">

          <div class="container">
            <div>
              <b>رقم الجلسة: </b>
              <span id="sessionNumber">
              </span>
            </div>
            <div>
              <b>تاريخ الجلسة: </b>
              <span id="sessionDate">
              </span>
            </div>
            <div>
              <b>تفاصيل الجلسة: </b>
              <span id="sessionDetails">

              </span>
            </div>
          </div>
          <div id="sessionOpperation">

          </div>

          <div class="container">

            <div class="d-flex justify-content-between">
              <h3>المرفقات</h3>
              <div id="AddAttaachmentForSession">

              </div>
            </div>

            <hr>
            <table class="table table-bordered table-striped ">
              <thead>

                <tr>
                  <th>رقم المرفق</th>
                  <th>النوع</th>
                  <th>التفاصيل</th>
                  <th>العمليات</th>
                </tr>
              </thead>
              <tbody id="sessionAttachments-body">
              </tbody>
            </table>

          </div>
        </div>
        <div class="modal-footer " style="width:auto;">


          <button type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="closeModal()">
            <span data-feather="x" class="align-text-bottom"></span>
            أغلق
          </button>

        </div>
      </div>
    </div>
  </div>

  <!--popup delete session-->
  <div class="modal fade" id="deleteSessionBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="deleteSessionBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="height: fit-content; ">
      <div class="modal-content">
        <div class="modal-header" style=" background-color: rgb(87, 126, 155);">
          <h1 class="modal-title fs-5" id="deleteSessionBackdropLabel" style=" color:white;">
            تأكيد عملية الحذف
          </h1>
        </div>
        <div class=" modal-body">
          <p>
            هل أنت متأكد من حذف هذه الجلسة؟
          </p>
        </div>
        <div class="modal-footer " style="width:auto;">
          <button type="submit" id="deleteSessionButton" class="operations-btn btn btn-danger">
            <span data-feather="trash" class="align-text-bottom"></span>
            احذف
          </button>
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="closeModal()">
            <span data-feather="x" class="align-text-bottom"></span>
            أغلق
          </button>

        </div>
      </div>
    </div>
  </div>


  <!--popup add new attachment for session-->
  <div class="modal fade" id="addNewSessionAttachmentBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="addNewSessionAttachmentBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="height: fit-content; ">
      <div class="modal-content">
        <div class="modal-header" style=" background-color: rgb(87, 126, 155);">
          <h1 class="modal-title fs-5" id="addNewSessionAttachmentBackdropLabel" style=" color:white;">
            إضافة مرفق جديد للجلسة
          </h1>
        </div>
        <form id='addNewSessionAttachment_form' method="post" style="background-color: transparent; border:none">
          <div class=" modal-body">
            <div class="container">
              <div class="row ">
                <div class="col-12">
                  <label for="newSessionAttachment_type"><b>نوع المرفق</b></label>
                  <input class="form-control" id="newSessionAttachment_type" name="newSessionAttachment_type" required>
                </div>
              </div>
              <div class="row ">
                <div class="col-12">
                  <label for="newSessionAttachment_detail"><b>تفاصيل المرفق</b></label>
                  <textarea class="form-control" id="newSessionAttachment_detail" name="newSessionAttachment_detail"
                    rows="5" style="max-height:8em;" required></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <label for="newSeesionAttachmentFile"><b>اختيار المرفق</b></label>
                  <input class="form-control" type="file" name="newSeesionAttachmentFile" id="newSeesionAttachmentFile"
                    required>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer " style="width:auto;">
            <button type="submit" class="operations-btn btn btn-success" onclick="addNewSessionAttachment()">
              <span data-feather="plus" class="align-text-bottom"></span>
              إضافة مرفق
            </button>
            <button type="reset" class="btn btn-dark" data-bs-dismiss="modal" onclick="closeModal()">
              <span data-feather="x" class="align-text-bottom"></span>
              أغلق
            </button>
            <br>
            <div id="errorAddSessionAttachment" class="error">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!--popup edit  session-->
  <div class="modal fade" id="editSessionBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editSessionBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="height: fit-content; ">
      <div class="modal-content">
        <div class="modal-header" style=" background-color: rgb(87, 126, 155);">
          <h1 class="modal-title fs-5" id="editSessionBackdropLabel" style=" color:white;">
            تعديل الجلسة
          </h1>
        </div>



        <form id='editSession_form' method="post" style="background-color: transparent; border:none">
          <div class=" modal-body">
            <div class="container">
              <div class="row ">
                <div class="col-6">
                  <label for="editSessionNumber"><b>رقم الجلسة</b></label>
                  <input type="number" id="editSessionNumber" name="editSessionNumber" placeholder="أدخل رقم الجلسة"
                    required>
                </div>

                <div class="col-6">
                  <label for="editSessionDate"><b>تاريخ الجلسة</b></label>
                  <input type="date" id="editSessionDate" name="editSessionDate" placeholder="أدخل تاريخ الجلسة"
                    required>
                </div>

              </div>

              <div class="row ">
                <div class="col-12">
                  <label for="editSessionDetails"><b>تفاصيل الجلسة</b></label>
                  <textarea class="form-control" id="editSessionDetails" name="editSessionDetails" rows="5"
                    style="max-height:10em;" required></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer " style="width:auto;">
            <button type="submit" class="operations-btn btn btn-secondary">
              <span data-feather="edit-2" class="align-text-bottom"></span>
              تعديل الجلسة

            </button>
            <button type="reset" class="btn btn-dark" data-bs-dismiss="modal" onclick="closeModal()">
              <span data-feather="x" class="align-text-bottom"></span>
              أغلق
            </button>
            <br>
            <div id="errorEditSession" class="error">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!--popup delete attachment of case-->
  <div class="modal fade" id="deleteCaseAttachmentBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="deleteCaseAttachmentBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="height: fit-content; ">
      <div class="modal-content">
        <div class="modal-header" style=" background-color: rgb(87, 126, 155);">
          <h1 class="modal-title fs-5" id="deleteCaseAttachmentBackdropLabel" style=" color:white;">
            تأكيد عملية الحذف
          </h1>
        </div>
        <div class=" modal-body">
          <p>
            هل أنت متأكد من حذف هذا المرفق؟
          </p>
        </div>
        <div class="modal-footer " style="width:auto;">
          <button type="submit" id="deleteAttachmentButton" class="operations-btn btn btn-danger">
            <span data-feather="trash" class="align-text-bottom"></span>
            احذف
          </button>
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="closeModal()">
            <span data-feather="x" class="align-text-bottom"></span>
            أغلق
          </button>

        </div>
      </div>
    </div>
  </div>

  <!--popup delete attachment of case-->
  <div class="modal fade" id="deleteDecisionBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="deleteDecisionBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="height: fit-content; ">
      <div class="modal-content">
        <div class="modal-header" style=" background-color: rgb(87, 126, 155);">
          <h1 class="modal-title fs-5" id="deleteDecisionBackdropLabel" style=" color:white;">
            تأكيد عملية الحذف
          </h1>
        </div>
        <div class=" modal-body">
          <p>
            هل أنت متأكد من حذف هذا القرار؟
          </p>
        </div>
        <div class="modal-footer " style="width:auto;">
          <button type="submit" id="deleteDecisionButton" class="operations-btn btn btn-danger">
            <span data-feather="trash" class="align-text-bottom"></span>
            احذف
          </button>
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="closeModal()">
            <span data-feather="x" class="align-text-bottom"></span>
            أغلق
          </button>

        </div>
      </div>
    </div>
  </div>


  <!--popup add new decision-->
  <div class="modal fade" id="addNewDecisionBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="addNewDecisionBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="height: fit-content; ">
      <div class="modal-content">
        <div class="modal-header" style=" background-color: rgb(87, 126, 155);">
          <h1 class="modal-title fs-5" id="addNewDecisionBackdropLabel" style=" color:white;">
            إضافة قرار جديد للقضية
          </h1>
        </div>
        <form id='addNewDecision_form' method="post" style="background-color: transparent; border:none">
          <div class=" modal-body">
            <div class="container">
              <div class="row ">
                <div class="col-6">
                  <label for="newDecisionNumber"><b>رقم القرار</b></label>
                  <input type="number" id="newDecisionNumber" name="newDecisionNumber" placeholder="أدخل رقم القرار"
                    required>
                </div>

                <div class="col-6">
                  <label for="newDecisionDate"><b>تاريخ الإقرار</b></label>
                  <input type="date" id="newDecisionDate" name="newDecisionDate" placeholder="أدخل تاريخ القرار"
                    required>
                </div>

              </div>

              <div class="row ">
                <div class="col-12">
                  <label for="newDecisionDetails"><b>تفاصيل القرار</b></label>
                  <textarea class="form-control" id="newDecisionDetails" name="newDecisionDetails" rows="5"
                    style="max-height:12em;" required></textarea>
                </div>
              </div>

            </div>
          </div>
          <div class="modal-footer " style="width:auto;">
            <button type="submit" class="operations-btn btn btn-success" onclick="addNewDecision()">
              <span data-feather="plus" class="align-text-bottom"></span>
              إضافة قرار
            </button>
            <button type="reset" class="btn btn-dark" data-bs-dismiss="modal" onclick="closeModal()">
              <span data-feather="x" class="align-text-bottom"></span>
              أغلق
            </button>
            <br>
            <div id="errorAddDecision" class="error">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!--popup edit decision-->
  <div class="modal fade" id="editDecisionBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editDecisionBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="height: fit-content; ">
      <div class="modal-content">
        <div class="modal-header" style=" background-color: rgb(87, 126, 155);">
          <h1 class="modal-title fs-5" id="editDecisionBackdropLabel" style=" color:white;">
            تعديل القرار
          </h1>
        </div>
        <form id='editDecision_form' method="post" style="background-color: transparent; border:none">
          <div class=" modal-body">
            <div class="container">
              <div class="row ">
                <div class="col-6">
                  <label for="editDecisionNumber"><b>رقم القرار</b></label>
                  <input type="number" id="editDecisionNumber" name="editDecisionNumber" placeholder="أدخل رقم القرار"
                    required>
                </div>

                <div class="col-6">
                  <label for="editDecisionDate"><b>تاريخ الإقرار</b></label>
                  <input type="date" id="editDecisionDate" name="editDecisionDate" placeholder="أدخل تاريخ القرار"
                    required>
                </div>

              </div>

              <div class="row ">
                <div class="col-12">
                  <label for="editDecisionDetails"><b>تفاصيل القرار</b></label>
                  <textarea class="form-control" id="editDecisionDetails" name="editDecisionDetails" rows="5"
                    style="max-height:12em;" required></textarea>
                </div>
              </div>

            </div>
          </div>
          <div class="modal-footer " style="width:auto;">
            <button type="submit" class="operations-btn btn btn-secondary">
              <span data-feather="edit-2" class="align-text-bottom"></span>
              تعديل القرار

            </button>
            <button type="reset" class="btn btn-dark" data-bs-dismiss="modal" onclick="closeModal()">
              <span data-feather="x" class="align-text-bottom"></span>
              أغلق
            </button>
            <br>
            <div id="errorEditDecision" class="error">
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
  <script src="../../js/cases/view_case.js">  </script>
  <script src="../../js/cases/viewSession.js">  </script>
  <script src="../../js/cases/viewDecision.js">  </script>





</body>

</html>