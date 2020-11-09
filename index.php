<?php get_header(); ?>


<body>
	<div class="container-fluid" id="frontpage-container">
		<div class="container">
			<div class="content">
				<div class="row">
					<div class="col-lg-6">
						<div class="content">
							<div class="head">
								<h1 class="logo"><?php the_title(); ?></h1>
							</div>
							<div class="intro">
								<div class="ribbon">
									<h2 class="heading">Kirjahylly</h2>
								</div>
								<div class="navigation">
									<button class="button">
										<a href="http://cap-rekry.local/kirjahylly/">KIRJAHYLLY</a>
									</button>
									<button class="button">
										TOIMIPISTE
									</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="registeration">
							<div class="ribbon">
								<h2 class="heading">Rekisteröidy</h2>
							</div>
							<div class="form-area">
								<form action="">
									<div class="input-field">
										<i id="userlogo" class="far fa-user"></i>
										<input id="user" type="text">
										<label id="userlabel" for="user" class="">Käyttäjätunnus</label>
									</div>
									<div class="input-field">
										<i id="emaillogo" class="far fa-envelope"></i>
										<input id="email" type="text">
										<label id="emaillabel" for="email" class="">Sähköposti</label>
									</div>
									<div class="cta-button">
										<button id="cta" class="heading">
											LUO TUNNUS
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>


<?php get_footer(); ?>
