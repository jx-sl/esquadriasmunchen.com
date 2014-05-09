/*
 * 
 * Jx Soluoces
 * www.jxsolucoes.com.br
 * (51) 9665 5842
 * 
 */
	$(function(){
		if($("body").attr("id")){
			ws($("body").attr("id"), new Array("id","nome","imagem"));
		}
		
	});
	

	function ws(page, teste) {
        $.post("includes/teste.php",
        	{nome: page, email: "julio.fg@live.de", telefone: "96655842"},
    		function(data){
    			$("#teste").html(data);
             }
        );

	};