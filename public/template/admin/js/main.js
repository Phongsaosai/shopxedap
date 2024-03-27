$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url){
    if(confirm('Bạn có chắc xoá mà không thể khôi phục không?')){
        $.ajax({
            type : 'DELETE',
            dataType : 'JSON',
            data : {id},
            url : url,
            success : function(result){
                if(result.erro === false){ // Thay đổi từ 'error' thành 'erro' ở đây
                    alert(result.message);
                    location.reload();
                }
                else{
                    alert('Xoá lỗi vui lòng thử lại!');
                }
            }
        });
    }
}

//Upload File
$('#upload').change(function(){
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function(results){
            if(results.error === false){
                $('#image_show').html('<a href="'+ results.url +'" target="_blank">' +
                '<img src="'+ results.url +'" width="100px"></a>');
                
                $('#file').val(results.url);
            } else {
                alert('Lỗi: ' + results.message);
            }
        }
    });
});
