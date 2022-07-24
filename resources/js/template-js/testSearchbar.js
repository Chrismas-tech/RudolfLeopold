import { Ajax } from "./Ajax";

export class TestSearchbar extends Ajax {
    constructor(
        url,
        input_searchbar,
        spinner_class = null,
        search_result_id,
        form_searchbar_id,
        setTimeout,
    ) {

        this.input_searchbar = input_searchbar,
            this.spinner_class = spinner_class,
            this.search_result_id = search_result_id,
            this.form_searchbar_id = form_searchbar_id,
            this.setTimeout = setTimeout,
            this.timer

        console.log(this);

        // Keyup into Ajax
        this.keyup()

        // Click outside Hide Searchbar
        this.Hide_searchbar_click_outside()
    }

    keyup() {

        let this_instance = this;

        $(input_searchbar).keyup({ this_instance }, function() {

            this_instance.clearTimer(this_instance.timer)
            let q = $(this).val()

            // If Research length > 2
            if (q.length > 1) {
                // Show spinner
                $(this_instance.spinner_class).show()

                // After 600ms => Request Ajax
                this_instance.timer = setTimeout(() => {

                    super.ajax(
                        this_instance.url,
                        'POST', {
                            q: q,
                        })

                }, this_instance.setTimeout);
            } else {
                // Research Ends
                // Hide Spinner
                // Hide Results
                $(this_instance.spinner_class).hide()
                $(this_instance.search_result_id).html('')
            }
        })
    }

    Hide_searchbar_click_outside() {

        let this_instance = this;

        // Click outside of searchbar
        $(document).on('click', { this_instance }, function(e) {

            if ($(e.target).closest(this_instance.form_searchbar_id).length == 0) {
                $(this_instance.search_result_id).hide()
            }
        })
    }

    // Cut Timer before reinitialize research
    clearTimer(timer) {
        if (timer) {
            clearTimeout(timer)
        }
    }

    success_response(data, search_result_id, spinner_class) {

        console.log(data.products);
        console.log(data.categories);

        $(spinner_class).hide()
        $(search_result_id).show()


        $(search_result_id).html('')

        if (data.products.length > 0) {

            data.products.forEach(product => {
                $(search_result_id).append(`
                    <li>
                        <a href="/product-details/` + product.id + `/` + product.slug + `" class="d-flex align-items-center justify-content-between w-100">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-search ms-2 me-2"></i>
                                 <span class="result-input-text me-1" id="` + product.category_id + `">` + product.name + `</span>
                                 <span class="me-1"> (` + product.category_name + `) </span>
                                 <span> ` + (product.selling_price / 100) + `€</span>
                            </div>
                    
                            <div class="d-flex align-items-center">
                                <img class="img-search-bar" src="` + product.url + `" alt="">
                            </div>
                        </a>
                    </li>
                 `)
            });
        }

        if (data.categories.length > 0) {
            data.categories.forEach(category => {

                $(search_result_id).append(`
                    <a href="shop?search_bar=` + category.name + `" method="GET">
                        <li>
                            <div>
                                <i class="fas fa-search ms-2 me-1"></i>
                                <span>Category ➔ </span>
                                <span>` + category.name + ` </span>
                            </div>
                        </li>
                    </a>
                `)
            });
        }

        if (!data.products.length && !data.categories.length) {
            $(search_result_id).html('')
            $(search_result_id).append(`
            <div class="my-bg-white text-center no-results-found">
                <div>No results for your search ?</div>  
                <div>
                    <i class="fa-solid fa-arrow-right-from-bracket me-1 my-danger"></i>
                    Click here and browse our categories
                </div>
            </div>`)
        }
    }
}


// Start Searchbar
const SearchbarHome = new TestSearchbar(
    'ajax-searchbar',
    '#input_searchbar',
    '.spinner-border',
    '#searchbar_results',
    'ajax-searchbar',
    '#form-searchbar',
    600
)