<a class="btn btn-light" href="#" data-toggle="modal" data-target="#creer-personnage">Créer un personnage</a>

<!-- MODAL -->
<div class="modal fade" id="creer-personnage" tabindex="-1" role="dialog" aria-labelledby="creer-personnage" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="btn-close d-flex justify-content-end pr-2 pt-1">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-header">
                <h5 class="modal-title mx-auto" id="creer-personnage">Créez votre personnage</h5>
            </div>
            <div class="modal-body mx-auto">
                <form action="processing/traitement-creation-personnage.php" method="post" autocomplete="off">
                    <div class="form-check-inline">
                        <div class="form-check">
                            <input class="form-check-input d-none" type="radio" name="classesPersonnage" id="warrior" value="warrior" checked>
                            <label class="form-check-label text-center" for="warrior">
                                <img class="classe-personnage d-block" src="assets/img/warrior.png" alt="warrior">
                                Guerrier
                            </label>
                        </div>
                    </div>
                    <div class="form-check-inline">
                        <div class="form-check">
                            <input class="form-check-input d-none" type="radio" name="classesPersonnage" id="wizard" value="wizard">
                            <label class="form-check-label text-center" for="wizard">
                                <img class="classe-personnage d-block" src="assets/img/wizard.png" alt="wizard">
                                Mage
                            </label>
                        </div>
                    </div>
                    <div class="form-check-inline">
                        <div class="form-check mb-5">
                            <input class="form-check-input d-none" type="radio" name="classesPersonnage" id="archer" value="archer">
                            <label class="form-check-label text-center" for="archer">
                                <img class="classe-personnage d-block" src="assets/img/archer.png" alt="archer">
                                Archer
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nickname">Son nom</label>
                        <input class="form-control" type="text" id="nickname" name="nickname" placeholder="Le nom de votre personnage">
                    </div>
                    <div class="form-group">
                        <label for="nickname">Ses points de vie </label>
                        <input class="form-control" type="number" id="nickname" name="nickname" value="100" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nickname">Sa force</label>
                        <input class="form-control" type="number" id="nickname" name="nickname" value="10" readonly>
                    </div>
                    <button type="submit" class="btn btn-dark" name="inscription">Créer mon perso</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- FIN MODAL -->