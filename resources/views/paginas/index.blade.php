@extends('../layout/master')
@section('sessao')

<div class="meuForm animated" style="animation-name: slideLeft;">
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <h2>Edite os Seus Dados</h2>
    @if($meusDados)
    <form id="meuFormulario" action="{{route('usuario.actualizar',['id' => $meusDados->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @else
        <form id="meuFormulario" action="{{route('usuario.salvar')}}" method="post" enctype="multipart/form-data">
            @csrf
            @endif
            <div class="row">
                <div class="col-sm-6">
                    <label for="" class="form-label">Nome Completo: </label>
                    <input type="text" onkeyup="validacao(this)" class="form-control shadow-none" placeholder="Nome do Usuario*" id="nomeInput" pattern="/^[A-Za-z]+\s[A-Za-z]+$/" name="nome" value="{{ (isset($meusDados) && isset($meusDados->nome) ) ? $meusDados->nome : '' }}">
                    <div class="invalid-feedback">Precisamos nome válido e completo</div>
                </div>

                <div class="col-sm-6">
                    <label for="" class="form-label">Idade</label>
                    <input type="number" class="form-control shadow-none" placeholder="Idade*" id="idadeInput" onkeyup="validacao(this)" name="idade" value="{{ (isset($meusDados) && isset($meusDados->idade) ) ? $meusDados->idade : '' }}">
                    <div class="invalid-feedback">Idade Não Pode estar vazia</div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="rua" class="form-label">Rua: </label>
                    <input type="text" placeholder="Rua*" class="form-control shadow-none" id="ruaInput" onkeyup="validacao(this)" name="rua" value="{{ (isset($meusDados) && isset($meusDados->morada) ) ? $meusDados->morada->rua : '' }}">
                    <div class="invalid-feedback">Campo Obrigatório</div>
                </div>

                <div class="col-md-6">
                    <label for="bairro" class="form-label">Bairro</label>
                    <input type="text" placeholder="Bairro*" class="form-control shadow-none" id="bairroInput" onkeyup="validacao(this)" name="bairro" value="{{ (isset($meusDados) && isset($meusDados->morada) ) ? $meusDados->morada->bairro : '' }}">
                    <div class="invalid-feedback">Campo Obrigatório</div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="estado" class="form-label">Estado: </label>
                    <input type="text" placeholder="Estado*" class="form-control" id="estadoInput" onkeyup="validacao(this)" name="estado" value="{{ (isset($meusDados) && isset($meusDados->morada) ) ? $meusDados->morada->estado : '' }}">
                    <div class="invalid-feedback">Campo Obrigatório</div>
                </div>

                <div class="col-md-6">
                    <label for="telemovel" class="form-label">Telemovel</label>
                    <input type="number" class="form-control shadow-none" placeholder="Telemovel*" id="telemovelInput" onkeyup="validacao(this)" name="telefone" value="{{ (isset($meusDados) && isset($meusDados->telefone) ) ? $meusDados->telefone : '' }}">
                    <div class="invalid-feedback">Campo Obrigatório</div>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <textarea class="form-control" placeholder="Biografia*" id="biografiaInput" onkeyup="validacao(this)" name="biografia">@if(isset($meusDados) && isset($meusDados->biografia)){{$meusDados->biografia}} @endif</textarea>
                <div class="invalid-feedback">Campo Obrigatório</div>
            </div>

            <div>
                <label for="img_p" class="minha_imagem"><i class="fa-regular fa-image"></i>Escolha uma Imagem</label>
                <input type="file" class="buscarImagem" id="img_p" name="imagem">
            </div>

            <button class="shadow-none btn_salvar" onclick="verificarAvalidacaoParaAactualizacao()" type="button">Salvar</button>

        </form>

</div>

<div class="modal fade" id="modalSucesso" tabindex="-1" role="dialog" aria-labelledby="modalSucessoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSucessoLabel">Atualização Bem-Sucedida</h5>
            </div>
            <div class="modal-body">
                As suas atualizações foram feitas com sucesso.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:  #7a81d1;">Fechar</button>
            </div>
        </div>
    </div>
</div>

@endsection
