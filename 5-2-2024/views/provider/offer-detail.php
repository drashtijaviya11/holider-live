<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Literata:opsz,
                wght@7..72,400;7..72,600;7..72,700;7..72,800;7..72,900&
                family=Livvic:wght@400;500;600;700&family=Lora:wght@400;600;700&
                family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main-section" id="main-s">
        <div class="header">

            <div class="drop-down">
                <div class="menu-drop">
                    <img class="menu-icon" src="images/menu.png" alt="">
                </div>
                <div class="drop-list">
                    <div class="balance-detail">
                        <h4>Balance: <span>200$</span></h4>
                    </div>
                    <div class="list-item">
                        <button class="voucher">
                            <img src="images/voucher-icon.png" alt="">
                            <div class="text">My Vouchers</div>                               
                        </button>

                        <button class="language">
                            <img src="images/spain-flag.png" alt="">    
                            <div class="text">English</div>
                        </button>

                        <button class="money">
                            <img src="images/dollar.png" alt="">
                            <div class="text">USD</div>
                        </button>

                        <button class="logout">
                            <img src="images/logout-icon.png" alt="">
                            <div class="text">Log Out</div>
                        </button>
                    </div>
                </div>
            </div>
            <div class="logo">
                <img src="images/logo.png" alt="">
            </div> 
            <div class="country">
                <button class="area" onclick="toggleDropdown()">
                    <div class="text">Area Name</div>
                    <img src="images/white-arrow.png" alt="">
                </button>
                <ul class="country-dd"  id="countryDropdown">
                    <li class="co-list">
                        <img class="c-img" src="flag-images/afghanistan.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Afghanistan')">Afghanistan</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/albania.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Albania')">Albania</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/albania.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Algeria')">Algeria</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Andorra.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Andorra')">Andorra</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Angola.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Angola')">Angola</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Antigua and Barbuda.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Antigua and Barbuda')">Antigua and Barbuda</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Argentina.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Argentina')">Argentina</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Armenia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Armenia')">Armenia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Australia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Australia')">Australia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Austria.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Austria')">Austria</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Azerbaijan.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Azerbaijan')">Azerbaijan</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Bahamas.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Bahamas, The')">Bahamas, The</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Bahrain.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Bahrain')">Bahrain</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Bangladesh.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Bangladesh')">Bangladesh</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Barbados.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Barbados')">Barbados</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Belarus.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Belarus')">Belarus</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Belgium.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Belgium')">Belgium</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Belize.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Belize')">Belize</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Benin.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Benin')">Benin</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Bosnia and Herzegovina.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Bosnia and Herzegovina')">Bosnia and Herzegovina</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Botswana.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Botswana')">Botswana</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Brazil.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Brazil')">Brazil</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Brunei.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Brunei')">Brunei</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Bulgaria.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Bulgaria')">Bulgaria</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Burkina Faso.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Burkina Faso')">Burkina Faso</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Burundi.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Burundi')">Burundi</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Cabo Verde.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Cabo Verde')">Cabo Verde</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Cambodia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Cambodia')">Cambodia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Cameroon.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Cameroon')">Cameroon</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Canada.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Canada')">Canada</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/CAR.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Central African Republic')">Central African Republic</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Chad.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Chad')">Chad</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Chile.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Chile')">Chile</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/China.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'China')">China</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Colombia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Colombia')">Colombia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Comoros.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Comoros')">Comoros</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Croatia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Croatia')">Croatia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Cuba.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Cuba')">Cuba</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Cyprus.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Cyprus')">Cyprus</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Czechia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Czechia')">Czechia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Denmark.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Denmark')">Denmark</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Djibouti.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Djibouti')">Djibouti</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Dominica.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Dominica')">Dominica</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Dominican Republic.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Dominican Republic')">Dominican Republic</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Ecuador.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Ecuador')">Ecuador</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Egypt.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Egypt')">Egypt</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/El Salvador.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'El Salvador')">El Salvador</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Equatorial Guinea.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Equatorial Guinea')">Equatorial Guinea</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Eritrea.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Eritrea')">Eritrea</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Estonia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Estonia')">Estonia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Eswatini.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Ethiopia')">Eswatini</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Fiji.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Fiji')">Fiji</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Finland.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Finland')">Finland</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/France.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'France')">France</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Gabon.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Gabon')">Gabon</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Gambia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'The Gambia')">The Gambia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Georgia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Georgia')">Georgia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Germany.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Germany')">Germany</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Ghana.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Ghana')">Ghana</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Greece.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Greece')">Greece</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Grenada.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Grenada')">Grenada</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Guatemala.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Guatemala')">Guatemala</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Guinea.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Guinea')">Guinea</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Guinea-Bissau.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Guinea-Bissau')">Guinea-Bissau</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Guyana.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Guyana')">Guyana</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Haiti.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Haiti')">Haiti</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Holy See.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Holy See')">Holy See</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Hungary.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Hungary')">Hungary</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Iceland.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Iceland')">Iceland</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/India.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'India')">India</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Indonesia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Indonesia')">Indonesia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Iran.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Iran')">Iran</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Iraq.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Iraq')">Iraq</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Ireland.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Ireland')">Ireland</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Israel.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Israel')">Israel</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Italy.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Italy')">Italy</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Jamaica.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Jamaica')">Jamaica</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Japan.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Japan')">Japan</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Jordan.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Jordan')">Jordan</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Kazakhstan.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Kazakhstan')">Kazakhstan</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Kenya.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Kenya')">Kenya</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Kiribati.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Kiribati')">Kiribati</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Kuwait.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Kuwait')">Kuwait</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Kyrgyzstan.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Kyrgyzstan')">Kyrgyzstan</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Laos.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Laos')">Laos</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Latvia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Latvia')">Latvia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Lebanon.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Lebanon')">Lebanon</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Lesotho.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Lesotho')">Lesotho</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Liberia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Liberia')">Liberia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Libya.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Libya')">Libya</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Liechtenstein.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Liechtenstein')">Liechtenstein</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Lithuania.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Lithuania')">Lithuania</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Luxembourg.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Luxembourg')">Luxembourg</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Madagascar.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Madagascar')">Madagascar</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Malawi.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Malawi')">Malawi</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Malaysia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Malaysia')">Malaysia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Maldives.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Maldives')">Maldives</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Mali.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Mali')">Mali</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Malta.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Malta')">Malta</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Marshall Islands.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Marshall Islands')">Marshall Islands</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Mauritania.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Mauritania')">Mauritania</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Mauritius.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Mauritius')">Mauritius</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Mexico.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Mexico')">Mexico</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Micronesia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Micronesia')">Micronesia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Moldova.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Moldova')">Moldova</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Monaco.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Monaco')">Monaco</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Mongolia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Mongolia')">Mongolia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Montenegro.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Montenegro')">Montenegro</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Morocco.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Morocco')">Morocco</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Myanmar.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Myanmar')">Myanmar</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Namibia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Namibia')">Namibia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Nauru.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Nauru')">Nauru</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Nepal.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Nepal')">Nepal</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Netherlands.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Netherlands')">Netherlands</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/New Zealand.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'New Zealand')">New Zealand</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Nicaragua.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Nicaragua')">Nicaragua</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Niger.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Niger')">Niger</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Nigeria.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Nigeria')">Nigeria</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/North Macedonia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'North Macedonia')">North Macedonia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Norway.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Norway')">Norway</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Oman.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Oman')">Oman</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Pakistan.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Pakistan')">Pakistan</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Palau.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Palau')">Palau</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Panama.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Panama')">Panama</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Papua New Guinea.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Papua New Guinea')">Papua New Guinea</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Paraguay.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Paraguay')">Paraguay</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Peru.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Peru')">Peru</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Philippines.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Philippines')">Philippines</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Poland.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Poland')">Poland</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Portugal.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Portugal')">Portugal</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Qatar.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Qatar')">Qatar</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Romania.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Romania')">Romania</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Russia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Russia')">Russia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Rwanda.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Rwanda')">Rwanda</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Saint Kitts and Nevis.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Saint Kitts and Nevis')">Saint Kitts and Nevis</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Saint Lucia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Saint Lucia')">Saint Lucia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Samoa.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Samoa')">Samoa</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/San Marino.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'San Marino')">San Marino</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Sao Tome and Principe.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Sao Tome and Principe')">Sao Tome and Principe</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Saudi Arabia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Saudi Arabia')">Saudi Arabia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Senegal.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Senegal')">Senegal</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Serbia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Serbia')">Serbia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Seychelles.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Seychelles')">Seychelles</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Sierra Leone.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Sierra Leone')">Sierra Leone</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Singapore.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Singapore')">Singapore</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Slovakia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Slovakia')">Slovakia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Slovenia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Slovenia')">Slovenia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Solomon Islands.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Solomon Islands')">Solomon Islands</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Somalia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Somalia')">Somalia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/South Africa.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'South Africa')">South Africa</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/South Korea.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'South Korea')">South Korea</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/South Sudan.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'South Sudan')">South Sudan</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Sri Lanka.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Sri Lanka')">Sri Lanka</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Sudan.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Sudan')">Sudan</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Suriname.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Suriname')">Suriname</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Sweden.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Sweden')">Sweden</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Switzerland.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Switzerland')">Switzerland</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Syria.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Syria')">Syria</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Tajikistan.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Tajikistan')">Tajikistan</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Tanzania.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Tanzania')">Tanzania</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Thailand.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Thailand')">Thailand</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Timor-Leste.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Timor-Leste')">Timor-Leste</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Togo.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Togo')">Togo</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Tonga.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Tonga')">Tonga</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Trinidad and Tobago.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Trinidad and Tobago')">Trinidad and Tobago</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Tunisia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Tunisia')">Tunisia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Turkey.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Turkey')">Turkey</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Turkmenistan.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Turkmenistan')">Turkmenistan</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Tuvalu.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Tuvalu')">Tuvalu</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Uganda.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Uganda')">Uganda</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Ukraine.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Ukraine')">Ukraine</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/U.A.E..gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'United Arab Emirates')">United Arab Emirates</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/U.K..gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'United Kingdom')">United Kingdom</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/U.S..gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'United States of America')">United States of America</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Uruguay.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Uruguay')">Uruguay</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Uzbekistan.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Uzbekistan')">Uzbekistan</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Vanuatu.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Vanuatu')">Vanuatu</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Venezuela.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Venezuela')">Venezuela</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Vietnam.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Vietnam')">Vietnam</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Yemen.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Yemen')">Yemen</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Zambia.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Zambia')">Zambia</a>
                    </li>
                    <li class="co-list">
                        <img class="c-img" src="flag-images/Zimbabwe.gif" alt="">
                        <a class="c-name" href="#"  onclick="selectCountry(this, 'Zimbabwe')">Zimbabwe</a>
                    </li>                           
                </ul>
            </div>
        </div>

        <div class="offer-detail-container" id="detail-container">

            <div class="one-offer">
                <div class="fis-section">
                    <div class="i-data-section">
                        <img src="images/b-img.png" alt="">
                        <div class="bg"></div>
                        <div class="text-section">
                            <h3>Free Boat</h3>
                            <img src="images/star.png" alt="">
                            <p>Quo reiciendis consectetur sed nihil asperiores! Autdre
                                sed nihil asperiores! Autdremodi quo facere dolores get
                                sed nihil asperiores! Autdre modi.....</p>
                            <div class="tw-btn">
                                <button class="detail">
                                    <div class="read-text"><?= lang('read_more'); ?></div>
                                    <img src="images/right-arrow.png" alt="">
                                </button>  
                                <button class="term-btn"> Terms & Condition</button>
                            </div>                              
                        </div>
                    
                    </div>
                    <div class="image-show">
                        <img src="images/i-1.png" alt="">
                        <img src="images/i-2.png" alt="">
                        <img src="images/i-3.png" alt="">
                        <img src="images/i-4.png" alt="">
                        <img src="images/i-5.png" alt="">
                        <img src="images/i-1.png" alt="">
                        <img src="images/i-2.png" alt="">
                        <img src="images/i-3.png" alt="">
                        <img src="images/i-4.png" alt="">
                        <img src="images/i-5.png" alt="">
                    </div>
                </div>

               

                <div class="bal">
                    <div class="a-data">
                        <div class="t-detail">
                            <h4>Adult (12-99)</h4>
                            <span>Minimum 1, Maximum 15</span>
                        </div>
                        <div class="c-detail">
                            <button class="less-btn" onclick="changeValue(-1)">-</button>
                            <span class="num">0</span>
                            <button class="more-btn" onclick="changeValue(1)">+</button>
                        </div>
                    </div>
                    <div class="c-data">
                        <div class="t-detail">
                            <h4>Child (2-11)</h4>
                            <span>Minimum 1, Maximum 15</span>
                        </div>
                        <div class="c-detail">
                            <button class="less" onclick="changeValue1(-1)">-</button>
                            <span class="number">0</span>
                            <button class="more" onclick="changeValue1(1)">+</button>
                        </div>
                    </div>

                    <div class="ca-section">
                        <div class="cal">
                            <button class="data-cal" id="openCalendar">
                                <div class="c-tx"  id="pickupDateText">Pickup Date</div>
                                <img src="images/calendar.png" alt="">
                            </button>
                            <div class="calendar-container">
                                <header class="calendar-header">
                                    
                                    <div class="calendar-navigation">
                                        <span id="calendar-prev"
                                              class="material-symbols-rounded">
                                            <img src="images/arrow-blue.png" alt="">
                                        </span>
                                        <p class="calendar-current-date"></p>
                                        <span id="calendar-next"
                                              class="material-symbols-rounded">
                                              <img src="images/arrow-blue-right.png" alt="">
                                            </span>
                                    </div>
                                </header>
                         
                                <div class="calendar-body">
                                    <ul class="calendar-weekdays">
                                        <li>Sun</li>
                                        <li>Mon</li>
                                        <li>Tue</li>
                                        <li>Wed</li>
                                        <li>Thu</li>
                                        <li>Fri</li>
                                        <li>Sat</li>
                                    </ul>
                                    <ul class="calendar-dates"></ul>
                                    <button class="cancel" id="closeCalendar">CANCEL</button>
                                </div>
                            </div>
                        </div>
                        <div class="clo">
                            <button class="data-col" onclick="openHoursContainer()">
                                <div class="cl-tx">Hours</div>
                                <img src="images/clock-blue.png" alt="">
                            </button>
                            <div class="hours-container">
                                <div class="he-hours">
                                    <h3>ENTER TIME</h3>
                                </div>
                                <div class="input-boxes">
                                    <div class="hm-input">
                                        <div class="hour-in">
                                            <input class="hour" type="text" value="12" maxlength="2"  onfocus="clearInputValue(this)">
                                            <h5>Hour</h5>
                                        </div>
                                        <span>:</span>
                                        <div class="min-in">
                                            <input class="minute" type="text" value="00" maxlength="2"  onfocus="clearInputValue(this)">
                                            <h5>Minute</h5>
                                        </div>
                                    </div>
                                    <div class="ap-btn">
                                        <button class="am-btn" onclick="selectAM()">AM</button>
                                        <button class="pm-btn" onclick="selectPM()">PM</button>
                                    </div>
                                </div>  
                                <div class="co-btn">
                                    <button class="h-can" onclick="closeHoursContainer()">CANCEL</button>
                                    <button class="h-ok" onclick="setSelectedTime()">OK</button>
                                </div>                            
                            </div>
                        </div>
                </div>

                <div class="ti-sec">
                    <div class="h-detail">
                        <img src="images/clock-s.png" alt="">
                        <span class="sk-text">5 hours(approx.)</span>
                    </div>
                    <div class="po-detail">
                        <img src="images/car-s.png" alt="">
                        <span class="sk-text">Pickup Offered</span>
                    </div>
                    <div class="fr-detail">
                        <img src="images/refund-s.png" alt="">
                        <span class="sk-text">Free Refund</span>
                    </div>
                </div>

                <button class="bn-btn">Buy Now <span>$20.45</span></button>

            </div>


            <div class="t-area" id="popupContent">
                <div class="image-header">
                    <img src="images/1-img.png" alt="">
                    <button class="cl-btn" id="closeButton">
                        <img src="images/orange-close.png" alt="">
                    </button>
                </div>
                <div class="name-off">
                    <h3>Free Boat</h3>
                    <span><del>$23.70</del>$20.50</span>
                </div>
                <div class="full-detail">
                    <p>              Lorem ipsum sit amet, consectetur adipiscing 
                        elit, sed do eiusmod tempor incididunt ut labore ete 
                        dolore magna aliqua. Ut enim ad minim veniam, qu
                        is nostrud.
                    </p>
                    <p>              
                        Lorem ipsum sit amet, consectetur adipiscing 
                        elit, sed do eiusmod tempor incididunt ut labore.
                    </p>
                    <p>
                        exercitation ullamco laboris nisi ut aliquip ex ea co
                        mmodo consequat. Duis aute irure dolor in reprehe
                        nderit in voluptate velit esse cillum dolore eu fugiat
                        nulla pariatur. Excepteur sint occaecat cupidatat nn
                        proident, sunt in culpa qui officia deserunt mollit an
                        im id est laborum.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing 
                        elit, sed do eiusmod tempor incididunt ut labore ete 
                    </p>
                </div>

                <button class="bn-btn">Buy Now <span>$20.45</span></button>
                
            </div>
            
        </div>


    </div>



    <script src="main.js"></script>
    <script src="calendar.js"></script>
</body>
</html>