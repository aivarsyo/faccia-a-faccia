<?php

get_header();

?>

<main class="single" data-barba="container" data-barba-namespace="project">

<div class="single__projectVideo" style="padding:56.25% 0 0 0;position:relative;">
<iframe src="https://player.vimeo.com/video/<?php the_field("video_number") ?>?color=ffffff&title=0&byline=0&portrait=0" 
style="position:absolute;top:0;left:0;width:100%;height:100%;" 
frameborder="0" 
allow="autoplay; fullscreen" 
allowfullscreen>
</iframe>
</div>
<script src="https://player.vimeo.com/api/player.js"></script>

<h1><?php the_title() ?> - <?php the_field("client") ?></h1>

<div class="single__changePost">
    <div class="prev"><?php previous_post_link('%link', 'Prev'); ?></div>
    <div class="next"><?php next_post_link('%link', 'Next'); ?></div>
</div>


</main>


<?php

get_footer();

?>