let checkbox = document.getElementById('checkbox');
let button = document.getElementById("button");

addEventListener('change', function(){
    // disabled属性を削除
        if(checkbox.checked==true){
            document.getElementById("button").removeAttribute("disabled");
        }else{
            document.getElementById("button").setAttribute("disabled", true);
        }
}, false);