
<!-- ****** Our Creative Portfolio Area End ****** -->

<!-- ****** Footer Social Icon Area Start ****** -->
<div class="social_icon_area clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-social-area d-flex">
                  <?php
                  $sql_list=dbmyAdminSocialMediaList();
                  $sql_list=$con->query($sql_list);
                  if($sql_list->num_rows>0)
                  {
                    while ($row=$sql_list->fetch_assoc()) {
                      $socialmedia_name=$row['socialmedia_NAME'];
                      $socialmedia_url=$row['socialmedia_URL'];
                   ?>
                    <div class="single-icon">
                        <a href="<?php echo $socialmedia_url; ?>" target="_blank"><i class="fa fa-<?php echo $socialmedia_name; ?>" aria-hidden="true"></i><span><?php echo $socialmedia_name; ?></span></a>
                    </div>
                  <?php }} ?>
            </div>
        </div>
    </div>
</div>
<!-- ****** Footer Social Icon Area End ****** -->

<!-- ****** Footer Menu Area Start ****** -->
<footer class="footer_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Copywrite Text -->
                <div class="copy_right_text text-center">
                  <?php
                      CreateMetaTag($metatag_name,$metatag_content);
                      $sql_list=dbCopyright();
                      $sql_list=$con->query($sql_list);
                      $row=$sql_list->fetch_assoc();
                      ?>
                    <p><?php echo $row['copyright_NAME']; ?></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- ****** Footer Menu Area End ****** -->

<!-- Jquery-2.2.4 js -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="js/bootstrap/popper.min.js"></script>
<!-- Bootstrap-4 js -->
<script src="js/bootstrap/bootstrap.min.js"></script>
<!-- All Plugins JS -->
<script src="js/others/plugins.js"></script>
<!-- Active JS -->
<script src="js/active.js"></script>
</body>
</html>
