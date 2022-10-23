<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="style.css"> --->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>


<body>

    <div class="container mt-5 ">
        <div class="card">
            <div class="card-body ">
                <div class="row">
                    <div class="col-auto">
                        <h1>Pernyataan Gabungan</h1>
                        <p>-</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <form class="row g-3 mt-3" action="" method="post">
                            <div class="row">
                                <div class="col">
                                    <input name="value1" type="number" class="form-control" placeholder="Masukan Value Pertama" aria-label="First name" min="0" max="1">
                                </div>
                                <div class="col">
                                    <input name="value2" type="number" class="form-control" placeholder="Masukan Value Kedua" aria-label="Last name" min="0" max="1">
                                </div>
                                <p style="color: red;">* Isi Value pertama & kedua dengan angka 1 (true / +) atau 0
                                    (false / - )</p>
                                <p style="color: red;">* Untuk Operator NOT hanya isi dengan satu value saja</p>
                            </div>
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">Pilih Operator</label>
                                <select name="operator" id="inputState" class="form-select">
                                    <option selected>Pilih...</option>
                                    <option value="and">Konjungsi</option>
                                    <option value="or">Disjungsi</option>
                                    <option value="not">Negasi</option>
                                    <option value="notor">Jointdenial (Not OR)</option>
                                    <option value="notand">Not And</option>
                                    <option value="exor">Exclusive OR</option>
                                    <option value="exnor">Exclusive NOR</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-5 mb-5">
            <div class="card-body p-3">
                <h3>Hasil :</h3>
            </div>
            <?php
            if (isset($_POST['submit'])) : ?>

                <div class="row m-3">
                    <div class="alert alert-primary" role="alert">
                        <?php
                        if ($_POST['operator'] == "or") {
                            $hasil = $_POST['value1'] || $_POST['value2'];
                            if ($hasil == true) {
                                echo "Hasil dari " . $_POST['value1'] . " v " . $_POST['value2'] . " = 1";
                            } elseif ($hasil == false) {
                                echo "Hasil dari " . $_POST['value1'] . " v " . $_POST['value2'] . " = 0";
                            } else {
                                echo "Ada yang salah!";
                            }
                        } elseif ($_POST['operator'] == "and") {
                            $hasil = $_POST['value1'] && $_POST['value2'];
                            if ($hasil == true) {
                                echo "Hasil dari " . $_POST['value1'] . " ∧ " . $_POST['value2'] . " = 1";
                            } elseif ($hasil == false) {
                                echo "Hasil dari " . $_POST['value1'] . " ∧ " . $_POST['value2'] . " = 0";
                            } else {
                                echo "Ada yang salah!";
                            }
                        } elseif ($_POST['operator'] == "not") {
                            $hasil = !$_POST['value1'];
                            if ($hasil == true) {
                                echo "Hasil dari ~" . $_POST['value1'] . " = 1";
                            } elseif ($hasil == false) {
                                echo "Hasil dari ~" . $_POST['value1'] . " = 0";
                            } else {
                                echo "Ada yang salah!";
                            }
                        } elseif ($_POST['operator'] == "not") {
                            $hasil = !$_POST['value2'];
                            if ($hasil == true) {
                                echo "Hasil dari ~" . $_POST['value2'] . " = 1";
                            } elseif ($hasil == false) {
                                echo "Hasil dari ~" . $_POST['value2'] . " = 0";
                            } else {
                                echo "Ada yang salah!";
                            }
                        } elseif ($_POST['operator'] == "notor") { // Joindenial
                            $hasil = $_POST['value1'] || $_POST['value2'];
                            if (!$hasil == true) {
                                echo "Hasil dari ~(" . $_POST['value1'] . " v " . $_POST['value2'] . ") = 1";
                            } elseif (!$hasil == false) {
                                echo "Hasil dari ~(" . $_POST['value1'] . " v " . $_POST['value2'] . ") = 0";
                            } else {
                                echo "Ada yang salah!";
                            }
                        } elseif ($_POST['operator'] == "notand") {
                            $hasil = $_POST['value1'] && $_POST['value2'];
                            if (!$hasil == true) {
                                echo "Hasil dari ~(" . $_POST['value1'] . " ∧ " . $_POST['value2'] . ") = 1";
                            } elseif (!$hasil == false) {
                                echo "Hasil dari ~(" . $_POST['value1'] . " ∧ " . $_POST['value2'] . ") = 0";
                            } else {
                                echo "Ada yang salah!";
                            }
                        } elseif ($_POST['operator'] == "exor") { // ⊻
                            if ($_POST['value1'] == "1" && $_POST['value2'] == "1") {
                                echo "Hasil dari " . $_POST['value1'] . " ⊻ " . $_POST['value2'] . " = 0";
                            } elseif ($_POST['value1'] == "0" && $_POST['value2'] == "0") {
                                echo "Hasil dari " . $_POST['value1'] . " ⊻ " . $_POST['value2'] . " = 0";
                            } elseif ($_POST['value1'] == "1" && $_POST['value2'] == "0") {
                                echo "Hasil dari " . $_POST['value1'] . " ⊻ " . $_POST['value2'] . " = 1";
                            } elseif ($_POST['value1'] == "0" && $_POST['value2'] == "1") {
                                echo "Hasil dari " . $_POST['value1'] . " ⊻ " . $_POST['value2'] . " = 1";
                            } else {
                                echo "Ada yang salah!";
                            }

                            //$hasil = !$_POST['value1'] xor $_POST['value2'];
                            //if ($hasil == true) {
                            // echo "1";
                            //} elseif ($hasil == false) {
                            // echo "0";
                            //} else {
                            // echo "Ada yang salah!";
                            //}
                        } elseif ($_POST['operator'] == "exnor") {

                            if ($_POST['value1'] == "1" && $_POST['value2'] == "1") {
                                echo "Hasil dari ~(" . $_POST['value1'] . " ⊻ " . $_POST['value2'] . ") = 1";
                            } elseif ($_POST['value1'] == "0" && $_POST['value2'] == "0") {
                                echo "Hasil dari ~(" . $_POST['value1'] . " ⊻ " . $_POST['value2'] . ") = 1";
                            } elseif ($_POST['value1'] == "1" && $_POST['value2'] == "0") {
                                echo "Hasil dari ~(" . $_POST['value1'] . " ⊻ " . $_POST['value2'] . ") = 0";
                            } elseif ($_POST['value1'] == "0" && $_POST['value2'] == "1") {
                                echo "Hasil dari ~(" . $_POST['value1'] . " ⊻ " . $_POST['value2'] . ") = 0";
                            } else {
                                echo "Ada yang salah!";
                            }
                            //$hasil = $_POST['value1'] xor $_POST['value2'];
                            //if ($hasil == true) {
                            // echo "1";
                            //} elseif ($hasil == false) {
                            // echo "0";
                            //} else {
                            // echo "Ada yang salah!";
                            //}
                        }
                        ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>