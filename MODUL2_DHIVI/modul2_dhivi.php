<?php
// tangkap nilai MK_KI1201, MK_KU1202, dan MK_KU1102 yang ada pada form html
// silakan taruh code kalian di bawah
// **********************  1  ************************** 
if ($_POST) {
    $MK_KI1201 = $_POST["MK_KI1201"];
    $MK_KU1202 = $_POST["MK_KU1202"];
    $MK_KU1102 = $_POST["MK_KU1102"];
}
// **********************  1  ************************** 


// buatkan sebuah perkondisian  
// jika MK_KI1201 atau MK_KU1202 atau MK_KU1102 kosong maka akan muncul pesan error
// silakan taruh code kalian di bawah
// **********************  2  ************************** 
if (empty($MK_KI1201) || empty($MK_KU1202) || empty($MK_KU1102)) {
    $error = "Mohon isi semua opsi";
}
// **********************  2  ************************** 


// buatkanlah perkondisian jika nilainya memenuhi akan mendapatkan peminatan yang sesuai di jurnal, 
// Untuk nilai peminatan sesuai dengan kondisi yang tertera pada jurnal
// silakan taruh code kalian di bawah
// **********************  3  ************************** 
    // if (($MK_KU1202 == "AB" || $MK_KU1202 == "A") && ($MK_KU1102 == "B" || $MK_KU1102 == "AB" ||$MK_KU1102 == "A")) {
    //     if ($MK_KI1201 == "A") {
    //         $hasil = "Anda dapat mengambil mata kuliah Kimia Umum dan mata kuliah Kimia Pangan";
    //     } else {
    //         $hasil = "Anda dapat mengambil mata kuliah Kimia Pangan";
    //     }
        
    // } elseif (!(($MK_KU1202 == "AB" || $MK_KU1202 == "A") && ($MK_KU1102 == "B" || $MK_KU1102 == "AB" ||$MK_KU1102 == "A"))){
    //     if ($MK_KI1201 == "A") {
    //         $hasil = "Anda dapat mengambil mata kuliah Kimia Umum";
    //     } else {
    //         $hasil = "Anda tidak dapat mengambil mata kuliah Kimia apapun";
    //     }
    // }
// **********************  3  ************************** 

//Logic versi 2
if (($MK_KU1202 == "AB" || $MK_KU1202 == "A") && ($MK_KU1102 == "B" || $MK_KU1102 == "AB" ||$MK_KU1102 == "A")) {
    $kimia_pangan = "Anda bisa mengambil mata kuliah Kimia Pangan";
} else {
    $kimia_pangan = "Anda tidak bisa mengambil mata kuliah Kimia Pangan";
}

if ($MK_KI1201 == "A") {
    $kimia_umum = "Anda dapat mengambil mata kuliah Kimia Umum";
} else {
    $kimia_umum = "Anda tidak dapat mengambil mata kuliah Kimia Umum";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peminatan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Pilih Peminatan
                </div>
                <div class="card-body">
                <h3>Masukkan nilai mata kuliah anda pada form dibawah ini</h3>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="MK_KI1201" class="form-label">MK_KI1201</label>
                            <select class="form-select" id="MK_KI1201" name="MK_KI1201" aria-label="Default select example">
                                <option selected value="">Masukkan Nilai</option>
                                <option value="A">A</option>
                                <option value="AB">AB</option>
                                <option value="B">B</option>
                                <option value="BC">BC</option>
                                <option value="C">C</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="MK_KU1202" class="form-label">MK_KU1202</label>
                            <select class="form-select" id="MK_KU1202" name="MK_KU1202" aria-label="Default select example">
                                <option selected value="">Masukkan Nilai</option>
                                <option value="A">A</option>
                                <option value="AB">AB</option>
                                <option value="B">B</option>
                                <option value="BC">BC</option>
                                <option value="C">C</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="MK_KU1102" class="form-label">MK_KU1102</label>
                            <select class="form-select" id="MK_KU1102" name="MK_KU1102" aria-label="Default select example">
                                <option selected value="">Masukkan Nilai</option>
                                <option value="A">A</option>
                                <option value="AB">AB</option>
                                <option value="B">B</option>
                                <option value="BC">BC</option>
                                <option value="C">C</option>
                            </select>
                        </div>
                        <div class="submit">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </form>

                    <?php
                    // Hasil dari peminatan yang didapatkan taruh di sini yaaa!!
                    
                    // silakan taruh code kalian di bawah 
                    //  **********************  4  **************************     
                    if (!empty($error)) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }  
                    //  **********************  4  **************************     


                    // Hasil pesan error nya taruh di sini yaaa!!   
                    // silakan taruh code kalian di bawah 
                    //  **********************  5  **************************     
                    elseif (!empty($kimia_pangan && $kimia_umum)) {
                        echo "<div class='alert alert-success'>Mata Kuliah Kimia Pangan: $kimia_pangan</div>";
                        echo "<div class='alert alert-success'>Mata Kuliah Kimia Umum: $kimia_umum</div>";
                    }
                    //  **********************  5  **************************     
                    ?>

                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>