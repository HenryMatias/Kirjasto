<?php

add_action('wp_ajax_nopriv_filter', 'filter_ajax');
add_action('wp_ajax_filter', 'filter_ajax');

function filter_ajax() {

$book_title = $_POST['searchinput'];
$book_order = $_POST['orderby'];
$book_class = $_POST['luokat'];

$args = array (
    'post_type' => 'kirjat',
    'posts_per_page' => 100,
    'order' => 'ASC',
    'meta_query' => array(
            array(
                'key' => 'arvosana',
                'value' => array(1,2,3,4,5)
            )
        ),
);

// Search
if(!empty($book_title)) {
    $args['s'] = $book_title;
}

// Orderby
if(!empty($book_order)) {
    $args['orderby'] = $book_order;
}

// Book class
if(!empty($book_class)) {
    $args['tax_query'] = array (
        array (
            'taxonomy' => 'luokat',
            'field' => 'slug',
            'terms' => $book_class
        )
    );
}

$kirjat = new WP_Query($args);

if( $kirjat->have_posts() ) :
    while( $kirjat->have_posts() ): $kirjat->the_post();

?>
    


<div class="content">
    <div class="row">
        <div class="col-lg-3 image">
            <img src="<?php echo get_field('kirjan_kuva')?>" alt="Taru Sormusten Herrasta">
        </div>
        <div class="col-lg-6 content">
            <div class="info">
                <h3><?php echo get_field('kirjan_nimi')?></h3>
                <p class="writer"><?php echo get_field('kirjoittaja')?></p>
                <?php the_excerpt()?>
            </div>
            <div class="specs">
                <div class="info-block publisher">
                    <i class="far fa-star"></i>
                    <p><?php echo get_field('julkaisu_vuosi')?></p>
                </div>
                <div class="info-block publisher">
                    <i class="far fa-edit"></i>
                    <p><?php echo get_field('kategoria')?></p>
                </div>
                <div class="info-block publisher">
                    <i class="far fa-bookmark"></i>
                    <p><?php echo get_field('kustantaja')?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 loan">
            <div class="loan-info">
                <div class="state">
                    <div class="status">
                        <p>Tila:</p>
                    </div>
                    <div class="place">
                        <p><?php echo get_field('lainauksen_tila')?></p>
                    </div>
                    <div class="status-color <?php echo get_field('lainauksen_tila')?>"></div>
                </div>
                <div class="return">
                    <div class="returning">
                        <p>Palautuu:</p>
                    </div>
                    <div class="date">
                        <p><?php echo get_field('palautus_paiva')?></p>
                    </div>
                </div>
                <div class="grading">
                    <div class="value">
                        <p>Arvosana: </p>
                    </div>
                    <div class="grade">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo get_field('arvosana')?>.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endwhile;
wp_reset_query();
else:
?>

<div class="content">
    <div class="row">
        <div class="content">
            <div class="info">
                <h3>Ei tuloksia</h3>
            </div>
        </div>
    </div>
</div>

<?php
endif;

die();
};