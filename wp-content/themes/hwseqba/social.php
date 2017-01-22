<!-- Latest Stuff Section -->              
        <div id="latest-stuff">
            <div class="margin-eighty">
                <div class="latest-stuff-mobile">
                    <h2>Latest Posts</h2>
                </div>
                <div class="latest-stuff-header">
                    <div class="social-container twentyfive-inline float-left top-margin social-icons">
                        <a href="<?php the_field('facebook_link', 'option') ?>"><img class="social-image-first" src="/wp-content/uploads/2016/09/fb-sketch.png"></a>
                        <a href="<?php the_field('twitter_link', 'option') ?>"><img class="social-image" src="/wp-content/uploads/2016/09/tw-sketch.png"></a>
                        <a href="<?php the_field('instagram_link', 'option') ?>"><img class="social-image" src="/wp-content/uploads/2016/09/ig-sketch.png"></a>
                        <a href="<?php the_field('soundcloud_link', 'option') ?>"><img class="social-image-last" src="/wp-content/uploads/2016/09/yt-sketch.png"></a>
                    </div>
                    <div class="fifty-inline">
                        <h2>Latest Stuff</h2>
                    </div>
                    <div class="twentyfive-inline float-right top-margin" style="text-align: right;">
                        <a class="hollow-CTA" href="https://www.instagram.com/hermitageworksstudios/" target="_blank">More Stuff</a>
                    </div>
                </div>
                <div class="social-posts-container">
<!-- Start the Loop. -->

                    <?php query_posts('post_type=fx_instagram&showposts=4');
                        if(have_posts()) : while(have_posts()) : the_post(); ?>
                            <div class="card social-card top-social">
                                <?php the_content() ?>
                                <div class="social">
                                    <?php the_excerpt() ?>
                                </div>
                            </div>
                    <?php endwhile; endif; ?>
            </div>    
        </div>




        
