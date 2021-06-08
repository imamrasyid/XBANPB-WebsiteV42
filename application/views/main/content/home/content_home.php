<!-- Banner Section -->
<section class="banner-section">
	<div class="banner-carousel owl-theme owl-carousel">
		<div class="slide-item">
			<div class="image-layer" style="background-image:url('base/gamon/images/img_slide/1.jpg')"></div>
			<div class="auto-container">
				<div class="content-box">
					<h2>XBAN Origin Private Server</h2>
					<div class="btn-box">
						<?php
						if (empty($_SESSION['uid']))
						{
						?>
							<a href="<?php echo base_url('register') ?>" class="theme-btn btn-style-two"><span class="btn-title">Register</span></a>
							<a href="<?php echo base_url('login') ?>" class="theme-btn btn-style-two"><span class="btn-title">Login</span></a>
						<?php
						}
						if (!empty($_SESSION['uid']))
						{
						?>
							<a href="<?php echo base_url('playerpanel') ?>" class="theme-btn btn-style-two"><span class="btn-title">Player Panel</span></a>
						<?php
						}
						?>
					</div>
				</div>  
			</div>
		</div>
		<div class="slide-item">
			<div class="image-layer" style="background-image:url('base/gamon/images/img_slide/2.jpg')"></div>
			<div class="auto-container">
				<div class="content-box">
					<h2>XBAN Origin Private Server</h2>
					<div class="btn-box">
						<?php
						if (empty($_SESSION['uid']))
						{
						?>
							<a href="<?php echo base_url('register') ?>" class="theme-btn btn-style-two"><span class="btn-title">Register</span></a>
							<a href="<?php echo base_url('login') ?>" class="theme-btn btn-style-two"><span class="btn-title">Login</span></a>
						<?php
						}
						if (!empty($_SESSION['uid']))
						{
						?>
							<a href="<?php echo base_url('playerpanel') ?>" class="theme-btn btn-style-two"><span class="btn-title">Player Panel</span></a>
						<?php
						}
						?>
					</div>
				</div>  
			</div>
		</div>
		<div class="slide-item">
			<div class="image-layer" style="background-image:url('base/gamon/images/img_slide/2.jpg')"></div>
			<div class="auto-container">
				<div class="content-box">
					<h2>XBAN Origin Private Server</h2>
					<div class="btn-box">
						<?php
						if (empty($_SESSION['uid']))
						{
						?>
							<a href="<?php echo base_url('register') ?>" class="theme-btn btn-style-two"><span class="btn-title">Register</span></a>
							<a href="<?php echo base_url('login') ?>" class="theme-btn btn-style-two"><span class="btn-title">Login</span></a>
						<?php
						}
						if (!empty($_SESSION['uid']))
						{
						?>
							<a href="<?php echo base_url('playerpanel') ?>" class="theme-btn btn-style-two"><span class="btn-title">Player Panel</span></a>
						<?php
						}
						?>
					</div>
				</div>  
			</div>
	</div>
</section>
<!--End Banner Section -->

<!-- Welcome Section -->
<section class="welcome-section">
	<div class="auto-container">
		<!-- Sec Title -->
		<div class="sec-title centered">
			<h2>About XBAN Origin</h2>
		</div>
		
		<div class="row clearfix">
			<!--Default Portfolio Item-->
			<div class="default-portfolio-item col-lg-4 col-md-4 col-sm-12 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
				<div class="inner-box hvr-bob">
					<figure class="image-box"><img src="<?php echo base_url() ?>base/gamon/images/gallery/1.jpg" alt=""></figure>
					<!--Overlay Box-->
					<div class="overlay-box">
						<div class="overlay-inner">
							<div class="content">
								<h3><a href="#">XBAN ORIGIN</a></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!--Default Portfolio Item-->
			<div class="default-portfolio-item col-lg-4 col-md-4 col-sm-12 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
				<div class="inner-box hvr-bob">
					<figure class="image-box"><img src="<?php echo base_url() ?>base/gamon/images/gallery/2.jpg" alt=""></figure>
					<!--Overlay Box-->
					<div class="overlay-box">
						<div class="overlay-inner">
							<div class="content">
								<h3><a href="#">XBAN ORIGIN</a></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!--Default Portfolio Item-->
			<div class="default-portfolio-item col-lg-4 col-md-4 col-sm-12 wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
				<div class="inner-box hvr-bob">
					<figure class="image-box"><img src="<?php echo base_url() ?>base/gamon/images/gallery/3.jpg" alt=""></figure>
					<!--Overlay Box-->
					<div class="overlay-box">
						<div class="overlay-inner">
							<div class="content">
								<h3><a href="#">XBAN ORIGIN</a></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
		<!-- Lower Box -->
		<div class="lower-box">
			<div class="text">XBAN Origin Is Newest Private Of <a href="https://pointblank.id" target="_blank">PointBlank</a>. Based On GarenaPBID Patch, XBAN Origin Looks More Elegant With New UI, Less Hardware Usage, And Much More.</div>
		</div>
		
	</div>
