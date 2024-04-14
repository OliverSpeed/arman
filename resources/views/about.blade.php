<x-layouts.app>
    @section('title')Etusivu @endsection
    @section('content')
    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Julkaisut -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">
            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Perushinnastomme</p>
                <div class="p-4">
                    <h1 class="text-xl font-bold mb-4">Autojen pesut</h1>
                    <p class="mb-4">Ulko- ja sisäpesut sekä maalipinnan suojaus & kiillotus ja pinnoitus</p>

                    <h4 class="text-lg font-semibold mb-1">Ulkopesu - alk. 35€ sis.</h4>
                    <ul class="list-disc ml-4 mb-2">
                        <li>Liuotinpesu</li>
                        <li>Vahashampoo pesu (Käsinpesu)</li>
                        <li>Vanteet</li>
                        <li>Oven välit</li>
                    </ul>

                    <h4 class="text-lg font-semibold mb-1">Sisäpuhdistus alk. 80€</h4>
                    <p class="italic mb-4">(sis. Mattojen pesu, imurointi, pintojen pesu ja lasien pesu)</p>
                    <h4 class="text-lg font-semibold mb-1">Muut käsittelyt</h4>
                    <ul class="list-disc ml-4 mb-2">
                        <li>Penkkienpesu alk. 50€</li>
                        <li>Ajovalojen kiillotus alk. 60€</li>
                        <li>Koneellinen kiillotus - alk. 150€</li>
                        <li>Pienten kolhujen ja naarmujen myllytys alk. 50€</li>
                        <li>Kevyt myllytys alk. 150€</li>
                        <li>Syvempi myllytys alk. 250€</li>
                        <li>Kestovahaus alk. 100€</li>
                        <li>Kangaspenkkien ja ovien suojakäsittely, suojaa kangaspenkkejä likaantumiselta ja nesteiltä
                            alk. 150€</li>
                        <li>Hajujen poistot pesemällä ja otsonoimalla alk. 60€</li>
                        <h4 class="italic">(kevyen myllytyksen kanssa pakettihinta 230€ sis. pesun)</h4>
                    </ul>

                    <p class="italic mb-2">Hinnat riippuvat auton koosta: Henkilöauto, maasturi, pakettiauto</p>
                    <p class="italic">Kysy myös viikko/kuukausisopimuksista lomakkeellamme!</p>
                </div>

                <a href="#"
                    class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    Ota yhteyttä
                </a>
            </div>
        </section>

        <!-- Sivu-osio -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">
            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Tietoja meistä</p>
                <p class="pb-2">
                <div class="text-semibold">Meidän kauttamme saat kattavan valikoiman laadukkaita autonhoitopalveluita.
                    Meillä on käytössämme markkinoiden parhaat pesuaineet, pinnoitteet sekä laitteet jotka on tarkoin
                    valikoitu.
                </div><br>Kun haluat panostaa laatuun me olemme sinun valintasi. Meille
                asiakastyytyväisyys on kaikki kaikessa ja tehtävämme on palvella juuri sinua. Räätälöimme aina työn
                sinun tarpeidesi mukaan, kuuntelemme ja neuvomme sinulle oikean palvelun.

                <br><br>
                Toteutamme detailing-työt kaikille yleisimmille ajoneuvotyypeille kovalla ammattitaidolla ja tarkalla
                otteella. Teemme detailingia muun muassa henkilöautoille, pakettiautoille, matkailuautoille ja
                moottoripyörille.

                Detailing-palvelumme on suunnattu kaikille, jotka haluavat pitää hyvää huolta kulkuneuvostaan ja saada
                sen maalipinnan kestämään.

                Palvelemme sekä yrityksiä että yksityishenkilöitä.</p>
                <a href="#"
                    class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    Ota yhteyttä
                </a>
            </div>
            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-1">Sosiaaliset mediamme</p>
                @if(setting('facebook') !== '')
                <a href="https://facebook.com/{{ setting('facebook') }}" target="_blank"
                    class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                    <i class="fab fa-facebook mr-2"></i>{{ setting('facebook') }}
                </a>
                @endif
                @if(setting('facebook') !== '')
                <a href="https://instagram.com/{{ setting('instagram') }}" target="_blank"
                    class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                    <i class="fab fa-instagram mr-2"></i>{{ setting('instagram') }}
                </a>
                @endif
                @if(setting('twitter') !== '')
                <a href="https://twitter.com/{{ setting('twitter') }}" target="_blank"
                    class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                    <i class="fab fa-twitter mr-2"></i>{{ setting('twitter') }}
                </a>
                @endif
            </div>
        </aside>
    </div>

    <x-footer :karuselli="karuselli()" />
    @endsection
</x-layouts.app>