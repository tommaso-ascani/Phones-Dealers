$(document).ready(function(){
    
    var menuOpen = false;

    document.getElementById('menu').onclick = function() {
        console.log(menuOpen);
        if (!menuOpen){
            menuOpen = true;
            showMenuitem(); 
        } else {
            menuOpen = false;
            closeMenuitem();
        }
    }

    function closeMenuitem(){
        console.log('menu item closed');
        var Mitem = document.querySelectorAll(".menuitem");
        Mitem.forEach(element => {
            element.style.display = 'none';
        });
    }

    function showMenuitem(){
        console.log('menu item open');
        var Mitem = document.querySelectorAll(".menuitem");
        Mitem.forEach(element => {
            element.style.display = 'block';
        });
    }
});