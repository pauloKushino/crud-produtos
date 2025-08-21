@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Gerenciamento de Produtos</h1>

    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Pesquisar</h5>
                    <form action="{{ route('produtos.index') }}" method="GET" class="mb-4">
                        <div class="mb-3">
                            <label for="filter_type" class="form-label">Filtrar por:</label>
                            <select name="filter_type" id="filter_type" class="form-select">
                                <option value="id" {{ request('filter_type') == 'id' ? 'selected' : '' }}>ID</option>
                                <option value="nome" {{ request('filter_type') == 'nome' ? 'selected' : '' }}>Nome</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="search" class="form-label">Valor:</label>
                            <input type="text" name="search" id="search" class="form-control" placeholder="Informe o valor" value="{{ request('search') }}">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-search"></i> Pesquisar
                        </button>
                    </form>

                    <h5 class="card-title">Ordenar</h5>
                    <form action="{{ route('produtos.index') }}" method="GET">
                        <div class="mb-3">
                            <label for="order_by" class="form-label">Ordenar por:</label>
                            <select name="order_by" id="order_by" class="form-select">
                                <option value="id" {{ request('order_by') == 'id' ? 'selected' : '' }}>ID</option>
                                <option value="nome" {{ request('order_by') == 'nome' ? 'selected' : '' }}>Nome</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-secondary w-100">
                            <i class="fas fa-sort"></i> Ordenar
                        </button>
                    </form>

                    <h5 class="card-title mt-4">Cadastrar Produto</h5>
                    <!-- Botão para abrir o modal -->
                    <button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#createModal">
                        <i class="fas fa-plus"></i> Novo Produto
                    </button>
                </div>
            </div>
        </div>

        <!-- Tabela de Produtos -->
        <div class="col-md-9">
            <div class="card border-0">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Descrição</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produtos as $produto)
                                <tr>
                                    <td>{{ $produto->id }}</td>
                                    <td>{{ $produto->nome }}</td>
                                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                                    <td>{{ $produto->descricao }}</td>
                                    <td>
                                        <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Paginação -->
            <div class="mt-4 d-flex justify-content-center">
                {{ $produtos->links('pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

<!-- Modal para Cadastrar Produto -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Cadastrar Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('produtos.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="preco" class="form-label">Preço</label>
                        <input type="number" name="preco" id="preco" class="form-control" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea name="descricao" id="descricao" class="form-control" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection