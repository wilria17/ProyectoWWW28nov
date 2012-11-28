<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Sitio Web Univalle Music</title>
        <link rel="stylesheet" type="text/css" href="http://blogdisemucho.blogcindario.com/ficheros/buttons.css" />
        <script type="text/javascript" src="vistas/js/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="vistas/js/utilidades.js"></script>
        <script type="text/javascript" src="vistas/js/ajax.js"></script>
        <script type="text/javascript" src="vistas/js/jquery.min.js"></script>
        <script type="text/javascript" src="vistas/js/jquery.mousewheel.js"></script>
        <script type="text/javascript" src="vistas/js/jScrollPane.js"></script>
        <script src="vistas/js/jqueryAudio.js" type="text/javascript"></script>
        <script src="vistas/js/audio.js" type="text/javascript"></script>
        <script type="text/javascript" src="vistas/js/jquery.min.js"></script>
        <script src="vistas/js/jquery.uploadify.min.js" type="text/javascript"></script>

        <link rel="stylesheet" type="text/css" href="vistas/css/uploadify.css">
        <link href="vistas/css/estilo.css" rel="stylesheet" type="text/css">

 <script type="text/javascript">
 ejecutarLista();
 </script>

        <script type="text/javascript">
            function oculta(esconder,visualizar,boton) 
            {
                if(boton=='btnMostrarRegistroU')
                {
                    var btnShow='btnLista';
                        
                }
                else{
                    btnShow='btnMostrarRegistroU';
                        
                        
                }
                ///// capturamos el elemento
                item=$("#"+esconder);
                item2=$("#"+visualizar);
                document.getElementById(boton).disabled = true;
                document.getElementById(btnShow).disabled = false;
                

                
                ///// verificamos su estado
                if(!$(item).hasClass('visible') && !$(item2).hasClass('visible')) 
                {
                   
                    
                    $(item2).removeClass('invisible');
                    $(item2).addClass('visible');
                    $(item2).slideDown('fast');
                    
                } 
                else if(!$(item).hasClass('invisible') && (!$(item2).hasClass('visible')))
                {

                    $(item2).css("display", "block");
                    $(item).css("display", "none");
                   
                    
                }
                
                else if(!$(item).hasClass('visible') && (item2).hasClass('invisible')) 
                {
                    
                    $(item).removeClass('visible');
                    $(item).addClass('invisible');
                    $(item).slideDown('fast');
                    $(item2).css("display", "block");
                    $(item).css("display", "none");
                 
                    
                    
                }
                else if(!$(item).hasClass('visible'))
                {
                 
                      
                    $(item).removeClass('invisible');
                    $(item).addClass('visible');
                    $(item).slideDown('fast');
                    $(item2).removeClass('visible');
                    $(item2).addClass('invisible');
                    $(item2).slideDown('fast');
                    $(item2).css("display", "block");
                    $(item).css("display", "none");
                  
                        
                }
                else if(!$(item).hasClass('invisible'))
                {
                 
                      
                    $(item2).removeClass('invisible');
                    $(item2).addClass('visible');
                    $(item2).slideDown('fast');
                    $(item).removeClass('visible');
                    $(item).addClass('invisible');
                    $(item).slideDown('fast');
                    $(item2).css("display", "block");
                    $(item).css("display", "none");
                   
                        
                }
               
                else{
                    
                   
                }
                
            }
        
    
        </script>





        <script type="text/javascript">
            $(document).ready(function(){
	
                $(".menu h3").eq(2).addClass("active");
                $(".menu p").eq(2).show();

                $(".menu h3").click(function(){
                    $(this).next("p").slideToggle("fast")
                    .siblings("p:visible").slideUp("fast");
                    $(this).toggleClass("active");
                    $(this).siblings("h3").removeClass("active");
                });

            });
        </script>







    </head>
    <body>


        <header>
            <img src="vistas/images/logo_1.png" width="170" height="90"/>

            <span id="bienvenida" style="
                  text-shadow: 1px 1px white, -1px -1px #333;
                  /*background-color: #ddd;*/
                  color: #ddd;
                  padding: 10px;
                  font-size: 36px;
                  margin-left: 4%;


                  ">BIENVENIDOS A UNIVALLE MUSIC  </span>
            <form action="Interfaces/usuarioInterface.php" method="POST">
                <div id="logueo">
                    <table>
                        <tr>

                            <th><span style="color: white;">Usuario:</span></th><th> <input name="id"  placeholder="nombre usuario"  required="true"/> </th>
                        </tr> 
                        <tr>
                            <th><span style="color: white;">Password:</span></th><th><input type="password" name="pass"  placeholder="digite su password" required="true"/></th>
                        </tr>


                    </table>

                    <input  type="submit" value="Ingresar" style="margin-left: 24%;" class="button" name="accion" />
                    <input   value="Registrar" style="margin-left: 2%;" class="button" onclick="mostrarElemento('registrarUsuario')"/>


                </div>
            </form>


        </header>









        <div class="menu">
            <a id="m2"  class="button orange glossy" name="dr5" onclick="mostrarElemento('listaReproduccion')">Música de Muestra</a>
            

        </div>



        <div id="principal">
            <div id="busquedaCanciones">

                <h2>Busqueda de Canciones</h2>
                <input type=search autofocus placeholder="busqueda de canciones" class="input" name=“busqueda”>
                <button type="button" class="button" draggable="true">Buscar</button>


            </div>

            <div id="resultados">


                <script type="text/javascript" language="javascript">
  
                    var nodo = document.getElementById('dr5');
                    nodo.setAttribute('data-icon', '☯');
                    var nodo2 = document.getElementById('m2');
                    nodo.setAttribute('data-icon', '♫');

                </script>


                <div id="listaReproduccion"  >

              <audio  preload="auto" ></audio>

                    <ol>

                        <li><a href="#" data-src="music/1.mp3">song one</a></li>
                        <li><a href="#" data-src="music/2.mp3">song two</a></li>
                        <li><a href="#" data-src="music/3.mp3">song three</a></li>
                        <li><a href="#" data-src="music/4.mp3">song four</a></li>
                        <li><a href="#" data-src="music/5.mp3">song five</a></li>
                        <li><a href="#" data-src="music/66.mp3">song six</a></li>
                        <li><a href="#" data-src="music/77.mp3">song seven</a></li>
                        <li><a href="#" data-src="music/8.mp3">song eight</a></li>
                        <li><a href="#" data-src="http://eisc.univalle.edu.co/~anfepera/depredador.mp3">Song anfepera </a></li>
                 </ol>


                </div>

               
               

            </div>
            
             <div id="registrarUsuario">
                    <h2> Registrar Usuario</h2>
                    <form id="formulario2" action="Interfaces/usuarioInterface.php" method="POST">
                    <table>
                        <tr>

                            <th><span style="color: white;">login</span></th><th> <input name="login" id="login" placeholder="nombre usuario" required="true" onkeyup="metodoAjax()"/> </th><th><span id="mensaje" style="color: white;"></span></th>
                        </tr>
                        <tr>
                            <th><span style="color: white;">Password</span></th><th><input type="password"  name="password" id="password" required="true" placeholder="digite su password"/></th><th></th>
                        </tr>
                        <tr>
                            <th><span style="color: white;">Confirmar password</span></th><th><input type="password" name="password2" id="password2" required="true" placeholder="digite su password" onkeyup="verificarPassword()"/></th><th><span id="mensajePassword2" style="color: white;"></th>
                        </tr>
                        <tr>

                            <th><span style="color: white;">Nombres</span></th><th> <input name="nombres" id="nombres" required="true" placeholder="Nombres" /> </th><th></th>
                        </tr> 
                        <tr>
                            <th><span style="color: white;">Apellidos</span></th><th><input  name="apellidos" id="apellidos" required="true" placeholder="apellidos"/></th><th></th>
                        </tr>
                       
                        <tr>
                            <th><span style="color: white;">Correo</span></th><th><input type="email" name="correo" id="correo" required="true" placeholder="correo electronico"/></th><th></th>
                        </tr>



                    </table>
                        <input  id="btnRegistrar" type="submit" value="registrar" style="margin-left: 24%;" class="button" name="accion" disabled="true"/> 
                    </form>



                </div>
             <div id="error">
                    
                    <h3 style="color: #f41412; font-size: 30px; margin-left: 30%; margin-top:10%;  width: 37%"> Error al autenticar, por favor digite de nuevo el nombre de usuario y la contraseña </h3>
                    
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
            'uploader' : 'ScripsUpload/uploadify.php'
        });
    });
        </script>
    </body>






</html>

