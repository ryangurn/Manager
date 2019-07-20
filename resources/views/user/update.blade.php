@extends('layouts.layout')

@section('title', "Edit ". $user->firstname)

@section('sidebar-about')
    @parent

@section('sidebar-about-title', $user->firstname . ' ' . $user->lastname)
@section('sidebar-about-content')
    <h4>Address</h4>
    <form action="{{ action('UserController@address', $user->id)  }}" method="POST">
        <input type="hidden" name="_method" value="PUT" />
        @csrf
        <div class="form-group">
            <label for="addressOne">Address Line 1</label>
            <input type="text" name="addressOne" class="form-control" id="addressOne" aria-describedby="addressOneHelp" placeholder="Address Line 1"@if(isset($user->metadata, $user->metadata->address, $user->metadata->address['lineOne'])) value="{{ $user->metadata->address['lineOne']  }}" @endif>
            <small id="addressOneHelp" class="form-text text-muted">Please provide an address (The first line only).</small>

            @if ($errors->has('addressOne'))
                <div class="invalid-tooltip">
                    {{ $errors->first('addressOne')  }}
                </div>
            @else
                <div class="valid-tooltip">
                    All good!
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="addressTwo">Address Line 2</label>
            <input type="text" name="addressTwo" class="form-control" id="addressTwo" aria-describedby="addressTwoHelp" placeholder="Address Line 2"@if(isset($user->metadata, $user->metadata->address, $user->metadata->address['lineTwo'])) value="{{ $user->metadata->address['lineTwo']  }}" @endif>
            <small id="addressTwoHelp" class="form-text text-muted">Please provide an address (The second line only).</small>

            @if ($errors->has('addressTwo'))
                <div class="invalid-tooltip">
                    {{ $errors->first('addressTwo')  }}
                </div>
            @else
                <div class="valid-tooltip">
                    All good!
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="city">City/Town</label>
            <input type="text" name="city" class="form-control" id="city" aria-describedby="cityHelp"  placeholder="City"@if(isset($user->metadata, $user->metadata->address, $user->metadata->address['city'])) value="{{ $user->metadata->address['city']  }}" @endif>
            <small id="cityHelp" class="form-text text-muted">Please provide the city.</small>

            @if ($errors->has('city'))
                <div class="invalid-tooltip">
                    {{ $errors->first('city')  }}
                </div>
            @else
                <div class="valid-tooltip">
                    All good!
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="state">State/Providence</label>
            <input type="text" name="state" class="form-control" id="state" aria-describedby="stateHelp" placeholder="State/Providence"@if($user->metadata != null && $user->metadata->address != null && $user->metadata->address['state'] != null) value="{{ $user->metadata->address['state']  }}" @endif>
            <small id="stateHelp" class="form-text text-muted">Please provide the state.</small>

            @if ($errors->has('state'))
                <div class="invalid-tooltip">
                    {{ $errors->first('state')  }}
                </div>
            @else
                <div class="valid-tooltip">
                    All good!
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="zipcode">Zipcode/Postal Code</label>
            <input type="text" name="zipcode" class="form-control" id="zipcode" aria-describedby="zipcodeHelp" placeholder="Zipcode/Postal Code"@if($user->metadata != null && $user->metadata->address != null && $user->metadata->address['zipcode'] != null) value="{{ $user->metadata->address['zipcode']  }}" @endif>
            <small id="zipcodeHelp" class="form-text text-muted">Please provide the zipcode/postal code you are in.</small>

            @if ($errors->has('zipcode'))
                <div class="invalid-tooltip">
                    {{ $errors->first('zipcode')  }}
                </div>
            @else
                <div class="valid-tooltip">
                    All good!
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="country">Country</label>
            <select id="country" name="country" class="form-control" aria-describedby="countryHelp">
                <option selected="selected">(please select a country)</option>
                <option value="AF">Afghanistan</option>
                <option value="AL">Albania</option>
                <option value="DZ">Algeria</option>
                <option value="AS">American Samoa</option>
                <option value="AD">Andorra</option>
                <option value="AO">Angola</option>
                <option value="AI">Anguilla</option>
                <option value="AQ">Antarctica</option>
                <option value="AG">Antigua and Barbuda</option>
                <option value="AR">Argentina</option>
                <option value="AM">Armenia</option>
                <option value="AW">Aruba</option>
                <option value="AU">Australia</option>
                <option value="AT">Austria</option>
                <option value="AZ">Azerbaijan</option>
                <option value="BS">Bahamas</option>
                <option value="BH">Bahrain</option>
                <option value="BD">Bangladesh</option>
                <option value="BB">Barbados</option>
                <option value="BY">Belarus</option>
                <option value="BE">Belgium</option>
                <option value="BZ">Belize</option>
                <option value="BJ">Benin</option>
                <option value="BM">Bermuda</option>
                <option value="BT">Bhutan</option>
                <option value="BO">Bolivia</option>
                <option value="BA">Bosnia and Herzegowina</option>
                <option value="BW">Botswana</option>
                <option value="BV">Bouvet Island</option>
                <option value="BR">Brazil</option>
                <option value="IO">British Indian Ocean Territory</option>
                <option value="BN">Brunei Darussalam</option>
                <option value="BG">Bulgaria</option>
                <option value="BF">Burkina Faso</option>
                <option value="BI">Burundi</option>
                <option value="KH">Cambodia</option>
                <option value="CM">Cameroon</option>
                <option value="CA">Canada</option>
                <option value="CV">Cape Verde</option>
                <option value="KY">Cayman Islands</option>
                <option value="CF">Central African Republic</option>
                <option value="TD">Chad</option>
                <option value="CL">Chile</option>
                <option value="CN">China</option>
                <option value="CX">Christmas Island</option>
                <option value="CC">Cocos (Keeling) Islands</option>
                <option value="CO">Colombia</option>
                <option value="KM">Comoros</option>
                <option value="CG">Congo</option>
                <option value="CD">Congo, the Democratic Republic of the</option>
                <option value="CK">Cook Islands</option>
                <option value="CR">Costa Rica</option>
                <option value="CI">Cote d'Ivoire</option>
                <option value="HR">Croatia (Hrvatska)</option>
                <option value="CU">Cuba</option>
                <option value="CY">Cyprus</option>
                <option value="CZ">Czech Republic</option>
                <option value="DK">Denmark</option>
                <option value="DJ">Djibouti</option>
                <option value="DM">Dominica</option>
                <option value="DO">Dominican Republic</option>
                <option value="TP">East Timor</option>
                <option value="EC">Ecuador</option>
                <option value="EG">Egypt</option>
                <option value="SV">El Salvador</option>
                <option value="GQ">Equatorial Guinea</option>
                <option value="ER">Eritrea</option>
                <option value="EE">Estonia</option>
                <option value="ET">Ethiopia</option>
                <option value="FK">Falkland Islands (Malvinas)</option>
                <option value="FO">Faroe Islands</option>
                <option value="FJ">Fiji</option>
                <option value="FI">Finland</option>
                <option value="FR">France</option>
                <option value="FX">France, Metropolitan</option>
                <option value="GF">French Guiana</option>
                <option value="PF">French Polynesia</option>
                <option value="TF">French Southern Territories</option>
                <option value="GA">Gabon</option>
                <option value="GM">Gambia</option>
                <option value="GE">Georgia</option>
                <option value="DE">Germany</option>
                <option value="GH">Ghana</option>
                <option value="GI">Gibraltar</option>
                <option value="GR">Greece</option>
                <option value="GL">Greenland</option>
                <option value="GD">Grenada</option>
                <option value="GP">Guadeloupe</option>
                <option value="GU">Guam</option>
                <option value="GT">Guatemala</option>
                <option value="GN">Guinea</option>
                <option value="GW">Guinea-Bissau</option>
                <option value="GY">Guyana</option>
                <option value="HT">Haiti</option>
                <option value="HM">Heard and Mc Donald Islands</option>
                <option value="VA">Holy See (Vatican City State)</option>
                <option value="HN">Honduras</option>
                <option value="HK">Hong Kong</option>
                <option value="HU">Hungary</option>
                <option value="IS">Iceland</option>
                <option value="IN">India</option>
                <option value="ID">Indonesia</option>
                <option value="IR">Iran (Islamic Republic of)</option>
                <option value="IQ">Iraq</option>
                <option value="IE">Ireland</option>
                <option value="IL">Israel</option>
                <option value="IT">Italy</option>
                <option value="JM">Jamaica</option>
                <option value="JP">Japan</option>
                <option value="JO">Jordan</option>
                <option value="KZ">Kazakhstan</option>
                <option value="KE">Kenya</option>
                <option value="KI">Kiribati</option>
                <option value="KP">Korea, Democratic People's Republic of</option>
                <option value="KR">Korea, Republic of</option>
                <option value="KW">Kuwait</option>
                <option value="KG">Kyrgyzstan</option>
                <option value="LA">Lao People's Democratic Republic</option>
                <option value="LV">Latvia</option>
                <option value="LB">Lebanon</option>
                <option value="LS">Lesotho</option>
                <option value="LR">Liberia</option>
                <option value="LY">Libyan Arab Jamahiriya</option>
                <option value="LI">Liechtenstein</option>
                <option value="LT">Lithuania</option>
                <option value="LU">Luxembourg</option>
                <option value="MO">Macau</option>
                <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
                <option value="MG">Madagascar</option>
                <option value="MW">Malawi</option>
                <option value="MY">Malaysia</option>
                <option value="MV">Maldives</option>
                <option value="ML">Mali</option>
                <option value="MT">Malta</option>
                <option value="MH">Marshall Islands</option>
                <option value="MQ">Martinique</option>
                <option value="MR">Mauritania</option>
                <option value="MU">Mauritius</option>
                <option value="YT">Mayotte</option>
                <option value="MX">Mexico</option>
                <option value="FM">Micronesia, Federated States of</option>
                <option value="MD">Moldova, Republic of</option>
                <option value="MC">Monaco</option>
                <option value="MN">Mongolia</option>
                <option value="MS">Montserrat</option>
                <option value="MA">Morocco</option>
                <option value="MZ">Mozambique</option>
                <option value="MM">Myanmar</option>
                <option value="NA">Namibia</option>
                <option value="NR">Nauru</option>
                <option value="NP">Nepal</option>
                <option value="NL">Netherlands</option>
                <option value="AN">Netherlands Antilles</option>
                <option value="NC">New Caledonia</option>
                <option value="NZ">New Zealand</option>
                <option value="NI">Nicaragua</option>
                <option value="NE">Niger</option>
                <option value="NG">Nigeria</option>
                <option value="NU">Niue</option>
                <option value="NF">Norfolk Island</option>
                <option value="MP">Northern Mariana Islands</option>
                <option value="NO">Norway</option>
                <option value="OM">Oman</option>
                <option value="PK">Pakistan</option>
                <option value="PW">Palau</option>
                <option value="PA">Panama</option>
                <option value="PG">Papua New Guinea</option>
                <option value="PY">Paraguay</option>
                <option value="PE">Peru</option>
                <option value="PH">Philippines</option>
                <option value="PN">Pitcairn</option>
                <option value="PL">Poland</option>
                <option value="PT">Portugal</option>
                <option value="PR">Puerto Rico</option>
                <option value="QA">Qatar</option>
                <option value="RE">Reunion</option>
                <option value="RO">Romania</option>
                <option value="RU">Russian Federation</option>
                <option value="RW">Rwanda</option>
                <option value="KN">Saint Kitts and Nevis</option>
                <option value="LC">Saint LUCIA</option>
                <option value="VC">Saint Vincent and the Grenadines</option>
                <option value="WS">Samoa</option>
                <option value="SM">San Marino</option>
                <option value="ST">Sao Tome and Principe</option>
                <option value="SA">Saudi Arabia</option>
                <option value="SN">Senegal</option>
                <option value="SC">Seychelles</option>
                <option value="SL">Sierra Leone</option>
                <option value="SG">Singapore</option>
                <option value="SK">Slovakia (Slovak Republic)</option>
                <option value="SI">Slovenia</option>
                <option value="SB">Solomon Islands</option>
                <option value="SO">Somalia</option>
                <option value="ZA">South Africa</option>
                <option value="GS">South Georgia and the South Sandwich Islands</option>
                <option value="ES">Spain</option>
                <option value="LK">Sri Lanka</option>
                <option value="SH">St. Helena</option>
                <option value="PM">St. Pierre and Miquelon</option>
                <option value="SD">Sudan</option>
                <option value="SR">Suriname</option>
                <option value="SJ">Svalbard and Jan Mayen Islands</option>
                <option value="SZ">Swaziland</option>
                <option value="SE">Sweden</option>
                <option value="CH">Switzerland</option>
                <option value="SY">Syrian Arab Republic</option>
                <option value="TW">Taiwan, Province of China</option>
                <option value="TJ">Tajikistan</option>
                <option value="TZ">Tanzania, United Republic of</option>
                <option value="TH">Thailand</option>
                <option value="TG">Togo</option>
                <option value="TK">Tokelau</option>
                <option value="TO">Tonga</option>
                <option value="TT">Trinidad and Tobago</option>
                <option value="TN">Tunisia</option>
                <option value="TR">Turkey</option>
                <option value="TM">Turkmenistan</option>
                <option value="TC">Turks and Caicos Islands</option>
                <option value="TV">Tuvalu</option>
                <option value="UG">Uganda</option>
                <option value="UA">Ukraine</option>
                <option value="AE">United Arab Emirates</option>
                <option value="GB">United Kingdom</option>
                <option value="US">United States</option>
                <option value="UM">United States Minor Outlying Islands</option>
                <option value="UY">Uruguay</option>
                <option value="UZ">Uzbekistan</option>
                <option value="VU">Vanuatu</option>
                <option value="VE">Venezuela</option>
                <option value="VN">Viet Nam</option>
                <option value="VG">Virgin Islands (British)</option>
                <option value="VI">Virgin Islands (U.S.)</option>
                <option value="WF">Wallis and Futuna Islands</option>
                <option value="EH">Western Sahara</option>
                <option value="YE">Yemen</option>
                <option value="YU">Yugoslavia</option>
                <option value="ZM">Zambia</option>
                <option value="ZW">Zimbabwe</option>
            </select>
            <small id="countryHelp" class="form-text text-muted">Please provide the country you are in.</small>

            @if ($errors->has('country'))
                <div class="invalid-tooltip">
                    {{ $errors->first('country')  }}
                </div>
            @else
                <div class="valid-tooltip">
                    All good!
                </div>
            @endif
        </div>

        <div class="form-group">
            <input type="submit" class="form-control btn btn-light my-1" value="Submit">
        </div>
    </form>
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
            <form action="{{ action('UserController@update', $user->id)  }}" method="POST">
                <input type="hidden" name="_method" value="PUT" />
                @csrf
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" aria-describedby="firstnameHelp" value="{{ $user->firstname  }}" placeholder="First Name">
                    <small id="firstnameHelp" class="form-text text-muted">Please provide a new first name.</small>

                    @if ($errors->has('firstname'))
                        <div class="invalid-tooltip">
                            {{ $errors->first('firstname')  }}
                        </div>
                    @else
                        <div class="valid-tooltip">
                            All good!
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" aria-describedby="lastnameHelp" value="{{ $user->lastname  }}" placeholder="Last Name">
                    <small id="lastnameHelp" class="form-text text-muted">Please provide a new last name.</small>

                    @if ($errors->has('lastname'))
                        <div class="invalid-tooltip">
                            {{ $errors->first('lastname')  }}
                        </div>
                    @else
                        <div class="valid-tooltip">
                            All good!
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{ $user->email  }}" placeholder="Email">
                    <small id="emailHelp" class="form-text text-muted">Please provide a new email, this will require a verification email to be sent for the new email.</small>

                    @if ($errors->has('email'))
                        <div class="invalid-tooltip">
                            {{ $errors->first('email')  }}
                        </div>
                    @else
                        <div class="valid-tooltip">
                            All good!
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input type="submit" class="form-control btn btn-light my-1" value="Submit">
                </div>

            </form>
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
                                    <div class="expansion-panel-icon ml-3 text-black-secondary">
                                        <i data-toggle="modal" data-target="#remove_phone_{{ $key }}" class="material-icons">remove_circle</i>
                                        <i class="collapsed-show material-icons">keyboard_arrow_down</i>
                                        <i class="collapsed-hide material-icons">keyboard_arrow_up</i>
                                    </div>
                                </div>
                                <div aria-labelledby="headingSeven" class="collapse" data-parent="#accordionPhone" id="collapse{{ $key }}">
                                    <form action="{{ action('UserController@phoneUpdate', [$user->id, $phone['phone']])  }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="PATCH" />
                                        <div class="expansion-panel-body">
                                            <div class="form-group">
                                                <label for="phone">Phone Number</label>
                                                <input type="text" class="form-control @if($errors->has('phone')) is-invalid @elseif(session()->has('validated') && session('validated') && !$errors->has('phone')) is-valid @endif" name="phone" id="phone" aria-describedby="phoneHelp" placeholder="Phone #" value="{{ $phone['phone']  }}">
                                                <small id="phoneHelp" class="form-text text-muted">Please provide your phone number, this will trigger an automatic verification.</small>

                                                @if ($errors->has('phone'))
                                                    <div class="invalid-tooltip">
                                                        {{ $errors->first('phone')  }}
                                                    </div>
                                                @else
                                                    <div class="valid-tooltip">
                                                        All good!
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="carrier">Carrier/Country</label>
                                                <select id="carrier" name="carrier" class="form-control @if($errors->has('carrier')) is-invalid @elseif(session()->has('validated') && session('validated') && !$errors->has('carrier')) is-valid @endif" aria-describedby="carrierHelp">
                                                    @if(!$carriers->isEmpty())
                                                        @foreach($carriers as $carrier)
                                                            <option value="{{ $carrier->id  }}" @if($phone['carrier'] == $carrier->id) selected @endif>{{ $carrier->country  }} - {{ $carrier->name  }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <small id="carrierHelp" class="form-text text-muted">What carrier and country is your phone number with?</small>

                                                @if ($errors->has('carrier'))
                                                    <div class="invalid-tooltip">
                                                        {{ $errors->first('carrier')  }}
                                                    </div>
                                                @else
                                                    <div class="valid-tooltip">
                                                        All good!
                                                    </div>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="expansion-panel-footer">
                                            <button class="btn btn-outline" data-target="#collapse{{ $key }}" data-toggle="collapse" type="button">Cancel</button>
                                            <input class="btn btn-outline-info" data-target="#collapse{{ $key }}" data-toggle="collapse" type="submit" value="Save"/>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div id="remove_phone_{{ $key  }}" class="modal">
                                <form action="{{ action('UserController@phoneDelete', [$user->id, $phone['phone']])  }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <p class="text-black-secondary typography-subheading">Delete?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-outline-info" data-dismiss="modal" type="button">Cancel</button>
                                                <input class="btn btn-outline-info" type="submit" value="Discard" />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        @endforeach
                    </div>
                </div>
            @endif

            <h4>Add Phone</h4>
            <form action="{{ action('UserController@phone', $user->id)  }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT" />
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control @if($errors->has('phone')) is-invalid @elseif(session()->has('validated') && session('validated') && !$errors->has('phone')) is-valid @endif" name="phone" id="phone" aria-describedby="phoneHelp" placeholder="Phone #">
                    <small id="phoneHelp" class="form-text text-muted">Please provide your phone number, this will trigger an automatic verification.</small>

                    @if ($errors->has('phone'))
                        <div class="invalid-tooltip">
                            {{ $errors->first('phone')  }}
                        </div>
                    @else
                        <div class="valid-tooltip">
                            All good!
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="carrier">Carrier/Country</label>
                    <select id="carrier" name="carrier" class="form-control @if($errors->has('carrier')) is-invalid @elseif(session()->has('validated') && session('validated') && !$errors->has('carrier')) is-valid @endif" aria-describedby="carrierHelp">
                        @if(!$carriers->isEmpty())
                            @foreach($carriers as $carrier)
                                <option value="{{ $carrier->id  }}">{{ $carrier->country  }} - {{ $carrier->name  }}</option>
                            @endforeach
                        @endif
                    </select>
                    <small id="carrierHelp" class="form-text text-muted">What carrier and country is your phone number with?</small>

                    @if ($errors->has('carrier'))
                        <div class="invalid-tooltip">
                            {{ $errors->first('carrier')  }}
                        </div>
                    @else
                        <div class="valid-tooltip">
                            All good!
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input type="submit" class="form-control btn btn-light my-1" value="Submit">
                </div>
            </form>
        </div>
        <div aria-labelledby="dob-tab" class="tab-pane fade mt-3" id="dob" role="tabpanel">
            <form action="{{ action('UserController@birthdate', $user->id)  }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT" />
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="text" class="form-control" name="dob" id="dobpicker" aria-describedby="dobHelp" placeholder="Date of Birth" @if($user->metadata != null && $user->metadata->birthdate != null) value="{{ \Carbon\Carbon::parse($user->metadata->birthdate)->format('m/d/Y')  }}" @endif>

                    <small id="dobHelp" class="form-text text-muted">What is your birthdate.</small>

                    @if ($errors->has('dob'))
                        <div class="invalid-tooltip">
                            {{ $errors->first('dob')  }}
                        </div>
                    @else
                        <div class="valid-tooltip">
                            All good!
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input type="submit" class="form-control btn btn-light my-1" value="Submit">
                </div>
            </form>
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