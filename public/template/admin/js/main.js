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
