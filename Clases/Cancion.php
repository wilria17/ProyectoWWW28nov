
<?php
	
	class Cancion
	{
		var $id;
		var $titulo;
		var $interprete;
		var $genero;
		var $album;
		var $no_reprod;
		var $no_compras;
		var $precio;
		var $url;
		var $usuario;
		
		function __construct($titulo, $interprete, $genero, $album, $precio, $url,  $usuario)
		{         
			$this->titulo= $titulo;
			$this->interprete= $interprete;
			$this->genero = $genero;
			$this->album = $album;
			$this->precio = $precio;
			$this->url = $url;
			$this->usuario = $usuario;
		}
		
		function getId()
		{
			return $this->id;
		}
		function setId($id)
		{
			 $this->id = $id;
		}
		
		function getTitulo()
		{
			return $this->titulo;
		}
		function setTitulo($titulo)
		{
			 $this->titulo = $titulo;
		}
		
		function getInterprete()
		{
			return $this->interprete;
		}
		function setInterprete($interprete)
		{
			 $this->interprete = $interprete;
		}
		
		function getGenero()
		{
			return $this->genero;
		}
		function setGenero($genero)
		{
			 $this->genero = $genero;
		}
		
		function getAlbun()
		{
			return $this->album;
		}
		function setAlbum($album)
		{
			 $this->album = $album;
		}
		
		function getNoReprod()
		{
			return $this->no_reprod;
		}
		function setNoReprod($no_reprod)
		{
			 $this->no_reprod = $no_reprod;
		}
		
		function getNoCompras()
		{
			return $this->no_compras;
		}
		function setNoCompras($no_compras)
		{
			 $this->no_compras = $no_compras;
		}
		
		function getPrecio()
		{
			return $this->precio;
		}
		function setPrecio($precio)
		{
			 $this->precio = $precio;
		}
		
		function getUrl()
		{
			return $this->url;
		}
		function setUrl($url)
		{
			 $this->url = $url;
		}
		
		function getUsuario()
		{
			return $this->usuario;
		}
		function setUsuario($usuario)
		{
			 $this->usuario = $usuario;
		}
	}

?>

