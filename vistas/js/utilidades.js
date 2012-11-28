
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var $loginOK=false;
var $passwordOK=false;
var $contador=0;
var $esLista=false;
var $creandoLista=false;
var $listaReproduccion='';
var $list;
var $nuevaLista="";
var $limpiarDivs=0;
var $RutacancionEliminar="";
var $img=-1; 
var $cancionAgregar="";
var $listaParaInsertarCancion="";
var $identificador=0;



function mostrarElemento(elemento)
{
    
    
    var documento=$(document);
    
    documento.ready(mostrar);
    function mostrar()
    {
        
       
        $("#reproductor").css("display", "none");
        $("#crearLista").css("display", "none");
        
        //        $("#principal").css("display", "none");
        //         $("#mp_player").css("display", "none");
        $("#resultados").css("display", "none");
        $("#busquedaCanciones").css("display", "none");
        //        mp_content_wrapper
        //        mp_player
        $("#DatosPersonales").css("display", "none");
        $("#listaReproduccion").css("display", "none");
        $("#registrarUsuario").css("display", "none");
        $("#error").css("display", "none");
        
        var div= $("#"+elemento);
        //        if(elemento=='registrarUsuario')
            
        div.slideDown("low");
        div.css("display", "block");
        
       
        
        
    }
        
}

function verificarLista(id_coleccion, ruta_imagen)
{
    if($("#nombreLista").attr("value")=="" )
    {
      
        jAlert("Debes darle un nombre a la lista de reproducion","Error");

    }
    else if($img == -1)
    {
        jAlert("Debes elegir una iamgen para la lista de reproducion","Error");
    }
      
    else{
        $nuevaLista=$("#nombreLista").attr("value");
        var img = document.getElementById('list_images').options.selectedIndex;
        ruta_imagen = 'images/listasReproduccion/'+parseInt(img+1)+'.jpg';
        insertarLista(id_coleccion, $nuevaLista, ruta_imagen);
        
        var ventanaModal="";
        ventanaModal += "<div id=\"titulo\" >Creacion de la lista de reproduccion exitosa</div>";
        ventanaModal += "<span id=\"contenidoVentanaModal\">Has creado una lista de reproduccion satisfactorimente, ahora podes agregar canciones desde tu coleccion, dando clic en el icono <span><br>";
        ventanaModal += "<img src= \"images/reproductor/addSong.png \" width=\"30\" height=\"30 \">";
        ventanaModal += "<div id=\"botonesModal\">";
        ventanaModal +=  "<input id=\"btnAceptar\" onclick=\"ocultarVentana();\" name=\"btnAceptar\" size=\"20\" type=\"button\" value=\"Aceptar\" /> </div>";
         
        document.getElementById("miVentana").innerHTML=ventanaModal;  
        mostrarVentana();
       
        $esLista=true;
        cargar('Coleccion');
        $("#nombreLista").attr("value")="";
        $img = -1;
          
    }
    
}


function eliminarCancion(constamte)
{
    
    alert(constamte);
    
}


function verificarPassword()
{
    //alert('verificando password...');
    var password=$("#password").attr("value");
    var password2=$("#password2").attr("value");
    if(password != password2)
    {
         $passwordOK=false;
        //alert('Los password no coinciden...');
        document.getElementById('mensajePassword2').textContent = 'Password incorrecto';
        document.getElementById("btnRegistrar").disabled=true;
        $("#mensajePassword2").css("color", "red");
    }
    else{
         $passwordOK=true;
        //alert('Ok...');
        document.getElementById('mensajePassword2').textContent = 'Ok';
        $("#mensajePassword2").css("color", "green");
        if($loginOK)
        document.getElementById("btnRegistrar").disabled=false;
	
    }
}

function mostrarColeccion()
{
    jAlert("No funciona", "Lista de Reproduccion");  
       
        
}


