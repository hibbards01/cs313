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
      url: "save_post.php",
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

  $(".logout").click(function() {
    // Send a post saying to log out!
    var data = {
      logout : "1"
    };

    $.ajax({
      url: "save_post.php",
      type: "POST",
      data: data,
      success: function() {
        // Reload the page!
      }
    });

    location.reload();
  });

  // Check the content on the signup form
  $("#signUp").click(function(event) {
    // Always clear everything from the beginning!
    $("p.error1").attr('style', 'display: none');
    $("p.error2").attr('style', 'display: none');
    $("span[name=error]").css('display', 'none');

    // Check to see if everything is filled!
    var show_error = 0;
    $("input").each(function(index) {
      var name = "span[name=" + $(this).attr('name') + "]";
      if ($(this).val().length === 0) {
        // Grab the name

        // Grab the span tag with given name
        $(name).css('display', 'inline');
        show_error = 1;
      } else {
        $(name).css('display', 'none');
        show_error = 0;
      };
    });

    // Check that the password is equal to each other
    var password = $("input[name=password]");
    var confirm = $("input[name=confirm]");

    if (password.val() !== confirm.val() || password.val().length === 0) {
      show_error = 2;
      $("span[name=password]").css('display', 'inline');
      $("span[name=confirm]").css('display', 'inline');
    } else {
      $("span[name=password]").css('display', 'none');
      $("span[name=confirm]").css('display', 'none');
      show_error = 0;
    };

    // Now show the last error!
    if (show_error === 1 || show_error === 2) {
      // Show the error message
      if (show_error === 1) {
        $("p.error1").attr('style', 'display: inline');
      } else {
        $("p.error2").attr('style', 'display: inline');
      };

      $("span[name=error]").css('display', 'inline');
      event.preventDefault();
    };
  });

  // Unless hey hit cancel direct the page to index.php
  $("#cancel").click(function() {
    window.location.href = "index.php";
  });
});