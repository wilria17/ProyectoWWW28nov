//document.write("<script type='text/javascript' src='js/jquery-1.8.2.min.js'></script>");
//document.write("<script type='text/javascript' src='js/binaryajax.js'></script>");
//document.write("<script type='text/javascript' src='js/id3.js'></script>");

function leerMetadatos(file) {
    var datosCancion = [];
    function callback() {
        var tags = ID3.getAllTags(file);
        if(ID3.getTag(file, "title")=='undefine' || ID3.getTag(file, "title")==null)
        {
            datosCancion[0] = file;
        }else
        {
            datosCancion[0] = ID3.getTag(file, "title");
        }
        datosCancion[1] = ID3.getTag(file, "artist");
        datosCancion[2] = ID3.getTag(file, "genre");
        datosCancion[3] = ID3.getTag(file, "album");
    };
    ID3.loadTags(file, callback);
//    alert(datosCancion[0]+' '+ datosCancion[1]+' '+ datosCancion[2]+' '+ datosCancion[3]);	
    alert('Datos de la Canción: \n\n    Título: '+ datosCancion[1]+ '\n    Interprete: '+ datosCancion[1]+ '\n    Genero: '+ datosCancion[2]+ '\n    Album: '+ datosCancion[3]);

    return datosCancion;
}

function insertarCancion(file, precio, url, usuario)
{
    var datos = leerMetadatos(file);
    var x;
    x=$(document);
    x.ready(enviar());
    function enviar()
    {
        $.ajax({
            async:true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url:"../Interfaces/cancionInterface.php",
            data:"opcion=1&titulo="+datos[0]+"&interprete="+datos[1]+"&genero="+datos[2]+"&album="+datos[3]+"&precio="+precio+"&url="+url+"&usuario="+usuario,
            beforeSend:inicioEnvio,
            success:llegada,
            timeout:1000,
            error:problemas
        }); 
        return false;
    }
    function inicioEnvio()
    {
        var x=$("#resultados");
        x.html('Cargando...');
    }
    function llegada(datos)
    {
//        alert(datos);
    }
    function problemas()
    {
        alert('problem');
    }
}

//A partir de aquí siguen las funciones relacionadas con la subida del archivos

function startUpload(){
      document.getElementById('f1_upload_process').style.visibility = 'visible';
      document.getElementById('f1_upload_form').style.visibility = 'hidden';
      return true;
}

function stopUpload(success, file, precio, url, usuario){
      var result = '';
      if (success == 1){
         result = '<span class="msg">The file was uploaded successfully!<\/span><br/><br/>';
         insertarCancion(file, precio, url, usuario);
      }
      else 
      {
         result = '<span class="emsg">There was an error during file upload!<\/span><br/><br/>';
      }
      document.getElementById('f1_upload_process').style.visibility = 'hidden';
      document.getElementById('f1_upload_form').innerHTML = result + '<label>File: <input name="myfile" type="file" size="30" /><\/label><label><input type="submit" name="submitBtn" class="sbtn" value="Upload" /><\/label>';
      document.getElementById('f1_upload_form').style.visibility = 'visible'; 
      return true;   
}

function consultarCancion(id_cancion)
{
    var datos_recib = [];
    var x;
    x=$(document);
    x.ready(enviar());
    function enviar()
    {
        $.ajax({
            async:true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url:"../Interfaces/cancionInterface.php",
            data:"opcion=2&id="+id_cancion,
            beforeSend:inicioEnvio,
            success:llegada,
            timeout:1000,
            error:problemas
        }); 
        return false;
    }
    function inicioEnvio()
    {
        var x=$("#resultados");
        x.html('Cargando...');
    }
    function llegada(datos)
    {
        datos_recib = eval(datos);
        //alert(datos_recib[0]);
     }
    function problemas()
    {
        alert('problem');
    }
}

function listarCanciones()
{   
//    alert('entra a listarCanciones');
    var datos_recib = [];
    var x;
    x=$(document);
    x.ready(enviar);
    function enviar()
    {
//        alert('entra a enviar');
        $.ajax({
            async:true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url:"../Interfaces/cancionInterface.php",
            data:"opcion=3",
            beforeSend:inicioEnvio,
            success:llegada,
            timeout:1000,
            error:problemas
        }); 
        return false;
    }
    function inicioEnvio()
    {
        var x=$("#resultados");
        x.html('Cargando...');
    }
    function llegada(datos)
    {
//        alert('entra a llegada');
        datos_recib = eval(datos);
//        alert(datos_recib);
      }
    function problemas()
    {
        alert('Problema al listar las canciones');
    }
    alert('Se ha cargado toda su colección');
//    alert(datos_recib);
    return datos_recib;
}