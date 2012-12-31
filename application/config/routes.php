<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = '';
$route['core']="home/core";
$route['contacto']="home/contacto";
$route['enlaces-de-interes']="home/enlacesDeInteres";
$route['gabinete-regional/:num']="home/gabineteRegional";
$route['gobernadores/:num']="home/gobernadores";
$route['gobierno-regional/:num']="home/gobiernoRegional";
$route['servicios-publicos']="home/serviciosPublicos";
$route['municipalidades/:num']="home/municipalidades";
$route['ajax_municipalidades']="home/ajax_municipalidades";
$route['parlamentarios/:num']="home/parlamentarios";
$route['consejo-regional/:num']="home/consejoRegional";
$route['seremis']="home/seremis";
$route['descarga']="home/descargas";
$route['concursos']="home/concursos";
$route['fondos-concursables']="home/fondosConcursables";
$route['descarga-plugins']="home/descargaPlugins";
$route['informe-empleo']="home/informeEmpleo";
$route['mesa-rural-campesino']="home/mesaRural";
$route['mesa-snit']="home/mesaSnit";
$route['fondo-innovacion']="home/fondoInnovacion";
$route['identidad-regional']="home/identidadRegional";
$route['biblioteca']="home/biblioteca";
$route['banco-de-proyectos']="home/bancoProyectos";
$route['noticias']="home/noticias";
$route['noticias-vista/:num/:num']="home/noticiasVista";
$route['buscadorNoticias']="home/buscadorNoticias";
$route['buscadorBanco']="home/buscadorBanco";
$route['banco-vista/:num']="home/bancoProyectosVista";
$route['fotos-proyectos']="home/fotosAjax";
$route['seremis-vista/:num/:num']="home/seremisVista";
$route['agenda/:num']="home/agenda";
$route['senal-online']="home/senalOnline";
$route['intendente/:num']="home/intendente";
$route['informe-presupuesto']="home/informePresupuesto";
$route['desentralizacion']="home/desentralizacion";
$route['sendEmail']="home/sendEmail";
$route['normas-graficas']="home/normas";
$route['mapa-sitio']="home/mapa";
$route['cohecho']="home/cohecho";
$route['fondos-cultura']="home/fondosCultura";
$route['fondos-deportes']="home/fondosDeportes";
$route['fondos-orquesta']="home/fondosOrquesta";
$route['fondos-seguridad']="home/fondoSeguridad";
$route['fondos-tesis']="home/fondoTesis";
$route['feria-libros']="home/feriaLibros";
$route['fondos-editoriales']="home/fondosEditoriales";
$route['comentario']="home/comentario";
$route['renueva']="home/renueva";
$route['fic']="home/fic";
$route['feria']="home/feria";
$route['politica-privacidad']="home/politica";
/* End of file routes.php */
/* Location: ./application/config/routes.php */