  <?php for($i=0;$i<sizeof($fotos);$i++){?>

          <a class="fancybox" href="<?php echo base_url(); ?><?php echo $fotos[$i];?>"  title="">

            <img src="<?php echo base_url(); ?><?php echo $fotos[$i];?>" alt="" width="100" height="100" class="fancybox" />
          </a> 
        <?php }?>