<?php
   // Carpeta destino para los archivos subidos
   $destination_path = "../";

   $result = 0;
   
   $target_path = $destination_path . basename( $_FILES['myfile']['name']);
   $archivo = basename( $_FILES['myfile']['name']);

   if(@move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path)) {
       $ruta2 = $destination_path+"music/album3/";
      $result = 1;
   }
   sleep(1);
?>

<script language="javascript" type="text/javascript">
	window.top.window.stopUpload(<?php echo $result; ?>, '<?php echo $archivo; ?>',  1000, '<?php echo  $archivo; ?>', '123');
</script>   

