@extends('backend.layouts.app')

@section('title', ' - Cadastrar')

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

    <form action="{{ route('backend.tasks.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cadastrar Tarefa</h3>
                        <div class="card-tools">
                            <a class="btn btn-tool" href=""><i class="fas fa-sync-alt"></i></a>
                        </div><!-- .card-tools -->
                    </div><!-- .card-header -->
                    <div class="card-body">

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="date">Data</label>
                                    <input type="date" name="date" id="date" class="form-control @error('description') is-invalid @enderror" value="{{ old('date') }}">
                                    <div class="invalid-feedback">{{ $errors->first('date') }}</div>
                                </div><!-- .form-group -->
                            </div><!-- .col-xl-6 -->

                            <div class="col-xl-12">
                                <label for="inputDescription">Descrição</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5" id="inputDescription">{{ old('description') }}</textarea>
                                <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                            </div><!-- col-xl-12 -->
                        </div><!-- .row -->
                    </div><!-- .card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-block btn-primary">Salvar</button>
                    </div><!-- bard-footer -->

                </div><!-- .card -->
            </div><!-- .col-xl-12 -->
        </div><!-- .row -->
    </form>

@endsection
