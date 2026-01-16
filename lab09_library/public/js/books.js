$(function(){
load();
function load(){
 $.get('index.php?c=book&a=api&action=list',res=>{
  let h='';
  $.each(res.data,(i,v)=>{
   h+=`<tr>
    <td>${i+1}</td><td>${v.isbn}</td><td>${v.title}</td><td>${v.author}</td><td>${v.quantity}</td>
    <td>
     <button onclick="edit(${v.id},'${v.isbn}','${v.title}','${v.author}','${v.category}',${v.quantity})">Edit</button>
     <button onclick="delBook(${v.id})">Delete</button>
    </td>
   </tr>`;
  });
  $('#data').html(h);
 });
}
$('#bookForm').submit(e=>{
 e.preventDefault();
 let act=$('[name=id]').val()?'update':'create';
 $.post(`index.php?c=book&a=api&action=${act}`,$('#bookForm').serialize(),()=>{ $('#bookForm')[0].reset(); load(); },'json');
});
window.edit=(id,isbn,title,author,cat,qty)=>{
 $('[name=id]').val(id);
 $('[name=isbn]').val(isbn);
 $('[name=title]').val(title);
 $('[name=author]').val(author);
 $('[name=category]').val(cat);
 $('[name=quantity]').val(qty);
}
window.delBook=id=>{ if(confirm('Delete?')) $.post('index.php?c=book&a=api&action=delete',{id},load,'json'); }
});