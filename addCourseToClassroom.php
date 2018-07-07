<?php
require_once  "vendor/autoload.php";
require_once "appdata/CourseRepository.php";
session_start();

$client = new Google_Client();
$client->setAuthConfig('client_secret.json');
$client->addScope(Google_Service_Classroom::CLASSROOM_COURSES);

  if(isset($_SESSION['access_token'])){
    $client->setAccessToken($_SESSION['access_token']);
    $dbConn = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
    $cR = new CourseRepository($dbConn);
    $course = $cR->getCourseFromIdWithoutJSON($_SESSION['courseId']);http://localhost:8080/ecms/addCourseToClassroom.php?id=5
    $service = new Google_Service_Classroom($client);
    $course = new Google_Service_Classroom_Course(array(
        "name" => $course['Name'],
        "ownerId" => 'me',
        'courseState' => 'PROVISIONED'
    ));
    $course = $service->courses->create($course);
    $cs = new Course();
    $cs->setCourseID($_SESSION['courseId']);
    $cs->setClassroomId($course->id);
    $cs->setClassroomUrl($course->alternateLink);
    $cs->setEnrollmentCode($course->enrollmentCode);
    $cR->insertClassroomCourseData($cs);
    session_destroy();
    session_start();
    $_SESSION['message'] = "Course has been created in classroom";
    header("Location:AddCoursesInClassroom.php");
  }else{
      $_SESSION['courseId'] = $_GET['id'];
      header("Location:googleApiCallbacks/createCourseCallback.php");
  }

?>