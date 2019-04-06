<?php
function dbLoginConnect($username){
  $query="SELECT * FROM admin_users WHERE admin_USERNAME='{$username}'";
  return $query;
}
function dbHomePostList($limit)
{
  $sql_list ="SELECT * FROM posts ORDER BY post_ID DESC LIMIT $limit";
  return $sql_list;
}
function dbHomePostLikeList(){
  $ip=GetIP();
  $sql_list ="SELECT * FROM posts WHERE post_LIKE_IP LIKE '%{$ip}%'";
  return $sql_list;
}
function dbHomePostLikeEdit(){
  $sql_update="UPDATE posts SET post_LIKE_COUNT=post_LIKE_COUNT-1,
  post_LIKE_IP=? WHERE post_ID=?";
  return $sql_update;
}
function dbmyPostsList(){
  $sql_list ="SELECT * FROM posts";
  return $sql_list;
}
function dbmyAdminPagePostsList(){
  $sql_list ="SELECT * FROM posts";
  return $sql_list;
}
function dbmyAdminPagePostsAdd(){
  $sql_add="INSERT INTO posts (post_AUTHOR,post_AUTHOR_ROLE,post_DATE,post_TITLE,post_CONTENT,post_IMAGE,post_TAG)
  VALUES (?,?,?,?,?,?,?)";
  return $sql_add;
}
function dbmyAdminPagePostsAddTitleControl($title){
  $sql_list ="SELECT * FROM posts WHERE post_TITLE='{$title}'";
  return $sql_list;
}
function dbmyAdminPagePostsDelete(){
  $sql_delete="DELETE FROM posts WHERE post_ID=?";
  return $sql_delete;
}
function dbmyAdminPagePostsEdit(){
  $sql_update="UPDATE posts SET post_TITLE=?,
  post_CONTENT=?,post_HIDE=?,post_TAG=? WHERE post_ID=?";
  return $sql_update;
}
function dbAdminUserList(){
  $sql_list="SELECT * FROM admin_users";
  return $sql_list;
}
function dbAdminUserDelete(){
  $sql_delete="DELETE FROM admin_users WHERE admin_ID=?";
  return $sql_delete;
}
function dbAdminUserAdd(){
  $sql_add="INSERT INTO admin_users (admin_USERNAME,admin_PASSWORD,admin_ROLE,admin_NICKNAME,admin_EMAIL)
  VALUES (?,?,?,?,?)";
  return $sql_add;
}
function dbAdminUserEdit(){
  $sql_update="UPDATE admin_users SET admin_USERNAME=?,admin_PASSWORD=?,
  admin_ROLE=?,admin_NICKNAME=?,admin_EMAIL=? WHERE admin_ID=?";
  return $sql_update;
}
?>
