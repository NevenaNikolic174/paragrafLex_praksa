$('#vrstaOsiguranja').change(function() {
    if ($(this).val() === '2') { 
        $('#dodatnaLica').show(); 
    } else {
        $('#dodatnaLica').hide(); 
    }
});

$(document).ready(function() {
    console.log('test');

    $(document).on('click', '#dugmePotvrda', function(){
        var brojGresaka = 0;
        var imePrezime = $("#imePrezime").val().trim();
        var regImePrezime = /^[a-zA-Z]+\s[a-zA-Z]+$/;

        //ime i prezime: 
        if(imePrezime == ""){
            $('#imePrezimeError').addClass('error');
            $('#imePrezimeError').html('Polje je obavezno.');
            brojGresaka++;
        } else if(!regImePrezime.test(imePrezime)){
            $('#imePrezimeError').addClass('error');
            $('#imePrezimeError').html('<p>Neispravan format. Primer: Pera Peric');
            brojGresaka++;
        } else {
            $('#imePrezimeError').removeClass('error');
            $('#imePrezimeError').html('');
        }

        //datum rodjenja:
        var datumRodjenja = $("#datumRodjenja").val();
        
        if(!datumRodjenja){
            $('#datumRodjenjaError').addClass('error');
            $('#datumRodjenjaError').html('Polje je obavezno.');
            brojGresaka++;
        }else {
            $('#datumRodjenjaError').removeClass('error');
            $('#datumRodjenjaError').html('');
        }

        //broj pasosa:
        var brojPasosa = $("#brojPasosa").val();
        var regBrojPasosa = /^[0-9]{9}$/;

        if(brojPasosa == ""){
            $('#brojPasosaError').addClass('error');
            $('#brojPasosaError').html('Polje je obavezno.');
            brojGresaka++;
        } else if(!regBrojPasosa.test(brojPasosa)){
            $('#brojPasosaError').addClass('error');
            $('#brojPasosaError').html('Neispravan format, potrebno je uneti 9 cifara.');
            brojGresaka++;
        } else {
            $('#brojPasosaError').removeClass('error');
            $('#brojPasosaError').html('');
        }

        //telefon:
        var telefon = $("#telefon").val();
        var regTelefon = /^06[0-9]{7,10}$/;

         if(telefon == ""){
            $('#telefonError').html('');
        } else if(!regTelefon.test(telefon)){
            $('#telefonError').addClass('error');
            $('#telefonError').html('Neispravan format. Primer: 061231123 ');
            brojGresaka++;
        } else {
            $('#telefonError').removeClass('error');
            $('#telefonError').html('');
        }

        //email:
        var email = $("#email").val();
        var regEmail = /^[a-z0-9.]+@(gmail\.com|yahoo\.com|outlook\.com)$/;

        if(email == ""){
            $('#emailError').addClass('error');
            $('#emailError').html('Polje je obavezno.');
            brojGresaka++;
        } else if(!regEmail.test(email)){
            $('#emailError').addClass('error');
            $('#emailError').html('Neispravan format. Primer: example.example1@gmail.com');
            brojGresaka++;
        } else {
            $('#emailError').removeClass('error');
            $('#emailError').html('');
        }

        //datumOd, datumDo:
        var datumOd = $('#datumOd').val();
        var datumDo = $('#datumDo').val();
        
        var regDatum = /^(0?[1-9]|[12]\d|3[01])\.(0?[1-9]|1[0-2])\.\d{4}\.$/;
        
        if (!datumOd || !datumDo) {
            $('#datumOdDoError').addClass('error');
            $('#datumOdDoError').html('Oba polja su obavezna.');
            brojGresaka++;
        } else if (!regDatum.test(datumOd) || !regDatum.test(datumDo)) {
            $('#datumOdDoError').addClass('error');
            $('#datumOdDoError').html('Neispravan format datuma. Primer: 01.01.1999.');
            brojGresaka++;
        } else {
            $('#datumOdDoError').removeClass('error');
            $('#datumOdDoError').html('');
        
            let deloviOd  = datumOd.split('.');
            let deloviDo  = datumDo.split('.');
            let pocetak = new Date(deloviOd[2], deloviOd[1] - 1, deloviOd[0]); 
            let kraj = new Date(deloviDo[2], deloviDo[1] - 1, deloviDo[0]); 
        
            if (pocetak > kraj) {
                $('#datumOdDoError').addClass('error');
                $('#datumOdDoError').html('Greska, prvi datum mora da bude stariji od drugog datuma.');
                brojGresaka++;
            } else {
                let brojDana = Math.floor((kraj - pocetak) / (1000 * 3600 * 24));
                $("#brojDana").html(`<p class="alert alert-success">Broj dana: ${brojDana}</p>`);
            }
        }
        
        //vrsta osiguranja:

        var vrstaOsiguranja = $("#vrstaOsiguranja").val();

        if(vrstaOsiguranja == 0){
            $('#vrstaOsiguranjaError').addClass('error');
            $('#vrstaOsiguranjaError').html('Morate izabrati stavku.');
            brojGresaka++;
        }else {
            $('#vrstaOsiguranjaError').removeClass('error');
            $('#vrstaOsiguranjaError').html('');
        }

        //dodatna lica:

        if (vrstaOsiguranja === "2") {
            var imePrezimeDodatno = $("#imePrezimeDodatno").val().trim();
            var datumRodjenjaDodatno = $("#datumRodjenjaDodatno").val();
            var brojPasosaDodatno = $("#brojPasosaDodatno").val();
            
            if(imePrezimeDodatno == ""){
                $('#imePrezimeDodatnoError').addClass('error');
                $('#imePrezimeDodatnoError').html('Polje je obavezno.');
                brojGresaka++;
            } else if(!regImePrezime.test(imePrezimeDodatno)){
                $('#imePrezimeDodatnoError').addClass('error');
                $('#imePrezimeDodatnoError').html('Neispravan format. Primer: Pera Peric');
                brojGresaka++;
            }else {
                $('#imePrezimeDodatnoError').removeClass('error');
                $('#imePrezimeDodatnoError').html('');
            }
            
            if(!datumRodjenjaDodatno){
                $('#datumRodjenjaDodatnoError').addClass('error');
                $('#datumRodjenjaDodatnoError').html('Polje je obavezno.');
                brojGresaka++;
            }else {
                $('#datumRodjenjaDodatnoError').removeClass('error');
                $('#datumRodjenjaDodatnoError').html('');
            }
            
            if(brojPasosaDodatno == ""){
                $('#brojPasosaDodatnoError').addClass('error');
                $('#brojPasosaDodatnoError').html('Polje je obavezno.');
                brojGresaka++;
            } else if(!regBrojPasosa.test(brojPasosaDodatno)){
                $('#brojPasosaDodatnoError').addClass('error');
                $('#brojPasosaDodatnoError').html('Neispravan format, potrebno je uneti 9 cifara.');
                brojGresaka++;
            } else {
                $('#brojPasosaDodatnoError').removeClass('error');
                $('#brojPasosaDodatnoError').html('');
            }

        }
        
        //slanje na server:
        if(brojGresaka == 0){

            let podaci = { 
                "imePrezime": imePrezime,
                "datumRodjenja": datumRodjenja,
                "brojPasosa": brojPasosa,
                "telefon": telefon,
                "email": email,
                "datumOd": datumOd,
                "datumDo": datumDo,
                "vrstaOsiguranja": vrstaOsiguranja,
                "imePrezimeDodatno": imePrezimeDodatno,
                "datumRodjenjaDodatno": datumRodjenjaDodatno,
                "brojPasosaDodatno": brojPasosaDodatno,

                "dugmePotvrda": true
            };

            $.ajax({
                url: "models/upis.php",
                method: "post",
                data: podaci,
                dataType: "json",
                success: function(response){
                    if(response.success){
                        $("#response").html(`<p class="alert alert-success">${response.message}</p>`);
                       
                    } else {
                        $("#response").html(`<p class="alert alert-danger">Error: ${response.message}</p>`);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    console.error(status);
                    console.error(error);
                    alert("Doslo je do greske prilikom slanja zahteva..." + xhr.responseText);
                }
            });
        }
    });
});

//dodatna lica prikaz:
$(document).ready(function() {
    $(document).on('click', '.prikazi-dodatna-lica', function() {
        let idNosilac = $(this).data('id-nosilac');
        let dodatnaLicaLista = $(this).closest('tr').next('.dodatna-lica-red').find('.dodatna-lica-tbody');

        $.ajax({
            url: "models/prikaz_dodatna_lica.php",
            method: "POST",
            data: { "idNosilac": idNosilac },
            dataType: "json",
            success: function(response) {
                prikaziDodatnaLica(response, dodatnaLicaLista);
            },
            error: function(xhr) {
                console.error(xhr);
            }
        });
    });
});

function prikaziDodatnaLica(niz, lista) {
    let html = "";
    if (niz.length == 0) {
        html += `<tr><td colspan="3">Trenutno nema dodatnih lica.</td></tr>`; //svakako se prikazuju podaci ako je osiguranje "Grupno", ali zbog dodatne sigurnosti sam ovo napisala.
    } else {
        niz.forEach(function(dodatno_lice) {
            
            let datum = new Date(dodatno_lice.datum_rodjenja);
            let formatiranDatum = ("0" + datum.getDate()).slice(-2) + "." + 
                                  ("0" + (datum.getMonth() + 1)).slice(-2) + 
                                   "." + datum.getFullYear();
            
            html += `<tr>
                        <td>${dodatno_lice.ime_prezime}</td>
                        <td>${formatiranDatum}</td> 
                        <td>${dodatno_lice.broj_pasosa}</td>
                    </tr>`;
        });
    }

    lista.html(html);
    lista.closest('.dodatna-lica-red').show();
}
