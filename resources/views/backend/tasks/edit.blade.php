@extends('backend.layouts.app')

@section('title', ' - Editar')

@section('main')

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

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar Tarefa</h3>
                    <div class="card-tools">
                        <div class="card-tools">
                            <a class="btn btn-tool" href=""><i class="fas fa-sync-alt"></i></a>
                            <!-- btn-tool delete form -->
                            <form action="{{ route('backend.tasks.destroy', $task->id) }}" method="post" class="d-inline">
                                @method('DELETE') @csrf
                                <button type="submit" class="btn btn-tool btn-delete red-hover" title="Deseja excluir esta Tarefa?"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </div><!-- .card-tools -->
                    </div><!-- .card-tools -->
                </div><!-- .card-header -->
                <form action="{{ route('backend.tasks.update', $task->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="inputDate">Data</label>
                                    <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" id="inputDate" value="{{ old('date', $task->date) }}">
                                    <div class="invalid-feedback">{{ $errors->first('date') }}</div>
                                </div><!-- .form-group -->
                            </div><!-- .col-xl-6 -->

                            <div class="col-xl-12">
                                <label for="inputDescription">Descrição</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5" id="inputDescription">{{ old('description', $task->description) }}</textarea>
                                <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                            </div><!-- col-xl-12 -->
                        </div><!-- .row -->
                    </div><!-- .card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-block btn-primary">Atualizar</button>
                    </div><!-- bard-footer -->
                </form>
            </div><!-- .card -->
        </div><!-- .col-xl-12 -->
    </div><!-- .row -->

@endsection
