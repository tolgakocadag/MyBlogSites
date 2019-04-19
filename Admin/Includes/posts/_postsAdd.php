<!--YAZI EKLEME-->
<?php
if(isset($_POST['add_post']) && isset($_SESSION['role'])){
  $post_title=$_POST["post_title"];
  $titleControl=dbmyAdminPagePostsAddTitleControl($post_title);
  $titleControl=$con->query($titleControl);
  if($titleControl->num_rows==0)
  {
    $post_author=$_POST["post_author"];
    $post_author_role=$_POST["admin_role"];
    $post_date=date("d.m.Y")." ".date("H:i:s");
    $post_explanation=$_POST["post_explanation"];
    $post_content=$_POST["post_content"];
    $post_image = $_FILES['post_image']['tmp_name'];
    copy($post_image, '../img/blog-img/' . $_FILES['post_image']['name']);
    $post_image="../img/blog-img/{$_FILES['post_image']['name']}";
    $post_tag=$_POST['post_tag'];
    $post_visiblelabels=$_POST['post_visiblelabels'];
    $post_hit=0;
    $post_comment=0;
    $new_title = multiexplode(array(",","|",'"','.',"{","!","#",">","<","/","*","+","-","=","%","&","*",";","}","[","]","(",")"," ","?"),$post_title);
    foreach ($new_title as $key => $value) {
      $submit.=$new_title[$key]."-";
    }
    $new_title=explode("'",$submit);
    $submit="";
    foreach ($new_title as $key => $value) {
      $submit.=$new_title[$key]."-";
    }
    $submit=replace_tr($submit);
    $submit=strtolower($submit);
    $submit=rtrim($submit,"-");
    $submit=rtrim($submit,"-");
    $post_url="$submit.php";
    $text=createTextforPage($post_title,$post_date,$post_author,$post_url);
    $page = fopen( "../{$submit}.php" , "w" );
    $sql_add=$con->prepare(dbmyAdminPagePostsAdd());
    $sql_add->bind_param("ssssssssss",$post_author,$post_author_role,$post_date,$post_title,$post_explanation,$post_content,$post_image,$post_url,$post_tag,$post_visiblelabels);
    $sql_add->execute();
    $sql_add->close();
    fwrite($page, $text);
    fclose($page);
    $newsletter = fopen( "../newspaper.txt" , "a+" );
    while (!feof($newsletter))
    {
         $okunanveri = fgets($newsletter);
         $mails=explode(',',$okunanveri);
    }
    fclose($newsletter);
    include "../Backend/class.phpmailer.php";
    foreach ($mails as $key => $value) {
      if($value=="")
      {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->CharSet = 'utf-8';
        $mail->Host = 'mail.tolgakocadag.com';
        $mail->Port = 587;
        $mail->Username = 'info@tolgakocadag.com';
        $mail->Password = 'Tlgkcdg3434';
        $mail->SetFrom($mail->Username, 'Tolga Kocadag Blog');
        $mail->AddAddress($value,' ');
        $mail->Subject = replace_tr($post_title);
        $post_url=explode(".",$post_url);
        $post_url=$post_url[0].".html";
        $mail->MsgHTML('Merhaba,<br /><br />Yeni yazımız "'.$post_title.'" yayınlanmıştır. '.$post_explanation.' Hemen okumak için <a href=https://www.tolgakocadag.com/'.$post_url.'>tıklayınız.
        </a><br /><br />Teşekkür ederiz.<br />tolgakocadag.com ');
        $mail->Send();
      }
      else {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->CharSet = 'utf-8';
        $mail->Host = 'mail.tolgakocadag.com';
        $mail->Port = 587;
        $mail->Username = 'info@tolgakocadag.com';
        $mail->Password = 'Tlgkcdg3434';
        $mail->SetFrom($mail->Username, 'Tolga Kocadag Blog');
        $mail->AddAddress($value,' ');
        $mail->Subject = replace_tr($post_title);
        $post_url=explode(".",$post_url);
        $post_url=$post_url[0].".html";
        $mail->MsgHTML('Merhaba,<br /><br />Yeni yazımız "'.$post_title.'" yayınlanmıştır. '.$post_explanation.' Hemen okumak için <a href=https://www.tolgakocadag.com/'.$post_url.'>tıklayınız.
        </a><br /><br />Teşekkür ederiz.<br />tolgakocadag.com ');
        $mail->Send();
      }
    }
  }
  header("Location: posts.php");
}
 ?>
 <!--YAZI EKLEME FINISH-->
