<?php
    global $mainFolderPath;
    include($mainFolderPath.'/modules/tb-pr-register.php');
?>
<div class="container" id="tb-pr-form-container">
    <form action="<?php echo get_rest_url(null, 'tb-pr/v1/registration/insert'); ?>" method="POST">
        <div class="card mb-3">
            <div class="card-header">
                <h5>Dane ogólne</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <label for="name-input" class="col-sm-2 col-form-label required">Imię</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name-input" name="name">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="last-name-input" class="col-sm-2 col-form-label required">Nazwisko</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="last-name-input" name="lastname">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pesel-input" class="col-sm-2 col-form-label required">PESEL (jeśli nadano)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pesel-input" name="pesel">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ekuz-input" class="col-sm-2 col-form-label required">nr EKUZ (jeśli nie nadano numeru PESEL)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ekuz-input" name="ekuz">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="birth-date-input" class="col-sm-2 col-form-label required">Data urodzenia</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="birth-date-input" name="birthday">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phone-number-input" class="col-sm-2 col-form-label required">Numer telefonu</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" id="phone-number-input" name="phonenumber" pattern="[0-9]{9}">
                    </div>
                </div>
                <div class="row mb-3">
                    <p class="required">Jestem: </p>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="my-life-status-input" id="input-priest" value="priest">
                            <label class="form-check-label" for="input-priest">Księdzem</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="my-life-status-input" id="input-nun" value="nun">
                            <label class="form-check-label" for="input-nun">Siostrą zakonną</label>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="my-life-status-input" id="input-cleric" value="cleric">
                            <label class="form-check-label" for="input-cleric">Klerykiem</label>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="my-life-status-input" id="input-monk" value="monk">
                            <label class="form-check-label" for="input-monk">Zakonnikiem</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="my-life-status-input" id="input-lay-person" value="lay" checked>
                            <label class="form-check-label" for="input-lay-person">Osobą świecką</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3 if-under-age d-none">
            <div class="card-header">
                <h5>Osoba nieletnia</h5>
            </div>
            <div class="card-body">
                <p>
                    Ponieważ jesteś osobą nieletnią, Twoi rodzice lub opiekunowie prawni muszą wypełnić 
                    <a href="<?php echo get_option('tb-pr-consent-under-age') ?>">zgodę uczestnictwa w pielgrzymce</a>
                    . 
                    Wypełnioną zgodę przynieś do osoby odpowiedzialnej za zapisy.
                </p>
                <p>
                    Dodatkowo podaj tutaj imię i nazwisko osoby będącej Twoim opiekunem na czas pielgrzymki.
                    Musi to być osoba, która będzie fizycznie uczestniczyła w pielgrzymce.
                </p>
                <div class="row mb-3">
                    <label for="guardian-name-input" class="col-sm-2 col-form-label required">Imię</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="guardian-name-input" name="guardianname">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="guardian-last-name-input" class="col-sm-2 col-form-label required">Nazwisko</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="guardian-last-name-input" name="guardianlastname">
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <h5>Dane parafii</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group mb-3">
                            <label for="parish-city-input" class="input-group-text required">Miasto</label>
                            <select class="form-select" id="parish-city-input" name="parishcityselect">
                                <?php
                                    $cities = get_terms('city', array('hide_empty' => 1));
                                    foreach($cities as $city)
                                    {
                                        echo "<option value='".$city->term_id."'>".$city->name."</option>";
                                    }
                                ?>
                                <option value="new">Inne</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group mb-3">
                            <label for="parish-input" class="input-group-text required">Parafia</label>
                            <select class="form-select" id="parish-input" name="parishselect">
                                <?php
                                    $parishes = get_posts([
                                        'post_type' => 'parish',
                                        'post_status' => 'publish',
                                        'numberposts' => -1
                                    ]);
                                    foreach($parishes as $parish)
                                    {
                                        echo "<option value='".$parish->ID."' class='".get_the_terms($parish->ID, 'city')[0]->term_id."-city parishes'>".$parish->post_title."</option>";
                                    }
                                ?>
                                <option value="new-parish" class="new-city">Mojej parafii nie ma na liście</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row new-parish d-none">
                    <h5>Dodawanie parafii, której nie ma na liście</h5>
                    <div class="col-sm-6">
                        <div class="input-group mb-3">
                            <label for="parish-city-new-input" class="input-group-text required">Miasto</label>
                            <input type="text" class="form-control" id="parish-city-new-input" name="parishcityadd">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group mb-3">
                            <label for="parish-new-input" class="input-group-text required">Parafia</label>
                            <input type="text" class="form-control" id="parish-new-input" name="parishadd">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <h5>Dane medyczne</h5>
            </div>
            <div class="card-body">
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" role="switch" id="in-case-of-emergency-switch" name='incaseofemergency'>
                    <label class="form-check-label required" for="in-case-of-emergency-switch">W razie zagrożenia życia wyrażam zgodę na leczenie szpitalne i wykonanie niezbędnych zabiegów lub operacji ratujących życie.</label>
                </div>
                <div class="mb-3">
                    <label for="long-term-illnesses-input" class="form-label">Choroby przewlekłe</label>
                    <textarea class="form-control" id="long-term-illnesses-input" rows="5" name="ilnesses"></textarea>
                </div>
                <div class="mb-3">
                    <label for="drugs-input" class="form-label">Stale przyjmowane leki</label>
                    <textarea class="form-control" id="drugs-input" rows="5" name="drugs"></textarea>
                </div>
                <div class="mb-3">
                    <label for="drugs-alergies-input" class="form-label">Alergie na leki</label>
                    <textarea class="form-control" id="drugs-alergies-input" rows="5" name="alergiestodrugs"></textarea>
                </div>
                <div class="mb-3">
                    <label for="insects-alergies-input" class="form-label">Alergie na owady</label>
                    <textarea class="form-control" id="insects-alergies-input" rows="5" name="alergiestoinsects"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="real-medical-data-switch" name='realmedicaldata'>
                    <label class="form-check-label required" for="real-medical-data-switch">Oświadczam, że podane dane medyczne są zgodne z prawdą i biorę za to pełną odpowiedzialność.</label>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <h5>Osoba upoważniona do kontaktu w sprawie stanu zdrowia oraz w przypadku zagrożenia życia</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <label for="medical-contact-name-input" class="col-sm-2 col-form-label">Imię</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="medical-contact-name-input" name="medicalcontactname">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="medical-contact-last-name-input" class="col-sm-2 col-form-label">Nazwisko</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="medical-contact-last-name-input" name="medicalcontactlastname">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="medical-contact-address-input" class="col-sm-2 col-form-label">Adres</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="medical-contact-address-input" rows="3" name="medicalcontactaddress"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="medical-contact-phone-input" class="col-sm-2 col-form-label">Telefon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="medical-contact-phone-input" name="medicalcontactphone">
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <h5>Informacje o pielgrzymce</h5>
            </div>
            <div class="card-body">
                <h5>Wybierz odcinki, na których będziesz uczestniczył w pielgrzymce:</h5>
                <div class="row mb-3 to-repeat" id="to-repeat">
                    <div class="col-sm-5">
                        <div class="input-group mb-3">
                            <label class="input-group-text required">Idę od</label>
                            <select class="form-select" name="stages[from][]">
                                <option value="pustkowo">Pustkowo - 25.07</option>
                                <option value="kamienpomorski">Kamień Pomorski - 26.07</option>
                                <option value="swinoujscie">Świnoujście - 26.07</option>
                                <option value="wolin">Wolin - 27.07</option>
                                <option value="stepnica">Stepnica - 28.07</option>
                                <option value="szczecin">Szczecin - 29.07</option>
                                <option value="stargard">Stargard - 30.07</option>
                                <option value="choszczno">Choszczno - 31.07</option>
                                <option value="bierzwnik">Bierzwnik - 01.08</option>
                                <option value="drezdenko">Drezdenko - 02.08</option>
                                <option value="sierakow">Sieraków - 03.08</option>
                                <option value="duszniki">Duszniki - 04.08</option>
                                <option value="steszew">Stęszew - 05.08</option>
                                <option value="srem">Śrem - 06.08</option>
                                <option value="borekwlkp">Borek Wlkp. - 07.08</option>
                                <option value="krotoszyn">Krotoszyn - 08.08</option>
                                <option value="czarnylas">Czarnylas - 09.08</option>
                                <option value="kepno">Kępno - 10.08</option>
                                <option value="skomlin">Skomlin - 11.08</option>
                                <option value="starokrzepice">Starokrzepice - 12.08</option>
                                <option value="kalej">Kalej - 13.08</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="input-group mb-3">
                            <label class="input-group-text required">Idę do</label>
                            <select class="form-select" name="stages[to][]">
                                <option value="kamienpomorski">Kamień Pomorski - 25.07</option>
                                <option value="wolin">Wolin - 26.07</option>
                                <option value="stepnica">Stepnica - 27.07</option>
                                <option value="szczecin">Szczecin - 28.07</option>
                                <option value="stargard">Stargard - 29.07</option>
                                <option value="choszczno">Choszczno - 30.07</option>
                                <option value="bierzwnik">Bierzwnik - 31.07</option>
                                <option value="drezdenko">Drezdenko - 01.08</option>
                                <option value="sierakow">Sieraków - 02.08</option>
                                <option value="duszniki">Duszniki - 03.08</option>
                                <option value="steszew">Stęszew - 04.08</option>
                                <option value="srem">Śrem - 05.08</option>
                                <option value="borekwlkp">Borek Wlkp. - 06.08</option>
                                <option value="krotoszyn">Krotoszyn - 07.08</option>
                                <option value="czarnylas">Czarnylas - 08.08</option>
                                <option value="kepno">Kępno - 09.08</option>
                                <option value="skomlin">Skomlin - 10.08</option>
                                <option value="starokrzepice">Starokrzepice - 11.08</option>
                                <option value="kalej">Kalej - 12.08</option>
                                <option value="czestochowa">Częstochowa - 13.08</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-danger remove-stage-button d-none" role="button" type="button"><strong>-</strong></button>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <button class="btn btn-success new-stage-button" role="button" type="button">Dodaj nowy etap</button>
                    </div>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="accept-regulations-switch" name='acceptregulations'>
                    <label class="form-check-label required" for="accept-regulations-switch">Akceptuję <a href="<?php echo get_permalink(esc_attr(get_option('tb-pr-regulations'))) ?>" target="_blank">regulamin</a> pielgrzymki.</label>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="i-want-t-shirt" name="iwanttshirt">
                            <label class="form-check-label" for="i-want-t-shirt">Chcę zakupić koszulkę pielgrzymkową</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group mb-3 t-shirt-size d-none">
                            <label class="input-group-text">Rozmiar koszulki</label>
                            <select class="form-select" name="tshirtsize">
                                <option value="s">S</option>
                                <option value="m">M</option>
                                <option value="l">L</option> 
                                <option value="xl">XL</option>
                                <option value="xxl">XXL</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-7">
                        <h5>Koszt pielgrzymki:</h5>
                        <table class="table table-hover table-bordered">
                            <tr>
                                <td>Koszt dnia marszu</td>
                                <td><?php echo get_option('tb-pr-cost-per-day', 0); ?> zł</td>
                            </tr>
                            <tr>
                                <td>Koszt obowiązkowego pakietu pielgrzyma</td>
                                <td><?php echo get_option('tb-pr-package-cost', 0); ?> zł</td>
                            </tr>
                            <tr>
                                <td>Koszt koszulki (dla chętnych)</td>
                                <td><?php echo get_option('tb-pr-t-shirt-cost', 0); ?> zł</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row mb-3">
                    <h5>
                        Opłatę można uiścić w dniu ruszenia z pielgrzymką u osoby zajmującej się zapisami lub przelewem na dane:
                    </h5>
                    <p>
                        Odbiorca: Fundacja „SZCZECIŃSKA”
                    </p>
                    <p>
                        Numer rachunku: 81 1750 0012 0000 0000 2691 4108
                    </p>
                    <p>
                        Tytuł przelewu: „Opłata za pielgrzymkę 2024 <span id="name-in-transfer-title">IMIĘ NAZWISKO</span>”
                    </p>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title">RODO</h5>
                <p class="card-text">ROZPORZĄDZENIE PARLAMENTU EUROPEJSKIEGO I RADY (UE) 2016/679 z dnia 27 kwietnia 2016 r. w sprawie ochrony osób fizycznych w związku z przetwarzaniem danych osobowych i w sprawie swobodnego przepływu takich danych oraz uchylenia dyrektywy 95/46/WE (ogólne rozporządzenie o ochronie danych)</p>
            </div>
            <div class="card-body">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="rodo-1-switch" name='rodo[][1]'>
                    <label class="form-check-label required" for="rodo-1-switch">
                        Wyrażam zgodę na przetwarzanie moich danych osobowych przez Szczecińską Pieszą 
                        pielgrzymkę na Jasną Górę oraz Fundację Szczecińską.
                    </label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="rodo-2-switch" name='rodo[][2]'>
                    <label class="form-check-label required" for="rodo-2-switch">
                        Wyrażam zgodę na przetwarzanie danych wrażliwych dotyczących mojego zdrowia.
                    </label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="rodo-3-switch" name='rodo[][3]'>
                    <label class="form-check-label required" for="rodo-3-switch">
                        Wyrażam zgodę na przetwarzanie moich danych w zakresie wizerunku i wykorzystanie ich na stronie szczecinska.pl, facebook/szczecinskapielgrzymka, kanał YouTube, Twitter.
                    </label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="rodo-4-switch" name='rodo[][4]'>
                    <label class="form-check-label required" for="rodo-4-switch">
                        Wyrażam zgodę na przetwarzanie moich danych (w tym wizerunku) w celach organizacji spotkań popielgrzymkowych oraz promocji pielgrzymki szczecińskiej.
                    </label>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <h5>Akcje</h5>
            </div>
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Zarejestruj się</button>
            </div>
        </div>
    </form>
</div>