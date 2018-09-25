<body>
    <p>
        Hello {{ $data->name }},
        <br><br>
        Please follow the link below to reset the password of your account.
        <br>
        <a href='{{ url('reset_password/'.$data->remember_token) }}'>{{ url('reset_password') }}</a>
        <br><br>
        Once reset, you may need to input a new password again.
        <br>
        <br><br>
        Thanks,
        <br>
        Web Admin, Neway Manpower Services Inc.
        <br>
        <a href='{{ url('/') }}'><img src="{{ asset('template/landing_page/images/logo-small.png') }}" alt=""></a>
    </p>
</body>