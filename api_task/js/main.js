// function remove(type,elemntId){
// let remove=document.getElementById(`${elemntId}`);

// remove.addEventListener('click',(e)=>{
// fetch(`../server/delete.php`,{
//     method:'DELETE',
//     headers:"Content-Type: application/json",
//     body:JSON.stringify({
//         id:remove.value,
//         type:type
//     })
// })
// .then(res=>res.json())
// .then(data=>{
// console.log(data);
// window.alert(data.message);
// })
// });
// }