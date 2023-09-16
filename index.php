<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sashko_Sh
 */

get_header();
?>

	<main class="page">
		<?php
			$general_values = get_field('general');
		?>
		<section class="intro" id="intro">
			<?php
				$intro_values = get_field('intro');
			?>
			<div class="intro__container">
				<div class="intro__inner">
					<div class="intro__left">
						<div class="intro__label">
							<?php echo $intro_values['intro_label']; ?>
						</div>
						<h1 class="intro__title">
							<?php echo $general_values['general_name']; ?>
							<br />
							<span>
								<?php echo $intro_values['intro_position']; ?>
							</span>
						</h1>

						<div class="intro__btns">
							<a href="<?php echo $intro_values['intro_btn_download_link'] ?>" class="btn" data-ripple="once" download>
								<span class="btn__content">
									<?php echo $intro_values['intro_btn_download']; ?>
								</span>
								<span class="btn__icon _icon-cloud-download"></span>
							</a>

							<a class="btn btn--transparent" href="#portfolio" data-ripple="once">
								<?php echo $intro_values['intro_btn_portfolio']; ?>
							</a>
						</div>
					</div>

					<div class="intro__img">

						<img src="<?php echo $intro_values['intro_img']; ?>" alt="Sashko Shablenskyi">

						<div class="decore">
							<svg xmlns="http://www.w3.org/2000/svg" class="decore__arch">
								<defs>
									<linearGradient id="borderGradient" gradientTransform="rotate(90)">
										<stop offset="0%" stop-color="#000" stop-opacity="1" />
										<stop offset="80%" stop-color="#000" stop-opacity="0" />
									</linearGradient>
								</defs>
								<circle cx="50%" cy="50%" r="43%" fill="none" stroke="url(#borderGradient)" stroke-width="3" />
								<circle cx="84%" cy="25%" r="15" fill="#000" />
								<circle cx="88.3%" cy="35%" r="10" fill="#000" />
							</svg>

							<a href="#contacts" class="decore__circle">
								<svg xmlns="http://www.w3.org/2000/svg" width="140" height="140">
									<circle cx="70" cy="70" r="65" fill="#000" />
									<circle cx="70" cy="70" r="7" fill="#4646b6" />
									<path id="innerCircle" d="M70 20 A 50 50 0 0 1 70 120 A 50 50 0 0 1 70 20" fill="none">
										<animateTransform attributeName="transform" attributeType="XML" type="rotate" from="0 70 70" to="-360 70 70" dur="15s" repeatCount="indefinite" />
									</path>
									<text font-size="14px" fill="white">
										<textPath xlink:href="#innerCircle" startOffset="50%" textLength="310" lengthAdjust="spacingAndGlyphs">
											<tspan dy="6" text-anchor="middle">
												<?php echo $intro_values['intro_decore_text']; ?> | <?php echo $intro_values['intro_decore_text']; ?> |
											</tspan>
										</textPath>
										<animateTransform attributeName="transform" attributeType="XML" type="rotate" from="0 70 70" to="-360 70 70" dur="15s" repeatCount="indefinite" />
									</text>
								</svg>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="about" id="about">
			<?php
				$about_values = get_field('about');
			?>
			<div class="about__container">
				<div class="about__img" data-watch data-watch-once data-watch-root="about" data-watch-threshold=".2">
					<img src="<?php echo $about_values['about_img']; ?>" alt="Sashko Shablenskyi">
				</div>

				<h2 class="title about__title" data-watch data-watch-once data-watch-root="about">
					<?php echo $about_values['about_title']; ?>
				</h2>

				<div class="about__descr" data-watch data-watch-once data-watch-root="about" data-watch-threshold=".3">
					<?php echo $about_values['about_description']; ?>
				</div>

				<div class="about__info info folder" data-watch data-watch-once data-watch-root="about" data-watch-threshold=".2">
					<div class="info__box">
						<span>
							<?php echo $about_values['about_birthday_title']; ?>:
						</span> 
						<?php echo $about_values['about_birthday']; ?>
					</div>
					<div class="info__box">
						<span><?php echo $about_values['about_phone_title']; ?>:</span>
						<a href="tel:<?php echo $general_values['general_phone_link']; ?>">
							<?php echo $general_values['general_phone']; ?>
						</a>
					</div>
					<div class="info__box">
						<span>
							<?php echo $about_values['about_location_title']; ?>:
						</span>
						<a href="<?php echo $about_values['about_location_link']; ?>"  >
							<?php echo $about_values['about_location']; ?>
						</a>
					</div>
					<div class="info__box">
						<span><?php echo $about_values['about_email_title']; ?>:</span>
						<a href="mailto:<?php echo $about_values['about_email']; ?>:"><?php echo $about_values['about_email']; ?></a>
					</div>
				</div>
			</div>
		</section>

		<section class="portfolio" id="portfolio">
			<?php
				$portfolio_values = get_field('portfolio');
			?>
			<div class="portfolio__container">
				<h2 class="title portfolio__title" data-watch data-portfolio_btn_linkwatch-once data-watch-root="portfolio">
					<?php echo $portfolio_values['portfolio_title'] ?>
				</h2>

				<div class="portfolio__wrapper">
					<a class="portfolio__project project" href="#" target="_blank" style="background-image: url('img/portfolio/Rectangle.jpg')" data-watch data-watch-once data-watch-root="portfolio" data-watch-threshold=".1">
						<div class="project__hover">
							<div class="project__title">Project 1</div>
							<div class="project__descr">
								Lorem, ipsum dolor sit amet consectetur adipisicing elit.
							</div>
						</div>
					</a>

					<a class="portfolio__project project" href="#" target="_blank" style="background-image: url('img/portfolio/Rectangle.jpg')" data-watch data-watch-once data-watch-root="portfolio" data-watch-threshold=".1">
						<div class="project__hover">
							<div class="project__title">Project 2</div>
							<div class="project__descr">
								Lorem, ipsum dolor sit amet consectetur adipisicing elit.
							</div>
						</div>
					</a>

					<a class="portfolio__project project" href="#" target="_blank" style="background-image: url('img/portfolio/Rectangle.jpg')" data-watch data-watch-once data-watch-root="portfolio" data-watch-threshold=".1">
						<div class="project__hover">
							<div class="project__title">Project 3</div>
							<div class="project__descr">
								Lorem, ipsum dolor sit amet consectetur adipisicing elit.
							</div>
						</div>
					</a>

					<a class="portfolio__project project" href="#" target="_blank" style="background-image: url('img/portfolio/Rectangle.jpg')" data-watch data-watch-once data-watch-root="portfolio" data-watch-threshold=".1">
						<div class="project__hover">
							<div class="project__title">Project 4</div>
							<div class="project__descr">
								Lorem, ipsum dolor sit amet consectetur adipisicing elit.
							</div>
						</div>
					</a>

					<a class="portfolio__project project" href="#" target="_blank" style="background-image: url('img/portfolio/Rectangle.jpg')" data-watch data-watch-once data-watch-root="portfolio" data-watch-threshold=".1">
						<div class="project__hover">
							<div class="project__title">Project 5</div>
							<div class="project__descr">
								Lorem, ipsum dolor sit amet consectetur adipisicing elit.
							</div>
						</div>
					</a>

					<a class="portfolio__project project" href="#" target="_blank" style="background-image: url('img/portfolio/Rectangle.jpg')" data-watch data-watch-once data-watch-root="portfolio" data-watch-threshold=".1">
						<div class="project__hover">
							<div class="project__title">Project 6</div>
							<div class="project__descr">
								Lorem, ipsum dolor sit amet consectetur adipisicing elit.
							</div>
						</div>
					</a>

					<a class="portfolio__project project" href="#" target="_blank" style="background-image: url('img/portfolio/Rectangle.jpg')" data-watch data-watch-once data-watch-root="portfolio" data-watch-threshold=".1">
						<div class="project__hover">
							<div class="project__title">Project 7</div>
							<div class="project__descr">
								Lorem, ipsum dolor sit amet consectetur adipisicing elit.
							</div>
						</div>
					</a>
				</div>

				<a class="btn btn--transparent portfolio__btn" target="_blank"
					 href="<?php echo $portfolio_values['portfolio_btn_link'] ?>" data-ripple="once" data-watch data-watch-once data-watch-root="portfolio">
					 <?php echo $portfolio_values['portfolio_btn'] ?>
				</a>
			</div>
		</section>

		<section class="statistic" id="statistic">
			<?php
				$about_values = get_field('fh_statistic');
			?>
			<div class="statistic__container">
				<h2 class="title statistic__title title--inverse" data-watch data-watch-once data-watch-root="statistic" data-watch-threshold=".2">
					<?php
						echo $about_values['fh_title'];
					?>
				</h2>

				<div class="statistic__body">
						<div class="statistic__box statistic__box--hidden box" data-watch data-watch-once data-watch-root="statistic" data-watch-threshold=".2">
							<div class="box__value percent"></div>
							<div class="box__title">
								<?php echo $about_values['fh_percent']; ?>
							</div>
						</div>
						<div class="statistic__box statistic__box--hidden box" data-watch data-watch-once data-watch-root="statistic" data-watch-threshold=".2">
							<div class="box__value average"></div>
							<div class="box__title">
								<?php echo $about_values['fh_average_score']; ?>
							</div>
						</div>
						<div class="statistic__box statistic__box--hidden box" data-watch data-watch-once data-watch-root="statistic" data-watch-threshold=".2">
							<div class="box__value rating"></div>
							<div class="box__title">
								<?php echo $about_values['fh_rating']; ?>
							</div>
						</div>
						<div class="statistic__box statistic__box--hidden box" data-watch data-watch-once data-watch-root="statistic" data-watch-threshold=".2">
							<div class="box__value reviews"></div>
							<div class="box__title">
								<?php echo $about_values['fh_reviews']; ?>
							</div>
						</div>
						<div class="statistic__loader"></div>
					</div>
			</div>

			<a class="btn hover btn--inverse statistic__btn" href="https://freelancehunt.com/freelancer/sashko_sh.html" target="_blank" data-ripple="once" data-watch data-watch-once data-watch-root="statistic" data-watch-threshold=".2">
				<?php echo $about_values['fh_button']; ?>
			</a>
		</section>

		<section class="experience" id="experience">
			<div class="experience__container">
				<h2 class="title experience__title" data-watch data-watch-once data-watch-root="experience" data-watch-threshold=".2">
					<?php echo get_field('experience_title') ?> 
				</h2>

				<div class="experience__skills skills">
					<?php
						$args = array(
							'post_type'      => 'skills',
							'posts_per_page' => -1,
							'order'          => 'ASC',
						);

						$skills_query = new WP_Query( $args );

						if ( $skills_query->have_posts() ) {
							while ( $skills_query->have_posts() ) {
								$skills_query->the_post();
								echo '<div class="skills__box" data-watch data-watch-once data-watch-root="experience" data-watch-threshold=".2">';
									$thumbnail_id = get_post_thumbnail_id();
									if ( $thumbnail_id ) {
										$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail' )[0];
										if ( $thumbnail_url ) {
											echo '
											<div class="skills__img">
												<a href="' . esc_url( get_permalink() ) . '">
													<img src="' . esc_url( $thumbnail_url ) . '" alt="' . get_the_title() . '" />
												</a>
											</div>';

										}
									}
									echo '<h3><a href="' . esc_url( get_permalink() ) . '">' . get_the_title() . '</a></h3>';
								echo '</div>';
							}
						}

						wp_reset_postdata();
					?>
				</div>

				<div class="experience__work work">
					<?php
						$args = array(
							'post_type'      => 'work_places',
							'posts_per_page' => -1,
							'order'          => 'DESC',
						);

						$skills_query = new WP_Query( $args );

						if ( $skills_query->have_posts() ) {
							while ( $skills_query->have_posts() ) {
								$skills_query->the_post();
								echo '<div class="work__box folder" data-watch data-watch-once data-watch-root="experience" data-watch-threshold=".2">
									<div class="work__position">' . get_the_title() . '</div>
									<div class="work__company">
										' . get_field('period_of_work') . ',
										<a target="_blank" href="' . get_field('linkedin_link') . '">
											' . get_field('name_of_company') . '
										</a>
									</div>
									<div class="work__descr">
										' . apply_filters( 'the_content', get_the_content() ) . '
									</div>
								</div>';
							}
						}

						wp_reset_postdata();
					?>
					<!-- <div class="work__box folder" data-watch data-watch-once data-watch-root="experience" data-watch-threshold=".2"> -->
						<!-- <div class="work__position">Soldier</div>
						<div class="work__company">Jun 2022 - Now,
							<a target="_blank" href="https://www.linkedin.com/company/armed-forces-of-ukraine/mycompany/">AFU</a>
						</div> -->
						<!-- <div class="work__descr">
							<p>- Damn rus*nya!!!</p>
						</div> -->
					<!-- </div> -->

					<!-- <div class="work__box folder" data-watch data-watch-once data-watch-root="experience" data-watch-threshold=".2">
						<div class="work__position">Front-end developer</div>
						<div class="work__company">Apr 2021 - Mar 2022,
							<a target="_blank" href="https://www.linkedin.com/company/westtrading/">Westtrading</a>
						</div>
						<div class="work__descr">
							<p>- Created sites based on Photoshop/Figma layouts.</p>
							<p>- Adding Wordpress admin panels.</p>
							<p>- Administration of sites on Opencart.</p>
							<p>- Technical support of the sales department.</p>
						</div>
					</div>

					<div class="work__box folder" data-watch data-watch-once data-watch-root="experience" data-watch-threshold=".2">
						<div class="work__position">Dancer/Team Leader</div>
						<div class="work__company">Feb 2014 - Jan 2020</div>
						<div class="work__descr">
							<p>- I did work in many cities in China</p>
						</div>
					</div> -->
				</div>
			</div>
		</section>

		<section class="contacts" id="contacts">
			<?php
				$contacts_values = get_field('contacts');
			?>
			<div class="contacts__container">
				<div class="contacts__left">
					<h2 class="title contacts__title" data-watch data-watch-once data-watch-root="contacts" data-watch-threshold=".2">
						<?php echo $contacts_values['contacts_title']; ?>
					</h2>
					<div class="contacts__label" data-watch data-watch-once data-watch-root="contacts" data-watch-threshold=".2">
						<?php echo $general_values['general_name']; ?>
					</div>

					<a href="tel:<?php echo $general_values['general_phone_link']; ?>" class="contacts__tel" data-watch data-watch-once data-watch-root="contacts" data-watch-threshold=".2">
						<?php echo $general_values['general_phone']; ?>
					</a>

					<div class="contacts__socials" data-watch data-watch-once data-watch-root="contacts" data-watch-threshold=".2">
						<a class="contacts__socials-link _icon-linkedin"  target="_blank" href="
							<?php echo $contacts_values['contacts_linkedin_link'] ?>"></a>
						<a class="contacts__socials-link _icon-telegram"  target="_blank" href="
							<?php echo $contacts_values['contacts_telegram_link'] ?>"></a>
						<a class="contacts__socials-link _icon-github"    target="_blank" href="
							<?php echo $contacts_values['contacts_github_link'] ?>"></a>
						<a class="contacts__socials-link _icon-instagram" target="_blank" href="
						    <?php echo $contacts_values['contacts_instagram_link'] ?>"></a>
					</div>
				</div>


				<form class="form">
					<?php echo do_shortcode('[contact-form-7 id="60b994b" title="Контактна форма на головній" raw]'); ?>
				</form>
			</div>
		</section>
	</main>

<?php
get_footer();
