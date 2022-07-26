<section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-100" id="biography">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="section-heading style-2">
                    @if(Session::get('lang') == 'en')
                    <p>Biography</p>
                    @else
                    <p>Biografie</p>
                    @endif
                    <h2>Rudolf Leopold</h2>
                </div>
            </div>
        </div>
        @if(Session::get('lang') == 'en')
        <!-- ENGLISH-->
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-3">
                <img class="img-fluid" src="{{asset('img/img-template/rudolf-leopold/rudolf-leopold-2.jpg')}}" alt="">
            </div>
            <div class="mt-3 mt-md-0 col-12 col-sm-12 col-md-8 col-lg-9">
                <p>The Viennese cellist Rudolf Leopold is one of the most versatile musicians of his generation. He completed his studies at the University of Music and Performing Arts in Vienna, studying cello with Richard Krotschak and Tobias Kühne, and, in addition, piano and composition. As a teenager Rudolf became a member of the Franz Schubert Quartet, which subsequently won the first prize at the European Broadcasting Union competition, resulting in the birth of a career, which included concerts and tours throughout Europe, Australia and the USA.
                </p>
                <p>His passion for baroque music led him early on to Nikolaus Harnoncourt and Concentus Musicus, where he recorded, among many other works, the Brandenburg Concertos of Bach. Rudolf was solo cellist for 25 years and he continues his collaboration with Concentus Musicus to the present day. He is also the founder of Il Concerto Viennese, which performed his reconstruction of Bach´s St. Mark´s Passion in 2013 at the festival Osterklang in Vienna, with further performances in Innsbruck and Graz.
                </p>
                <p>As a founding member of the renowned Vienna String Sextet, Rudolf enjoyed an international career spanning 25 years. With this ensemble he recorded the bulk of the string sextet literature for EMI and Pan Classics and wrote numerous arrangements for the sextet. His reconstruction of the first version of the Metamorphosen of Richard Strauss was published by Boosey and Hawkes and is performed around the world.
                </p>
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-9 mt-3">
                <p>Throughout his career Rudolf has collaborated with prominent artists such as Sabine Meyer, Juliane Banse, Angelika Kirchschlager, Markus Schirmer, Paul Gulda, Benjamin Schmid and Andrea Jonasson and played many recitals and chamber music concerts with his wife, the pianist Teresa Turner-Jones.
                    He was invited by the legendary Alban Berg Quartet to perform Schubert’s famous string quintet, and he continues this tradition, performing the Schubert with the younger quartets of today’s generation.
                </p>
                <p>As a soloist, Rudolf has performed the cello concerto repertoire with orchestra (Dvorak’s Concerto in the Berliner Philharmonie and Tschaikowsky’s
                    Rococo Variations in the Konzerthaus in Vienna) and has revived rarities such as
                    Dohnányi, Enescu and Pfitzner with great success. He was honored to play the premiere performance of Ivan Eröd’s cello concerto at the Styriarte Festival in Graz.</p>
                <p>
                    Rudolf Leopold taught chamber music at the University of Music in Vienna and was Professor of Violoncello at the University of Music and Performing Arts in Graz from 1990 to 2019.
                </p>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-3">
                <img class="img-fluid" src="{{asset('img/img-template/rudolf-leopold/rudolf-leopold-3.jpg')}}" alt="">
            </div>
        </div>
        <!-- ENGLISH-->
        @else
        <!-- DEUTSCH-->
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-3">
                <img class="img-fluid" src="{{asset('img/img-template/rudolf-leopold/rudolf-leopold-2.jpg')}}" alt="">
            </div>
            <div class="mt-3 mt-md-0 col-12 col-sm-12 col-md-8 col-lg-9">
                <p>Der vielseitige Musiker wurde 1954 in Wien geboren und studierte an der
                    dortigen Musikhochschule Violoncello bei Richard Krotschak und Tobias Kühne,
                    daneben Klavier und Tonsatz.
                    Seine Laufbahn begann 1974, als er den 1. Preis beim Wettbewerb der
                    European Broadcasting Union als Mitglied des Franz Schubert Quartetts errang,
                    worauf zahlreiche Tourneen durch Europa, in die USA und nach Australien
                    folgten.
                </p>
                <p>Seine Begeisterung für Barockmusik führte ihn zu Nikolaus Harnoncourt, mit
                    dem er schon in seiner Jugend die „Brandenburgischen Konzerte“ aufnahm und
                    bis heute in dem von Harnoncourt gegründeten „Concentus Musicus“ tätig ist.
                    Mittlerweile gründete er sein eigenes Barockensemble „Il Concerto Viennese“,
                    mit dem er 2013 seine Rekonstruktion von Bachs Markuspassion in Wien, Graz
                    und Innsbruck zur Aufführung brachte.
                </p>
                <p>Den Höhepunkt seiner Karriere bildete die Mitwirkung im Wiener Streichsextett,
                    mit dem er 25 Jahre lang die Welt bereiste. Mit diesem Ensemble spielte er die
                    wichtigsten Werke dieser Gattung für EMI und Pan Classics auf CD ein und
                    schrieb auch zahlreiche Bearbeitungen, wie z. B. die Rekonstruktion der
                    Urfassung von Richard Strauss´ „Metamorphosen“, die bei Boosey &amp; Hawkes
                    verlegt ist und heute auf der ganzen Welt gespielt wird.
                </p>
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-9 mt-3">
                <p>Rudolf Leopold hat mit prominenten Künstlern wie Sabine Meyer, Juliane Banse,
                    Angelika Kirchschlager, Markus Schirmer, Paul Gulda, Benjamin Schmid und
                    Andrea Jonasson zusammengearbeitet. Mit seiner Frau, der Pianistin Teresa
                    Turner-Jones spielte er unzählige Duo- und Trioabende.
                    Auch wurde er vom legendären Alban Berg Quartett eingeladen, das
                    Streichquintett von Schubert zu musizieren. Diese Tradition setzt er heute mit
                    Streichquartetten der jüngeren Generation fort.
                </p>
                <p>Als Solist hat Rudolf Leopold nicht nur die bedeutendsten Cellokonzerte
                    aufgeführt ( 2008 Dvoraks Konzert in der Berliner Philharmonie, 2013
                    Tschaikowskys Rokoko-Variationen im Wiener Konzerthaus ), sondern auch
                    Raritäten wie Dohnányi, Enescu und Pfitzner auferweckt und Ivan Eröds
                    Konzert beim Festival Styriarte in Graz uraufgeführt.</p>
                <p>
                    Rudolf Leopold war Dozent für Kammermusik an der Wiener Musikhochschule
                    und danach von 1990 bis 2019 als ordentlicher Professor für Violoncello an der
                    Universität für Musik und darstellende Kunst in Graz tätig.
                </p>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-3">
                <img class="img-fluid" src="{{asset('img/img-template/rudolf-leopold/rudolf-leopold-3.jpg')}}" alt="">
            </div>
        </div>
        <!-- DEUTSCH-->
        @endif
    </div>
</section>
