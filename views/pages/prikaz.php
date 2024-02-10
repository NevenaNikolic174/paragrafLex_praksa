<?php
$dohvatiPodatke = dohvati('nosilac');
?>
<div class="container mt-5">
    <h2>Prikaz podataka:</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Datum unosa polise</th>
                    <th>Ime i prezime nosioca</th>
                    <th>Datum rođenja</th>
                    <th>Broj pasoša</th>
                    <th>Email</th>
                    <th>Datum putovanja od</th>
                    <th>Datum putovanja do</th>
                    <th>Broj dana</th>
                    <th>Induvidualno / Grupno osiguranje</th>
                    <th>Akcija</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dohvatiPodatke as $red): ?>
                    <tr>
                        <td><?php echo date_format(new DateTime($red->created_at), 'd. m. Y.'); ?></td>
                        <td><?php echo $red->ime_prezime; ?></td>
                        <td><?php echo date_format(new DateTime($red->datum_rodjenja), 'd. m. Y.'); ?></td>
                        <td><?php echo $red->broj_pasos; ?></td>
                        <td><?php echo $red->email; ?></td>
                        <td><?php echo date_format(new DateTime($red->datum_od), 'd. m. Y.'); ?></td>
                        <td><?php echo date_format(new DateTime($red->datum_do), 'd. m. Y.'); ?></td>
                        <td>
                            <?php
                                $datum_od = new DateTime($red->datum_od);
                                $datum_do = new DateTime($red->datum_do);
                                $razlika = $datum_od->diff($datum_do);
                                echo $razlika->days;
                            ?>
                        </td>

                        <td><?php echo ($red->id_polisa === "1") ? "Individualno" : "Grupno"; ?></td>
                        <td>
                            <?php if ($red->id_polisa === "2"): ?>
                                <button class="btn btn-primary prikazi-dodatna-lica"  data-id-nosilac="<?php echo $red->id_nosilac; ?>">Prikaži dodatna lica</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr class="dodatna-lica-red" style="display: none;">
                        <td colspan="10">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Ime i prezime dodatnog lica</th>
                                        <th>Datum rođenja dodatnog lica</th>
                                        <th>Broj pasoša dodatnog lica</th>
                                    </tr>
                                </thead>
                                <tbody class="dodatna-lica-tbody">
                                    <!-- dinamicki ispis iz JS -->
                                </tbody>
                            </table>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
