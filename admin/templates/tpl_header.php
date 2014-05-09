					<h1><a class="sprite" href="" title="Clique para voltar ao Menu Inicial">München Esquadrias</a></h1>
					<nav>
						<?php
							$menu_out = "";
							$logado=false;
							if(isset($_SESSION['jx-user']) && isset($_SESSION['jx-pass'])){
								$logado=true;;
							}
							if(isset($itens_menu)){
								for ($i = 0; $i < count($itens_menu); $i++)
									$menu_out .= '<a href="'.$itens_menu[$i].'">'.ucfirst(str_replace("_", " ", $itens_menu[$i])).'</a>';
							}
							if($logado) print '<a href="home"><strong>MENU INICIAL</strong></a>';
							print $menu_out;
							if($logado) print '<a href="includes/logout.php">Sair</a>';
						?>
						<a href="http://esquadriasmunchen.com">Ir para o Site</a>
					</nav>