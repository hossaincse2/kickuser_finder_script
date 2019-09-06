var busy = false;
var limit = 10;
var offset = 0;
 //var girl = 'girl';
//var guys = 'guys';
//alert(option);
var lodermessage = $(".loader_message");
var loderimg = $(".loader_image");
function getRecord(type, lim, off){
    //alert(type + " " + lim + " "+ off);
$.ajax({
           type: "GET",
           url: "getgirlresult.php",
           data: "limit=" + lim + "&offset=" + off  + "&type=" + type,
           beforeSend: function() {
                //$(lodermessage).html("").hide();
                $(loderimg).show();
            },
           success: function(html) {
               var substr1='<!--<h1>girl</h1>-->';
               var result1 = html.indexOf(substr1) > -1;
               var substr2='<!--<h1>hotestgirl</h1>-->';
               var result2 = html.indexOf(substr2) > -1;
               var substr3='<!--<h1>recentgirl</h1>-->';
               var result3 = html.indexOf(substr3) > -1;
                // alert(result);
               if(result1){
                   $("#results3").append(html);
                   $(loderimg).hide();
                    if (html.contains("div")) {
                      //   $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                    $(".loader_message3").html('<button data-offset=0 data-atrs="all"  class="btn btn-default load_buton" type="button">Load More Users</button>').show();
                         } else { 
                       // $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                    $(".loader_message3").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>').show()
                 
                        }
               }
                if(result2){
                   $("#results6").append(html);
                   $(loderimg).hide();
                  if (html.contains("div")) {
                      //   $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                    $(".loader_message6").html('<button data-offset=0 data-atrs="guy"  class="btn btn-default load_buton" type="button">Load More Users</button>').show();
                         } else { 
                       // $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                      $(".loader_message6").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>').show()
                 
                        }
                }
               if(result3){
                   $("#results10").append(html);
                   $(loderimg).hide();
                   if (html.contains("div")) {
                      //   $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                    $(".loader_message10").html('<button data-offset=0 data-atrs="girl"  class="btn btn-default load_buton" type="button">Load More Users</button>').show();
                         } else { 
                       // $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                      $(".loader_message10").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>').show()
                 
                        }
                }
               
              busy = false;
             return false;
          }
        });    
}

//function whichData(html){
//    return 'result1';
//};

$(document).ready(function() {
       getRecord('girl', limit, offset);
       getRecord('hotestgirl', limit, offset);
       getRecord('recentgirl', limit, offset);
 });
$(document).ready(function() {
         $(".loader_message3").click(function() {
             var d = $(this).find("button").attr("data-atr");
              //var offsets = $(this).find("button").attr('data-offset');
             // var type = $(this).find("button").attr("data-atrs");
           //  var number = parseInt(offsets);
            if (d != "nodata") {
             offset = limit + offset;
             getRecord('girl', limit, offset);
         }
             });
              $(".loader_message6").click(function() {
           var d = $(this).find("button").attr("data-atr");
            // var offsets = $(this).find("button").attr('data-offset');
             // var type = $(this).find("button").attr("data-atrs");
             //var number = parseInt(offsets);
              if (d != "nodata") {
             offset = limit + offset;
             getRecord('hotestgirl', limit, offset);
         }
             });
              $(".loader_message10").click(function() {
           var d = $(this).find("button").attr("data-atr");
             //var offsets = $(this).find("button").attr('data-offset');
             // var type = $(this).find("button").attr("data-atrs");
           //  var number = parseInt(offsets);     
              if (d != "nodata") {
              offset = limit + offset;
             getRecord('recentgirl', limit, offset);
         }
             });
               
  });

