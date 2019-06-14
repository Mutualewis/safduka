@extends ('layouts.dashboard')
@section('section')

<div class="container">
    <h2>Validate your One Time Password</h2>

    @isset($callId)
        <div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Call with ID {{$callId}} has been made to your authorised phone number.
        </div>
     @endisset

    <form method="post" action="{{route('otp.validate')}}">
        @csrf
        <div class="form-group">
            <input type="number" name="otpCode" placeholder="Enter the OTP provided to you" class="form-control" required>
        </div>

        <input type="submit" value="Validate OTP" class="btn btn-success">
    </form>