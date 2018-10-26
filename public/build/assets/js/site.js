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


  });

