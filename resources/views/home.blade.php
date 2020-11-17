@extends('layouts.app')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@section('content')

    <div class="container">
        <a href="{{ route('users.edit', [auth()->user()]) }}" class="btn btn-primary" style="margin-left: 22%"
            title="Editar registro">Editar dados da
            conta</a>
        <a href="{{ route('servicosAtribuidos') }}" class="btn btn-primary" style="margin-left: 20%"
            title="Tarefas que atribui">Tarefas atribuidas por mim</a>
        <div class="row justify-content-left">
            <div class="col-md-8">
                <div class="card" style="width: 170%;">
                    <div class="card-header">Serviços</div>
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if (Session::has('alert-' . $msg))
                                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                            @endif
                        @endforeach
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Serviço</th>
                                    <th>Descrição</th>
                                    <th>Status</th>
                                    <th>Previsão final</th>
                                    <th>Colaborador</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($servicosLista as $servicosLista)
                                    <tr>
                                        <td>{{ $servicosLista->NomeServico }}</td>
                                        <td><textarea readonly name="comment" form="usrform" class="md-textarea form-control"
                                                cols="7">{{ $servicosLista->DescricaoServico }}</textarea>
                                        <td>{{ $servicosLista->status }}</td>
                                        <td>{{ date('d/m/Y', strtotime($servicosLista->DataFim)) }}</td>
                                        <td>{{ !empty(\App\User::find($servicosLista->user_id)) ? \App\User::find($servicosLista->user_id)->name : 'Não indicado' }}
                                        </td>

                                        <td>
                                            <a href="{{ route('ServicosReal.edit', [$servicosLista]) }}"
                                                class="btn btn-warning fa fa-edit" title="Editar registro"></a>


                                            <form method="POST" id="frm-delete-{{ $servicosLista->id }}"
                                                action="{{ route('ServicosReal.destroy', $servicosLista->id) }}">
                                                @csrf
                                                @method("DELETE")
                                            </form>
                                            <a class="btn btn-danger apagar-registro" data-id="{{ $servicosLista->id }}"
                                                href="#"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" style="text-align: center">Nenhum registro encontrado.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <a href="{{ route('ServicosReal.create') }}" class="btn btn-secondary">Novo serviço +</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('importacao-jquery')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(".apagar-registro").click(function() {
            var id_registro = $(this).attr('data-id');

            Swal.fire({
                title: 'Deseja excluir?',
                text: "Seu registro será removido permanentemente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, quero excluir!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#frm-delete-" + id_registro).submit();
                }
            })
            return false;
        })

    </script>
@endpush
