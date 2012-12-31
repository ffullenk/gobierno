<div id="slider">

    <div id="slides">
        <div class="slides_container">

          <?php for($i = 1; $i < 3; $i++){?>
          <div  class="slide">
            
          <a href="#" target="_blank">

              <img src="<?php echo base_url(); ?>imagenes/slider/slide<?php echo $i?>.jpg"  alt="">
            

            <div class="caption" style="bottom:0">
                <p>Ejemplo de titulo</p>

            </div>

            </a>
          </div>
        <?php }?>
      
        </div>
        <a href="#" class="next"><img src="<?php echo base_url(); ?>imagenes/arrow-next.png"  alt="Arrow Next"></a>
        <a href="#" class="prev"><img src="<?php echo base_url(); ?>imagenes/arrow-prev.png"  alt="Arrow Prev"></a>
        
      </div>

  </div>
  <div id="divisor"></div>
  <div id="main-index">
  


<div id="noticia-principal">
<?php foreach($noticias as $n): ?>
		<div id="video">
			<?php foreach($imagenes_noticias[$n['id']] as $gn):?>
				<img src="<?php echo base_url(); ?>imagenes/breves/brv_<?php echo $n['id'];?>/<?php echo $gn['nombre_archivo'];?>"  alt="<?php echo $gn['nombre_archivo'];?>" width="230" height="153" >
			<?php endforeach;?>

		</div>
		<div class="info">

			<div class="categoria">Noticias</div>
			<h2>
				 <?php echo anchor('noticias-vista/'.$n['id'].'/1', $n['titulo']); ?>
			</h2>

			<p class="texto-noticias">
			 	<?php echo substr(strip_tags($n['encabezado']),0,400).'....';?>
			</p>
		</div>
<?php endforeach; ?>		
</div>

<div id="divisor"></div>
		

<div id="contenido-izquierda-index">
		
		<?php foreach($fuentes as $f): ?>

		<div class="noticias-secundarias">
			<div class="foto-noticia">
				<?php foreach($imagenes_fuentes[$f['id']] as $gf):?>
					<img src="<?php echo base_url(); ?>imagenes/breves/brv_<?php echo $f['id'];?>/<?php echo $gf['nombre_archivo'];?>"  alt="foto noticia" width="122" height="122" >
				<?php endforeach; ?>
			</div>

			<div class="categoria">fuente</div>
			
			<div class="titulo-noticias-secundarias">
				<h2>
					 <?php echo anchor('noticias-vista/'.$f['id'].'/1', $f['titulo']); ?>
				</h2>
			</div>
			<div class="fecha-noticia"><?php echo fecha_formato_espanol_gore($f['fecha'])?> | Santiago</div>
			<p class="texto-noticias"> 
				<?php echo substr(strip_tags($f['encabezado']),0,300).'....';?>
			</p>
		</div>
			
		<div id="divisor"></div>		
	 
	   <?php endforeach;?>

</div>
	    
<div id="contenido-derecha-index">
		
	<?php foreach($breves as $breve):?>
				 
	<div class="noticias-sidebar">
		 
		<div class="foto-noticia-sidebar">
			  <?php foreach($imagenes_breves[$breve['id_breves']] as $gb):?>
            	<img  alt="foto noticias"src="<?php echo base_url(); ?>imagenes/breves/brv_<? echo $breve['id_breves'];?>/<?php echo $gb["nombre_archivo"]?>" width="73" height="73" >
             <?php endforeach; ?>   
		</div>
		<div class="info-noticias-sidebar">
			<h5>
			   <?php echo anchor('noticias-vista/'.$breve['id_breves'].'/2', ajustatexto_titular_secundaria($breve['titulo'])); ?>
			</h5>
			<p class="parrafo-noticia-sidebar">
				<?php echo substr(strip_tags($breve['cuerpo']),0,150).'....';?>
			</p>
		</div>	
	</div>

	 <?php endforeach;?>

			   
</div>


    </div>


