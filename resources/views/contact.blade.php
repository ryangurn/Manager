@extends('layouts.layout')

@section('title', 'Contact Us')

@section('sidebar-about')
    @parent

@section('sidebar-about-title', 'Purpose')
@section('sidebar-about-content')
    Please feel free to reach out to us, this page is mainly to allow us to gather important information when you attempt to get in touch with us. <u>Please read this form carefully as it will ensure a more prompt response.</u>
@stop
@stop

@section('content-main')
    <div class="form-group">
        <div class="floating-label textfield-box">
            <label for="fullname">Full Name</label>
            <input aria-describedby="fullnameHelp" class="form-control" id="fullname" placeholder="Full Name" type="text">
            <small id="fullnameHelp" class="form-text text-muted">Please provide your full name</small>
        </div>
    </div>
    <div class="form-group">
        <div class="floating-label textfield-box">
            <label for="organization">Organization</label>
            <input aria-describedby="organizationHelp" class="form-control" id="organization" placeholder="Organization (optional)" type="text">
            <small id="organizationHelp" class="form-text text-muted">Are you affiliated with any specific organization (optional)</small>
        </div>
    </div>
    <div class="form-group">
        <div class="floating-label textfield-box">
            <label for="loc" style="line-height: 1; top: .5rem; font-size: 0.75rem;">Locations of interest</label>
            <select aria-describedby="locHelp" class="form-control" id="loc" multiple="" placeholder="Location of Interest (optional)">
                <option value="1">Matthew Knight Arena</option>
                <option value="1">Autzen Stadium</option>
                <option value="1">Hult Center</option>
                <option value="1">Cuthbert Amphitheater</option>
            </select>
            <small id="locHelp" class="form-text text-muted">Are there specific locations that you are interested in. (optional, select all that apply)</small>
        </div>
    </div>

    <div class="form-group">
        <div class="floating-label textfield-box">
            <label for="loc" style="line-height: 1; top: .5rem; font-size: 0.75rem;">Services Requested</label>
            <select aria-describedby="locHelp" class="form-control" id="loc" multiple="" placeholder="Services Requested (optional)">
                <option value="1">Arena Support</option>
                <option value="1">Hult Center Support</option>
                <option value="1">Rigging Support</option>
                <option value="1">AV Support</option>
            </select>
            <small id="locHelp" class="form-text text-muted">Are there specific services that you are interested in. (optional, select all that apply)</small>
        </div>
    </div>

    <div class="form-group">
        <div class="floating-label textfield-box">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" placeholder="Message"></textarea>
        </div>
    </div>

    <div class="form-group">
        <input type="submit" class="form-control btn btn-light my-1" value="Submit">
    </div>
@stop