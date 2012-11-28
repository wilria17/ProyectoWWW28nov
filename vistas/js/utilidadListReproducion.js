var datos_para_insertar;
var datos_para_consultar;
var datos_para_modificar;
var datos_para_cargar_listas;
var datos_para_agre_canc_a_lista;
var datos_para_canc_por_lista;

var opcion=0;

function enviar(ruta_archivo, str_datos)
{
//    alert('entra a enviar');
    $.ajax({
            async:true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url:ruta_archivo,
            data:str_datos,
            beforeSend:previoEnvio,
            success:recibirDatos,
            timeout:1000,
            error:errores
        }); 
        return false;
        
}

function recibirDatos(datos)
{
   if(opcion==1){
        datos_para_insertar = eval(datos);
        alert(datos_para_insertar);
    }else if(opcion==2){
        datos_para_consultar = eval(datos);
    }else if(opcion==3){
        datos_para_modificar = eval(datos);
    }else if(opcion==4){
        datos_para_cargar_listas = eval(datos);
    }else if(opcion==5){
        datos_para_agre_canc_a_lista = eval(datos);
//        alert(datos_para_agre_canc_a_lista);
    }else if(opcion==6){
        datos_para_canc_por_lista = eval(datos);
//        alert(datos_para_canc_por_lista);
    }
}

function errores()
{
    alert('Error al realizar la operacion');
}

function previoEnvio()
{
//    alert('iniciando el envio delos datos');
}

function insertarLista(id_coleccion, nombre, ruta_imagen)
{
    opcion=1;
    var url = "../Interfaces/listaReproduccionInterface.php";
    var datos_a_enviar = "opcion=1&id_coleccion="+id_coleccion+"&nombre="+nombre+'&ruta_imagen='+ruta_imagen;
//    alert(url+': '+ datos_a_enviar);
    var x;
    x=$(document);
    x.ready(enviar(url, datos_a_enviar));
}

function consultarLista(id_coleccion, nombre)
{
    opcion=2;
    var url = "../Interfaces/listaReproduccionInterface.php";
    var datos_a_enviar = "opcion=1&nombre="+nombre+'&ruta_imagen='+ruta_imagen;
    var x;
    x=$(document);
    x.ready(enviar(url, datos_a_enviar));
    return datos_para_consultar;
}

function modificarLista()
{
    opcion=3;
}

function cargarListas()
{
    opcion=4;
    var url = "../Interfaces/listaReproduccionInterface.php";
    var datos_a_enviar = "opcion=3";
    var x;
    x=$(document);
    x.ready(enviar(url, datos_a_enviar));
    return datos_para_cargar_listas;
}

function agregarCancionAListaRep(id_coleccion, nombre_lista, id_cancion)
{
    opcion=5;
    alert('entro a la funcion');
    var url = "../Interfaces/listaReproduccionInterface.php";
    var datos_a_enviar = "opcion=5&id_coleccion="+id_coleccion+"&nombre_lista="+nombre_lista+"&id_cancion="+id_cancion;
    var x;
    x=$(document);
    x.ready(enviar(url, datos_a_enviar));
    return datos_para_agre_canc_a_lista;
}

function cancionesPorLista(id_coleccion)
{
    opcion=6;
    var url = "../Interfaces/listaReproduccionInterface.php";
    var datos_a_enviar = "opcion=6&id_coleccion="+id_coleccion;
    var x;
    x=$(document);
    x.ready(enviar(url, datos_a_enviar));
    return datos_para_canc_por_lista;
}