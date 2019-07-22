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
        <table class="table mb-0 table-responsive">
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
                        <td>
                            <a class="chip chip-action mb-1" href="#"><i class="chip-icon">{{ substr($user->firstname, 0, 1) }}{{ substr($user->lastname, 0, 1)  }}</i>{{ $user->firstname  }} {{ $user->lastname }}</a>
                            @if($user->hasRole('disabled')) <span class="badge badge-pill badge-dark">Disabled</span> @endif
                        </td>
                        <td>
                            <a class="badge badge-pill badge-secondary" href="mailto:{{ $user->email  }}"><i class="material-icons">email</i>{{ substr($user->email, 0, 100)  }}...</a>
                            @if($user->metadata()->exists() && $user->metadata->phone != null)
                                <a data-toggle="modal" data-target="#user_{{ $user->id }}_phone"><span class="badge badge-pill badge-secondary"><i class="material-icons">phone</i></span></a>
                            @else
                                <span class="badge badge-pill badge-secondary" data-toggle="tooltip" title="Phone number not provided yet."><i class="material-icons">phonelink_erase</i></span>
                            @endif
                        </td>
                        <td>
                            @if($user->metadata()->exists() && $user->metadata->address != null)
                                <a data-toggle="modal" data-target="#user_{{ $user->id }}_address"><span class="badge badge-pill badge-dark"><i class="material-icons">home</i></span></a>
                            @else
                                <a data-toggle="tooltip" title="Address not provided yet."><span class="badge badge-pill badge-dark"><i class="material-icons">home</i></span></a>
                            @endif
                        </td>
                        <td>
                            @if(!$user->hasRole('disabled'))
                            <a href="#" data-toggle="modal" data-target="#delete_user_{{ $user->id  }}"><span class="badge badge-pill badge-danger"><i class="material-icons">delete</i></span></a>
                            @else
                            <a href="#" data-toggle="modal" data-target="#restore_user_{{ $user->id  }}"><span class="badge badge-pill badge-danger"><i class="material-icons">settings_backup_restore</i></span></a>
                            @endif
                            <a href="{{ action('UserController@edit', $user->id)  }}"><span class="badge badge-pill badge-info"><i class="material-icons">edit</i></span></a>
                            @if(!$user->hasRole('disabled'))
                            <div class="modal" id="delete_user_{{ $user->id }}">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <p class="text-black-secondary typography-subheading">Disable User</p>
                                        </div>
                                        <form class="modal-footer" action="{{ action('UserController@destroy', [$user->id])  }}" method="POST">
                                            <button class="btn btn-outline-info" data-dismiss="modal" type="button">Cancel</button>
                                            <input type="hidden" name="_method" value="DELETE" />
                                            @csrf
                                            <input type="submit" class="btn btn-outline-info" value="Disable" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="modal" id="restore_user_{{ $user->id }}">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <p class="text-black-secondary typography-subheading">Restore User</p>
                                        </div>
                                        <form class="modal-footer" action="{{ action('UserController@restore', [$user->id])  }}" method="POST">
                                            <button class="btn btn-outline-info" data-dismiss="modal" type="button">Cancel</button>
                                            <input type="hidden" name="_method" value="PUT" />
                                            @csrf
                                            <input type="submit" class="btn btn-outline-info" value="Restore" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <hr class="my-0 w-100">
        <div class="card-actions align-items-center justify-content-end">
            <span class="align-self-center mb-1 mr-2 text-muted">{{ $users->currentPage()  }}-{{ $users->lastPage()  }} of {{ $users->total()  }}</span>

            <a class="btn btn-outline" href="{{ $users->previousPageUrl()  }}"><i class="material-icons">chevron_left</i></a>
            @if($users->hasMorePages())
            <a class="btn btn-outline" href="{{ $users->nextPageUrl()  }}"><i class="material-icons">chevron_right</i></a>
            @endif
        </div>
    </div>

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