<?php
$page_title = "Home";
$page_id = "home";
$page_template = "inicial";
$page_public_title = "Home";

$page_content_banner  = "
							<div id='carousel' class='carousel slide'>
							  <ol class='carousel-indicators'>
							    <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
							    <li data-target='#myCarousel' data-slide-to='1'></li>
							    <li data-target='#myCarousel' data-slide-to='2'></li>
							  </ol>
							  <div class='carousel-inner'>
							    <div class='active item'>		
									<img class='banner_image_up' alt='' src='media/img/bg_banner01.jpg' />
									<div class='carousel-caption'>
										<h4 class='hide'>Tradição e qualidade que garantem conforto e segurança para você e sua família</h4>
									</div>
								</div>
							    <div class='item'>		
									<img class='banner_image_up' alt='' src='media/img/bg_banner02.jpg' />
									<div class='carousel-caption'>
										<h4 class='hide'>Esquadrias produzidas de acordo com a necessidade da sua obra</h4>
									</div>
								</div>
							    <div class='item'>		
									<img class='banner_image_up' alt='' src='media/img/bg_banner03.jpg' />
									<div class='carousel-caption'>
										<h4 class='hide'>Esquadrias com acabamento que destaca e embeleza qualquer ambiente</h4>
									</div>
								</div>
							  </div>
							  <!-- Carousel nav -->
							  <a class='carousel-control left' href='#carousel' data-slide='prev'>&lsaquo;</a>
							  <a class='carousel-control right' href='#carousel' data-slide='next'>&rsaquo;</a>
							</div>
							<script>$('#carousel').carousel();</script>
							";

$page_content_featured = '	<section id="featured" class="row">
								<article class="span4">
									<h3>Empresa</h3>
									<p>A Esquadrias München produz há mais de 40 anos esquadrias de madeira com qualidade, bom gosto...</p>
									<button class="btn" name="empresa">Saiba Mais</button>
								</article>
								<article class="span4">
									<h3>Produtos</h3>
									<p>Produzimos todos tipos de esquadrias de madeira e adequamos o que for necessario à necessidade de sua obra...</p>
									<button class="btn" name="produtos">Saiba Mais</button>
								</article>
								<article class="span4">
									<h3>Obras Realizadas</h3>
									<p>Confira algumas obras com esquadrias produzidas pela München...</p>
									<button class="btn" name="obras">Saiba Mais</button>
								</article>
							</section><br class="clear">';

