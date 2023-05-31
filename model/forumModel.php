<?php
require_once "../controller/config.php";
if(!isset($_SESSION)) session_start();
class forumModel
{
  public static function addNewThread($thread)
  {
    $db=config::getConnexion();
    $req=$db->prepare("INSERT INTO thread (subject,content,id_user,category,publish_date) VALUES (?,?,?,?,?)");
    $req->execute(array($thread["subject"],$thread["content"],$_SESSION["user"]["id"],$thread["category"],date('Y-m-d H:i:s')));
    return $db->lastInsertId();

  }

  public static function fetchThread($idThread)
  {
    
    $db=config::getConnexion();
    $req=$db->prepare("SELECT * FROM thread where id=?");
    $req->execute(array($idThread));
    $thread["info"]=$req->fetchAll()[0];
    $req=$db->prepare("SELECT id,first_name,last_name,username,photo,creation_date FROM user where id=?");
    $req->execute(array($thread["info"]["id_user"]));
    $thread["user"]=$req->fetchAll()[0];

    $req=$db->prepare("SELECT id FROM thread where id_user=?");
    $req->execute(array($thread["user"]["id"]));
    $messages=count($req->fetchAll());

    $req=$db->prepare("SELECT id FROM comment where id_writer=?");
    $req->execute(array($thread["user"]["id"]));
    $messages+=count($req->fetchAll());

    $thread["user"]["messages"]=$messages;

    $req=$db->prepare("SELECT *  FROM comment where id_thread=?");
    $req->execute(array($idThread));
    $thread["comments"]=$req->fetchAll();
    $req=$db->prepare("SELECT *  FROM user where id=?");
    for($i=0;$i<count($thread["comments"]);$i++)
    {
      $req->execute(array($thread["comments"][$i]["id_writer"]));
      $thread["comments"][$i]["user"]=$req->fetchAll()[0];
    }
    $thread["likes"]=forumModel::getLikes($idThread);
    if(isset($_SESSION["user"]["id"]))
    $thread["liked"]=forumModel::checkIfLiked($idThread,$_SESSION["user"]["id"]);
    else $thread["liked"]="notliked";
    return $thread;

  }
  public static function checkIfLiked($idThread,$idUser)
  {
    $db=config::getConnexion();
    $req=$db->prepare("SELECT * FROM thread_vote where id_thread=? AND id_user=? AND type=?");
    $req->execute(array($idThread,$idUser,1));
    if(count($req->fetchAll())==0)
    {
      return 'notliked';
    }
    else {
      return 'liked';
    }
  }
  public static function addLike($idThread,$idUser)
  {
    $db=config::getConnexion();
    $req=$db->prepare("SELECT * FROM thread_vote where id_thread=? AND id_user=? AND type=?");
    $req->execute(array($idThread,$idUser,1));
    $check=forumModel::checkIfLiked($idThread,$idUser);
    if($check=='notliked')
    {
      $req=$db->prepare("INSERT  INTO thread_vote (id_thread,id_user,type) VALUE (?,?,?)");
      $req->execute(array($idThread,$idUser,1));
      return 'liked';
    }
    else {
      $req=$db->prepare("DELETE FROM thread_vote WHERE id_user=? AND id_thread=?");
      $req->execute(array($idUser,$idThread));
      return 'unliked';
    }
  }
  public static function getLikes($idThread)
  {
    $db=config::getConnexion();
    $req=$db->prepare("SELECT * FROM thread_vote where id_thread=? AND type=?");
    $req->execute(array($idThread,1));
    return count($req->fetchAll());
  }
  public static function getThreads($category)
  {
    $db=config::getConnexion();
    $req=$db->prepare("SELECT * FROM thread where category=? ");
    $req->execute(array($category));
    $threads=$req->fetchAll();
    $req=$db->prepare("SELECT first_name,last_name,username,photo FROM user where id=? ");
    $views=$db->prepare("SELECT id FROM view where id_thread=? ");
    $comments=$db->prepare("SELECT id FROM comment where id_thread=? ");
    $lastUpdate=$db->prepare("SELECT * FROM comment WHERE last_modification = (SELECT max(last_modification) FROM comment WHERE id_thread=?) ");
    for($i=0 ;$i<count($threads);$i++ )
    {
      
      $req->execute(array($threads[$i]["id_user"]));
      $views->execute(array($threads[$i]['id']));
      $comments->execute(array($threads[$i]['id']));
      $lastUpdate->execute(array($threads[$i]['id']));
      $threads[$i]["user"]=$req->fetchAll()[0];
      $threads[$i]["views"]=count($views->fetchAll());
      $threads[$i]["comments"]=count($comments->fetchAll());
      $threads[$i]["lastComment"]=$lastUpdate->fetchAll();

      
    }
    return $threads;
  }

