<?php

/**
    * Displays a debug backtrace in a table format along with a parameterised message.
    * @param type $message 
    */
function my_error_handler($message = '') {
    $html = '<html>
                <head>
                <title>My Error Handler</title>
                <link rel="stylesheet" type="text/css" href="/styles/styles.css">
                </head>
                <body>';
    $html .= '<h1>ERROR HANDLER</h1>';
    $html .= '<p>'.$message.'</p>';
    $backtrace = debug_backtrace();
    $html .= '<table>
                <thead>
                <th>File</th>
                <th>Line</th>
                <th>Function</th>
                <th>Class</th>
                </thead>';
    foreach($backtrace as $item) {
        if(!isset($item['class'])) {
            $item['class'] = '';
        }
        $html .= '<tr>
                    <td>'.$item['file'].'</td>
                    <td>'.$item['line'].'</td>
                    <td>'.$item['function'].'</td>
                    <td>'.$item['class'].'</td>
                    </tr>';
    }
    $html .= '</table>
                </body>
                </html>';
    die($html);
}

function load_model($model) {
    $item_path = 'models/model_'.$model.'.php';
    $item_name = 'model_'.$model;
    return load_item($item_path, $item_name);
}

function load_controller($controller) {
    $item_path = 'controllers/controller_'.$controller.'.php';
    $item_name = 'controller_'.$controller;
    return load_item($item_path, $item_name);
}

function load_class($class) {
    $item_path = 'classes/class_'.$class.'.php';
    $item_name = 'class_'.$class;
    return load_item($item_path, $item_name);
}

function load_item($item_path, $item_name) {
    require_once(WEBSITE_DIR . $item_path);
    return new $item_name();
}

function debug($var) {
    $html = '<html>
                <head>
                <title>My Debug</title>
                <style type="text/css">
                    td {
                        border:1px solid;
                    }
                    table {
                        border-collapse:collapse;
                    }
                   </style>
                </head>
                <body>';
    $html .= '<h1>Debug</h1>';
    $html .= generate_debug_html($var);
    $html .= '</body>
                </html>';
    die($html);
}

function generate_debug_html($var) {
    if(is_resource($var)) {
        # assume that it is a mysql results set and convert it into an array
        $var = convert_to_array($var);
    }
    if(is_array($var)) {
        $html = "<table>";
        foreach($var as $key => $item) {
            $html .= '<tr><td>'.$key.'</td><td>'.generate_debug_html($item).'</td></tr>';
        }
        $html .= "</table>";
        return $html;
    } else if ($var == NULL) {
        return "NULL";
    }
    else {
        return $var;
    }

}

/**
 * Converts a mysql results set into an array
 * @param resource $var the mysql results set to be converted to an array
 */
function convert_to_array($var) {
    $return_array = array();
    while(($row = mysql_fetch_assoc($var)) !== false) {
        $return_array[] = $row;
    }

    return $return_array;
}
?>
