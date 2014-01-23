<?php
  global $mb_base;

  $rss = $mb_base['s_rss'];
  $fb  = $mb_base['s_facebook'];
  $tw  = $mb_base['s_twitter'];
  $gp  = $mb_base['s_googe_plus'];
  $ln  = $mb_base['s_linked_in'];
  $sk  = $mb_base['s_skype'];
  $pt  = $mb_base['s_pintrest'];
  $yt  = $mb_base['s_skype'];
  $tb  = $mb_base['s_youtube'];
  $ig  = $mb_base['s_instagram'];
  $db  = $mb_base['s_dribbble'];
?>

<!-- social list -->
<ul class="social inline-list">
  <?php if ($fb) { ?>
    <li class="s-icon_fb"><a href="<?php echo $fb; ?>"><i class="fa fa-facebook fa-lg"></i></a></li>
  <?php } ?>
  
  <?php if ($tw) { ?>
    <li class="s-icon_tw"><a href="<?php echo $tw; ?>"><i class="fa fa-twitter fa-lg"></i></a></li>
  <?php } ?>

  <?php if ($gp) { ?>
    <li class="s-icon_gp"><a href="<?php echo $gp; ?>"><i class="fa fa-google-plus fa-lg"></i></a></li>
  <?php } ?>

  <?php if ($ln) { ?>
    <li class="s-icon_ln"><a href="<?php echo $ln; ?>"><i class="fa fa-linkedin fa-lg"></i></a></li>
  <?php } ?>

  <?php if ($sk) { ?>
    <li class="s-icon_sk"><a href="<?php echo $sk; ?>"><i class="fa fa-skype fa-lg"></i></a></li>
  <?php } ?>

  <?php if ($pt) { ?>
    <li class="s-icon_pn"><a href="<?php echo $pn; ?>"><i class="fa fa-pinterest fa-lg"></i></a></li>
  <?php } ?>

  <?php if ($yt) { ?>
    <li class="s-icon_yt"><a href="<?php echo $yt; ?>"><i class="fa fa-youtube-play fa-lg"></i></a></li>
  <?php } ?>

  <?php if ($tb) { ?>
    <li class="s-icon_tb"><a href="<?php echo $tb; ?>"><i class="fa fa-tumblr fa-lg"></i></a></li>
  <?php } ?>

  <?php if ($ig) { ?>
    <li class="s-icon_it"><a href="<?php echo $ig; ?>"><i class="fa fa-instagram fa-lg"></i></a></li>
  <?php } ?>

  <?php if ($db) { ?>
    <li class="s-icon_db"><a href="<?php echo $db; ?>"><i class="fa fa-dribbble fa-lg"></i></a></li>
  <?php } ?>

  <?php if ($rss == '1') { ?>
    <li class="s-icon_rs"><a href="<?php bloginfo('url'); ?>/feed"><i class="fa fa-rss fa-lg"></i></a></li>
  <?php } ?>
</ul>
<!-- /social list -->