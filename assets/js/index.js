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
  //  alert(baseurl);
$.ajax({
           type: "GET",
           url: baseurl + "/getresult.php",
           data: "limit=" + lim + "&offset=" + off  + "&type=" + type,
           beforeSend: function() {
                //$(lodermessage).html("").hide();
                $(loderimg).show();
            },
           success: function(html) {
               var substr1='<!--<h1>all</h1>-->';
               var result1 = html.indexOf(substr1) > -1;
               var substr2='<!--<h1>guy</h1>-->';
               var result2 = html.indexOf(substr2) > -1;
               var substr3='<!--<h1>girl</h1>-->';
               var result3 = html.indexOf(substr3) > -1;
               var substr4='<!--<h1>recent</h1>-->';
               var result4 = html.indexOf(substr4) > -1;
               var substr5='<!--<h1>hotestguy</h1>-->';
               var result5 = html.indexOf(substr5) > -1;
               var substr6='<!--<h1>hotestgirl</h1>-->';
               var result6 = html.indexOf(substr6) > -1;
               var substr7='<!--<h1>hotestuser</h1>-->';
               var result7 = html.indexOf(substr7) > -1;
               var substr8='<!--<h1>recenthotest</h1>-->';
               var result8 = html.indexOf(substr8) > -1;
               var substr9='<!--<h1>recentguy</h1>-->';
               var result9 = html.indexOf(substr9) > -1;
               var substr10='<!--<h1>recentgirl</h1>-->';
               var result10 = html.indexOf(substr10) > -1;
               
               // alert(result);
               if(result1){
                   $("#results").append(html);
                   $(loderimg).hide();
                    if (html.indexOf("div") > -1) {
                      //   $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                    $(".loader_message").html('<button data-offset=0 data-atrs="all"  class="btn btn-default load_buton" type="button">Load More Users</button>').show();
                         } else { 
                       // $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                      $(".loader_message").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>').show()
                 
                        }
               }
                if(result2){
                   $("#results2").append(html);
                   $(loderimg).hide();
                  if (html.indexOf("div") > -1) {
                      //   $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                    $(".loader_message2").html('<button data-offset=0 data-atrs="guy"  class="btn btn-default load_buton" type="button">Load More Users</button>').show();
                         } else { 
                       // $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                      $(".loader_message2").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>').show()
                 
                        }
                }
               if(result3){
                   $("#results3").append(html);
                   $(loderimg).hide();
                   if (html.indexOf("div") > -1) {
                      //   $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                    $(".loader_message3").html('<button data-offset=0 data-atrs="girl"  class="btn btn-default load_buton" type="button">Load More Users</button>').show();
                         } else { 
                       // $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                      $(".loader_message3").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>').show()
                 
                        }
                }
               if(result4){
                   $("#results4").append(html);
                   $(loderimg).hide();
                  if (html.indexOf("div") > -1) {
                      //   $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                    $(".loader_message4").html('<button data-offset=0 data-atrs="recent"  class="btn btn-default load_buton" type="button">Load More Users</button>').show();
                         } else { 
                       // $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                      $(".loader_message4").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>').show()
                 
                        }
                }
                if(result5){
                   $("#results5").append(html);
                   $(loderimg).hide();
                  if (html.indexOf("div") > -1) {
                      //   $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                    $(".loader_message5").html('<button data-offset=0 data-atrs="recent"  class="btn btn-default load_buton" type="button">Load More Users</button>').show();
                         } else { 
                       // $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                      $(".loader_message5").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>').show()
                 
                        }
                }
                if(result6){
                   $("#results6").append(html);
                   $(loderimg).hide();
                  if (html.indexOf("div") > -1) {
                      //   $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                    $(".loader_message6").html('<button data-offset=0 data-atrs="recent"  class="btn btn-default load_buton" type="button">Load More Users</button>').show();
                         } else { 
                       // $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                      $(".loader_message6").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>').show()
                 
                        }
                }
                if(result7){
                   $("#results7").append(html);
                   $(loderimg).hide();
                  if (html.indexOf("div") > -1) {
                      //   $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                    $(".loader_message7").html('<button data-offset=0 data-atrs="recent"  class="btn btn-default load_buton" type="button">Load More Users</button>').show();
                         } else { 
                       // $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                      $(".loader_message7").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>').show()
                 
                        }
                }
                if(result8){
                   $("#results8").append(html);
                   $(loderimg).hide();
                  if (html.indexOf("div") > -1) {
                      //   $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                    $(".loader_message8").html('<button data-offset=0 data-atrs="recent"  class="btn btn-default load_buton" type="button">Load More Users</button>').show();
                         } else { 
                       // $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                      $(".loader_message8").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>').show()
                 
                        }
                }
                if(result9){
                   $("#results9").append(html);
                   $(loderimg).hide();
                  if (html.indexOf("div") > -1) {
                      //   $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                    $(".loader_message9").html('<button data-offset=0 data-atrs="recent"  class="btn btn-default load_buton" type="button">Load More Users</button>').show();
                         } else { 
                       // $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                      $(".loader_message9").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>').show()
                 
                        }
                }
                if(result10){
                   $("#results10").append(html);
                   $(loderimg).hide();
                  if (html.indexOf("div") > -1) {
                      //   $("button[data-attrs='all']").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No More Users</button>');
                    $(".loader_message10").html('<button data-offset=0 data-atrs="recent"  class="btn btn-default load_buton" type="button">Load More Users</button>').show();
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
      getRecord('all', limit, offset);
      getRecord('guy', limit, offset);
      getRecord('girl', limit, offset);
      getRecord('recent', limit, offset);
      getRecord('hotestguy', limit, offset);
      getRecord('hotestgirl', limit, offset);
      getRecord('hotestuser', limit, offset);
      getRecord('recenthotest', limit, offset);
      getRecord('recentguy', limit, offset);
      getRecord('recentgirl', limit, offset);
});
$(document).ready(function() {
         $(".loader_message").click(function() {
             var d = $(this).find("button").attr("data-atr");
              //var offsets = $(this).find("button").attr('data-offset');
             // var type = $(this).find("button").attr("data-atrs");
           //  var number = parseInt(offsets);
            if (d != "nodata") {
             offset = limit + offset;
             getRecord('all', limit, offset);
         }
             });
              $(".loader_message2").click(function() {
           var d = $(this).find("button").attr("data-atr");
            // var offsets = $(this).find("button").attr('data-offset');
             // var type = $(this).find("button").attr("data-atrs");
             //var number = parseInt(offsets);
              if (d != "nodata") {
             offset = limit + offset;
             getRecord('guy', limit, offset);
         }
             });
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
              $(".loader_message4").click(function() {
          var d = $(this).find("button").attr("data-atr");
             //var offsets = $(this).find("button").attr('data-offset');
             // var type = $(this).find("button").attr("data-atrs");
             //var number = parseInt(offsets);
              if (d != "nodata") {
             offset = limit + offset;
             
             getRecord('recent', limit, offset);
         }
             });
             $(".loader_message5").click(function() {
          var d = $(this).find("button").attr("data-atr");
             //var offsets = $(this).find("button").attr('data-offset');
             // var type = $(this).find("button").attr("data-atrs");
             //var number = parseInt(offsets);
              if (d != "nodata") {
             offset = limit + offset;
             
             getRecord('hotestguy', limit, offset);
         }
             });
             $(".loader_message6").click(function() {
          var d = $(this).find("button").attr("data-atr");
             //var offsets = $(this).find("button").attr('data-offset');
             // var type = $(this).find("button").attr("data-atrs");
             //var number = parseInt(offsets);
              if (d != "nodata") {
             offset = limit + offset;
             
             getRecord('hotestgirl', limit, offset);
         }
             });
             $(".loader_message7").click(function() {
          var d = $(this).find("button").attr("data-atr");
             //var offsets = $(this).find("button").attr('data-offset');
             // var type = $(this).find("button").attr("data-atrs");
             //var number = parseInt(offsets);
              if (d != "nodata") {
             offset = limit + offset;
             
             getRecord('hotestuser', limit, offset);
         }
             });
             $(".loader_message8").click(function() {
          var d = $(this).find("button").attr("data-atr");
             //var offsets = $(this).find("button").attr('data-offset');
             // var type = $(this).find("button").attr("data-atrs");
             //var number = parseInt(offsets);
              if (d != "nodata") {
             offset = limit + offset;
             
             getRecord('recenthotest', limit, offset);
         }
             });
              $(".loader_message9").click(function() {
          var d = $(this).find("button").attr("data-atr");
             //var offsets = $(this).find("button").attr('data-offset');
             // var type = $(this).find("button").attr("data-atrs");
             //var number = parseInt(offsets);
              if (d != "nodata") {
             offset = limit + offset;
             
             getRecord('recentguy', limit, offset);
         }
             });
              $(".loader_message10").click(function() {
          var d = $(this).find("button").attr("data-atr");
             //var offsets = $(this).find("button").attr('data-offset');
             // var type = $(this).find("button").attr("data-atrs");
             //var number = parseInt(offsets);
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
       
