$(function(){
    var $sidebar_open=$('#sidebar_open'), $sidebar_close=$('#sidebar_close'), $nav=$('.nav'), $main=$('.main');

    $sidebar_open.on('click', function(){
        $nav.css('display','block');         
        $sidebar_open.hide();   
        $main.hide();            
    });
    $sidebar_close.on('click', function(){
        $nav.css('display', 'none'); 
        $main.show();       
        $sidebar_open.show();
    })
});