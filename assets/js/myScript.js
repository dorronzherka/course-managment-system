$(document).ready(function () {
    $('#toggleButton').click(function () {
        $('#wrapper').toggleClass("toggled");
    });
    $('.showSubmenu').click(function(){
        $('.submenu').toggleClass('toggled');
    });
    if($(location).attr('href').includes("dashboard-admin.php")) {
        var clndrTemplate = doT.template($('#dot-template').html());
        $("#myCalendar").clndr({
            render: function (data) {
                return clndrTemplate(data);
            },
            clickEvents: {
                click: function (target) {
                    console.log(target);
                }
            }
        });
    }
});

/*------ Variables for Department Page -------------*/
var nextPage = 0;
var nrCurrentDeps = 0;
var currentNrDeps = 0;
var departmentData = {};
var temporaryDepartment;
var temporaryDepartments= [];
/*------ /Variables for Department Page -------------*/

/*------ Variables for Courses Page -----------------*/
var nextPageForCourses = 0;
var nrCurrentCoursesInPage = 0;
var lengthOfCourses = 0;
var courseData  = {};
var course;
/*------ /Variables for Courses Page ----------------*/

/* ---- Teachers Variables----*/
var currentStartingPointForTeachers = 0;

/*------ Variables for exams Page -----------------*/
var nextPageforExams = 0;
var nrCurrentCoursesInExamsPage = 0;
var temporaryExam;
var examsData = {};
var currentNrExams = 0;
var iExams;
/*------- /variables for exams page ----------------------*/

