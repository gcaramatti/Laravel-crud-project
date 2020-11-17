@extends('layouts.app')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@section('content')

    <div class="container">
        <div class="row justify-content-left">
            <div class="col-md-8">
                <div class="card" style="width: 170%;">
                    <form method="POST" action="{{ route('ServicosReal.update', [$servicosLista]) }}">
                        @csrf
                        @method("PUT")
                        <div class="card-header">Editando serviço {{ $servicosLista->NomeServico }}</div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="NomeServico"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome do Serviço') }}</label>

                                <div class="col-md-6">
                                    <input id="serv" type="text" class="form-control" name="NomeServico"
                                        value="{{ $servicosLista->NomeServico }}" required autocomplete="NomeServico"
                                        autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="DescricaoServico"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Descrição do serviço') }}</label>

                                <div class="col-md-6">
                                    <input id="DescricaoServico" type="text" class="form-control" name="DescricaoServico"
                                        value="{{ $servicosLista->DescricaoServico }}" required
                                        autocomplete="DescricaoServico" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="NomeColaborador"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Colaborador: ') }}</label>

                                <div class="col-md-6">
                                    <select name="user_id" class="col-md-12 col-form-label text-md-right">
                                        <option value="">Selecione uma opcao</option>
                                        @foreach (\App\User::all() as $user)
                                            <option @if ($servicosLista->user_id == $user->id)
                                                selected
                                        @endif value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="DataFim"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Previsão de fim: ') }}</label>

                                <div class="col-md-6">
                                    <input id="DataFim" type="date" class="form-control" name="DataFim"
                                        value="{{ $servicosLista->DataFim }}" max="2077-04-30" required
                                        autocomplete="DataFim" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Status: ') }}</label>

                                <div class="col-md-6">
                                    <select id="status" class="col-md-12 col-form-label text-md-right" name="status"
                                        required autocomplete="status">
                                        <option value="Aberta" @if ($servicosLista->status == 'Aberta') selected </beautify
                                                end="  @endif">Aberta</option>
                                        <option value="Em andamento" @if ($servicosLista->status == 'Em andamento') selected </beautify
                                                end="  @endif">Em andamento</option>
                                        <option value="Concluida" @if ($servicosLista->status == 'Concluida') selected </beautify
                                                end="  @endif">Concluída</option>
                                        <option value="Em atraso" @if ($servicosLista->status == 'Em atraso') selected </beautify
                                                end="  @endif">Em atraso</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Editar
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
    <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }

        today = dd + '-' + mm + '-' + yyyy;
        document.getElementById("DataFim").setAttribute("min", today);

        $(function() {
            $('#DataFim').prop('min', function() {
                return new Date().toJSON().split('T')[0];
            });
        });

    </script>
