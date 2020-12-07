@if(session()->has('mensaje'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <button type="button" class="close" aria-label="Close" data-dismiss="alert">
            <span aria-hidden="true">×</span>
        </button>
        {{session('mensaje')}}
    </div>
@endif
