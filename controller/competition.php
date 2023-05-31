<?php
require "../model/competitionModel.php";
session_start();
class competition
{
  public static function addCompetition($questions)
  {
    competitionModel::addCompetition($questions);
  }

  public static function displayAllCompetitions()
  {
    $_SESSION["competitions"]=competitionModel::displayAllCompetitions();
    
    header("location: ../view/displayAllCompetitionView.php");

  }
  public static function displayAllCompetitionsBE()
  {
    $_SESSION["competitions"]=competitionModel::displayAllCompetitions();
    
    header("location: ../view/displayAllCompetitionsBE.php");

  }
}
