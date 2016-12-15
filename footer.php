
</main>
<footer class="ajout">
    <a href="ajoutcarte.php" id="addcard">Ajouter une carte</a>
     <a class="footeradmin" href="admin/cards.php" id="adminversion">Version admin</a>
</footer>
</body>
</html>

<script>
        var filterClasse = document.querySelectorAll('#Select input');

        for(var i = 0; i < filterClasse.length; i++) {
            filterClasse[i].addEventListener('click', function(e) {
                var filterClasse = document.querySelectorAll('#Select input');
                for (var i = 0 ; i < filterClasse.length ; i++) {
                   filterClasse[i].checked = false;
                }
                this.checked = true;
                changeClasse(this.getAttribute('id'));
            })
        }

        var changeClasse = function (classe) {
            var cartes = document.querySelectorAll('.cartes');
            for (var i = 0; i < cartes.length ; i++) {
                var carteClasse = cartes[i].getAttribute('data-classe');
                if (carteClasse == classe) {
                    cartes[i].style.display = 'inline-block';
                } else {
                    cartes[i].style.display = 'none';
                }

                if (classe === 'all') {
                    cartes[i].style.display = 'inline-block';
                }
            }
        }

    </script>
