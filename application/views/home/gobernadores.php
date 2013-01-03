<div class="contenido-izquierda">

<?php if($id == 1):?>
   <div class="categoria"><a href="<?php echo BASE_URI?>">P&aacute;gina Principal</a> &gt; Gobernadores(as)</div>
<h1>Gobernadores</h1>
          <hr />
   <br/>

          <h2 align="justify">FUNCIONES Y ATRIBUCIONES</h2>
          <p align="justify">El Gobernador(a) ejerce las funciones destinadas a mantener el orden p&uacute;blico en la provincia, preservar la seguridad de sus habitantes y bienes, la prevenci&oacute;n y enfrentamiento de situaciones de emergencia y cat&aacute;strofe y la aplicaci&oacute;n de las disposiciones legales sobre extranjer&iacute;a.</p>
          <p align="justify">El Gobernador(a), ejerce adem&aacute;s todas aquellas funciones que le delegue expresamente el Intendente. En materia de administraci&oacute;n de la provincia, propone al Intendente proyectos espec&iacute;ficos de desarrollo, supervisa los programas y proyectos de desarrollo que efect&uacute;en los servicios creados por ley, dispone las medidas de coordinaci&oacute;n necesarias para el desarrollo provincial, que promueve la participaci&oacute;n del sector privado en las actividades de desarrollo.</p>
          <p align="justify">El Gobernador(a) deber&aacute; ejercer sus funciones con arreglo a la Constituci&oacute;n Pol&iacute;tica de la Rep&uacute;blica, a las leyes, a los reglamentos supremos y a los reglamentos regionales.</p>
          <p align="justify">Entre sus funciones podemos mencionar las siguientes:</p>
          <div align="justify">
            <ul>
              <li>Supervigilancia de los servicios p&uacute;blicos creados por ley para el cumplimientos de la funci&oacute;n administrativa, existentes en la Provincia.</li>
              <li>El Gobernador(a) tendr&aacute; a su cargo la administraci&oacute;n superior de la respectiva Provincia, en la esfera de atribuciones que corresponden al Intendente en su calidad de &oacute;rgano ejecutivo del Gobierno Regional y presidir&aacute; el consejo Econ&oacute;mico y Social Provincial.</li>
              <li>Puede constituir un Comit&eacute; T&eacute;cnico Asesor, con autoridades de los servicios p&uacute;blicos creados por ley y que operen en la regi&oacute;n.</li>
              <li>El Gobernador(a) forma parte integrante del Gabinete Regional, &oacute;rgano auxiliar del Intendente.</li>
              <li>Le corresponde adem&aacute;s, conforme a lo establecido en el Art&iacute;culo 130 y siguientes del C&oacute;digo de Aguas, conocer de toda cuesti&oacute;n o controversia relacionada con la adquisici&oacute;n o ejercicio y que sea de competencia de la Direcci&oacute;n General de Aguas.</li>
              <li>Aprobar las rendiciones de cuentas de los Cuerpos de Bomberos que se encuentren dentro del territorio jurisdiccional.</li>
              <li>Ejercer tareas de gobierno interior, especialmente las destinadas a mantener en la provincia el orden p&uacute;blico y la seguridad de sus habitantes y bienes. En este sentido se enmarcan las autorizaciones de reuniones en plazas, calles y dem&aacute;s lugares de uso p&uacute;blico, requerir el auxilio de la fuerza p&uacute;blica y ejercer al vigilancia de los bienes del Estado.</li>
              <li>Instalar y velar por el funcionamiento de la Unidad de Denuncias.</li>
              <li>Adoptar las medidas necesarias parab prevenir y enfrentar situaciones de emergencia y cat&aacute;strofe.</li>
              <li>Aplicar dentro del territorio de su jurisdicci&oacute;n las disposiciones legales de extranjer&iacute;a.</li>
              <li>Autorizar el izamiento del pabell&oacute;n nacional y extranjeros cuando corresponda.</li>
              <li>Supervisar los programas y proyectos de desarrollo que los servicios p&uacute;blicos creados por ley desarrollen en la Provincia.</li>
              <li>Hacer presente al Intendente o a los respectivos secretarios regionales ministeriales, con la debida oportunidad, las necesidades que observare en el territorio.</li>
              <li>Conforme al Instructivo presidencial N&#10845; 155 de fecha 28.02.02 se dota a los gobernadores de atribuciones para definir parcialmente prioridades de inversi&oacute;n p&uacute;blica regional en la Provincia bajo su jurisdicci&oacute;n.</li>
              <li>A trav&eacute;s de la Resoluci&oacute;n exenta N&#10845; 1197 de fecha 05.07.02, la facultad de representar extrajudicialmente al Estado, para la celebraci&oacute;n, modificaci&oacute;n y resciliaci&oacute;n de ciertos actos, convenios y contratos.</li>
            </ul>
          </div>

