

// for like button
$('.like').on('click',function(){

    var like_s = $(this).attr('data-like');
    var comment_id = $(this).attr('data-commentid');
    comment_id =comment_id.slice(0,-2); //attr('data-commentid') يعني قص الي اخر حرفين من


    $.ajax({
        type : 'POST',
        url : url,
        data : {like_s:like_s , comment_id:comment_id , _token: token},

        success: function(data){


            // for add new like
            if(data.isLike == 1){
                $('*[data-commentid="'+ comment_id +'_l"]').removeClass('btn-secondry').addClass('btn-primary');
                $('*[data-commentid="'+ comment_id +'_d"]').removeClass('btn-danger').addClass('btn-secondry');


                //count like
                var cu_like = $('*[data-commentid="'+ comment_id +'_l"]').find('.like_count').text();
                var new_like =parseInt( cu_like ) + 1;
                $('*[data-commentid="'+ comment_id +'_l"]').find('.like_count').text(new_like);

                if( data.change_like == 1){
                    var cu_dislike = $('*[data-commentid="'+ comment_id +'_d"]').find('.dislike_count').text();
                    var new_dislike =parseInt( cu_dislike ) - 1;
                    $('*[data-commentid="'+ comment_id +'_d"]').find('.dislike_count').text(new_dislike);
                }
            }




            // for remove like

            if(data.isLike == 0){
                $('*[data-commentid="'+ comment_id +'_l"]').removeClass('btn-primary').addClass('btn-secondry');

                var cu_like = $('*[data-commentid="'+ comment_id +'_l"]').find('.like_count').text();
                var new_like =parseInt( cu_like ) - 1;
                $('*[data-commentid="'+ comment_id +'_l"]').find('.like_count').text(new_like);
            }
        }
    });
});



// for dislike button

$('.dislike').on('click',function(){

    var like_s = $(this).attr('data-like');
    var comment_id = $(this).attr('data-commentid');
    comment_id =comment_id.slice(0,-2); //attr('data-commentid') يعني قص الي اخر حرفين من
    // alert( comment_id);


    $.ajax({
        type : 'POST',
        url : url_dis,
        data : {like_s:like_s , comment_id:comment_id , _token: token},

        success: function(data){

            // alert(data.isLike);

            // for add new dislike
            if(data.is_dislike == 1){
                $('*[data-commentid="'+ comment_id +'_d"]').removeClass('btn-secondry').addClass('btn-danger');
                $('*[data-commentid="'+ comment_id +'_l"]').removeClass('btn-primary').addClass('btn-secondry');

                //count dislike

                var cu_dislike = $('*[data-commentid="'+ comment_id +'_d"]').find('.dislike_count').text();
                var new_dislike =parseInt( cu_dislike ) + 1;
                $('*[data-commentid="'+ comment_id +'_d"]').find('.dislike_count').text(new_dislike);

                if( data.change_dislike == 1){
                    var cu_dislike = $('*[data-commentid="'+ comment_id +'_l"]').find('.like_count').text();
                    var new_like =parseInt( cu_dislike ) - 1;
                    $('*[data-commentid="'+ comment_id +'_l"]').find('.like_count').text(new_like);
                }


            }

            // for remove dislike

            if(data.is_dislike == 0){
                $('*[data-commentid="'+ comment_id +'_d"]').removeClass('btn-danger').addClass('btn-secondry');


                var cu_dislike = $('*[data-commentid="'+ comment_id +'_d"]').find('.dislike_count').text();
                var new_dislike =parseInt( cu_dislike ) - 1;
                $('*[data-commentid="'+ comment_id +'_d"]').find('.dislike_count').text(new_dislike);

            }
        },
    });
});

