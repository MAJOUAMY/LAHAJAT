<?php
require_once "connect.php";
try {
    $limit = 4;
    $sql = "SELECT word_id,word from article ORDER BY RAND() LIMIT :limit";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();

    $resaults = $stmt->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAHAJAT</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" defer crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@300;500;600;700;800;900&family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <script src="main.js" defer></script>
</head>

<body>

    <header class="container-fluid d-flex justify-content-center align-items-center flex-column p-5">
        <!-- <a class="h2 logo" href=""></a> -->
        <p class=" text-center "> استكشف التنوع اللغوي: لهجات العرب  </p>
    </header>
    <div class="main container-fluid  px-5">
        <div class="row pt-5">
            <div class="right col-lg-6 ps-lg-5">
                <div class="search-form">
                    <div class="word">
                        <input class="form-control " type="text" id="searchQuery" name="searchQuery" placeholder="  ابحث عن عبارة">
                        <div class="search-resault">

                        </div>
                    </div>
                    <button type="submit"><i class="bi bi-search"></i></button>
                </div>
                <div class=" pub  mt-3 bg-light rounded-3 ">
                    <!-- <img src="pub.png" alt=""> -->
                </div>
                <table class="table  randTable mt-3 bg-light ">

                    <?php
                    foreach ($resaults as $record) {
                        echo "<tr><td><a href=\"def.php?word=$record->word\">$record->word</a></td></tr>";
                    }

                    ?>

                </table>
            </div>
            <div class="col-lg-6 pe-lg-5">
                <p class="lead text-lg-end  my-3 m-lg-0 text-center text-secondary ">أضف عبارات إلى القاموس</p>
                <div class="msg">

                </div>
                <form method="post" class="insert-form">
                    <input type="text" class="form-control" id="word" placeholder=" العبارة">
                   <select class="form-select mt-4" id="countrySelect">
                        <option value="" name="">اختر دولة عربية</option>
                        <option value="المغرب" name="Morocco">المغرب</option>
                        <option value="الجزائر" name="Algeria">الجزائر</option>
                        <option value="البحرين" name="Bahrain">البحرين</option>
                        <option value="جيبوتي" name="Djibouti">جيبوتي</option>
                        <option value="مصر" name="Egypt">مصر</option>
                        <option value="الإمارات العربية المتحدة" name="United Arab Emirates">الإمارات العربية المتحدة</option>
                        <option value="العراق" name="Iraq">العراق</option>
                        <option value="الأردن" name="Jordan">الأردن</option>
                        <option value="الكويت" name="Kuwait">الكويت</option>
                        <option value="لبنان" name="Lebanon">لبنان</option>
                        <option value="ليبيا" name="Libya">ليبيا</option>
                        <option value="موريتانيا" name="Mauritania">موريتانيا</option>
                        <option value="عمان" name="Oman">عمان</option>
                        <option value="فلسطين" name="Palestine">فلسطين</option>
                        <option value="قطر" name="Qatar">قطر</option>
                        <option value="السعودية" name="Saudi Arabia">السعودية</option>
                        <option value="الصومال" name="Somalia">الصومال</option>
                        <option value="السودان" name="Sudan">السودان</option>
                        <option value="سوريا" name="Syria">سوريا</option>
                        <option value="تونس" name="Tunisia">تونس</option>
                        <option value="اليمن" name="Yemen">اليمن</option>
                    </select>



                    <textarea class="form-control mt-3" placeholder="المعنى" id="meaning"></textarea>


                    <button type="submit" class="btn btn-dark mt-3 mx-auto">أضف <i class="bi bi-plus-lg"></i></button>

                </form>

            </div>
        </div>
    </div>
    <a href="" class="text-secondary miloud">developped by AJOUAMY Miloud</a>
</body>
<!-- salam -->

</html>