function reproductor() 
{  
   
    /**
     * build the carousel for the Albums
     */
    //         $list.empty();
    $('#mp_albums').jcarousel({
        scroll : 3
    }).children('li')
    .bind('click',function(){
//        jAlert("se va a  mostrar el contenido de una lista de  reproduccion", "Lista de Reproduccion");  
       
        $contador=0;
        //when clicking on an album, display its info, and hide the current one
        var $this = $(this);
        $('#mp_content_wrapper').find('.mp_content:visible')
        .hide();
											
        $('#mp_content_wrapper')
        .find('.mp_content:nth-child('+ parseInt($this.index()+1) +')')
        .fadeIn(1000);
											
    });

    /****  The Player  ****/
    // Local copy of jQuery selectors, for performance.
    var jpPlayTime = $("#jplayer_play_time");
    var jpTotalTime = $("#jplayer_total_time");
    $list 	= $("#jplayer_playlist ul");

    /**
     * Innitialize the Player 
     * (see jPlayer documentation for other options)
     */
    $("#jquery_jplayer").jPlayer({
        oggSupport: true,
        preload	:"auto"
    })
    .jPlayer("onProgressChange", 
        function(loadPercent, playedPercentRelative, playedPercentAbsolute, playedTime, totalTime) {
            jpPlayTime.text($.jPlayer.convertTime(playedTime));
            jpTotalTime.text($.jPlayer.convertTime(totalTime));
        })
    .jPlayer("onSoundComplete", function() {
       
        playListNext();
    });

    /**
     * click previous button, plays previous song
     */
    $("#jplayer_previous").bind('click', function(){
        playListPrev();
        $(this).blur();
        return false;
    });

    /**
     * click next button, plays next song
     */
    $("#jplayer_next").bind('click', function() {
        playListNext();
        $(this).blur();
        return false;
    });

    /**
     * plays song in position i of the list of songs (playlist)
     */
    $("#jplayer_add").bind('click',function()
    {
        jAlert("VAs a crear una nueva lista de reproduccion","Nueva lista");

    });
    
    
   
    function playSong(i){
      
        var $next_song 	= $list.find('li:nth-child('+ i +')');
        var mp3	= $next_song.find('.mp_mp3').html();
        var ogg	= $next_song.find('.mp_ogg').html();
        $list.find('.jplayer_playlist_current').removeClass("jplayer_playlist_current");
        $next_song.find('a').addClass("jplayer_playlist_current");
        $("#jquery_jplayer").jPlayer("setFile", mp3, ogg).jPlayer("play");
    }
    
 
    /**
     * plays the next song in the playlist
     */
    function playListNext() {
       
        //        alert('linea 216');
        var $list_nmb_elems = $list.children().length;
        var $curr 			= $list.find('.jplayer_playlist_current');
        //        alert('lo que hay en $list_nmb_elems   '+$list_nmb_elems);
        var idx				= $curr.parent().index();
        var index 			= (idx < $list_nmb_elems-1) ? idx+1 : 0;
        //        alert('lo que hay en INDEX   '+ index);
        playSong(index+1);
    }

    /**
     * plays the previous song in the playlist
     */
    function playListPrev() {
        //        alert('linea 228');
        var $list_nmb_elems = $list.children().length;
        var $curr 			= $list.find('.jplayer_playlist_current');
        //        alert('lo que hay en $list_nmb_elems   '+$list_nmb_elems);
        var idx				= $curr.parent().index();
        var index 			= (idx-1 >= 0) ? idx-1 : $list_nmb_elems-1;
        //        alert('lo que hay en INDEX   '+ index);
        playSong(index+1);
    }
				
    /**
     * User clicks the play icon on one of the songs listed for an Album.
     * Adds it to the Playlist, and plays it
     */
    function addFirst(song_idx,name,mp3,ogg) { 
        $esLista=false;
        //      
        $list.empty();
        /**
         * each song element in the playlist has:
         * - span for the close / remove action
         * - the mp3 path
         * - the ogg path
         */
        $RutacancionEliminar=mp3;
        var song_html = "<a onclick=\"eliminarCancion('"+mp3+"');\" href='#' class='jplayer_playlist_current' tabindex='1'>" + name + "</a>";
        song_html 	 += "<span></span>";
        song_html 	 += "<div class='mp_mp3' style='display:none;'>"+mp3+"</div>";
        song_html 	 += "<div class='mp_ogg' style='display:none;'>"+ogg+"</div>";
        var $listItem = $("<li/>",{
            id			: song_idx,	
            className	: 'jplayer_playlist_current',
            html 		: song_html
        });
        $list.append($listItem);
        //event to play the song when User clicks on it
        $listItem.find('a').bind('click',clickSong);
        //event to remove the song from the playlist when User clicks the remove button
        $listItem.find('span').bind('click',removeSong);
        //start playing it
        $("#jquery_jplayer").jPlayer("setFile", mp3, ogg).jPlayer("play");
        jpTotalTime.show();
        jpPlayTime.show();
       
    }
    function crearLista() 
    { 
        jConfirm("¿De?", "Crear lista", function(opcion) 
        {  
            if(opcion) 
            {
                jPrompt("Introduce Nombre de la lista", "", "Nombre Lista", function(nombre_lista) 
                {
                    if(nombre_lista=="") 
                    {
                        jAlert("No se pudo crear la lista, debes darle un nombre", "Error");
                        $esLista=false;
                    }
                    else if(nombre_lista==null)
                    {
                        $esLista=false;
                    }
                    else{
//                        insertarLista(nombre_lista, ruta_imagen);
                        jAlert("ahora puedes agregar canciones a esta lista debes dar clic en |+| ", "Agregar canciones a "+$nuevaLista);
                    //                            jAlert("La cancion "+title+" se agrego correctamente a la lista de reproduccion : "+$nuevaLista);
                    //                          $esLista=true;
                    }
                });  
            } 
            else jAlert("No se va a crear la lista","ok");
              
        })
        
        
        if($esLista)
        {
            jConfirm("¿Deseas agregar  la cancion "+title+" a la lista de reproduccion?", "Agregar cancion a "+$nuevaLista, function(r) {  
                if(r) {  
                    jAlert(".... Insertando cancion .....", "Adicionar cancion");  
                } else {  
                    jAlert("La cancion no se agrego", "Mensaje");  
                }  
            });  
            
        
        }
        
      
        $list.empty();
        
    }			
    /**
     * adds a song to the playlist, if not there already.
     * if it is the only one, start playing it
     */
    function addToPlayList(song_idx,name,mp3,ogg) {
        //        $esLista=false;
       
        $RutacancionEliminar=mp3;
        var $list_nmb_elems = $list.children().length;
        //if already in the list return
        if($list.find('#'+song_idx).length)
        {
            //            jAlert("La cancion "+name+" ya se encuentra en la lista de reproduccion","Notificacion");
            
            return;
        }
        $contador++;
        //class for the current song being played
        var c = '';
        if($list_nmb_elems == 0)
            c = 'jplayer_playlist_current';
        var song_html = "<a  onclick=\"eliminarCancion('"+mp3+"');\" href='#' class="+c+" tabindex='1'>" + name + "</a>";
        song_html 	 += "<span></span>";
        song_html 	 += "<div class='mp_mp3' style='display:none;'>"+mp3+"</div>";
        song_html 	 += "<div class='mp_ogg' style='display:none;'>"+ogg+"</div>";
        var $listItem = $("<li/>",{
            id			: song_idx,	
            html 		: song_html
        });
        $list.append($listItem);
        //if its the only song play it
        if($list_nmb_elems == 0){
            $("#jquery_jplayer").jPlayer("setFile", mp3, ogg).jPlayer("play");
            jpTotalTime.show();
            jpPlayTime.show();
        }
        $listItem.find('a').bind('click',clickSong);
        $listItem.find('span').bind('click',removeSong);
    //        div.jp-playlist-player div.jp-playlist li span
    }
				
    /**
     * removes a song from the playlist.
     * if the song was the current one, and there are more songs 
     * in the playlist, then plays the next one.
     * if there are no more, stops the player, and removes the status bar
     * otherwise keeps playing whatever song was being played
     */
    function removeSong() 
    {
        
        $contador--;        
       
        $RutacancionEliminar="";
        var $this 	= $(this); 
        var current = $this.parent().find('a.jplayer_playlist_current').length;
    
        $this.parent().remove();
        var $list_nmb_elems = $list.children().length;
        if($list_nmb_elems > 0 && current)
            playListNext();
        else if($list_nmb_elems == 0)
        {
            $("#jquery_jplayer").jPlayer("clearFile");
            jpTotalTime.hide();
            jpPlayTime.hide();
        }	
        return false;
    }
				
    /**
     * User clicks on a song in the playlist. Plays it
     */
    function clickSong() 
    {
        
        var index = $(this).parent().index();
        playSong(index+1);
        return false;
    }
				
    /**
     * The next are the events for clicking on both "play" and "add to playlist" icons
     */
                
    $('#mp_content_wrapper').find('.mp_like').bind('click',function()
                 
    {
            var $this 	= $(this);
            var $paths	= $this.parent().siblings('.mp_song_info');
            var title   	= $paths.find('.mp_song_title').html();
            var mp3			= $paths.find('.mp_mp3').html();
                    
            var ogg			= $paths.find('.mp_ogg').html();
            var album_id 	= $this.closest('.mp_content').attr('id');
            var song_index	= $this.parent().parent().index();
            var song_idx	= album_id + '_' + song_index;
            var price       =$paths.find('.mp_price').html();
            var identificador  =$paths.find('.mp_id').html();
        
            jAlert("le has dado like a la  cancion de la lista de reproduccion " + album_id + " con titulo = "+title +  
                " con la ruta del mp3 = "+mp3 +" con la ruta del ogg = "+ogg, " ....");  
                      
                  
        });
    //                 
                
                
    $('#mp_content_wrapper').find('.mp_download').bind('click',function()
    {
        var $this 	= $(this);
        var $paths	= $this.parent().siblings('.mp_song_info');
        var title   	= $paths.find('.mp_song_title').html();
        var mp3			= $paths.find('.mp_mp3').html();
                    
        var ogg			= $paths.find('.mp_ogg').html();
        var album_id 	= $this.closest('.mp_content').attr('id');
        var song_index	= $this.parent().parent().index();
        var song_idx	= album_id + '_' + song_index;
        var price       =$paths.find('.mp_price').html();
        var identificador  =$paths.find('.mp_id').html();
        
        jAlert("descargando cancion de la lista de reproduccion " + album_id + "con titulo ="+title +  
            "con la ruta del mp3 = "+mp3 +"con la ruta del ogg = "+ogg, "Descargando ....");  
        
        
       
    });
    
    $('#mp_content_wrapper').find('.mp_delete').bind('click',function()
    {
        var $this 	= $(this);
        var $paths	= $this.parent().siblings('.mp_song_info');
        var title   	= $paths.find('.mp_song_title').html();
        var mp3			= $paths.find('.mp_mp3').html();
                    
        var ogg			= $paths.find('.mp_ogg').html();
        var album_id 	= $this.closest('.mp_content').attr('id');
        var song_index	= $this.parent().parent().index();
        var song_idx	= album_id + '_' + song_index;
        var price       =$paths.find('.mp_price').html();
        var identificador  =$paths.find('.mp_id').html();
        
        jAlert("Eliminando de la lista de reproduccion " + album_id + "con titulo ="+title +  
            "con la ruta del mp3 = "+mp3 +"con la ruta del ogg = "+ogg, "Descargando ....");  
        
        
       
    });
                
                
    $('#mp_content_wrapper').find('.mp_play').bind('click',function()
    {
        $contador=1;
        $esLista=false;
        var $this 	= $(this);
        var $paths	= $this.parent().siblings('.mp_song_info');
        var title   	= $paths.find('.mp_song_title').html();
        var mp3	        = $paths.find('.mp_mp3').html();
        var ogg		= $paths.find('.mp_ogg').html();
        var album_id 	= $this.closest('.mp_content').attr('id');
        var song_index	= $this.parent().parent().index();
        var song_idx	= album_id + '_' + song_index;
        var price       =$paths.find('.mp_price').html();
        var identificador  =$paths.find('.mp_id').html();
                    
        jAlert("linea 361  titulo= "+title +" rutaMp3 = "+mp3 +" Precio= "+price +" id= "+identificador);
        //add to playlist and play the song
        addFirst(song_idx,title,mp3,ogg);
    });
     $('#mp_content_wrapper').find('.mp_addpl').bind('click',function(){
        var $this 		= $(this);
        var $paths		= $this.parent().siblings('.mp_song_info');
        var title  = $paths.find('.mp_song_title').html();
        var mp3			= $paths.find('.mp_mp3').html();
        var ogg			= $paths.find('.mp_ogg').html();
        var album_id 	= $this.closest('.mp_content').attr('id');
        var song_index	= $this.parent().parent().index();
        var song_idx	= album_id + '_' + song_index;
        $identificador  = $paths.find('.mp_id').html();
        $listaReproduccion=album_id;
        
       
        //        alert('contador al adiccionar(421)  '+$contador);
        if(!$esLista)
        {
            $cancionAgregar=title;
            var nombreListas=cargarListas();
            var elegirListas="";
            elegirListas += "<div id=\"titulo\" >Editar listas de Reproduccion</div>";
            elegirListas += "<span id=\"contenidoVentanaModal\">";
            elegirListas += "Agregar la cancion <span style=\"font-size:17px; color: green; font-weight:bold;\">"+title + "</span> la lista de reproduccion:<br><br>"
            elegirListas +="<select name=\"thelist \" style=\"width: 90%; margin-left: 1%;\" onChange=\"combo(this)\">";
            elegirListas +="<option>Elige una opcion</opcion>";
            for (var i in nombreListas)
            {
                    
                elegirListas +="<option>"+nombreListas[i][1]+"</option>"
            }
            elegirListas +="</select></span>" 
        
            elegirListas +=  "<div id=\"botonesModal\">";
            elegirListas +=  "<input id=\"btnAceptar\" onclick=\"agregarCancionALista();\" name=\"btnAceptar\" size=\"20\" type=\"button\" value=\"Aceptar\" /> <input id=\"btnCancelar\" onclick=\"ocultarVentana();\" name=\"btnAceptar\" size=\"20\" type=\"button\" value=\"Cancelar\" /></div>";
         
            document.getElementById("miVentana").innerHTML=elegirListas;  
            mostrarVentana();
            
            
        }
        
        else if($esLista)
        {
            
            jConfirm("¿Deseas agregar  la cancion "+title+" a la lista de reproduccion?", "Agregar cancion a "+$nuevaLista, function(r) {  
                if(r) {  
                    jAlert(".... Insertando cancion .....", "Adicionar cancion");  
                } else {  
                    jAlert("La cancion no se agrego", "Mensaje");  
                }  
            });  
            
        
        }
        
        //add to playlist and play the song if none is there
        addToPlayList(song_idx,title,mp3,ogg);
    });
				
    /**
     * we want to show on the album image, the play button for playing the whole album
     */
    $('#mp_content_wrapper').find('.mp_content').bind('mouseenter',function(){
                   
        var $this 		= $(this);
        $this.find('.mp_playall').show();
    }).bind('mouseleave',function(){
        var $this 		= $(this);
        $this.find('.mp_playall').hide();
    });
				
    /**
     * to play the whole album, we play the first song and add all the others to the playlist.
     * playing the first one, guarantees us that the playlist is set to empty before
     */
    $('#mp_content_wrapper').find('.mp_playall').bind('click',function()
    {
        jAlert("Se va a reproducir toda la lista de reproduccion", "Lista de Reproduccion");  

        $esLista=true;
        var $this 		= $(this);
        var $album		= $this.parent();
        //         var $paths		= $('#mp_content_wrapper').parent().siblings('.mp_song_info');
        //       var prueba= $paths.find('.mp_download').html();
        //        alert('  que hay en album  '+ prueba);
        
        $album.find('.mp_play:first').trigger('click');
        $album.find('.mp_addpl').trigger('click');
        $contador=1;
    })
				
    /**
     * playlist songs can be reordered
     */
    $list.sortable();
    $list.disableSelection();
				
}
            
            
function cargar(nombreLista)
{
    var $carrusel=""; 
    $limpiarDivs++;   
    if($limpiarDivs>1)
    {
          
        $("#jplayer_previous").unbind('click');
        $("#jplayer_next").unbind('click');
        //        document.getElementById("album4").innerHTML="";
        document.getElementById("mp_content_wrapper").innerHTML="";
    }
    mostrarElemento('reproductor');
    var $cadena='';
    var $cadena2='';
     
    var alb="album4";
    //Toco usar este for para poder esperar a que llegar los datos (Preguntar al profe como se soluciona)
    for(i=2; i>0;i--){
        var listasReproduccion = cargarListas();
        if(i=1)alert('Se ha cargado toda su colección');
        var canciones_por_lista = cancionesPorLista(123);
        if(i=1)alert('Se ha cargado toda su colección');
        var canciones = listarCanciones();  
//        if(i=1)alert('Se ha cargado toda su colección');
    }
    

    for(var j in listasReproduccion)
    { 
        if(nombreLista==listasReproduccion[j][1])
        {
            $cadena2+= "<div class=\"mp_content\" id=\""+listasReproduccion[j][1]+"\">";
        }
        else{
            $cadena2+= " <div class=\"mp_content\" id=\""+listasReproduccion[j][1]+"\" style=\"display:none;\">";
        }
        $cadena2 +="<img src=\""+listasReproduccion[j][2]+"\" alt=\""+listasReproduccion[j][1]+"\"/>" ;
        $cadena2 += " <a href=\"#\" class=\"mp_playall\">Play all</a>";
        $cadena2 +=" <div class=\"mp_description\">";
        $cadena2 +=" <h2 >"+listasReproduccion[j][1]+"</h2></div>";
        $cadena2 +=" <div id=\""+listasReproduccion[j][0]+listasReproduccion[j][1]+"\" class=\"mp_songs\"></div></div>";  
//        alert('se crea el id: '+listasReproduccion[j][0]+listasReproduccion[j][1]);
        $carrusel +="<li><img src=\""+listasReproduccion[j][2]+"\" id=\"image"+listasReproduccion[j][1]+"\" alt='"+listasReproduccion[j][1]+"' title='"+listasReproduccion[j][1]+', contiene '+(listasReproduccion[j].length)+" Canciones'  width='110' height='88'/></li>";
        
    }
    document.getElementById('mp_content_wrapper').innerHTML= $cadena2;
    
  for(var i in listasReproduccion)
    {
        for(var k in canciones_por_lista)
        {
            if(listasReproduccion[i][1]==canciones_por_lista[k][1])
            {
                for(var j in canciones){
    //                 var numero_de_canciones=0;
                    if(canciones_por_lista[k][2]===canciones[j][0])
                    {
//                        if(k>0)alert(j+': Nom lis: '+listasReproduccion[i][1]+' CPL: '+ canciones_por_lista[k][2]+' can: '+canciones[j][0]);
                        $cadena += " <div> <h3>"+canciones[j][1]+"</h3>"; 
                        $cadena += " <div class=\"mp_options\"><span class=\"mp_delete\">delete</span><span class=\"mp_like\">like</span><span class=\"mp_download\" title='Si deseas descargar esta cancion haz clic aqui'>download</span>";
                        $cadena += "<span class=\"mp_play\">Play</span>";
                        $cadena += "<span class=\"mp_addpl\">Add to playlist</span></div>";
                        $cadena += "<div class=\"mp_song_info\" style=\"display:none;\">";
                        $cadena += "<span class=\"mp_song_title\">"+canciones[j][1]+"</span><span class=\"mp_mp3\">"+canciones[j][8]+"</span>";
                        $cadena += "<span class=\"mp_ogg\">"+canciones[j][8]+"</span>";
                        $cadena += "<span class=\"mp_id\">"+canciones[j][2]+"</span>";
                        $cadena += "<span class=\"mp_price\">"+canciones[j][2]+"</span></div></div>";
                    }
                }
            }
         }
            //alert('se actualiza: '+listasReproduccion[i][0]+listasReproduccion[i][1]);
            document.getElementById(listasReproduccion[i][0]+listasReproduccion[i][1]).innerHTML= $cadena; 
            document.getElementById('mp_albums').innerHTML= $carrusel;
            $cadena='';
    }
    reproductor();
}

