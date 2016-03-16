$('document').ready(function () {
    $('#anneeProchaine').change(function () {
        var choixSelect = $('#anneeProchaine option:selected').val();
        if (choixSelect != "recherchePoursuiteEtudes") {
            $('#choixAnneePro').load('_views/form/_includes/' + choixSelect + '.php');
        }
        else {
            $('#choixAnneePro').empty();
        }
    });
});