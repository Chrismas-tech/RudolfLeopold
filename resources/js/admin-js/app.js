// JQuery 3.3.1
import $ from 'jquery';
window.$ = window.jQuery = $;

// SweetAlert2
import Swal from "sweetalert2"
window.Swal = Swal;

// ApexCharts
import ApexCharts from "apexcharts"
window.ApexCharts = ApexCharts

// echarts
import * as echarts from "echarts"
window.echarts = echarts

// simpleDatatables
import * as simpleDatatables from "simple-datatables"
window.simpleDatatables = simpleDatatables

// TEMPLATE ADMIN
require('./template-admin/bootstrap/js/bootstrap.bundle.js')
require('./template-admin/chart.js/chart.js')
require('./template-admin/quill/quill.min.js')
require('./template-admin/simple-datatables/simple-datatables')
require('./template-admin/tinymce/tinymce.min.js')
    /* require('./template-admin/php-email-form/validate.js') */
require('./template-admin/main')

// Personal JS
require('./personal-js/animate-chevron-tree-category')
require('./personal-js/my-stop-blinking-button')
require('./personal-js/reset_default_image_digital')
require('./personal-js/my-select-deselect-all')

// Category
require('./personal-js/sweetalert-category')

// SweetAlerts
require('./personal-js/SweetAlert')
require('./personal-js/my-sweet-alerts')

// SweetAlert
require('./personal-js/sweetalert-add-edit-loading-product')

// Modal
require('./personal-js/modal-add-edit-category')
require('./personal-js/modal-edit-youtube-video')
require('./personal-js/modal-close-click-outside')

require('./personal-js/my-product-options')
require('./personal-js/my-product-keep-tab-by-refresh')

// Tags
require('./personal-js/my-tags')
require('./personal-js/my-tags-edit-list')

// IncrementDecrement 
require('./personal-js/IncrementDecrement')

// CKeditor5
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

if ($('#editor1').length || $('#editor2').length) {
    ClassicEditor
        .create(document.querySelector('#editor1'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#editor2'))
        .catch(error => {
            console.error(error);
        });
}



// DataTable
require('datatables.net')(window, $)