</section>
<!-- End Welcome Section -->
<!-- Matches Section -->
<section class="matches-section">
	<div class="auto-container">
		<!-- Sec Title -->
		<div class="sec-title centered">
			<h2>Best #10 Players & Clans</h2>
		</div>
		
		<!-- Matches Info Tabs-->
		<div class="matches-info-tabs">
			<!-- Matches Tabs-->
			<div class="matches-tabs tabs-box">
			
				<!--Tab Btns-->
				<ul class="tab-btns tab-buttons clearfix">
					<li data-tab="#players" class="tab-btn active-btn"><span>Players</span></li>
					<li data-tab="#clans" class="tab-btn"><span>Clans</span></li>
				</ul>
				
				<!--Tabs Container-->
				<div class="tabs-content">
					
					<!--Tab / Active Tab-->
					<div class="tab active-tab" id="players">
						<div class="content">
							<table class="table table-borderless table-hover text-center text-white">
								<thead>
									<th width="10%">POS</th>
									<th width="10%">RANK</th>
									<th>NICKNAME</th>
									<th width="15%">TOTAL EXP</th>
								</thead>
								<tbody>
									<?php if ($bestplayers != null) : ?>
										<?php $num = 1; foreach ($bestplayers as $row) : ?>
											<tr>
												<td>
													<?php if ($num == 1) : ?>
														<span class="text-warning">1</span>
													<?php endif; ?>
													<?php if ($num == 2) : ?>
														<span class="text-primary">2</span>
													<?php endif; ?>
													<?php if ($num == 3) : ?>
														<span class="text-success">3</span>
													<?php endif; ?>
													<?php if ($num != 1 && $num != 2 && $num != 3) : ?>
														<span><?php echo $num ?></span>
													<?php endif; ?>
												</td>
												<td><img src="<?php echo base_url() ?>base/gamon/images/img_rank/<?php echo $row['rank'] ?>.gif" alt="<?php echo $row['rank'] ?>"></td>
												<td><?php echo $row['player_name'] ?></td>
												<td><?php echo number_format($row['exp'], '0',',','.') ?></td>
											</tr>
										<?php $num++; endforeach; ?>
									<?php endif; ?>
									<?php if ($bestplayers == null) : ?>
										<tr>
											<td colspan="4">Players Data Not Found</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
					
					<!--Tab-->
					<div class="tab" id="clans">
						<div class="content">
							<table class="table table-borderless table-hover text-center text-white">
								<thead>
									<th width="10%">POS</th>
									<th width="10%">RANK</th>
									<th>NICKNAME</th>
									<th width="15%">TOTAL EXP</th>
								</thead>
								<tbody>
									<?php if ($bestclans != null) : ?>
										<?php $num = 1; foreach ($bestclans as $row) : ?>
											<tr>
												<td>
													<?php if ($num == 1) : ?>
														<span class="text-warning">1</span>
													<?php endif; ?>
													<?php if ($num == 2) : ?>
														<span class="text-primary">2</span>
													<?php endif; ?>
													<?php if ($num == 3) : ?>
														<span class="text-success">3</span>
													<?php endif; ?>
													<?php if ($num != 1 && $num != 2 && $num != 3) : ?>
														<span><?php echo $num ?></span>
													<?php endif; ?>
												</td>
												<td><img src="<?php echo base_url() ?>base/gamon/images/img_clan/<?php echo $row['clan_rank'] ?>.jpg" alt="<?php echo $row['clan_rank'] ?>"></td>
												<td><?php echo $row['clan_name'] ?></td>
												<td><?php echo number_format($row['clan_exp'], '0',',','.') ?></td>
											</tr>
										<?php $num++; endforeach; ?>
									<?php endif; ?>
									<?php if ($bestclans == null) : ?>
										<tr>
											<td colspan="4">Players Data Not Found</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Matches Section -->

