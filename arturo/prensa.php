<div id="main">
<div id="noticias">
  <script>
  $(function() {
    applyPagination();

    function applyPagination() {
      $("#ajax_paging a").click(function() {
        var url = $(this).attr("href");
        $.ajax({
          type: "POST",
          data: "ajax=1",
          url: url,
          beforeSend: function() {
            $("#resultadoBusqueda").html("");
            $("#resultadoBusqueda").html("Cargando");
          },
          success: function(msg) {
            $("#resultadoBusqueda").html(msg);
            applyPagination();
          }
        });
        return false;
      });


      $("#ajax_paging a").live('click',function() {
        var url = $(this).attr("href");
        $.ajax({
          type: "POST",
          data: "ajax=1",
          url: url,
          beforeSend: function() {
            $("#resultadoBusqueda").html("");
            $("#resultadoBusqueda").html("Cargando");
          },
          success: function(msg) {
            $("#resultadoBusqueda").html(msg);
            applyPagination();
          }
        });
        return false;
      });

    }
  });

$(document).ready(function(){

	$( "#frm_fecha" ).datepicker({
			
			altFormat: 'yy-mm-dd',
			dateFormat:'yy-mm-dd'
	});
	
	$("#btnBuscar").click(function() {

		var base='<?php echo BASE_PATH ?>';

	    var url = base+"/buscadorNoticias"; // the script where you handle the form input.
		//alert($("#mes").val());
		var mes=$("#mes").val();
		var fecha=$("#frm_fecha").val();
		var year=$("#year").val();
		var fuente=$("#fuente").val();
		var cadena=$("#cadena").val();

	    $.ajax({
	           type: "POST",
	           url: url,
	           data: "mes="+mes+"&fecha="+fecha+"&year="+year+"&fuente="+fuente+"&cadena="+cadena, // serializes the form's elements.
	           success: function(data)
	           {
	               //alert(data); 
	               $("#resultadoBusqueda").html(data);
	           }
	         });
	    
	    return false; // avoid to execute the actual submit of the form.
	});

})

  	

 </script>


		

<div id="categoria"> <a href="http://www.gorecoquimbo.gob.cl/principal.php">P&aacute;gina Principal</a>&nbsp;&gt;&nbsp;<a href="http://www.gorecoquimbo.gob.cl/prensa.php">Noticias</a>&nbsp;&gt;&nbsp;Todas las Noticias </div>
<h1>BUSCADOR DE NOTICIAS</h1>		
<hr />
<form method="post" action="#" id="form-busqueda-noticias">
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td width="33%">SELECCIONE MES DE LA NOTICIA :</td>
      <td width="67%">
        <select name="mes" id="mes">
			<option value="0">Todos</option>
				<?php foreach($user['meses'] as $mes):?>
				<option value="<?php echo $mes['Id'];?>"><?php  echo $mes['nombre'];?></option>
			<?php endforeach;?>
		</select>
     </td>
    </tr>
    <tr>
      <td>SELECCIONE A&Ntilde;O DE LA NOTICIA :</td>
      <td><select name="year" id="year">
		<option value="0">Todos</option>
		<?php
		for ($i=2003;$i<=date("Y");$i++){
								
			echo "<option value='$i'>$i</option>";
													
			}
		?>
		</select></td>
    </tr>
    <tr>
      <td>FUENTE</td>
      <td><select name="fuente" id="fuente">
		<option value="0">Seleccione Fuente</option>
		<?php foreach($user['fuentes'] as $fuente):?>
        <option value="<?php echo $fuente['idfuente'];?>"><?php  echo substr( trim( $fuente["fuente"]), 0, 20 );?></option>
      <?php endforeach;?>
	
		</select></td>
    </tr>
    <tr>
      <td>FECHA</td>
      <td>
      	<input name="frm_fecha" type="text"  class="textoselectnav" id="frm_fecha" title=" Introduza una fecha a buscar entre las Noticias. "  size="14" maxlength="10" />

      </td>
    </tr>
    <tr>
      <td>PALABRA CLAVE</td>
      <td><input name="cadena" type="text"  class="textoselectnav" id="cadena" size="25" maxlength="255" title=" Introduzca Cadena de Texto a Buscar de entre los T&iacute;tulos de Noticias Existentes. " />
</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="Submit" type="submit" id="btnBuscar" class="btn-vermas" value="Buscar" /></td>
    </tr>
  </table>

 </form>
<div id="fix" style="clear:both"></div>
<div id="resultadoBusqueda">
<?php foreach($user['name'] as $noticia): ?>

	<div id="resultado-busqueda-noticias">
		<div id="foto-noticia">
			<img src="imagenes/noticia1.jpg"  alt=" Orientaci&oacute;n estrategia comercial para cada compa&ntilde;&iacute;a" width="122" height="122"/>
		</div>
		<h2><? echo $noticia['titulo'];?> </h2>
		<div id="fecha-noticia">Fecha: <? echo fecha_formato_espanol($noticia['fecha']); ?> |

		 Fuente: 
	
		</div>
		<p class="texto-noticias"> <?php echo ajustatexto_noticias_secundarias($noticia['cuerpo'])?></p>
			  
	<?php echo anchor('noticias_vista/'.$noticia['id'].'', 'ver mas (+)', array('class' => 'btn-vermas')); ?>

	</div>

<?php endforeach;?>		

		<div id="fix" style="clear:both"></div>
		 <div id="ajax_paging" >
          <?php echo $pagination; ?>
       </div>  

 </div>
  <div id="fix" style="clear:both"></div>      
       
</div>

</div>