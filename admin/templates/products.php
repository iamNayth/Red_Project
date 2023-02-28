<?php $title = "Accueil"; ?>
<?php ob_start(); ?>
    <h1 class="mb-5">PRODUITS</h1>
    <a href="../public/index.php?page=add_product" class="btn btn-primary">Ajouter</a>
    <h2 class="mb-5 mt-5">Tout les produits</h2>
    <table class="table mb-5" style="margin-top: 15px; width:100%">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Identifiant Produit</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix</th>
            <th class="col-2 text-center">Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach($products as $product){?>
        <tr class="table-striped">
            <td><?=$product['id']?></td>
            <td><?=$product['name']?></td>
            <td><?=$product['description']?></td>
            <td><?=$product['img_path']?></td>
            <td><a href="index.php?page=prod$products&id=<?php echo $product['id']?>" class="btn btn-danger w-100" onclick="return(confirm('Voulez-vous supprimer cette entrée ?'));">Supprimer</a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php $content = ob_get_clean();?>
<?php require('layout.php') ?>