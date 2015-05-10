/*******************************
* javascript.js
*   I will be using JQuery here!
*******************************/
$(document).ready(function() {

  // If question 4 is yes display another question
  $("input[name=question4]").change(function() {
    // Check if it is marked yes...
    if ($(this).val() == 'yes') {
      $("div.que4a").css('display', 'inline');
    } else {
      $("div.que4a").css('display', 'none');
    };
  });

  // Grab all the input tags when you sumbit!
  $("form").submit(function(event) {
    // Now check it!
    var submit = checkRadio($(this).find('input[name=question3]'), $(this));
    submit = checkRadio($(this).find('input[name=question4]'), $(this));
    submit = checkRadio($(this).find('input[name=question5]'), $(this));
    submit = checkRadio($(this).find('input[name=question1]'), $(this));

    // If this is true then don't submit it!
    if (!submit) {
      // Pause the submit
      event.preventDefault();

      // Show the error message
      $("p.inline").attr('style', 'display: inline');
      $("span[name=error]").css('display', 'inline');
    };
  });
});

/**************************
* checkRadio
*   This will check the radio
*     buttons and make sure that
*     at least one is checked.
**************************/
function checkRadio (tag, form) {
  var name = "span[name=" + tag.get(0).name + "]";

  // Are you checked!
  if (!tag.is(":checked")) {
    var error = form.find(name);
    error.attr('style', 'display: inline');
    return false;
  };

  return true;
}