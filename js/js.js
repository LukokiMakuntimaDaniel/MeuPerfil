iniciar();


//funcão que inicializa os campus dos inputs

function iniciar() {

    usuario = JSON.parse(localStorage.getItem("usuario"))
    if (usuario) {
        document.getElementById("nome").innerHTML = usuario.nome
        document.getElementById("idade").innerHTML = usuario.idade + " anos"
        document.getElementById("estado").innerHTML = usuario.estado
        document.getElementById("rua").innerHTML = usuario.rua
        document.getElementById("bairro").innerHTML = usuario.bairro
        document.getElementById("telefone").innerHTML = usuario.telefone
        document.getElementById("biografia").innerHTML = usuario.biografia
        document.getElementById("imagem").src = usuario.imagem
    } else {
        usuario = new Object();
        usuario.nome = "";
        usuario.idade = 0
        usuario.imagem = ""
        usuario.rua = ""
        usuario.bairro = ""
        usuario.estado = ""
        usuario.biografia = ""
        usuario.telefone = ""
    }

}

function actualizarDados() {
    //garantir que seja actualizados somente os campus necessarios
    usuarioCorrente = JSON.parse(localStorage.getItem("usuario"))
    usuario.nome = (document.getElementById("nomeInput").value) ? document.getElementById("nomeInput").value : (usuarioCorrente) ? usuarioCorrente.nome : ""
    usuario.idade = (document.getElementById("idadeInput").value) ? document.getElementById("idadeInput").value : (usuarioCorrente) ? usuarioCorrente.idade : ""
    usuario.rua = (document.getElementById("ruaInput").value) ? document.getElementById("ruaInput").value : (usuarioCorrente) ? usuarioCorrente.rua : ""
    usuario.bairro = (document.getElementById("bairroInput").value) ? document.getElementById("bairroInput").value : (usuarioCorrente) ? usuarioCorrente.bairro : ""
    usuario.estado = (document.getElementById("estadoInput").value) ? document.getElementById("estadoInput").value : (usuarioCorrente) ? usuarioCorrente.estado : ""
    usuario.biografia = (document.getElementById("rua").value) ? document.getElementById("rua").value : (usuarioCorrente) ? usuarioCorrente.rua : ""
    usuario.telefone = (document.getElementById("telemovelInput").value) ? document.getElementById("telemovelInput").value : (usuarioCorrente) ? usuarioCorrente.telefone : ""
    usuario.biografia = (document.getElementById("biografiaInput").value) ? document.getElementById("biografiaInput").value : (usuarioCorrente) ? usuarioCorrente.biografia : ""

  
    let imagemValue = document.getElementById("img_p").value;
    if (imagemValue) {
        //carregar as imagens
        let imagemInput = document.getElementById("img_p")
        let file = new FileReader();
        file.readAsDataURL(imagemInput.files[0]);
        file.onloadend = function (captura) {
            usuario.imagem = captura.target.result;
            usuarioString = JSON.stringify(usuario);
            localStorage.setItem('usuario', usuarioString);
            $("#modalSucesso").modal("show")
            iniciar()
        }
    } else {
        usuarioString = JSON.stringify(usuario);
        localStorage.setItem('usuario', usuarioString);
        $("#modalSucesso").modal("show")
        iniciar()
    }

}