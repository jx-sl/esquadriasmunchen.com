/*
* 
* Jx Solucoes
* www.jxsolucoes.com.br
* (51) 9665 5842
* julio.fg1986@gmail.com
* 
*/


function setCurrent(){
	var url = $('body').attr('id');
	$('nav a[href="'+url+'"]').addClass('active').removeAttr("href");
}
	
$(function(){
	setCurrent();	
	$('button.btn').click(function() {
		window.location = $(this).attr('name');
	});
			
});