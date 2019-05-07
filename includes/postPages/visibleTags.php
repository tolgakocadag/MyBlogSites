<div style="height:0px;" class='tags-area'>
<?php
$tags=explode(',',$visiblelabels);
    foreach ($tags as $key => $value) {
      $t_url=explode(' ',$tags[$key]);
      $tag_url='';
      foreach ($t_url as $k => $v) {
        $tag_url.=$v.'+';
      }
      $tag_url=rtrim($tag_url,'+');
      echo '<a style="visibility:hidden" href=search?search='.$tag_url.'>'.$tags[$key].'</a>&nbsp;';
    }
 ?>
</div>
