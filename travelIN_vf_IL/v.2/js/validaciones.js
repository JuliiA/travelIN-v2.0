// JavaScript Document
debugger;
$("#login").validate({
    rules: 
	{
	  email: {
        required: true,
	  },
	  password:{
		  required: true,
		}
	},//end rules
    messages: 
	{
      nombre: {
        lettersonly: "Escribe sólo letras"
      }
	},
	submitHandler: function() {
      alert("Login exitoso");
    }
  });