<!DOCTYPE html>
<html>
<head>
    <title>Your Form</title>
    <link rel="stylesheet" href="{{ asset('css/Form.css')}}">
    {{-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}
    {{-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}
    <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <form action="{{ route('submit')}}" method="POST" onsubmit="captureDeviceInfo()">
        @csrf
        @method('POST')
        <div class="group-form mb-3">
            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required><br>
        </div>
        <div class="group-form mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required><br>
        </div>
        {{-- {{ dd(config('services.recaptcha.site_key'))}} --}}
        <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.site_key')}}"></div><br>
        @error('g-recaptcha-response')
           <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>
