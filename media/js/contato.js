	/*
	 * 
	 * Jx__ Sistema de Administracao de Website
	 * J�lio Griebeler
	 * www.jxsolucoes.com.br
	 * (51) 9665 5842
	 * julio.fg@live.de
	 * 
	 */	


var name, email, phone, subject, message, btn, ret_t, ret_n, ret_e, ret_p, ret_s, ret_m;
var vlName, vlMail, vlPhone, vlSubject, vlMsg;

var init = {
	vars : function(){
		vlName =$("#name");
		vlMail = $("#email");
		vlPhone = $("#phone");
		vlSubject = $("#subject");
		vlMsg = $("#message");	

		name="Nome"; email="E-mail"; phone="Telefone"; subject="Assunto"; message="Mensagem";
		ret_t="Por favor corrija os seguintes erros:\n";
		ret_n="Nome Inválido\n";
		ret_e="E-mail inválido\n";
		ret_p="Telefone Inválido\n";
		ret_s="Assunto Inválido\n";
		ret_m="Mensagem Inválida\n";			
	},
	clicks : function(){
		vlName.click( function(){ if($(this).val()==name) $(this).val(""); });
		vlName.blur( function(){ if($(this).val()=="") $(this).val(name); });
		vlMail.click( function(){ if($(this).val()==email) $(this).val(""); });
		vlMail.blur( function(){ if($(this).val()=="") $(this).val(email); });
		vlPhone.click( function(){ if($(this).val()==phone) $(this).val(""); });
		vlPhone.blur( function(){ if($(this).val()=="") $(this).val(phone); });
		vlSubject.click( function(){ if($(this).val()==subject) $(this).val(""); });
		vlSubject.blur( function(){ if($(this).val()=="") $(this).val(subject); });
		vlMsg.click( function(){ if($(this).val()==message) $(this).val(""); });
		vlMsg.blur( function(){ if($(this).val()=="") $(this).val(message); });			
	},
	formValues : function(){
		vlName.val(name);
		vlMail.val(email);
		vlPhone.val(phone);
		vlSubject.val(subject);
		vlMsg.val(message);			
	}
}
	/* VALIDA O EMAIL */
	function validateEmail(){
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
		if(vlMail.val() == "" || vlMail.val() == email || validateEmail() ){
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
			$("#info").empty().append(ret_t+"<br />" + ret);
			return false;
		}else{
			return true;
		}
	}	
	
	$(function(){
		init.vars();
		init.clicks();
		init.formValues();
	});