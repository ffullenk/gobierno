<script type="text/javascript">

  function comuna(id) {

      var base='<?php echo BASE_PATH ?>';

        var url = base+"/ajax_municipalidades"; // the script where you handle the form input.
      //alert($("#mes").val());
      var id=id;
     
        $.ajax({
               type: "POST",
               url: url,
               data: "id="+id, // serializes the form's elements.
               success: function(data)
               {
                   //alert(data); 
                   $("#noticias").html(data);
               }
             });
        
        return false; // avoid to execute the actual submit of the form.
    }


</script>

<div id="noticias">
  <div id="categoria"> 
    <a href="http://www.gorecoquimbo.gob.cl/principal.php">P&Aacute;gina Principal</a>&nbsp;&gt;&nbsp;
    <a href="http://www.gorecoquimbo.gob.cl/gore_mun_new.php">Municipalidades</a>
    &nbsp;&gt; Municipalidades Provincia de Elqui </div>
          <h1>MUNICIPALIDADES</h1>
          <hr />
		  <br/>
<div id="contenido-biblioteca">

      <?php foreach($comunas as $com):?>
          <h2><strong>ILUSTRE MUNICIPALIDAD DE <?php echo $com['comuna']?></strong></h2>
       <?php endforeach;?>  
          <h4>UBICACION FISICA</h4>
          <ul>
            
            <?php foreach($alcaldes as $al):?>
                         
            <li> <strong>Direcci&oacute;n :</strong>   <?php echo $al['ub_dire'];?></li>
            <li> <strong>Tel&eacute;fono :</strong>   <?php echo $al['ub_fono']; ?></li>
            <li> <strong>Fax :   </strong><?php echo $al['ub_fax'];?> </li>
            <li><strong>Email :</strong> <a href="mailto:alcaldia@munilaresena.cl"><?php echo $al['ub_ema'];?></a> </li>
            <li><strong>Enlace Web:</strong> <a href="http://www.laserena.cl/" target="_blank"><?php echo $al['ub_link'];?></a> </li>
            <li><strong>Horario Atenci&oacute;n :</strong>	 <?php echo $al['ub_horario'];;?></li>
         
          <?php endforeach;?>  

          </ul>
          <h4><strong>AUTORIDAD EDILICIA</strong></h4>
          <div id="integrantes">
            <div id="foto-integrante"><img src="<?php echo  $al['foto'];?>" width="73" height="90" />
              <div id="nombre-integrante"><?php echo $al['nombre'];?> </div>
            </div>
          </div>
		  <div id="fix" style="clear:both"></div>   
		  <h4><strong>CONCEJALES(AS</strong></h4>
		  
      <?php foreach($consejales as $co):?>
      <div id="integrantes">
            <div id="foto-integrante">

              <div id="nombre-integrante"><?php $biocon = str_replace("\n","<BR>",$co['biografia']); echo $biocon; ?> </div>
            </div>
      </div>
		<?php endforeach;?>
		  <div id="fix" style="clear:both"></div>



</div>

<div id="menu-pmg">

  <ul>

    <?php foreach($serena as $se):?>
    <li style="cursor:pointer" onclick="comuna('<?php echo $se['id_com']?>')"><?php echo $se['comuna']?></li>
    <?php endforeach;?>

    <?php foreach($higuera as $se):?>
    <li style="cursor:pointer" onclick="comuna('<?php echo $se['id_com']?>')"><?php echo $se['comuna']?></li>
    <?php endforeach; ?>

    <?php foreach($vicuña as $se):?>
    <li style="cursor:pointer" onclick="comuna('<?php echo $se['id_com']?>')"><?php echo $se['comuna']?></li>
    <?php endforeach;?>

     <?php foreach($coquimbo as $se):?>
    <li style="cursor:pointer" onclick="comuna('<?php echo $se['id_com']?>')"><?php echo $se['comuna']?></li>
    <?php endforeach;?>

     <?php foreach($anacollo as $se):?>
    <li style="cursor:pointer" onclick="comuna('<?php echo $se['id_com']?>')"><?php echo $se['comuna']?></li>
    <?php endforeach;?>

     <?php foreach($ovalle as $se):?>
    <li style="cursor:pointer" onclick="comuna('<?php echo $se['id_com']?>')"><?php echo $se['comuna']?></li>
    <?php endforeach;?>


     <?php foreach($monre as $se):?>
    <li style="cursor:pointer" onclick="comuna('<?php echo $se['id_com']?>')"><?php echo $se['comuna']?></li>
    <?php endforeach;?>

     <?php foreach($hurtado as $se):?>
    <li style="cursor:pointer" onclick="comuna('<?php echo $se['id_com']?>')"><?php echo $se['comuna']?></li>
    <?php endforeach;?>


     <?php foreach($punitaqui as $se):?>
    <li style="cursor:pointer" onclick="comuna('<?php echo $se['id_com']?>')"><?php echo $se['comuna']?></li>
    <?php endforeach;?>

     <?php foreach($combarbala as $se):?>
    <li style="cursor:pointer" onclick="comuna('<?php echo $se['id_com']?>')"><?php echo $se['comuna']?></li>
    <?php endforeach;?>

     <?php foreach($illapel as $se):?>
    <li style="cursor:pointer" onclick="comuna('<?php echo $se['id_com']?>')"><?php echo $se['comuna']?></li>
    <?php endforeach;?>

     <?php foreach($vilos as $se):?>
    <li style="cursor:pointer" onclick="comuna('<?php echo $se['id_com']?>')"><?php echo $se['comuna']?></li>
    <?php endforeach;?>

     <?php foreach($salamanca as $se):?>
    <li style="cursor:pointer" onclick="comuna('<?php echo $se['id_com']?>')"><?php echo $se['comuna']?></li>
    <?php endforeach;?>

     <?php foreach($canela as $se):?>
    <li style="cursor:pointer" onclick="comuna('<?php echo $se['id_com']?>')"><?php echo $se['comuna']?></li>
    <?php endforeach;?>


  </ul>

</div>

      
</div>

