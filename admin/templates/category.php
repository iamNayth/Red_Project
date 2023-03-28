<?php $title = "Catégorie"; ?>
<?php ob_start(); ?>
    <h1 class="mb-5">CATEGORIE</h1>
    
    <a href="../public/index.php?page=sub_category" class="btn btn-light">Afficher les sous-catégories</a>
    <h2 class="mb-5 mt-5">Toutes les catégories<a href="../public/index.php?page=add_category" class="btn btn-primary ms-3">Ajouter</a></h2>
    <table class="table mb-5" style="margin-top: 15px; width:100%">
    <thead class="table-dark">
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Image</th>
            <th class="col-2 text-center">Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach($categories as $categorie){?>
        <tr class="table-striped">
            <td><?=$categorie['name']?></td>
            <td><?=$categorie['description']?></td>
            <td><img src='<?=$categorie['img_path']?>'></td>
            <td><a href="index.php?page=delete_category&id=<?php echo $categorie['id']?>" class="btn btn-danger w-100" onclick="return(confirm('Voulez-vous supprimer cette entrée ?'));">Supprimer</a>
            <a href="index.php?page=edit_category&id=<?php echo $categorie['id']?>" class="btn btn-secondary w-100 mt-1">Modifier</a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php $content = ob_get_clean();?>
<?php require('../templates/layout.php') ?>