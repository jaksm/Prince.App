///// Calendar
// Options
$('document').ready(function() {
  var path = "http://prince.app/home/flight/create/autocomplete";
  var anotherpath = "http://prince.app/home/flight/create/posada";

  $('#clientNaziv').typeahead({
      source:  function (query, process) {
      return $.get(path, { query: query }, function (data) {
              return process(data);
          });
      }
  });

  $('#staffsID').typeahead({
      source:  function (query, process) {
      return $.get(anotherpath, { query: query }, function (data) {
              return process(data);
          });
      }
  });
});
