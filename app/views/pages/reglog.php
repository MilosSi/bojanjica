<div class="container" style="margin: 50px auto">
    <div class="row">
        <div class="col-md-5">
            <p>Prijavi se</p>
            <form action="index.php?page=logovanje_logika" method="post" class="bg-white  contact-form" onsubmit="return proveraLogin()">
                <div class="form-group">
                    <input type="email" id="emailLogin" name="emailLogin" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" id="lozinkaLogin" name="lozinkaLogin" class="form-control" placeholder="Lozinka">
                </div>
                <div class="form-group">
                    <input type="submit" value="Uloguj se" class="btn btn-primary py-3 px-5" style="border-radius:0.25rem; ">
                </div>
            </form>
        </div>

        <div class="col-md-7  bl">
            <p>Registruj se</p>
            <form action="index.php?page=registracija_logika" method="post" onsubmit="return provera()" class="bg-white  contact-form">
                <div class="form-row">
                    <div class="form-group col-md-6">

                        <input type="text" class="form-control" id="ime" name="ime" placeholder="Ime">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="prezime" name="prezime" placeholder="Prezime">
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="lozinka" name="lozinka" placeholder="Lozinka">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">

                        <input type="text" class="form-control" id="grad" name="grad" placeholder="Grad">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="adresa" name="adresa" placeholder="Ulica i broj">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">

                        <input type="text" class="form-control" id="posbr" name="posbr" placeholder="Poštanski broj">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="telefon" name="telefon" placeholder="Telefon">
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Registruj se" class="btn btn-primary py-3 px-5" style="border-radius:0.25rem; ">
                </div>
            </form>
        </div>

    </div>
</div>