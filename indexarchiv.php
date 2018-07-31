<?php 
session_start();
$titre='Accueil';
include("identifiants.php");
include("hautdepage.php");
include("menu.php");

?>
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body onload="MM_preloadImages('images/inboxb.jpg','images/tchatb.jpg','images/forumb.jpg','images/compteb.jpg','images/teleb.jpg')">

<table width="950" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="0">
    
    <div style="width:950px; height:140px; background-color: #FFFFFF;" align="left">
    <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0','width','950','height','140','id','ent','align','middle','src','ent','quality','high','bgcolor','#ffffff','name','ent','allowscriptaccess','sameDomain','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','ent' ); //end AC code
</script><noscript><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="950" height="140" id="ent" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="ent.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" /><embed src="ent.swf" quality="high" bgcolor="#ffffff" width="950" height="140" name="ent" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object></noscript>
    </div>
    
     <div style="width:950px; height:23px; background-color: #FFFFFF;" align="left">
	<table cellspacing="0"  cellpadding="0" border="0" width="23" hspace="0" >
	 <tr>
	  <?php  include("menuh.php");?>
	</tr>
    </table>
    </div>  
    
    </td>
  </tr>
  <tr>
    <td>
    
     <table width="950" border="1" cellspacing="0" cellpadding="0">
      <tr>
      
      <td width="200">&nbsp;
      <iframe src="mg.php" name="mg" width="200" marginwidth="2" height="500" marginheight="2"        align="left" scrolling="no" frameborder="0"></iframe>
      </td>
      
      <td>
      <iframe src="main.php" name="main" width="550" marginwidth="2" height="500" marginheight="2"      align="left" scrolling="no" frameborder="0"></iframe>
      </td>
      
      <td width="200">&nbsp;
      <iframe src="pub.php" name="cpub" width="200" marginwidth="2" height="500" marginheight="2"      align="left" scrolling="no" frameborder="0"></iframe>
      </td>
      
      </tr>
     </table>

    </td>
  </tr>
  
  
  <tr>
    <td><?php include("bpage.php"); ?></td>
  </tr>
  
</table>

</body>
</html>
