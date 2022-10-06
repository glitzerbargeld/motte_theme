<?php
get_header();
?>


<section class="section-1">
    <div class="wrapper">
        <div id="albumcover"><img src="https://f4.bcbits.com/img/a4000070056_16.jpg" style="width: 100%" /></div>
        <div id="album-description" style="text-align: center">
            <h2>NEU!NEU!NEU!</h2><br><br><br>
            <h3>DU KANNST EH NIX COOLES DENKEN WENN DU SO VIEL ZEIT HAST</h3>
            <div class="logos" style="padding: 50px; width: 100%; text-align: center">
                <a target="_blank" and rel="noopener noreferrer" href="https://bahnhofmotte.bandcamp.com/album/du-kannst-eh-nix-cooles-denken-wenn-du-so-viel-zeit-hast"><img src="/src/media/bandcamp.png" width=100px style="margin: 10px; display: inline-block" /></a>
                <a target="_blank" and rel="noopener noreferrer" href="https://open.spotify.com/album/58TZcyAulxN5YPvvnVEFuy?si=pxBpyXOtR2OojuVpTwcQiQ"><img src="/src/media/spotify.png" width=100px style="margin: 10px; display: inline-block" /></a>
            </div>

        </div>
    </div>
</section>

<section class="section-2" id="videos">

    <h2>DAS WORT ZUM SONNTAG</h2>
    <div class="yt-video">

        <iframe width="560" height="315" src="https://www.youtube.com/embed/H6AJ11RkeCE?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <h2>DAS KIND</h2>
    <div class="yt-video">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/Plgat6KSYzY?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <h2>EINLASS</h2>
    <div class="yt-video">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/qFRcUJ4dSkU?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</section>
<section class="section-3" id="tourdates">
    <h1>TOURDATES</h1>

    <div class="row">

        <?php

        //CHECK YEARS AVAILABLE
        //LOOP THROUGH ALL EVENTS
        $konzert_query = new WP_Query(array(
            'post_type' => 'konzert',
            'meta_key' => 'date_of_concert',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
        ));
        //GET YEARS
        //PRINT YEARS AS HEADING;

        //CREATE ENTRIES FOR YEARS
        $concerts = array();
        if ($konzert_query->have_posts()) : while ($konzert_query->have_posts()) : $konzert_query->the_post();

                $the_date = get_field('date_of_concert');
                $dateTime = DateTime::createFromFormat("Ymd", $the_date);
                if (is_object($dateTime)) {
                    $day_month = $dateTime->format('d.m');
                    $the_year = $dateTime->format('Y');
                    //...
                }


                if (empty($concerts[$the_year])) {
                    $concerts[$the_year] =
                        array(
                            array(
                                "date_of_concert" => $day_month,
                                "city" => get_field('city'),
                                "venue" => get_the_title(),
                                "cancelled" => get_field("cancelled"),
                                "add_info" => get_field("additional_information")
                            )
                        );
                } else {
                    $concerts[$the_year][] =  array(
                        "datum" => $day_month,
                        "city" => get_field('city'),
                        "venue" => get_the_title(),
                        "cancelled" => get_field("cancelled"),
                        "add_info" => get_field("additional_information")
                    );
                }

            endwhile;
        endif;
        ?>


        <?php

        foreach ($concerts as $key_year => $year) {
            if ($key_year > date("Y") - 3) { ?>
                <div class="column">
                    <h2><?php echo $key_year; ?></h2>
                    <ul><?php
                        foreach ($year as $key_konzert => $konzert) {
                            echo '<li';
                            if ($konzert["cancelled"]) {
                                echo ' class="cancelled"';
                            }
                            echo '>';
                            echo $konzert["date_of_concert"] . ' ' .  $konzert["city"] . ', ' . $konzert["venue"];
                            if(!empty($konzert["add_info"])) {
                                echo ' / ' . $konzert["add_info"];
                            }
                            echo '</li>';
                        } ?>
                    </ul>
                </div>
        <?php
            }
        }
        ?>



        <div class="column">
            <h2>2021</h2>
            <ul>
                <li>12.06. Dresden Open Air, Kultursommer 2021</li>
                <li>27.08. Dresden, Puschkin</li>
                <li>23.09. Dresden, Ostpol</li>
                <li>29.09. Hildesheim, Club Veb</li>
                <li>30.09. Hannover, Burg / mit Das Günther</li>
                <li>01.10. Dresden, Objekt klein a / mit Das Günther</li>
                <li>02.10. Leipzig, TxPx / mit Das Günther</li>
                <li>07.10. Halle, Algenberg / mit Ariel my Friend</li>
                <li>08.10. Chemnitz, Lokomov / mit Automatik Amore</li>
                <li>20.11. Berlin, Geheimkonzert / mit Panoramakäfig</li>
            </ul>

        </div>

        <div class="column">
            <h2>2020</h2>
            <ul>
                <li>06.03 - KvU - Berlin </li>
                <li class="cancelled">21.02 - Ostpol - Dresden</li>
                <li class="cancelled">27.03 - Café Wagner - Jena</li>
                <li class="cancelled">28.03 - Reil78 - Halle</li>
                <li class="cancelled">08.05 - Lokomov - Chemnitz</li>
                <li class="cancelled">09.05 - Frau Korte - Erfurt</li>
                <li class="cancelled">13.05 - Club VEB - Hildesheim</li>
                <li class="cancelled">14.05 - tba. - Hannover</li>
                <li class="cancelled">15.05 - Blauer Manfred - Bremen</li>
                <li class="cancelled">16.05 - Schute - Hamburg</li>
                <li class="cancelled">20.05 - Haus Meinusch - Mainz</li>
                <li class="cancelled">21.05 - Groovestation - Dresden</li>
                <li class="cancelled">22.05 - Zeitraum - Festival</li>
                <li class="cancelled">23.05 - Chemiefabrik - Dresden</li>
                <li class="cancelled">06.06 - St. Pieschen - Dresden</li>
                <li class="cancelled">25.06 - Fusion - Festival</li>
                <li>15.08 - Privat</li>
                <li>12.09 - Rösselstube - Dresden</li>
                <li>24.09 - Neues Schauspiel - Leipzig</li>
                <li>17.10 - Veränderbar - Dresden</li>
            </ul>
        </div>
        <div class="column">
            <h2>2019</h2>

            <ul>

                <li>28.06 - Rösselstube - Dresden </li>
                <li>12.07 - HfBK - Dresden</li>
                <li>24.08 - Hechtfest - Dresden</li>
                <li>31.08 - Molmersturn - Festival</li>
                <li>12.09 - DHAS Fezzt - Festival</li>
                <li>04.10 - DHF - Leipzig</li>
                <li>12.10 - Gieszerstraße - Leipzig</li>
                <li>19.10 - AZ Conni - Dresden</li>
                <li>02.11 - Café Taktlos - Glauchau </li>
                <li>05.11 - Ostpol - Dresden</li>
                <li>23.11 - AJZ - Neubrandenburg</li>
                <li>26.11 - WunderBar - Weimar</li>
                <li>27.11 - Kassablanca - Jena</li>
                <li>29.11 - Sandershaus - Kassel</li>
                <li>06.12 - Tjpj - Leipzig</li>
            </ul>
        </div>
    </div>
