window.addEventListener('load',function(){
    var open = true
    var windowSize = window.innerWidth
    var tmenu;
    if(windowSize <= 768){
        open = false
        document.querySelector('div.menu').style.display = 'block' 
        document.querySelector('div.menu').style.width = '0' 
    }
    if(windowSize <= 600){
        tmenu = 200
    }else{
        tmenu = 300
    }

    document.querySelector('#menu-btn').addEventListener('click',function(){
        if(open){
           
            document.querySelector('div.menu').style.width = '0'        

            document.querySelector('header').style.width = '100%'        
            document.querySelector('header').style.left = '0'        
            document.querySelector('div.content').style.width = '100%'                            
            document.querySelector('div.content').style.left = '0'                            
            open = false
        }else{
            if(windowSize > 600){
                document.querySelector('header').style.width = 'calc(100% - '+tmenu+'px)'  
                document.querySelector('div.content').style.width =  'calc(100% - '+tmenu+'px)'
            }
            document.querySelector('div.menu').style.width = tmenu+'px'             
            document.querySelector('header').style.left = tmenu+'px'                                    
            document.querySelector('div.content').style.left = tmenu+'px'
            open = true
        }
    })



    function readImage() {
            document.querySelector(".box-content .container-imagens div.img-selecionadas").style.display = 'inline-block'
        if (this.files && this.files[0]) {
            var file = new FileReader();
            file.onload = function(e) {
                document.querySelectorAll(".box-content .container-imagens div.img-selecionadas img.img-selected").src = e.target.result;
            };       
            file.readAsDataURL(this.files[0]);
        }
    }
     document.querySelector(".form-group input[type=button]").addEventListener("click",function(){
            formarCampos()
     })
   
    var container = document.querySelector("form div.container-subs")
     function formarCampos(){
          var qtd = document.querySelector("#qtd_campos")
          for (index = 1; index <= qtd.value; index++) {
            container.innerHTML +=  "<h2>Sub post</h2>"
            +"<div class='form-group'>"
               +"<label for='sub_titulo'>Sub título"+index+":</label>"
                +"<input type='text' name='sub_titulo"+index+"'>"
            +"</div><!--form-group-->"

           +"<div class='form-group'>"
                +"<label for='descricao'>Descrição "+index+":</label>"
                +"<textarea name='sub_descricao"+index+"'></textarea>"
            +"</div><!--form-group-->" 

            +"<div class='form-group'>"
                +"<label>Imagem "+index+":</label>"
                +"<input type='file' name='imagem_sub"+index+"'>"
            +"</div><!--form-group-->"  
          }
     }
})