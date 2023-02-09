<?php

    if ($purpose == "Accounting") {
        $department = "A";
    } elseif ($purpose == "Human Resources") {
        $department = "H";
    } elseif ($purpose == "Auditing") {
        $department = "U";
    } else {
        $department = "X";
    }

    $order = 1;
    $order= ++$order;
    $order = sprintf("%04d",$order);
    $tid = $department.$order;

?>

