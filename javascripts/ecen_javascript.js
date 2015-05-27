/*****************************************
* Program:
*   ecen_javascript.js
* Author:
*   Samuel Hibbard
* Summary:
*   This is will do all the jquery required
*     for the ecen_website.
*****************************************/

$(document).ready(function() {
  $(".details").click(function() {
    // Grab the id!
    var data = {
      id : $(this).attr("id")
    };

    // Now send the information!
    $.ajax({
      url: "save_id.php",
      type: "POST",
      data: data,
      success: function() {
        // window.location.href = "redirector.php"
      }
    });
  });

  // Show the modal if clicked!
  $(".login").click(function() {
    $("#loginModal").modal();
  });

  // Check if there is any error!
  // $("#submit").click(function() {
  //   var error = $("#error").attr("value");
  //   alert(error);
  // });
  $("#error").bind("input", function() {
    alert("Change to " + this.value);
  });
});