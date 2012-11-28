<?php
	
	include_once('../Clases/Conexion.php');	
	include('../Clases/Cancion.php');
	$conexionBD = new Conexion();
        $conexionBD->conectar();
	class controladorCancion
	{
		var $cancion;
		function __construct($titulo, $interprete, $genero, $album, $precio, $url,  $usuario)
		{
			$this->cancion = new Cancion($titulo, $interprete, $genero, $album, $precio, $url,  $usuario);
		}
                
                function insertar()
		{
			$titulo = mysql_real_escape_string($this->cancion->titulo);
			$interprete = mysql_real_escape_string($this->cancion->interprete);
			$genero = mysql_real_escape_string($this->cancion->genero);
			$album = mysql_real_escape_string($this->cancion->album);
			$precio = $this->cancion->precio;
			$url = mysql_real_escape_string($this->cancion->url);
			$usuario = mysql_real_escape_string($this->cancion->usuario);
            $sentencia = "INSERT INTO Cancion(titulo, interprete, genero, album, precio, url, login_usuario) 
									VALUES('$titulo', '$interprete', '$genero', '$album', $precio, '$url', '$usuario')";
           // echo $sentencia;
			$consulta = mysql_query($sentencia) or die ("Error al insertar");
			if($consulta)
			{
				//echo "La canción se inserto correctamente";
			}else
				echo "Error al subir la canción";
		}
		
		function consultar($id_cancion)
		{
                        $datosCancion = array();
			$consulta = mysql_query("SELECT * FROM cancion WHERE id=$id_cancion") or die ('Error de la aplicacion');	
                        while ($fila=mysql_fetch_array($consulta))
			{
				$datosCancion[0] = $fila['id'];
				$datosCancion[1] = $fila['titulo'];
				$datosCancion[2] = $fila['interprete'];
				$datosCancion[3] = $fila['genero'];
				$datosCancion[4] = $fila['album'];
				$datosCancion[5] = $fila['no_reproducciones'];
				$datosCancion[6] = $fila['no_compras'];
				$datosCancion[7] = $fila['precio'];
				$datosCancion[8] = $fila['url'];
				$datosCancion[9] = $fila['login_usuario'];
			}
			echo json_encode($datosCancion);
		}
		
		function actualizar()
		{
                    
		}
		
		function eliminar()
		{
			
		}
		
		function listar()
		{
//                    echo 'entre a listar';
                    $datosCancion = array();
                    $consulta = mysql_query("SELECT * FROM cancion")or die ('Error de la aplicacion');
                    $cont = 0;
                    while ($fila = mysql_fetch_array($consulta))
                    {
//                       $datosCancion[] =$fila['id'];
//                        $datosCancion[] = $fila['titulo'];
//			$datosCancion[] = $fila['interprete'];
//                        $datosCancion[$cont][3] = $fila['genero'];
//			$datosCancion[] = $fila['album'];
//			$datosCancion[] = $fila['no_reproducciones'];
//			$datosCancion[] = $fila['no_compras'];
//			$datosCancion[] = $fila['precio'];
//                        $datosCancion[] = $fila['url'];
//                        $datosCancion[] = $fila['login_usuario'];
			
                        $datosCancion[$cont][0] =$fila['id'];
                        $datosCancion[$cont][1] = $fila['titulo'];
			$datosCancion[$cont][2] = $fila['interprete'];
			$datosCancion[$cont][3] = $fila['genero'];
			$datosCancion[$cont][4] = $fila['album'];
			$datosCancion[$cont][5] = $fila['no_reproducciones'];
			$datosCancion[$cont][6] = $fila['no_compras'];
			$datosCancion[$cont][7] = $fila['precio'];
                        $datosCancion[$cont][8] = $fila['url'];
                        $datosCancion[$cont][9] = $fila['login_usuario'];
                        $cont++;
                    }
                    echo json_encode($datosCancion);
		}
		
		function contar()
		{
			
		}
		function reproducir()
		{
			
		}
		
		
		
	}

	
?>