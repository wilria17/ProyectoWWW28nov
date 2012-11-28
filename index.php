<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Sitio Web Univalle Music</title>
        <link rel="stylesheet" type="text/css" href="http://blogdisemucho.blogcindario.com/ficheros/buttons.css" />

        <link rel="stylesheet" href="vistas/css/style.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="vistas/css/skin.css" type="text/css" media="screen"/>
        <link href="vistas/css/jplayer.codrops.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="vistas/js/jquery.min.js"></script>
        <script src="vistas/js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="vistas/js/jquery.jcarousel.min.js" type="text/javascript"></script>
        <script src="vistas/js/cufon-yui.js" type="text/javascript"></script>
        <script type="text/javascript" src="vistas/js/jquery.jplayer.min.js"></script>
        <script src="vistas/js/ChunkFive_400.font.js" type="text/javascript"></script>
        <script src="vistas/js/utilidades.js" type="text/javascript"></script>
        <script src="vistas/js/ajax.js" type="text/javascript"></script>




        <link href="vistas/css/estilo.css" rel="stylesheet" type="text/css"> 


        <style>
            .reference{
                font-family:Arial;
                position:relative;
                width:100%;
                font-size:12px;
                text-transform:uppercase;
                text-align:center;
            }
            .reference a{
                color:#f9f9f9;
                text-decoration:none;
                margin-right:20px;
            }
        </style>

        <script>
            
        </script>

        <script type="text/javascript">
            Cufon.replace('h2,h3,a',{
                textShadow: '1px 1px 1px #000000'
            });
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



          


            </div>
        </div>






    </body>






</html>

