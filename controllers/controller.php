<?php

$action = isset($_GET["action"]) ? $_GET["action"] : null;

switch ($action) {

  case 'register':
    // code...
    break;

  case 'login':
    // code...
    break;

  case 'display':
  default:
    include "../models/PostManager.php";

    $posts = GetAllPosts();

    if (isset($_GET["search"])) {
      $search = $_GET["search"];
      $posts = GetAllPostsWithComments($search);
    }

    include "../models/CommentManager.php";
    $comments = array();

    foreach ($posts as $onePost) {
      $idPost = $onePost['id'];
      $comments[$idPost] = GetAllCommentsFromPostId($idPost);
    }

    include "../views/DisplayPosts.php";
    break;
}
