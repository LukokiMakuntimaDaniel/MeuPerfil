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

        document.getElementById("nomeInput").value = usuario.nome
        document.getElementById("idadeInput").value = usuario.idade
        document.getElementById("ruaInput").value = usuario.rua
        document.getElementById("bairroInput").value = usuario.bairro
        document.getElementById("estadoInput").value = usuario.estado
        document.getElementById("biografiaInput").value = usuario.biografia
        document.getElementById("telemovelInput").value = usuario.telefone
        document.getElementById("img_p").value = usuario.imagem
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

//permitir a validação de cada campo
function validacao(element) {
    if (element.getAttribute("id") == "nomeInput") {
        //expressão regular para validar o nome completo. ou seja o nome não deve contar numeros e deve conter espaço para garintir que o nome seje completo
        let regex = /^[A-Za-z]+\s[A-Za-z]+$/; 
        let nome = element.value;
        if (!regex.test(nome)) {
            element.classList.add('is-invalid');
            return false;
        } else {
            element.classList.remove('is-invalid');
            return true;
        }
    } else {
        if (element.value == null || element.value == "") {
            element.classList.add('is-invalid');
            return false
        } else {
            element.classList.remove('is-invalid');
            return true
        }
    }
    return false;
}

function verificarAvalidacaoParaAactualizacao() {
    let meuFormulario = document.getElementById('meuFormulario');
    let inputs = meuFormulario.querySelectorAll('input:not([type="file"]),textarea');
    let valido=true;
    inputs.forEach(function(input) {
        if(!validacao(input)){
            valido=false;
        }
    });

    console.log(valido)
    if(valido){
        actualizarDados();
    }
   
}






