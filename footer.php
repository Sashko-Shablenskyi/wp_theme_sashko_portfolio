<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sashko_Sh
 */

?>

	<footer class="footer">
			<div class="footer__container">
				<div class="footer__right">
					Copyright @ 2021 ALL Right Reserved
				</div>
			</div>
		</footer>
	</div>

	<!-- Стилі для body -->
	<style>
		.lock body {
			overflow: hidden;
			touch-action: none;
			overscroll-behavior: none;
		}

		.loading body {
			opacity: 0;
			visibility: hidden;
		}

		.loaded body {
			transition: opacity 0.5s ease 0s;
			opacity: 1;
			visibility: visible;
		}
	</style>
	<div id="fls-preloader">
		<!-- Документація: https://template.fls.guru/template-docs/modul-preloader.html -->
		<!-- Стилі для прелоадера -->
		<style>
			* {
				padding: 0px;
				margin: 0px;
				border: 0px;
			}

			*,
			*:before,
			*:after {
				box-sizing: border-box;
			}

			html {
				overflow: hidden;
				touch-action: none;
				overscroll-behavior: none;
			}

			/* Головний блок */
			.fls-preloader {
				pointer-events: none;
				z-index: -1;
				position: fixed;
				width: 100%;
				height: 100%;
				top: 0;
				left: 0;
				display: flex;
				justify-content: center;
				align-items: center;
				background-color: #1f1f1f;
				color: #ddd;
			}

			/* Блок з елементами */
			.fls-preloader__body {
				padding: 0.93rem;
				max-width: 31.25rem;
				display: flex;
				flex-direction: column;
			}

			/* Блок з лічильником */
			.fls-preloader__counter {
				font-size: 7.5rem;
			}
		</style>
		<!-- Скріпт прелоадера -->
		<script>
			function preloader() {
				const preloaderImages = document.querySelector('[data-preloader]') ?
					document.querySelectorAll('[data-preloader] img') :
					document.querySelectorAll('img');
				const preloaderContainer = document.querySelector('#fls-preloader');
				if (preloaderImages.length) {
					const preloaderTemplate = `
					<div class="fls-preloader">
						<div class="fls-preloader__body">
							<div class="fls-preloader__counter">0%</div>
						</div>
					</div>`;
					document
						.querySelector('html')
						.insertAdjacentHTML('beforeend', preloaderTemplate);

					const preloader = document.querySelector('.fls-preloader'),
						showPecentLoad = document.querySelector('.fls-preloader__counter'),
						htmlDocument = document.documentElement;

					let imagesLoadedCount = (counter = progress = 0);

					htmlDocument.classList.add('loading');
					htmlDocument.classList.add('lock');

					preloaderImages.forEach((preloaderImage) => {
						const imgClone = document.createElement('img');
						if (imgClone) {
							imgClone.onload = imageLoaded;
							imgClone.onerror = imageLoaded;
							preloaderImage.dataset.src ?
								(imgClone.src = preloaderImage.dataset.src) :
								(imgClone.src = preloaderImage.src);
						}
					});

					function setValueProgress(progress) {
						showPecentLoad ? (showPecentLoad.innerText = `${progress}%`) : null;
					}
					showPecentLoad ? setValueProgress(progress) : null;

					function imageLoaded() {
						imagesLoadedCount++;
						progress = Math.round(
							(100 / preloaderImages.length) * imagesLoadedCount
						);
						const intervalId = setInterval(() => {
							counter >= progress ?
								clearInterval(intervalId) :
								setValueProgress(++counter);
							counter >= 100 ? addLoadedClass() : null;
						}, 10);
					}

					function addLoadedClass() {
						htmlDocument.classList.add('loaded');
						htmlDocument.classList.remove('lock');
						htmlDocument.classList.remove('loading');
						setInterval(() => {
							preloader.remove();
							preloaderContainer.remove();
						}, 10);
					}
				} else {
					preloaderContainer.remove();
				}
			}
			preloader();
		</script>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>