@if(!$users->isEmpty())
    @foreach($users as $user)
<div class="modal fade" id="user_{{ $user->id }}_phone" tabindex="-1" role="dialog" aria-labelledby="Contact {{ ucfirst(strtolower($user->firstname)) }} via SMS" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contact {{ ucfirst(strtolower($user->firstname)) }} via SMS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    If you need to contact {{ ucfirst(strtolower($user->firstname))  }} outside of this system. Here is the phone number, but use it sparingly. When using Manager for communications your personal phone number is kept private. If you decide to use this information outside this system we cannot guarantee that your phone number will be kept private.<br /><br />
                    @if($user->metadata->phone != null)
                        @foreach($user->metadata->phone as $phone)
                    <span class="chip mx-auto mb-3" style="width:100%;">
                        <i class="material-icons">phone</i> {{ phone($phone['phone'], 'US')->formatForCountry('US')  }}
                    </span>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    @endforeach
@endif