$(document).ready(function () {
    autocomplete()
    $('#add_author').click(function () {
        let html = $('.authors').eq(0).clone();
        html.find('.authors_id').val('')
        html.find('.author_book').val('')
        html.find('.author_book').removeClass('is-invalid')
        html.find('.invalid-feedback').remove()
        html.find('.form-control').after(`<button class="btn btn-danger remove_author">-</button>`)
        $(this).parents('.footer').before(html)
        autocomplete()
    })

    $(document).on('click','.remove_author',function () {
        $(this).parents('.authors').remove()
    })

    function autocomplete() {
        $('.author_book').autocomplete({
            source:function(request,response){
                $.getJSON('/author/autocomplete?name='+request.term,function(data){
                    let authors = JSON.parse(data);
                    response( authors.data );
                })
            },
            minLength:1,
            delay:500,
            select:function(event,ui){
                $(this).parent().find('.authors_id').val(ui.item.id);
            }
        })
    }

})