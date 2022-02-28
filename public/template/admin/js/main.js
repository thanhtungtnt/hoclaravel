$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url){
    if(confirm('Ban chac khong?')){
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            url: url,
            data: { id },
            url: url,
            success: function (data) {
                console.log(data);
                alert(data.message);
                if(data.error === false){
                     location.reload();
                }
            }
        });
    }
}

// Upload file
$('#productImage').change(function (e){
    var f = $(this);
    const form = new FormData();

    form.append('file', f[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function (data) {
            console.log(data);
            if(data.error == false){
                $('#productImage').parent().find('.imgWrap').show().html('<img src="'+data.url+'" class="img-thumbnail rounded d-block" alt="product thumbnail" />')
                $('#productThumb').val(data.url);
            }else{
                $('#productImage').parent().find('.imgWrap').show().html('<div class="alert alert-danger" role="alert">Lỗi Upload ảnh</div>');
                $('#productThumb').val("");
            }
        }
    });
});
