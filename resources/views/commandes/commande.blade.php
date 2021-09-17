<body style="background-color: lightgray">

<form action="{{ route('store-commande-request') }}" method="post" id="formCommande">
    @csrf
    <div>
        <label for="article">Article</label>
        <input type="text" name="article" id="article" value="">
    </div>

    <div>
        <label for="email">email</label>
        <input type="text" name="email">
    </div>
    <div>
        <label for="telephone">Téléphone</label>
        <input type="text" name="telephone">
    </div>

    <H5>Facturation</H5>
    <div>
        <label for="nom">Nom</label>
        <input type="text" name="nom">
    </div>
    <div>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom">
    </div>
    <div>
        <label for="adresse">Adresse</label>
        <input type="text" name="adresse">
    </div>
    <div>
        <label for="numero_adresse">numéro</label>
        <input type="string" name="numero_adresse">
    </div>
    <div>
        <label for="ville">Ville</label>
        <input type="text" name="ville">
    </div>
    <div>
        <label for="cp">Code postal</label>
        <input type="number" name="cp">
    </div>

    <button type="submit" id="submit-btn">Acheter</button>
</form>
</body>

<script src="https://js.stripe.com/v3/"></script>

<script>

    function r(f){/in/.test(document.readyState)?setTimeout('r('+f+')',9):f()}
    // use like
    r(function(){
        console.log(window.location.search.substr(1));
        document.getElementById('article').value = window.location.search.substr(1);
    });

</script>
