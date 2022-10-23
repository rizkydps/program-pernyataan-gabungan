<?php


if (isset($_POST['submit'])) {
    if ($_POST['operator'] == "or") {
        $hasil = $value1 || $value2;
        echo $hasil;
    } elseif ($_POST['operator'] == "and") {
        $hasil = $value1 && $value2;
        echo $hasil;
    } elseif ($_POST['operator'] == "xor") {
        $hasil = $value1 xor $value2;
        echo $hasil;
    } elseif ($_POST['operator'] == "not") {
        $hasil = !$value1;
        echo $hasil;
    } elseif ($_POST['operator'] == "notor") {
        $hasil = !$value1 || $value2;
        echo $hasil;
    } elseif ($_POST['operator'] == "notand") {
        $hasil = !$value1 && $value2;
        echo $hasil;
    } elseif ($_POST['operator'] == "exor") {
        $hasil = $value1 xor $value2;
        echo $hasil;
    } elseif ($_POST['operator'] == "exnor") {
        $hasil = !$value1 xor $value2;
        echo $hasil;
    }
}
