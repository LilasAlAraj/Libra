<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Libra</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <link href="../../../css/landing.css" rel="stylesheet">
</head>

<body>

    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-expand-md navbar-expand-sm ">
            <div class="container p-0 m-0 d-flex justify-space-between ">
                <a class="navbar-brand  me-0 px-3 fs-6  col-1" href="#">
                    <div class="imgcontainer">
                        <img src="../../Img/Logo.jpg" alt="Avatar" class="avatar">
                    </div>
                </a>

                <button style="background-color:  rgb(87, 126, 155); padding: 0; margin-left: 2%" class="navbar-toggler"
                    type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">الصفحة الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#features">ميزاتنا</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">الفريق</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">اتصل بنا</a>
                        </li>
                        <li class="nav-item" id="login-nav-item" style="text-align: right;">

                        </li>
                    </ul>
                </div>
            </div>

        </nav>
    </header>

    <main>
        <section class="landing justify-content-center align-items-center ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6" id="landing-text">
                        <div class="m-5">
                            <h2>موقع العدل والعدالة</h2>
                            <br>
                            <p>
                                مرحبًا بك في صفحة إدارة مكتبنا التفاعلية! نحن فريق محاماة متخصص يقدم خدمات قانونية شاملة
                                لعملائنا الكرام. نحن ندرك أهمية تنظيم وإدارة المكتب والقضايا، ولذلك نقدم لكم تجربة فريدة
                                تجمع بين التكنولوجيا الحديثة والمهارات القانونية المتميزة.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 ">
                        <div class="img-box rounded-circle position-relative">
                            <img src="../../Img/Logo.jpg" style="width: 25%" class=" js-testimonial-img rounded-circle"
                                alt="Logo">
                            <h1 class="name agency-font"  style="color: white">Libra</h1>
                        </div>
                    </div>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="rgb(87, 126, 155)" fill-opacity="1"
                    d="M0,128L60,154.7C120,181,240,235,360,224C480,213,600,139,720,128C840,117,960,171,1080,181.3C1200,192,1320,160,1380,144L1440,128L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
                </path>
            </svg>
        </section>


        <section class="features fadeSection" id="features">
            <div class="section-title">
                <h3>ميزاتنا</h3>
            </div>
            <div class="container">
                <div class="box">
                    {{-- <h3>ما يميزنا</h3> --}}
                    <div class="row box-row">
                        <div class="feature-name col-lg-4 col-md-4 col-sm 6 fade_in_out" data-fade="100">
                            <h4>إدارة المكتب</h4>

                        </div>
                        <div class="feature-description col-lg-8 col-md-8 col-sm 6 fade_in_out" data-fade="-100">
                            <p>
                                نسعى جاهدين لتقديم تجربة إدارة مكتبية محسّنة لعملائنا. يتيح موقعنا لكم الوصول إلى
                                معلومات المكتب بسهولة، بما في ذلك ساعات العمل ومعلومات الاتصال. يمكنكم أيضًا جدولة
                                المواعيد وإدارة تفاصيل المواعيد المحددة مع محاميكم.
                            </p>
                        </div>
                    </div>
                    <div class="row box-row">
                        <div class="feature-name col-lg-4 col-md-4 col-sm 6 fade_in_out" data-fade="100">
                            <h4>إدارة القضايا</h4>

                        </div>
                        <div class="feature-description col-lg-8 col-md-8 col-sm 6 fade_in_out" data-fade="-100">
                            <p>

                                يمكنكم إدارة القضايا والتخلص من الفوضى التي تخلفها المستندات الورقية.
                                من خلال تخزين وتنظيم جميع المستندات القانونية الخاصة بقضاياكم بطريقة آمنة وسهلة الوصول.
                                نساعدكم في الاحتفاظ بسجلاتكم القانونية بشكل منظم وفعال، مما يسهل عملية البحث عن
                                المعلومات وتحليلها.
                            </p>
                        </div>
                    </div>
                    <div class="row box-row">
                        <div class="feature-name col-lg-4 col-md-4 col-sm 6 fade_in_out" data-fade="100">
                            <h4> البحث والبحث الذكي</h4>

                        </div>
                        <div class="feature-description col-lg-8 col-md-8 col-sm 6 fade_in_out" data-fade="-100">
                            <p>
                                يوفر موقعنا أدوات بحث متقدمة لمساعدتكم في العثور على المعلومات المهمة بسرعة ودقة.
                                وباستخدام تقنيات الذكاء الاصطناعي، يمكنكم البحث عن المعلومات والأحكام
                                ذات الصلة بقضيتكم بشكل فعال وفي وقت قصير.
                            </p>
                        </div>
                    </div>
                    <div class="row box-row">
                        <div class="feature-name col-lg-4 col-md-4 col-sm 6 fade_in_out" data-fade="100">
                            <h4>إدارة العملاء</h4>

                        </div>
                        <div class="feature-description col-lg-8 col-md-8 col-sm 6 fade_in_out" data-fade="-100">
                            <p>
                                نحن نهتم بعلاقتنا بعملائنا، ولذلك نوفر أدوات لإدارة بيانات العملاء بطريقة آمنة وسهلة.
                                يمكنكم تسجيل معلومات العملاء، وتنظيم المستندات المتعلقة بهم،
                                مما يسهل التواصل وتقديم خدمة متميزة.
                            </p>
                        </div>
                    </div>
                    <div class="row box-row">

                        <div class="feature-name col-lg-4 col-md-4 col-sm 6 fade_in_out" data-fade="100">
                            <h4>إدارة أفراد المكتب</h4>

                        </div>
                        <div class="feature-description col-lg-8 col-md-8 col-sm 6 fade_in_out " data-fade="-100">
                            <p>
                                نحن نولي اهتمامًا كبيرًا لأعضاء فريقنا في المكتب ونسعى جاهدين لتوفير الأدوات والموارد
                                التي تمكّنهم من العمل بكفاءة وفعالية. نقدم وسائل لتعيين وتوزيع المهام بشكل منظم، وتتبع
                                تقدم الأعضاء في تنفيذها وتحقيق الأهداف المحددة. كما نسهل التواصل والتعاون بين أفراد
                                المكتب، حيث يمكنهم مشاركة المعلومات والمستندات بسهولة وبشكل آمن. نحن نسعى جاهدين لدعم
                                نجاح أفراد المكتب وتطوير قدراتهم من خلال توفير بيئة عمل محفزة وداعمة.
                            </p>
                        </div>
                    </div>
                    <div class="row box-row">
                        <div class="feature-name col-lg-4 col-md-4 col-sm 6 fade_in_out" data-fade="100">
                            <h4>إدارة المهام</h4>

                        </div>
                        <div class="feature-description col-lg-8 col-md-8 col-sm 6 fade_in_out" data-fade="-100">
                            <p>
                                سواء كنتم ترغبون في تتبع مهام قضاياكم أو مهام المكتب اليومية، يوفر موقعنا أدوات لإدارة
                                المهام بشكل فعال. يمكنكم تعيين المهام، تحديد المواعيد النهائية، وتتبع تقدم التنفيذ، مما
                                يضمن تنظيمًا وتحقيق أهدافكم بكفاءة
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>





    </main>

    <footer class="text-center">
        <p>جميع الحقوق محفوظة © <span id="year"></span> <span class="logo">Libra</span></p>
    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>




    <script src="../../js/landing.js"></script>
</body>


</html>
