<header class="header">
        <div class="img">
            <div class="borderImg">
                <img src="{{ isset($meusDados) && $meusDados->nomeImagem ? asset('imagemUser/' . $meusDados->nomeImagem) : asset('imgs/usuarioPadaoImg.jpg') }}" alt="" class="pImg" id="imagem" style="width: 100%; height: 100%; object-fit: cover;" />
            </div>
        </div>

        <div class="animated" style="animation-name: slideLeft;">
            <div>
                <h1 id="nome">
                    @if(isset($meusDados) && isset($meusDados->nome))
                    {{$meusDados->nome}}
                    @else
                    Nome
                    @endif
                </h1>
            </div>

            <div class="dados">
                <div>
                    <div>
                        @if(isset($meusDados) && isset($meusDados->idade))
                        <span id="idade"> {{$meusDados->idade}}</span>
                        @else
                        Idade
                        @endif

                    </div>
                </div>

                <div>
                    <div>
                        <i class="fas fa-map-marker-alt"></i>
                        @if(isset($meusDados) && isset($meusDados->morada))
                        <span id="estado"> {{$meusDados->morada->estado}}</span>
                        @else
                        Estado
                        @endif
                    </div>
                </div>

                <div>
                    <div>
                        @if(isset($meusDados) && isset($meusDados->morada))
                        <span id="rua"> {{$meusDados->morada->rua}}</span>
                        @else
                        Rua
                        @endif
                    </div>

                </div>

                <div>
                    <div>
                        @if(isset($meusDados) && isset($meusDados->morada))
                        <span id="bairro"> {{$meusDados->morada->bairro}}</span>
                        @else
                        Bairro
                        @endif
                    </div>
                </div>

                <div>
                    <div>
                        @if(isset($meusDados) && isset($meusDados->telefone))
                        <span id="telefone"> {{$meusDados->telefone}}</span>
                        @else
                        Telefone
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </header>

    <section class="biografia animated" style="animation-name: slideLeft;">
        <h2>Biografia</h2>
        <p id="biografia">
            @if(isset($meusDados) && isset($meusDados->biografia))
            {{$meusDados->biografia}}
            @else
            Minha Biografia
            @endif
        </p>
    </section>
