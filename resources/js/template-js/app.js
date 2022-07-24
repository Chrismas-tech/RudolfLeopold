import Splide from "@splidejs/splide"
window.Splide = Splide;

import Drift from 'drift-zoom';
window.Drift = Drift;

// SweetAlert2
import Swal from "sweetalert2"
window.Swal = Swal;

// Ajax 
require('./Ajax')
require('./SearchbarAjax')
    /*  require('./testAjaxExtends') */
    /* require('./testSearchbar') */
require('./ajax-add-cart')
require('./ajax-option-product')
require('./Cart')


require('./my-megamenu-click-category.js')
require('./my-product-details-switch-img-variant')
require('./ProductDetailsQuantity')