function crearListaReproduccion()
{
    $("#resultados").css("display", "none");
    $("#busquedaCanciones").css("display", "none");
    mostrarElemento('crearLista');

}

function imagenSeleccionada(elemento){
    
    $img = elemento.selectedIndex;
    document.getElementById("imagen").innerHTML="<img src= \"images/listasReproduccion/"+parseInt($img+1)+".jpg \" width=\"200\" height=\"150 \">";                       
}

function editarListas()
{
    
    
    $esLista=false;
    $nuevaLista="";
    
    var ventanaModal="";
    ventanaModal += "<div id=\"titulo\" >Editar listas de Reproduccion</div>";
    ventanaModal += "<span id=\"contenidoVentanaModal\">";
    ventanaModal += "al dar clic en  ";
    ventanaModal += "<img src= \"images/reproductor/addSong.png \" width=\"20\" height=\"20 \">";
    ventanaModal += "podras agregar canciones a las listas ya creadas, para eliminar canciones de una lista de reproduccion, simplemente das clic en el icono  ";
    ventanaModal +="<img src= \"images/reproductor/Delete.png \" width=\"20\" height=\"20 \"></span>"
   
    ventanaModal += "<div id=\"botonesModal\">";
    ventanaModal +=  "<input id=\"btnAceptar\" onclick=\"ocultarVentana();\" name=\"btnAceptar\" size=\"20\" type=\"button\" value=\"Aceptar\" /> </div>";
    document.getElementById("miVentana").innerHTML=ventanaModal;  
    mostrarVentana();
    
    cargar('Coleccion');
    
}

