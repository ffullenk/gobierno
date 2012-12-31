<html>
<HEAD>
<TITLE>Cascading Menu</TITLE>
<style type="text/css">
 <!--

BODY, INPUT, TH, TD, TABLE, P, DIV {
font=family:"Verdana", sans-serif;
}
-->
</style>
<h4><basefont size=2> </HEAD> <BODY BGCOLOR="WHITE" text="#000000"><?
// By: Ralph Smith, Ralph.Smith.1@excite.com
// Created 3/3/01 - Please inlcude this reference if you use this code or modify it.
// I would also like copies of any adaptations or derivaties of this code that others might come up with!
//
// "I can do all things through Christ which strengthenth me!" - Phillippians 4:13
// 
// You will also need the 10 images associated with this code. 
// They are located at http://housing-works.com/projects/cascademenu/menu_images.php. Save them in a 
// directory just below the location of you menu.php file.
//
// node construction notes:
// $node_info should look like this:
// $node_info = "node_label, node_type, node_status, node_link, node_target, node_level, node_parent, node_child"
// $node_label     - what word(s) should appear beside the file icon
// $node_type     - the first node is the starter node and has not type
//    - b : branching (Appears with a plus or minus depending on the state of the node
//    - bl: branching L (Places at the end of a tree on any level other than 1, has the same features as branch
//    - j  : junction (Like a branch but with out the plus or minus)
//    - t : terminal node (The final node of the menu, does not branch) * this maybe changed in the future
//    $node_status    - 0 : open , 1 : closed (initially set to close unless you have a need for a particular folder to be open at loading
//     $node_link        - where the label will link to
//    $node_target    - the target of the link, nothing in this area points the link at the current window
//    $node_level        - 1, 2, 3 - more levels can be added by adding arguments to the main for loop
//    $node_parent    - p : yes, the node is a parent; n : no, the node is not a parent
//    $node_child    - the index number of the nodes parent, or n - if the node is not a child

$filename = "menu3b.php";

$node_info [0]     = "Images, , , , , n, n, n";
$node_info [1]     = "Door Decs, j, 1, pictures.php, _new, 1, n, n";
$node_info [2]     = "Bulletin Boards, j, 1, bb.php, , 1, n, n";
$node_info [3]     = "Halls, b, 1, , , 1, p, n ";
$node_info [4]     = "Miscellaneous, t, 1, http://www.dice.com, _new, 1, n, n";
$node_info [5]     = "Apartments, b, 1, , , 2, p, 3";
$node_info [6]     = "N. Carrick, b, 1, , , 2, p, 3";
$node_info [7]     = "S. Carrick, b, 1, , , 2, p, 3";
$node_info [8]    = "Strong, b, 1, , , 2, p, 3";
$node_info [9]    = "Univ. Apartments, bl, 1, , , 2, p, 3";
$node_info [10]    = "Programs, b, 1, crack.php, _this window, 3, p, 5";
$node_info [11] = "Staff, t, 1, login.php, , 3, n, 5";
$node_info [12]    = "Programs, j, 1, crack.php, _this window, 3, n, 6";
$node_info [13] = "Staff, t, 1, login.php, , 3, n, 6";
$node_info [14]    = "Programs, j, 1, crack.php, _this window, 3, n, 7";
$node_info [15] = "Staff, t, 1, login.php, , 3, n, 7";
$node_info [16] = "test1, j, 1, login.php, , 4, n, 10";
$node_info [17] = "test2, t, 1, login.php, , 4, n, 10";

for ($d = 0; $d <= count ($node_info); $d++) {

    $node_array = explode (", ", $node_info[$d]);

    $node_label[$d] = $node_array[0];
    $node_type[$d] = $node_array[1];
    $node_status[$d] = $node_array[2];
    $node_link[$d]= $node_array[3];
    $node_target[$d]= $node_array[4];
     $node_level[$d]= $node_array[5];
    $node_parent[$d]= $node_array[6];
    $node_child[$d]= $node_array[7];
}

// un-comment the loop below to check what data you are sending from your node_info array.
/*
 for ($e = 1;$e < count ($node_label) ; $e++) {
 print "num: $e - $node_label[$e]:$node_type[$e]:$node_status[$e]:$node_link[$e]:$node_target[$e]:$node_level[$e]:$node_parent[$e]:$node_child[$e]<br>n ";
 }
*/

display_menu ($node_label, $node_type, $node_status, $node_link, $node_target, $node_level, $node_parent, $node_child, $ns, $chg_node);
        
?> </h4>
</BODY>
</HTML>

<?

