/* easytoggle2.js
   - Simon Willison, 5th November 2003
   - See http://simon.incutio.com/archive/2003/11/06/easytoggle
*/

addEvent(window, 'load', et_init);

var et_toggleElements = [];

/* Initialisation */
function et_init() {
    var i, link, id, target, first;
    first = true;
    for (i = 0; (link = document.links[i]); i++) {
        if (/\btoggle\b/.exec(link.className)) {
            id = link.href.split('#')[1];
            target = document.getElementById(id);
            et_toggleElements[et_toggleElements.length] = target;
            if (first) {
                first = false;
            } else {
                target.style.display = 'none';
            }
            link.onclick = et_toggle;
        }
    }
}

function et_toggle(e) {
    /* Adapted from http://www.quirksmode.org/js/events_properties.html */
    if (typeof e == 'undefined') {
        var e = window.event;
    }
    var source;
    if (typeof e.target != 'undefined') {
        source = e.target;
    } else if (typeof e.srcElement != 'undefined') {
        source = e.srcElement;
    } else {
        return true;
    }
    /* For most browsers, targ would now be a link element; Safari however
       returns a text node so we need to check the node type to make sure */
    if (source.nodeType == 3) {
        source = source.parentNode;
    }
    var id = source.href.split('#')[1];
    var elem;
    for (var i = 0; (elem = et_toggleElements[i]); i++) {
        if (elem.id != id) {
            elem.style.display = 'none';
        } else {
            elem.style.display = 'block';
        }
    }
    return false;
}

/* Thanks to Scott Andrew */
function addEvent(obj, evType, fn){
    if (obj.addEventListener) {
        obj.addEventListener(evType, fn, true);
        return true;
    } else if (obj.attachEvent) {
        var r = obj.attachEvent("on"+evType, fn);
        return r;
    } else {
	    return false;
    }
}