function mostrarVentana()
{
    
    var ancho=screen.width/3;
    var alto=screen.height/3;
    var ventana = document.getElementById('miVentana'); // Accedemos al contenedor
    ventana.style.marginTop = alto+"px"; // Definimos su posici�n vertical. La ponemos fija para simplificar el c�digo
    ventana.style.marginLeft = ancho +  "px"; // Definimos su posici�n horizontal
    ventana.style.display = 'block'; // Y lo hacemos visible
}

function ocultarVentana()
{
    var ventana = document.getElementById('miVentana'); // Accedemos al contenedor
    ventana.style.display = 'none'; // Y lo hacemos invisible
}

function agregarCancionALista()
{
    //www
    if($listaParaInsertarCancion=='')
    {
        
        jAlert("debes elegir una lista de reproduccion, no se puede agregar la cancion","833");
    }
    else
        {
    
        jAlert("insertando cancion "+$cancionAgregar+" en lista de reproduccion "+$listaParaInsertarCancion,"metodo agregar cancion");
//        Metodo editar lista de coleecion aqui
//        jAlert($identificador);
        ocultarVentana();
        agregarCancionAListaRep(123, nombre_lista, $identificador);
        $cancionAgregar="";
        $listaParaInsertarCancion="";
        cargar(nombre_lista);
        }
}

