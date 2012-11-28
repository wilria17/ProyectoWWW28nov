<?
include ('../Interfaces/seguridad.php');
?>
<!DOCTYPE HTML>

<html>
    <head>
        <?php
        header("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
        header("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
        header("Pragma: no-cache");
        ?>


        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Sitio Web Univalle Music</title>
        <link rel="stylesheet" type="text/css" href="http://blogdisemucho.blogcindario.com/ficheros/buttons.css" />

        <!--Scripts relacionados con subida de canciones -->
        <script type="text/javascript" src="js/utilidadListReproducion.js"></script>
        <script type='text/javascript' src='js/binaryajax.js'></script>
        <script type='text/javascript' src='js/id3.js'></script>
        <link href="css/styleUpload.css" rel="stylesheet" type="text/css" />

        <!--Scripts relacionados con la gestion de listas de reproduccion -->
        <script type="text/javascript" src="js/utilidadCancion.js"></script>

        <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script src="js/utilidades.js" type="text/javascript"></script>
        <script src="js/jquery.alerts.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>

        <script src="js/jqueryAudio.js" type="text/javascript"></script>
        <script src="js/audio.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script src="js/jquery.uploadify.min.js" type="text/javascript"></script>



        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/jquery.jcarousel.min.js" type="text/javascript"></script>
        <script src="js/cufon-yui.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
        <script src="js/ChunkFive_400.font.js" type="text/javascript"></script>
        <script src="js/utilidades.js" type="text/javascript"></script>

        <script src="js/ajax.js" type="text/javascript"></script>        <link href="css/estilo.css" rel="stylesheet" type="text/css">
        <link href="css/jquery.alerts.css" rel="stylesheet" type="text/css">

        <script type="text/javascript">
            $(document).ready(function(){
	
                $(".menu h3").eq(2).addClass("active");
                $(".menu p").eq(2).show();
                $(".menu div").eq(2).show();

                $(".menu h3").click(function(){
                    $(this).next("p").slideToggle("slow")
                    .siblings("p:visible").slideUp("slow")
                    .siblings("div:visible").slideUp("slow");
                    
                    $(this).next("div").slideToggle("slow")
                    .siblings("p:visible").slideUp("slow");
                    
                    $(this).toggleClass("active");
                    $(this).siblings("h3").removeClass("active");
                });

            });
        </script>


    </head>
    <body>
        <header>
            <img src="images/logo_1.png" width="170" height="90"/>


            <span id="bienvenida" style="
                  text-shadow: 1px 1px white, -1px -1px #333;
                  /*background-color: #ddd;*/
                  color: #ddd;
                  padding: 10px;
                  font-size: 180%;
                  margin-left: 10%;


                  ">BIENVENIDOS A UNIVALLE MUSIC  </span>
            <div id="logueo">
                <table>
                    <tr>

                        <th><span style="color: white; margin-left: 70%;">Usuario:</span></th><th> <span style="color : #3366ff; margin-left: 70%;"> <?
        session_start();
        echo $_SESSION['login'];
        ?></span> </th>
                    </tr> 



                </table>

                <a href="../Interfaces/Cerrar.php" style="margin-left: 30%;" id="dr5" class="button blue skew" name="dr5">Salir</a> 


            </div>


        </header>

        <div class="menu">
            <h3>Subir una Cancion</h3>
            <div>
                <form action="ajaxupload/upload.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();">
                    <p id="f1_upload_process">Loading...<br/><img src="images/loader.gif" /><br/></p>
                    <div id="f1_upload_form" align="center"><br/>
                        <label>File:  
                            <input name="myfile" type="file" size="30" />
                        </label>
                        <label>
                            <input type="submit" name="submitBtn" class="sbtn" value="Subir archivo" />
                        </label>
                    </div>
                    <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
                </form>
                <!--                    -->
                <form action="ajaxupload/upload.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" >
                    <p id="f1_upload_process">Loading...<br/><img src="images/loader.gif" /><br/></p>
                    <p id="f1_upload_form" align="center"><br/>
                        <label>File:  
                            <input name="myfile" type="file" size="30" />
                        </label>
                        <label>
                            <input type="submit" name="submitBtn" class="sbtn" value="Upload" />
                        </label>
                    </p>
                    <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
                </form>
            </div>

            <h3>Biblioteca musical</h3>
            <p id="panelListas">
                <a type="submit" style="width: 80%; background-color: #8dd784" class="button"  onclick="crearListaReproduccion();">Crear lista</a><br> 
                <a type="submit" style="width: 80%;" class="button"  onclick="cargar('Coleccion');">Ver mi coleccion</a>
                <a type="submit" style="width: 80%;" class="button"  onclick="cargar('Mis favoritas');">Ver mis canciones favoritas</a>
                <a type="submit" style="width: 80%;" class="button"  onclick="editarListas();">Editar mis listas de reproduccion</a>
            </p>
            <h3>Organizar por:</h3>
            <p>
                Haz click <a href="javascript:mostrarVentana();">aqu�</a>
                <a type="submit" style="width: 50%;" class="button"  onclick="jAlert('por Genero','Organizar');">Genero</a>
                <a type="submit" style="width: 50%;" class="button"  onclick="jAlert('por Artista','Organizar');">Artista</a>
                <a type="submit" style="width: 50%;" class="button"  onclick="jAlert('por Album','Organizar');">Album</a>

            </p>



            <h3 onclick="mostrarElemento('DatosPersonales')"> Información Personal</h3>
            <p>

            </p>


        </div>



        <div id="principal">

            <div id="reproductor" class="mp_wrapper">

                <div id="mp_content_wrapper" class="mp_content_wrapper">
                </div>
                <div id="mp_player" class="mp_player">
                    <div id="jquery_jplayer"></div>
                    <div class="jp-playlist-player">
                        <div class="jp-interface">
                            <ul class="jp-controls">
                                <li><a href="#" id="jplayer_play" class="jp-play" tabindex="1">play</a></li>
                                <li><a href="#" id="jplayer_pause" class="jp-pause" tabindex="1">pause</a></li>
                                <li><a href="#" id="jplayer_stop" class="jp-stop" tabindex="1">stop</a></li>
                                <li><a href="#" id="jplayer_volume_min" class="jp-volume-min" tabindex="1">min volume</a></li>
                                <li><a href="#" id="jplayer_volume_max" class="jp-volume-max" tabindex="1">max volume</a></li>
                                <li><a href="#" id="jplayer_previous" class="jp-previous" tabindex="1">previous</a></li>
                                <li><a href="#" id="jplayer_next" class="jp-next" tabindex="1">next</a></li>
                                <li><a href="#" id="jplayer_add" class="jp-add" tabindex="1">next</a></li>
                            </ul>
                            <div class="jp-progress">
                                <div id="jplayer_load_bar" class="jp-load-bar">
                                    <div id="jplayer_play_bar" class="jp-play-bar"></div>
                                </div>
                            </div>
                            <div id="jplayer_volume_bar" class="jp-volume-bar">
                                <div id="jplayer_volume_bar_value" class="jp-volume-bar-value"></div>
                            </div>
                            <div id="jplayer_play_time" class="jp-play-time"></div>
                            <div id="jplayer_total_time" class="jp-total-time"></div>
                        </div>
                        <div id="jplayer_playlist" class="jp-playlist"><ul></ul></div>
                    </div>
                </div>
                <ul id="mp_albums" class="mp_albums jcarousel-skin">

                </ul>
            </div>
            <div id="busquedaCanciones">
                <h2>Busqueda de Canciones</h2>
                <input type=search autofocus placeholder="busqueda de canciones" class="input" name=“busqueda”>
                <button type="button" class="button" draggable="true">Buscar</button>


            </div>

            <div id="crearLista">
                <h1>Crear una lista</h1>

                <label> Nombre de la lista</label> <input id="nombreLista" placeholder="introduce el nombre de la lista" /><br><br>
                <label> Elige una imagen</label><br>
                <select name="list_mail" multiple size="4" id="list_images"  onchange="imagenSeleccionada(this);">
                    <option value="1" >imagen1</option>
                    <option value="2" >imagen2</option>
                    <option value="3" >imagen3</option>
                    <option value="4" >imagen4</option>
                    <option value="5" >imagen5</option>
                    <option value="6" >imagen6</option>
                    <option value="7" >imagen7</option>
                    <option value="8" >imagen8</option>
                    <option value="9" >imagen9</option>
                    <option value="11" >imagen10</option>
                    <option value="12" >imagen11</option>
                    <option value="13" >imagen12</option>
                </select><br>
                <div id="imagen">
                    <img src= "images/noDisponible.jpg" width="200" height="150">
                </div>
                <input style="margin-left: 20%;" type="button" value="Crear lista" onclick="verificarLista('123', 'images/listasReproduccion')"/><input style="margin-left: 10%;" type="submit" value="cancelar" onclick="mostrarElemento('reproductor')" />
            </div>

            <div id="resultados">
                <div id="listaReproduccion">
                </div>



            </div>




            <div id="DatosPersonales">
                <h2> Informacion Personal</h2>
                <table>
                    <tr>

                        <th><span style="color: white;">login</span></th><th> <input id="login" class="output" value=<? echo $_SESSION['login'] ?> />  </th>
                    </tr> 

                    <tr>

                        <th><span style="color: white;">Nombres</span></th><th> <input id="nombreUsuario"  class="output" value=<? echo $_SESSION['nombres'] ?> /></th>
                    </tr> 
                    <tr>
                        <th><span style="color: white;">Apellidos</span></th><th><input id="apellidosUsuario" class="output" value=<? echo $_SESSION['apellidos'] ?> /> </th>
                    </tr>

                    <tr>
                        <th><span style="color: white;">Correo</span></th><th><input id="correoUsuario" type="email" class="output" value=<? echo $_SESSION['correo'] ?>/></th>
                    </tr>
                    <tr>
                        <th><span style="color: white;">Fecha de Registro</span></th><th><output id="fechaRegistro" class="output" style="margin-left: -30%" ><? echo $_SESSION['fecha_reg'] ?></output></th>
                    </tr>


                </table>




            </div>
            <div id="miVentana">
                <div id="titulo" >Editar listas de Reproduccion</div>
                <span id="contenidoVentanaModal">

                    al dar clic en <img src= "images/reproductor/addSong.png" width="20" height="20 ">
                    podras agregar canciones a las listas ya creadas, para eliminar canciones de una lista de reproduccion, simplemente das clic en el icono
                    <img src= "images/reproductor/Delete.png " width="20" height="20">
                    <select name="thelist" style="width: 90%; margin-left: 1%;" onChange="combo(this)">
                        <option>Elige una opcion</opcion>
                        <option>list1</opcion>
                        <option>list2</opcion>
                    </select>
                </span>" 
                <div id="botonesModal">
                    <input id="btnAceptar" onclick="ocultarVentana();" name="btnAceptar" size="20" type="button" value="Aceptar" />
                </div>
            </div>  


        </div>






<script type="text/javascript">
     <?php $timestamp = time(); ?>
    $(function() {
        $('#file_upload').uploadify({
            'formData'     : {
                'timestamp' : '<?php echo $timestamp; ?>',
                'token'     : '<?php echo md5('unique_salt' . $timestamp); ?>'
            },
            'swf'      : 'uploadify.swf',
            'uploader' : '../ScripsUpload/uploadify.php'
        });
    });
</script>
    </body>






</html>


