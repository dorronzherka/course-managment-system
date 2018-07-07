<?php

include_once 'ExamPoints.php';
include_once 'DatabaseConnection.php';

class ExamPointsRepository{
  private $dbConn;

  public function __construct(DatabaseConnection $dbConn){
    try{
      $this->dbConn = $dbConn->getDatabaseConnectionInstance();
    }catch(DatabaseConnectionException $e){
       throw  new ExamPointsException($e->getMessage());
    }
  }

  public function addExamPoints(ExamPoints $ExamPoints){
    if($ExamPoints==null || empty($ExamPoints)){
      throw new ExamPointsException("Exam Point is null");
    }
    try{
      $query=$this->dbConn->prepare("INSERT INTO exampoints (Point,ExamID,StudentID) VALUES (:points,examId,studentId)");
      $query->execute(array(
        ":points"=>$ExamPoints->getPoint(),
        ":examId"=>$ExamPoints->getExamId(),
        ":studentId"=>$ExamPoints->getStudentId()
      ));
      return json_encode($this->dbConn->lastInsertId());
    }catch(Exception $msg){
      throw new ExamPointsException($msg->getMessage());
    }
  }

  public function getAllExamPointsAsJsonString(){
    try{
      $query=$this->dbConn->prepare("SELECT * FROM exampoints");
      $query->execute();
      $result=$query->fetchAll(PDO::FETCH_ASSOC);
      return json_encode($result);
    }catch(Exception $msg){
      throw new ExamPointsException($msg->getMessage());
    }
  }
  public function getAllExamPointsWithLimit($startPoint){
    try{
      $query=$this->dbConn->prepare("SELECT * FROM exampoints LIMIT :start,20");
      $query->bindParam(':start',$startPoint,PDO::PARAM_INT);
      $query->execute();
      $result=$query->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }catch(Exception $msg){
      throw new ExamPointsException($msg->getMessage());
    }
  }
public function getNumbersExamPoints(){
  try{
    $query=$this->dbConn->prepare("SELECT * FROM exampoints");
    $query->execute();
    return "".$query->rowCount();
  }catch(Exception $msg){
    throw new ExamPointsException($msg->getMessage());
  }
}
public function getExamPointFromId($id){
  try{
    $query=$this->dbConn->prepare("SELECT * FROM exampoins WHERE ExamPointsID= :id");
    $query->bindParam(":id",$id,PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return json_encode($result);
  }catch(Exception $msg){
    throw new ExamPointsException($msg->getMessage());

  }
}

public function editExamPoint(ExamPoints $ep){
  try{
    $query=$this->dbConn->prepare("UPDATE exampoints SET Point = :points, ExamID = :examId, StudentID=:studentId WHERE ExamPointsID=:examPointId");
    $query->execute(array(
      ':points'=>$ep->getPoint(),
      ':examId'=>$ep->getExamId(),
      ':studentId'=>$ep->getStudentId()
    ));
  }catch(Exception $msg){
    throw new ExamPointsException($msg->getMessage());
  }
}
public function deleteExamPoint($id){
  try{
    if($id == 0 || $id == null){
      throw new ExamPointsException("Id  is empty");
    }
    $query=$this->dbConn->prepare("DELETE FROM exampoints WHERE ExamPointsID=:id");
    $query->execute(array(
      ":id" => $id
    ));
  }catch(Exception $msg){
    throw new ExamPointsException($msg->getMessage());
  }
}

}
 ?>
