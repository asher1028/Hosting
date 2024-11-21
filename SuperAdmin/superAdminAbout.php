<?php
include 'superAdminSessionStart.php';

if (!isset($_SESSION['superAdminUsername'])) {
  header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Parish of San Juan</title>
        <link rel="stylesheet" href="adminAbout2.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <?php include 'superAdminHeader.php'; ?>
        <div class='container-fluid'>
        <div class='row'>
            <div id="aboutDiv">
            <form>
                <h1 id="aboutLabel">About</h1>
                <div>
                    <div id="samplePic">
                        <img src="../Images/parokyaPic.png" id="parokyaPic">
                    </div>
                </div>
                    <div id="firstInfo">
                        <p class="info1st">Parokya ng San Juan Bautista is a Catholic church located in San Juan,</p>
                        <p class="info1st">Hagonoy, Bulacan. It is part of the Diocese of</p>
                        <p class="info1st">Malolos. It was established on 1947.</p>
                        <p class="info1st">The Parish Fiesta is celebrated every 24th day of June.</p>
                    </div>
                <h1 id="kasaysayanLabel">Kasaysayan ng Parokya</h1>
                <div id="secondInfo">
                    <p class="info2ndMini">Akda ni: Sherwin M. Antaran (Parokya ni San Juan Bautista)</p>
                    <p class="info2nd">Parokya ni San Juan Bautista Ang Parokya ni San Juan Bautista ay binubuong mga nayon ng</p>
                    <p class="info2nd">San Miguel Arkanghel, San Isidro (San Isidro Matanda), San Isidro Labrador (Tampok) at San Juan Bautista,</p>
                    <p class="info2nd">Hagonoy, Bulacan ay itinalaga noong Ika-23 ng Marso, 1948 bilang isang parokya sa pamamagitan ni</p>
                    <p class="info2nd">Lubhang Kgg. Michael J. O'Doherty, ika-27 Arsobispo ng Maynila. Nanungkulan bilang unang</p>
                    <p class="info2nd">Kura Paroko si Rdo. P. Elias Reyes at sinundan nina Rdo. P. Jose Ingco, Rdo. P. Serafin Riego De Dios,</p>
                    <p class="info2nd">Rdo. P. Antonio Borlongan at Rdo. P. Generoso Jimenez ay unti-unting ipinagawa</p>
                    <p class="info2nd">ang simbahang parokya na ito sa pakikipagtulungan ni Lubhang Kgg. Rufino Kardinal Santos,</p>
                    <p class="info2nd">ika-29 na Arsobispo ng Maynila at ng mga mamamayang may mabuting loob</p>
                    <p class="info2nd">sa parokya. At sa paglipas ng panahon, ang nasasakupan ng parokya ay lumawak na hanggang sa payak</p>
                    <p class="info2nd">na sitio ng Sapang Bundok na namimintuho sa Ina ng Laging Saklolo.</p>
                </div>
                <div id="thirdInfo">
                    <p class="info3rd">Dumaan na rin sa maraming pagsasaayos ang simbahan at mga bisitang nasasakupan nito,</p>
                    <p class="info3rd">ngunit pinanatiling orihinal ang arkitektura ng Simbahan, lalo na ang mga aspetong natatangi.</p>
                    <p class="info3rd">Kabilang dito ay ang malaking ukit nakahoy sa altar na Imahe ni San Juan habang Binibinyagan si</p>
                    <p class="info3rd">Hesukristo sa Ilog Jordan kasama ang Espiritu Santo na nag anyong kalapatina bumaba mula sa</p>
                    <p class="info3rd">langit. At katulad rin sa iba pang mga parokya sa iba't-ibang lugar.</p>
                    <p class="info3rd">Hindi rin matatawaran ang mga pagtulong ng mga mamamayan ng San Juan sa kanilang kontribusyon</p>
                    <p class="info3rd">sa pagtatatag at pangangalaga ng naturang simbahan, kabilang rito ay ang Pamilya Cruz,</p>
                    <p class="info3rd">sa pangunguna ng namayapa nang si</p>
                    <p class="info3rd">Doña Lourdes Lontoc-Cruz. Ang kanilang pamilya ay naging tagapagtangkilik ng</p>
                    <p class="info3rd">Parokya sa mahabang panahon at hanggang sa kasalukuyan at panalangin ng buong</p>
                    <p class="info3rd">sambayanan at mga mananampalataya ng Parokya ni San Juan Bautista.</p>
                    <p class="info3rd">Marami pa sanang katulad nila</p>
                    <p class="info3rd">ang ipanganak sa ating bayan at maging bukas ang</p>
                    <p class="info3rd">puso at isipan sa pagtulong at pagpapaunlad ng pagsamba sa ating</p>
                    <p class="info3rd">Panginoon, ang Diyos ng walang hanggan.</p>
                </div>
                <div id="fourthInfo">
                    <p class="info4th">Matapos ang maraming paring naglingkod, kasalukuyang Kura</p>
                    <p class="info4th">Paroko si Rdo. P. Melchor R. Ignacio, na siya ring CSA President ng Diocese of Malolos.</p>
                    <p class="info4th">Sa kanyang panunungkulan, sinimulan niya ang malaking pagbabago at</p>
                    <p class="info4th">pagsasaayos ng bahay dalanginan, ang</p>
                    <p class="info4th">kaniyang pinakamalaking proyekto sa kasalukuyan. Pagkatapos ng pagkukumpuni sa mga nasira</p>
                    <p class="info4th">na bubong at pasilidad sa pangunahing gusaling sambahan,</p>
                    <p class="info4th">ang pag papaganda ng parokya lalo na ang altar na pinag gaganapan ng banal na misa at</p>
                    <p class="info4th">pag papayos ng choir loft ay naisakatuparan.</p>
                </div>
                <div id="logosDiv" class="d-flex">
                    <div class="logoContainer">
                        <div id="logo1st">
                            <p class="label">The Official Logo of</p>
                            <p class="label">Parokya ng San Bautista</p>
                            <img src="../Images/logo1.png" id="logo1" class="logos">
                        </div>
                        <div id="logo3rd">
                            <p class="label">The Church Marker</p>
                            <img src="../Images/logo3.png" id="logo3" class="logos">
                        </div>
                    </div>
                    <div class="logoContainer">
                        <div id="logo2nd">
                            <p class="label">The Official Logo of</p>
                            <p class="label">Parokya ng San Bautista</p>
                            <img src="../Images/logo2.png" id="logo2" class="logos">
                        </div>
                        <div id="quickLinksSection">
                            <p class="label">Quick Links</p>
                            <a href="#" id="massScheduleLink" class="quickLinks">Mass Schedule</a>
                            <a href="../User/userBaptism.php" id="baptismLink" class="quickLinks">Baptism</a>
                            <a href="../User/userWedding.php" id="weddingLink" class="quickLinks">Wedding</a>
                            <a href="../User/userFuneral.php" id="funeralLink" class="quickLinks">Funeral</a>
                            <a href="../User/userContactUs.php" id="contactUsLink" class="quickLinks">Contact Us</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>  
        </div>
        </div>
    </body>
</html>