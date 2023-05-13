// import './bootstrap';
import 'boxicons';

import Alpine from 'alpinejs'

import DataTable from 'datatables.net-dt';
// import 'datatables.net-responsive-dt';

window.Alpine = Alpine

Alpine.start()

$(document).ready(function () {
    $('#myTable').DataTable();
});

let table = new DataTable('#myTable', {
    responsive: true
});