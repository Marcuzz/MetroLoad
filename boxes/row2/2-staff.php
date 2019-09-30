<?php

$colour = '#ac193d';
$gradient = [
    // Left colour
    '#ac193d',
    // Right colour
    '#bf1e4b'
];

$box_title = 'Staff';

// Font awesome 4 icon class name
$fa_icon = 'users';

// 0.1 to 1
$transparency = 1;

// 1 to 12 (12 is the whole page wide)
$size = 3;

// STAFF CONFIG
// A list of admins. Works the same way as below.
$admins_column1 = [
    "Admin"
];

// Only in use if size is greater than or equal to 6!
$admins_column2 = [
    ""
];

// Only in use if size is greater than or equal to 6!
$admins_column3 = [
    ""
];

////////////////////////////////////////////////////////////////////////////////////////
//																					  //
// DO NOT EDIT PAST THIS LINE UNLESS YOU KNOW WHAT YOU'RE DOING!					  //
//																					  //
////////////////////////////////////////////////////////////////////////////////////////

foreach ($admins_column1 as $admin) {
    $admin_d1 .= $admin . '<br>';
}

foreach ($admins_column2 as $admin) {
    $admin_d2 .= $admin . '<br>';
}

foreach ($admins_column3 as $admin) {
    $admin_d3 .= $admin . '<br>';
}

$contents = '
    <div class="box-inner">
        <h3><i class="fa fa-' . $fa_icon . '"></i> ' . $box_title . '</h3><br>
        ' . $admin_d1 . '
    </div>
';

if ($size <= 6) {
    $contents = '
        <div class="box-inner">
            <h3><i class="fa fa-' . $fa_icon . '"></i> ' . $box_title . '</h3><br>
            <div class="col-xs-4">
                ' . $admin_d1 . '
            </div>
            <div class="col-xs-4">
                ' . $admin_d2 . '
            </div>
            <div class="col-xs-4">
                ' . $admin_d3 . '
            </div>
        </div>
    ';
}
