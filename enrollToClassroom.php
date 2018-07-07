<?php
require_once  "vendor/autoload.php";
require_once "appdata/CourseRepository.php";
require_once "appdata/StudiesRepository.php";
session_start();


if(!isset($_SESSION['courseId']) && !isset($_SESSION['studentId'])){
	$_SESSION['courseId'] = $_GET['courseId'];
	$_SESSION['studentId'] = $_GET['studentId'];
}


$client = new Google_Client();
$client->setAuthConfig('client_secret.json');
$client->addScope([
    Google_Service_Classroom::CLASSROOM_ROSTERS,
    Google_Service_Classroom::CLASSROOM_PROFILE_EMAILS,
    Google_Service_Classroom::CLASSROOM_PROFILE_PHOTOS
]);
 
  if(isset($_SESSION['access_token'])){
  	try{
  		$dbConn  = new DatabaseConnection("127.0.0.1","Cms","admin1","admin1");
      $cR = new CourseRepository($dbConn);
      $course = $cR->getCourseFromIdWithoutJSON($_SESSION['courseId']);
      die();
      $sR = new StudiesRepository($dbConn);
      $student = $sR->getStudiesById($_SESSION['courseId'],$_SESSION['studentId']);

      $courseIdd = $courseIdd["ClassroomId"];
      $client->setAccessToken($_SESSION['access_token']);
      $service = new Google_Service_Classroom($client);
      $studentToBeEnrolled = new Google_Service_Classroom_Student(array(
        "userID" => $student['Email']
      ));
      $params = array(
        'enrollmentCode' => $course['EnrollmentCode']
      );

      $studentToBeEnrolled = $service->courses_students->create($courseIdd,$studentToBeEnrolled,$params);
      session_destroy();
  	}catch(Execption $msg){
  		if($msg->getCode() == 409){
  			echo "You are already a member of this course";
  			session_destroy();
  		}else{
  			echo $msg->getMessage();
  			session_destroy();
  		}
  	}
    
  }else{
      $_SESSION['courseId'] = $_GET['id'];
      header("Location:googleApiCallbacks/enroll-student-callback.php");
  }

?>