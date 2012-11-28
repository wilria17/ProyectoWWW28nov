<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
    
<html>
    <body>
        <div class="subirArchivo">
                    <div style='margin-top:10px' align="center">
                        
                        <div id="container">
                            <div id="header"><div id="header_left"></div>
                            <div id="header_main">Max's AJAX File Uploader</div><div id="header_right"></div></div>
                            <div id="content">
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
                        </div>
                    </div>
                </div>
    </body>    
</html>
