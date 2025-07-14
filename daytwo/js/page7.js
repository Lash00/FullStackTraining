let stname=document.getElementById("name");
let deg=document.getElementById("deg");
let btn=document.querySelector(".btn");
let table=document.querySelector(".table");
console.log(stname);

btn.onclick= (e)=>{
    e.preventDefault(); 
    let resultTable=document.querySelector(".resultTable");
if(stname.value==""||deg.value==""){
resultTable.innerHTML="";
resultTable.innerHTML="<h1>Pleace enter all Data </h1>";
}
    else 
{
    let result="";
    console.log(deg.value);
if(deg.value >=85 &&deg.value<=100)
{
    result= "أمتياز";
// let tbody=document.createElement="tbody";
// let tr=document.createElement="tr";
// let td1=document.createElement="td";
// td1.innerHTML=stname.value;
// tr.append(td1);
// let td2=document.createElement="td";
// td2.innerHTML="ممتاز";
// tr.append(td2);
// tbody.append(tr);
}
else if(deg.value>=70&&deg.value<85)
{
    result="جيد جدا";

}
else if(deg.value>=55&&deg.value<70)
{
 result="جيد";
}
else if(deg.value>=45&&deg.value<55)
{
 result="مقبول";
}
else if(deg.value<45){
 result="مقبول مشروط";
}
else{
 result= "ادخل قيمه صحيحه ";
}

resultTable.innerHTML=""; 
resultTable.innerHTML=` <table cellspacing="10" class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Degree</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>${stname.value}</td>
                    <td>${result}</td>
                </tr>
            </tbody>

        </table>
    </div>`;
        stname.value = "";
    deg.value = "";
stname.focus();
}

}
