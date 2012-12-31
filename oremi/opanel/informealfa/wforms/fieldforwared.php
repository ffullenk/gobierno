<?php
function field_forwarder() {
    global $_POST, $rEM979, $FFoutputType;
    $fieldForwarder = '';
    /* get the arguments passed */
    $argList = func_get_args ();

    /* globalize any other set of instructions */
    if (count ($argList)) {
        eval ('global $' . $argList[count($argList)-1] . ';');
    }
    
    /* set the default set of values to convert */
    if(count($argList)==0) {
        /* if the function is initially passed without
           parameter we're looking in $_POST */
        $argList[0] = '_POST';
        $startValue = $_POST; 
        if (sizeof ($startValue) == 0) {
            return false;
        }
    } elseif (count ($argList) == 1) {
        eval ('$rEM979["' . $argList[0] . '"] = $' 
              . $argList[0] . ';');
        $argList[0] = 'rEM979';
        $startValue = $rEM979;
    } elseif (count ($argList) == 2) {
        eval ('$startValue = $' . $argList[1] . '["' 
              . $argList[0] . '"];');
    } else {
        for($e = count($argList) - 2; $e >= 0; $e--) {
            $intersperse .= '["' . $argList[$e] . '"]';
        }
        eval ('$startValue = $' . $argList[count($argList)-1]  
              . $intersperse . ';');
    }

    foreach($startValue as $n => $v) {
        if (is_array ($v)) {
            /* call the function again */
            $shiftArguments = '';
            for($w = 0; $w <= count ($argList) - 1; $w++) {
                $shiftArguments .= '"' . $argList[$w] . '", ';
            }
            $shiftArguments = substr ($shiftArguments, 0, 
                                     strlen ($shiftArguments) - 2);
            
            eval ('$fieldForwarder .= field_forwarder("' . $n . '"' 
                  . substr(',',0,strlen($shiftArguments)) . ' ' 
                  . $shiftArguments . ');');
                        
        } else {
            /* we have an root value finally */
            if (count ($argList) == 1) {
                /* actual output */
                flush();
                if ($FFoutputType == 'print') {
                    $fieldForwarder .= "\$$n = '$v';\n";
                } else {
                    $fieldForwarder .= "<input type=\"hidden\" "
                                    . "name=\"$n\" value=\"" 
                                    . htmlentities(stripslashes($v)) 
                                    . "\">\n";
                }
            } elseif (count ($argList) >1 ) {
                $indexString = '';
                for($g = count ($argList) - 3; $g >= 0; $g--) {
                    $indexString .= '[' 
                                 . ((!is_numeric ($argList[$g])
                                 and $FFoutputType == 'print')
                                 ? "'" : '')
                                 . $argList[$g]
                                 . ((!is_numeric ($argList[$g])
                                 and $FFoutputType == 'print')
                                 ? "'" : '')
                                 . ']';
                }
                $indexString .= '[' 
                             . ((!is_numeric ($n) 
                             and $FFoutputType == 'print') 
                             ? "'" : '') . $n 
                             . ((!is_numeric ($n) 
                             and $FFoutputType == 'print') 
                             ? "'" : '') . ']';
                /* actual output */
                flush();
                if ($FFoutputType == 'print') {
                    $fieldForwarder .= "\${$argList[count($argList)-2]}"
                                    . "$indexString = '$v';\n";
                } else {
                    $fieldForwarder .= "<input type=\"hidden\" name=\""
                                    . "{$argList[count($argList)-2]}"
                                    . "$indexString\" value=\"" 
                                    . htmlentities(stripslashes($v)) 
                                    . "\">\n";
                }
            }
        }       
    }
    return $fieldForwarder;
}
?>
