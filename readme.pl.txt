POLSKA, KLIKALNA MAPA WOJEWÓDZTW
==================================
http://winstonwolf.pl/css,polska.html

WERSJA - 1.3 - 26.10.2009
AUTOR - Winston_Wolf http://winstonwolf.pl/contact.html
----------------------------------

LICENCJA
Creative Commons - Attribution-Share Alike 3.0
http://creativecommons.org/licenses/by-sa/3.0/

Wolno: 
- kopiować
- rozpowszechniać
- tworzyć produkty zależne

Na następujących warunkach: 
- uznanie autorstwa - produkt należy oznaczyć w sposób określony przez autora
- produkt zależny można rozpowszechniać tylko na tych samych warunkach
----------------------------------



1. CO TO JEST?
==================================
Przykład zastosowania kaskadowych arkuszy stylów (CSS) oraz skryptów jQuery dla odnośników o nieregularnych kształtach w mapce województw.
Cały system oparty jest na prostej liście nieuporządkowanej, jednym pliku graficznym z mapką oraz odpowiednim rozmieszczeniu span.ów dla uzyskania nieregularności kształtów.




2. INSTALACJA
==================================
- HTML/xHTML
----------------------------------
W kodzie swojej strony (twoja_strona.html) wklej listę województw:

     <div id="wojewodztwa">
      <ul id="w">
       <li id="w1"><a href="#" title="Dolnośląskie">Dolnośląskie</a></li>
       <li id="w2"><a href="#" title="Kujawsko-pomorskie">Kujawsko-pomorskie</a></li>
       <li id="w3"><a href="#" title="Lubelskie">Lubelskie</a></li>
       <li id="w4"><a href="#" title="Lubuskie">Lubuskie</a></li>
       <li id="w5"><a href="#" title="Łódzkie">Łódzkie</a></li>
       <li id="w6"><a href="#" title="Małopolskie">Małopolskie</a></li>
       <li id="w7"><a href="#" title="Mazowieckie">Mazowieckie</a></li>
       <li id="w8"><a href="#" title="Opolskie">Opolskie</a></li>
       <li id="w9"><a href="#" title="Podkarpackie">Podkarpackie</a></li>
       <li id="w10"><a href="#" title="Podlaskie">Podlaskie</a></li>
       <li id="w11"><a href="#" title="Pomorskie">Pomorskie</a></li>
       <li id="w12"><a href="#" title="Śląskie">Śląskie</a></li>
       <li id="w13"><a href="#" title="Świętokrzyskie">Świętokrzyskie</a></li>
       <li id="w14"><a href="#" title="Warmińsko-mazurskie">Warmińsko-mazurskie</a></li>
       <li id="w15"><a href="#" title="Wielkopolskie">Wielkopolskie</a></li>
       <li id="w16"><a href="#" title="Zachodniopomorskie">Zachodniopomorskie</a></li>
      </ul>
     </div>

UAWAGA!
To chyba jasne, ale: ten fragment musi znaleźć się między znacznikami <body> a </body> !!!


- CSS
----------------------------------
W katalogu z mapką w wybranym rozmiarze (nazwy katalogów odpowiadają rozmiarom mapek) otwórz plik style.css
Skopiuj wszystko między komentarzami:

/* --- mapka --- */
...

...
/* koniec mapki */

Otwórz plik arkusza stylów Twojej strony (twoje_style.css) i wklej skopiowany wcześniej fragment kodu.


- JAVASCRIPT/JQUERY
----------------------------------
Skopiuj pliki: jquery-min.js oraz script.js do katalogu swojej strony
W kodzie strony (twoja_strona.html) między znacznikami <head> a </head> wklej:

  <script type="text/javascript" src="/twoj_katalog/jquery-min.js"></script>
  <script type="text/javascript" src="/twoj_katalog/script.js"></script>

UAWAGA!
Nie zapomnij zmienić ścieżki do katalogu, w którym umieściłeś pliki: jquery-min.js oraz script.js !!!


- MAPA
----------------------------------
Plik polska.png najlepiej umieść w tym samym katalogu co plik arkusza stylów (twoje_style.css). W przypadku wybrania innego katalogu konieczna będzie zmiana ścieżki do pliku w Twoim arkuszu stylów:

 #w,#w span.bg{background:transparent url('/twoj_katalog/polska.png') no-repeat -9999px 0}

UWAGA!
Powyższy fragment znajdziesz w kodzie skopiowanym kilka chwil wcześniej do pliku twoje_style.css



3. EDYCJA
==================================
- LISTA WOJEWÓDZTW
----------------------------------
Położenie listy województw możesz ustawić zmieniając klasę listy #w [ <ul id="w" class="ukryta"> ]

Dostępne opcje:
 - ukryta (domyślnie brak listy województw)
 - po_lewej (lista województw po lewej stronie mapy)
 - po_prawej (lista województw po prawej stronie mapy)
 - ponizej (lista województw poniżej mapy)
 - ponizej dwie_kolumny (lista poniżej mapy w dwóch kolumnach - dla mapek 500 oraz 400px)
 - ponizej trzy_kolumny (list poniżej mapy w trzech kolumnach - tylko dla mapki 500px!

- CSS
----------------------------------
Styl listy województw możesz edytować w dowolny sposób ustawiając odpowiednie parametry dla #w a .. Najważniesze dobrze dobrać rozmiar czcionki ..

UWAGA!
Pozostałego fragmentu arkusza stylów najlepiej nie edytuj!

Jeżeli mapka została osadzona w nadrzędnym <div id="wojewodztwa"> najlepiej nadać mu odpowiednią wysokość oraz szerokość .. dostosowaną do rozmiaru czcionki listy województ oraz mapki.


- PSD
----------------------------------
W pliku źródłowym (css-polska-[rozmiar].psd) każde województwo znajduje się na oddzielnej warstwie w dwóch grupach:
 - 'wojewodztwa' - podstawowy wygląd mapy
 - 'wojewodztwa hover' - wygląd mapki po najechaniu na nią myszką
Dodatkowe warstwy:
 - polska - kształt wszystkich połączonych województw
 - Layer 0 - tło strony

 Możesz edytować:
 - kolor kształtu
 - styl kształtu
 - kolor obramowania
 
 Czego nie wolno?
 - NIE ZMIENIAJ POŁOŻENIA MAPEK!
 - Najlepiej nie zmieniaj szerokości obramowania (1px) oraz położenia (outside/center) - inna szerokość oraz położenie nie było testowane, a ewentualne zmiany mogą spowodować przesunięcie mapek na stronie

UWAGA!
Przed zapisaniem pliku należy usunąć lub ukryć warstwę Layer 0 .. gotowy plik musi być przeźroczysty!
Plik polska.png MUSI być zapisany jako transparentny .png 24 bit !!!



4. HISTORIA WERSJI
==================================
1.3
 - poprawiono wszytkie znane błędy z wyświetlaniem listy
1.1
 - optymalizacja skryptu
1.0
 - cztery rozmiary map: 230x215px, 320x310px, 440x410px, 540x500px
 - poprawiony i zoptymalizowany kod arkuszy stylów CSS
 - możliwość wyboru wyświetlania oraz położenia listy województw
 - jeden plik graficzny dla każdego rozmiaru mapy
 - poprawione pliki źródłowe (.psd)
0.7
 - możliwość przesunięcia listy województw pod mapkę
0.6
 - uproszczony kod HTML/xHTML, zoptymalizowane pliki źródłowe (.psd)
0.5
 - mapka w pełni klikalna
0.3
 - mapka bardziej dokładna, jednak nieklikalna
0.1
 - mapka oparta o czysty CSS