$('#typeFormation').change(function () {
    var choixSelect = $('#typeFormation option:selected').val();
    if (choixSelect == "alternance") {
        $('#choixTypeFormation').load('_views/form/_includes/' + choixSelect + '.php');
    } else {
        $('#choixTypeFormation').empty();
    }
});