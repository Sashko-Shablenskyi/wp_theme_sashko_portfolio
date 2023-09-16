<?php /* Template Name: Posts page */ 
    global $wp_query;
    $wp_query = new WP_Query(array_merge($wp_query->query, array('post_type' => 'post')));
    
    get_header();
?>

<main class="page">
    <section class="articles articles-page">
        <div class="article__container">
            <h1 class="title">Portfolio</h1>

            <div class="articles__filter filter">
                <button data-filter="*" class="filter__btn filter__btn--active">
                    All
                </button>
                <button data-filter="pure-js" class="filter__btn">
                    Layouts
                </button>
                <button data-filter="javascript" class="filter__btn">
                    JavaScript
                </button>
                <button data-filter="wordpress" class="filter__btn">
                    WordPress
                </button>
            </div>

            <div class="articles__wrapper">
                <?php
                $args = array(
                    'post_type' => 'post', 
                    'posts_per_page' => -1,
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) :
                    $query->the_post();
                    $slug = get_post_field('post_name', get_the_ID());
                    $categories = get_the_category();
                ?>

                <article data-filter="<?php foreach($categories as $category) { echo $category->slug; } ?>"
                    class="articles__item article article--active">
                    <div class="article__img">
                        <a href="<?php echo get_permalink() ?>">
                            <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>" />
                        </a>
                    </div>
                    <div class="article__body">
                        <h2 class="article__title">
                            <a class="article__title-link" href="<?php echo get_permalink() ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <div class="article__descr">
                            <?php the_content(); ?>
                            <?php  echo get_the_excerpt(); ?>
                        </div>

                        <div class="article__btns">
                            <a href="<?php echo get_permalink() ?>" class="btn article__btn">
                                View
                            </a>
                            <a href="#" class="btn btn--transparent  article__btn">
                                GitHub
                            </a>
                        </div>
                    </div>
                </article>
                <?php
                    endwhile;
                        wp_reset_postdata(); // Скидаємо дані після завершення циклу
                    else :
                        echo "Записів не знайдено.";
                endif;
                ?>

                <article data-filter="layouts" class="articles__item article article--active">
                    <div class="article__img">
                        <a href="#">
                            <picture>
                                <source srcset="img/portfolio/Rectangle.webp" type="image/webp"><img
                                    src="img/portfolio/Rectangle.jpg" alt="" />
                            </picture>
                        </a>
                    </div>
                    <div class="article__body">
                        <h2 class="article__title">
                            <a class="article__title-link" href="#">
                                Article Title
                            </a>
                        </h2>
                        <div class="article__descr">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Dicta illo totam ipsa, modi blanditiis fugiat, harum
                            necessitatibus optio corrupti explicabo culpa ratione veniam
                            placeat deserunt tenetur iusto doloremque laborum soluta!
                        </div>

                        <div class="article__btns">
                            <a href="#" class="btn article__btn">
                                Site
                            </a>
                            <a href="#" class="btn btn--transparent article__btn">
                                GitHub
                            </a>
                        </div>
                    </div>
                </article>
                <article data-filter="layouts" class="articles__item article article--active">
                    <div class="article__img">
                        <a href="#">
                            <picture>
                                <source srcset="img/portfolio/Rectangle.webp" type="image/webp"><img
                                    src="img/portfolio/Rectangle.jpg" alt="" />
                            </picture>
                        </a>
                    </div>
                    <div class="article__body">
                        <h2 class="article__title">
                            <a class="article__title-link" href="#">
                                Article Title
                            </a>
                        </h2>
                        <div class="article__descr">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Dicta illo totam ipsa, modi blanditiis fugiat, harum
                            necessitatibus optio corrupti explicabo culpa ratione veniam
                            placeat deserunt tenetur iusto doloremque laborum soluta!
                        </div>

                        <div class="article__btns">
                            <a href="#" class="btn article__btn">
                                Site
                            </a>
                            <a href="#" class="btn btn--transparent article__btn">
                                GitHub
                            </a>
                        </div>
                    </div>
                </article>
                <article data-filter="javascript" class="articles__item article article--active">
                    <div class="article__img">
                        <a href="#">
                            <picture>
                                <source srcset="img/portfolio/Rectangle.webp" type="image/webp"><img
                                    src="img/portfolio/Rectangle.jpg" alt="" />
                            </picture>
                        </a>
                    </div>
                    <div class="article__body">
                        <h2 class="article__title">
                            <a class="article__title-link" href="#">
                                Article Title
                            </a>
                        </h2>
                        <div class="article__descr">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Dicta illo totam ipsa, modi blanditiis fugiat, harum
                            necessitatibus optio corrupti explicabo culpa ratione veniam
                            placeat deserunt tenetur iusto doloremque laborum soluta!
                        </div>

                        <div class="article__btns">
                            <a href="#" class="btn article__btn">
                                Site
                            </a>
                            <a href="#" class="btn btn--transparent article__btn">
                                GitHub
                            </a>
                        </div>
                    </div>
                </article>
                <article data-filter="javascript" class="articles__item article article--active">
                    <div class="article__img">
                        <a href="#">
                            <picture>
                                <source srcset="img/portfolio/Rectangle.webp" type="image/webp"><img
                                    src="img/portfolio/Rectangle.jpg" alt="" />
                            </picture>
                        </a>
                    </div>
                    <div class="article__body">
                        <h2 class="article__title">
                            <a class="article__title-link" href="#">
                                Article Title
                            </a>
                        </h2>
                        <div class="article__descr">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Dicta illo totam ipsa, modi blanditiis fugiat, harum
                            necessitatibus optio corrupti explicabo culpa ratione veniam
                            placeat deserunt tenetur iusto doloremque laborum soluta!
                        </div>

                        <div class="article__btns">
                            <a href="#" class="btn article__btn">
                                Site
                            </a>
                            <a href="#" class="btn btn--transparent article__btn">
                                GitHub
                            </a>
                        </div>
                    </div>
                </article>
                <article data-filter="javascript" class="articles__item article article--active">
                    <div class="article__img">
                        <a href="#">
                            <picture>
                                <source srcset="img/portfolio/Rectangle.webp" type="image/webp"><img
                                    src="img/portfolio/Rectangle.jpg" alt="" />
                            </picture>
                        </a>
                    </div>
                    <div class="article__body">
                        <h2 class="article__title">
                            <a class="article__title-link" href="#">
                                Article Title
                            </a>
                        </h2>
                        <div class="article__descr">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Dicta illo totam ipsa, modi blanditiis fugiat, harum
                            necessitatibus optio corrupti explicabo culpa ratione veniam
                            placeat deserunt tenetur iusto doloremque laborum soluta!
                        </div>

                        <div class="article__btns">
                            <a href="#" class="btn article__btn">
                                Site
                            </a>
                            <a href="#" class="btn btn--transparent article__btn">
                                GitHub
                            </a>
                        </div>
                    </div>
                </article>
                <article data-filter="wordpress" class="articles__item article article--active">
                    <div class="article__img">
                        <a href="#">
                            <picture>
                                <source srcset="img/portfolio/Rectangle.webp" type="image/webp"><img
                                    src="img/portfolio/Rectangle.jpg" alt="" />
                            </picture>
                        </a>
                    </div>
                    <div class="article__body">
                        <h2 class="article__title">
                            <a class="article__title-link" href="#">
                                Article Title
                            </a>
                        </h2>
                        <div class="article__descr">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Dicta illo totam ipsa, modi blanditiis fugiat, harum
                            necessitatibus optio corrupti explicabo culpa ratione veniam
                            placeat deserunt tenetur iusto doloremque laborum soluta!
                        </div>

                        <div class="article__btns">
                            <a href="#" class="btn article__btn">
                                Site
                            </a>
                            <a href="#" class="btn btn--transparent article__btn">
                                GitHub
                            </a>
                        </div>
                    </div>
                </article>
                <article data-filter="wordpress" class="articles__item article article--active">
                    <div class="article__img">
                        <a href="#">
                            <picture>
                                <source srcset="img/portfolio/Rectangle.webp" type="image/webp"><img
                                    src="img/portfolio/Rectangle.jpg" alt="" />
                            </picture>
                        </a>
                    </div>
                    <div class="article__body">
                        <h2 class="article__title">
                            <a class="article__title-link" href="#">
                                Article Title
                            </a>
                        </h2>
                        <div class="article__descr">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Dicta illo totam ipsa, modi blanditiis fugiat, harum
                            necessitatibus optio corrupti explicabo culpa ratione veniam
                            placeat deserunt tenetur iusto doloremque laborum soluta!
                        </div>

                        <div class="article__btns">
                            <a href="#" class="btn article__btn">
                                Site
                            </a>
                            <a href="#" class="btn btn--transparent article__btn">
                                GitHub
                            </a>
                        </div>
                    </div>
                </article>
                <article data-filter="wordpress" class="articles__item article article--active">
                    <div class="article__img">
                        <a href="#">
                            <picture>
                                <source srcset="img/portfolio/Rectangle.webp" type="image/webp"><img
                                    src="img/portfolio/Rectangle.jpg" alt="" />
                            </picture>
                        </a>
                    </div>
                    <div class="article__body">
                        <h2 class="article__title">
                            <a class="article__title-link" href="#">
                                Article Title
                            </a>
                        </h2>
                        <div class="article__descr">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Dicta illo totam ipsa, modi blanditiis fugiat, harum
                            necessitatibus optio corrupti explicabo culpa ratione veniam
                            placeat deserunt tenetur iusto doloremque laborum soluta!
                        </div>

                        <div class="article__btns">
                            <a href="#" class="btn article__btn">
                                Site
                            </a>
                            <a href="#" class="btn btn--transparent article__btn">
                                GitHub
                            </a>
                        </div>
                    </div>
                </article>
                <article data-filter="wordpress" class="articles__item article article--active">
                    <div class="article__img">
                        <a href="#">
                            <picture>
                                <source srcset="img/portfolio/Rectangle.webp" type="image/webp"><img
                                    src="img/portfolio/Rectangle.jpg" alt="" />
                            </picture>
                        </a>
                    </div>
                    <div class="article__body">
                        <h2 class="article__title">
                            <a class="article__title-link" href="#">
                                Article Title
                            </a>
                        </h2>
                        <div class="article__descr">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Dicta illo totam ipsa, modi blanditiis fugiat, harum
                            necessitatibus optio corrupti explicabo culpa ratione veniam
                            placeat deserunt tenetur iusto doloremque laborum soluta!
                        </div>

                        <div class="article__btns">
                            <a href="#" class="btn article__btn">
                                Site
                            </a>
                            <a href="#" class="btn btn--transparent article__btn">
                                GitHub
                            </a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
</main>