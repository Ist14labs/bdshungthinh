<?php
get_header();
// vars
$queried_object = get_queried_object();
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;
?>
    <div id="section-breadcumn">
        <div class="row">
            <div class="large-12 columns">
                <h1><?php single_term_title();?></h1>
                <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
                    <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?>
                </div>
            </div>
        </div>
    </div>
    <div id="main">
        <div class="row">
            <div class="main-container">
                <div id="content" class="content medium-9 columns" role="main">
                    <?php
                    $left_class = '';
                    $right_class = 'medium-12 columns';
                    if(get_field('hien_thi_menu',$queried_object) == 'yes') {
                        $left_class = 'medium-3 columns custom-content-menu-left';
                        $right_class = 'medium-9 columns';
                    }
                    ?>
                    <div class="row">
                        <?php if($left_class):?>
                            <div class="<?php echo $left_class?>">
                                <?php the_field('chon_menu',$queried_object);?>
                            </div>
                        <?php endif;?>
                        <div class="<?php echo $right_class;?>">
                            <div class="project-gird">
                                <ul class="block-grid-3 medium-block-grid-3 small-block-grid-1">
                                <?php while(have_posts()):?>
                                    <?php the_post();?>
                                    <?php get_template_part('content','project');?>
                                <?php endwhile;?>
                                </ul>
                                <?php
                                if(function_exists('wp_pagenavi')) wp_pagenavi();
                                wp_reset_query();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php get_sidebar();?>
            </div>
        </div>
    </div>
<?php get_footer();?>