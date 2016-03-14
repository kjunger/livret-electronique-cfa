<nav class="grey lighten-5 blue-grey-text text-darken-4">
    <div class="row">
        <div class="col s12">
            <a href="#!" class="breadcrumb blue-grey-text text-darken-4">
                <?php echo $_GET['cat']; ?>
            </a>
            <?php if(!empty($_GET['view'])){
                echo '<a href="#!" class="breadcrumb blue-grey-text text-darken-4">'.$_GET['view'].'</a>';
            } ?>
        </div>
    </div>
</nav>
<div class="section">
    <h4>Insertion professionnelle & suivi des diplômés</h4>
    <div class="row">
        <form class="col s12 m6 l6">
            <div class="card large grey lighten-5">
                <div class="card-content grey-text text-darken-4">
                    <span class="card-title">Promotion <?php echo date('Y'); ?></span>
                    <p>A transmettre au responsable pédagogique</p>
                    <div class="row">
                        <div class="input-field col s12 m12 l6">
                            <i class="material-icons prefix">person</i>
                            <input placeholder="Nom" id="nomApprenti" type="text" class="validate" required />
                            <label for="nomApprenti">Nom</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <input placeholder="Prénom" id="prenomApprenti" type="text" class="validate" required />
                            <label for="prenomApprenti">Prénom</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l6">
                            <input placeholder="Date de naissance" id="dateNaissanceApprenti" type="text" class="validate" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)" required />
                            <label for="dateNaissanceApprenti">Date de naissance - exemple : 20/02/1994</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <input placeholder="Âge" id="ageApprenti" type="text" class="validate" required />
                            <label for="ageApprenti">Âge</label>
                        </div>
                    </div>
                    <div class="section">
                        <h6>Adresse personnelle (en dehors du cadre des études, p.ex. parents)</h6>
                        <div class="row">
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">location_city</i>
                                <input placeholder="Adresse" id="adressePersoApprenti" type="text" class="validate" required />
                                <label for="adresseApprenti">Adresse</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <input placeholder="Complément d'adresse" id="complementAdPersoApprenti" type="text" class="validate" />
                                <label for="complementAdApprenti">Complément d'adresse</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l6">
                                <input placeholder="Code postal" id="cpPersoApprenti" type="text" class="validate" pattern="[0-9]{5}" required />
                                <label for="cpApprenti">Code postal</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <input placeholder="Ville" id="villePersoApprenti" type="text" class="validate" required />
                                <label for="villeApprenti">Ville</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l4">
                            <i class="material-icons prefix">email</i>
                            <input placeholder="Email" id="mailApprenti" type="email" class="validate" required />
                            <label for="mailApprenti">Email</label>
                        </div>
                        <div class="input-field col s12 m12 l4">
                            <i class="material-icons prefix">phone</i>
                            <input placeholder="Téléphone" id="telApprenti" type="tel" class="validate" pattern="0[0-9]{9}" required />
                            <label for="telApprenti">Téléphone</label>
                        </div>
                        <div class="input-field col s12 m12 l4">
                            <i class="material-icons prefix">phonelink_ring</i>
                            <input placeholder="Portable" id="portApprenti" type="tel" class="validate" pattern="0[6-7]{1}[0-9]{8}" required />
                            <label for="portApprenti">Portable</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix">mode_edit</i>
                            <textarea id="diversApprenti" class="materialize-textarea"></textarea>
                            <label for="diversApprenti">Autres renseignements (réseau social, blog, portfolio...)</label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form class="col s12 m6 l6">
            <div class="card large grey lighten-5">
                <div class="card-content grey-text text-darken-4">
                    <span class="card-title"></span>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <form class="col s12 m12 l12">
            <div class="card grey lighten-5">
                <div class="card-content grey-text text-darken-4">
                    <span class="card-title">L'association des Anciens</span>
                    <p>Acceptez-vous l'inscription de ces données dans notre fichier des Anciens et à un éventuel contact entre votre composante et vous par la suite (transmission d'offres, information des Anciens, proposition de témoignage...) ?</p>
                </div>
                <div class="card-action">
                    <p>
                        <input type="checkbox" class="filled-in" id="inscriptionAnciensApp" />
                        <label for="inscriptionAnciensApp">Oui, je l'accepte.</label>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>