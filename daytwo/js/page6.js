let ms=document.querySelector(".welc");
let btn=document.querySelector(".btn");
let x=0;
btn.onclick= function(){
    if(x ==0){
        
        ms.innerText="قصدي يا بشمهندس حماده " ;
        x=1;
    }
    else {
        ms.innerText="عامل اي يا حماده" ;
        x=0;
    }
}
console.log("hiii");
let content=document.querySelector(".content");
let rescon=document.querySelector(".Resultcontent");
let input=document.querySelector(".name");
let res=document.querySelector(".result");


input.oninput=function(){
    content.innerText=input.value;
}

res.onclick= function(){
rescon.innerHTML="Hello "+ input.value+ " Ur result is ( A+ )";
}
