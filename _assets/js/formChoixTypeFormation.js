$('#typeFormation').change(function () {
    var choixSelect2 = $('#typeFormation option:selected').val();
    if (choixSelect2 == "alternance") {
        $('#choixTypeFormation').load('_views/form/_includes/' + choixSelect2 + '.php');
    }
    else {
        $('#choixTypeFormation').empty();
    }
});