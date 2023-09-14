<!DOCTYPE html>
<html lang="de-CH">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="<?= ROOT_URL ?>/public/images/wrench.png">
    <title>Werkstatt</title>
    <base href="<?= ROOT_URL ?>/">
    <link rel="stylesheet" href="public/css/app.css?ver=1.5">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Icons (fontawesome) -->
    <script src="https://kit.fontawesome.com/75d5cdc9c3.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Werkstatt
                <svg class="wrench-icon" width="37" height="37" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" overflow="hidden"><defs><clipPath id="clip0"><rect x="0" y="0" width="37" height="37"/></clipPath></defs><g clip-path="url(#clip0)"><path d="M25.4326 36.5264C24.0817 36.2976 22.795 35.5542 21.9444 34.5035 21.5227 33.996 21.0152 32.9881 20.8293 32.309 20.7221 31.9087 20.7007 31.437 20.6792 28.735L20.6506 25.6256 15.8185 20.7864 10.9865 15.9472 7.86998 15.9186C4.35313 15.8901 4.33169 15.8901 3.18087 15.3325 1.74412 14.632 0.679063 13.3739 0.207292 11.7942 0.0571843 11.2867 0.0428882 11.108 0.014296 8.47754 0 6.94072 0.007148 5.58262 0.0357401 5.45392 0.100072 5.11798 0.457473 4.73198 0.793429 4.64619 1.35097 4.4961 1.43675 4.55329 3.53827 6.64049 5.76846 8.85639 5.92571 8.97077 6.8335 8.97077 8.40608 8.96361 9.43536 7.341 8.77061 5.90427 8.6062 5.54686 8.27026 5.17517 6.64049 3.53827 4.55329 1.43675 4.4961 1.35097 4.64619 0.793429 4.73198 0.457473 5.11798 0.100072 5.45392 0.0357401 5.58262 0.007148 6.94072 0 8.47754 0.014296 11.108 0.0428882 11.2867 0.0571843 11.7942 0.207292 13.9887 0.864911 15.5469 2.66621 15.8686 4.89639 15.9043 5.17517 15.9401 6.65481 15.9401 8.18448L15.9401 10.9722 20.7864 15.8114 25.6256 20.6506 28.735 20.6792C32.2447 20.7078 32.2661 20.7078 33.417 21.2653 34.8537 21.9659 35.9188 23.2239 36.3905 24.8036 36.5406 25.3111 36.555 25.4898 36.5835 28.1203 36.5978 29.6571 36.5907 31.0152 36.5621 31.1439 36.462 31.68 35.8259 32.0946 35.2898 31.9802 35.1182 31.9445 34.5821 31.4584 33.0881 29.9788 31.4227 28.3276 31.0581 27.9916 30.6936 27.8272 29.2568 27.1625 27.6342 28.1846 27.6271 29.7643 27.6271 30.6721 27.7414 30.8294 29.9573 33.0595 32.0374 35.1611 32.1017 35.2468 31.9587 35.7973 31.873 36.0975 31.5942 36.4048 31.2868 36.5192 31.051 36.6121 25.9616 36.6121 25.4326 36.5264Z" fill="#000000" fill-rule="nonzero" fill-opacity="1" transform="matrix(1 0 0 -1 0 36.5978)"/></g></svg>
            </h1>
            <!-- Animation folgt...-->
            <!-- Versschiedene Funktionen -->
            <div class="filter">
                <a class="button" href="werkstatt">Aufträge</a>
                <a class="button" href="werkstatt?filter=offene_auftraege">Offene Aufträge</a>
                <a class="button" href="werkstatt?filter=archive">Abgeschlossene Aufträge</a>
                <?php if($filter != 'archive') echo '<a class="button" onclick="toggleContent(\'.auftrag input[name=mehrfachauswahl]\');toggleContent(\'.saveAuftraege\');">Mehrfachauswahl</a>'; ?>
            </div>
        </div>
        <!-- Auflistung -->
        <div class="auftrag auftragTitel" style='animation-delay:0s;'>
            <p>Name</p>
            <p>Dringlichkeit</p>
            <p>Status</p>
            <p>Frist</p>
        </div>
        <div>
            <?php foreach($auftraege as $auftrag) {echo $auftrag;} ?>
        </div>
        <!-- Fehler Anzeige -->
        <div class='fehler' style='display:none;' onclick="$(this).css('display', 'none')"><ul id='fehler'></ul></div>
        <!-- Mehrfachauswahl-Speichern und erfassen button -->
        <div class="newAuftrag" onclick="newAuftrag();"><i class="fa-solid fa-plus"></i></div>
        <div class="saveAuftraege" onclick="editAuftragStatus();"><i class="fa-solid fa-check-double"></i></div>
        <!-- Formulare Hintergrund -->
        <div class="transparentBg" onclick="closeContent('.newAuftragContent');closeContent('.transparentBg');closeContent('.editAuftragContent');"></div>
        <!-- Erfassungsformular -->
        <form method="POST">
            <div class="auftragContent newAuftragContent">
                <h2>Auftrag erfassen</h2>
                <label>Name: <input type="text" name="name" value="" required></input></label>
                <label>Email: <input type="text" name="email" value="" required></input></label>
                <label>Werkzeug: <input type="text" list="werkzeuge" name="werkzeug" value="" required></input></label>
                <label>Telefonnummer: <input type="text" name="kontakt" value="" required></input></label>
                <label>Dringlichkeit: <select name="dringlichkeit" required>
                    <option value="sehr tief">Sehr tief</option>
                    <option value="tief">Tief</option>
                    <option value="normal" selected>Normal</option>
                    <option value="hoch">Hoch</option>
                    <option value="sehr hoch">Sehr hoch</option>
                </select></label>
                <div class="cleanFormular"></div>
                <button type="button" name="newAuftrag" onclick="addAuftrag();">Erfassen</button>
                <button type="button" onclick="closeContent('.newAuftragContent');closeContent('.transparentBg');">Abbrechen</button>
            </div>
        </form>
        <!-- Bearbeitungsformular -->
        <form method="POST">
            <div class="auftragContent editAuftragContent">
                <h2>Auftrag bearbeiten</h2>
                <label>Name: <input type="text" name="name" value="" required></input></label>
                <label>Email: <input type="text" name="email" value="" required></input></label>
                <label>Werkzeug: <input type="text" list="werkzeuge" name="werkzeug" value="" required></input></label>
                <label>Telefonnummer: <input type="text" name="kontakt" value="" required></input></label>
                <label>Status: <select name="status" required>
                    <option value="abgeschlossen">Abgeschlossen</option>
                    <option value="pendent">Pendent</option>
                </select></label>
                <label style="display: none;">ID: <input type="number" name="id" value="" required/></label>
                <div class="cleanFormular"></div>
                <button type="button" name="editAuftrag" onclick="editAuftrag2();">Bearbeiten</button>
                <button type="button" onclick="closeContent('.editAuftragContent');closeContent('.transparentBg');">Abbrechen</button>
            </div>
        </form>
    </div>
    <!-- Werkzeuge Datalist -->
    <datalist id="werkzeuge">
        <?php foreach($werkzeuge as $werkzeug) echo $werkzeug; ?>
    </datalist>

    <script src="public/js/app.js"></script>
</body>
</html>
