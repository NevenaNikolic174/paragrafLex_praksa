<div class="container mt-5">
</br>
    <h3>Prijava za putno osiguranje</h3>
    </br>

    <form id="formaOsiguranja" method="post" action="obradi_formu.php">

        <div class="form-group">
            <label for="imePrezime">Nosilac osiguranja (Ime i Prezime)<span>*</span></label>
            <input type="text" class="form-control" id="imePrezime" name="imePrezime" >
            <div id="imePrezimeError" class="text-danger"></div>
        </div>

        <div class="form-group">
            <label for="datumRodjenja">Datum rođenja<span>*</span></label>
            <input type="date" class="form-control" id="datumRodjenja" name="datumRodjenja" >
            <div id="datumRodjenjaError" class="text-danger"></div>

        </div>
        <div class="form-group">
            <label for="brojPasosa">Broj pasoša<span>*</span></label>
            <input type="text" class="form-control" id="brojPasosa" name="brojPasosa" >
            <div id="brojPasosaError" class="text-danger"></div>

        </div>
        <div class="form-group">
            <label for="telefon">Telefon</label>
            <input type="phone" class="form-control" id="telefon" name="telefon"> 
            <div id="telefonError" class="text-danger"></div>   
        </div>
        <div class="form-group">
            <label for="email">Email<span>*</span></label>
            <input type="email" class="form-control" id="email" name="email" >
            <div id="emailError" class="text-danger"></div>
        </div>
        <div class="form-group">
            <label for="">Datum putovanja (OD)<span>*</span></label>
            <input type="text" class="form-control" id="datumOd" name="datumOd" >

            <label for="">Datum putovanja (DO)<span>*</span></label>
            <input type="text" class="form-control" id="datumDo" name="datumDo" >
            <div id="datumOdDoError" class="text-danger"></div>

            <div id="brojDana"></div>

        </div>
        <div class="form-group">
            <label for="vrstaOsiguranja">Odabir vrste polise osiguranja<span>*</span></label>
            <select class="form-control" id="vrstaOsiguranja" name="vrstaOsiguranja" >
                <option value="0">Izaberi</option>
                <option value="1">Individualno</option>
                <option value="2">Grupno</option>
            </select>

            <div id="dodatnaLica" style="display: none;">
                <h4>Dodatna lica</h4>
                <div class="form-group">
                    <label for="imePrezimeDodatno">Ime i Prezime<span>*</span></label>
                    <input type="text" class="form-control" id="imePrezimeDodatno" name="imePrezimeDodatno">
                    <div id="imePrezimeDodatnoError" class="text-danger"></div>
                </div>
                <div class="form-group">
                    <label for="datumRodjenjaDodatno">Datum rođenja<span>*</span></label>
                    <input type="date" class="form-control" id="datumRodjenjaDodatno" name="datumRodjenjaDodatno">
                    <div id="datumRodjenjaDodatnoError" class="text-danger"></div>
                </div>
                <div class="form-group">
                    <label for="brojPasosaDodatno">Broj pasoša<span>*</span></label>
                    <input type="text" class="form-control" id="brojPasosaDodatno" name="brojPasosaDodatno">
                    <div id="brojPasosaDodatnoError" class="text-danger"></div>
                </div>
           </div>

            <div id="vrstaOsiguranjaError" class="text-danger"></div>
        </div>
        <button type="button" id="dugmePotvrda" name="dugmePotvrda" class="btn btn-info">Potvrdi prijavu</button>
    </form>
    <div id="response"></div>
</div>