$(document).ready(function(){
    /*---- Departments page ------------------------------------------------------ */
    if($(location).attr('href').includes("Departments.php")){
        getDepts(nextPage);
        var name = $('#name');
        var desc = $('#desc');
        var idDept;

        $('#more').click(function(){
            getDepts(nextPage);

        });

        $("#table").on('click','tbody tr',function(){
            idDept = $(this).find('.deptId');
            var id = parseInt($(this).find('.deptId').html());
            getDeptWithId(id);

        });

        $('#editBtn').click(function(){
            $('#departmentModal').modal('hide');
            $('#modalAddDepartments').modal();
            $('.modal-title').html("Edit Department");
            $('.btn-action').html("Edit");
            $('#name').val(temporaryDepartment.Name);
            $('#desc').val(temporaryDepartment.Description);
        });

        $('.btn-add').click(function(){
            $('.modal-title').html("Add Department");
            $('.btn-action').html("Add");
            console.log(temporaryDepartments);
        });

        $('.btn-action').click(function(event){
            if(event.currentTarget.innerText == "Edit"){
                editDepartment(temporaryDepartment.DepartmentID,name.val(),desc.val());
                $('table').find(idDept)[0].nextSibling.textContent = name.val()+" Deparment";
            }else {
                insertDepartment(name.val(),desc.val());
            }

            name.val("");
            desc.val("");
        });

        $("#deleteBtn").click(function(){
            $('#modalConfirmationBox').modal();
        });
        $("#deleteButton").click(function () {
            deleteDepartment(parseInt(idDept.html()));
            $('#myTbody').html("");
            getDepts(0);
            nextPage = 0;
        });

    }
    /*---- /Departments page ------------------------------------------------------ */


    /*---- Courses page ----------------------------------------------------------- */
    if($(location).attr('href').includes("Courses.php")){
        getDepartmentsForCourses('selectorOfDepartments');
        var courseId;
        getCourses(nextPageForCourses);
        $('#selectorOfDepartments').change(function (){
            var valueSelected = $('#selectorOfDepartments option:selected')[0].value;
            if(valueSelected > 0){
                $('#myTbody').html("");
                getAllCoursesWithDepId(valueSelected);
            }else{
                $('#myTbody').html("");
                getCourses(0);
            }
        });
        $('.btn-add').click(function(){
            $('#name').val("");
            $('#cost').val("");
            $('.modal-title').html("Save Course");
            $('.btn-action').html("Save");
            getDepartmentsForCourses('deparmentSelection');
        });

        $('.btn-close').click(function(){
            $('#deparmentSelection').html("");
        });

        $('#saveBtn').click(function(){

        });

        $('.btn-action').click(function(event){
            if(event.currentTarget.innerText == "Edit"){
                editCourse(course.CourseID,$('#name').val(),$('#cost').val(),$('#deparmentSelection').val());
                $('table').find(courseId)[0].nextSibling.textContent = $('#name').val();
            }else {
                insertCourse($('#name').val(),$('#cost').val(),$('#deparmentSelection').val());
            }

            $('#name').val("");
            $('#cost').val("");
        });

        $('table').on("click" , "#myTbody tr",function(){
            courseId = $(this).find('.courseId');
            getCourseFromId(courseId.html());
            $('#modalCourse').modal();
        });

        $("#deleteBtn").click(function(){
            $('#modalConfirmationBox').modal();
        });

        $("#deleteButton").click(function () {
            deleteCourse(courseId.html( ));
            $('#myTbody').html("");
            getCourses(0);
            nextPageForCourses = 0;
        });

        $('#editBtn').click(function(){
            $('#modalAddCourses').modal();
            $('.modal-title').html("Edit Course");
            $('.btn-action').html("Edit");
            $('#name').val(course.Name);
            $('#cost').val(course.Cost);
            getDepartmentsForCoursesWithId(course.DepartmentID);
        });

        $('#enrolledStudents').click(function (){
            getAllStudentsForThisCourse(courseId.html());
            $('#ListOfStudents').modal();
        });

    }

    /*---- Users page ----------------------------------------------------------- */
    if($(location).attr('href').includes("Users.php")){
        getAllUsers();
        $('.btn-add').click(function () {
            $('#modalAddUserViaGoogle').modal();
        });

        $('.g-signin2').click(function () {
         var auth2 = gapi.auth2.getAuthInstance();
     })

    }
    /*---- /Users page ---------------------------------------------------------- */
    /*---- Teachers page ----------------------------------------------------------- */
    if($(location).attr('href').includes("Teachers.php")){
        var teacherID;
        hideMoreButton();
        getAllTeachersWithLimitation(currentStartingPointForTeachers);
        $('#more').click(function(){
            getAllTeachersWithLimitation(currentStartingPointForTeachers);
        });
        $('#saveBtn').click(function () {
            if($('#saveBtn').html() == "Edit"){
                var length = document.getElementById('imageToUpload').files.length;
                if(length == 0){
                    var firstName = $('.modal #firstName').val();
                    var lastName = $('.modal #lastName').val();
                    var email =  $('.modal #email').val();
                    var city =  $('.modal #city').val();
                    var address = $('.modal #address').val();
                    var  dateOfBirth = $('.modal #dateofbirth').val();
                    var gender = $("input[name='gender']:checked"). val();
                    var phoneNumber = $(".modal #phoneNumber"). val();
                    editTeacherwithoutImage(teacherID.html(),firstName,lastName,address,city,dateOfBirth,gender,phoneNumber,email);

                }else{
                    var image = document.getElementById('imageToUpload').files[0];
                    updateProfileImage(teacherID.html(),image);

                }
            }else{
                var image = document.getElementById('imageToUpload').files[0];
                uploadProfileImage(image);
            }
        });
        $('#table').on('click','#myTbody tr',function () {
            teacherID = $(this).find('.TeacherID');
            getTeacher(teacherID.html());
        });

        $('.modal #deleteBtn').click(function () {
            $('#modalConfirmationBox').modal();
        });

        $('.modal #yesButton').click(function () {
            deleteImage(teacherID.html());
            deleteTeacher(teacherID.html());
        });

        $('#editBtn').click(function () {
            $("#modalTeacher").modal('hide');
            getTeacherForEdit(teacherID.html())

        });
        $('.btn-add').click(function () {
            $('.modal #saveBtn').html("Save");
        });
    }
    /*---- /Teachers  pages ------------------------------------------------------ */
    /*---- Studtents  pages ------------------------------------------------------ */
    if($(location).attr('href').includes("Students.php")){
        var studentID;
        var image;
        getAllStudents();
        $('#saveBtn').click(function () {
            if($('#saveBtn').html() == "Edit"){
                var length = document.getElementById('imageToUpload').files.length;
                if(length == 0){
                    var firstName = $('.modal #firstName').val();
                    var lastName = $('.modal #lastName').val();
                    var email =  $('.modal #email').val();
                    var city =  $('.modal #city').val();
                    var address = $('.modal #address').val();
                    var  dateOfBirth = $('.modal #dateofbirth').val();
                    var gender = $("input[name='gender']:checked"). val();
                    var phoneNumber = $(".modal #phoneNumber"). val();
                    editStudentwithoutImage(studentID.html(),firstName,lastName,address,city,dateOfBirth,gender,phoneNumber,email);

                }else{
                    var image = document.getElementById('imageToUpload').files[0];
                    updateProfileImageStudent(studentID.html(),image);

                }
            }else{
                var image = document.getElementById('imageToUpload').files[0];
                uploadProfileImageStudent(image);
            }
        });
        $('#table').on('click','#myTbody tr',function () {
            studentID = $(this).find('.StudentID');
            getStudent(studentID.html());
        });

        $('.modal #deleteBtn').click(function () {
            $('#modalConfirmationBox').modal();
        });

        $('.modal #yesButton').click(function () {
            deleteImageStudent(studentID.html());
            deleteStudent(studentID.html());

        });

        $('#editBtn').click(function () {
            $("#modalTeacher").modal('hide');
            getStudentForEdit(studentID.html())

        });
        $('.btn-add').click(function () {
            $('.modal #saveBtn').html("Save");
        });
    }
    /*---- /Student  pages ------------------------------------------------------ */
    /*---- Employees  pages ------------------------------------------------------ */
    if($(location).attr('href').includes("Employees.php")){
        var employeeID;
        var image;
        getAllEmployees();
        $('#saveBtn').click(function () {
            if($('#saveBtn').html() == "Edit"){
                var length = document.getElementById('imageToUpload').files.length;
                if(length == 0){
                    var firstName = $('.modal #firstName').val();
                    var lastName = $('.modal #lastName').val();
                    var email =  $('.modal #email').val();
                    var city =  $('.modal #city').val();
                    var address = $('.modal #address').val();
                    var  dateOfBirth = $('.modal #dateofbirth').val();
                    var gender = $("input[name='gender']:checked"). val();
                    var phoneNumber = $(".modal #phoneNumber"). val();
                    editEmployeewithoutImage(employeeID.html(),firstName,lastName,address,city,dateOfBirth,gender,phoneNumber,email);

                }else{
                    var image = document.getElementById('imageToUpload').files[0];
                    updateProfileImageEmployee(employeeID.html(),image);

                }
            }else{
                var image = document.getElementById('imageToUpload').files[0];
                uploadProfileImageEmployee(image);
            }
        });
        $('#table').on('click','#myTbody tr',function () {
            employeeID = $(this).find('.EmployeeID');
            getEmployee(employeeID.html());
        });

        $('.modal #deleteBtn').click(function () {
            $('#modalConfirmationBox').modal();
        });

        $('.modal #yesButton').click(function () {
            deleteImageEmployee(employeeID.html());
            deleteEmployee(employeeID.html());


        });

        $('#editBtn').click(function () {
            alert("clicked")
            getEmployeeForEdit(employeeID.html())

        });
        $('.btn-add').click(function () {
            $('.modal #saveBtn').html("Save");
        });
    }
    /*---- /Employees  pages ------------------------------------------------------ */
    /*---- Exams  pages ------------------------------------------------------ */
    if ($(location).attr('href').includes("exams.php")) {
        getExams();

        $('#saveExam').click(() => {
            getAllCoursesForExams();
        });

        $('#button-blla').click(() => {
             var examname  = $('#name').val(); 
             var examstdt   = $('#stdt').val();
             var examendt   = $('#endt').val();
             var courseid  = $('#courseSelection').val();
             console.log(`examname = ${examname}, examstdt = ${examstdt}, examendt = ${examendt},  courseid = ${courseid}`);
             insertExam(examname, examstdt, examendt, courseid);
        });
    }
    /*---- /Exams  pages ------------------------------------------------------------------- */
    /*---- Classrom Page -------------------------------------------------------------------*/
    if($(location).attr('href').includes("AddCoursesInClassroom.php")){
        getCoursesForClassroon(0);
        $('#more').click(function () {
            getCoursesForClassroon(nextPageForCourses);
        });

        var message = $('#message');
        if(message[0].value != null){
            $('#modalMessage #message').html(message[0].value);

        }
    }
    /* ------------------/Classroom-------------------------------------------------------*/
    /*---- Student Enrollment -------------------------------------------------------------------*/
    if($(location).attr('href').includes("enroll-student-in-course.php")){
        getAllStudents();
        $('#table').on('click','tbody tr',function(e){
            studentClicked = $(this)[0].children;
            $('#selectCourses').html("");
            getAllCoursesForStudentEnrollments();
            $('#modalEnroll .modal-title').html("Enroll Student:"+studentClicked[1].innerHTML+" "+studentClicked[2].innerHTML);
            $('#modalEnroll').modal();
        });

        $('#save').click(function(){
            var coruseId = $('#selectCourses option:selected')[0].value
            var studentId = studentClicked[0].innerHTML;
            insertStudies(coruseId,studentId);
        });
    }

    /* ------------------/studentEnrollment -------------------------------------------------------*/

    /*---- Exampoints page functions ------------------------------------------------------ */

    function getExamPoints(startPoint) {
        $.ajax({
            type: "POST",
            url: 'ajax/getAllExamPoints.php',
            data: {
                startPoint: startPoint
            },
            succes: function(data) {
                examPointData = JSON.parse(data);
                $.each(examPointData.ExamPoints, function(i, exampointi) {
                    $('#myTbody').append("<tr>" +
                        "<td class='examPointId'>" + exampointi.ExamPointID + "</td>" +
                        "<td class='points'>" + exampointi.Point + "</td>" +
                        "<td class='examId'>" + exampointi.ExamID + "</td>" +
                        "<td class='studentId'>" + exampointi.StudentID + "</td>" +
                        "</tr>");
                });
                nextPage += 20;
            }
        });
    }

    function editExamPint(point, examid, studentid) {
        $.ajax({
            type: 'POST',
            url: 'ajax/updateExamPoint.php',
            data: {
                point: point,
                examid: examid,
                studentid: studentid
            },
            succes: function() {
                $("#modalMessage message").html("Edited Succesfully");
                $("#modalMessage").modal();
            }
        });
    }

    function insertExamPoint(point, examid, studentid) {
        $.ajax({
            type: 'POST',
            url: 'ajax/insertExamPoint.php',
            data: {
                point: point,
                examid: examid,
                studentid: studentid
            },
            succes: function(data) {
                var id = JSON.parse(data);
                if (id.error != null) {
                    $('#modalError #message').html(id.error);
                    $('modalError').modal();
                } else {
                    $('myTbody').append("<tr>" +
                        "<td class='examPointId'>" + id + "</td>" +
                        "<td class='points'>" + point + "</td>" +
                        "<td class='examid'>" + examid + "</td>" +
                        "<td class='studentid'>" + studentid + "</td>" +
                        "</tr>");
                    $('#modalMessage #message').html("Added Succesfully");
                    $('#modalMessage').modal();
                }
            }
        });
    }

    function getExam(id) {
        $.ajax({
            type: "POST",
            url: "ajax.getExam.php",
            data: {
                id: id
            },
            success: function(data) {
                var exam = JSON.parse(data);
                $('.modal #name').html(exam.Name);
                $('.modal #stdt').html(exam.ExamStartDateAndTime);
                $('.modal #stdt').html(exam.ExamEndDateAndTime);
                $('.modal #courseid').html(exam.ExamID);
            }

        });
    }



    /*--------Exams Page Functions-----------*/

    function getExams() {
        $.ajax({
            type: 'get',
            url:  'ajax/getAllExams.php',
            success : data => {
                var exams = JSON.parse(data);
                exams.map(exam => {
                    $('#myTbody').append(`<tr>
                        <td class='ExamId'>${exam.ExamID}</td>
                        <td class='ExamName'>${exam.ExamName}</td>
                        <td class='ExamSDT'>${exam.ExamStartDateAndTime}</td>
                        <td class='ExamEDT'>${exam.ExamEndDateAndTIme}</td>
                        </tr>`)
                });
            }
        });
    }

    function getAllCoursesForExams() {
        $.ajax({
            type: 'POST',
            url: 'ajax/getCourses.php',
            success: function(data) {
                var courses = JSON.parse(data)
                $('#courseSelection').append("<option value='0'>Select a course</option>")
                $.each(courses, function(i, course) {
                    $('#courseSelection').append('<option value=' + course.CourseID + '>' + course.Name + '</option>')
                })
            }
        })
    }

    function insertExam(examname, examstd, examedt, courseid) {
        $.ajax({
            type : 'POST',
            url  : 'ajax/insertExam.php',
            data : {
                name : examname,
                stdt : examstd,
                endt : examedt,
                courseid : courseid
            },
            success : data => {
                var id = data;
                $('#myTbody').append(`<tr>
                    <td class='ExamId'>${id}</td>
                    <td class='ExamName'>${examname}</td>
                    <td class='ExamSDT'>${examstd}</td>
                    <td class='ExamEDT'>${examedt}</td>
                    </tr>`);
                $('#modalMessage #message').html("Added successfully");
                $('#modalMessage').modal();
            }
        });     
    }
    
    
    /*-----/Exams page  Functions -------*/
    /*---- Departments functions ------------------------------------------------------ */
    function getDepts(startPoint){
        $.ajax({
            type:"POST",
            url:'ajax/getAllDepts.php',
            data :{
                startPoint : startPoint
            },
            success:function(data){
                departmentData = JSON.parse(data);
                $.each(departmentData.departmentet,function(i,deptarmenti){
                    $('#myTbody').append("<tr>"+
                        "<td class='deptId'>"+deptarmenti.DepartmentID +"</td>"+
                        "<td class='deptName'>"+deptarmenti.Name+"</td>"+
                        +"</tr>");
                });
                nextPage += 20;

            }
        });
    }



    function getDeptWithId(id){
        $.ajax({
            type:"POST",
            url :'ajax/getDept.php',
            data:{
                id : id
            },
            success :function(data){
                temporaryDepartment = JSON.parse(data);
                $('.departmentTitle').html(temporaryDepartment.Name);
                $('.departmentDescrption').html(temporaryDepartment.Description);
                $('#departmentModal').modal();
            }
        });
    }

    function getDeptName(id, name , cost){
        $.ajax({
            type:"POST",
            url :'ajax/getDept.php',
            data:{
                id : id
            },
            success :function(data){
                var dep  = JSON.parse(data);
                $('.modal #name').html(name);
                $('.modal #dep').html(dep.Name);
                $('.modal #cost').html(cost);
            }
        });
        return name;
    }


    function editDepartment(id,name,desc){
        $.ajax({
            type:'POST',
            url :'ajax/updateDept.php',
            data:{
                id : id,
                name : name,
                desc : desc
            },
            success :function(){
                $("#modalMessage #message").html("Edited successfully");
                $("#modalMessage").modal();
            }
        });
    }

    function insertDepartment(name,desc){
        $.ajax({
            type:'POST',
            url :'ajax/insertDept.php',
            data:{
                name : name,
                desc : desc
            },
            success :function(data){
                var id = JSON.parse(data);
                if(id.error != null){
                    $("#modalError #message").html(id.error);
                    $("#modalError").modal();
                }else{
                    $('#myTbody').append("<tr>"+
                        "<td class='deptId'>"+id+"</td>"+
                        "<td class='deptName'>"+name+" Deparment</td>"+
                        +"</tr>");
                    $("#modalMessage #message").html("Added successfully");
                    $("#modalMessage").modal();
                }
            }
        });
    }

    function deleteDepartment(id){
        $.ajax({
            type:'POST',
            url:"ajax/deleteDept.php",
            data:{
                id :id
            },
            success : function(data){
                var dt = JSON.parse(data);
                if(dt.errorr == null){
                    $("#modalMessage #message").html("Deleted successfully");
                    $("#modalMessage").modal();
                }else{
                    $("#modalError #message").html(dt.errorr);
                    $("#modalError").modal();
                }
            }
        });
    }


    /*---- /Departments  functions ------------------------------------------------------ */


    /*---- Courses functions ----------------------------------------------------------- */
    function getCourses(start){
        $.ajax({
            type : 'POST',
            url : 'ajax/getAllCourses.php',
            data : {
                startPoint : start
            },
            success : function(data){
                courseData = JSON.parse(data);
                if(courseData == ""){
                    $('#information-text').css('display','block');
                    $('#information-text').html("<h1>There is no data for Courses, please add a course</h1>");
                    $('.table').css('display','none');
                    $('#more').css('display','none');

                }else {
                    $('#information-text').css('display','none');
                    $('.table').css('display','table');
                    $('#more').css('display','block');
                    $.each(courseData, function (i, course) {
                        $('#myTbody').append("<tr>" +
                            "<td class='courseId'>" + course.CourseID + "</td>" +
                            "<td class='courseName'>" + course.Name + "</td>" +
                            +"</tr>");

                    });
                    nextPageForCourses += 20;
                }
            }
        });
    }

    function getAllCoursesForStudentEnrollments(){
        $.ajax({
            type : 'POST',
            url : 'ajax/getCourses.php',
            success :function(data){
                var courses = JSON.parse(data);
                $('#selectCourses').append("<option value='0'>Select a course</option>")
                $.each(courses,function(i,course){
                 $('#selectCourses').append("<option value="+course.CourseID +">"+course.Name+"</option>")
             });
                
            }
        });
    }

    function getCoursesForClassroon(){
        $.ajax({
            type : 'POST',
            url : 'ajax/getAllCoursesForClassroom.php',
            data : {
            },
            success : function(data){
                courseData = JSON.parse(data);
                if(courseData == ""){
                    $('#information-text').css('display','block');
                    $('#information-text').html("<h1>All courses has class in google classroom</h1>");
                    $('.table').css('display','none');
                    $('#more').css('display','none');

                }else {
                    $('#information-text').css('display','none');
                    $('.table').css('display','table');
                    $('#more').css('display','block');
                    $.each(courseData, function (i, course) {
                        $('#myTbody').append("<tr>" +
                            "<td class='courseId'>" + course.CourseID + "</td>" +
                            "<td class='courseName'>" + course.Name + "</td>" +
                            "<td class='courseClassroom'><a href='addCourseToClassroom.php?id="+course.CourseID+"'>Add to Classroom</a></td>" +
                            +"</tr>");

                    });
                    nextPageForCourses += 20;
                }
            }
        });
    }

    function getDepartmentsForCourses(name) {
        $.ajax({
            type:'POST',
            url:'ajax/getDepts.php',
            success :function(data){
                $('#'+name).append("<option value='0'>Select a  department</option>");
                var departments = JSON.parse(data);
                $.each(departments,function(i,department){
                    $('#'+name).append("<option value ='"+department.DepartmentID+"'>"+
                        department.Name+"</option>");
                })
            }
        });
    }

    function getDepartmentsForCoursesWithId(id) {
        $.ajax({
            type:'POST',
            url:'ajax/getDepts.php',
            success :function(data){
                $('#deparmentSelection').append("<option value='0'>Select a  department</option>");
                var departments = JSON.parse(data);
                $.each(departments,function(i,department){
                    if(department.DepartmentID == id){
                        $('#deparmentSelection').append("<option selected = 'selected' value ='"+department.DepartmentID+"'>"+
                            department.Name+"</option>");
                    }else {
                        $('#deparmentSelection').append("<option id='ddd'  value ='" + department.DepartmentID + "'>" +
                            department.Name + "</option>");

                    }
                })
            }
        });


    }

    function getAllCoursesWithDepId(id) {
        $.ajax({
            type : 'POST',
            url : 'ajax/getCoursesWithDepId.php',
            data : {
                id : id
            },
            success : function(data){
                courseData = JSON.parse(data);
                if(courseData == ""){
                    $('#information-text').css('display','block');
                    $('#information-text').html("<h1>There is no data  for selected Department</h1>");
                    $('.table').css('display','none');
                    $('#more').css('display','none');

                }else {
                    $('#information-text').css('display','none');
                    $('.table').css('display','table');
                    $.each(courseData, function (i, course) {
                        $('#myTbody').append("<tr>" +
                            "<td class='courseId'>" + course.CourseID + "</td>" +
                            "<td class='courseName'>" + course.Name + "</td>" +
                            +"</tr>");

                    });
                    nextPageForCourses += 20;
                }
            }
        });
    }



    function insertCourse(name,cost,departmentId){
        $.ajax({
            type : 'POST',
            url : 'ajax/insertCourse.php',
            data:{
                name : name,
                cost : cost,
                departmentID : departmentId
            },
            success :function(data) {
                var id = JSON.parse(data);
                if (id.includes("Error")) {
                    $("#modalMessage #message").html(id);
                    $("#modalMessage").modal();
                    deleteImage()
                } else {
                    if ($('#information-text').css('display') == "block") {
                        $('#information-text').css('display', 'none');
                        $('.table').css('display', 'table');
                        $('#more').css('display', 'inline');
                    }
                    $('#myTbody').append("<tr>" +
                        "<td class='courseId'>" + id + "</td>" +
                        "<td class='courseName'>" + name + "</td>" +
                        +"</tr>");

                }
            }
        });
    }

    function getCourseFromId(id){
        $.ajax({
            type : 'POST',
            url  : 'ajax/getCourse.php',
            data :{
                id : id
            },
            success : function(data){
                course =  JSON.parse(data);
                getDeptName(course.DepartmentID,course.Name,course.Cost);
            }
        });
    }

    function deleteCourse(id){
        $.ajax({
            type: 'POST',
            url : 'ajax/deleteCourse.php',
            data :{
                id : id
            },
            success : function(){
                $("#modalMessage #message").html("Deleted successfully");
                $("#modalMessage").modal();
            }
        });
    }

    function editCourse(CourseID,Name,Cost,DepartmentID) {
        $.ajax({
            type : 'POST',
            url : 'ajax/updateCourse.php',
            data :{
                CourseID : CourseID,
                Name : Name,
                Cost : Cost,
                DepartmentID : DepartmentID
            },
            success : function () {
                $("#modalMessage #message").html("Edited successfully");
                $("#modalMessage").modal();
            }
        });
    }

    /*---- /Courses page functions ---------------------------------------------------------- */
    /*---- Users page functions  ----------------------------------------------------------- */
    function getAllUsers() {
        $.ajax({
            type : 'POST',
            url : "ajax/getAllUsers.php",
            success : function (data) {
                var dataParsed = JSON.parse(data);
                if(dataParsed == ""){
                    $('#information-text').css('display','block');
                    $('.table').css('display','none');
                    $('#more').css('display','none');

                }else{
                    alert("Success");
                }

            }
        });

    }

    /*---- /Users page functions ---------------------------------------------------------- */
    /*---- Teachers page functions ------------------------------------------------------- */
    function getAllTeachersWithLimitation($startingPoint) {
        $.ajax({
            type : 'POST',
            url : "ajax/getAllTeachers.php",
            data : {
                startingPoint : $startingPoint
            },
            success : function (data) {
                var dataParsed = JSON.parse(data);
                if(dataParsed == ""){
                    $('#information-text').css('display','block');
                    $('.table').css('display','none');
                    $('#more').css('display','none');

                }else{
                    $.each(dataParsed,function(i,teacher){
                        $('#myTbody').append("<tr>"+
                            "<td class='TeacherID'>"+teacher.TeacherID +"</td>"+
                            "<td class='TeacherFirstName'>"+teacher.FirstName+"</td>"+
                            "<td class='TeacherLastName'>"+teacher.LastName+"</td>"+
                            "<td class='TeacherEmail'>"+teacher.Email+"</td>"+
                            +"</tr>");

                    });
                    currentStartingPointForTeachers += 20;
                }

            }
        });

    }
    function addTeacher(firstName,lastName,address,city,dateOfBirth,gender,phoneNumber,email,profileImage){
        $.ajax({
            type : 'POST',
            url  : 'ajax/InsertTeacher.php',
            data : {
                firstName : firstName,
                lastName : lastName,
                address : address,
                city : city,
                dateOfBirth : dateOfBirth,
                gender :gender,
                phoneNumber : phoneNumber,
                email :email,
                profileImage : profileImage

            },
            success : function (data) {
             var id  = JSON.parse(data);
             if(id.includes("Error")){
                 $("#modalMessage #message").html(id);
                 $("#modalMessage").modal();
                 deleteImage()
             }else{
                 if($('#information-text').css('display') == "block"){
                     $('#information-text').css('display','none');
                     $('.table').css('display','table');
                     $('#more').css('display','inline');
                 }

                 $('#myTbody').append("<tr>"+
                     "<td class='TeacherID'>"+id+"</td>"+
                     "<td class='TeacherFirstName'>"+firstName+"</td>"+
                     "<td class='TeacherLastName'>"+lastName+"</td>"+
                     "<td class='TeacherEmail'>"+email+"</td>"+
                     +"</tr>");

                 $("#modalMessage #message").html("Added successfully");
                 $("#modalMessage").modal();
             }
         }

     });
    }
    function getTeacher(id) {
        $.ajax({
            type : "POST",
            url :"ajax/getTeacher.php",
            data :{
                id : id
            },
            success : function (data) {
                var teacher = JSON.parse(data);
                $('.modal #firstName').html(teacher.FirstName);
                $('.modal #lastName').html(teacher.LastName);
                $('.modal #email').html(teacher.Email);
                $('.modal #city').html(teacher.City);
                $('.modal #address').html(teacher.Address);
                $('.modal #dateOfBirth').html(teacher.DateOfBirth);
                $('.modal #imgProfile').attr('src','assets/img/profileImages/'+teacher.profileImage);
                if(teacher.Gender == "M")
                    $('.modal #gender').html("Male");
                else
                    $('.modal #gender').html("Female");

                $('#modalTeacher').modal();
            }
        });
    }

    function deleteTeacher(id) {
        $.ajax({
            type: "POST",
            url : "ajax/deleteTeacher.php",
            data:{
                id : id
            },
            success : function () {
                $('#modalMessage').modal();
                $('#modalMessage #message').html("Teacher has been deleted successfully");
                $('#myTbody').html("");
                getAllTeachersWithLimitation(0);
                hideMoreButton();
            }
        });
    }

    function uploadProfileImage(imageData) {
        var formData = new FormData();
        formData.append("file[]",imageData);
        $.ajax({
            type : "POST",
            url : "ajax/insertImage.php",
            data : formData,
            processData : false,
            contentType : false,
            success : function (data) {
                if(data.includes('Error')){
                    $("#modalMessage #message").html(data);
                    $("#modalMessage").modal();
                }else{
                    var img = data;
                    var firstName = $('.modal #firstName').val();
                    var lastName = $('.modal #lastName').val();
                    var email =  $('.modal #email').val();
                    var city =  $('.modal #city').val();
                    var address = $('.modal #address').val();
                    var  dateOfBirth = $('.modal #dateofbirth').val();
                    var gender = $("input[name='gender']:checked"). val();
                    var phoneNumber = $(".modal #phoneNumber"). val();
                    addTeacher(firstName,lastName,address,city,dateOfBirth,gender,phoneNumber,email,img);
                }
            }

        });
    }

    function  deleteImage(id) {
        $.ajax({
            type : "POST",
            url : "ajax/deleteImage.php",
            data :{
                id : id
            },
            success :  function () {

            }
        });
    }

    function getTeacherForEdit(id) {
        $.ajax({
            type : "POST",
            url :"ajax/getTeacher.php",
            data :{
                id : id
            },
            success : function (data) {
                var teacher = JSON.parse(data);
                $('.modal #firstName').val(teacher.FirstName);
                $('.modal #lastName').val(teacher.LastName);
                $('.modal #email').val(teacher.Email);
                $('.modal #city').val(teacher.City);
                $('.modal #address').val(teacher.Address);
                $('.modal #phoneNumber').val(teacher.PhoneNumber);
                $('.modal #dateofBirth').val(teacher.DateOfBirth);
                if(teacher.Gender == "M")
                    $('.modal #gender.m').prop("checked",true);
                else
                    $('.modal #gender.f').prop("checked",true);
                $('.modal #saveBtn').html("Edit");
                $('#modalAddTeacher ').modal();
            }
        });
    }

    function editTeacherwithoutImage(teacherID,firstName,lastName,address,city,dateOfBirth,gender,phoneNumber,email){
        $.ajax({
            type : 'POST',
            url  : 'ajax/updateTeacher.php',
            data : {
                teacherID : teacherID,
                firstName : firstName,
                lastName : lastName,
                address : address,
                city : city,
                dateOfBirth : dateOfBirth,
                gender :gender,
                phoneNumber : phoneNumber,
                email :email

            },
            success : function () {
                $("#modalMessage #message").html("Updated successfully");
                $("#modalMessage").modal();

            }
        });
    }

    function updateProfileImage(id, imageData) {
        var formData = new FormData();
        formData.append("file[]",imageData);
        $.ajax({
            type : "POST",
            url : "ajax/insertImage.php",
            data : formData,
            processData : false,
            contentType : false,
            success : function (data) {
                var img = data;
                var firstName = $('.modal #firstName').val();
                var lastName = $('.modal #lastName').val();
                var email =  $('.modal #email').val();
                var city =  $('.modal #city').val();
                var address = $('.modal #address').val();
                var  dateOfBirth = $('.modal #dateofbirth').val();
                var gender = $("input[name='gender']:checked"). val();
                var phoneNumber = $(".modal #phoneNumber"). val();
                deleteImage(id);
                editTeacherwithImage(id ,firstName,lastName,address,city,dateOfBirth,gender,phoneNumber,email,img);
            }

        });
    }


    function editTeacherwithImage(teacherID,firstName,lastName,address,city,dateOfBirth,gender,phoneNumber,email ,profileImage){
        $.ajax({
            type : 'POST',
            url  : 'ajax/updateTeacherWithImage.php',
            data : {
                teacherID : teacherID,
                firstName : firstName,
                lastName : lastName,
                address : address,
                city : city,
                dateOfBirth : dateOfBirth,
                gender :gender,
                phoneNumber : phoneNumber,
                email :email,
                profileImage : profileImage

            },
            success : function () {
                $("#modalMessage #message").html("Updated successfully");
                $("#modalMessage").modal();

            }
        });


    }

    function hideMoreButton() {
        $.ajax( {
            type: 'POST',
            url : 'ajax/getRowCountOfTeachers.php',
            success : function (data) {
                var json = JSON.parse(data);
                if(json.length < 21){
                    $('#more').hide();
                }
            }
        });
    }

    /*---- /Teachers page functions ---------------------------------------------------------- */
    /*---- Students page functions ------------------------------------------------------- */
    function getAllStudents() {
        $.ajax({
            type : 'POST',
            url : "ajax/getAllStudents.php",
            success : function (data) {
                var dataParsed = JSON.parse(data);
                if(dataParsed == ""){
                    $('#information-text').css('display','block');
                    $('.table').css('display','none');
                    $('#more').css('display','none');

                }else{
                    $.each(dataParsed,function(i,student){
                        $('#myTbody').append("<tr>"+
                            "<td class='StudentID'>"+student.StudentID +"</td>"+
                            "<td class='StudentFirstName'>"+student.FirstName+"</td>"+
                            "<td class='StudentLastName'>"+student.LastName+"</td>"+
                            "<td class='StudentEmail'>"+student.Email+"</td>"+
                            +"</tr>");

                    })
                }

            }
        });

    }
    function addStudent(firstName,lastName,address,city,dateOfBirth,gender,phoneNumber,email,profileImage){
        $.ajax({
            type : 'POST',
            url  : 'ajax/insertStudent.php',
            data : {
                firstName : firstName,
                lastName : lastName,
                address : address,
                city : city,
                dateOfBirth : dateOfBirth,
                gender :gender,
                phoneNumber : phoneNumber,
                email :email,
                profileImage : profileImage

            },
            success : function (data) {
                if($('#information-text').css('display') == "block"){
                    $('#information-text').css('display','none');
                    $('.table').css('display','table');
                    $('#more').css('display','inline');
                }
                var id  = JSON.parse(data);
                $('#myTbody').append("<tr>"+
                    "<td class='StudentID'>"+id+"</td>"+
                    "<td class='StudentFirstName'>"+firstName+"</td>"+
                    "<td class='StudentLastName'>"+lastName+"</td>"+
                    "<td class='StudentEmail'>"+email+"</td>"+
                    +"</tr>");

                $("#modalMessage #message").html("Added successfully");
                $("#modalMessage").modal();
            }

        });
    }
    function getStudent(id) {
        $.ajax({
            type : "POST",
            url :"ajax/getStudent.php",
            data :{
                id : id
            },
            success : function (data) {
                var student = JSON.parse(data);
                $('.modal #firstName').html(student.FirstName);
                $('.modal #lastName').html(student.LastName);
                $('.modal #email').html(student.Email);
                $('.modal #city').html(student.City);
                $('.modal #address').html(student.Address);
                $('.modal #dateOfBirth').html(student.DateofBirth);
                $('.modal #imgProfile').attr('src','assets/img/profileImages/'+student.profileImage);
                if(student.Gender == "M")
                    $('.modal #gender').html("Male");
                else
                    $('.modal #gender').html("Female");

                $('#modalStudent').modal();
            }
        });
    }

    function deleteStudent(id) {
        $.ajax({
            type: "POST",
            url : "ajax/deleteStudent.php",
            data:{
                id : id
            },
            success : function () {
                $('#modalMessage').modal();
                $('#modalMessage #message').html("Teacher has been deleted successfully");
                $('#myTbody').html("");
                getAllStudents();
            }
        });
    }

    function uploadProfileImageStudent(imageData) {
        var formData = new FormData();
        formData.append("file[]",imageData);
        $.ajax({
            type : "POST",
            url : "ajax/insertImage.php",
            data : formData,
            processData : false,
            contentType : false,
            success : function (data) {
                var img = data;
                var firstName = $('.modal #firstName').val();
                var lastName = $('.modal #lastName').val();
                var email =  $('.modal #email').val();
                var city =  $('.modal #city').val();
                var address = $('.modal #address').val();
                var  dateOfBirth = $('.modal #dateofbirth').val();
                var gender = $("input[name='gender']:checked"). val();
                var phoneNumber = $(".modal #phoneNumber"). val();
                addStudent(firstName,lastName,address,city,dateOfBirth,gender,phoneNumber,email,img);
            }

        });
    }

    function  deleteImageStudent(id) {
        $.ajax({
            type : "POST",
            url : "ajax/deleteImageStudent.php",
            data :{
                id : id
            },
            success :  function () {

            }
        });
    }

    function getStudentForEdit(id) {
        $.ajax({
            type : "POST",
            url :"ajax/getStudent.php",
            data :{
                id : id
            },
            success : function (data) {
                var student = JSON.parse(data);
                $('.modal #firstName').val(student.FirstName);
                $('.modal #lastName').val(student.LastName);
                $('.modal #email').val(student.Email);
                $('.modal #city').val(student.City);
                $('.modal #address').val(student.Address);
                $('.modal #phoneNumber').val(student.PhoneNumber);
                $('.modal #dateofBirth').val(student.DateOfBirth);
                if(student.Gender == "M")
                    $('.modal #gender.m').prop("checked",true);
                else
                    $('.modal #gender.f').prop("checked",true);
                $('.modal #saveBtn').html("Edit");
                $('#modalAddStudent').modal();
            }
        });
    }

    function editStudentwithoutImage(studentID,firstName,lastName,address,city,dateOfBirth,gender,phoneNumber,email){
        $.ajax({
            type : 'POST',
            url  : 'ajax/updateStudent.php',
            data : {
                studentID : studentID,
                firstName : firstName,
                lastName : lastName,
                address : address,
                city : city,
                dateOfBirth : dateOfBirth,
                gender :gender,
                phoneNumber : phoneNumber,
                email :email

            },
            success : function () {
                $("#modalMessage #message").html("Updated successfully");
                $("#modalMessage").modal();

            }
        });
    }

    function updateProfileImageStudent(id, imageData) {
        var formData = new FormData();
        formData.append("file[]",imageData);
        $.ajax({
            type : "POST",
            url : "ajax/insertImage.php",
            data : formData,
            processData : false,
            contentType : false,
            success : function (data) {
                var img = data;
                var firstName = $('.modal #firstName').val();
                var lastName = $('.modal #lastName').val();
                var email =  $('.modal #email').val();
                var city =  $('.modal #city').val();
                var address = $('.modal #address').val();
                var  dateOfBirth = $('.modal #dateofbirth').val();
                var gender = $("input[name='gender']:checked"). val();
                var phoneNumber = $(".modal #phoneNumber"). val();
                deleteImage(id);
                editStudentWithImage(id ,firstName,lastName,address,city,dateOfBirth,gender,phoneNumber,email,img);
            }

        });
    }


    function editStudentWithImage(studentID,firstName,lastName,address,city,dateOfBirth,gender,phoneNumber,email ,profileImage){
        $.ajax({
            type : 'POST',
            url  : 'ajax/updateStudentWithImage.php',
            data : {
                studentID : studentID,
                firstName : firstName,
                lastName : lastName,
                address : address,
                city : city,
                dateOfBirth : dateOfBirth,
                gender :gender,
                phoneNumber : phoneNumber,
                email :email,
                profileImage : profileImage

            },
            success : function () {
                $("#modalMessage #message").html("Updated successfully");
                $("#modalMessage").modal();

            }
        });
    }

    /*---- /Students page functions ---------------------------------------------------------- */


    /*---- Employee page functions ------------------------------------------------------- */
    function getAllEmployees() {
        $.ajax({
            type : 'POST',
            url : "ajax/getAllEmployees.php",
            success : function (data) {
                var dataParsed = JSON.parse(data);
                if(dataParsed == ""){
                    $('#information-text').css('display','block');
                    $('.table').css('display','none');
                    $('#more').css('display','none');

                }else{
                    $.each(dataParsed,function(i,employee){
                        $('#myTbody').append("<tr>"+
                            "<td class='EmployeeID'>"+employee.EmployeeID +"</td>"+
                            "<td class='EmployeeFirstName'>"+employee.FirstName+"</td>"+
                            "<td class='EmployeeLastName'>"+employee.LastName+"</td>"+
                            "<td class='EmployeeJob'>"+employee.job+"</td>"+
                            "<td class='EmployeeEmail'>"+employee.Email+"</td>"+
                            +"</tr>");

                    })
                }

            }
        });

    }
    function addEmployee(firstName,lastName,address,city,dateOfBirth,gender,phoneNumber,email,profileImage,job){
        $.ajax({
            type : 'POST',
            url  : 'ajax/InsertEmployee.php',
            data : {
                firstName : firstName,
                lastName : lastName,
                address : address,
                city : city,
                dateOfBirth : dateOfBirth,
                gender :gender,
                phoneNumber : phoneNumber,
                email :email,
                profileImage : profileImage,
                job : job

            },
            success : function (data) {
                if($('#information-text').css('display') == "block"){
                    $('#information-text').css('display','none');
                    $('.table').css('display','table');
                    $('#more').css('display','inline');
                }
                var id  = JSON.parse(data);
                $('#myTbody').append("<tr>"+
                    "<td class='StudentID'>"+id+"</td>"+
                    "<td class='StudentFirstName'>"+firstName+"</td>"+
                    "<td class='StudentLastName'>"+lastName+"</td>"+
                    "<td class='StudentJob'>"+job+"</td>"+
                    "<td class='StudentEmail'>"+email+"</td>"+
                    +"</tr>");

                $("#modalMessage #message").html("Added successfully");
                $("#modalMessage").modal();
            }

        });
    }
    function getEmployee(id) {
        $.ajax({
            type : "POST",
            url :"ajax/getEmployee.php",
            data :{
                id : id
            },
            success : function (data) {
                var employee = JSON.parse(data);
                $('.modal #firstName').html(employee.FirstName);
                $('.modal #lastName').html(employee.LastName);
                $('.modal #email').html(employee.Email);
                $('.modal #city').html(employee.City);
                $('.modal #address').html(employee.Address);
                $('.modal #dateOfBirth').html(employee.DateofBirth);
                $('.modal #imgProfile').attr('src','assets/img/profileImages/'+employee.profileImage);
                if(employee.Gender == "M")
                    $('.modal #gender').html("Male");
                else
                    $('.modal #gender').html("Female");

                $('.modal #Job').html(employee.job);
                $('#modalEmployee').modal();
            }
        });
    }

    function deleteEmployee(id) {
        $.ajax({
            type: "POST",
            url : "ajax/deleteEmployee.php",
            data:{
                id : id
            },
            success : function () {
                $('#modalMessage').modal();
                $('#modalMessage #message').html("Teacher has been deleted successfully");
                $('#myTbody').html("");
                getAllEmployees();
            }
        });
    }

    function uploadProfileImageEmployee(imageData) {
        var formData = new FormData();
        formData.append("file[]",imageData);
        $.ajax({
            type : "POST",
            url : "ajax/insertImage.php",
            data : formData,
            processData : false,
            contentType : false,
            success : function (data) {
                var img = data;
                var firstName = $('.modal #firstName').val();
                var lastName = $('.modal #lastName').val();
                var email =  $('.modal #email').val();
                var city =  $('.modal #city').val();
                var address = $('.modal #address').val();
                var  dateOfBirth = $('.modal #dateofbirth').val();
                var gender = $("input[name='gender']:checked"). val();
                var phoneNumber = $(".modal #phoneNumber"). val();
                var job = $(".modal #job"). val();
                addEmployee(firstName,lastName,address,city,dateOfBirth,gender,phoneNumber,email,img,job);
            }

        });
    }

    function  deleteImageEmployee(id) {
        $.ajax({
            type : "POST",
            url : "ajax/deleteImageEmployee.php",
            data :{
                id : id
            },
            success :  function () {

            }
        });
    }

    function getEmployeeForEdit(id) {
        $.ajax({
            type : "POST",
            url :"ajax/getEmployee.php",
            data :{
                id : id
            },
            success : function (data) {
                var student = JSON.parse(data);
                $('.modal #firstName').val(student.FirstName);
                $('.modal #lastName').val(student.LastName);
                $('.modal #email').val(student.Email);
                $('.modal #city').val(student.City);
                $('.modal #address').val(student.Address);
                $('.modal #phoneNumber').val(student.PhoneNumber);
                $('.modal #dateofBirth').val(student.DateOfBirth);
                $('.modal #job').val(student.job);
                if(student.Gender == "M")
                    $('.modal #gender.m').prop("checked",true);
                else
                    $('.modal #gender.f').prop("checked",true);
                $('.modal #saveBtn').html("Edit");
                $('#modalAddEmployee').modal();
            }
        });
    }

    function editEmployeewithoutImage(studentID,firstName,lastName,address,city,dateOfBirth,gender,phoneNumber,email,job){
        $.ajax({
            type : 'POST',
            url  : 'ajax/updateEmployee.php',
            data : {
                EmployeeID : EmployeeID,
                firstName : firstName,
                lastName : lastName,
                address : address,
                city : city,
                dateOfBirth : dateOfBirth,
                gender :gender,
                phoneNumber : phoneNumber,
                email :email,
                job : job

            },
            success : function () {
                $("#modalMessage #message").html("Updated successfully");
                $("#modalMessage").modal();

            }
        });
    }

    function updateProfileImageEmployee(id, imageData) {
        var formData = new FormData();
        formData.append("file[]",imageData);
        $.ajax({
            type : "POST",
            url : "ajax/insertImage.php",
            data : formData,
            processData : false,
            contentType : false,
            success : function (data) {
                var img = data;
                var firstName = $('.modal #firstName').val();
                var lastName = $('.modal #lastName').val();
                var email =  $('.modal #email').val();
                var city =  $('.modal #city').val();
                var address = $('.modal #address').val();
                var  dateOfBirth = $('.modal #dateofbirth').val();
                var gender = $("input[name='gender']:checked"). val();
                var phoneNumber = $(".modal #phoneNumber"). val();
                var job = $(".modal #job"). val();
                deleteImage(id);
                editEmployeeWithImage(id ,firstName,lastName,address,city,dateOfBirth,gender,phoneNumber,email,img,job);
            }

        });
    }


    function editEmployeeWithImage(employeeID,firstName,lastName,address,city,dateOfBirth,gender,phoneNumber,email ,profileImage,job){
        $.ajax({
            type : 'POST',
            url  : 'ajax/updateEmployeeWithImage.php',
            data : {
                EmployeeID : employeeID,
                firstName : firstName,
                lastName : lastName,
                address : address,
                city : city,
                dateOfBirth : dateOfBirth,
                gender :gender,
                phoneNumber : phoneNumber,
                email :email,
                profileImage : profileImage

            },
            success : function () {
                $("#modalMessage #message").html("Updated successfully");
                $("#modalMessage").modal();

            }
        });
    }



    /*---Studies Functions ------*/
    function insertStudies(courseid,studentid){
        $.ajax({
            type : 'POST',
            url : 'ajax/insertStudies.php',
            data : {
                courseid : courseid,
                studentid : studentid
            },
            success : function(data){

                if(data == null){
                    var jsonData = JSON.parse(data);
                    $('#modalMessage #message').html(jsonData.msg);
                    $('#modalMessage').modal();
                }else{
                    $('#modalMessage #message').html("Student has been enrolled in course");
                    $('#modalMessage').modal();
                }
            }
        });
    }

    function getAllStudentsForThisCourse(id){
        $.ajax({
            type : 'POST',
            url: 'ajax/getAllStudentsForThisCourse.php',
            data : {
                id : id
            },
            success :function(data){
                $('#tableOfStudents #myTbody').html("");
                var students = JSON.parse(data);

                $.each(students, function(i,student){
                    var urlencoded = encodeURI("?studentId="+student.StudentID+"&courseId="+courseId.html());
                    $('#tableOfStudents #myTbody').append(
                        '<tr>'+
                        '<td>'+student.StudentID+'</td>'+
                        '<td>'+student.FirstName+'</td>'+
                        '<td>'+student.LastName+'</td>'+
                        "<td><a href='enrollToClassroom.php"+urlencoded+"'>Enroll Student In Classroom</a></td>"+
                        "<td><a href='#' id='deleteFromCourse'>Delete From Course</a></td>"+
                        '</tr>'
                        );
                });
            }
        });
    }
});
