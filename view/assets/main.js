let id=(id)=> document.getElementById(id);
let classes=(classes)=>document.getElementsByClassName(classes);


let type=id("type"),
date=id("date"),
description=id("description"),
sujet=id("sujet"),
 form=id("form"),
 errorMsg=classes("error"),
 successIcon=classes("success-icon"),
 failureIcon=classes("failure-icon");

form.addEventListener("submit",(e)=>{
    e.preventDefault();
    engine(type,0,"type cannot be blank");
    engine(date,1,"date cannot be blank");
    engine(description,2,"description cannot be blank");
    engine(sujet,3,"sujet cannot be blank");

});

let engine=(id,serial,message)=>{
    if(id.value.trim()===''){
        errorMsg[serial].innerHTML=message;
        failureIcon[serial].style.opacity="1";
        successIcon[serial].style.opacity="0";
    }
    else{
        errorMsg[serial].innerHTML='';
        failureIcon[serial].style.opacity="0";
        successIcon[serial].style.opacity="1";
    }
};