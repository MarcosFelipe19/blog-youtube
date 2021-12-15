window.addEventListener('load', function(){
//variável auxiliar
const html = {
    get(nome){
        return document.querySelector(nome);
    },
    getAll(nome){
        return document.querySelectorAll(nome)
    }
}
//capturar elmento a. item do menu
const item_menu = html.getAll('nav.menu-mobile ul a')   
//definindo style como display block para capturar altura do elmento
item_menu[0].style.display= "block"
//capturando altura do elemento
let height_item = item_menu[0].offsetHeight
//variável auxiliar para abrir ou fechar menu
let display = 'none'

initAnimateMenu();
function initAnimateMenu(){
    //definido estado inicial de todos os items e duraçao da animação
    for(i = 0; i < item_menu.length; i++ ){
        item_menu[i].style.display = display;
        item_menu[i].style.transitionProperty = 'height,padding'
        item_menu[i].style.height = '0'
        item_menu[i].style.transitionDuration = 500 + 'ms';
    }
    //chamar função para abrir ou fechar menu
    html.get('#menu').addEventListener('click',controleMenu)
}
function controleMenu(){
    switch(display){
        case 'none': update.open()
        break 
        case 'block': update.close()
        break
    }
}
const update = {
    //colocar todos os items como display block e depois de 0.1 fazer animação para o height
    open(){
        display = 'block'
        for (let index = 0; index < item_menu.length; index++) {
            item_menu[index].style.display = display
            
        }
        setTimeout(function(){
            for (let index = 0; index < item_menu.length; index++) {
                item_menu[index].style.height =  height_item + "px";  
            }

        }, 1)
    },
    //fazer a animação primeiro e depois colocar todos os itens como display none
    close(){
        display = 'none'
        for (let index = 0; index < item_menu.length; index++) {
            item_menu[index].style.height =  0 + "px";  
        }
        
        setTimeout(function(){
            for (let index = 0; index < item_menu.length; index++) {
                item_menu[index].style.display = display
                
            }

        }, 400)
    }
}

/*páginação em javascript
vetor_list= html.getAll('.posts-videos .list-videos .post-video')
list_principal = Array.from(vetor_list)
list_destaque = Array.from(vetor_list)
list_recente = Array.from(vetor_list)

let selectedList = list_principal

let qtdItens = 9

const statePage = {
    page: 1,
    qtdItens,
    totalPages: Math.ceil(selectedList.length/ qtdItens)
}
const controls = {
    next(){
        if(statePage.page < statePage.totalPages){
            statePage.page++
        }
    },
    prev(){
        if(statePage.page >= 2){
            statePage.page--
        }
    },
    createListener(){
        html.get('#seta-proximo').addEventListener('click',function(){
            controls.next()
            updateList()
        }),
        html.get('#seta-anterior').addEventListener('click',function(){
            controls.prev()
            updateList()
        }),
        html.get('#principal').addEventListener('click',function(){
            selectedList = whichList.selectList('principal'); 
            whichList.updatePage(selectedList);
            updateList()
        }),
        html.get('#destaque').addEventListener('click',function(){
            selectedList = whichList.selectList('destaque'); 
            whichList.updatePage(selectedList);
            updateList()
        }),
        html.get('#recente').addEventListener('click',function(){
            selectedList = whichList.selectList('recente'); 
            whichList.updatePage(selectedList);
            updateList()
        })
    }
}
const whichList = {
    selectList(list){ 
                switch(list){
                    case 'principal': {
                        return list_principal
                        break

                    }
                    case 'recente':{
                        return list_recente
                        break
                    }
                    case 'destaque':{
                        return list_destaque
                        break
                    } 
                }
            },
    updatePage(){
        statePage.totalPage = Math.ceil(selectedList.length / statePage.qtdItens)
        statePage.page = 1;
    }
}
const list = {
    create(item_list){
        html.get('.posts-videos .list-videos').appendChild(item_list)
    },
    update(){
        html.get('.posts-videos .list-videos').innerHTML = ''

        page = statePage.page -1
        start = page * qtdItens
        end = start + statePage.qtdItens
        const qtdItensPage = selectedList.slice(start, end)

        for (let index = 0; index < qtdItensPage.length; index++) {
            list.create(qtdItensPage[index])
            
        }
    }
}
function updatenumero(){
    html.get('.paginacao .numero').innerHTML = statePage.page
}
function updateList(){
    list.update()
    updatenumero()
}
initList()
function initList(){
    controls.createListener()
}*/
})
