@extends('layouts/master')

@section('content')

<script src="{{asset('js/jquery.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){
    $("#myModal").modal('hide');
});

$(document).ready(function() {
    // show the alert
    $(".alert").fadeTo(5000, 100).slideUp(800, function(){
        $(".alert").slideUp(100);
    });
});
</script>

@if(auth()->user()->role == 'admin')
    <h1>Dashboard Admin</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit cumque reprehenderit voluptate, ratione unde cupiditate odit dolorem corrupti ullam quam aspernatur deleniti quidem minus asperiores veniam illo minima doloribus harum.</p>
    @endif
    
    @if(auth()->user()->role == 'std_user')
    <h1>Dashboard Standard User</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit cumque reprehenderit voluptate, ratione unde cupiditate odit dolorem corrupti ullam quam aspernatur deleniti quidem minus asperiores veniam illo minima doloribus harum.</p>
    @endif
    
    @if(auth()->user()->role == 'access_user')
    <h1>Dashboard Full Access User</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit cumque reprehenderit voluptate, ratione unde cupiditate odit dolorem corrupti ullam quam aspernatur deleniti quidem minus asperiores veniam illo minima doloribus harum.

    <div class="modal show alert" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="material-icons">notifications_active</i> &nbsp;Kumpulan Perizinan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="overflow-x:auto;">
                    test
                </div>            
            </div>            
        </div>            
    </div>            
    </div>                        
@endif
@stop