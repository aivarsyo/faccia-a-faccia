<?php

get_header();

?>

<main class="about">

<div class="about__projectVideo" style="padding:56.25% 0 0 0;position:relative;">

<iframe class="desktop_version" src="https://player.vimeo.com/video/<?php the_field("company_video") ?>?color=ffffff&title=0&byline=0&portrait=0" 
style="position:absolute;top:0;left:0;width:100%;height:100%;" 
frameborder="0" 
allow="autoplay; fullscreen" 
allowfullscreen>
</iframe>

<iframe class="mobile_version" src="https://player.vimeo.com/video/<?php the_field("company_video_mobile") ?>?color=ffffff&title=0&byline=0&portrait=0" 
style="position:absolute;top:0;left:0;width:100%;height:100%;" 
frameborder="0" 
allow="autoplay; fullscreen" 
allowfullscreen>
</iframe>

</div>
<script src="https://player.vimeo.com/api/player.js"></script>

<div class="about__transcript">
<?php the_content(); ?>
</div>

<div class=about__company>

<div><?php the_field("contact") ?></div>
<div><?php the_field("address") ?></div>
<div><?php the_field("social_media") ?></div>

</div>

</main>


<?php

get_footer();

?>