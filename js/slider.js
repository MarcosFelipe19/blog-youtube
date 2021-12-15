window.addEventListener('load',function(){
//variável auxiliar
const html = {
    get(nome){
        return document.querySelector(nome);
    },
    getAll(nome){
        return document.querySelectorAll(nome)
    }
}

const seta = {
    left(direcao){
        //verifica se irá sair do útimo elemento ou do primero para o proximo e atualiza propriedades da seta
        if(direcao == 'left' && index == elementos.length-1){
            right.style.cursor = "pointer"
            right.style.backgroundColor = '#000'
        }
        if(direcao == 'left' && index > 0){
            document.querySelectorAll("#direction span")[node.getPrev(index)].classList.add("selected")
            document.querySelectorAll("#direction span")[index].classList.remove("selected")
            elementos[index].style.left = 33.33 + '%'
            elementos[node.getPrev(index)].style.left = 0;
    
            if(node.getPrev(index) == 0){
                left.style.cursor = "initial"
                left.style.backgroundColor = '#555'
            }
            node.prev()
        } 
    },
    right(direcao){   
         if(direcao == 'right' && index == 0){
            left.style.cursor = "pointer"
            left.style.backgroundColor = '#000'
        } 
        if(direcao == 'right' && index < elementos.length-1){
        document.querySelectorAll("#direction span")[node.getNext(index)].classList.add("selected")
        document.querySelectorAll("#direction span")[index].classList.remove("selected")
            
        elementos[index].style.left = -33.33 + '%'
        elementos[node.getNext(index)].style.left = 0 
        //verifica se o proximo elemento será o últtimo
        if(node.getNext(index) == elementos.length-1){
            right.style.cursor = "initial"
            right.style.backgroundColor = '#555'
            }
            node.next()
        }
    }
}
const node = {
    next(){
        if(index == elementos.length-1){

        }else{
             index += 1
        }
    },
    prev(){
        if(index == 0){
   
        }else{
            index -= 1
        }
    },
    getNext(valor){
        if(valor == elementos.length-1){
            return elementos.length-1
        }else{
             return valor += 1
        }
    },
    getPrev(valor){
        if(valor == 0){
           return 0
        }else{
            return valor -= 1
        }
    }
}
var elementos = html.getAll(".section-destaque .container-destaque")
var container_bolinhas = html.get("#direction")
var index = 0;
const right = html.get('#right')
const left = html.get('#left')

initslider()
function initslider(){
    right.addEventListener('click', function(){
        seta.right('right')
    })
    left.addEventListener('click', function(){
        seta.left('left')    
    })
    for (let index = 0; index < elementos.length; index++) {
        if(index == 0){
            container_bolinhas.innerHTML +=  "<span class='selected'></span>"    
        }else{
            container_bolinhas.innerHTML +=  "<span></span>"
        }
    }
    for (let index = 1; index < elementos.length; index++) {
        elementos[index].style.left = 33.33 +'%'
    }
    setTimeout(function(){
        for (let index = 1; index < elementos.length; index++) {
            elementos[index].style.visibility = "visible"
        }
    },900)
}
})