<?php
require_once "../model/forumModel.php";
if(!isset($_SESSION)) session_start() ;
class forum
{
  public static function addNewThread($thread)
  {
    $id=forumModel::addNewThread($thread);
    
    header("location: ../view/displayThread.php?id=$id");
    
  }
  public static function addLike($idThread,$idUser)
   {
     return forumModel::addLike($idThread,$idUser);
   }
   public static function getLikes($idThread)
   {
     return forumModel::getLikes($idThread);
   }
   public static function getThreads($category)
   {
    return forumModel::getThreads($category);
   }
   public static function fetchThread($idThread)
   {
    return forumModel::fetchThread($idThread);
   }

   public static function view($idThread,$idUser)
   {
    return forumModel::view($idThread,$idUser);
    
   }
   public static function getViews($idThread)
   {
    return forumModel::getViews($idThread);
   }
   public static function addComment($comment,$idThread,$idUser)
   {
    forumModel::addComment($comment,$idThread,$idUser);
    header('location:../view/displayThread.php?id='.$idThread.'');
   }

}