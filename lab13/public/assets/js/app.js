let t=null;
$('#txtSearch').on('keyup',function(){
 clearTimeout(t);
 let q=$(this).val();
 t=setTimeout(()=>{
  let page=location.pathname.split('/').pop();
  let api='/lab13/public/api/'+page+'/search';
  $.get(api,{q:q},res=>{
    let html='';
    res.data.forEach(r=>{
      html+='<tr>';
      for(let k in r) html+='<td>'+r[k]+'</td>';
      html+='<td><button data-id='+r.id+'>Action</button></td></tr>';
    });
    $('#tbData').html(html);
  });
 },300);
});
$(document).on('click','button',function(){
 let id=$(this).data('id');
 let page=location.pathname.split('/').pop();
 let api='/lab13/public/api/'+page+'/delete';
 if(page=='orders') api='/lab13/public/api/orders/cancel';
 $.post(api,{id:id},()=>$('#txtSearch').trigger('keyup'));
});
