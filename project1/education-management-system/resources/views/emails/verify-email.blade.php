@extends('emails.email')

@section('email-message')
        We need to verify you email address {{$emailAddress}}.
        Please go to {{$emailVerificationLink}}.
@endsection