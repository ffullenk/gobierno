
<div id="noticias">
  <div class="categoria"> <a href="<?php echo BASE_URI?>">P&Aacute;gina Principal</a>&nbsp;&gt;&nbsp;
    Serem&iacute;as </div>
          <h1> SEREMIAS - DIRECTORIO SECRETAR&Iacute;AS REGIONALES MINISTERIALES </h1>
          <hr />
		  <br/>
          <?php //var_dump($seremis)?>
          <?php foreach($seremis as $se):?>
          <div id="integrantes">
            <div id="foto-integrante">
              <img src="<?php echo base_url(); ?>jefes/fotos/<?php echo $se['foto']?>" alt="<?php echo $se['acronimo']?>"   width="90" height="90" />
              <div id="nombre-integrante">
                <a href="<?php echo BASE_URI?>seremis-vista/<?php echo $se['id']?>/0"><?php echo $se['acronimo']?> | Relacionados</a>

                 </div>
            </div>
          </div>
	     <?php endforeach;?>


	
		  <div id="fix" style="clear:both"></div>
</div>