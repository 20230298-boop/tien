$(function(){
load();
function load(){
 $.get('index.php?c=member&a=api&action=list',res=>{
  let h='';
  $.each(res.data,(i,v)=>{
   h+=`<tr>
    <td>${i+1}</td><td>${v.member_code}</td><td>${v.full_name}</td><td>${v.email}</td><td>${v.phone||''}</td>
    <td>
     <button onclick="edit(${v.id},'${v.member_code}','${v.full_name}','${v.email}','${v.phone}')">Edit</button>
     <button onclick="delMember(${v.id})">Delete</button>
    </td>
   </tr>`;
  });
  $('#data').html(h);
 });
}
$('#memberForm').submit(e=>{
 e.preventDefault();
 let act=$('[name=id]').val()?'update':'create';
 $.post(`index.php?c=member&a=api&action=${act}`,$('#memberForm').serialize(),()=>{ $('#memberForm')[0].reset(); load(); },'json');
});
window.edit=(id,code,name,email,phone)=>{
 $('[name=id]').val(id);
 $('[name=member_code]').val(code);
 $('[name=full_name]').val(name);
 $('[name=email]').val(email);
 $('[name=phone]').val(phone);
}
window.delMember=id=>{ if(confirm('Delete?')) $.post('index.php?c=member&a=api&action=delete',{id},load,'json'); }
});