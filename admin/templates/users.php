<?php $title = "Clients"; ?>
<?php ob_start(); ?>
    <h1 class="mb-5">CLIENTS</h1>
    <a href="../public/index.php?page=" class="btn btn-primary">Ajouter</a>
    <h2 class="mb-5 mt-5">Tout les clients</h2>
    <table class="table mb-5" style="margin-top: 15px; width:100%">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Genre</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th class="col-2 text-center">Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach($users as $user){?>
        <tr class="table-striped">
            <td><?=$user['id']?></td>
            <td><?=$user['gender']?></td>
            <td><?=$user['first_name']?></td>
            <td><?=$user['name']?></td>
            <td><?=$user['email']?></td>
            <td><a href="index.php?page=users&id=<?php echo $user['id']?>" class="btn btn-danger w-100" onclick="return(confirm('Voulez-vous supprimer cette entrée ?'));">Supprimer</a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php $content = ob_get_clean();?>
<?php require('layout.php') ?>