<?php
if (isset($_POST['email'])) {
    $email  = mysqli_real_escape_string($conn, $_POST['email'])
    $sala   = mysqli_real_escape_string($conn, $_POST['sala'])

    $sql = "SELECT * FROM kayttajat WHERE sahkoposti = '$email'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck == 0) {
        $_SESSION['virhe'] = "Sähköposti-osoite ei löydy palvelusta";
        echo ' <script>
        location.replace("index.php")
        </script>';
        exit();     // jos refresh ei toimi niin lopetetaan PHP/SQL joka tapauksessa
    } else {
        // jos käyttjä löytyy, niin tarkistetaan salasanan oikeellisuus
        if ($row = mysqli_fetch_assoc($result)) {
            $salasananmuunnos = password_verify($sala, $row['salasana']);
            if ($salasananmuunnos == FALSE) {
                $_SESSION['virhe'] = "Virheellinen salasana";
                echo ' <script>
                location.replace("index.php")
                </script>';
            } else if ($salasananmuunnos == TRUE) {
                
                $_SESSION['sampyla_logged_user'] = $email;

                $rooli = $row['rooli'];
                if ($rooli == 0) {
                    echo '<script>
                    location.replace("order_student.php")
                    </script>'
                } else {
                    echo '<script>
                    location.replace("order_teacher.php")
                    </script>'
                }
            }
        }
    }
}
?>