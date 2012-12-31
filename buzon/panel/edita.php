<?php
/**
* Edits news table
*/
require_once('tableeditor.php');
$database = mysql_connect('localhost', 'grbc_coqbo', 'g0r3citzen')
or die('Could not connect: ' . mysql_error());
mysql_select_db('grbuzon') or die('Could not select database');
$editor = new TableEditor($database, 'FUNCIONARIO');


$editor->setConfig('perPage', 15);

$editor->setDisplayNames(array('COD_FUNCIONARIO'       => 'ID',
                               'NOMBRES'     => 'Nombres',
                               'APPAT' => 'Ap.Paterno',
                               'APMAT'    => 'Ap.Materno',
                               'EMAIL' => 'Email',
                               'RUT'      => 'Rut',
                               'USER_FUNCIONARIO'     => 'User',
                               'PASS_FUNCIONARIO'     => 'Password',
							   'TIPO_FUNCIONARIO'	=>	'Tipo',
							   'SESIONID'	=>	'Sesion'));

$editor->noDisplay('PASS_FUNCIONARIO');
$editor->noDisplay('TIPO_FUNCIONARIO');

$editor->setInputType('PASS_FUNCIONARIO', 'password');
$editor->setInputType('EMAIL', 'email');

$editor->setSearchableFields('NOMBRES', 'APPAT', 'EMAIL', 'RUT', 'COD_FUNCIONARIO');
$editor->setRequiredFields('NOMBRES', 'APPAT', 'EMAIL', 'RUT', 'COD_FUNCIONARIO');

$editor->setDefaultOrderby('COD_FUNCIONARIO');
$editor->setDefaultValues(array('TIPO_FUNCIONARIO'   => '0',
                                'SESIONID' => 'NULL'));


$editor->addDisplayFilter('APPAT', create_function('$v', 'return substr($v, 0, 100) . "...";'));
$editor->display();
?> 