function novoElemento(tagName, className) {
    const elemento = document.createElement(tagName)
    elemento.className = className
    return elemento
}

function Barreira(reversa = false) {
    this.elemento = novoElemento('div', 'barreira')
    const borda = novoElemento('div', 'borda')
    const corpo = novoElemento('div', 'corpo')
    this.elemento.appendChild(reversa ? corpo : borda)
    this.elemento.appendChild(reversa ? borda : corpo)

    this.setAltura = altura => corpo.style.height = `${altura}px`

}
function tela() {

}

/* const b= new Barreira(false)
b.setAltura(500)
document.querySelector('[wm-flappy]').appendChild(b.elemento) */



function ParDeBarreiras(altura, abertura, popsicaoNaTela) {
    this.elemento = novoElemento('div', 'par-de-barreiras')
    this.superior = new Barreira(true)
    this.inferior = new Barreira(false)

    this.elemento.appendChild(this.superior.elemento)
    this.elemento.appendChild(this.inferior.elemento)


    this.sortearAbertura = () => {
        const alturaSuperior = Math.random() * (altura - abertura)
        const alturaInferior = altura - abertura - alturaSuperior
        this.superior.setAltura(alturaSuperior)
        this.inferior.setAltura(alturaInferior)
    }
    this.getX = () => parseInt(this.elemento.style.left.split('px')[0])
    this.setX = popsicaoNaTela => this.elemento.style.left = `${popsicaoNaTela}px`
    this.getLargura = () => this.elemento.clientWidth

    this.sortearAbertura()
    this.setX(popsicaoNaTela)
}

/* const b= new ParDeBarreiras(500,300,1000)
document.querySelector('[wm-flappy]').appendChild(b.elemento)  */

function Barreiras(altura, largura, abertura, espaco, notificarPonto) {
    this.pares = [
        new ParDeBarreiras(altura, abertura, largura),
        new ParDeBarreiras(altura, abertura, largura + espaco),
        new ParDeBarreiras(altura, abertura, largura + espaco * 2),
        new ParDeBarreiras(altura, abertura, largura + espaco * 3)
    ]

    const deslocamento = parseInt($("#customRange1").val());

    this.animar = () => {
        this.pares.forEach(par => {
            par.setX(par.getX() - deslocamento)

            if (par.getX() < -par.getLargura()) {
                par.setX(par.getX() + espaco * this.pares.length)
                par.sortearAbertura()
            }
            const meio = largura / 2
            const cruzouMeio = par.getX() + deslocamento >= meio
                && par.getX() < meio
            if (cruzouMeio) {
                notificarPonto()
            }
        })
    }
}

/* const barreiras = new Barreiras(700, 400, 200, 400)
const areaDoJogo = document.querySelector('[wm-flappy]')

barreiras.pares.forEach( par => areaDoJogo.appendChild(par.elemento)) 

setInterval(() => {
    barreiras.animar()
},20)  */


function Passaro(alturaJogo, velocidade) {
    let voando = false
    var velY;
    var velX;

    if (velocidade == "Baixa") {
        velY = 4;
        velX = -2;
    } else if (velocidade == "Rápida") {
        velY = 12;
        velX = -7;
    }
    else {
        velY = 8;
        velX = -5;
    }
    this.elemento = novoElemento('img', 'passaro')
    //Item 6 Escolhendo personagem
    var opPers = $("#personagens option:selected").val();
    if (opPers == "Personagem") {
        opPers = "img/bird.png"
    }
    this.elemento.src = opPers

    this.getY = () => parseInt(this.elemento.style.bottom.split('px')[0])
    this.setY = y => this.elemento.style.bottom = `${y}px`

    window.onkeydown = e => voando = true
    window.onkeyup = e => voando = false

    this.animar = () => {
        const novoY = this.getY() + (voando ? velY : velX)
        const alturaMaxima = alturaJogo - this.elemento.clientWidth

        if (novoY <= 0) {
            this.setY(0)
        } else if (novoY >= alturaMaxima) {
            this.setY(alturaMaxima)
        } else {
            this.setY(novoY)
        }
    }
    this.setY(alturaJogo / 2)
}

/* const barreiras = new Barreiras(700, 400, 200, 400)
const passaro = new Passaro(700)

const areaDoJogo = document.querySelector('[wm-flappy]')

areaDoJogo.appendChild(passaro.elemento)
barreiras.pares.forEach( par => areaDoJogo.appendChild(par.elemento)) 

setInterval(() => {
      barreiras.animar()
      passaro.animar() 
},20) */


