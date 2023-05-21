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
  <link href="../../../css/navs.css" rel="stylesheet">
  <link href="../../../css/style.css" rel="stylesheet">


</head>

<body>
  <header class="navbar sticky-top sticky-top flex-md-nowrap p-0 shadow" style="background-color:  rgb(7, 48, 78);">
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">
      <div class="imgcontainer">
        <img src="../../../Img/Logo.jpg" alt="Avatar" class="avatar">
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
                    <a href="../../cases/view.html" class="nav-link d-inline-flex  collapse-items">
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
        <form id="edit-form" method="post">
          <div class="container">


            <div class="row ">
              <div class="col-12">
                <h1>تعديل معلومات العميل </h1>
              </div>

            </div>
            <hr>

            <div class="row ">

              <div class="col-3">
                <label for="first_name"><b>الاسم الأول</b></label>
                <input type="text" id="first_name" placeholder=" أدخل الاسم الأول" name="first_name" required>

              </div>
              <div class="col-3">
                <label for="last_name"><b>الاسم الأخير</b></label>
                <input type="text" id="last_name" placeholder="أدخل الاسم الأخير" name="last_name" required>

              </div>
              <div class="col-3">
                <label for="father_name"><b>اسم الأب</b></label>
                <input type="text" id="father_name" placeholder="أدخل اسم الأب" name="father_name" required>

              </div>
              <div class="col-3">
                <label for="mother_name"><b>اسم الأم</b></label>
                <input type="text" id="mother_name" placeholder="أدخل اسم الأم" name="mother_name" required>

              </div>
            </div>
            <div class="row ">
              <div class="col-4">
                <label for="birthday"><b>تاريخ الولادة </b></label>
                <input type="date" id="date_of_birth" name="date_of_birth" required>
              </div>
              <div class="col-8">
                <label for="place_of_birth"><b>مكان الولادة</b></label>
                <input type="text" id="place_of_birth" placeholder="أدخل مكان الولادة" name="place_of_birth" required>
              </div>
            </div>
            <div class="row ">
              <div class="col-4">
                <label for="phone"><b>رقم الهاتف</b></label>
                <input type="tel" id="phone" placeholder="أدخل رقم الهاتف" name="phone" required>
              </div>
              <div class="col-8">
                <label for="current_address"><b>العنوان الحالي</b></label>
                <input type="text" id="current_address" placeholder="أدخل العنوان" name="current_address" required>
              </div>
            </div>
            <div class="row ">

              <div class="col-12">
                <label for="email"><b>البريد الإلكتروني إن وُجِد</b></label>
                <input type="text" id="email" placeholder="أدخل البريد الإلكتروني" name="email">

              </div>
            </div>

            <button type="submit" id="add_btn">تعديل</button>
            <div id="error" class="error">

            </div>
          </div>

        </form>

      </main>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
    crossorigin="anonymous"></script>

  <script src="../../../js/users/auth.js"></script>
  <script src="../../../js/navs.js"></script>
  <script src="../../../js/users/edit.js"></script>



</body>

</html>