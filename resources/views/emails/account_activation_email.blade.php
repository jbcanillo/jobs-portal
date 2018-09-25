<body>
    <p>
        Hello {{ $data->name }},
        <br><br>
        Please follow the link below to activate your account.
        <br>
        <a href='{{ url('account_activation/'.$data->activation_code) }}'>{{ url('account_activation') }}</a>
        <br>
        <br><br>
        Thanks,
        <br>
        Web Admin, Neway Manpower Services Inc.
        <br>
        <a href='{{ url('/') }}'><img src="{{ asset('template/landing_page/images/logo-small.png') }}" alt=""></a>
    </p>
</body>