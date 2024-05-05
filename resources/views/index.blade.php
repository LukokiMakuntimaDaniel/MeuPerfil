<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>

    <link rel="stylesheet" href="{{asset('style/style.css')}}" />


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('style/animar.css')}}">


</head>

<body>

    <header class="header">
        <div class="img">
            <div class="borderImg">
                <img src="{{asset('imgs/usuarioPadaoImg.jpg')}}" alt="" class="pImg" id="imagem" style="width: 100%; height: 100%; object-fit: cover;" />
            </div>
        </div>

        <div class="animated" style="animation-name: slideLeft;">
            <div>
                <h1 id="nome">Nome</h1>
            </div>

            <div class="dados">
                <div>
                    <div>
                        <span id="idade">Idade</span>
                    </div>
                </div>

                <div>
                    <div>
                        <i class="fas fa-map-marker-alt"></i>
                        <span id="estado">Estado</span>
                    </div>
                </div>

                <div>
                    <div>
                        <span id="rua">Rua</span>
                    </div>

                </div>

                <div>
                    <div>
                        <span id="bairro">Bairro</span>
                    </div>
                </div>

                <div>
                    <div>
                        <span id="telefone">Telefone</span>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <section class="biografia animated" style="animation-name: slideLeft;">
        <h2>Biografia</h2>
        <p id="biografia">
            Minha Biografia
        </p>
    </section>

    <div class="meuForm animated" style="animation-name: slideLeft;">
        <h2>Edite os Seus Dados</h2>
        <form id="meuFormulario">
            <div class="row">
                <div class="col-sm-6">
                    <label for="" class="form-label">Nome Completo: </label>
                    <input type="text" onkeyup="validacao(this)" class="form-control shadow-none" placeholder="Nome do Usuario*" id="nomeInput" pattern="/^[A-Za-z]+\s[A-Za-z]+$/">
                    <div class="invalid-feedback">Precisamos nome válido e completo</div>
                </div>

                <div class="col-sm-6">
                    <label for="" class="form-label">Idade</label>
                    <input type="number" class="form-control shadow-none" placeholder="Idade*" id="idadeInput" onkeyup="validacao(this)">
                    <div class="invalid-feedback">Idade Não Pode estar vazia</div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="rua" class="form-label">Rua: </label>
                    <input type="text" placeholder="Rua*" class="form-control shadow-none" id="ruaInput" onkeyup="validacao(this)">
                    <div class="invalid-feedback">Campo Obrigatório</div>
                </div>

                <div class="col-md-6">
                    <label for="bairro" class="form-label">Bairro</label>
                    <input type="text" placeholder="Bairro*" class="form-control shadow-none" id="bairroInput" onkeyup="validacao(this)">
                    <div class="invalid-feedback">Campo Obrigatório</div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="estado" class="form-label">Estado: </label>
                    <input type="text" placeholder="Estado*" class="form-control" id="estadoInput" onkeyup="validacao(this)">
                    <div class="invalid-feedback">Campo Obrigatório</div>
                </div>

                <div class="col-md-6">
                    <label for="telemovel" class="form-label">Telemovel</label>
                    <input type="number" class="form-control shadow-none" placeholder="Telemovel*" id="telemovelInput" onkeyup="validacao(this)" />
                    <div class="invalid-feedback">Campo Obrigatório</div>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <textarea class="form-control" placeholder="Biografia*" id="biografiaInput" onkeyup="validacao(this)"></textarea>
                <div class="invalid-feedback">Campo Obrigatório</div>
            </div>

            <div>
                <label for="img_p" class="minha_imagem"><i class="fa-regular fa-image"></i>Escolha uma Imagem</label>
                <input type="file" class="buscarImagem" id="img_p">
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

    <script src="{{asset('js/js.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>