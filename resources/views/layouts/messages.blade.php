<div class="row">
    <div class="col-md-12">

        {!! Session::has('success') ? '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>'. Session::get("success") .'</div>' : '' !!}
          </div>
        
        {{-- {!! Session::has('success') ? '<div class="alert alert-success alert-dismissible">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'. Session::get("success") .'</div>' : '' !!}
        {!! Session::has('error') ? '<div class="alert alert-danger alert-dismissible">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'. Session::get("error") .'</div>' : '' !!} --}}
    </div>
</div>
