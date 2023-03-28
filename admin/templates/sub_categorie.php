<?php $title = "Accueil"; ?>
<?php ob_start(); ?>
<h1 class="mb-5"><a href="../public/index.php?page=category" class="btn btn-secondary me-3">Retour</a>SOUS-CATEGORIE</h1>

<h2 class="mb-5 mt-5">Toutes les sous-catégories<a href="../public/index.php?page=add_Scategory" class="btn btn-primary ms-3">Ajouter</a></h2>
<table class="table mb-5" style="margin-top: 15px; width:100%">
    <thead class="table-dark">
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Catégorie parente</th>
            <th class="col-2 text-center">Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach($s_categories as $s_categorie){?>
        <tr class="table-striped">
            <td><?=$s_categorie['name']?></td>
            <td><?=$s_categorie['description']?></td>
            <td><?=$s_categorie['cat_name']?></td>
            <td><a href="index.php?page=delete_Scategoriy&id=<?php echo $s_categorie['id']?>" class="btn btn-danger w-100" onclick="return(confirm('Voulez-vous supprimer cette entrée ?'));">Supprimer</a>
            <a href="../public/index.php?page=edit_Scategoriy&id=<?php echo $s_categorie['id']?>" class="btn btn-secondary w-100 mt-1">Modifier</a></td></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php $content = ob_get_clean();?>
<?php require('../templates/layout.php') ?>