


$("#frmAcceso").on('submit',function(e)
{
	e.preventDefault();
    logina=$("#logina").val();//declaramos variable javascripts
    clavea=$("#clavea").val();//varable javascripts almacena lo q el usuario escriba de clave
//declaramos una funcion utlizando el metodo post el cual le enviamos los parametros y a la variable op le enviaremos verificar y lo almacenamos en data
    $.post("../ajax/usuario.php?op=verificar",
        {"logina":logina,"clavea":clavea},
        function(data)
    {
        if (data!="null")//si el objeto data es difernte de null devuelve datos va a redireccionar a categiria.php y si no a recibido datos se enviara un mensaje de alerta con datos incorrectos
        {
            $(location).attr("href","categoria.php");            
        }
        else
        {
            bootbox.alert("Usuario y/o Password incorrectos");//mensaje de alerta
        }
    });
})