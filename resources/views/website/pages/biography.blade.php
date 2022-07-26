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
            <div class="col-12 col-md-4">
                <img class="img-fluid" src="{{asset('img/img-template/rudolf-leopold/rudolf-leopold-2.jpg')}}" alt="">
            </div>
            <div class="mt-4 mt-sm-0 col-sm-8">
                <div class="text">
                    <p>The Viennese cellist Rudolf Leopold is one of the most versatile musicians of his generation. He completed his studies at the University of Music and Performing Arts in Vienna, studying cello with Richard Krotschak and Tobias Kühne, and, in addition, piano and composition. As a teenager Rudolf became a member of the Franz Schubert Quartet, which subsequently won the first prize at the European Broadcasting Union competition, resulting in the birth of a career, which included concerts and tours throughout Europe, Australia and the USA.
                    </p>
                    <p>His passion for baroque music led him early on to Nikolaus Harnoncourt and Concentus Musicus, where he recorded, among many other works, the Brandenburg Concertos of Bach. Rudolf was solo cellist for 25 years and he continues his collaboration with Concentus Musicus to the present day. He is also the founder of Il Concerto Viennese, which performed his reconstruction of Bach´s St. Mark´s Passion in 2013 at the festival Osterklang in Vienna, with further performances in Innsbruck and Graz.
                    </p>
                    <p>As a founding member of the renowned Vienna String Sextet, Rudolf enjoyed an international career spanning 25 years. With this ensemble he recorded the bulk of the string sextet literature for EMI and Pan Classics and wrote numerous arrangements for the sextet. His reconstruction of the first version of the Metamorphosen of Richard Strauss was published by Boosey and Hawkes and is performed around the world.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mt-0 col-sm-8 mt-md-4">
                <div class="text">
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
            </div>
            <div class="col-12 col-md-4">
                <img class="img-fluid" src="{{asset('img/img-template/rudolf-leopold/rudolf-leopold-3.jpg')}}" alt="">
            </div>
        </div>
        <!-- ENGLISH-->
        @else
        <!-- DEUTSCH-->
        <div class="row">
            <div class="col-12 col-md-4">
                <img class="img-fluid" src="{{asset('img/img-template/rudolf-leopold/rudolf-leopold-2.jpg')}}" alt="">
            </div>
            <div class="mt-4 mt-sm-0 col-sm-8">
                <div class="text">
                    <p>The Viennese cellist Rudolf Leopold is one of the most versatile musicians of his generation. He completed his studies at the University of Music and Performing Arts in Vienna, studying cello with Richard Krotschak and Tobias Kühne, and, in addition, piano and composition. As a teenager Rudolf became a member of the Franz Schubert Quartet, which subsequently won the first prize at the European Broadcasting Union competition, resulting in the birth of a career, which included concerts and tours throughout Europe, Australia and the USA.
                    </p>
                    <p>His passion for baroque music led him early on to Nikolaus Harnoncourt and Concentus Musicus, where he recorded, among many other works, the Brandenburg Concertos of Bach. Rudolf was solo cellist for 25 years and he continues his collaboration with Concentus Musicus to the present day. He is also the founder of Il Concerto Viennese, which performed his reconstruction of Bach´s St. Mark´s Passion in 2013 at the festival Osterklang in Vienna, with further performances in Innsbruck and Graz.
                    </p>
                    <p>As a founding member of the renowned Vienna String Sextet, Rudolf enjoyed an international career spanning 25 years. With this ensemble he recorded the bulk of the string sextet literature for EMI and Pan Classics and wrote numerous arrangements for the sextet. His reconstruction of the first version of the Metamorphosen of Richard Strauss was published by Boosey and Hawkes and is performed around the world.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mt-0 col-sm-8 mt-md-4">
                <div class="text">
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
            </div>
            <div class="col-sm-4">
                <img class="img-fluid" src="{{asset('img/img-template/rudolf-leopold/rudolf-leopold-3.jpg')}}" alt="">
            </div>
        </div>
        <!-- DEUTSCH-->
        @endif
    </div>
</section>
