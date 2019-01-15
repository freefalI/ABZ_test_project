$(()=>{

    $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=csrf-token]').attr('content') }
    });


    // $('.collapsible').css( 'cursor', 'pointer' );
    // var coll = document.getElementsByClassName("collapsible");
    // var i;
    
    // for (i = 0; i < coll.length; i++) {
    //   coll[i].addEventListener("click", function() {
    //     this.classList.toggle("active");
    //     var content = this.nextElementSibling;
    //     if (content.style.display === "block") {
    //       content.style.display = "none";
    //     } else {
    //       content.style.display = "block";
    //     }
    //   });
    // }



    $(document).on('click','.collapsible',function(){
        id = $(this).data('id');
        depth = $(this).data('depth');
        childrenBlock = $(this).next();
        console.log($(childrenBlock));
        
        $(this).toggleClass("active");
        if($(childrenBlock).is(':visible')){
            $(childrenBlock).hide();
         
        }
        else{
           
            if ( ! $(childrenBlock).hasClass('is-loaded')){
                $(childrenBlock).addClass('is-loaded');
                console.log(1);
                data=null;
                $.get("/positions/" + id + '/children', {
                    // _method: 'DELETE'
                },
                    (data, status) => {
                        data = JSON.parse(data);
                        if(!data.length){
                            $(childrenBlock).addClass('no-children');
                            console.log('noch added');
                            
                        }
                        console.log(data);
                        for (i = 0; i < data.length; i++) {
                            position = data[i];
                            $(childrenBlock).append(`
                            <p class='collapsible' data-id=${position.id} data-depth=${depth + 1}>
                            ${data[i].name}
                            </p>
                            <div class='content' hidden>
                            </div>
                            `);
                        }
                    });
            }
            if(! $(childrenBlock).hasClass('no-children')){
                $(childrenBlock).fadeIn(()=>{
                console.log($(childrenBlock).html());
                $(this).show();
                    console.log('showed');

                });
            }

        }
            

    });





})