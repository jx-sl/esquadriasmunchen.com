<?php

$page_title = "Contato";
$page_id = "contato";
$ret_msg = "";
//$extra_js = '<script src="media/js/contato.js"></script>';

if(isset($_GET['ok']))
	$ret_msg = "<div id=\"error-message\" class=\"alert alert-success\">Mensagem Enviada com Sucesso.</div>";
if(isset($_GET['e']))
	$ret_msg = "<div id=\"error-message\" class=\"alert alert-error\">Erro ao enviar Mensagem. Tente Novamente!<br>Se o problema persistir, contate o administrador.</div>";


$content_sidebar = '<h3>München Esquadrias</h3>
					<h4>Rodovia RS 122 - km 36<br>
					Piedade - Bom Princípio - RS<br>
					Fone/Fax: (51) 3534 7166<br>
					munchenesquadrias@gmail.com</h4>
					<iframe width="240" height="240" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msa=0&amp;msid=211753147712041253463.0004d349ee48062a256ff&amp;ie=UTF8&amp;t=k&amp;ll=-29.410423,-51.34998&amp;spn=0.002243,0.002586&amp;z=17&amp;output=embed"></iframe>';

$content_main = '			'.$ret_msg.'
							<form name="form" id="form" method="post" action="includes/func/send_email.php">
								<fieldset>
									<legend>
										Deixe sua mensagem através do formulario de contato.<br>
										Em breve retornaremos.
									</legend>
									<div>
										<input type="text" required placeholder="Nome" name="name" id="name">
										<input type="email" required placeholder="E-mail" name="email" id="email">
										<input type="text" required placeholder="Telefone" name="phone" id="phone">
										<input type="text" placeholder="Assunto" name="subject" id="subject">
										<textarea required placeholder="Mensagem" id="message" name="message"></textarea><br>
										<input type="submit" class="btn" id="send-btn" value="enviar">
									</div>
								</fieldset>
							</form>';