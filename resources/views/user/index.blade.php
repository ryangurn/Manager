@extends('layouts.layout')

@section('title', 'User Home')

@section('sidebar-about')
    @parent

@section('sidebar-about-title', 'User Home')
@section('sidebar-about-content')
    This area will allow you to manage the users within Manager. It is meant to show a quick view of the users and give you easy access to controls for each of them.
@endsection
@stop

@section('sidebar-extend')
    <div class="p-4">
        <h4 class="font-italic">User Quick Links</h4>
        <ol class="list-unstyled">
            <li><a href="{{ action('UserController@create')  }}">Create</a></li>
        </ol>
    </div>
@endsection

@section('content-main')

    <div class="card">
        <div class="card-header d-flex pr-0">
            <h5 class="card-title mb-0">Users</h5>
        </div>
        <table class="table mb-0">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Contact</th>
                <th scope="col">Address</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @if(!$users->isEmpty())
                @foreach($users as $user)
                    <tr>
                        <td><a class="chip chip-action" href="#"><i class="chip-icon">{{ substr($user->firstname, 0, 1) }}{{ substr($user->lastname, 0, 1)  }}</i>{{ $user->firstname  }} {{ $user->lastname }}</a></td>
                        <td>
                            <a class="chip chip-action" href="mailto:{{ $user->email  }}"><i class="material-icons">email</i>{{ substr($user->email, 0, 100)  }}...</a><br /><br />
                            @if($user->metadata()->exists())
                                <a class="chip chip-action" data-toggle="modal" data-target="#user_{{ $user->id }}_phone"><i class="material-icons">phone</i></a>
                            @else
                                <span class="chip" data-toggle="tooltip" title="Phone number not provided yet."><i class="material-icons">phonelink_erase</i></span>
                            @endif
                        </td>
                        <td>
                            @if($user->metadata()->exists())
                                <a class="chip chip-action" data-toggle="modal" data-target="#user_{{ $user->id }}_address"><i class="material-icons">home</i></a>
                            @else
                                <a class="chip chip-action" data-toggle="tooltip" title="Address not provided yet."><i class="material-icons">home</i></a>
                            @endif
                        </td>
                        <td><a class="chip chip-action" href="#"><i class="material-icons">delete</i></a> <a class="chip chip-action" href="#"><i class="material-icons" data-toggle="modal" data-target="#user_{{ $user->id }}_edit">edit</i></a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <hr class="my-0 w-100">
        <div class="card-actions align-items-center justify-content-end">
            <span class="align-self-center mb-1 mx-1 text-muted">Rows per page:</span>
            <div class="dropdown">
                <button aria-expanded="false" aria-haspopup="true" class="btn btn-outline dropdown-toggle" data-toggle="dropdown" type="button">3</button>
                <div class="dropdown-menu dropdown-menu-right menu">
                    <a class="dropdown-item active" href="#">3</a>
                    <a class="dropdown-item" href="#">10</a>
                    <a class="dropdown-item" href="#">100</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Show all</a>
                </div>
            </div>
            <span class="align-self-center mb-1 mr-2 text-muted">1-3 of 300</span>
            <a class="btn btn-outline" href="#"><i class="material-icons">chevron_left</i></a>
            <a class="btn btn-outline" href="#"><i class="material-icons">chevron_right</i></a>
        </div>
    </div>

    @include('user.index._edit')
    @include('user.index._address')
    @include('user.index._phone')

@stop

@section('script')
    <script type="text/javascript">
        // tooltip
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

    </script>
@endsection