<div class="contenido-izquierda">
    <div class="categoria"> <a href="<?php echo BASE_URI?>">P&Aacute;gina Principal</a>&nbsp;&gt;&nbsp;
    <a href="<?php echo BASE_URI?>seremis">Seremis</a>&nbsp;&gt;&nbsp;Seremis Vista </div>
          <h1> SECRETAR&Iacute;A REGIONAL MINISTERIAL DE ECONOM&Iacute;A </h1>
          <hr />
		  <br />
		  <div id="servicios-relacionados">
				  <div id="icono-servicios-relacionados">Servicios relacionados</div>
				  <p><?php foreach($enlaces as $e):?><a href="<?php echo BASE_URI?>seremis-vista/<?php echo $e['id'];?>/<?php echo $id?>"><?php echo $e['acronimo'];?></a> | <?php endforeach; ?></p>
  </div>
  <div id="fix" style="clear:both"></div>
		   <h2>Datos Secretar&iacute;a Regional Ministerial </h2>
       <?php foreach($seremis as $s):?>
		   <ul>
		     <li><strong>Direccion :</strong>	 <?php echo $s['ub_dir'];?> </li>
             <li><strong>Ciudad :</strong>	<?php echo $s['ub_ciu'];?> </li>
             <li><strong>Fono :</strong>	 <?php echo $s['ub_fon'];?> Fax:	 <?php echo $s['ub_fax'];?> </li>
             <li><strong>Sitio Web :</strong> <a href="<?php echo $s['ub_web'];?>" target="_blank"><?php echo $s['ub_web'];?></a> </li>
             <li><strong>Email :</strong><?php echo $s['ub_ema'];?></li>
  </ul>
           <h3>SEREMI</h3>
           <div id="seremi">
             <table border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td valign="top"><div id="numero-sesion"><strong></strong><img src="<?php echo base_url(); ?>/jefes/fotos/<?php echo $s['foto'];?>" alt=" Seremi" width="75" height="90" align="left" border="1" />
                    
                 </div></td>
                 <td>
                    <?php $bio = str_replace("\n", "<br>", $s['biografia']); echo $bio; ?>
                 </td>  
               </tr>
             </table>
             
             <div id="fix" style="clear:both"></div>
  </div>
           <div id="fix" style="clear:both"></div>
		   
           <h3>Informacion</h3>
           <p><?php $objetivos = str_replace("\n","<br>",$s['objetivos']); echo $objetivos;?>
              <?php $hitos = str_replace("\n","<br>",$s['hitos']); echo $hitos;?>
           </p>

         <?php endforeach;?>
		 <a style="color:#fff;" class="btn-vermas" href="<?php echo BASE_URI?>seremis">Volver</a>

</div>