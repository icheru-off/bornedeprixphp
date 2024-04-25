<html>
    
<head>
    <title>Borne de Prix Projet Jules</title>
    
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body>
    
    <div id="system-time"></div>
    
    <div id="container">
        
        <img id="logo" src="logo/logo.webp">
        
        <h1 id="welcome">Bienvenue sur la Borne de Prix</h1>
        
        <h3>Scannez le code-barres de votre produit pour obtenir les informations.</h3>
        
        <form id="barcodeForm" action="rechercher.php" method="post">

            <input type="hidden" name="code_barre" id="code_barre_hidden">
            
            <input type="submit" id="submitBtn" style="display: none;">
            
        </form>
    </div>

    <script src="js/script.js"></script>
    <script>
        // Variable pour stocker le code-barres saisi
        var barcode = '';

        // Détecter les entrées clavier
        document.addEventListener('keydown', function(event) {
            // Si la touche enfoncée est "Entrée"
            if (event.keyCode === 13) {
                // Empêcher le comportement par défaut de la touche "Entrée" (soumission du formulaire)
                event.preventDefault();
                
                // Mettre à jour la valeur de l'input caché avec le code-barres
                document.getElementById('code_barre_hidden').value = barcode;
                
                // Soumettre automatiquement le formulaire
                document.getElementById('barcodeForm').submit();
                
                // Réinitialiser le code-barres pour la prochaine saisie
                barcode = '';
            } else {
                // Ajouter le caractère de la touche enfoncée au code-barres
                barcode += event.key;
            }
        });
        
    </script>
</body>
</html>
