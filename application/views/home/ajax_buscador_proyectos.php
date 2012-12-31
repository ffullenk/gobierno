<?php if (empty($user['name'] )): ?>
	<h3>No hay resultados</h3>
<?php else : ?>
<h3>Resultado de la B&Uacute;squeda </h3>
<p>N&deg; Registro(s) Encontrado(s) <?php echo $cantidad;?></p>

<?php foreach($user['name'] as $p): ?>

  	<div id="busqueda-noticias">

		<?php echo anchor('banco-vista/'.$p['id'], $p['nombre']); ?>

  	</div>
  

<?php endforeach; ?>

<div id="fix" style="clear:both"></div>
<div id="ajax_paging" > <?php echo $pagination; ?> </div>
<?php endif;?>

<div id="fix" style="clear:both"></div>
<div id="fix" style="clear:both"></div>
