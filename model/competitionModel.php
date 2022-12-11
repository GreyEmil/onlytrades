<?php
require "../controller/config.php";
class competitionModel
{
  public static function addCompetition($questions)
  {
    $db=config::getConnexion();
    $req=$db->prepare("INSERT INTO competition (points) VALUES (?)");
    $req->execute(array(100));
    $idcomp=$db->lastInsertId();
    
    $req=$db->prepare("INSERT INTO question (question,answer1,answer2,answer3,correct_answer,id_competition) VALUES (?,?,?,?,?,?)");
    foreach($questions AS $question)
    $req->execute(array($question["question"],$question["answer1"],$question["answer2"],$question["answer3"],$question["correctAnswer"],$idcomp));

  }
  public static function displayAllCompetitions()
  {
    $db=config::getConnexion();
    $req=$db->prepare("SELECT * FROM competition ");
    
    $req->execute(array());
    $data=$req->fetchAll();
    $i=0;
    foreach($data AS $competition)
    {
      $idcom=$competition["id"];
      //$competitions[$i]["startDate"]=$competition["start_date"];
      $competitions[$i]["points"]=$competition["points"];

      $req2=$db->prepare("SELECT * FROM question WHERE id_competition=$idcom");
      $req2->execute();
      $questions=$req2->fetchAll();
      $competitions[$i]["questions"]=$questions;
      $i++;
    }
    return $competitions;
  }
}