// function displayRecords22(lim, off) {
//      $.ajax({
//           type: "GET",
//           url: "getresult.php",
//           data: "limit=" + lim + "&offset=" + off,
//           beforeSend: function() {
//            $("#loader_message").html("").hide();
//            $('#loader_image').show();
//           },
//           success: function(html) {
//            $("#results22").append(html);
//            $('#loader_image').hide();
//            if (html == "") {
//              $("#loader_message").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>').show()
//            } else {
//              $("#loader_message").html('<button class="btn btn-default load_buton" type="button">Load More Users</button>').show();
//            }
//             busy = false;
//             return false;
//          }
//        });
//}
//$(document).ready(function() {
//    if (busy == false) {
//            busy = true;
//            displayRecords22(limit, offset);
//     }
//});
//$(document).ready(function() {
//         $('#loader_message').click(function() {
//          var d = $('#loader_message').find("button").attr("data-atr");
//          if (d != "nodata") {
//             offset = limit + offset;
//             displayRecords22(limit, offset);
//              }
//            });
// });
//function displayRecords2(lim, off) {
//        $.ajax({
//          type: "GET",
//          url: "getkik_guy.php",
//          data: "limit=" + lim + "&offset=" + off,
//           beforeSend: function() {
//            $("#loader_message2").html("").hide();
//            $('#loader_image2').show();
//           },
//           success: function(html) {
//            $("#results2").append(html);
//            $('#loader_image2').hide();
//           if (html == "") {
//              $("#loader_message2").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>').show()
//            } else {
//              $("#loader_message2").html('<button class="btn btn-default load_buton" type="button">Load More Users</button>').show();
//            }
//            window.busy = false;
// 
//          }
//        });
//}
//$(document).ready(function() {
//        if (busy == false) {
//          busy = true;
//          displayRecords2(limit, offset);
//        }
//});
//  
//$(document).ready(function() {
//         displayRecords2(limit, offset);
//         $('#loader_message2').click(function() {
//            var d = $('#loader_message2').find("button").attr("data-atr");
//            if (d != "nodata") {
//              offset = limit + offset;
//              displayRecords2(limit, offset);
//            }
//        });
//
// });
// 
//function displayRecords3(lim, off) {
//        $.ajax({
//          type: "GET",
//          url: "getkik_girl.php",
//          data: "limit=" + lim + "&offset=" + off,
//          beforeSend: function() {
//            $("#loader_message3").html("").hide();
//            $('#loader_image3').show();
//           },
//          success: function(html) {
//            $("#results3").append(html);
//            $('#loader_image3').hide();
//            if (html == "") {
//              $("#loader_message3").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>').show()
//            } else {
//              $("#loader_message3").html('<button class="btn btn-default load_buton" type="button">Load More Users</button>').show();
//            }
//            window.busy = false;
// 
//          }
//        });
//}
//$(document).ready(function() {
//    if (busy == false) {
//      busy = true;
//      displayRecords3(limit, offset);
//    }
//});
//$(document).ready(function() {
//        displayRecords3(limit, offset);
//        $('#loader_message3').click(function() {
//          var d = $('#loader_message3').find("button").attr("data-atr");
//          if (d != "nodata") {
//            offset = limit + offset;
//            displayRecords3(limit, offset);
//          }
//        });
//
//});
//
//function displayRecords4(lim, off) {
//        $.ajax({
//          type: "GET",
//          url: "recent_users.php",
//          data: "limit=" + lim + "&offset=" + off,
//          beforeSend: function() {
//            $("#loader_message4").html("").hide();
//            $('#loader_image4').show();
//          },
//          success: function(html) {
//            $("#results4").append(html);
//            $('#loader_image4').hide();
//            if (html == "") {
//              $("#loader_message4").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>').show()
//            } else {
//              $("#loader_message4").html('<button class="btn btn-default load_buton" type="button">Load More Users</button>').show();
//            }
//            window.busy = false;
// 
//          }
//        });
//}
//$(document).ready(function() {
//    if (busy == false) {
//       busy = true;
//       displayRecords4(limit, offset);
//    }
//});
//  
//$(document).ready(function() {
//         displayRecords4(limit, offset);
//         $('#loader_message4').click(function() {
//          var d = $('#loader_message4').find("button").attr("data-atr");
//          if (d != "nodata") {
//            offset = limit + offset;
//            displayRecords4(limit, offset);
//          }
//        });
//
//});
       
