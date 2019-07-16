@if(!$users->isEmpty())
    @foreach($users as $user)
<div class="modal fade" id="user_{{ $user->id }}_edit" tabindex="-1" role="dialog" aria-labelledby="Edit {{ $user->firstname }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ $user->firstname  }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="user_{{ $user->id }}_edit_form">
                    @csrf
                    <div class="form-group">
                        <div id="user_{{ $user->id }}_edit_firstname_div" class="textfield-box">
                            <input aria-describedby="firstnameHelp" class="form-control" name="firstname" id="user_{{ $user->id }}_edit_firstname" placeholder="First Name" value="{{ $user->firstname  }}" type="text" />
                            <small id="firstnameHelp" class="form-text text-muted">Please provide your first name.</small>
                        </div>

                        <div id="user_{{ $user->id }}_edit_lastname_div" class="textfield-box">
                            <input aria-describedby="lastnameHelp" class="form-control" name="lastname" id="user_{{ $user->id }}_edit_lastname" placeholder="Last Name" value="{{ $user->lastname  }}" type="text" />
                            <small id="lastnameHelp" class="form-text text-muted">Please provide your last name.</small>
                        </div>

                        <div id="user_{{ $user->id }}_edit_email_div" class="textfield-box">
                            <input aria-describedby="emailHelp" class="form-control @if($errors->has('email')) is-invalid @elseif(session()->has('validated') && session('validated') && !$errors->has('email')) is-valid @endif" name="email" id="user_{{ $user->id }}_edit_email" placeholder="Email" value="{{ $user->email  }}" type="text" />
                            <small id="emailHelp" class="form-text text-muted">Please provide your email.</small>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="user_{{ $user->id }}_edit_save" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

        <script type="text/javascript">
            $("#user_{{ $user->id }}_edit_save").click(function(e){
                e.preventDefault();
                var firstname = $("#user_{{ $user->id }}_edit_firstname").val();
                var lastname = $("#user_{{ $user->id }}_edit_lastname").val();
                var email = $("#user_{{ $user->id }}_edit_email").val();
                $.ajax({
                    type:'PUT',
                    url:'{{ action('UserController@update', $user->id)  }}',
                    data:{firstname:firstname, lastname:lastname, email:email, _token:'{{ csrf_token() }}'},
                    success:function(data){

                    },
                });
            });

        </script>
    @endforeach
@endif