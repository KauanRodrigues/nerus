@include('includes/header')

<div class="container">
    <form action="" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>Cadastro de Produto</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="descricao">Descrição</label>
                                <input type="text" name="descricao" id="descricao" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="categoria">Categoria</label>
                                <select name="categoria" id="categoria" class="custom-select custom-select-sm">
                                    <option value="">Selecione</option>
                                    @if (!empty($categorias))
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="preco">Preço</label>
                                <input type="text" name="preco" id="preco" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>Cadastrar Produtos para KIT</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="quantidade">Quantidade</label>
                                <input type="text" name="quantidade" id="quantidade" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="descricao_kit">Descrição</label>
                                <input type="text" name="descricao_kit" id="descricao_kit" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-3">
                                <button type="button" class="btn btn-sm btn-block btn-info btn_alinhado" onclick="adicionar_kit()">Adicionar</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <table id="table_kit" class="table table-sm table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Quantidade</th>
                                            <th>Produto do KIT</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-4 offset-md-4">
                                <button type="button" class="btn btn-sm btn-block btn-primary" onclick="salvar()">Salvar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
    <script src="{{ asset('plugins/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/cadastro/produto.js') }}"></script>
@endpush

@include('includes/footer')
