$(document).ready(function(){


    document.getElementById('memory').onchange = function() {
        if(document.getElementById("memory").value == '' && document.getElementById("color").value == ''){
            stampaProdotti();
        }else{
            if(document.getElementById("memory").value == ''){
                colore();
            }else{
                memoria();
            }
        }
    }

    document.getElementById('color').onchange = function() {
        if(document.getElementById("memory").value == '' && document.getElementById("color").value == ''){
            stampaProdotti();
        }else{
            if(document.getElementById("color").value == ''){
                memoria();
            }else{
                colore();
            }
        }        
    }

    function colore(){
        var prodotto = document.querySelectorAll(".product");
        stampaProdotti();

        var selectColore = document.getElementById("color").value;
        var selectMemoria = document.getElementById("memory").value;
        var y = 0;

        prodotto.forEach(element => {
            if(selectMemoria !== ''){
                if(prodotto[y].querySelector('.col').textContent !== selectColore || prodotto[y].querySelector('.mem').textContent !== selectMemoria){
                    prodotto[y].style.display = 'none';
                };
            }else{
                console.log('we');
                if(prodotto[y].querySelector('.col').textContent !== selectColore){
                    prodotto[y].style.display = 'none';
                };
            };
            y=y+1;
        });
    }

    function memoria(){
        var prodotto = document.querySelectorAll(".product");
        stampaProdotti();

        var selectColore = document.getElementById("color").value;
        var selectMemoria = document.getElementById("memory").value;
        var y = 0;

        prodotto.forEach(element => {
            if(selectColore !== ''){
                if(prodotto[y].querySelector('.col').textContent !== selectColore || prodotto[y].querySelector('.mem').textContent !== selectMemoria){
                    prodotto[y].style.display = 'none';
                };
            }else{
                console.log('test');
                if(prodotto[y].querySelector('.mem').textContent !== selectMemoria){
                    prodotto[y].style.display = 'none';
                };
            };
            y=y+1;
        });
    }

    function stampaProdotti(){
        var prodotto = document.querySelectorAll(".product");
        prodotto.forEach(element => {
            element.style.display = 'flex';
        });
    }

    
});