@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-md-8">
                <div class="card" style="width: 170%;">
                    <div class="card-header">{{ __('Editar cadastro') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user) }}">
                            @method("PUT")
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $user->name }}" required autocomplete="status" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="CPF" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>

                                <div class="col-md-6">
                                    <input id="CPF" type="text" class="form-control @error('CPF') is-invalid @enderror"
                                        name="CPF" value="{{ $user->CPF }}" required autocomplete="CPF" autofocus>

                                    @error('CPF')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ $user->email }}" required autocomplete="status" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        value="" autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirme sua senha') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" value="" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button onclick="validarCPF(CPF)" type="submit" class="btn btn-primary">
                                        {{ __('Editar dados!') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </div>
@endsection
@push('importacao-jquery')
    <script>
        (function( $ ) {
            $(function() {
                $("#CPF").mask('000.000.000-00', {reverse: true});
            });
        })(jQuery);

        function validarCPF(CPF) {
            CPF = CPF.replace(/[^\d]+/g, '');
            if(CPF){

                if (CPF.length != 11 ||
                CPF == "00000000000" ||
                CPF == "11111111111" ||
                CPF == "22222222222" ||
                CPF == "33333333333" ||
                CPF == "44444444444" ||
                CPF == "55555555555" ||
                CPF == "66666666666" ||
                CPF == "77777777777" ||
                CPF == "88888888888" ||
                CPF == "99999999999"){
                    alert("O CPF digitado é inválido");
                    return false;
                }
                // Valida 1o digito
                add = 0;
                for (i = 0; i < 9; i++)
                    add += parseInt(cpf.charAt(i)) * (10 - i);
                rev = 11 - (add % 11);
                if (rev == 10 || rev == 11)
                    rev = 0;
                if (rev != parseInt(cpf.charAt(9))){
                    alert("O CPF digitado é inválido");
                    return false;
                }
                // Valida 2o digito
                add = 0;
                for (i = 0; i < 10; i++)
                    add += parseInt(cpf.charAt(i)) * (11 - i);
                rev = 11 - (add % 11);
                if (rev == 10 || rev == 11)
                    rev = 0;
                if (rev != parseInt(cpf.charAt(10))){
                    alert("O CPF digitado é inválido");
                    return false;
                }

                return true;
            }


        }
        $("#CPF").blur(function() {
            validarCPF($(this).val())
            alert("CPF Inválido");
        });

    </script>
@endpush
