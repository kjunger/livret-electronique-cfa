$('#presenceApp').change(function () {
    var choixSelect = $('#presenceApp option:selected').val();
    if (choixSelect == "absent") {
        $('#choixPresenceApp').load('_views/form/_includes/' + choixSelect + '.php');
    }
    else {
        $('#choixPresenceApp').empty();
    }
});