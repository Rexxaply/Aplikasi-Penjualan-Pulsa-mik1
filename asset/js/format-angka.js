// Merubah Format Input
var hargaPulsa = document.getElementById('hargaPulsa');
hargaPulsa.addEventListener('keyup', function(e) {
    hargaPulsa.value = formatRupiah(this.value, 'Rp. '); });

var nominalPulsa = document.getElementById('nominalPulsa');
nominalPulsa.addEventListener('keyup', function(e) {
    nominalPulsa.value = formatRupiah(this.value, 'Rp. '); });
// Menambahkan Fungsi
function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   = number_string.split(','),
        sisa    = split[0].length % 3,
        rupiah  = split[0].substr(0, sisa),
        ribuan  = split[0].substr(sisa).match(/\d{3}/gi);
        
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah  = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}