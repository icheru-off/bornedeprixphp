<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de la recherche</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .product-info-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            padding: 20px;
            max-width: 600px;
            margin: 50px auto;
            text-align: center;
        }

        .product-name {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333333;
        }

        .product-image {
            max-width: 50%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .product-details {
            font-size: 18px;
            color: #666666;
        }

        .product-details p {
            margin: 10px 0;
        }

        #logo {
            position: absolute;
            top: 20px;
            right: 20px;
            max-width: 100px; /* Taille maximale du logo */
        }

        /* Style du bouton "J'ai besoin d'aide" */
        #help-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        /* Style de la boîte modale */
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            padding: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 400px;
            text-align: center;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        /* Animation de chargement */
        @keyframes loading {
            0% { content: ""; }
            25% { content: "."; }
            50% { content: ".."; }
            75% { content: "..."; }
            100% { content: ""; }
        }

        .loading-dots::after {
            content: ".";
            animation: loading 1s infinite;
        }
    </style>
</head>
<body>
    <img id="logo" src="logo/logo.webp" alt="Logo">
    <div class="product-info-container">
        <?php
        include("db_connection.php");

        $code_barre = $_POST['code_barre'];

        $sql = "SELECT nom_produit, prix, stock, image_path FROM produits WHERE code_barre = '$code_barre'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nom_produit = $row["nom_produit"];
            $prix = $row["prix"];
            $stock = $row["stock"];
            $image_path = $row["image_path"];
            echo "<html><head><meta http-equiv='refresh' content='7;url=index.php'></head><body>";
            echo "<h2 class='product-name'>$nom_produit</h2>";
            echo "<img class='product-image' src='$image_path' alt='$nom_produit'>";
            echo "<div class='product-details'>";
            echo "<p><strong>Prix:</strong> $prix €</p>";
            echo "<p><strong>Stock disponible:</strong> $stock unités</p>";
            echo "</div>";
        } else {
            echo "<html><head><meta http-equiv='refresh' content='5;url=index.php'></head><body>";
            echo "Nous sommes désolés, mais le produit que vous recherchez n'a pas été trouvé dans notre base de données. Veuillez vérifier les informations saisies et réessayer.";
        }

        $conn->close();
        ?>
    </div>

    <!-- Bouton "J'ai besoin d'aide" -->
    <button id="help-button"><i class="fas fa-question-circle"></i> J'ai besoin d'aide</button>

    <!-- Boîte modale -->
    <div id="help-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Un(e) hôtesse d'accueil arrive !</h2>
            <p>Merci de patienter<span class="loading-dots"></span></p>
        </div>
    </div>

    <script>
        // Afficher la boîte modale lorsque le bouton est cliqué
        document.getElementById("help-button").addEventListener("click", function() {
            document.getElementById("help-modal").style.display = "block";
        });

        // Fermer la boîte modale lorsque l'utilisateur clique sur le bouton de fermeture
        document.getElementsByClassName("close")[0].addEventListener("click", function() {
            document.getElementById("help-modal").style.display = "none";
        });
    </script>
</body>
</html>
