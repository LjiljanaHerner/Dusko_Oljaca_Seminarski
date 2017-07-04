<?php

use Illuminate\Database\Seeder;

class PostsTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert(array(
			array('naslov' => 'O aplikaciji', 'body' => 'Ovo je moj seminarski rad iz PHP-a rađen u Laravel framework-u. Aplikacija je osmišljena da bude kao Blog u kom registrirani korisnici mogu pisati i objavljivati svoje postove. Neregistrirani korisnici, koji dođu na aplikaciju, mogu čitati i pregledati sve postove svih registriranih korisnika, ali nemaju mogućnost pisanja i objavljivanja svojih postova sve dok se ne registriraju. Isto tako, registrirani korisnici mogu vidjeti i čitati postove drugih registriranih korisnika, ali iste ne mogu uređivati ni brisati što znači da svaki korisnik može uređivati i brisati samo svoje postove i to pod linkom Moji postovi. Na Home stranici nalaze se linkovi na najnovije postove i to na samo 3 najnovija posta određenih po vremenu objavljivanja, s tim da su tu prikazane skraćene verzije postova, znači prikazan je naslov posta, pa sadržaj koji je ograničen da se prikaže samo prvih 300 karaktera tj.slova i prikazan je link Više o tome koji nas preusmjerava na cijeli post. Na Arhiva stranici isto imamo skraćene verzije postova, ali ovdje se nalaze svi postovi svih korisnika složenih od najstarijeg prema najnovijem određeni isto tako po datumu objavljivanja. Ovdje je izvršena paginacija postova i to na 3, znači samo 3 posta se vide po jednoj stranici, a sadržaj je ograničen na 250 slova. Stranica O meni je samo par riječi o mojoj malenkosti dok na stranici Kontakt imamo kontakt formu preko koje mi možete, na moju email adresu, slati sugestije i komentare. Registrirani korisnik ima svoj neki dashboard panel u kojem može kreirati, uređivati, vidjeti i brisati, ali samo svoje postove. Na dropdown-u korisnika imamo Moji postovi i Logout linkove. Na Moji postovi se nalaze svi postovi tog ulogiranog korisnika. Ovdje je isto izvršena paginacija na 3 posta po stranici, a sadržaj ograničen na 50 slova. Prilikom kreiranja posta korisnik može ubaciti i sliku u svoj post. Veličinu slike nisam ograničio tj.validirao i isto tako korisnik može, a ne mora objaviti sliku, znači nije obavezno. Za upload slika sam koristio Intervention Image library koji sam, naravno, kao i svaki drugi servis morao instalirati u Laravel. U jednom postu već sam rekao da sam za kompletan sustav za autorizaciju korisnika koristio laravelov sustav, da koristim MailGun servis za email, kako za kontakt formu tako i za Reset Password ugrađenu laravelovu funkciju. Još samo da napomenem da sam stvorio i sustav za komentiranje koji se nalazi na svakom pojedinom postu gdje nije potrebno da komentator bude registriran već je dovoljno da samo popuni formu za komentar. Sva polja u formi su obavezna, a za odobravanje komentara nije potreban admin već se komentar odmah objavi.', 'user_id' => 1),
			
             array('naslov' => 'Dizajn početne main.blade.php stranice u HTML-u', 'body' => 'Izradu ovog seminarskog rada sam započeo tako da sam prvo u HTML-u izradio početnu (homepage) stranicu u sklopu blade template-a, a to je main.blade.php. Od nje kreće cijeli vizuelni izgled ove web stranice. Laravel, kao i cijelo objektno-orijentirano programiranje (OOP), se zasniva na tome da se veće cjeline pokušaju razbiti na manje kako zbog kompleksnosti tako i zbog kasnijeg lakšeg upravljanja i modificiranja aplikacije pa sam upravo zbog toga main.blade.php minimalizirao sa kodom tj. razbio sam je na više bitnih cjelina koje se nalaze u folderu partials. Naravno, te bitne cjeline se nalaze tj.ponavljaju u svakoj pojedinoj stranici ove aplikacije, a to su: _head.blade: php, _nav.blade.php, _footer.blade.php, _javascript.blade.php i _messagges.blade.php. Svim tim fajlovima sam dodijelio, po nekoj laravelovoj konvekciji,  ispred imena crticu, ali donju, da se zna da se radi o partials fajlovima.' , 'user_id'=> 2),
			 
             array('naslov' => 'Forma i validacija forme uz pomoć Parsley javascript library', 'body' => 'Za forme sam instalirao laravelov paket Laravel Collective, i to Form i HTML, i to je baš moćan paket za pravljenje forme zato što ima dosta prednosti za razliku od obične html forme. Jedna od najvećih prednosti je to što automatski uključuje csrf polje, a samim tim i csrf zaštitu. Za validaciju forme kao što je forma koja se nalazi u posts/create.blade.php koristio sam javascript validaciju, točnije parsley javascript library koja uključuje fajlove koji se nalaze u public folderu, a to su js/parsley.min.js i css/parsley.css. Laravelova validacija forme je puno sigurnija, ali ona je više server side validacija, ali nije baš kako bi se to reklo user experience, za razliku od validacije uz pomoć parsley javascripte. Nakon instalacije parsley validacije importovao sam i prijevod tj. lokalni jezik za parsley-ev generator grešaka, i taj fajl hr.js se nalazi u public/js/i18n folderu.', 'user_id' => 1),
			 
			 array('naslov' => 'Autorizacija korisnika i email postavke', 'body' => 'Za autorizaciju korisnika koristio sam već ugrađenu laravelovu autorizaciju mada smo mi na aplikaciji koju smo na nastavi gradili, znači  Algebra Box, koristili Sentinelovu autorizaciju i autentikaciju. Uz malo truda i vremena cijeli sustav sam jako brzo izgradio, uključujući u to Password Reset, koji korisniku šalje na email link u kojem može stvoriti novu lozinku. Za slanje email-ova, kako na Kontakt stranici tako i na Password Reset autorizaciji koristim MailGun servis koji smo radili i na aplikaciji Algebra Box u toku nastave. Email forma na Kontakt stranici je preusmjerena da šalje na moju email adresu, dule_bamboocha@hotmail.com. Da bi se preusmjerilo da šalje na neku drugu adresu potrebno je verificirati taj račun MailGun websajtu, i ovdje u aplikaciji na PagesController-u u public function postKontakt funkcijom pod Mail::send, u varijabli $message->to upisati željenu email adresu na koju će stizati pošta koja je poslana preko kontakt forme.', 'user_id' => 2),
			 
			 array('naslov' => 'Paginacija', 'body' => 'U slučaju da, u ovom slučaju pošto se radi o blog post aplikaciji, aplikacija ima jako puno postova, npr. 50 ili 100, bilo bi jako nepregledno da se svi postovi prikažu na jednoj stranici. Onda se u tom slučaju radi tkz.paginacija koja automatski dijeli i slaže postove na više stranica i tako prikazuje samo određen broj postova po stranici. Npr. Imamo 50 postova, i sa funkcijom paginate(5) ograničili smo da se samo 5 postova prikaže po jednoj stranici odnosno prikazu, ali smo zato dobili dolje ispod prikazanih 5 postova, još 10 narednih stranica koje redom otvaraju sljedećih 5 postova.', 'user_id' => 1)
             

          ));
    }
}
