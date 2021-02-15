const time = document.querySelector('.time');

var waktu = new Date;
var tahun = waktu.getFullYear();
time.textContent = tahun;