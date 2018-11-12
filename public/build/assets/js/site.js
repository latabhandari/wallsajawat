if (typeof WallSajawat == 'undefined') { WallSajawat = {}; };

WallSajawat.getSitePath    =  function(path) { return 'https://www.wallsajawat.com/beta/' + path ; };
WallSajawat.getImages      =  function(file) { return 'https://www.wallsajawat.com/assets/images/' + file ; };

$(document).ready(function() {
            // validate the comment form when it is submitted
  
            // validate signup form on keyup and submit
                $("#searchfrm").validate({
                          rules: {
                                          search: {
                                                            required: true, 
                                                            minlength: 3,
                                                  }
                          },

                          submitHandler: function()  {

                                                            return true;
                                                     }
                });

                 $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $("#addwishlist, .addwishlist").on('click', function() {
                    let id = parseInt($(this).attr('data-attr'));

                    $.ajax({
                               type: "POST",
                               url: WallSajawat.getSitePath('wishlist'),
                               dataType: "json",
                               data: {"pid": id},
                               success: function (resp) {



                                  $('<i class="fa fa-star wshlst" title="Already added in your wishlist"></i>').insertAfter(this);


                                  alert(resp.msg);
                               }

                           });
                }); 

                $(".share").on('click', function() {

                  let id = parseInt($(this).attr('data-attr'));

                  $('.social_containter').css('display', 'none');

                  $('#share_container_' + id).css('display', 'block');

                });


  });


