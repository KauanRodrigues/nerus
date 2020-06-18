@include('includes/header')

<div class="container">
    <div class="row">
        <div class="form-group col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Produtos disponíveis</span>
                </div>
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4 offset-md-4">
                            <button type="button" class="btn btn-primary btn-block btn-sm" onclick="novo_produto()">Novo Produto</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <table id="table_produtos" class="table table-sm table-hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th>Preço</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($produtos->data))
                                        @foreach ($produtos->data as $produto)
                                            <tr>
                                                <td></td>
                                                <td>{{ $produto->nome }}</td>
                                                <td>{{ $produto->descricao }}</td>
                                                <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                                                <td><button type="button" id="btn_excluir" class="btn btn-danger btn-sm" onclick="excluir_produto({{ $produto->id }})">Excluir</button></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-1 offset-md-5">
                            <input type="text" id="pagina" class="form-control form-control-sm" value="1">
                        </div>
                        <div class="form-group col-md-3">
                            <span> de {{ $produtos->last_page }} Páginas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/home.js') }}" type="text/javascript"></script>
@endpush

@include('includes/footer')
