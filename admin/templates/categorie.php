<?php $title = "Catégorie"; ?>
<?php ob_start(); ?>
    <h1 class="mb-5">CATEGORIE</h1>
    <a href="../public/index.php?page=add_categorie" class="btn btn-primary">Ajouter</a>
    <h2 class="mb-5 mt-5">Toutes les catégories</h2>
    <table class="table mb-5" style="margin-top: 15px; width:100%">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Chemin image</th>
            <th class="col-2 text-center">Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach($categories as $categorie){?>
        <tr class="table-striped">
            <td><?=$categorie['id']?></td>
            <td><?=$categorie['name']?></td>
            <td><?=$categorie['description']?></td>
            <td><?=$categorie['img_path']?></td>
            <td><a href="index.php?page=categories&id=<?php echo $categorie['id']?>" class="btn btn-danger w-100" onclick="return(confirm('Voulez-vous supprimer cette entrée ?'));">Supprimer</a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<h1 class="mb-5">SOUS-CATEGORIE</h1>
<a href="../public/index.php?page=add_Scategorie" class="btn btn-primary">Ajouter</a>
<h2 class="mb-5 mt-5">Toutes les sous-catégories</h2>
<table class="table mb-5" style="margin-top: 15px; width:100%">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th><!---Catégorie parente!--></th>
            <th class="col-2 text-center">Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach($s_categories as $s_categorie){?>
        <tr class="table-striped">
            <td><?=$s_categorie['id']?></td>
            <td><?=$s_categorie['name']?></td>
            <td><?=$s_categorie['description']?></td>
            <td></td>
            <td><a href="index.php?page=categories&id=<?php echo $s_categorie['id']?>" class="btn btn-danger w-100" onclick="return(confirm('Voulez-vous supprimer cette entrée ?'));">Supprimer</a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php $content = ob_get_clean();?>
<?php require('layout.php') ?>