@extends('layouts.app')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form method="POST" id="usrform" action="{{ route('ServicosReal.store') }}">
                        @csrf
                        <div class="card-header">Criação de serviços</div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="NomeServico"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome do Serviço') }}</label>

                                <div class="col-md-6">
                                    <input id="serv" type="text" class="form-control" name="NomeServico"
                                        value="{{ old('name') }}" required autocomplete="NomeServico" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="DescricaoServico"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Descrição do serviço') }}</label>

                                <div class="col-md-6">
                                    <input id="DescricaoServico" type="textarea" class="form-control"
                                        name="DescricaoServico" value="{{ old('DescricaoServico') }}" required
                                        autocomplete="DescricaoServico" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('Colaborador: ') }}</label>

                                <div class="col-md-6">
                                    <select name="user_id" class="col-md-12 col-form-label text-md-right">
                                        <option value="">Selecione uma opcao</option>
                                        @foreach (\App\User::all() as $user)
                                            @if ($user->id == auth()->user()->id)
                                                <option value="{{ $user->id }}" selected>{{ auth()->user()->name }}</option>
                                            @else
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="DataFim"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Previsão de fim: ') }}</label>

                                <div class="col-md-6">
                                    <input id="DataFim" type="date" class="form-control" name="DataFim"
                                        value="{{ old('DataFim') }}" max="2077-04-30" required autocomplete="DataFim"
                                        autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Status: ') }}</label>

                                <div class="col-md-6">
                                    <select id="status" class="col-md-12 col-form-label text-md-right" name="status"
                                        value="{{ old('status') }}" required autocomplete="status" autofocus>
                                        <option value="">Selecione uma opcao</option>
                                        <option value="Aberta" selected>Aberta</option>
                                        <option value="Em andamento">Em andamento</option>
                                        <option value="Concluída">Concluída</option>
                                        <option value="Em atraso">Em atraso</option>
                                    </select>
                                </div>
                                <input id="created_by" type="hidden" name="created_by" value="{{ auth()->user()->id }}"
                                    autocomplete="created_by">
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Criar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        </div>
    @endsection
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script>
        $(function() {
            $('#DataFim').prop('min', function() {
                return new Date().toJSON().split('T')[0];
            });
        });

    </script>
