
function loadDoc(){
  var usuario=document.getElementById("user").value;
  var clave=document.getElementById("pass").value;

  var xhttp = new XMLHttpRequest();
  var params= JSON.stringify({
    "correo": usuario,
    "contrasena":clave
  });
 
  xhttp.onreadystatechange = function(){
   
    
    if(this.readyState == 4  && this.status==200){
      
      console.log(this.responseText);
      var array = JSON.parse(this.responseText);
      if(array.login =="Correcto"){
        alert("Datos correctamente ingresados");
        document.getElementById("form").submit(); 
      }else{
        alert(array.login);
      }
        }
  };

  xhttp.open("POST","http://localhost/api.mvc/usuario/login",true);
  
  xhttp.send(params);
 
}


