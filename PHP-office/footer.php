<?php
echo '</section>


            </main>
        <footer><a href="ajoutcarte.php">Ajouter une carte</a></footer>
    </body>
</html>';
?>

<script>
        var divHaut = document.querySelector('.top');
        var divBas = document.querySelector('.bot');
        var heroTop = document.querySelector('.herotop');
        var heroBot = document.querySelector('.herobot');
        var btn = document.querySelector('button');
        var heroes = document.querySelectorAll('.hero');

       btn.addEventListener('click', function (e) {
            if (divHaut.style.top === '') {
                divHaut.style.top = '-150%';
                divBas.style.bottom = '-100%';
                heroTop.style.top = '-100% ';
               	heroBot.style.bottom = '-100%';
                btn.style.bottom = '-100%';
            }
            return false;
            //event.preventDefault(e)
        });

        for( i=0 ; i < heroes.length ; i++){
        heroes[i].addEventListener('click', function () {
            if (divHaut.style.top === '') {
                divHaut.style.top = '-150%';
                divBas.style.bottom = '-100%';
                heroTop.style.top = '-100% ';
                heroBot.style.bottom = '-100%';
                btn.style.bottom = '-100%';
            }
        });}

	</script>
