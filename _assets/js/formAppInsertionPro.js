$('document').ready(function () {
    $('#anneeProchaine').change(function () {
        var choixSelect = $('#anneeProchaine option:selected').val();
        if (choixSelect != "default") {
            $('#choixAnneePro').load('_views/form/_includes/' + choixSelect + '.php');
        }
    });
});