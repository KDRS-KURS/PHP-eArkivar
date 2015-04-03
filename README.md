# PHP-eArkivar
Introduksjonskurs om PHP-skript med grunnleggende elementer i PHP mot databaser og xml.

PHP-eksempelkoder ligger i hovedmappe <a href="https://github.com/KDRS-KURS/PHP-eArkivar/tree/master/php" target="_blank">php</a> med undermapper.<br>
MySQL-eksempeldatabaser og spørringer for å lage bruker og sette tilgang ligger i hovedmappe <a href="https://github.com/KDRS-KURS/PHP-eArkivar/tree/master/mysql" target="_blank">mysql</a>.<br>
Dokumentasjon fra kurset ligger i hovedmappe <a href="https://github.com/KDRS-KURS/PHP-eArkivar/tree/master/doc" target="_blank">doc</a>.

Mer informasjon og analyse av ADDML finnes i prosjektet <a href="https://github.com/KDRS-SA/elarkiv-database-demo" target="_blank">KDRS Elarkiv Database Demo</a><br>
<a href="https://github.com/KDRS-SA/elarkiv-database-demo/tree/master/standards/addml" target="_blank">ADDML mappe i KDRS Elarkiv Database Demo</a><br>

Vil du ha tilgang til å redigere koden i dette GitHub-prosjektet eller har andre spørsmål?<br>
Send epost til <mailto:torbjorn.aasen@ikamr.no><br>

KDRS Open Source har egen JIRA-konto (mer info kommer).<br>
http://kdrs-open-source.atlassian.net

## PHP XML ##

XML-dokumentasjon i PHP er litt forvirrende siden hovedside for informasjon er litt ustrukturert og med beslektede emner.<br>
http://php.net/manual/en/refs.xml.php<br>

Kort presentasjon av hovedelementene for å behandle XML i PHP:<br>

1. PHP XML DOM - Document Object Model - operasjoner mot XML-dokumenter med DOM API.<br>
Laster hele XML-filen i minnet; fort problemer med store filer, men veldig rask.<br>
DOM bruker UTF-8 tegnsett. Bruk utf8_encode() og utf8_decode() ved bruk av ISO-8859-1 tegnsett og iconv for andre tegnsett<br>
This extension requires the libxml PHP extension. This means that passing in --enable-libxml is also required, although this is implicitly accomplished because libxml is enabled by default.<br>
http://php.net/manual/en/book.dom.php<br>

2. PHP SimpleXML - Veldig enkelt å bruke verktøykasse for å konvertere XML til objekt som kan prosesseres med "property selevtors and array iterators".<br>
Laster hele XML-objektet i minnet.<br>
This extension is enabled by default. It may be disabled by using the following option at compile time: --disable-simplexml<br>
http://php.net/manual/en/book.simplexml.php<br>

3. PHP XML Parser - SAX-basert.<br>
Analyserer syntaktisk (parse) XML-dokumenter, men kan ikke validere XML.<br>
Hendelsesbasert, bedre minnehåndtering (laster ikke hele filen inn i minnet).<br>
Støtter tegnsettene som i PHP: US-ASCII, ISO-8859-1 og UTF-8 (men ikke UTF-16).<br>
http://php.net/manual/en/book.xml.php

4. PHP XMLReader - SAX-basert XML Pull parser (syntaktisk analyse)<br>
Leser gjennom dokumentet fra en XML-node til den neste og er derfor minneeffektiv og kan lese gjennom store XML-dokumenter uten minneproblemer (fordi bare deler av XML-objektet lastes inn i minnet om gangen).<br>
Internt bruker libxml UTF-8 tegnsett slik at innholdet vil alltid være i UTF-8.<br>
http://php.net/manual/en/book.xmlreader.php<br>

5. PHP XMLWriter - SAX-basert XML generator som skriver XML-data fortløpende.<br>
http://php.net/manual/en/book.xmlwriter.php<br>

## Verktøy ###
Alternativer for kursdeltakere:<br>
Se på og redigere PHP-kode.<br>
MySQL database til egen lokal PC som PHP-kode kan koble seg opp og teste mot.

### PHP editor ###
geany er PHP-redigeringsprogram (IDE):<br>
https://download.geany.org/geany-1.23_setup.exe

PHP dokumentasjon (syntaks, funksjoner og parametre):<br>
http://php.net

PHP-klient må være installert på din lokale PC for at du skal kunne kjøre PHP-script fra kommandolinje.<br>
https://github.com/KDRS-KURS/PHP-eArkivar/blob/master/doc/Programvare%20for%20kurset.pdf<br>

Kompendium til PHP-kurs for eArkivarer har PHP kode-eksempler som kan kjøres på lokal PC.<br>
https://github.com/KDRS-KURS/PHP-eArkivar/blob/master/doc/php_for_earkivarer.pdf<br>

PHP eksempel-filer som gitt kursdeltakerne for nedlasting ved kursstart (fra KDRS sine nettside):<br>
https://github.com/KDRS-KURS/PHP-eArkivar/tree/master/php/01_eksempler_fra_thomas<br>

Tillegg til PHP-eksempler fra kursleder Thomas underveis i kurset:<br>
https://github.com/KDRS-KURS/PHP-eArkivar/tree/master/php/02_tillegg_fra_thomas<br>

Redigerte, restrukturert og videreførte eksempler (kompletteres videre etter kurset):<br>
https://github.com/KDRS-KURS/PHP-eArkivar/tree/master/php/03_redigert_eksempler<br>

