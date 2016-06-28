#!/usr/bin/php5
<?php
//echo 'Started'; exit;
// Parse command line arguments into the $_GET variable:
parse_str(implode('&', array_slice($argv, 1)), $_GET);

echo 'Name: ' . $_GET['name'] . "\n";
echo 'Description: ' . $_GET['description'] . "\n";
#exit;
$name        = ucwords($_GET['name']);
$lc_name     = strtolower($name);
$uc_name     = strtoupper($name);
$com_lc_name = 'com_' . str_replace(' ', '', $lc_name);
$com_uc_name = strtoupper(str_replace(' ', '', $com_lc_name));
$classname   = str_replace(' ', '', $name);
$description = $_GET['description'];

echo 'Classname: ' . $classname . "\n";

include_once('_functions.php');

$new_dir     = dirname(__DIR__) . '/' . $com_lc_name;

copy_dir(__DIR__ . '/_com_skeleton', $new_dir);

perform_renames(
    $new_dir,
    array('_skeleton', str_replace(' ', '', $lc_name)),
    array(
        '{{NAME}}'        => $name,
        '{{DESCRIPTION}}' => $description,
        '_skeleton'       => str_replace(' ', '', $lc_name),
        '_Skeleton'       => $classname,
        '_com_skeleton'   => $com_lc_name,
        'COM_SKELETON'    => $com_uc_name,
        '_SKELETON'       => '_' . str_replace(' ', '', $uc_name)
    )
);
?>