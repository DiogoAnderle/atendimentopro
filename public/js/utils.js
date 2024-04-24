$('#cep').keyup(function () {
    $(this).val(this.value.replace(/\D/g, ''));
});

const elementoPai = document.getElementById('rowCnpj')

function criaDivAlerta(mensagem) {

    const alerta = document.createElement("div")
    alerta.setAttribute("class", "alert alert-danger position-absolute top-45 col-12 fade show animated fadeInDown")
    alerta.setAttribute("id", "alert")
    alerta.setAttribute("role", "alert")
    alerta.textContent = mensagem

    elementoPai.appendChild(alerta)

    setTimeout(() => {
        alerta.classList.remove("fadeInDown")
        alerta.classList.add("fadeoutUp")
        setTimeout(() => {
            alert.remove()
        }, 800);
    }, 3500);
}

const handlePhone = (event) => {
    let input = event.target
    input.value = phoneMask(input.value)
}

const phoneMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g, '')
    value = value.replace(/(\d{2})(\d)/, "($1) $2")
    value = value.replace(/(\d)(\d{4})$/, "$1-$2")
    return value
}

$(document).on('keydown', '[data-mask-for-cnpj]', function (e) {

    var digit = e.key.replace(/\D/g, '');

    var value = $(this).val().replace(/\D/g, '');

    var size = value.concat(digit).length;

    $(this).mask('00.000.000/0000-00');
});

/** CONSULTA CNPJ API */
const consultaCnpj = () => {
    setTimeout(() => {
        $('#spinner').modal('hide')
    }, 1500);
    const cnpjComCaracteres = document.querySelector('#cnpj').value;
    const cnpj = cnpjComCaracteres.replace('.', '').replace('-', '').replace('/', '')

    const url = `https://publica.cnpj.ws/cnpj/${cnpj}`

    fetch(url)
        .then(response => response.json())
        .then(retorno => {
            /*POSSIVEIS ERROS NA CONSULTA*/
            if (retorno.status == 400) {
                setTimeout(() => {
                    criaDivAlerta("CNPJ Não Encontrado na Base de Dados.")
                }, 1600);

                return;
            }
            if (retorno.status == 429) {
                setTimeout(() => {
                    criaDivAlerta("Muitas requisições ao servidor, aguarde 60 segundos e tente novamente.")
                }, 1500);
                return;
            }
            if (retorno.status == 500) {
                setTimeout(() => {
                    criaDivAlerta("Erro inesperado do servidor, preencha os campos manualmente.")
                }, 1500);
                return;
            }

            /*CONSULTA COM SUCESSO E PREENCHIMENTO DOS INPUTS*/
            $("#razaoSocial").val(retorno.razao_social.toUpperCase());

            if (retorno.estabelecimento.nome_fantasia != null) {
                $("#nomeFantasia").val(retorno.estabelecimento.nome_fantasia.toUpperCase());
            } else {
                let nomeFantasia = (retorno.razao_social).split(' ');
                $("#nomeFantasia").val(`${nomeFantasia[0].toUpperCase()} ${nomeFantasia[1].toUpperCase()}`)
            }

            $("#telefone").val(`(${retorno.estabelecimento.ddd1}) ${retorno.estabelecimento.telefone1}`);
            $("#dataInicioAtividade").val(retorno.estabelecimento.data_inicio_atividade);
            $("#logradouro").val(retorno.estabelecimento.logradouro.toUpperCase());
            $("#numero").val(retorno.estabelecimento.numero);
            $("#bairro").val(retorno.estabelecimento.bairro.toUpperCase());
            if (retorno.estabelecimento.complemento != null) {
                document.getElementById('complemento').value = (retorno.estabelecimento.complemento).toUpperCase();
            } else {
                document.getElementById('complemento').value = ''
            }
            $("#cep").val(retorno.estabelecimento.cep);
            $("#cidade").val(retorno.estabelecimento.cidade.nome.toUpperCase());
            $("#ibge").val(retorno.estabelecimento.cidade.ibge_id);
            $("#uf").val(retorno.estabelecimento.estado.sigla.toUpperCase());
        })
}

function consultarCNPJ() {
    consultaCnpj();
}



function limpaFormularioCEP() {
    // Limpa valores do formulário de cep.
    $("#logradouro").val("");
    $("#numero").val("");
    $("#bairro").val("");
    $("#complemento").val("");
    $("#cidade").val("");
    $("#uf").val("");
    $("#ibge").val("");
}


function consultarCEP() {
    setTimeout(() => {
        $('#spinner').modal('hide')
    }, 1500);

    //Nova variável "cep" somente com dígitos.
    var valorCEP = document.getElementById('cep').value;
    const cep = valorCEP.replace(/\D/g, '')

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        setTimeout(() => {
            $('#spinner').modal('hide')
        }, 1500);

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {
            //Preenche os campos com "..." enquanto consulta webservice.
            $("#logradouro").val("...");
            $("#numero").val("...");
            $("#complemento").val("...");
            $("#bairro").val("...");
            $("#cidade").val("...");
            $("#uf").val("...");
            $("#ibge").val("...");

            //Consulta o webservice viacep.com.br/
            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
                limpaFormularioCEP();

                if (!("erro" in dados)) {

                    //Atualiza os campos com os valores da consulta.
                    $("#logradouro").val(dados.logradouro.toUpperCase());
                    $("#bairro").val(dados.bairro.toUpperCase());
                    $("#cidade").val(dados.localidade.toUpperCase());
                    $("#uf").val(dados.uf.toUpperCase());
                    $("#ibge").val(dados.ibge);
                } //end if.
                else {
                    //CEP pesquisado não foi encontrado.
                    limpaFormularioCEP();
                    setTimeout(() => {
                        criaDivAlerta("CEP não encontrado.")
                    }, 900);
                }
            });
        } //end if.
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpaFormularioCEP();
    }
};

/*Função Copia texto*/
let arrayTextoSelecionado = document.querySelectorAll('.copy');

for (let index = 0; index < arrayTextoSelecionado.length; index++) {
    let variavelLoope = arrayTextoSelecionado[index]

    variavelLoope.addEventListener('click', function (e) {
        let textValue = variavelLoope.select();
        document.execCommand('copy');

        Swal.fire({
            position: "center",
            icon: "success",
            title: "Conteúdo copiado",
            background: "#000",
            showConfirmButton: false,
            timer: 1000
        });
    })

}
/*Fim Função Copia texto*/
