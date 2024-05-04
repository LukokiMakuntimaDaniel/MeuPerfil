iniciar();

function iniciar() {
    usuario = JSON.parse(localStorage.getItem("user"))
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