<!-- Questions Section -->
<section class="questions-section">
	<div class="auto-container">
		<!-- Sec Title -->
		<div class="sec-title centered">
			<div class="title">General Asked Questions</div>
			<h2>Question & Answers</h2>
		</div>
		
		<!-- Inner Container -->
		<div class="inner-container">
			<div class="row clearfix">
				
				<!-- Question Block -->
				<div class="question-block col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box">
						<div class="icon-box">
							<span class="icon flaticon-question"></span>
						</div>
						<h3><a href="#">How to download the game?</a></h3>
						<div class="text">To download the game, you must be click download menu and select client download. or click <a href="javascript:void(0)">here</a></div>
					</div>
				</div>
				
				<!-- Question Block -->
				<div class="question-block col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box">
						<div class="icon-box">
							<span class="icon flaticon-question"></span>
						</div>
						<h3><a href="#">Is there any age restrictions?</a></h3>
						<div class="text">To play this game, you must be 13 or older. we not reclaim if any case happens during play the game</div>
					</div>
				</div>
				
				<!-- Question Block -->
				<div class="question-block col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box">
						<div class="icon-box">
							<span class="icon flaticon-question"></span>
						</div>
						<h3><a href="#">how to become a vip player?</a></h3>
						<div class="text">you must recharge or ask to staff for getting vip status, or join the weekly events.</div>
					</div>
				</div>
				
				<!-- Question Block -->
				<div class="question-block col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box">
						<div class="icon-box">
							<span class="icon flaticon-question"></span>
						</div>
						<h3><a href="#">Is there any reward for winners?</a></h3>
						<div class="text">On every events services, we always surprize you with big rewards. just follow the rules and win your prize.</div>
					</div>
				</div>
				
			</div>
		</div>
		
	</div>
</section>

<!-- News Section -->
<section class="news-section">
	<div class="auto-container">
		<!-- Sec Title -->
		<div class="sec-title centered">
			<h2>Latest News</h2>
		</div>
		
		<div class="row clearfix justify-content-center">
			<?php foreach ($quickslide as $row) : ?>
				<div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
					<div class="inner-box hvr-bob">
						<div class="image">
							<a href="javascript:void(0)"><img src="<?php echo base_url() ?>base/gamon/images/resource/news-1.jpg" alt=""></a>
						</div>
						<div class="lower-content">
							<div class="post-date"><?php echo $row['quickslide_date'] ?></div>
							<h3><a href="javascript:void(0)"><?php echo $row['quickslide_title'] ?></a></h3>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!-- End News Section -->

<!--Sponsors Section-->
<section class="sponsors-section" style="border-top: none;">
	<div class="auto-container">
		
		<div class="sec-title centered">
			<h2>SPONSORS</h2>
		</div>
		<div class="sponsors-outer">
			<!--Sponsors Carousel-->
			<ul class="sponsors-carousel owl-carousel owl-theme">
				<li class="slide-item">
					<figure class="image-box">
						<a href="#">
							<img src="<?php echo base_url() ?>base/gamon/images/clients/5.png" alt="">
						</a>
					</figure>
				</li>
				<li class="slide-item">
					<figure class="image-box">
						<a href="#">
							<img src="<?php echo base_url() ?>base/gamon/images/clients/5.png" alt="">
						</a>
					</figure>
				</li>
				<li class="slide-item">
					<figure class="image-box">
						<a href="#">
							<img src="<?php echo base_url() ?>base/gamon/images/clients/5.png" alt="">
						</a>
					</figure>
				</li>
				<li class="slide-item">
					<figure class="image-box">
						<a href="#">
							<img src="<?php echo base_url() ?>base/gamon/images/clients/5.png" alt="">
						</a>
					</figure>
				</li>
				<li class="slide-item">
					<figure class="image-box">
						<a href="#">
							<img src="<?php echo base_url() ?>base/gamon/images/clients/5.png" alt="">
						</a>
					</figure>
				</li>
			</ul>
		</div>
		
	</div>
</section>
<!--End Sponsors Section-->