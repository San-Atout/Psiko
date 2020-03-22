<header>
    <!-- contenu de la balise d'en tête-->
    <div class="image_site"> 									<!-- image de l'en-tête-->
        <a href="Images/infinite_measures_noir_blanc.png"><img src="Images/miniature_IM_noir_blanc.png" alt="Logo du site" title="Cliquez pour agrandir"/></a>
    </div>

    <nav>														<!--Menu de navigation-->
        <ul id="element_nav_generale">
            <li><a href="Y-CO.html#page">الإستقبال</a></li>
            <li><a href="nous.html">من نحن؟</a></li>
            <li><a href="faq.html"> الأسئلةالشائعة</a></li>
            <li><a href="contact.html"></a>اتصل بنا</a></li>
            <li class="menu_deroulant"><a href="inscription_connexion.html">التسجيل/ تسجيل الدخول &ensp;</a> <!-- &ensp permet de créer un espace double-->
                <ul class="sous">
                    <li><a href="inscription.html">التسجيل</a></li>
                    <li><a href="connexion.html">الإتصال</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="langues">											<!-- choix de la langue-->
        <a class="drapeau-link" href="<?=$lienFr?>">
            <img class="drapeau" src="/Images/logo france.png" alt="français" title="Cliquez pour passer le site en français"/>
        </a>
        <a class="drapeau-link" href="<?=$lienEn?>">
            <img class="drapeau" src="/Images/logo angleterre.png" alt="anglais" title="Click here to translate the site in English"/>
        </a>
        <a class="drapeau-link" href="<?=$lienAr?>">
            <img class="drapeau" src="/Images/logo arabe.png" alt="arabe" title="ااضغط هنا لتحويل الموقع إلى العربية "/>
        </a>
        <a class="drapeau-link" href="<?=$lienPl?>">
            <img class="drapeau" src="/Images/logo pologne.png" alt="polonais" title="Kliknij tutaj, aby przejść do strony w języku polskim"/>
        </a>
    </div>

</header>
