<?php if(empty($user['name'])):?>

<h2>No hay resultados</h2>

<?php else: ?>
<br />
 <?php foreach($user['name'] as $f): ?>      
    <div id="noticia-buscador">
    <div class="foto-noticia">

      <img src="<?php echo base_url(); ?>imagenes/noticia1.jpg"  alt="Imagen noticia" width="122" height="122"/>
    </div>

    <div class="categoria"><?php echo $f['fuente']?></div>
    <div class="titulo-noticias-secundarias"><h2><?php echo anchor('noticias-vista/'.$f['id'].'/1', $f['titulo'], array('class' => '')); ?></h2></div>
    <div class="fecha-noticia"><?php echo fecha_formato_espanol_gore($f['fecha'])?> | Santiago</div>
    <p class="texto-noticias"> <?php echo ajustatexto_noticias_breves(strip_tags($f['encabezado']));?>.</p>

    <?php if(isset($f['id'])):?>

        <?php $id=$f['id']; 
            $tabla=1;
        ?>

    <?php else: ?>
    
        <?php $id=$f['id_breves']; 
              $tabla=2;
        ?>
    
    <?php endif;?>


<?php /*?>    <?php echo anchor('noticias-vista/'.$id.'/'.$tabla, 'ver mas (+)', array('class' => 'btn-vermas'));?>
<?php */?>    </div>
        
    <?php endforeach; ?>

  

    <div id="fix" style="clear:both"></div>
  
     <div id="ajax_paging" >
          <?php echo $pagination; ?>
       </div> 

<?php endif;?>

