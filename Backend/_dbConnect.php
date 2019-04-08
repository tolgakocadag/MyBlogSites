<?php
function dbLoginConnect($username){
  $query="SELECT * FROM admin_users WHERE admin_USERNAME='{$username}'";
  return $query;
}
function dbHomePostList($limit)
{
  $sql_list ="SELECT * FROM posts WHERE post_HIDE='off' ORDER BY post_ID DESC LIMIT $limit";
  return $sql_list;
}
function dbmyPostsList($count){
  $sql_list ="SELECT * FROM posts ORDER BY post_HIT DESC LIMIT $count,9";
  return $sql_list;
}
function dbmyPopulerPostsList(){
  $sql_list ="SELECT * FROM posts ORDER BY post_HIT DESC LIMIT 4";
  return $sql_list;
}
function dbHitPlus(){
  $sql_update="UPDATE posts SET post_HIT=post_HIT+1 WHERE post_TITLE=?";
  return $sql_update;
}
function dbmyAdminPagePostsList(){
  $sql_list ="SELECT * FROM posts";
  return $sql_list;
}
function dbCommentList(){
  $sql_list ="SELECT * FROM comments";
  return $sql_list;
}
function dbCommentEdit(){
  $sql_update="UPDATE comments SET comment_VISIBLE=? WHERE comment_ID=?";
  return $sql_update;
}
function dbmyAdminPagePostsAdd(){
  $sql_add="INSERT INTO posts (post_AUTHOR,post_AUTHOR_ROLE,post_DATE,post_TITLE,post_EXPLANATION,post_CONTENT,post_IMAGE,post_URL,post_TAG,post_TAG_VISIBLE)
  VALUES (?,?,?,?,?,?,?,?,?,?)";
  return $sql_add;
}
function dbcommentAdd(){
  $sql_add="INSERT INTO comments (comment_DATE,comment_AUTHOR,comment_IP,comment_EMAIL,comment_TEXT)
  VALUES (?,?,?,?,?)";
  return $sql_add;
}
function dbCommentDelete(){
  $sql_delete="DELETE FROM comments WHERE comment_ID=?";
  return $sql_delete;
}
function dbmyAdminPagePostsAddTitleControl($title){
  $sql_list ="SELECT * FROM posts WHERE post_TITLE='{$title}'";
  return $sql_list;
}
function dbsearchPostsList($search){
  $sql_list ="SELECT * FROM posts WHERE post_TITLE LIKE '%{$search}%'";
  return $sql_list;
}
function dbrelatedPostsList($search){
  $sql_list ="SELECT * FROM posts WHERE post_TITLE LIKE '%{$search}%'";
  return $sql_list;
}
function dbmyAdminPagePostsDelete(){
  $sql_delete="DELETE FROM posts WHERE post_ID=?";
  return $sql_delete;
}
function dbmyAdminPagePostsEdit(){
  $sql_update="UPDATE posts SET post_EXPLANATION=?,
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