function Progresso() {

    this.elemento = novoElemento('span', 'progresso')
    this.atualizarPontos = pontos => {
        this.elemento.innerHTML = pontos
    }
    this.atualizarPontos(0)
}

function Addjogador(nome) {
    $('#nome').text("Jogador: " + nome);

}
/*  const barreiras = new Barreiras(700, 400, 200, 400)
const passaro = new Passaro(700)

const areaDoJogo = document.querySelector('[wm-flappy]')

areaDoJogo.appendChild(passaro.elemento)
barreiras.pares.forEach( par => areaDoJogo.appendChild(par.elemento))  */


function estaoSobrepostos(elementoA, elementoB) {

    const a = elementoA.getBoundingClientRect()
    const b = elementoB.getBoundingClientRect()
    const horizontal = a.left + a.width >= b.left && b.left + b.width >= a.left
    const vertical = a.top + a.height >= b.top && b.top + b.height >= a.top

    return horizontal && vertical
}

function colidiu(passaro, barreiras) {
    let colidiu = false

    barreiras.pares.forEach(parDeBarreiras => {
        if (!colidiu) {
            const superior = parDeBarreiras.superior.elemento
            const inferior = parDeBarreiras.inferior.elemento
            colidiu = estaoSobrepostos(passaro.elemento, superior)
                || estaoSobrepostos(passaro.elemento, inferior)
        }
    })

    return colidiu

}
function modoNoturno(cenario) {
    $('[wm-flappy]').addClass("modonoturno");
    $('.barreira .borda').css('background', 'linear-gradient(90deg, gray, black)');
    $('.barreira .corpo').css('background', 'linear-gradient(90deg, gray, black)');
    $('.tela').css('background', 'linear-gradient(90deg, gray, black)');
    $('a').css('background', 'linear-gradient(90deg, gray, black)');
}
function nivelAbertura(abertura) {
    if (abertura == "Fácil") {
        return 250;
    } else if (abertura == "Difícil") {
        return 180;
    }
    else {
        return 200;
    }

}
function nivelDistancia(distancia) {
    if (distancia == "Fácil") {
        return 500;
    } else if (distancia == "Difícil") {
        return 300;
    }
    else {
        return 400;
    }

}
function FlappyBird() {
    let pontos = 0;
    var fm = document.forms.length;

    $('.tela').hide(); //Esconder tela 


    const areaDoJogo = document.querySelector('[wm-flappy]')
    const altura = areaDoJogo.clientHeight
    const largura = areaDoJogo.clientWidth

    //Adicionando configurações
    $('[wm-flappy]').hide();
    this.start = () => {
        // Item 1 ------
        $('#enviar').click(function () {
            var $jogador = $("#nomej").val();
            var $cenario = $("input[name='cenario']:checked").val();
            var $abertura = $("input[name='abertura']:checked").val();
            var $distancia = $("input[name='distancia']:checked").val();
            var $velocidade = $("#customRange1").val();
            var $tipo = $("input[name='tipojogo']:checked").val();
            var $velPers = $("input[name='velPers']:checked").val();
            var $pontuacao = $("input[name='pontuacao']:checked").val();
            Addjogador($jogador);
            //--- 
            $('form').hide();
            $('[wm-flappy]').show();
            const passaro = new Passaro(altura, $velPers)
            const progresso = new Progresso()

            var valor_abertura = nivelAbertura($abertura); //Item 3
            var valor_distancia = nivelDistancia($distancia); // Item 4

            const barreiras = new Barreiras(altura, largura, valor_abertura, valor_distancia,
                () => progresso.atualizarPontos(pontos = pontos + parseInt($pontuacao)))  //Item 10

            areaDoJogo.appendChild(progresso.elemento)
            areaDoJogo.appendChild(passaro.elemento)
            barreiras.pares.forEach(par => areaDoJogo.appendChild(par.elemento))



            if ($cenario == "Noturno") { //Item 2
                modoNoturno();
            }

            const temporizador = setInterval(() => {
                barreiras.animar()
                passaro.animar()

                if ($tipo == "Real") { //Item 7
                    if (colidiu(passaro, barreiras)) {
                        clearInterval(temporizador)
                        //Mostrar tela de opções ao colidir

                        $('.tela').show();
                        //Item 9 ----
                        $('.result1').text("Nome jogador: " + $jogador);
                        $('.result2').text("Pontuação: " + pontos);
                        //--
                        const urlParams = new URLSearchParams(location.search);
                        if (urlParams.has('recomecar')) {
                            urlParams.set('index.html');

                        }

                    }
                }
            }, 20)
        });
    }
}
new FlappyBird().start() 