let container = $(".dropdown")

for(let i of container){
    let elemento = $(i);
    let botao = elemento.find('button');
    let conteudo = elemento.find('.conteudo')


    botao.click(()=>{
        conteudo.slideToggle()

    })
}

