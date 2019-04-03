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
function dbmyPostList(){
  $sql_list ="SELECT * FROM posts";
  return $sql_list;
}
function dbmyAdminPagePostsList(){
  $sql_list ="SELECT * FROM posts";
  return $sql_list;
}
function dbmyAdminPagePostsAdd($author,$author_role,$date,$title,$content){
  $sql_add="INSERT INTO posts (post_AUTHOR,post_AUTHOR_ROLE,post_DATE,post_TITLE,post_CONTENT)
  VALUES ('{$author}','{$author_role}','{$date}','{$title}','{$content}')";
  return $sql_add;
}
function dbmyAdminPagePostsDelete($posts_id){
  $sql_delete="DELETE FROM posts WHERE post_ID={$posts_id}";
  return $sql_delete;
}
function dbmyAdminPagePostsEdit($title,$content,$hide,$post_id){
  $sql_update="UPDATE posts SET post_TITLE='$title',
  post_CONTENT='$content',post_HIDE='$hide' WHERE post_ID=$post_id";
  return $sql_update;
}
function dbAdminUserList(){
  $sql_list="SELECT * FROM admin_users";
  return $sql_list;
}
function dbAdminUserDelete($users_id){
  $sql_delete="DELETE FROM admin_users WHERE admin_ID={$users_id}";
  return $sql_delete;
}
function dbAdminUserAdd($name,$password,$role,$nickname,$email){
  $sql_add="INSERT INTO admin_users (admin_USERNAME,admin_PASSWORD,admin_ROLE,admin_NICKNAME,admin_EMAIL)
  VALUES ('{$name}','{$password}','{$role}','{$nickname}','{$email}')";
  return $sql_add;
}
function dbAdminUserEdit($name,$password,$role,$nickname,$email,$id){
  $sql_update="UPDATE admin_users SET admin_USERNAME='$name',admin_PASSWORD='$password',
  admin_ROLE='$role',admin_NICKNAME='$nickname',admin_EMAIL='$email' WHERE admin_ID=$id";
  return $sql_update;
}
?>
