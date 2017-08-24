<main>
    <div class="container1">
        <div class="row z-depth-1">
            <div class="col s12">
                <h2 class="header" style="margin-bottom: 30px;">Nouvelle appui OPB (2/2) </h2>

                <form method="get" action="#!" style="margin-bottom: 20px;" class="container">
                    <div class="input-field inline col s12">
                        <input disabled value="FITAMA-II (code: 1637)" id="disabled" type="text" class="green-text col s10">
                        <label class="active" for="disabled">OPB</label>
                        <a href="<?php echo base_url(); ?>c_appui/appui_opb" class="waves-effect blue waves-light btn">modifier</a>
                    </div>
                    <div class="col s12">
                        <label for="date_appui">Date</label>
                        <input id="date_appui" type="date" class="datepicker">
                    </div>
                    <div class="input-field col s12">
                        <select>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                        <label class="grey-text">Type Appui</label>
                    </div>
                    <div class="input-field col s12">
                        Appui à partir  du groupe :
                        <input class="with-gap" name="groupe" type="radio" id="union"  />
                        <label class="grey-text" style="top: 0" for="union">UNION</label>
                        <input class="with-gap" name="groupe" type="radio" id="opr"  />
                        <label class="grey-text" style="top: 0" for="opr">OPR</label>
                        <input class="with-gap" name="groupe" type="radio" id="null"  />
                        <label class="grey-text" style="top: 0" for="null">AUCUNE</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" id="autocomplete-input" class="autocomplete">
                        <label for="autocomplete-input" class="label">UNION/OPR</label>
                    </div>
                    <h5 class="green-text">Objet/Nature de l'appui : </h5>
                    <div class="row">

                        <div class="input-field col s8">
                            <select class="browser-default">
                                <option value="" disabled selected>Choisir un objet/nature</option>
                                <option value="1">Engrais</option>
                                <option value="2">Semence</option>
                                <option value="3">Autre</option>
                            </select>
                        </div>
                        <div class="input-field col s2">
                            <select class="browser-default">
                                <option value="" disabled selected>Unité</option>
                                <option value="1">Kg</option>
                                <option value="2">T</option>
                                <option value="3">Nb</option>
                            </select>
                        </div>
                        <div class="input-field col s2">
                            <input id="qte" type="number" min="0" class="validate">
                            <label class="label" data-error="wrong" for="qte">Quantité</label>
                        </div>
                    </div>
                    <input type="submit" value="Valider" class="waves-effect green waves-light btn" style="margin-left: 0.75rem">
                </form>
            </div>
        </div>
    </div>
</main>
