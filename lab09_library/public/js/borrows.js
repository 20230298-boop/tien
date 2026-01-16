$(function(){
load();
function load(){
 $.get('index.php?c=borrow&a=api&action=list',res=>{
  let h='';
  $.each(res.data,(i,v)=>{
   h+=`<tr>
    <td>${i+1}</td><td>${v.full_name}</td><td>${v.title}</td>
    <td>${v.borrow_date}</td><td>${v.due_date}</td><td>${v.return_date||''}</td><td>${v.status}</td>
    <td>${v.status=='BORROWED'?`<button onclick="ret(${v.id})">Return</button>`:''}</td>
   </tr>`;
  });
  $('#data').html(h);
 });
}
$('#borrowForm').submit(e=>{
 e.preventDefault();
 $.post('index.php?c=borrow&a=api&action=create',$('#borrowForm').serialize(),()=>{ $('#borrowForm')[0].reset(); load(); },'json');
});
window.ret=id=>{ $.post('index.php?c=borrow&a=api&action=return',{id},load,'json'); }
});