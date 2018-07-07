<?php include_once '/includes/header.php'  ?>

 <!----------- wrapper ---------------------------------------------------->
    <div id="wrapper">
        <!----------- sidebar ------------------------------------------------>
        <div id="sidebar-wrapper">
            <!----------- sidebar-menu --------------------------------------->
            <div class="userInfo text-center">
                <img class="img-circle" src="assets/img/friends/fr-10.jpg" alt="" id="profileImg">
                <h4>Sarah Connor</h4>
            </div>
            <ul class="sidebar-menu">
                <li id="dashboard">
                    <a href="dashboardAdmin.php">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        Dashboard
                    </a>
                </li>
                <li id="department">
                    <a href="Departments.php">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        Departments
                    </a>
                </li>
                <li>
                    <a href="Courses.php">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        Courses
                    </a>
                </li>

            </ul>
            <!----------- /sidebar-menu -------------------------------------->
        </div>
        <!----------- /sidebar ----------------------------------------------->

        <!----------- content ------------------------------------------------>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                 <div class="col-md-4">
                    <div class="col-md-2" id="top">
                        <div id="NotificationsTeacher">
                            <h3>Notifications</h3>
                        </div>
                    </div>
                           <div class="col-md-2" id="bottom">
                                <ul>
                                    <li>Me daten 02.02.2018 do te mbahet testi perfundimtar per nivelin A1/1 German</li>
                                    <li>Me daten 04.05.2018 organizohet Eurotripi per Dubai, pagesa duhet te kryhet deri me 12.03.2018</li>
                                    <li>Pergaditja per TOEFL® do te mbahet tri here ne jave prej dates 10.02.2018</li>
                                    
                                </ul>
                            </div>
                </div>
                        <div class="col-md-4">
                            <div id="TodayCourses">
                                <div class="col-md-2" id="top">
                                <h4>TODAY COURSE</h4>
                                </div>
                                <div class="col-md-2" id="bottom">
                                <ul>
                                    <li>Anglisht 09:00 - 10:30</li>
                                    <li>Anglisht 13:00 - 14:30</li>
                                    <li>Anglisht 15:30 - 17:00</li>
                                    <li>Anglisht 16:00 - 19:00</li>
                                </ul>

                                </div>
                         
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div id="newCourses">
                            <div class="col-md-2" id="top">
                            <h4>New Courses</h4>
                            </div>
                            <div class="col-md-2" id="bottom">
                                <ul>
                                    <li>German A1  (4students)</li>
                                    <li>German A2 (3students)</li>
                                    <li>German C1 (6students)</li>
                                    <li>German B2 (2students)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!----------- /content ----------------------------------------------->
    </div>
    <!----------- wrapper ---------------------------------------------------->


<?php include_once 'includes/footer.php' ?>