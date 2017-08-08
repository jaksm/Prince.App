///// Calendar
// Options
$( function() {
  $( "#datepicker" ).datepicker({
    showOn: "button",
    buttonImageOnly: true,
    buttonText: ""
  });
});

$("#myButton").click(function() {
  $("#datepicker").datepicker("show");
});
