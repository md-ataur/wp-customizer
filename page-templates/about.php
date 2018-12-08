<?php
/**
 * Template Name: Customizer About
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php wp_head(); ?>
</head>
<body>
<div class="section banner">
    <h1><?php bloginfo( 'name' ); ?></h1>
    <h2><?php bloginfo( 'description' ); ?></h2>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="mission section">
                <h1 class="heading">
					<?php echo esc_html(cs_get_customize_option( "about_heading")); ?>
                </h1>                
                <p class="subheading">
                    <?php echo esc_html(cs_get_customize_option( "about_description")); ?>
                </p>
            </div>

            <div class="mission section">
                <h1 class="heading2">
                   <?php echo apply_filters( 'the_content',get_theme_mod( "cust_about_heading_edit")); ?>
                </h1>                
                <div class="subheading2">
                    <?php echo apply_filters( 'the_content',get_theme_mod( "cust_about_description_edit")); ?>
                </div>
                <div class="image_upload">
                    <?php
                    $attachment_id = attachment_url_to_postid( get_theme_mod('cust_test_image') );
                    echo wp_kses_post(wp_get_attachment_image( $attachment_id));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section footer">
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque esse nobis recusandae ullam unde.
    </p>
    <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Facebook</a></li>
        <li class="list-inline-item"><a href="#">Twitter</a></li>
        <li class="list-inline-item"><a href="#">Github</a></li>
    </ul>
</div>
</body>
<?php wp_footer(); ?>
</html>
