<div class="flex-complete mt-5 mb-5 oneMusic-buttons-area">
    <a href="{{route('website.home')}}" class="btn oneMusic-btn btn-2 m-2">
        @if(Session::get('lang') == 'en')
        Return to the Home Page
        @else
        Zurück zur Startseite
        @endif
        <i class="fa fa-angle-double-right"></i>
    </a>
</div>