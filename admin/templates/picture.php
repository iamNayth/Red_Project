<?php $title = "Photos"; ?>
<?php ob_start(); ?>
    <h1 class="mb-5">Images</h1>
    <h2 class="mb-5">Toutes les images</h2>
    <a href="../public/index.php?page=add_picture" class="btn btn-primary">Ajouter</a>
    <table class="table mb-5 mt-5" style="margin-top: 15px; width:100%">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Chemin</th>
            <th>Apercu</th>
            <th class="col-2 text-center">Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach($pictures as $images){?>
        <tr class="table-striped">
            <td><?=$images['id']?></td>
            <td><?=$images['name']?></td>
            <td><?=$images['path']?></td>
            <td><img src="<?=$images['path']?>" class="rounded"></td>
            <td><a href="index.php?page=delete_picture&id=<?php echo $images['id']?>" class="btn btn-danger w-100" onclick="return(confirm('Voulez-vous supprimer cette entrée ?'));">Supprimer</a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php $content = ob_get_clean();?>
<?php require('../templates/layout.php') ?>