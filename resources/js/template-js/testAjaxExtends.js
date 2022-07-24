import { Ajax } from "./Ajax";

export class TestOverrideClass extends Ajax {
    constructor(url, type, data, body) {
        super(url, type, data)
        this.body = body

        console.log(this);
    }

    success_server(data, body) {
        console.log(data);
        $('body').remove

    }
}

// Start Searchbar
const TestAjaxCall = new TestOverrideClass('ajax-searchbar', 'POST', {
        pomme: 'pomme',
        banane: 'banane',
        poire: 'poire',
    },
    'body',
)