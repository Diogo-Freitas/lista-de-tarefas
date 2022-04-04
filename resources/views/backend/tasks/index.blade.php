@extends('backend.layouts.app')

@section('main')

    <section class="content">

        <div class="row">
            <div class="col-12">
                <a href="{{ route('backend.tasks') }}" class="btn btn-header indigo-hover">
                    <i class="fas fa-list"></i> <span>Tarefas</span>
                </a><!-- .btn-header -->
                <a href="{{ route('backend.tasks.create') }}" class="btn btn-header green-hover">
                    <i class="fas fa-plus"></i> <span>Cadastrar</span>
                </a><!-- .btn-header -->
            </div><!-- .col-12 -->
        </div><!-- .row -->

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de Tarefas</h3>
                <div class="card-tools">
                    <a class="btn btn-tool" href="{{ route('backend.tasks') }}"><i class="fas fa-sync-alt"></i></a>
                </div><!-- .card-tools -->
            </div><!-- .card-header -->
            <div class="card-body">
                <div class="dataTables_wrapper dt-bootstrap4">

                    <form id="form-search" action="{{ route('backend.tasks') }}" method="GET">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <input name="search" value="{{ request('search') }}" type="search" class="form-control" placeholder="Pesquisar">
                                    <div class="input-group-append search-append">
                                        <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
                                    </div><!-- .input-group-append -->
                                </div><!-- .input-group -->
                            </div><!-- .col-lg-6 -->
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <div class="input-group mb-3 ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">De</span>
                                        </div><!-- .input-group-prepend -->
                                        <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" id="inputStartDate" value="{{ old('start_date', request('start_date')) }}" onchange="this.form.submit()">
                                    </div><!-- .input-group -->
                                    <div class="invalid-feedback">{{ $errors->first('start_date') }}</div>
                                </div><!-- .form-group -->
                            </div><!-- .col-lg-3 -->
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <div class="input-group mb-3 ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Até</span>
                                        </div><!-- .input-group-prepend -->
                                        <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" id="inputFinalDate" value="{{ old('end_date', request('end_date')) }}" onchange="this.form.submit()">
                                    </div><!-- .input-group -->
                                    <div class="invalid-feedback">{{ $errors->first('end_date') }}</div>
                                </div><!-- .form-group -->
                            </div><!-- .col-lg-3 -->
                        </div><!-- .row -->
                        <input type="hidden" name="sort_order" value="{{ request('sort_order') }}">
                    </form><!-- #form-search -->

                    <div class="table-conteiner">
                        <table class="table table-bordered table-striped dataTable dtr-inline" role="grid">
                            <thead>
                                <tr>
                                    <th data-href="{{ route('backend.tasks', [
                                        'search' => request('search'),
                                        'start_date' => request('start_date'),
                                        'end_date' => request('end_date'),
                                        'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc',
                                    ]) }}" class="sorting sorting_{{ request('sort_order') }}" tabindex="0" rowspan="1" colspan="1">Data</th>
                                    <th rowspan="1" colspan="1">Descrição</th>
                                    <th rowspan="1" colspan="1">Opção</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tasks as $task)
                                    <tr>
                                        <td>{{ date('d/m/Y', strtotime($task->date)) }}</td>
                                        <td>{{ $task->description }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-dot" type="button" data-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item orange-hover" href="{{ route('backend.tasks.update', $task->id) }}"><i class="far fa-edit"></i> <span>Editar</span></a>
                                                    <form action="{{ route('backend.tasks.destroy', $task->id) }}" method="post">
                                                        @method('DELETE') @csrf
                                                        <button type="submit" class="dropdown-item btn-delete red-hover" title="Deseja excluir esta Tarefa?"><i class="far fa-trash-alt"></i> <span>Excluir</span></button>
                                                    </form>
                                                </div><!-- .dropdown-menu -->
                                            </div><!-- .dropdown -->
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="empty-table">
                                        <td colspan="100%">
                                            <p>Nenhum registro encontrado!</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">Data</th>
                                    <th rowspan="1" colspan="1">Descrição</th>
                                    <th rowspan="1" colspan="1">Opção</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            @if ($tasks->firstItem())
                                <div class="dataTables_info">Mostrando {{ $tasks->firstItem() }} a {{ $tasks->lastItem() }} de {{ $tasks->total() }}</div>
                            @endif
                        </div><!-- .col-sm-12 col-md-5 -->
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                    {!! $tasks->links() !!}
                                </ul><!-- .pagination -->
                            </div><!-- .dataTables_paginate -->
                        </div><!-- .col-md-7 -->
                    </div><!-- .row -->
                </div><!-- .dataTables_wrapper -->
            </div><!-- .card-body -->
        </div><!-- .card -->
    </section>

@endsection

@section('scripts')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/responsive.bootstrap4.min.css') }}">
@endsection