<?php else :?>

   <div class="categoria"><a href="<?php echo BASE_URI?>">P&aacute;gina Principal</a> &gt; 
    <a href="<?php echo BASE_URI?>gobernadores/<?php echo $id;?>">Gobernador</a>  Provincial <?php echo $acronimo?></div>
<h1>Gobernadores</h1>
          <hr />
          <br/>
 
          <div id="gobernador"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">

        <?php foreach($gob as $g):?>
              <tr>
                <td valign="top"><div ><strong></strong> 

                  <img src="<?php echo base_url(); ?>goberna/fotos/<?php echo $g['foto'];?>" width="80" height="80"/></div>        </td>
                <td>
        <h4><?php echo $g['jefe']?> </h4>
        <div id="tipo-acuerdo">Direcci&oacute;n : <strong><?php echo $g['ub_dir']?> </strong></div>
        <div id="fecha-acuerdo"> Ciudad :<strong><?php echo $g['ub_ciu']?></strong></div>
        <div id="descripcion-acuerdo"> Tel&eacute;fono :<strong><?php echo $g['ub_fono']?></strong></div>
        <div id="descripcion-acuerdo"> Fax :<strong><?php echo $g['ub_fax']?></strong></div>
        <div id="descripcion-acuerdo"> Enail :<strong><?php echo $g['ub_ema']?></strong></div>
        <div id="descripcion-acuerdo"> Sitio web <a href="<?php echo $g['ub_link']?>#">:<strong><?php echo $g['ub_link']?></strong></a></div>
         <div id="descripcion-acuerdo">
          <?php
             if(!empty($g['biografia'])) {
              echo "<br><h3>Biograf&iacute;a</h3>";
            $biografia = str_replace("\n","<br>",$g['biografia']); 
            echo "<p>".$biografia."</p>";
          }

                  if(!empty($g['objetivos'])) { 
              echo "<br><h3>Objetivos</h3>";
                      $objetivos = str_replace("\n","<br>",$g['objetivos']); 
            echo "<p>".$objetivos."</p>";
                  }
          
                  if(!empty($g['hitos'])) {
                      echo "<br><h3>Hitos</h3>";
                      $hitos = str_replace("\n","<br>",$g['hitos']); 
            echo "<p>".$hitos."</p>";
                  }

                  ?>
         </div>
          </td>
             </tr>

        <?php endforeach;?>     

            </table>
  </div>

<?php endif; ?>


</div>


</div>
<div id="contenido-derecha">


<div id="menu-sidebar">
  <li><a id="titulo">GOBERNADORES</a></li>
   	<ul>
  		<li><a href="<?php echo BASE_URI?>gobernadores/1">Funciones y Atribuciones</a></li>
   		<li><a href="<?php echo BASE_URI?>gobernadores/2">Gobernador(a) Provincial de Elqui</a></li>
  		<li><a href="<?php echo BASE_URI?>gobernadores/3">Gobernador (a) Provincial de Limarí</a></li>
  		<li><a href="<?php echo BASE_URI?>gobernadores/4"> Gobernador(a) Provincial de Choapa</a></li>
	</ul> 
</div>   


