  <div class="categoria"> 
    <a href="<?php echo BASE_URI?>">P&Aacute;gina Principal</a>&nbsp;&gt;&nbsp;
    Municipalidades
  </div>
          <h1>MUNICIPALIDADES</h1>
          <hr />
      <br/>
      

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
            <li><strong>Horario Atenci&oacute;n :</strong>   <?php echo $al['ub_horario'];;?></li>
         
          <?php endforeach;?>  

          </ul>
          <h4><strong>AUTORIDAD EDILICIA</strong></h4>
          <div id="integrantes">
            <!-- sin-imagen.jpg esta en imagenes/parlamentarios-->
            <div id="foto-integrante"><img src="<?php echo base_url(); ?>alcaldes/fotos/<?php echo  $al['foto'];?>" width="73" height="90" />
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