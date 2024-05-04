iniciar();

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
    usuario = JSON.parse(localStorage.getItem("usuario"))
    usuario.nome = (document.getElementById("nomeInput").value) ? document.getElementById("nomeInput").value : (usuario) ? usuario.nome : ""
    usuario.idade = (document.getElementById("idadeInput").value) ? document.getElementById("idadeInput").value : (usuario) ? usuario.nome : ""
    usuario.rua = (document.getElementById("ruaInput").value) ? document.getElementById("ruaInput").value : (usuario) ? usuario.nome : ""
    usuario.bairro = (document.getElementById("bairroInput").value) ? document.getElementById("bairroInput").value : (usuario) ? usuario.nome : ""
    usuario.estado = (document.getElementById("estadoInput").value) ? document.getElementById("estadoInput").value : (usuario) ? usuario.nome : ""
    usuario.biografia = (document.getElementById("rua").value) ? document.getElementById("rua").value : (usuario) ? usuario.nome : ""
    usuario.telefone = (document.getElementById("telemovelInput").value) ? document.getElementById("telemovelInput").value : (usuario) ? usuario.nome : ""
    usuario.biografia = (document.getElementById("biografiaInput").value) ? document.getElementById("biografiaInput").value : (usuario) ? usuario.nome : ""

    let imagemValue = document.getElementById("img_p").value;
    if (imagemValue) {
        let imagemInput = document.getElementById("img_p")
        let file = new FileReader();
        file.readAsDataURL(imagemInput.files[0]);
        file.onloadend = function (captura) {
            usuario.imagem = captura.target.result;
            usuarioString = JSON.stringify(usuario);
            localStorage.setItem('usuario', usuarioString);
            iniciar()
        }
    } else {
        usuarioString = JSON.stringify(usuario);
        localStorage.setItem('usuario', usuarioString);
        iniciar()
    }


}