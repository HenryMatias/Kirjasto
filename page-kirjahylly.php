<?php get_header(); ?>
<?php include 'assets/sections/pages-header.php'; ?>

<body>
    <div class="container" id="bookcase">
        <div class="search-bar">
            <h1>Kirjasto</h1>
            <form method="GET" data-js-form="filter">
                <div class="search-form">
                    <div class="checkboxes">
                        <?php
                            $terms = get_terms([
                                'taxonomy' => 'luokat',
                                'hide_empty' => false
                            ]);
                            foreach ($terms as $term) :
                        ?>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"
                                    name="luokat[]"
                                    value="<?php echo $term->name; ?>"
                                    <?php checked((isset($_GET['luokat']) && in_array($term->slug, $_GET['luokat']))) ?>
                                >
                                <?php echo $term->name; ?>
                            </label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="text-inputs">
                        <div class="order">
                            <select name="orderby" id="orderby">
                                <option value="date" name="date" <?php echo selected($_GET['orderby'], 'date') ?> >Uusimmat</option>
                                <option value="title" name="title"<?php echo selected($_GET['orderby'], 'title') ?> >Aakkosjärjestys</option>
                            </select>
                        </div>
                        <div class="search-input">
                            <i class="fas fa-book"></i>
                            <input name="searchinput" type="text" placeholder="Hae teosta..." value="<?php echo (isset($_GET['searchinput']))? $_GET['searchinput'] : ""; ?>">
                        </div>
                        <button>
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <input type="hidden" name="action" value="filter">
                </div>
            </form>
        </div>
        <div class="nav">
            <div class="row">
                <div class="col-3 center">
                    <p>Kuva</p>
                </div>
                <div class="col-6 center">
                    <p>Kuvaus</p>
                </div>
                <div class="col-3 center">
                    <p>Tila</p>
                </div>
            </div>
        </div>
        <div class="books-content" data-js-filter="target">

            <?php
            
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

                $kirjat = new WP_Query($args);
                while ($kirjat->have_posts()) {
                $kirjat->the_post();
                
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

            <?php }
                wp_reset_query();
            ?>

        </div>
        <div class="content-footer">
            <h1>Kirjasto</h1>
        </div>
    </div>
</body>


<?php get_footer(); ?>