	/*
	 * 
	 * Jx__ Sistema de Administracao de Website
	 * Júlio Griebeler
	 * www.jxsolucoes.com.br
	 * (51) 9665 5842
	 * julio.fg@live.de
	 * 
	 */

	var name, email, phone, subject, message, btn, ret_t, ret_n, ret_e, ret_p, ret_m;
	var vlName, vlMail, vlPhone, vlSubject, vlMsg;

		/* VALIDA O EMAIL */
		function validMail(){
			var mailChars = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			var mail = vlMail.val();
			if( mailChars.test( mail ) ){
				return false;
			}else{
				return true;
			}
		}
		
		/* VALIDA OS CAMPOS DO ENVIO */
		function validSend(){
			var error = false;
			var ret = "";
			if(vlName.val() == "" || vlName.val() == name){
				ret += ret_n+"<br />";
				error = true;
			}
			if(vlMail.val() == "" || vlMail.val() == email || validMail() ){
				ret += ret_e+"<br />";
				error = true;
			}
			if(vlPhone.val() == "" || vlPhone.val() == phone){
				ret += ret_p+"<br />";
				error = true;
			}
			if(vlSubject.val() == "" || vlSubject.val() == subject){
				ret += ret_s+"<br />";
				error = true;
			}
			if(vlMsg.val() == "" || vlMsg.val() == message){
				ret += ret_m+"<br />";
				error = true;
			}

			if(error){
				$("#error-message").empty().append(ret_t+"<br />" + ret);
				return false;
			}else{
				return true;
			}
		}
		
		/* INSERE OS VALORES DE VALUE NO FORM */
		function showVal(){
			vlName.val(name);
			vlMail.val(email);
			vlPhone.val(phone);
			vlSubject.val(subject);
			vlMsg.val(message);
		}
		function setCurrent(){
			var url = $('body').attr('id');
			$('nav a[href="'+url+'"]').addClass('active').removeAttr("href");
		}		
		

	$(function(){
		$('a.exclui').click(function() {
			if(confirm("Deseja realmente excluir este item?")) {
				return true;
			} else {
				return false;
			}
		});
		$('#page table tr:odd').addClass('row1');
		$('#page table tr:even').addClass('row2');
	});