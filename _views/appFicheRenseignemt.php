<div class="row">
    <form class="col s6">
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input placeholder="Nom" id="nomApprenti" type="text" class="validate" required />
                <label for="nomApprenti">Nom</label>
            </div>
            <div class="input-field col s6">
                <input placeholder="Nom" id="prenomApprenti" type="text" class="validate" required />
                <label for="prenomApprenti">Prénom</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input placeholder="Date de naissance" id="dateNaissanceApprenti" type="text" class="validate" pattern="[0-9]{2}\/[0-9]{2}\/[12]{1}[0-9]{3}" required />
                <label for="dateNaissanceApprenti">Date de naissance - exemple : 20/02/1994</label>
            </div>
            <div class="input-field col s6">
                <input placeholder="Lieu de naissance" id="lieuNaissanceApprenti" type="text" class="validate" required />
                <label for="lieuNaissanceApprenti">Lieu de naissance</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">location_city</i>
                <input placeholder="Adresse" id="adresseApprenti" type="text" class="validate" required />
                <label for="adresseApprenti">Adresse</label>
            </div>
            <div class="input-field col s6">
                <input placeholder="Complément d'adresse" id="complementAdApprenti" type="text" class="validate" />
                <label for="complementAdApprenti">Complément d'adresse</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input placeholder="Code postal" id="cpApprenti" type="text" class="validate" pattern="[0-9]{5}" required />
                <label for="cpApprenti">Code postal</label>
            </div>
            <div class="input-field col s6">
                <input placeholder="Ville" id="villeApprenti" type="text" class="validate" required />
                <label for="villeApprenti">Ville</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
                <i class="material-icons prefix">email</i>
                <input placeholder="Email" id="mailApprenti" type="email" class="validate" required />
                <label for="mailApprenti">Email</label>
            </div>
            <div class="input-field col s4">
                <i class="material-icons prefix">phone</i>
                <input placeholder="Téléphone" id="telApprenti" type="tel" class="validate" pattern="0[0-9]{9}" required />
                <label for="telApprenti">Téléphone</label>
            </div>
            <div class="input-field col s4">
                <i class="material-icons prefix">phonelink_ring</i>
                <input placeholder="Portable" id="portApprenti" type="tel" class="validate" pattern="0[6-7]{1}[0-9]{8}" required />
                <label for="portApprenti">Portable</label>
            </div>
        </div>
    </form>
    <form class="col s6">
        <div class="row">
            <div class="input-field col s6"></div>
        </div>
    </form>
</div>
