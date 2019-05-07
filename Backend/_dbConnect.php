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
function dbAboutList()
{
  $sql_list ="SELECT * FROM abouts";
  return $sql_list;
}
function dbAboutEdit(){
  $sql_update="UPDATE abouts SET about_NAME=?,about_JOB=?,about_IMAGE=?,about_SHORT=?,about_LONG=? WHERE about_ID=?";
  return $sql_update;
}
function dbmyPostsList($count){
  $sql_list ="SELECT * FROM posts ORDER BY post_HIT DESC LIMIT $count,7";
  return $sql_list;
}
function dbmyPopulerPostsList(){
  $sql_list ="SELECT * FROM posts ORDER BY post_HIT DESC LIMIT 6";
  return $sql_list;
}
function dbCopyright(){
  $sql_list ="SELECT * FROM copyright";
  return $sql_list;
}
function dbCopyrightEdit(){
  $sql_update="UPDATE copyright SET copyright_NAME=? WHERE copyright_ID=1";
  return $sql_update;
}
function dbmyAdminSocialMediaList(){
  $sql_list ="SELECT * FROM socialmedias";
  return $sql_list;
}
function dbmyAdminSocialMediaDelete(){
  $sql_delete="DELETE FROM socialmedias WHERE socialmedia_ID=?";
  return $sql_delete;
}
function dbmyAdminSocialMediaAdd(){
  $sql_add="INSERT INTO socialmedias (socialmedia_NAME,socialmedia_URL)
  VALUES (?,?)";
  return $sql_add;
}
function dbmyAdminSocialMediaEdit(){
  $sql_update="UPDATE socialmedias SET socialmedia_NAME=?,socialmedia_URL=? WHERE socialmedia_ID=?";
  return $sql_update;
}
function dbMetaTagsList(){
  $sql_list ="SELECT * FROM metatags";
  return $sql_list;
}
function dbMetaTagsEdit(){
  $sql_update="UPDATE metatags SET metatag_NAME=?,metatag_CONTENT=? WHERE metatag_ID=?";
  return $sql_update;
}
function dbMenuList(){
  $sql_list ="SELECT * FROM menus";
  return $sql_list;
}
function dbMenuAdd(){
  $sql_add="INSERT INTO menus (menu_NAME,menu_URL)
  VALUES (?,?)";
  return $sql_add;
}
function dbMenuEdit(){
  $sql_update="UPDATE menus SET menu_NAME=?,menu_URL=? WHERE menu_ID=?";
  return $sql_update;
}
function dbMenuDelete(){
  $sql_delete="DELETE FROM menus WHERE menu_ID=?";
  return $sql_delete;
}
function dbHitPlus(){
  $sql_update="UPDATE posts SET post_HIT=post_HIT+1 WHERE post_TITLE=?";
  return $sql_update;
}
function dbmyAdminPagePostsList(){
  $sql_list ="SELECT * FROM posts WHERE post_HIDE='off'";
  return $sql_list;
}
function dbmyAdminPagePostsList2(){
  $sql_list ="SELECT * FROM posts";
  return $sql_list;
}
function dbmyAdminPagePostsAdd(){
  $sql_add="INSERT INTO posts (post_AUTHOR,post_AUTHOR_ROLE,post_DATE,post_TITLE,post_EXPLANATION,post_CONTENT,post_IMAGE,post_URL,post_TAG,post_TAG_VISIBLE)
  VALUES (?,?,?,?,?,?,?,?,?,?)";
  return $sql_add;
}
function dbmyAdminPagePostsAddTitleControl($title){
  $sql_list ="SELECT * FROM posts WHERE post_TITLE='{$title}'";
  return $sql_list;
}
function dbsearchPostsList($search){
  $sql_list ="SELECT * FROM posts WHERE post_TAG LIKE '%{$search}%' OR post_TITLE LIKE '%{$search}%'";
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
function dbmyAdminPagePostsFileDelete($id){
  $sql_delete="SELECT * FROM posts WHERE post_ID=$id";
  return $sql_delete;
}
function dbmyAdminPagePostsEdit(){
  $sql_update="UPDATE posts SET post_EXPLANATION=?,
  post_CONTENT=?,post_HIDE=?,post_TAG=?,post_TAG_VISIBLE=? WHERE post_ID=?";
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
