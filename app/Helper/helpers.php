<?php
function getSPengerjaan($value){
    if($value == 'proses'){
        $value = 'warning';
    }
    elseif($value == 'po')
    {
        $value = 'info';
    }
    else
    {
        $value = 'success';
    }

    return $value;
}

function getSPembayaan($value){
    if($value == 'belum bayar'){
        $value = 'warning';
    }
    elseif($value == 'dp')
    {
        $value = 'info';
    }
    else
    {
        $value = 'success';
    }

    return $value;
}

function format_uang($angka) {
    return 'Rp. '.number_format($angka, 0, ',', '.');
}