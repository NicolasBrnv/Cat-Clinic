/**
 * Fichier Javascript appelant tous les autres fichiers
 * @author Christian Bonhomme
 * @version 1.0
 * @package EXERCICE-MOOC
 */

var src = new Array();
var i = 0;

src[i++] = '../js/ajax.js';
src[i++] = '../js/pages.js';
src[i++] = '../js/init.js';

for (var j = 0; j < i; ++j)
{
  document.write('<script language="javascript" type="text/javascript" src="' + src[j] + '"></script>');
}