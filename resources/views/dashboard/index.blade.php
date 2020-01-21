@extends('layouts/master')

@section('title', 'Dashboard | Departemen Hukum')

@section('content')

<script src="{{ asset('js/jquery.min.js') }}"></script>

{{-- <script type="text/javascript">
    $(document).ready(function(){
        $("#modalReminder").modal('show');
    });
</script> --}}

@if(auth()->user()->role == 'admin')
    <h1>Dashboard Admin</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit cumque reprehenderit voluptate, ratione unde cupiditate odit dolorem corrupti ullam quam aspernatur deleniti quidem minus asperiores veniam illo minima doloribus harum.</p>
@endif

@if(auth()->user()->role == 'std_user')
    <h1>Dashboard Standard User</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit cumque reprehenderit voluptate, ratione unde cupiditate odit dolorem corrupti ullam quam aspernatur deleniti quidem minus asperiores veniam illo minima doloribus harum.</p>
@endif

@if(auth()->user()->role == 'access_user')
    @if ($show_notif)
        {{ App\Http\Controllers\DashboardController::showNotification() }}
    @endif
    <h1>Dashboard Full Access User</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit cumque reprehenderit voluptate, ratione unde cupiditate odit dolorem corrupti ullam quam aspernatur deleniti quidem minus asperiores veniam illo minima doloribus harum.

    <div class="modal fade bd-example-modal-xl" id="modalReminder" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document" id="modalReminderDialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        <i class="fas fa-bell"></i>&nbsp;
                        Kumpulan Perizinan
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div style="overflow-x:auto;">
                        @include('dashboard.reminder', ['check' => $check])
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif
@stop
