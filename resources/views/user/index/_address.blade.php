@if(!$users->isEmpty())
    @foreach($users as $user)
        @if($user->metadata()->exists())
<div class="modal fade" id="user_{{ $user->id }}_address" tabindex="-1" role="dialog" aria-labelledby="Address for {{ $user->firstname }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Address for {{ $user->firstname }} {{ $user->lastname }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $user->metadata->address['lineOne']  }}<br />
                @if($user->metadata->address['lineTwo'] != null)
                {{ $user->metadata->address['lineTwo']  }}<br />
                @endif
                {{ $user->metadata->address['city']  }}, {{ $user->metadata->address['state']  }} {{ $user->metadata->address['zipcode']  }}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
        @endif
    @endforeach
@endif