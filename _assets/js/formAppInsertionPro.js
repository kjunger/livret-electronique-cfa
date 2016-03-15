$('document').ready(function () {
    $('#anneeProchaine').change(function () {
        var choixSelect = $('#anneeProchaine option:selected').val();
        if (choixSelect != "default") {
            var choixInsert = "<?php include('_views/form/_includes/" + choixSelect + ".php'); ?>"
            $('#choixAnneePro').html(choixInsert);
        }
    });
});