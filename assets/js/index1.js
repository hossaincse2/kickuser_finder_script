var busy = false;
var limit = 10;
var offset = 0;
 //var request;
 function displayRecords22(lim, off) {
      $.ajax({
           type: "GET",
           url: "getresult.php",
           data: "limit=" + lim + "&offset=" + off,
           beforeSend: function() {
            $("#loader_message").html("").hide();
            $('#loader_image').show();
          },
          success: function(html) {
            $("#results").append(html);
            $('#loader_image').hide();
            if (html == "") {
              $("#loader_message").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>').show()
            } else {
              $("#loader_message").html('<button class="btn btn-default load_buton" type="button">Load More Users</button>').show();
            }
             busy = false;
  return false;
          }
        });
}
  $(document).ready(function() {
if (busy == false) {
  busy = true;
  // start to load the first set of data
 // alert('sdfsdf');
  displayRecords22(limit, offset);
}
});
  
$(document).ready(function() {
        // start to load the first set of data
       // displayRecords(limit, offset);

        $('#loader_message').click(function() {

          // if it has no more records no need to fire ajax request
          var d = $('#loader_message').find("button").attr("data-atr");
          if (d != "nodata") {
             offset = limit + offset;
            displayRecords22(limit, offset);
          }
        });

      });
  
function displayRecords2(lim, off) {
        $.ajax({
          type: "GET",
          url: "getkik_guy.php",
          data: "limit=" + lim + "&offset=" + off,
           beforeSend: function() {
            $("#loader_message2").html("").hide();
            $('#loader_image2').show();
          },
          success: function(html) {
            $("#results2").append(html);
            $('#loader_image2').hide();
           if (html == "") {
              $("#loader_message2").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>').show()
            } else {
              $("#loader_message2").html('<button class="btn btn-default load_buton" type="button">Load More Users</button>').show();
            }
            window.busy = false;
 
          }
        });
}
  $(document).ready(function() {
if (busy == false) {
  busy = true;
  // start to load the first set of data
  displayRecords2(limit, offset);
}
});
  
$(document).ready(function() {
        // start to load the first set of data
        displayRecords2(limit, offset);

        $('#loader_message2').click(function() {

          // if it has no more records no need to fire ajax request
          var d = $('#loader_message2').find("button").attr("data-atr");
          if (d != "nodata") {
            offset = limit + offset;
            displayRecords2(limit, offset);
          }
        });

      });





function displayRecords3(lim, off) {
        $.ajax({
          type: "GET",
          url: "getkik_girl.php",
          data: "limit=" + lim + "&offset=" + off,
          beforeSend: function() {
            $("#loader_message3").html("").hide();
            $('#loader_image3').show();
          },
          success: function(html) {
            $("#results3").append(html);
            $('#loader_image3').hide();
            if (html == "") {
              $("#loader_message3").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>').show()
            } else {
              $("#loader_message3").html('<button class="btn btn-default load_buton" type="button">Load More Users</button>').show();
            }
            window.busy = false;
 
          }
        });
}
  $(document).ready(function() {
if (busy == false) {
  busy = true;
  // start to load the first set of data
  displayRecords3(limit, offset);
}
});
  
$(document).ready(function() {
        // start to load the first set of data
        displayRecords3(limit, offset);

        $('#loader_message3').click(function() {

          // if it has no more records no need to fire ajax request
          var d = $('#loader_message3').find("button").attr("data-atr");
          if (d != "nodata") {
            offset = limit + offset;
            displayRecords3(limit, offset);
          }
        });

      });


function displayRecords4(lim, off) {
        $.ajax({
          type: "GET",
          url: "recent_users.php",
          data: "limit=" + lim + "&offset=" + off,
          beforeSend: function() {
            $("#loader_message4").html("").hide();
            $('#loader_image4').show();
          },
          success: function(html) {
            $("#results4").append(html);
            $('#loader_image4').hide();
            if (html == "") {
              $("#loader_message4").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>').show()
            } else {
              $("#loader_message4").html('<button class="btn btn-default load_buton" type="button">Load More Users</button>').show();
            }
            window.busy = false;
 
          }
        });
}
  $(document).ready(function() {
if (busy == false) {
  busy = true;
  // start to load the first set of data
  displayRecords4(limit, offset);
}
});
  
$(document).ready(function() {
        // start to load the first set of data
        displayRecords4(limit, offset);

        $('#loader_message4').click(function() {

          // if it has no more records no need to fire ajax request
          var d = $('#loader_message4').find("button").attr("data-atr");
          if (d != "nodata") {
            offset = limit + offset;
            displayRecords4(limit, offset);
          }
        });

      });
       
       
       $(document).ready(function() {
      
      
       $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
   //alert('sdsd');
  console.log(recipient);
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
   modal.find('.modal-title')
   modal.find("#w3").attr("href", "http://kik.me/u/" + recipient);
  modal.find('#kik').val(recipient)
  //modal.find('.kikuser').html(recipient)
});

  $('#example2').on('show.bs.modal', function (event) {
  var button3 = $(event.relatedTarget) // Button that triggered the modal
  var recipient3 = button3.data('whatever3') // Extract info from data-* attributes
   //alert('sdsd');
  console.log(recipient3);
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
   modal.find('.modal-title23')
  //$("#w3").attr("href", "http://www.w3schools.com/jquery");
  modal.find('#kik323').val(recipient3)
  //modal.find('.kikuser').html(recipient)
});

});