</section>

<section class="section-4" id="contact">
    <h1>CONTACT</h1>
    <div class="email-container">
        <ul>
            <li><a href="mailto:info@bahnhofmotte.de">info@bahnhofmotte.de</a></li>
            <li><a href="mailto:booking@bahnhofmotte.de">booking@bahnhofmotte.de</a>
    </div>
    </li>
    </ul>
</section>



<div class="modal" id="modal">
    <div class="modal-header">
        <h1 class="title">Datenschutz&shy;erkl&auml;rung/Impressum</h1>
        <button data-close-button class="close-button">&times;</button>
    </div>



    <div class="modal-body">

    </div>
    <h2>Impressum</h2>
    <p>Bahnhof Motte GbR</p>
    <p>Georg Nitschke</p>
    <p>Wernerstraße 22 </p>
    <p>01159 Dresden</p>
    <a href="mailto:info@bahnhofmotte.de">info@bahnhofmotte.de</a>
    <h2>1. Datenschutz auf einen Blick</h2>
    <h3>Allgemeine Hinweise</h3>
    <p>Die folgenden Hinweise geben einen einfachen &Uuml;berblick dar&uuml;ber, was mit Ihren personenbezogenen Daten passiert, wenn Sie diese Website besuchen. Personenbezogene Daten sind alle Daten, mit denen Sie pers&ouml;nlich identifiziert werden k&ouml;nnen. Ausf&uuml;hrliche Informationen zum Thema Datenschutz entnehmen Sie unserer unter diesem Text aufgef&uuml;hrten Datenschutzerkl&auml;rung.</p>
    <h3>Datenerfassung auf dieser Website</h3>
    <h4>Wer ist verantwortlich f&uuml;r die Datenerfassung auf dieser Website?</h4>
    <p>Die Datenverarbeitung auf dieser Website erfolgt durch den Websitebetreiber. Dessen Kontaktdaten k&ouml;nnen Sie dem Impressum dieser Website entnehmen.</p>
    <h4>Wie erfassen wir Ihre Daten?</h4>
    <p>Ihre Daten werden zum einen dadurch erhoben, dass Sie uns diese mitteilen. Hierbei kann es sich z.&nbsp;B. um Daten handeln, die Sie in ein Kontaktformular eingeben.</p>
    <p>Andere Daten werden automatisch oder nach Ihrer Einwilligung beim Besuch der Website durch unsere IT-Systeme erfasst. Das sind vor allem technische Daten (z.&nbsp;B. Internetbrowser, Betriebssystem oder Uhrzeit des Seitenaufrufs). Die Erfassung dieser Daten erfolgt automatisch, sobald Sie diese Website betreten.</p>
    <h4>Wof&uuml;r nutzen wir Ihre Daten?</h4>
    <p>Ein Teil der Daten wird erhoben, um eine fehlerfreie Bereitstellung der Website zu gew&auml;hrleisten. Andere Daten k&ouml;nnen zur Analyse Ihres Nutzerverhaltens verwendet werden.</p>
    <h4>Welche Rechte haben Sie bez&uuml;glich Ihrer Daten?</h4>
    <p>Sie haben jederzeit das Recht, unentgeltlich Auskunft &uuml;ber Herkunft, Empf&auml;nger und Zweck Ihrer gespeicherten personenbezogenen Daten zu erhalten. Sie haben au&szlig;erdem ein Recht, die Berichtigung oder L&ouml;schung dieser Daten zu verlangen. Wenn Sie eine Einwilligung zur Datenverarbeitung erteilt haben, k&ouml;nnen Sie diese Einwilligung jederzeit f&uuml;r die Zukunft widerrufen. Au&szlig;erdem haben Sie das Recht, unter bestimmten Umst&auml;nden die Einschr&auml;nkung der Verarbeitung Ihrer personenbezogenen Daten zu verlangen. Des Weiteren steht Ihnen ein Beschwerderecht bei der zust&auml;ndigen Aufsichtsbeh&ouml;rde zu.</p>
    <p>Hierzu sowie zu weiteren Fragen zum Thema Datenschutz k&ouml;nnen Sie sich jederzeit unter der im Impressum angegebenen Adresse an uns wenden.</p>
    <h2>2. Hosting und Content Delivery Networks (CDN)</h2>
    <h3>Externes Hosting</h3>
    <p>Diese Website wird bei einem externen Dienstleister gehostet (Hoster). Die personenbezogenen Daten, die auf dieser Website erfasst werden, werden auf den Servern des Hosters gespeichert. Hierbei kann es sich v. a. um IP-Adressen, Kontaktanfragen, Meta- und Kommunikationsdaten, Vertragsdaten, Kontaktdaten, Namen, Websitezugriffe und sonstige Daten, die &uuml;ber eine Website generiert werden, handeln.</p>
    <p>Der Einsatz des Hosters erfolgt zum Zwecke der Vertragserf&uuml;llung gegen&uuml;ber unseren potenziellen und bestehenden Kunden (Art. 6 Abs. 1 lit. b DSGVO) und im Interesse einer sicheren, schnellen und effizienten Bereitstellung unseres Online-Angebots durch einen professionellen Anbieter (Art. 6 Abs. 1 lit. f DSGVO).</p>
    <p>Unser Hoster wird Ihre Daten nur insoweit verarbeiten, wie dies zur Erf&uuml;llung seiner Leistungspflichten erforderlich ist und unsere Weisungen in Bezug auf diese Daten befolgen.</p>
    <p>Wir setzen folgenden Hoster ein:</p>
    <p>DigitalOcean, LLC. <br />
        101 Avenue of the Americas, 10th Floor<br />
        New York 10013<br />
        UNITED STATES</p>
    <h2>3. Allgemeine Hinweise und Pflicht&shy;informationen</h2>
    <h3>Datenschutz</h3>
    <p>Die Betreiber dieser Seiten nehmen den Schutz Ihrer pers&ouml;nlichen Daten sehr ernst. Wir behandeln Ihre personenbezogenen Daten vertraulich und entsprechend der gesetzlichen Datenschutzvorschriften sowie dieser Datenschutzerkl&auml;rung.</p>
    <p>Wenn Sie diese Website benutzen, werden verschiedene personenbezogene Daten erhoben. Personenbezogene Daten sind Daten, mit denen Sie pers&ouml;nlich identifiziert werden k&ouml;nnen. Die vorliegende Datenschutzerkl&auml;rung erl&auml;utert, welche Daten wir erheben und wof&uuml;r wir sie nutzen. Sie erl&auml;utert auch, wie und zu welchem Zweck das geschieht.</p>
    <p>Wir weisen darauf hin, dass die Daten&uuml;bertragung im Internet (z.&nbsp;B. bei der Kommunikation per E-Mail) Sicherheitsl&uuml;cken aufweisen kann. Ein l&uuml;ckenloser Schutz der Daten vor dem Zugriff durch Dritte ist nicht m&ouml;glich.</p>
    <h3>Hinweis zur verantwortlichen Stelle</h3>
    <p>Die verantwortliche Stelle f&uuml;r die Datenverarbeitung auf dieser Website ist:</p>
    <p>Bahnhof Motte GbR<br />
        Georg Nitschke<br />
        Wernerstra&szlig;e 22 <br />
        01159 Dresden</p>

    <p>Telefon: &#91;Telefonnummer der verantwortlichen Stelle&#93;<br />
        E-Mail: georg.nitschke@posteo.de</p>
    <p>Verantwortliche Stelle ist die nat&uuml;rliche oder juristische Person, die allein oder gemeinsam mit anderen &uuml;ber die Zwecke und Mittel der Verarbeitung von personenbezogenen Daten (z.&nbsp;B. Namen, E-Mail-Adressen o. &Auml;.) entscheidet.</p>

    <h3>Speicherdauer</h3>
    <p>Soweit innerhalb dieser Datenschutzerkl&auml;rung keine speziellere Speicherdauer genannt wurde, verbleiben Ihre personenbezogenen Daten bei uns, bis der Zweck f&uuml;r die Datenverarbeitung entf&auml;llt. Wenn Sie ein berechtigtes L&ouml;schersuchen geltend machen oder eine Einwilligung zur Datenverarbeitung widerrufen, werden Ihre Daten gel&ouml;scht, sofern wir keinen anderen rechtlich zul&auml;ssigen&nbsp; Gr&uuml;nde f&uuml;r die Speicherung Ihrer personenbezogenen Daten haben (z.B. steuer- oder handelsrechtliche Aufbewahrungsfristen); im letztgenannten Fall erfolgt die L&ouml;schung nach Fortfall dieser Gr&uuml;nde.</p>
    <h3>Hinweis zur Datenweitergabe in die USA</h3>
    <p>Auf unserer Website sind unter anderem Tools von Unternehmen mit Sitz in den USA eingebunden. Wenn diese Tools aktiv sind, k&ouml;nnen Ihre personenbezogenen Daten an die US-Server der jeweiligen Unternehmen weitergegeben werden. Wir weisen darauf hin, dass die USA kein sicherer Drittstaat im Sinne des EU-Datenschutzrechts sind. US-Unternehmen sind dazu verpflichtet, personenbezogene Daten an Sicherheitsbeh&ouml;rden herauszugeben, ohne dass Sie als Betroffener hiergegen gerichtlich vorgehen k&ouml;nnten. Es kann daher nicht ausgeschlossen werden, dass US-Beh&ouml;rden (z.B. Geheimdienste) Ihre auf US-Servern befindlichen Daten zu &Uuml;berwachungszwecken verarbeiten, auswerten und dauerhaft speichern. Wir haben auf diese Verarbeitungst&auml;tigkeiten keinen Einfluss.</p>
    <h3>Widerruf Ihrer Einwilligung zur Datenverarbeitung</h3>
    <p>Viele Datenverarbeitungsvorg&auml;nge sind nur mit Ihrer ausdr&uuml;cklichen Einwilligung m&ouml;glich. Sie k&ouml;nnen eine bereits erteilte Einwilligung jederzeit widerrufen. Die Rechtm&auml;&szlig;igkeit der bis zum Widerruf erfolgten Datenverarbeitung bleibt vom Widerruf unber&uuml;hrt.</p>
    <h3>Widerspruchsrecht gegen die Datenerhebung in besonderen F&auml;llen sowie gegen Direktwerbung (Art. 21 DSGVO)</h3>
    <p>WENN DIE DATENVERARBEITUNG AUF GRUNDLAGE VON ART. 6 ABS. 1 LIT. E ODER F DSGVO ERFOLGT, HABEN SIE JEDERZEIT DAS RECHT, AUS GR&Uuml;NDEN, DIE SICH AUS IHRER BESONDEREN SITUATION ERGEBEN, GEGEN DIE VERARBEITUNG IHRER PERSONENBEZOGENEN DATEN WIDERSPRUCH EINZULEGEN; DIES GILT AUCH F&Uuml;R EIN AUF DIESE BESTIMMUNGEN GEST&Uuml;TZTES PROFILING. DIE JEWEILIGE RECHTSGRUNDLAGE, AUF DENEN EINE VERARBEITUNG BERUHT, ENTNEHMEN SIE DIESER DATENSCHUTZERKL&Auml;RUNG. WENN SIE WIDERSPRUCH EINLEGEN, WERDEN WIR IHRE BETROFFENEN PERSONENBEZOGENEN DATEN NICHT MEHR VERARBEITEN, ES SEI DENN, WIR K&Ouml;NNEN ZWINGENDE SCHUTZW&Uuml;RDIGE GR&Uuml;NDE F&Uuml;R DIE VERARBEITUNG NACHWEISEN, DIE IHRE INTERESSEN, RECHTE UND FREIHEITEN &Uuml;BERWIEGEN ODER DIE VERARBEITUNG DIENT DER GELTENDMACHUNG, AUS&Uuml;BUNG ODER VERTEIDIGUNG VON RECHTSANSPR&Uuml;CHEN (WIDERSPRUCH NACH ART. 21 ABS. 1 DSGVO).</p>
    <p>WERDEN IHRE PERSONENBEZOGENEN DATEN VERARBEITET, UM DIREKTWERBUNG ZU BETREIBEN, SO HABEN SIE DAS RECHT, JEDERZEIT WIDERSPRUCH GEGEN DIE VERARBEITUNG SIE BETREFFENDER PERSONENBEZOGENER DATEN ZUM ZWECKE DERARTIGER WERBUNG EINZULEGEN; DIES GILT AUCH F&Uuml;R DAS PROFILING, SOWEIT ES MIT SOLCHER DIREKTWERBUNG IN VERBINDUNG STEHT. WENN SIE WIDERSPRECHEN, WERDEN IHRE PERSONENBEZOGENEN DATEN ANSCHLIESSEND NICHT MEHR ZUM ZWECKE DER DIREKTWERBUNG VERWENDET (WIDERSPRUCH NACH ART. 21 ABS. 2 DSGVO).</p>
    <h3>Beschwerde&shy;recht bei der zust&auml;ndigen Aufsichts&shy;beh&ouml;rde</h3>
    <p>Im Falle von Verst&ouml;&szlig;en gegen die DSGVO steht den Betroffenen ein Beschwerderecht bei einer Aufsichtsbeh&ouml;rde, insbesondere in dem Mitgliedstaat ihres gew&ouml;hnlichen Aufenthalts, ihres Arbeitsplatzes oder des Orts des mutma&szlig;lichen Versto&szlig;es zu. Das Beschwerderecht besteht unbeschadet anderweitiger verwaltungsrechtlicher oder gerichtlicher Rechtsbehelfe.</p>
    <h3>Recht auf Daten&shy;&uuml;bertrag&shy;barkeit</h3>
    <p>Sie haben das Recht, Daten, die wir auf Grundlage Ihrer Einwilligung oder in Erf&uuml;llung eines Vertrags automatisiert verarbeiten, an sich oder an einen Dritten in einem g&auml;ngigen, maschinenlesbaren Format aush&auml;ndigen zu lassen. Sofern Sie die direkte &Uuml;bertragung der Daten an einen anderen Verantwortlichen verlangen, erfolgt dies nur, soweit es technisch machbar ist.</p>
    <h3>SSL- bzw. TLS-Verschl&uuml;sselung</h3>
    <p>Diese Seite nutzt aus Sicherheitsgr&uuml;nden und zum Schutz der &Uuml;bertragung vertraulicher Inhalte, wie zum Beispiel Bestellungen oder Anfragen, die Sie an uns als Seitenbetreiber senden, eine SSL- bzw. TLS-Verschl&uuml;sselung. Eine verschl&uuml;sselte Verbindung erkennen Sie daran, dass die Adresszeile des Browsers von &bdquo;http://&ldquo; auf &bdquo;https://&ldquo; wechselt und an dem Schloss-Symbol in Ihrer Browserzeile.</p>
    <p>Wenn die SSL- bzw. TLS-Verschl&uuml;sselung aktiviert ist, k&ouml;nnen die Daten, die Sie an uns &uuml;bermitteln, nicht von Dritten mitgelesen werden.</p>
    <h3>Auskunft, L&ouml;schung und Berichtigung</h3>
    <p>Sie haben im Rahmen der geltenden gesetzlichen Bestimmungen jederzeit das Recht auf unentgeltliche Auskunft &uuml;ber Ihre gespeicherten personenbezogenen Daten, deren Herkunft und Empf&auml;nger und den Zweck der Datenverarbeitung und ggf. ein Recht auf Berichtigung oder L&ouml;schung dieser Daten. Hierzu sowie zu weiteren Fragen zum Thema personenbezogene Daten k&ouml;nnen Sie sich jederzeit unter der im Impressum angegebenen Adresse an uns wenden.</p>
    <h3>Recht auf Einschr&auml;nkung der Verarbeitung</h3>
    <p>Sie haben das Recht, die Einschr&auml;nkung der Verarbeitung Ihrer personenbezogenen Daten zu verlangen. Hierzu k&ouml;nnen Sie sich jederzeit unter der im Impressum angegebenen Adresse an uns wenden. Das Recht auf Einschr&auml;nkung der Verarbeitung besteht in folgenden F&auml;llen:</p>
    <ul>
        <li>Wenn Sie die Richtigkeit Ihrer bei uns gespeicherten personenbezogenen Daten bestreiten, ben&ouml;tigen wir in der Regel Zeit, um dies zu &uuml;berpr&uuml;fen. F&uuml;r die Dauer der Pr&uuml;fung haben Sie das Recht, die Einschr&auml;nkung der Verarbeitung Ihrer personenbezogenen Daten zu verlangen.</li>
        <li>Wenn die Verarbeitung Ihrer personenbezogenen Daten unrechtm&auml;&szlig;ig geschah/geschieht, k&ouml;nnen Sie statt der L&ouml;schung die Einschr&auml;nkung der Datenverarbeitung verlangen.</li>
        <li>Wenn wir Ihre personenbezogenen Daten nicht mehr ben&ouml;tigen, Sie sie jedoch zur Aus&uuml;bung, Verteidigung oder Geltendmachung von Rechtsanspr&uuml;chen ben&ouml;tigen, haben Sie das Recht, statt der L&ouml;schung die Einschr&auml;nkung der Verarbeitung Ihrer personenbezogenen Daten zu verlangen.</li>
        <li>Wenn Sie einen Widerspruch nach Art. 21 Abs. 1 DSGVO eingelegt haben, muss eine Abw&auml;gung zwischen Ihren und unseren Interessen vorgenommen werden. Solange noch nicht feststeht, wessen Interessen &uuml;berwiegen, haben Sie das Recht, die Einschr&auml;nkung der Verarbeitung Ihrer personenbezogenen Daten zu verlangen.</li>
    </ul>
    <p>Wenn Sie die Verarbeitung Ihrer personenbezogenen Daten eingeschr&auml;nkt haben, d&uuml;rfen diese Daten &ndash; von ihrer Speicherung abgesehen &ndash; nur mit Ihrer Einwilligung oder zur Geltendmachung, Aus&uuml;bung oder Verteidigung von Rechtsanspr&uuml;chen oder zum Schutz der Rechte einer anderen nat&uuml;rlichen oder juristischen Person oder aus Gr&uuml;nden eines wichtigen &ouml;ffentlichen Interesses der Europ&auml;ischen Union oder eines Mitgliedstaats verarbeitet werden.</p>
    <h2>4. Datenerfassung auf dieser Website</h2>
    <h3>Cookies</h3>
    <p>Unsere Internetseiten verwenden so genannte &bdquo;Cookies&ldquo;. Cookies sind kleine Textdateien und richten auf Ihrem Endger&auml;t keinen Schaden an. Sie werden entweder vor&uuml;bergehend f&uuml;r die Dauer einer Sitzung (Session-Cookies) oder dauerhaft (permanente Cookies) auf Ihrem Endger&auml;t gespeichert. Session-Cookies werden nach Ende Ihres Besuchs automatisch gel&ouml;scht. Permanente Cookies bleiben auf Ihrem Endger&auml;t gespeichert, bis Sie diese selbst l&ouml;schen&nbsp;oder eine automatische L&ouml;schung durch Ihren Webbrowser erfolgt.</p>
    <p>Teilweise k&ouml;nnen auch Cookies von Drittunternehmen auf Ihrem Endger&auml;t gespeichert werden, wenn Sie unsere Seite betreten (Third-Party-Cookies). Diese erm&ouml;glichen uns oder Ihnen die Nutzung bestimmter Dienstleistungen des Drittunternehmens (z.B. Cookies zur Abwicklung von Zahlungsdienstleistungen).</p>
    <p>Cookies haben verschiedene Funktionen. Zahlreiche Cookies sind technisch notwendig, da bestimmte Websitefunktionen ohne diese nicht funktionieren w&uuml;rden (z.B. die Warenkorbfunktion oder die Anzeige von Videos). Andere Cookies dienen dazu, das Nutzerverhalten auszuwerten&nbsp;oder Werbung anzuzeigen.</p>
    <p>Cookies, die zur Durchf&uuml;hrung des elektronischen Kommunikationsvorgangs (notwendige Cookies) oder zur Bereitstellung bestimmter, von Ihnen erw&uuml;nschter Funktionen (funktionale Cookies, z. B. f&uuml;r die Warenkorbfunktion) oder zur Optimierung der Website (z.B. Cookies zur Messung des Webpublikums) erforderlich sind, werden auf Grundlage von Art. 6 Abs. 1 lit. f DSGVO gespeichert, sofern keine andere Rechtsgrundlage angegeben wird. Der Websitebetreiber hat ein berechtigtes Interesse an der Speicherung von Cookies zur technisch fehlerfreien und optimierten Bereitstellung seiner Dienste. Sofern eine Einwilligung zur Speicherung von Cookies abgefragt wurde, erfolgt die Speicherung der betreffenden Cookies ausschlie&szlig;lich auf Grundlage dieser Einwilligung (Art. 6 Abs. 1 lit. a DSGVO); die Einwilligung ist jederzeit widerrufbar.</p>
    <p>Sie k&ouml;nnen Ihren Browser so einstellen, dass Sie &uuml;ber das Setzen von Cookies informiert werden und Cookies nur im Einzelfall erlauben, die Annahme von Cookies f&uuml;r bestimmte F&auml;lle oder generell ausschlie&szlig;en sowie das automatische L&ouml;schen der Cookies beim Schlie&szlig;en des Browsers aktivieren. Bei der Deaktivierung von Cookies kann die Funktionalit&auml;t dieser Website eingeschr&auml;nkt sein.</p>
    <p>Soweit Cookies von Drittunternehmen oder zu Analysezwecken eingesetzt werden, werden wir Sie hier&uuml;ber im Rahmen dieser Datenschutzerkl&auml;rung gesondert informieren und ggf. eine Einwilligung abfragen.</p>
    <h3>Anfrage per E-Mail, Telefon oder Telefax</h3>
    <p>Wenn Sie uns per E-Mail, Telefon oder Telefax kontaktieren, wird Ihre Anfrage inklusive aller daraus hervorgehenden personenbezogenen Daten (Name, Anfrage) zum Zwecke der Bearbeitung Ihres Anliegens bei uns gespeichert und verarbeitet. Diese Daten geben wir nicht ohne Ihre Einwilligung weiter.</p>
    <p>Die Verarbeitung dieser Daten erfolgt auf Grundlage von Art. 6 Abs. 1 lit. b DSGVO, sofern Ihre Anfrage mit der Erf&uuml;llung eines Vertrags zusammenh&auml;ngt oder zur Durchf&uuml;hrung vorvertraglicher Ma&szlig;nahmen erforderlich ist. In allen &uuml;brigen F&auml;llen beruht die Verarbeitung auf unserem berechtigten Interesse an der effektiven Bearbeitung der an uns gerichteten Anfragen (Art. 6 Abs. 1 lit. f DSGVO) oder auf Ihrer Einwilligung (Art. 6 Abs. 1 lit. a DSGVO) sofern diese abgefragt wurde.</p>
    <p>Die von Ihnen an uns per Kontaktanfragen &uuml;bersandten Daten verbleiben bei uns, bis Sie uns zur L&ouml;schung auffordern, Ihre Einwilligung zur Speicherung widerrufen oder der Zweck f&uuml;r die Datenspeicherung entf&auml;llt (z.&nbsp;B. nach abgeschlossener Bearbeitung Ihres Anliegens). Zwingende gesetzliche Bestimmungen &ndash; insbesondere gesetzliche Aufbewahrungsfristen &ndash; bleiben unber&uuml;hrt.</p>
    <h2>5. Plugins und Tools</h2>
    <h3>YouTube mit erweitertem Datenschutz</h3>
    <p>Diese Website bindet Videos der YouTube ein. Betreiber der Seiten ist die Google Ireland Limited (&bdquo;Google&ldquo;), Gordon House, Barrow Street, Dublin 4, Irland.</p>
    <p>Wir nutzen YouTube im erweiterten Datenschutzmodus. Dieser Modus bewirkt laut YouTube, dass YouTube keine Informationen &uuml;ber die Besucher auf dieser Website speichert, bevor diese sich das Video ansehen. Die Weitergabe von Daten an YouTube-Partner wird durch den erweiterten Datenschutzmodus hingegen nicht zwingend ausgeschlossen. So stellt YouTube &ndash; unabh&auml;ngig davon, ob Sie sich ein Video ansehen &ndash; eine Verbindung zum Google DoubleClick-Netzwerk her.</p>
    <p>Sobald Sie ein YouTube-Video auf dieser Website starten, wird eine Verbindung zu den Servern von YouTube hergestellt. Dabei wird dem YouTube-Server mitgeteilt, welche unserer Seiten Sie besucht haben. Wenn Sie in Ihrem YouTube-Account eingeloggt sind, erm&ouml;glichen Sie YouTube, Ihr Surfverhalten direkt Ihrem pers&ouml;nlichen Profil zuzuordnen. Dies k&ouml;nnen Sie verhindern, indem Sie sich aus Ihrem YouTube-Account ausloggen.</p>
    <p>Des Weiteren kann YouTube nach Starten eines Videos verschiedene Cookies auf Ihrem Endger&auml;t speichern oder vergleichbare Wiedererkennungstechnologien (z.B. Device-Fingerprinting) einsetzen. Auf diese Weise kann YouTube Informationen &uuml;ber Besucher dieser Website erhalten. Diese Informationen werden u. a. verwendet, um Videostatistiken zu erfassen, die Anwenderfreundlichkeit zu verbessern und Betrugsversuchen vorzubeugen.</p>
    <p>Gegebenenfalls k&ouml;nnen nach dem Start eines YouTube-Videos weitere Datenverarbeitungsvorg&auml;nge ausgel&ouml;st werden, auf die wir keinen Einfluss haben.</p>
    <p>Die Nutzung von YouTube erfolgt im Interesse einer ansprechenden Darstellung unserer Online-Angebote. Dies stellt ein berechtigtes Interesse im Sinne von Art. 6 Abs. 1 lit. f DSGVO dar. Sofern eine entsprechende Einwilligung abgefragt wurde, erfolgt die Verarbeitung ausschlie&szlig;lich auf Grundlage von Art. 6 Abs. 1 lit. a DSGVO; die Einwilligung ist jederzeit widerrufbar.</p>
    <p>Weitere Informationen &uuml;ber Datenschutz bei YouTube finden Sie in deren Datenschutzerkl&auml;rung unter: <a href="https://policies.google.com/privacy?hl=de" target="_blank" rel="noopener noreferrer">https://policies.google.com/privacy?hl=de</a>.</p>
    <h3>Font Awesome (lokales Hosting)</h3>
    <p>Diese Seite nutzt zur einheitlichen Darstellung von Schriftarten Font Awesome. Font Awesome ist lokal installiert. Eine Verbindung zu Servern von Fonticons, Inc.&nbsp; findet dabei nicht statt.</p>
    <p>Weitere Informationen zu Font Awesome finden Sie&nbsp;und in der Datenschutzerkl&auml;rung f&uuml;r Font Awesome unter: <a href="https://fontawesome.com/privacy" target="_blank" rel="noopener noreferrer">https://fontawesome.com/privacy</a>.</p>
    <h3>Spotify</h3>
    <p>Auf dieser Website sind Funktionen des Musik-Dienstes Spotify eingebunden. Anbieter ist die Spotify AB, Birger Jarlsgatan 61, 113 56 Stockholm in Schweden. Die Spotify Plugins erkennen Sie an dem gr&uuml;nen Logo auf dieser Website. Eine &Uuml;bersicht &uuml;ber die Spotify-Plugins finden Sie unter: <a href="https://developer.spotify.com" target="_blank" rel="noopener noreferrer">https://developer.spotify.com</a>.</p>
    <p>Dadurch kann beim Besuch dieser Website &uuml;ber das Plugin eine direkte Verbindung zwischen Ihrem Browser und dem Spotify-Server hergestellt werden. Spotify erh&auml;lt dadurch die Information, dass Sie mit Ihrer IP-Adresse diese Website besucht haben. Wenn Sie den Spotify Button anklicken w&auml;hrend Sie in Ihrem Spotify-Account eingeloggt sind, k&ouml;nnen Sie die Inhalte dieser Website auf Ihrem Spotify Profil verlinken. Dadurch kann Spotify den Besuch dieser Website Ihrem Benutzerkonto zuordnen.</p>
    <p>Wir weisen darauf hin, dass bei der Nutzung von Spotify Cookies von Google Analytics eingesetzt werden, sodass Ihre Nutzungsdaten bei der Nutzung von Spotify auch an Google weitergegeben werden k&ouml;nnen. Google Analytics ist ein Tool des Google-Konzerns zur Analyse des Nutzerverhaltens mit Sitz in den USA. F&uuml;r diese Einbindung ist allein Spotify verantwortlich. Wir als Websitebetreiber haben auf diese Verarbeitung keinen Einfluss.</p>
    <p>Die Speicherung und Analyse der Daten erfolgt auf Grundlage von Art. 6 Abs. 1 lit. f DSGVO. Der Websitebetreiber hat ein berechtigtes Interesse an der ansprechenden akustischen Ausgestaltung seiner Website. Sofern eine entsprechende Einwilligung abgefragt wurde (z. B. eine Einwilligung zur Speicherung von Cookies), erfolgt die Verarbeitung ausschlie&szlig;lich auf Grundlage von Art. 6 Abs. 1 lit. a DSGVO; die Einwilligung ist jederzeit widerrufbar.</p>
    <p>Weitere Informationen hierzu finden Sie in der Datenschutzerkl&auml;rung von Spotify: <a href="https://www.spotify.com/de/legal/privacy-policy/" target="_blank" rel="noopener noreferrer">https://www.spotify.com/de/legal/privacy-policy/</a>.</p>
    <p>Wenn Sie nicht w&uuml;nschen, dass Spotify den Besuch dieser Website Ihrem Spotify-Nutzerkonto zuordnen kann, loggen Sie sich bitte aus Ihrem Spotify-Benutzerkonto aus.</p>
    <p>Quelle: <a href="https://www.e-recht24.de">e-recht24.de</a></p>
</div>
</div>

<div id="overlay"></div>

<?php
get_footer();
?>