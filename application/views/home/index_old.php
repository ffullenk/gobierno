		<div id="noticia-principal">
			<?php foreach($noticias as $n): ?>	
			<div id="foto-noticia-principal">
			<?php foreach($imagenes_noticias[$n['id']] as $gn):?>
				<img src="<?php echo base_url(); ?>imagenes/breves/brv_<?php echo $n['id'];?>/<?php echo $gn['nombre_archivo'];?>"  alt="<?php echo $gn['nombre_archivo'];?>" width="230" height="153" >
			<?php endforeach;?>
			</div>
			
			<div class="categoria">Noticias</div>
			<h2><?php echo $n['titulo']?> </h2>
			<hr>
			<div class="fecha-noticia"><?php echo fecha_formato_espanol_gore($n['fecha'])?> | Santiago</div>
			<p class="texto-noticias">
				<?php echo ajustatexto_noticias_breves(strip_tags($n['encabezado']));?>
			</p>
			 <?php echo anchor('noticias-vista/'.$n['id'].'/1', 'ver mas (+)', array('class' => 'btn-vermas')); ?>
			<?php endforeach; ?>
			<div class="fix" style="clear:both"></div>
 
		</div>
				 	 <div id="fix" style="clear:both"></div>
		
		<?php foreach($fuentes as $f): ?>		 	 
		<div class="noticias-secundarias">
		
		<div class="foto-noticia">
			<?php foreach($imagenes_fuentes[$f['id']] as $gf):?>
			<img src="<?php echo base_url(); ?>imagenes/breves/brv_<?php echo $f['id'];?>/<?php echo $gf['nombre_archivo'];?>"  alt="foto noticia" width="122" height="122" >
			<?php endforeach; ?>
		</div>

		<div class="categoria"><?php echo $f['fuente']?></div>
		<h2><?php echo $f['titulo']?> </h2>
		<hr>
		<div class="fecha-noticia"><?php echo fecha_formato_espanol_gore($f['fecha'])?> | Santiago</div>
		<p class="texto-noticias"> <?php echo ajustatexto_noticias_breves(strip_tags($f['encabezado']));?>.</p>
			 <?php echo anchor('noticias-vista/'.$f['id'].'/1', 'ver mas (+)', array('class' => 'btn-vermas')); ?>

			</div>
				
		<?php endforeach; ?>
	

	<div id="carrusel-noticias">
	<div class="categoria">Gobierno en Accion</div>
	<hr>
		<div class="jMyCarousel">

			<ul>
		  		<?php foreach($galeria as $g):?>	
		  			
			<li ><a href="#">
				<img  alt="foto noticia" width="122px" height="122px" src="<?php echo base_url(); ?>imagenes/breves/brv_8548/noticia_25-10-2010_img_5516.jpg" ></a></li>
				<?php endforeach;?>
			</ul>

		</div>	


	</div>	





	    <div id="breves">
	<div class="categoria">noticias BREVES</div>
	<hr>

	<?php foreach($breves as $breve):?>

          <div class="integrantes-comision">
            <div class="foto-noticia-breve">
            <?php foreach($imagenes_breves[$breve['id_breves']] as $gb):?>
            	<img  alt="foto noticias"src="<?php echo base_url(); ?>imagenes/breves/brv_<? echo $breve['id_breves'];?>/<?php echo $gb["nombre_archivo"]?>" width="73" height="73" >
            <?php endforeach; ?>
            </div>
			<div class="fecha-noticia"> <?php echo fecha_formato_espanol_gore($breve['fecha'])?> </div>
			<h5>
				<?php echo anchor('noticias-vista/'.$breve['id_breves'].'/2', ajustatexto_titular_secundaria($breve['titulo'])); ?>

			</h5>
			<p class=""><?php echo ajustatexto_noticias_breves(strip_tags($breve['cuerpo']));?></p>
          </div>
 
    <?php endforeach;?>

	<div class="fix" style="clear:both"></div>
	</div>