Har du ikke et eksisterende MySQL-miljø og erfaring med bruk av denne, så kan brukerveiledning for installasjon og bruk av Uniform Server følges som vist i seksjonen under.

Test om PHP-klient er riktig installert på din PC:<br>
- Hold inne Windows-tast og tast "R".<br>
- Tast "cmd" i dialogvindu og klikk "OK".<br>
- Du har no fått åpnet Windows konsollvindu.<br>
- Tast "php -v" for å sjekke at PHP kan kjøres og vise versjon installert (viser eks. [PHP 5.6.5 (cli)...])<br>
- Gå til katalog med PHP-script som du vil kjøre:.<br>
-- Gå til harddisk C: [cd c:]<br>
-- Gå til topp/rot-katalog: [cd \]<br>
-- Gå til underkatalog (relativ til der du er no), eks. "php-kurs": [cd php-kurs]<br>
-- List opp i innhold i katalog: [dir]<br>

- Kjør en lokal PHP-fil i den katalogen du er på no, eks. "test.php": [php test.php]<br>
- Altså "php" etterfulgt av mellomrom og php-fil som du vil kjøre.<br>

- Tips: Alle kommandoer i windows konsollvindu har <tab-tast> som hjelpetast for autoutfylling.<br>
-- Trykk <tab-tast> gjentatte ganger for å bla gjennom filene i den katalogen du står i.<br>
-- Tast php og mellomrom først, deretter trykk <tab-tast> gjentatte ganger for å bla gjennom filer.<br>
-- Man slepper å taste hele eller nøyaktig lange filnavn.<br>

### MySQL server ###
Uniform Server brukes som et komplett WAMP-kjørende miljø på Windows PC:<br>
WAMP = Windows - Apache - MySQL - PHP

Uniform Server 11.5.2<br>
http://obj.kdrs.no/utilities/uniform-server/11_5_2_ZeroXI.exe <br>
http://obj.kdrs.no/utilities/uniform-server/Uniform_Server_11_5_2_checksum.txt<br>
http://obj.kdrs.no/utilities/uniform-server/Uniform_Server_11_5_2_readme.txt<br>

Uniform Server 11.5.2. installasjonsveiledning inkl. MySQL testdatabase(r) for Noark 5

I. Last ned katalogene 'php' og 'mysql' fra https://github.com/KDRS-KURS/PHP-eArkivar
II. Last ned Uniform Server 11.5.2

1. Kjør 11_5_2_ZeroXI.exe for å pakke ut Uniform Server lokalt.<br>
2. Flytt utpakket mappe ..\UniServerZ til C:\UniServerZ (eller annen harddiskpartisjon enn C:).<br>
3. Endre navn på denne hovemappa til å bli C:\uniserver-11.5.2<br>
4. Start UniController.exe fra denne hovekatalogen slik at Uniform Server startes.<br>
5. Klikk på knapp "Start Apache" for å starte Apache webserver (gir grønn firkant til høyre).<br>
   Standard nettleser åpnes no i 3 faner som viser at Apache webserver kjører på lokal PC
   Hvis standard TCPIP-porter som Apache og MySQL bruker er opptatt av andre programmer får du feilmelding.
   I så fall stopp disse programmene/tjenestene, men får du det ikke til så be om hjelp.
6. Klikk på knapp "Start MySQL" for å starte MySQL databasen (gir grønn firkant til høyre).<br>
7. Klikk på knapp "phpMyAdmin" for å starte MySQL administrasjonskonsoll i standard nettleser.<br>
8. Klikk på knapp "Import" i phpMyAdmin toppmeny, velg radiobutton "Browse your computer".<br
9. Klikk på knapp "Bla gjennom" og velg fila "noark5.sql" fra "mysql" katalogen som er lastet ned.<br>
10. Klikk på knapp "Go" nederst på nettsida og vent til importjobben er kjørt ferdig.<br>
11. Gjenta steg 8-10 og kjør import av "create_user.sql".<br>
    Dette oppretter bruker "noarkBruker" med passord "noarkPassord" i MySQL-databasen.<br>
12. Gjenta steg 8-10 og kjør import av "grant_user.sql".<br>
    Dette gir noarkBruker tilgang til databasen "noark5".<br>
13. Test lokal oppkobling mot MySQL ved å kjøre mysql-connect-unif-11.5.2.bat<br>
    Angi passord 'noarkPassord'<br>
	Tast [use noark5;] for å angi database i MySQL.<br>
	Tast [show tables;] for å liste opp alle tabeller i databasen.<br>
	Hvis dette virker så skal PHP-eksemplene som kobler seg opp mot MySQL databasen også virke.

Valgfritt:<br>
Gjenta steg 8-9-10 for "tildatabase.sql".<br>
Gjenta steg 12 for "grant_user_tildatabase.sql".<br>

tildatabase har identisk struktur som noark5, men noen av originalfilene vedlagt PHP-kurrset (de som finnes i mappa \php\01_eksempler_fra_thomas ) har "tildatabase" som mål-database i PHP-koden.<br>

Vellykket import viser følgende resultat i nettleseren når importen er ferdig:

noark5<br>
Import has been successfully finished, 136 queries executed. (noark5.sql)

tildatabase.sql<br>
Import has been successfully finished, 239 queries executed. (tildatabase.sql)