function display_menu ($node_label, $node_type, $node_status, $node_link, $node_target, $node_level, $node_parent, $node_child, $ns, $chg_node) {

$menu_depth = 3;

// de-construct the node status string ($ns)

if (isset($ns)) {

    $node_status = explode (",", $ns);

}

if ($chg_node):

    if ($node_status[$chg_node] == "0"):

        $node_status[$chg_node] = "1";

    else:

        $node_status[$chg_node] = "0";

    endif;

endif;

$ns = "";

    // Display the starter node?

        print "<font size="-1">n<table border="0" cellspacing="0" cellpadding="0"><tr><td nowrap valign=\"center\">";
        print "<img border="0" height="22" src="images/Closed.gif"></td>";
        print "<td>";
        print "<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000033">$node_label[0]</font>";
        print "</font></td></tr></table>n";

$num_nodes = count ($node_label);

for ($i = 1; $i <= $num_nodes; $i++) {

    if ($node_level[$i] == "1"):

        print "n<table border="0" cellspacing="0" cellpadding="0"><tr><td nowrap valign="center">";
        display_node ($node_label[$i], $node_type[$i], $node_status, $node_link[$i], $node_target[$i], $i, $node_status[$i]); 

        if (($node_parent[$i] == "p")&&($node_status[$i] == "0")):

            for ($a = 1; $a <= $num_nodes; $a++) {

                if ($node_child[$a] == "$i"):

                    print "n<table border="0" cellspacing="0" cellpadding="0"><tr><td nowrap valign="center">";
                    print "<img border="0" height="22" src="images/Inode.gif">";
                    display_node ($node_label[$a], $node_type[$a], $node_status, $node_link[$a], $node_target[$a], $a, $node_status[$a]); 

                    if (($node_parent[$a] == "p")&&($node_status[$a] == "0")):

                        for ($b = 1; $b <= $num_nodes; $b++) {

                            if ($node_child[$b] == "$a"):

                                print "n<table border="0" cellspacing="0" cellpadding="0"><tr><td nowrap valign="center">";
                                print "<img border="0" height="22" src="images/Inode.gif">";
                                print "<img border="0" height="22" src="images/Inode.gif">";
                                display_node ($node_label[$b], $node_type[$b], $node_status, $node_link[$b], $node_target[$b], $b, $node_status[$b]); 

                                if (($node_parent[$b] == "p")&&($node_status[$b] == "0")):

                                    for ($c = 1; $c <= $num_nodes; $c++) {

                                        if ($node_child[$c] == "$b"):

                                            print "n<table border="0" cellspacing="0" cellpadding="0"><tr><td nowrap valign="center">";
                                            print "<img border="0" height="22" src="images/Inode.gif">";
                                            print "<img border="0" height="22" src="images/Inode.gif">";

                                            if ($node_type[$b] == "bl"):

                                                print "<img border="0" height="22" src="images/space.gif">";

                                            else:

                                                print "<img border="0" height="22" src="images/Inode.gif">";

                                            endif;

                                            display_node ($node_label[$c], $node_type[$c], $node_status, $node_link[$c], $node_target[$c], $c, $node_status[$c]); 

                                        endif;
                                        
                                    }
                                    
                                endif;
                                
                            endif;

                        }

                    endif;

                endif;
            }

        endif;

    endif;
        
}

}

function node_status_values ($node_status) {

$ns = "1";
$num_arr = count($node_status);

for ($i=1;$i<=$num_arr-1;$i++) {

    $ns = $ns.",$node_status[$i]";
        
}

print "&ns=$ns";

}

function print_node_label ($node_link, $node_target, $node_label) {

if ($node_link == ""):

    print "$node_label";

else:

    if (!$node_target):

        print "<a href="$node_link">$node_label</a>";

    else:

        print "<a href="$node_link" target="$node_target">$node_label</a>";

    endif;

endif;

}

function display_node ($node_label, $node_type, $node_status, $node_link, $node_target, $i, $node_st_i) {
global $filename;

    if (($node_type == "b")||($node_type == "bl")):
    
        print "<a href="$filename?chg_node=$i";
        node_status_values ($node_status);
        
        // Is the node a T branching node?
        
        if ($node_type == "b"):

            // Is the node open or closed?

            if ($node_st_i == "0"):
    
                print ""><img border="0" height="22" src="images/MinusT.gif"><img border="0" height="22" src="images/Open.gif">";

            elseif ($node_st_i == "1"):

                print ""><img border="0" height="22" src="images/PlusT.gif"><img border="0" height="22" src="images/Closed.gif">";

            endif;

            print "</a></td>";
            print "<td valign="center" nowrap><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000033">";
            print_node_label ($node_link, $node_target, $node_label);
            print "</font></td></tr></table>nn";

        // Is the node a L branching node?

        elseif ($node_type == "bl"):

            // Is the node open or closed?

            if ($node_st_i == "0"):

                print ""><img border="0" height="22" src="images/MinusL.gif"><img border="0" height="22" src="images/Open.gif">";

            elseif ($node_st_i == "1"):

                print ""><img border="0" height="22" src="images/PlusL.gif"><img border="0" height="22" src="images/Closed.gif">";

            endif;

            print "</a></td>";
            print "<td valign="center" nowrap><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000033">";
            print_node_label ($node_link, $node_target, $node_label);
            print "</font></td></tr></table>nn";

        endif;
        
    // Is the node a junction node? (Node in the middle of the tree that does not branch any further.

    elseif ($node_type == "j"):

        print "<img border="0" height="22" src="images/NoneT.gif"><img border="0" height="22" src="images/Closed.gif"></td>";
        print "<td><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000033">";
        print_node_label ($node_link, $node_target, $node_label);
        print "</font></td></tr></table>";

    // Is the node a terminating node? (Terminating nodes can not have branches.)

    elseif ($node_type == "t"):

        print "<img border="0" height="22" src="images/NoneL.gif"><img border="0" height="22" src="images/Closed.gif"></td>";
        print "<td><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000033">";
        print_node_label ($node_link, $node_target, $node_label);
        print "</font></td></tr></table>";

    endif;

}

?>