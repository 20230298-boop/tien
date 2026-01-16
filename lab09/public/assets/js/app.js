$(function(){

loadData();

function loadData(){
    $.get('index.php?c=student&a=api&action=list',function(res){
        let html='';
        if(res.data.length===0) html='<tr><td colspan=6>Chưa có dữ liệu</td></tr>';

        $.each(res.data,function(i,v){
            html+=`<tr>
                <td>${i+1}</td>
                <td>${v.code}</td>
                <td>${v.full_name}</td>
                <td>${v.email}</td>
                <td>${v.dob||''}</td>
                <td>
                    <button class="btn-edit"
                        onclick="edit(${v.id},'${v.code}','${v.full_name}','${v.email}','${v.dob||''}')">
                        Sửa
                    </button>
                    <button class="btn-delete" onclick="del(${v.id})">Xóa</button>
                </td>
            </tr>`;
        });

        $('#data').html(html);
    });
}

// ===== SUBMIT FORM =====
$('#studentForm').submit(function(e){
    e.preventDefault();
    $('.error').text('');

    let action = $('[name=id]').val() ? 'update' : 'create';

    $.post(
        `index.php?c=student&a=api&action=${action}`,
        $(this).serialize(),
        function(res){
            if(!res.success){
                $.each(res.errors,function(k,v){
                    $('#err-'+k).text(v);
                });
            }else{
                resetForm();      // ⭐ QUAN TRỌNG
                loadData();
            }
        },
        'json'
    );
});

// ===== EDIT =====
window.edit = function(id,code,name,email,dob){
    $('[name=id]').val(id);
    $('[name=code]').val(code);
    $('[name=full_name]').val(name);
    $('[name=email]').val(email);
    $('[name=dob]').val(dob);
}

// ===== DELETE =====
window.del = function(id){
    if(confirm('Bạn có chắc muốn xóa?')){
        $.post(
            'index.php?c=student&a=api&action=delete',
            {id:id},
            function(res){
                if(res.success){
                    resetForm();  // ⭐ BẮT BUỘC
                    loadData();
                }
            },
            'json'
        );
    }
}

// ===== RESET FORM =====
function resetForm(){
    $('#studentForm')[0].reset();
    $('[name=id]').val('');
    $('.error').text('');
}

});
