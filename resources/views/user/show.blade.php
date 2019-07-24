@extends('layouts.layout')

@section('title', "Edit ". $user->firstname)

@section('sidebar-about')
    @parent

@section('sidebar-about-title', $user->firstname . ' ' . $user->lastname)
@section('sidebar-about-content')
    <h4>Address</h4>
    <div class="form-group">
        <label for="addressOne">Address Line 1</label>
        <p>@if(isset($user->metadata, $user->metadata->address, $user->metadata->address['lineOne'])) {{ $user->metadata->address['lineOne']  }} @endif</p>
    </div>

    <div class="form-group">
        <label for="addressTwo">Address Line 2</label>
        <p>@if(isset($user->metadata, $user->metadata->address, $user->metadata->address['lineTwo']) && $user->metadata->address['lineTwo'] != "") {{ $user->metadata->address['lineTwo']  }} @else NA @endif</p>
    </div>

    <div class="form-group">
        <label for="city">City/Town</label>
        <p>@if(isset($user->metadata, $user->metadata->address, $user->metadata->address['city'])) {{ $user->metadata->address['city']  }} @endif</p>

    </div>

    <div class="form-group">
        <label for="state">State/Providence</label>
        <p>@if(isset($user->metadata, $user->metadata->address, $user->metadata->address['state'])) {{ $user->metadata->address['state']  }} @endif</p>
    </div>

    <div class="form-group">
        <label for="zipcode">Zipcode/Postal Code</label>
        <p>@if(isset($user->metadata, $user->metadata->address, $user->metadata->address['zipcode'])) {{ $user->metadata->address['zipcode']  }} @endif</p>

    </div>

    <div class="form-group">
        <label for="country">Country</label>
        <p>@if(isset($user->metadata, $user->metadata->address, $user->metadata->address['country'])) {{ \App\Country::where('abbr', '=', $user->metadata->address['country'])->first()->name  }} @endif</p>
    </div>
@endsection
@stop

@section('content-main')
    <ul class="nav nav-justified nav-tabs" id="justifiedTab" role="tablist">
        <li class="nav-item">
            <a aria-controls="basic" aria-selected="true" class="nav-link active" data-toggle="tab" href="#basic" id="basic-tab" role="tab">Basic Information</a>
        </li>
        <li class="nav-item">
            <a aria-controls="phone" aria-selected="false" class="nav-link" data-toggle="tab" href="#phone" id="phone-tab" role="tab">Phone</a>
        </li>
        <li class="nav-item">
            <a aria-controls="dob" aria-selected="false" class="nav-link" data-toggle="tab" href="#dob" id="dob-tab" role="tab">Birthdate</a>
        </li>
    </ul>
    <div class="tab-content" id="justifiedTabContent">
        <div aria-labelledby="basic-tab" class="tab-pane fade show active mt-3" id="basic" role="tabpanel">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <p>{{ $user->firstname  }}</p>
            </div>

            <div class="form-group">
                <label for="lastname">Last Name</label>
                <p>{{ $user->lastname }}</p>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <p>{{ $user->email  }}</p>
            </div>
        </div>
        <div aria-labelledby="phone-tab" class="tab-pane fade mt-3" id="phone" role="tabpanel">
            @if($user->metadata != null && $user->metadata->phone != null && count($user->metadata->phone) >= 1)
                <div class="mb-3">
                    <h4>Phone Numbers</h4>
                    <div class="list-group" id="accordionPhone">
                        @foreach($user->metadata->phone as $key => $phone)
                            <div class="expansion-panel list-group-item">
                                <div aria-controls="collapse{{ $key }}" aria-expanded="false" class="expansion-panel-toggler collapsed" data-target="#collapse{{ $key }}" data-toggle="collapse" id="headingSeven" role="button">
                                    <div class="media-body row">
                                        <div class="col-12 col-sm-4">
                                            {{ \App\Carrier::where('id', $phone['carrier'])->first()->name  }}
                                        </div>
                                        <div class="col-12 col-sm-8 text-black-secondary">
                                            {{ phone($phone['phone'], 'US')->formatForCountry("US") }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        <div aria-labelledby="dob-tab" class="tab-pane fade mt-3" id="dob" role="tabpanel">
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <p>@if($user->metadata != null && $user->metadata->birthdate != null) {{ \Carbon\Carbon::parse($user->metadata->birthdate)->format('m/d/Y')  }} @endif</p>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript">
        $('#dobpicker').pickdate({
            formatSubmit     : 'yyyy-mm-dd',
            selectMonths: true,
            selectYears: 99,
            max: true
        });
    </script>
@endsection