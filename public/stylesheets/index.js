$(document).ready(function() {
$('#letter-e a').click(function() {
$.post('getuser.php', {'term': $(this).text()}, function(data) {
$('#dictionary').html(data);
});
return false;
});
});