<?php  get_header(); /* Include header */ ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 main-menu bg-white main-font text-center sticky-top">
            <!-- Template From Templates -->
            <?php get_template_part("templates/home_page"); ?>
            <!-- EOF Template -->
        </div>
        <!-- Blog Post Section Last 10 -->
        <div class="col-sm-6">
            <?php if( have_posts() ): ?>    
                <?php while( have_posts() ): ?> 
                    <?php the_post(); ?>
                    <!-- FORMAT POST -->
                    <article class="main-post main-font">
                        <ul class="tags">
                            <?php @$tags = get_the_tags(); ?>
                                <?php if(!empty($tags)): ?>
                                    <div class="tag">
                                        <?php foreach( $tags as $tag ): ?>
                                            <span style="background: #<?php #echo random_color(); ?>"><?php echo $tag->name; ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                        </ul>
                        <!-- POST TITLE -->
                        <a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
                        <!-- POST DATE -->
                        <div class="post-desc">
                            <span class="text-muted"><?php the_date("Y/M/d h:i"); ?></span>
                            <span class="text-muted">Posted by: <?php the_author(); ?></span>
                        </div>
                        <!-- POST THUMB -->
                        <?php if( has_post_thumbnail() ): ?>
                            <?php the_post_thumbnail(); ?>
                        <?php endif; ?>
                        <!-- POST EXCERPT -->
                        <div><?php the_excerpt(); ?></div>
                    </article>
                    <!-- EOF POST -->
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="col-sm-3 bg-white my-bio text-center main-font">
            <!-- Template: templates/about_me -->
            <?php get_template_part("templates/about_me"); ?>
            <!-- EOF Template -->
        </div>
    </div>
</div>
<?php get_footer(); /* Include Footer */ ?>