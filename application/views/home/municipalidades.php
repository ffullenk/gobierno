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
                   $("#contenido-izquierda").html(data);
               }
             });
        
        return false; // avoid to execute the actual submit of the form.
    }


</script>

<div class="contenido-izquierda"> 
  <div class="categoria"> 
    <a href="<?php echo BASE_URI?>">P&Aacute;gina Principal</a>&nbsp;&gt;&nbsp;
    Municipalidades
  </div>
          <h1>MUNICIPALIDADES</h1>
          <hr />
		  <br/>

      <?php if($id == 1):?>

           <?php foreach($comunas as $com):?>
          <h2><strong>ILUSTRE MUNICIPALIDAD DE <?php echo $com['comuna']?></strong></h2>
       <?php endforeach;?>  
          <h3>UBICACION FISICA</h3>
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
          <h3><strong>AUTORIDAD EDILICIA</strong></h3>
          <div id="integrantes">
            <!-- sin-imagen.jpg esta en imagenes/parlamentarios-->
            <div id="foto-integrante"><img src="<?php echo base_url(); ?>alcaldes/fotos/<?php echo  $al['foto'];?>" width="73" height="90" />
              <div id="nombre-integrante"><?php echo $al['nombre'];?> </div>
            </div>
          </div>
      <div id="fix" style="clear:both"></div>   
      <h3><strong>CONCEJALES(AS</strong></h3>
      
      <?php foreach($consejales as $co):?>
      <div id="integrantes">
            <div id="foto-integrante">

              <div id="nombre-integrante"><?php $biocon = str_replace("\n","<BR>",$co['biografia']); echo $biocon; ?> </div>
            </div>
      </div>
      <p>
        <?php endforeach;?>
        
        
        <?php elseif($id == 2):?>
      </p>
      <h2>UBICACIÓN</h2>
      <p><img src="<?php echo base_url(); ?>imagenes/mapas/region.jpg" alt=" Mapa Regional " hspace="2" vspace="2" border="0" align="left" class="contenido-img" />La Regi&oacute;n de Coquimbo se extiende entre los paralelos 29&deg; 02&#8217; y 32&deg; 16&#8217; de latitud Sur y desde los 69&deg; 49&#8217; longitud Oeste hasta el oc&eacute;ano Pac&iacute;fico. Cubre un &aacute;área de 40.579,9 km², una superficie pr&aacute;cticamente id&eacute;ntica a la de Holanda. Su capital es la ciudad de La Serena, ubicada a 470 km. al Norte de Santiago (capital de Chile)</p>
                  
       <h4>Tema Relacionado</h4>
            
        <p><a id="descarga-comprimido" href="<?php echo base_url(); ?>descargas/mapas/region.zip" target="_blank" title=" Descargar Mapa Regional, [zip 2.25MB] ">
          Descargar Mapa Regional [2.25MB]</a> 
          
             <?php elseif($id == 3):?>
          
          
        </p>
        <h2>CLIMA</h2>
          <p>Esta zona es de transici&oacute;n entre el desierto y la zona central, m&aacute;s h&uacute;meda. El &aacute;rea costera se caracteriza por un alto porcentaje de sus d&iacute;as nublados, con un tipo de nube baja conocido como <strong>Camanchaca</strong>.
          </p>
          <p><img src="<?php echo base_url(); ?>imagenes/reg-02.jpg" alt="" hspace="2" vspace="2" border="0" align="left" class="contenido-img">
            El interior, libre de la influencia mar&iacute;tima y con mayor presi&oacute;n atmosf&eacute;rica, presenta mayormente d&iacute;as despejados, con temperaturas muy estables a trav&eacute;s del a&ntilde;o. La m&iacute;nima en invierno en la costa es de unos 10&deg;C , en tanto la m&aacute;xima en verano es de unos 26&deg;C.    </p>
		   <div id="fix" style="clear:both"></div>
           <p><img src="<?php echo base_url(); ?>imagenes/reg-03.jpg" alt="" hspace="2" vspace="2" border="0" align="left" class="contenido-img">
              Hacia el interior, estas temperaturas se elevan, mostrando una apreciable diferencia entre día y noche e invierno y verano, pero sin excesos ya que el promedio es de 17&deg;C.</p>
  

           <p>
             <?php elseif($id == 4):?>
           </p>
           <h2>GEOGRAFÍA</h2>
           <p><img src="<?php echo base_url(); ?>imagenes/reg-05.jpg" alt="" hspace="2" vspace="2" border="0" align="left" class="contenido-img">
         La Región se divide en las provincias de Elqui, Limarí y Choapa y el relieve se caracteriza por presentar una Cordillera de Los Andes alta y continua, sin manifestaciones volcánicas visibles y cuyas alturas van disminuyendo de norte a sur.    </p>
      <p>
    Las mayores expresiones son el cerro de Las Tórtolas con 6.320 m. y el Olivares con 6.250 m. Desde Los Andes, cordillera formada hace 70 millones de años, se desprenden cordones montañosos en dirección Oeste dando origen a depresiones rellenadas por la acción de los ríos, paisaje conocido como Valles Transversales.</p>
      <div style="clear:both"></div>
      <p><img src="<?php echo base_url(); ?>imagenes/reg-06.jpg" alt="" hspace="2" vspace="2" border="0" align="left" class="contenido-img">
         La Depresión Intermedia, por lo mismo, aparece como una meseta discontinua e interrumpida por montes y valles. Esta es claramente visible al interior del Valle del Elqui y también en el Limarí, donde se confunde con las amplias terrazas marinas.</p>
          <p>Las Planicies Litorales aparecen como superficie de gigantescos escalones de varios kilómetros de extensión, formadas por las distintas etapas de avances y retrocesos que tuvo el nivel marino en períodos pasados, producto de la actividad tectónica.</p>
          <div style="clear:both"></div>
          <p><img src="<?php echo base_url(); ?>imagenes/reg-07.jpg" alt="" hspace="2" vspace="2" border="0" align="left" class="contenido-img">
        Los grandes depósitos de conchas marinas, acumulados en períodos geológicos comprenden evidencias muy antiguas, convirtiéndose en valiosos yacimientos que se explotan como caliza, coquina o conchuela.</p>
         <p>Estos rellenos sedimentarios han conectado islas, islotes y promontorios rocosos al continente, diseñando amplias bahías de suaves y sencillos lineamientos que dan origen a playas con arenas finas y aguas más temperadas por la poca profundidad del fondo.</p>
         <div style="clear:both"></div>
         <p><img src="<?php echo base_url(); ?>imagenes/reg-08.jpg" alt="" hspace="2" vspace="2" border="0" align="left" class="contenido-img">
        La plataforma continental, extensa y de poca pendiente, tiene sus &uacute;ltimas manifestaciones en una serie de islas como son Gaviota, Damas, Choros y P&aacute;jaros, que se encuentran a no m&aacute;s de 15 km. de la costa; accidentes que no vuelven a presentarse hasta el &aacute;rea del Golfo de Arauco.</p>
          <p>La Cordillera de la Costa se presenta como pequeñas manifestaciones aisladas perdiendo su continuidad, pero por su altura, que alcanza 1.653 m. en el Cerro Blanco, juega un importante papel para interferir la influencia del mar al interior, ya que en algunos lugares cae en forma abrupta al litoral; la sección más interesante en este sentido, es el área comprendida entre Quebrada Los Choros y Quebrada Honda y en la cercanías de la desembocadura del Río Limarí.</p>
          <div style="clear:both"></div>
          <p><img src="<?php echo base_url(); ?>imagenes/reg-09.jpg" alt="" hspace="2" vspace="2" border="0" align="left" class="contenido-img">
         La disponibilidad de agua y las pendientes de los valles, han contribuido a la formación de suelos en Terrazas Fluviales que se han incorporado a la agricultura por su alto rendimiento.</p>
       <p>Los suaves lomajes costeros se cubren de hierbas y pastos durante la efímera época de lluvias, dando posibilidad de alimentar rebaños de bovinos, caprinos y ovinos.</p>
       <p>Por último, en esta región se encuentra el área más angosta del territorio nacional en el sector de Illapel.</p>

       <p>
         <?php elseif($id == 5):?>
       </p>
       <h2>FLORA Y FAUNA </h2>
       <div>      

         <p><img src="<?php echo base_url(); ?>imagenes/reg-010.jpg" alt="" hspace="2" vspace="2" border="0" align="left" class="contenido-img">
        Los suelos de nuestro territorio van perdiendo su salinidad de norte a sur, lo que unido al incremento de la humedad, los hace cada vez más aptos para el desarrollo de la flora y fauna naturales y, por consiguiente, también para la agricultura.
           Sin embargo, junto a estas condiciones favorables, hay otras como la irregularidad de las precipitaciones y el desarrollo de grandes extensiones de dunas.
           A pesar de estas circunstancias, la flora regional es variada y abundante, especialmente en la zona litoral. Algunas especies características son el espino, el mañil, el trevo y el guayacán, que tienen el aspecto de grandes arbustos y de árboles pequeños. Entre las plantas herbáceas están la chilca, la centella y el vinagrillo.</p>
         <div style="clear:both"></div>
         <p><img src="<?php echo base_url(); ?>imagenes/reg-011.jpg" alt="" hspace="2" vspace="2" border="0" align="left" class="contenido-img">
       En la primavera, se desarrolla un fenómeno vegetal muy característico, cuando las planicies y montes se cubren de una variada y colorida vegetación herbácea, de poca duración, tales como el palo gordo, pasionaria, violeta cordillerana, manzanilla y tupas.
           La abundante nubosidad costera que se mantiene permanentemente al sur de Coquimbo, ha permitido la existencia de agrupaciones forestales como el bosque de Fray Jorge, antiguamente más abundante y que como curiosidad botánica, está formado entre otros, por árboles abundantes en latitudes más australes como el olivillo y el canelo.</p>
         <div style="clear:both"></div>
         <p><img src="<?php echo base_url(); ?>imagenes/reg-012.jpg" alt="" hspace="2" vspace="2" border="0" align="left" class="contenido-img">
       La fauna litoral, está representada entre otros por el culpeo, el chungungo y el lobo de pelo; garumas, liles, petreles y muchas otras especies de aves, además de lagartos de diversos tamaños e insectos variados.
           Al interior del territorio, dominio de los espinales, viven el culpeo, el gato montés, el quique, la chilla y roedores como el degú y la chinchilla, la lucha de los espinos y la yaca. Hay reptiles como culebras no venenosas, lagartos y gran variedad de insectos entre los que sobresalen mariposas y coleópteros.         </p>
     <p>Entre las aves, chercanes, tordos, cernícalos y chunchos. Hay asnos que viven en estado salvaje en la precordillera andina. Gran parte de los espinales fueron intensamente explotados desde la llegada de los españoles, especialmente como combustible hogareño y de faenas mineras, lo que casi extinguió la vegetación natural de los alrededores de La Serena y Coquimbo.</p>
         <p><br />
         Hasta hoy es muy apetecida la algarrobilla cuyos frutos contienen ácido tánico, muy utilizado en curtiembres.</p>
         <p>Aledaños a los embalses de Cogotí y Recoleta se encuentran bosques de sauce chileno, especie difícil de encontrar en igual número y densidad en la zona central.</p>
         <p>Finalmente, en la Cordillera, entre los 2.000 y 4.000 m., la vegetación está compuesta de arbustos y plantas capaces de sobrevivir a los rigores de los fuertes cambios de temperatura. Hay especies arbustivas de gran tamaño como son el pichi y el monte negro. También abundan en las partes más altas las agrupaciones o champas de varias hierbas duras que en conjunto se conocen como coirón. La fauna cordillerana, está compuesta por guanacos, chinchillas, gatos de monte, vizcachas y pequeños roedores. Entre las aves las hay de rapiña, de agua y gran abundancia de pajarillos.</p>
  </div>
       <h2>
         <?php elseif($id == 6):?>
       </h2>
       <h2>DEMOGRAFÍA</h2>
       <div>      
   
         <h3>Divisi&oacute;n Pol&iacute;tico Administrativa y &aacute;rea Urbana-Rural</h3>
         <table border="0" cellspacing="5" cellpadding="5" width="100%" id="tblbic">
         <tr bgcolor="#e8e8e8">
           <td ></td>
           <td  align="center"  >&nbsp;</td>
           <td  align="center" colspan="2"  >Sexo</td>
           <td  align="center"  >&nbsp;</td>
         </tr>
         <tr bgcolor="#e8e8e8">
           <td ></td>
           <td  align="center"   > Ambos sexos </td>
           <td align="center"  >Hombres</td>
           <td   align="center"  >Mujeres</td>
           <td   align="center"  >Indice 
             de <br />
             masculinidad</td>
         </tr>
         <tr >
           <td bgcolor="#EFEFEF"  >Región de Coquimbo&nbsp;&nbsp;</td>
           <td  align="center" bgcolor="#EFEFEF"> 603.210</td>
           <td  align="center" bgcolor="#EFEFEF"> 297.157</td>
           <td  align="center" bgcolor="#EFEFEF"> 306.053</td>
           <td  align="center" bgcolor="#EFEFEF"> 97,09 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Urbana</td>
           <td align="center" bgcolor="#FCFCFC"> 470.922</td>
           <td align="center" bgcolor="#FCFCFC"> 227.578</td>
           <td align="center" bgcolor="#FCFCFC"> 243.344</td>
           <td align="center" bgcolor="#FCFCFC"> 93,52 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Rural</td>
           <td align="center" bgcolor="#FCFCFC"> 132.288</td>
           <td  align="center" bgcolor="#FCFCFC"> 69.579</td>
           <td  align="center" bgcolor="#FCFCFC"> 62.709</td>
           <td align="center" bgcolor="#FCFCFC"> 110,96 </td>
         </tr>
         <tr >
           <td  colspan="5" >&nbsp;</td>
         </tr>
         <tr >
           <td colspan="5" bgcolor="#EFEFEF" >Provincia 
             de Elqui </td>
         </tr>
         <tr >
           <td bgcolor="#EFEFEF"  > La Serena&nbsp;&nbsp;</td>
           <td align="center" bgcolor="#EFEFEF"> 160.148</td>
           <td align="center" bgcolor="#EFEFEF"> 77.385</td>
           <td  align="center" bgcolor="#EFEFEF"> 82.763</td>
           <td align="center" bgcolor="#EFEFEF"> 93,50 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Urbana</td>
           <td  align="center" bgcolor="#FCFCFC"> 147.815</td>
           <td  align="center" bgcolor="#FCFCFC"> 71.179</td>
           <td  align="center" bgcolor="#FCFCFC"> 76.636</td>
           <td  align="center" bgcolor="#FCFCFC"> 92,88 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Rural</td>
           <td  align="center" bgcolor="#FCFCFC"> 12.333</td>
           <td  align="center" bgcolor="#FCFCFC"> 6.206</td>
           <td  align="center" bgcolor="#FCFCFC"> 6.127</td>
           <td  align="center" bgcolor="#FCFCFC"> 101,29 </td>
         </tr>
         <tr >
           <td bgcolor="#EFEFEF"  > Coquimbo&nbsp;&nbsp;</td>
           <td  align="center" bgcolor="#EFEFEF"> 163.036</td>
           <td  align="center" bgcolor="#EFEFEF"> 79.428</td>
           <td  align="center" bgcolor="#EFEFEF"> 83.608</td>
           <td  align="center" bgcolor="#EFEFEF"> 95,00 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Urbana</td>
           <td  align="center" bgcolor="#FCFCFC"> 154.316</td>
           <td  align="center" bgcolor="#FCFCFC"> 74.947</td>
           <td  align="center" bgcolor="#FCFCFC"> 79.369</td>
           <td  align="center" bgcolor="#FCFCFC"> 94,43 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Rural</td>
           <td  align="center" bgcolor="#FCFCFC"> 8.720</td>
           <td  align="center" bgcolor="#FCFCFC"> 4.481</td>
           <td  align="center" bgcolor="#FCFCFC"> 4.239</td>
           <td  align="center" bgcolor="#FCFCFC"> 105,71 </td>
         </tr>
         <tr >
           <td bgcolor="#EFEFEF"  > Andacollo&nbsp;&nbsp;</td>
           <td  align="center" bgcolor="#EFEFEF"> 10.288</td>
           <td  align="center" bgcolor="#EFEFEF"> 5.148</td>
           <td  align="center" bgcolor="#EFEFEF"> 5.140</td>
           <td  align="center" bgcolor="#EFEFEF"> 100,16 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Urbana</td>
           <td  align="center" bgcolor="#FCFCFC"> 9.444</td>
           <td  align="center" bgcolor="#FCFCFC"> 4.671</td>
           <td  align="center" bgcolor="#FCFCFC"> 4.773</td>
           <td align="center" bgcolor="#FCFCFC"> 97,86 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Rural</td>
           <td align="center" bgcolor="#FCFCFC"> 844</td>
           <td  align="center" bgcolor="#FCFCFC"> 477</td>
           <td  align="center" bgcolor="#FCFCFC"> 367</td>
           <td align="center" bgcolor="#FCFCFC"> 129,97 </td>
         </tr>
         <tr >
           <td bgcolor="#EFEFEF"  > La Higuera&nbsp;&nbsp;</td>
           <td  align="center" bgcolor="#EFEFEF"> 3.721</td>
           <td  align="center" bgcolor="#EFEFEF"> 2.084</td>
           <td  align="center" bgcolor="#EFEFEF"> 1.637</td>
           <td  align="center" bgcolor="#EFEFEF"> 127,31 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Urbana</td>
           <td  align="center" bgcolor="#FCFCFC"> 1.080</td>
           <td  align="center" bgcolor="#FCFCFC"> 553</td>
           <td align="center" bgcolor="#FCFCFC"> 527</td>
           <td  align="center" bgcolor="#FCFCFC"> 104,93 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Rural</td>
           <td  align="center" bgcolor="#FCFCFC"> 2.641</td>
           <td  align="center" bgcolor="#FCFCFC"> 1.531</td>
           <td  align="center" bgcolor="#FCFCFC"> 1.110</td>
           <td  align="center" bgcolor="#FCFCFC"> 137,93 </td>
         </tr>
         <tr >
           <td bgcolor="#EFEFEF"  > Paiguano&nbsp;&nbsp;</td>
           <td  align="center" bgcolor="#EFEFEF"> 4.168</td>
           <td align="center" bgcolor="#EFEFEF"> 2.145</td>
           <td  align="center" bgcolor="#EFEFEF"> 2.023</td>
           <td  align="center" bgcolor="#EFEFEF"> 106,03 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Urbana </td>
           <td  align="center" bgcolor="#FCFCFC">0 </td>
           <td  align="center" bgcolor="#FCFCFC">0 </td>
           <td  align="center" bgcolor="#FCFCFC">0 </td>
           <td align="center" bgcolor="#FCFCFC">0,00 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Rural </td>
           <td  align="center" bgcolor="#FCFCFC">4.168 </td>
           <td  align="center" bgcolor="#FCFCFC">2.145 </td>
           <td  align="center" bgcolor="#FCFCFC">2.023 </td>
           <td  align="center" bgcolor="#FCFCFC">106,03 </td>
         </tr>
         <tr >
           <td bgcolor="#EFEFEF"  > Vicuña&nbsp;&nbsp; </td>
           <td  align="center" bgcolor="#EFEFEF">24.010 </td>
           <td  align="center" bgcolor="#EFEFEF">12.302 </td>
           <td  align="center" bgcolor="#EFEFEF">11.708 </td>
           <td  align="center" bgcolor="#EFEFEF">105,07 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Urbana </td>
           <td  align="center" bgcolor="#FCFCFC">12.910 </td>
           <td  align="center" bgcolor="#FCFCFC">6.284 </td>
           <td  align="center" bgcolor="#FCFCFC">6.626 </td>
           <td  align="center" bgcolor="#FCFCFC">94,84 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Rural </td>
           <td  align="center" bgcolor="#FCFCFC">11.100 </td>
           <td  align="center" bgcolor="#FCFCFC">6.018 </td>
           <td  align="center" bgcolor="#FCFCFC">5.082 </td>
           <td  align="center" bgcolor="#FCFCFC">118,42 </td>
         </tr>
         <tr >
           <td  colspan="5">&nbsp;</td>
         </tr>
         <tr >
           <td  colspan="5" bgcolor="#EFEFEF"> Provincia 
             de Choapa </td>
         </tr>
         <tr >
           <td bgcolor="#EFEFEF"  > Illapel&nbsp;&nbsp; </td>
           <td  align="center" bgcolor="#EFEFEF">30.355 </td>
           <td  align="center" bgcolor="#EFEFEF">14.940 </td>
           <td  align="center" bgcolor="#EFEFEF">15.415 </td>
           <td  align="center" bgcolor="#EFEFEF">96,92 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Urbana </td>
           <td  align="center" bgcolor="#FCFCFC">21.826 </td>
           <td  align="center" bgcolor="#FCFCFC">10.395 </td>
           <td align="center" bgcolor="#FCFCFC">11.431 </td>
           <td align="center" bgcolor="#FCFCFC">90,94 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >       Rural </td>
           <td  align="center" bgcolor="#FCFCFC">8.529 </td>
           <td  align="center" bgcolor="#FCFCFC">4.545 </td>
           <td  align="center" bgcolor="#FCFCFC">3.984 </td>
           <td  align="center" bgcolor="#FCFCFC">114,08 </td>
         </tr>
         <tr >
           <td bgcolor="#EFEFEF"  > Canela&nbsp;&nbsp; </td>
           <td  align="center" bgcolor="#EFEFEF">9.379 </td>
           <td  align="center" bgcolor="#EFEFEF">4.737 </td>
           <td  align="center" bgcolor="#EFEFEF">4.642 </td>
           <td  align="center" bgcolor="#EFEFEF">102,05 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Urbana </td>
           <td  align="center" bgcolor="#FCFCFC">1.744 </td>
           <td  align="center" bgcolor="#FCFCFC">865 </td>
           <td  align="center" bgcolor="#FCFCFC">879 </td>
           <td  align="center" bgcolor="#FCFCFC">98,41 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Rural </td>
           <td  align="center" bgcolor="#FCFCFC">7.635 </td>
           <td align="center" bgcolor="#FCFCFC">3.872 </td>
           <td  align="center" bgcolor="#FCFCFC">3.763 </td>
           <td  align="center" bgcolor="#FCFCFC">102,90 </td>
         </tr>
         <tr >
           <td bgcolor="#EFEFEF"  > Los Vilos&nbsp;&nbsp; </td>
           <td  align="center" bgcolor="#EFEFEF">17.453 </td>
           <td  align="center" bgcolor="#EFEFEF">8.858 </td>
           <td  align="center" bgcolor="#EFEFEF">8.595 </td>
           <td  align="center" bgcolor="#EFEFEF">103,06 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Urbana </td>
           <td  align="center" bgcolor="#FCFCFC">12.859 </td>
           <td  align="center" bgcolor="#FCFCFC">6.342 </td>
           <td  align="center" bgcolor="#FCFCFC">6.517 </td>
           <td  align="center" bgcolor="#FCFCFC">97,31 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Rural </td>
           <td align="center" bgcolor="#FCFCFC">4.594 </td>
           <td align="center" bgcolor="#FCFCFC">2.516 </td>
           <td  align="center" bgcolor="#FCFCFC">2.078 </td>
           <td align="center" bgcolor="#FCFCFC">121,08 </td>
         </tr>
         <tr >
           <td bgcolor="#EFEFEF"  > Salamanca&nbsp;&nbsp; </td>
           <td  align="center" bgcolor="#EFEFEF">24.494 </td>
           <td  align="center" bgcolor="#EFEFEF">13.043 </td>
           <td  align="center" bgcolor="#EFEFEF">11.451 </td>
           <td  align="center" bgcolor="#EFEFEF">113,90 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Urbana </td>
           <td  align="center" bgcolor="#FCFCFC">12.689 </td>
           <td  align="center" bgcolor="#FCFCFC">6.285 </td>
           <td align="center" bgcolor="#FCFCFC">6.404 </td>
           <td  align="center" bgcolor="#FCFCFC">98,14 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >       Rural </td>
           <td  align="center" bgcolor="#FCFCFC">11.805 </td>
           <td  align="center" bgcolor="#FCFCFC">6.758 </td>
           <td  align="center" bgcolor="#FCFCFC">5.047 </td>
           <td  align="center" bgcolor="#FCFCFC">133,90 </td>
         </tr>
         <tr>
           <td  colspan="5" >&nbsp;</td>
         </tr>
         <tr >
           <td  colspan="5" bgcolor="#EFEFEF" > Provincia 
             de Limarí </td>
         </tr>
         <tr >
           <td bgcolor="#EFEFEF"  > Ovalle&nbsp;&nbsp; </td>
           <td  align="center" bgcolor="#EFEFEF">98.089 </td>
           <td align="center" bgcolor="#EFEFEF">47.805 </td>
           <td  align="center" bgcolor="#EFEFEF">50.284 </td>
           <td  align="center" bgcolor="#EFEFEF">95,07 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Urbana </td>
           <td  align="center" bgcolor="#FCFCFC">73.790 </td>
           <td  align="center" bgcolor="#FCFCFC">35.052 </td>
           <td  align="center" bgcolor="#FCFCFC">38.738 </td>
           <td  align="center" bgcolor="#FCFCFC">90,48 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Rural </td>
           <td  align="center" bgcolor="#FCFCFC">24.299 </td>
           <td  align="center" bgcolor="#FCFCFC">12.753 </td>
           <td align="center" bgcolor="#FCFCFC">11.546 </td>
           <td  align="center" bgcolor="#FCFCFC">110,45 </td>
         </tr>
         <tr >
           <td bgcolor="#EFEFEF"  > Combarbalá&nbsp;&nbsp; </td>
           <td  align="center" bgcolor="#EFEFEF">13.483 </td>
           <td  align="center" bgcolor="#EFEFEF">6.695 </td>
           <td  align="center" bgcolor="#EFEFEF">6.788 </td>
           <td  align="center" bgcolor="#EFEFEF">98,63 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Urbana </td>
           <td  align="center" bgcolor="#FCFCFC">5.494 </td>
           <td  align="center" bgcolor="#FCFCFC">2.664 </td>
           <td  align="center" bgcolor="#FCFCFC">2.830 </td>
           <td  align="center" bgcolor="#FCFCFC">94,13 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Rural </td>
           <td  align="center" bgcolor="#FCFCFC">7.989 </td>
           <td  align="center" bgcolor="#FCFCFC">4.031 </td>
           <td  align="center" bgcolor="#FCFCFC">3.958 </td>
           <td  align="center" bgcolor="#FCFCFC">101,84 </td>
         </tr>
         <tr >
           <td bgcolor="#EFEFEF"  > Monte Patria&nbsp;&nbsp; </td>
           <td  align="center" bgcolor="#EFEFEF">30.276 </td>
           <td  align="center" bgcolor="#EFEFEF">15.351 </td>
           <td  align="center" bgcolor="#EFEFEF">14.925 </td>
           <td  align="center" bgcolor="#EFEFEF">102,85 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Urbana </td>
           <td  align="center" bgcolor="#FCFCFC">13.340 </td>
           <td  align="center" bgcolor="#FCFCFC">6.615 </td>
           <td  align="center" bgcolor="#FCFCFC">6.725 </td>
           <td  align="center" bgcolor="#FCFCFC">98,36 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Rural </td>
           <td  align="center" bgcolor="#FCFCFC">16.936 </td>
           <td  align="center" bgcolor="#FCFCFC">8.736 </td>
           <td  align="center" bgcolor="#FCFCFC">8.200 </td>
           <td  align="center" bgcolor="#FCFCFC">106,54 </td>
         </tr>
         <tr >
           <td bgcolor="#EFEFEF"  > Punitaqui&nbsp;&nbsp; </td>
           <td  align="center" bgcolor="#EFEFEF">9.539 </td>
           <td  align="center" bgcolor="#EFEFEF">4.791 </td>
           <td  align="center" bgcolor="#EFEFEF">4.748 </td>
           <td  align="center" bgcolor="#EFEFEF">100,91 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Urbana </td>
           <td  align="center" bgcolor="#FCFCFC">3.615 </td>
           <td  align="center" bgcolor="#FCFCFC">1.726 </td>
           <td  align="center" bgcolor="#FCFCFC">1.889 </td>
           <td  align="center" bgcolor="#FCFCFC">91,37 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Rural </td>
           <td  align="center" bgcolor="#FCFCFC">5.924 </td>
           <td  align="center" bgcolor="#FCFCFC">3.065 </td>
           <td  align="center" bgcolor="#FCFCFC">2.859 </td>
           <td align="center" bgcolor="#FCFCFC">107,21 </td>
         </tr>
         <tr >
           <td bgcolor="#EFEFEF"  > Río Hurtado&nbsp;&nbsp; </td>
           <td  align="center" bgcolor="#EFEFEF">4.771 </td>
           <td  align="center" bgcolor="#EFEFEF">2.445 </td>
           <td  align="center" bgcolor="#EFEFEF">2.326 </td>
           <td  align="center" bgcolor="#EFEFEF">105,12 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Urbana </td>
           <td  align="center" bgcolor="#FCFCFC">0 </td>
           <td  align="center" bgcolor="#FCFCFC">0 </td>
           <td  align="center" bgcolor="#FCFCFC">0 </td>
           <td  align="center" bgcolor="#FCFCFC">0,00 </td>
         </tr>
         <tr >
           <td bgcolor="#FCFCFC"  >      Rural </td>
           <td  align="center" bgcolor="#FCFCFC">4.771 </td>
           <td  align="center" bgcolor="#FCFCFC">2.445 </td>
           <td  align="center" bgcolor="#FCFCFC">2.326 </td>
           <td align="center" bgcolor="#FCFCFC">105,12 </td>
         </tr>
       </table>
       <p>Fuente: Censo 2002</p>
  </div>
       </td>
   </tr>
   
   </table>
   </td>
</tr>
</table>

 <p>
   <?php elseif($id == 7):?>
 </p>
 <h2>MAPA REGIONAL </h2>
 <div id="muestraTexto">      
       
       <p><img src="<?php echo base_url(); ?>imagenes/mapas/region.jpg" class="contenido-img" />
              Correspondiente a una composición de mapa regional exportada a JPG y que incluye una gran cantidad de información característica de nuestra región, también incluye el modelo de elevación utilizado como fondo.</p>
         <h4>Documento Disponible a descargar</h4>
       
          <a id="descarga-comprimido" href="<?php echo base_url(); ?>descargas/mapas/region.zip" title=" Descargar Mapa Regional, comprimido con WINZIP, tama&ntilde;o 2.25MB ">Mapa Regional [.zip 2.25MB] </a>
      
  </div>

 <p>
   <?php elseif($id == 8):?>
 </p>
 <h2>MAPAS COMUNALES</h2>
 <table width="100%" border="0" cellspacing="0" cellpadding="3">
   <tr>
     <td><img class="contenido-img" src="<?php echo base_url(); ?>imagenes/mapas/serena.jpg" /></td>
     <td><img class="contenido-img" src="<?php echo base_url(); ?>imagenes/mapas/la_higuera.jpg" /></td>
     <td><img class="contenido-img" src="<?php echo base_url(); ?>imagenes/mapas/coquimbo.jpg" /></td>
     <td><img class="contenido-img" src="<?php echo base_url(); ?>imagenes/mapas/andacollo.jpg" /></td>
     <td><img class="contenido-img" src="<?php echo base_url(); ?>imagenes/mapas/vicuna.jpg" /></td>
   </tr>
   <tr>
     <td valign="top"><a href="<?php echo base_url(); ?>descargas/mapas/serena.jpg" title=" Descargar Mapa de La Serena, imagen JPG, tama&ntilde;o 0.17MB "><strong>La Serena</strong><br />
[jpg 0.17MB] | Descargar </a></td>
     <td valign="top"><a  href="<?php echo base_url(); ?>descargas/mapas/la_higuera.jpg" title=" Descargar Mapa de La Higuera, imagen JPG, tama&ntilde;o 0.19MB "><strong>La Higuera</strong><br />
[jpg 0.19MB] | Descargar </a></td>
     <td valign="top"><a href="<?php echo base_url(); ?>descargas/mapas/coquimbo.jpg" title=" Descargar Mapa de La Higuera, imagen JPG, tama&ntilde;o 0.15MB "><strong>Coquimbo</strong><br />
[jpg 0.15MB] | Descargar</a></td>
     <td valign="top"><a  href="<?php echo base_url(); ?>descargas/mapas/andacollo.jpg" title=" Descargar Mapa de Andacollo, imagen JPG, tama&ntilde;o 0.13MB "><strong>Andacollo</strong><br />
[jpg 0.17MB]| Descargar</a></td>
     <td valign="top"><a href="<?php echo base_url(); ?>descargas/mapas/vicuna.jpg" title=" Descargar Mapa de Vicu&ntilde;a, imagen JPG, tama&ntilde;o 0.25MB "><strong>Vicu&ntilde;a</strong><br />
[jpg 0.19MB] | Descargar</a></td>
   </tr>
   <tr>
     <td valign="top">&nbsp;</td>
     <td valign="top">&nbsp;</td>
     <td valign="top">&nbsp;</td>
     <td valign="top">&nbsp;</td>
     <td valign="top">&nbsp;</td>
   </tr>
   <tr>
     <td><img class="contenido-img" src="<?php echo base_url(); ?>imagenes/mapas/paiguano.jpg" /></td>
     <td><img class="contenido-img" src="<?php echo base_url(); ?>imagenes/mapas/ovalle.jpg" /></td>
     <td><img class="contenido-img" src="<?php echo base_url(); ?>imagenes/mapas/rio_hurtado.jpg" /></td>
     <td><img class="contenido-img" src="<?php echo base_url(); ?>imagenes/mapas/monte_patria.jpg" /></td>
     <td><img class="contenido-img" src="<?php echo base_url(); ?>imagenes/mapas/combarbala.jpg" /></td>
   </tr>
   <tr>
     <td valign="top"><a  href="<?php echo base_url(); ?>descargas/mapas/paiguano.jpg" title=" Descargar Mapa de Paiguano, imagen JPG, tama&ntilde;o 0.15MB "><strong>Paihuano</strong><br />
[jpg 0.15MB] | Descargar</a></td>
     <td valign="top"><a href="<?php echo base_url(); ?>descargas/mapas/ovalle.jpg" title=" Descargar Mapa de Ovalle, imagen JPG, tama&ntilde;o 0.13MB "><strong>Ovalle</strong><br />
[jpg 0.20MB] | Descargar </a></td>
     <td valign="top"><a href="<?php echo base_url(); ?>descargas/mapas/rio_hurtado.jpg" title=" Descargar Mapa de R&iacute;o Hurtado, imagen JPG, tama&ntilde;o 0.19MB "><strong>R&iacute;o Hurtado</strong><br />
[jpg 0.19MB] | Descargar </a></td>
     <td valign="top"><a href="<?php echo base_url(); ?>descargas/mapas/monte_patria.jpg" title=" Descargar Mapa de Monte Patria, imagen JPG, tama&ntilde;o 0.25MB "><strong>Monte Patria</strong><br />
[jpg 0.25MB] 1 Descargar </a></td>
     <td valign="top"><a  href="<?php echo base_url(); ?>descargas/mapas/combarbala.jpg" title=" Descargar Mapa de Combarbal&aacute;, imagen JPG, tama&ntilde;o 0.21MB "><strong>Combarbal&aacute;</strong><br />
[jpg 0.21MB] | Descargar </a></td>
   </tr>
   <tr>
     <td valign="top">&nbsp;</td>
     <td valign="top">&nbsp;</td>
     <td valign="top">&nbsp;</td>
     <td valign="top">&nbsp;</td>
     <td valign="top">&nbsp;</td>
   </tr>
   <tr>
     <td><img class="contenido-img" src="<?php echo base_url(); ?>imagenes/mapas/punitaqui.jpg" /></td>
     <td><img class="contenido-img" src="<?php echo base_url(); ?>imagenes/mapas/illapel.jpg" border="0" vspace="1" hspace="1" align="left" alt="" /></td>
     <td><img class="contenido-img" src="<?php echo base_url(); ?>imagenes/mapas/salamanca.jpg" /></td>
     <td><img class="contenido-img" src="<?php echo base_url(); ?>imagenes/mapas/los_vilos.jpg" /></td>
     <td><img class="contenido-img" src="<?php echo base_url(); ?>imagenes/mapas/canela.jpg" /></td>
   </tr>
   <tr>
     <td valign="top"><a  href="<?php echo base_url(); ?>descargas/mapas/punitaqui.jpg" title=" Descargar Mapa de Punitaqui, imagen JPG, tama&ntilde;o 0.14MB "><strong>Punitaqui</strong><br />
[jpg 0.14MB]| Descargar </a></td>
     <td valign="top"><a  href="<?php echo base_url(); ?>descargas/mapas/illapel.jpg" title=" Descargar Mapa de Illapel, imagen JPG, tama&ntilde;o 0.21MB "><strong>Illapel</strong><br />
[jpg 0.21MB] | Descargar </a></td>
     <td valign="top"><a  href="<?php echo base_url(); ?>descargas/mapas/salamanca.jpg" title=" Descargar Mapa de Salamanca, imagen JPG, tama&ntilde;o 0.24MB "><strong>Salamanca</strong><br />
[jpg 0.24MB] | Descargar </a></td>
     <td valign="top"><a  href="<?php echo base_url(); ?>descargas/mapas/los_vilos.jpg" title=" Descargar Mapa de Los Vilos, imagen JPG, tama&ntilde;o 0.22MB "><strong>Los Vilos</strong><br />
[jpg 0.22MB] | Descargar </a></td>
     <td valign="top"><a  href="<?php echo base_url(); ?>descargas/mapas/canela.jpg" title=" Descargar Mapa de Canela, imagen JPG, tama&ntilde;o 0.19MB "><strong>Canela</strong><br />
[jpg 0.19MB] | Descargar </a></td>
   </tr>
 </table>
 </td>
 </tr>
 </table>
 </td>
 </tr>
 </table>
 <?php endif;?>
<div id="fix" style="clear:both"></div>

</div>

</div>

<div id="contenido-derecha">
<div id="menu-sidebar">
  
  <ul>
	 <li><a id="titulo">Municipalidades Provincia de Elqui</a></li>

    <?php foreach($serena as $se):?>
    <li style="cursor:pointer" ><a onclick="comuna('<?php echo $se['id_com']?>')" href="#"><?php echo $se['comuna']?></a></li>
    <?php endforeach;?>

  <?php foreach($coquimbo as $se):?>
    <li style="cursor:pointer" ><a onclick="comuna('<?php echo $se['id_com']?>')" href="#">  <?php echo $se['comuna']?></a></li>
    <?php endforeach;?>

    <?php foreach($higuera as $se):?>
    <li style="cursor:pointer"><a  onclick="comuna('<?php echo $se['id_com']?>')" href="#">  <?php echo $se['comuna']?></a></li>
    <?php endforeach; ?>

    <?php foreach($vicuña as $se):?>
    <li style="cursor:pointer" ><a onclick="comuna('<?php echo $se['id_com']?>')" href="#">  <?php echo $se['comuna']?></a></li>
    <?php endforeach;?>

   <?php foreach($paihuano as $se):?>
   <li style="cursor:pointer" ><a onclick="comuna('<?php echo $se['id_com']?>')" href="#">  <?php echo $se['comuna']?></a></li>
   <?php endforeach;?>

   <?php foreach($anacollo as $se):?>
    <li style="cursor:pointer" ><a onclick="comuna('<?php echo $se['id_com']?>')" href="#">  <?php echo $se['comuna']?></a></li>
    <?php endforeach;?>

</ul>

<li><a id="titulo">Municipalidades Provincia de Limari</a></li>
<ul>
	<?php foreach($ovalle as $se):?>
    <li style="cursor:pointer" ><a onclick="comuna('<?php echo $se['id_com']?>')" href="#">  <?php echo $se['comuna']?></a></li>
    <?php endforeach;?>

    <?php foreach($monre as $se):?>
    <li style="cursor:pointer" ><a onclick="comuna('<?php echo $se['id_com']?>')" href="#">  <?php echo $se['comuna']?></a></li>
    <?php endforeach;?>

     <?php foreach($hurtado as $se):?>
    <li style="cursor:pointer" ><a onclick="comuna('<?php echo $se['id_com']?>')" href="#">  <?php echo $se['comuna']?></a></li>
    <?php endforeach;?>

    <?php foreach($punitaqui as $se):?>
    <li style="cursor:pointer" ><a onclick="comuna('<?php echo $se['id_com']?>')" href="#">  <?php echo $se['comuna']?></a></li>
    <?php endforeach;?>

    <?php foreach($combarbala as $se):?>
    <li style="cursor:pointer" ><a onclick="comuna('<?php echo $se['id_com']?>')" href="#">  <?php echo $se['comuna']?></a></li>
    <?php endforeach;?>
  </ul>

    <li><a id="titulo">Municipalidades Provincia de Choapa</a></li>

<ul>

    <?php foreach($illapel as $se):?>
    <li style="cursor:pointer" ><a onclick="comuna('<?php echo $se['id_com']?>')" href="#">  <?php echo $se['comuna']?></a></li>
    <?php endforeach;?>

    <?php foreach($vilos as $se):?>
    <li style="cursor:pointer" ><a onclick="comuna('<?php echo $se['id_com']?>')" href="#">  <?php echo $se['comuna']?></a></li>
    <?php endforeach;?>

    <?php foreach($salamanca as $se):?>
    <li style="cursor:pointer"><a onclick="comuna('<?php echo $se['id_com']?>')" href="#">   <?php echo $se['comuna']?></a></li>
    <?php endforeach;?>

    <?php foreach($canela as $se):?>
    <li style="cursor:pointer"><a onclick="comuna('<?php echo $se['id_com']?>')" href="#">  <?php echo $se['comuna']?> </a></li>
    <?php endforeach;?>

  </ul>

<li><a id="titulo">Caracteristicas de la Region</a></li>

<ul>

  <li ><a href="<?php echo BASE_URI?>municipalidades/2">Ubicaci&oacute;n</a></li>
  <li ><a href="<?php echo BASE_URI?>municipalidades/3">Clima</a></li>
  <li ><a href="<?php echo BASE_URI?>municipalidades/4">Geograf&iacute;a</a></li>
  <li ><a href="<?php echo BASE_URI?>municipalidades/5">Flora y Fauna</a></li>
  <li ><a href="<?php echo BASE_URI?>municipalidades/6">Demograf&iacute;a</a></li>
</ul>

<li><a id="titulo">Mapas Regionales</a></li>
<ul>
  <li ><a href="<?php echo BASE_URI?>municipalidades/7">Mapa Regional</a></li>
  <li ><a href="<?php echo BASE_URI?>municipalidades/8">Mapas Comunales</a></li>
</ul>

</div>
<div id="fix" style="clear:both"></div>


