<?php include('_includes/breadcrumbs.php'); ?>
<h4>Entrevues</h4>
<form class="col s12">
    <span class="card-title">Entrevue</span>
    <input placeholder="Date de l'entrevue" id="dateEntrevue" type="text" class="validate" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)" required />
    <label for="dateEntrevue">En date du... (exemple : 20/02/1994)</label>
    <textarea id="obsEntrevue" class="materialize-textarea"></textarea>
    <label for="obsEntrevue">Observations</label>
</form>