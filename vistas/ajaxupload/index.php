<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="style/style.css" rel="stylesheet" type="text/css" />
   <script src="javasc.js" type="text/javascript"></script>

</head>
<body>
       <div id="container">
            <div id="header"><div id="header_left"></div>
            <div id="header_main">Max's AJAX File Uploader</div><div id="header_right"></div></div>
            <div id="content">
                <form action="upload.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" >
                     <p id="f1_upload_process">Loading...<br/><img src="loader.gif" /><br/></p>
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
             <div id="footer"><a href="http://www.ajaxf1.com" target="_blank">Powered by AJAX F1</a></div>
         </div>
                 
</body>   
