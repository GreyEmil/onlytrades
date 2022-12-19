<?php
require 'forum.php';






if(isset($_POST["request"]))
{
    if($_POST["request"]=="editcomment")
    {
        forumModel::editComment($_POST);
    }
    if($_POST["request"]=="editthread")
    {
        forumModel::editThread($_POST);
    }
    if($_POST["request"]=="deletecomment")
    {
        forumModel::deleteComment($_POST["idcomment"]);
    }
}
else
{
    if(isset($_POST["comment"]))
    forum::addComment($_POST,$_GET["idThread"],$_GET["idUser"]);
    else
    forum::addNewThread($_POST);
}