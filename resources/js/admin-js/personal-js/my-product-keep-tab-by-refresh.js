 $(function() {

     // Keep tab index active products
     $('.nav-tabs button[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
         localStorage.setItem('activeTabData', $(this).attr('data-bs-target'));
     });

     let activeTabData = localStorage.getItem('activeTabData');

     let tabs = $('.tab-content .tab-pane')
     let navlinks = $('.nav-tabs .nav-link')

     /*  console.log(activeTabData); */

     if (activeTabData) {

         /* console.log(activeTabData); */

         $('.nav-link').removeClass('active')
         $('.tab-content .tab-pane').removeClass('show')
         $('.tab-content .tab-pane').removeClass('active')

         tabs.each((index, tab) => {
             if ($(tab).attr('id') == activeTabData.substring(1)) {
                 $(tab).addClass('active')
                 $(tab).addClass('show')
             } else {
                 $(tab).removeClass('active')
                 $(tab).removeClass('show')
             }
         })

         navlinks.each((index, navlink) => {
             if ($(navlink).attr('id').trim() == (activeTabData + '-tab').substring(1).trim()) {
                 $(navlink).addClass('active')
             } else {
                 $(navlink).removeClass('active')
             }

         })
     }
 })