$(function () {
  "use strict";
  var modeTemplates = $(".mode-templates");
  $(".open-mode input").on("change", function () {
    if ($(this).val() === "no") {
      modeTemplates.removeClass("hidden-content");
    } else {
      modeTemplates.addClass("hidden-content");
    }
  });
  $(".mode-templates .template").on("click", function () {
    $(this).addClass("selected").siblings().removeClass("selected");
  });
  // Save Textarea on Blur
  $(".page-area textarea").on("blur", function () {
    $(this).prev(".head").find(".save-message").fadeIn(500).delay(1500).fadeOut(500);
  });
  // Add New FAQ
  $(".add-faq").on("click", function () {
    $(".faq-content").append(
      "<div class='q-a'><h3>" +
        $(".question").val() +
        "</h3><p>" +
        $(".answer").val() +
        "</p><span class='close'>x</span></div>"
    );
    $(".question, .answer").val("");
  });
  // Remove The Faq Box
  $("body").on("click", ".q-a .close", function () {
    $(this).parent().fadeOut();
  });
});