  public static function getAllThreads()
  {
    $db=config::getConnexion();
    $req=$db->prepare("SELECT * FROM thread  ");
    $req->execute(array());
    $threads=$req->fetchAll();
    $req=$db->prepare("SELECT first_name,last_name,username,photo FROM user where id=? ");
    $views=$db->prepare("SELECT id FROM view where id_thread=? ");
    $comments=$db->prepare("SELECT id FROM comment where id_thread=? ");
    $lastUpdate=$db->prepare("SELECT * FROM comment WHERE last_modification = (SELECT max(last_modification) FROM comment WHERE id_thread=?) ");
    for($i=0 ;$i<count($threads);$i++ )
    {
      
      $req->execute(array($threads[$i]["id_user"]));
      $views->execute(array($threads[$i]['id']));
      $comments->execute(array($threads[$i]['id']));
      $lastUpdate->execute(array($threads[$i]['id']));
      $threads[$i]["user"]=$req->fetchAll()[0];
      $threads[$i]["views"]=count($views->fetchAll());
      $threads[$i]["comments"]=count($comments->fetchAll());
      $threads[$i]["lastComment"]=$lastUpdate->fetchAll();

      
    }
    return $threads;
  }
  public static function view($idThread,$idUser)
   {
    $db=config::getConnexion();
    $req=$db->prepare("SELECT * FROM view where id_thread=? AND id_user=? ");
    $req->execute(array($idThread,$idUser));
    if(count($req->fetchAll())==0)
    {
      $req=$db->prepare("INSERT  INTO view (id_thread,id_user) VALUE (?,?)");
      $req->execute(array($idThread,$idUser));
      
    }
    
   }
   public static function getViews($idThread)
   {
    $db=config::getConnexion();
    $req=$db->prepare("SELECT * FROM view where id_thread=?");
    $req->execute(array($idThread));
    return count($req->fetchAll());
   }

   public static function addComment($comment,$idThread,$idUser)
   {
    $db=config::getConnexion();
    $req=$db->prepare("UPDATE comment SET last_comment=? where last_comment=?");
    $req->execute(array(0,1));

    $req=$db->prepare("INSERT INTO comment  (content,last_comment,id_thread,last_modification,id_writer) VALUES(?,?,?,?,?)");
    $req->execute(array($comment["comment"],1,$idThread,date('Y-m-d H:i:s'),$idUser));
   }

   public static function editThread($info)
   {
    $db=config::getConnexion();
    $req=$db->prepare("UPDATE thread SET content=?,subject=? where id=?");
    $req->execute(array($info["content"],$info["subject"],$info["idthread"]));
   }

   public static function editComment($info)
   {
    $db=config::getConnexion();
    $req=$db->prepare("UPDATE comment SET content=? where id=?");
    $req->execute(array($info["content"],$info["idcomment"]));
   }

   public static function deleteComment($id)
   {
    $db=config::getConnexion();
    $req=$db->prepare("DELETE FROM comment where id=?");
    $req->execute(array($id));
   }

   public static function deleteThread($id)
   {
    $db=config::getConnexion();
    $req=$db->prepare("DELETE FROM thread where id=?");
    $req->execute(array($id));
   }

}