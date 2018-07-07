<?php
include_once 'ExamPointsException.php';

class ExamPoints {

  private $ExamPointID;
  private $Point;
  private $ExamID;
  private $StudentID;

  public function __construct(){}


    public function setExamPointsId($id){
      if($id==null || empty($id)) {
      throw new ExamPointsException("ExamPointsID is null or empty");
    }
      $this->ExamPointsID=$id;
    }
    public function setPoint($point){
      if($point==null ||empty($point)){
        throw new ExamPointsException("Name is empty or null");
      }
      $this->Point=$point;
    }
    public function setExamId($id){
      if($id==null || empty($id)){
        throw new ExamPointsException("ExamId is empty or null");
      }
      $this->ExamID=$id;
    }
    public function setStudentId($id){
      if($id==null || empty($id)){
        throw new ExamPointsException("StudentId is empty or null");
      }
      $this->StudentID=$id;
    }
    public function getExamPointsId(){
      return $this->ExamPointsID;
    }
    public function getPoint(){
      return $this->Point;
    }
    public function getExamId(){
      return $this->ExamID;
    }
    public function getStudentId(){
      return $this->StudentID;
    }
}

 ?>
