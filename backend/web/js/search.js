$(function(){
    $('.search-btn').on('click', function(){
        var className = $(this).data('search-class');
        var query = $('input[name=query]').val();
        if(query == '') {
            alert('Введите поисковой запрос');
            return false;
        }
        $.ajax({
            url:'/admin/search/run-search',
            type: 'post',
            dataType: 'json',
            data: {className:className, query:query},
            success:function(response){
                $('.search-results').html(response.html);
            }
        })
    })
})