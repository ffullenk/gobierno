####################################
# jXCore :: Javascript Library     #
# By Jorge Schrauwen 2006          #
# -- http://blackdot.be            #
####################################

What is jXCore?
-----------------------------
jXCore is a javascript library that can easly be extended.
It include a XMLHttpRequest() object that works in Mozilla, IE5.5, Safari and Opera.
Aditionally an modules can be loaded.

How do I use it?
-----------------------------
Extract somewhere in your webroot and add the following line to your page:
<script type="text/javascript" src="pathtojxcore/jXCore.js"></script>

Once jXCore is loaded you can access it like
jXCore.NameSpace, if you load the bare minimum the following will be avaible:

$('ElementId') -> short form of document.getElementById('ElementId')
jXCore.include('ModuleName', 'jXCore Path') -> Include aditional modules
jXCore.XMLHttpRequest() -> same as the native XMLHttpRequest but this is cross browser/platform.

What other modules are there?
-----------------------------
Have a look in the jXCoreModules folder.

