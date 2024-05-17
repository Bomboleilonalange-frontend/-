
$("a[href^='#']").click(function () {
  var href = $(this).attr("href");

  $("html, body").animate(
    {
      scrollTop: $(href).offset().top + "px",
    },
    {
      duration: 1000,

      easing: "swing",
    }
  );

  return false;
});