function combo(lista)
{
   
  var idx = lista.selectedIndex;
  var content = lista.options[idx].innerHTML;
//  alert(content);
  if(content=='Elige una opcion')
      {
         
          jAlert("debes elegir una lista de reproduccion","alert 842");
      }
      else
          {
              $listaParaInsertarCancion=content;
            jAlert("Se eligio la opcion "+ content ,"Alerta linea 835");
              
          }
  
}

function metodoAjax()
{
    
//alert('funcion metodoAjax');
    var x;
    x=$(document);
    x.ready(enviar);

			
    function enviar()
    {
//        alert('funcion enviar');
        var login=$("#login").attr("value");
        $.ajax({
            async:true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url:"Interfaces/usuarioInterface.php",
            data:"accion=disponibilidad&login="+login,
            beforeSend:inicioEnvio,
            success:llegada,
                              
            timeout:10000,
            error:problemas
        }); 
        return false;
    }
    function inicioEnvio()
    {
//        alert('se envio ....');
//        var x=$("#resultados");
//        x.html('Cargando...');
    }
    function llegada(datos)
    {
//        alert('se recibio');
        //aqui se procesa la respuesta del servidor (IMPORTANTE)
        if(datos=="Login ya existe")
            {
            $loginOK=false;
            document.getElementById("btnRegistrar").disabled=true;
//            alert('login ya existe');
            document.getElementById('mensaje').textContent = 'Login ya existe'
            $("#mensaje").css("color", "red");
            
            
           
            }
            
            else if(datos=="vacio")
            {
            document.getElementById("btnRegistrar").disabled=true;
//            alert('login ya existe');
            document.getElementById('mensaje').textContent = 'El login no debe ser vacio'
            $("#mensaje").css("color", "red");
             $loginOK=false;
            
                
            }
            else 
            {
               $loginOK=true;
//                alert('login disponible');
                

             document.getElementById('mensaje').textContent = 'Login disponible'
              $("#mensaje").css("color", "green");
//                $("#btnRegistrar").css('disable', false);
              if($loginOK && $passwordOK)
                  {
                       document.getElementById("btnRegistrar").disabled=false;
                     
                  }
            
//                document.formulario2.btnRegistrar.disabled=false;
            }
            
						
//        var dataJson = eval(datos);
//        for(var i in dataJson)
//        {
//            alert(dataJson[i].codigo + " _ " + dataJson[i].departamento + " _ " + dataJson[i].municipio+ " _ " + dataJson[i].nombreSuscriptor+ " _ " + dataJson[i].numeroSuscriptores);
//        }
						
    }
					
					
    function problemas()
    {
        alert('problem');
        $("#resultados").text('Problemas en el servidor.');
    }



}
