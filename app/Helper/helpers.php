<?php
function getSPengerjaan($value){
    if($value == 'proses' || $value == 'pending'){
        $value = 'warning';
    }
    else
    {
        $value = 'success';
    }

    return $value;
}

function isExist($value){
    if($value ==  null){
        return 0;
    }else{
        return $value->total_harga;
    }
}

function getSPembayaran($value){
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