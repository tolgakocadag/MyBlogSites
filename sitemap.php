<?php

    include "Backend/_database.php";
    include "Backend/_dbConnect.php";

    header("Content-Type: text/xml"); //xml dosyası olduğunu göster

    echo "<?xml version='1.0' encoding='UTF-8'?>";
    echo "<urlset
          xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'
          xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance'
          xsi:schemaLocation='http://www.sitemaps.org/schemas/sitemap/0.9
                http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd'>";

    echo "<url>
    <loc>https://tolgakocadag.com/</loc>
    <lastmod>".date('Y')."-".date('m')."-".date('d')."T".date('H:i:s')."+00:00</lastmod>
    <priority>1.00</priority>
    </url>";
    echo "<url>
      <loc>https://www.tolgakocadag.com/</loc>
      <lastmod>".date('Y')."-".date('m')."-".date('d')."T".date('H:i:s')."+00:00</lastmod>
      <priority>0.99</priority>
    </url>";
    $sql_list=dbMenuList();
    $sql_list=$con->query($sql_list);
    if($sql_list->num_rows>0)
    {
      while ($row=$sql_list->fetch_assoc()) {
        $menu_url=$row['menu_URL'];
        $menu_url=explode(".",$menu_url);
        $menu_url=$menu_url[0].".html";
        echo "<url>
          <loc>https://www.tolgakocadag.com/".$menu_url."</loc>
          <lastmod>".date('Y')."-".date('m')."-".date('d')."T".date('H:i:s')."+00:00</lastmod>
          <priority>0.80</priority>
        </url>";
      }
    }
    $postlist=dbmyAdminPagePostsList();
    $postlist=$con->query($postlist);
    if($postlist->num_rows>0)
    {
      while ($row=$postlist->fetch_assoc()) {
        $post_url=$row['post_URL'];
        $post_url=explode(".",$post_url);
        $post_url=$post_url[0].".html";
        echo "<url>
          <loc>https://www.tolgakocadag.com/".$post_url."</loc>
          <lastmod>".date('Y')."-".date('m')."-".date('d')."T".date('H:i:s')."+00:00</lastmod>
          <priority>0.80</priority>
        </url>";
      }
    }
    echo "<url>
      <loc>https://www.tolgakocadag.com/404.html</loc>
      <lastmod>".date('Y')."-".date('m')."-".date('d')."T".date('H:i:s')."+00:00</lastmod>
      <priority>0.50</priority>
    </url>";
    echo "</urlset>";

 ?>
