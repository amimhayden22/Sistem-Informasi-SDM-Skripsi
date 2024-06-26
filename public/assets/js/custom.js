/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";


// alert otomatis hilang

$(document).ready(function() {
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 8000);
});

// merubah tipe data
function formatCurrency(value) {
    return value ? parseInt(value) : 0;
}

// create formatRupiah
function formatRupiah(angka, prefix = 'Rp ') {
    if (!angka || isNaN(angka)) {
        return '';
    }

    return prefix + Number(angka).toLocaleString('id-ID');
}

// Pembulatan roundwon -3
function roundToNearest(value, precision) {
    var multiplier = Math.pow(10, precision);
    return Math.round(value / multiplier) * multiplier;
}

var parseAndCheckNaN = function(value, defaultValue = 0) {
    var parsedValue = parseInt(value);
    return isNaN(parsedValue) ? defaultValue : parsedValue;
};
