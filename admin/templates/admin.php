<?php $title = "Admin"; ?>
<?php ob_start(); ?>
    <h1>ADMIN</h1>
    <table class="table table-bordered mx-auto" style="margin-top: 15px">
    <thead>
        <tr>
            <th>ID</th>
            <th>Pseudo</th>
            <th>Email</th>
            <th class="col-2 text-center">Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
        //Récupération des données de l'administrateur
        foreach($admins as $admin){?>
        <tr>
            <td><?=$admin['id']?></td>
            <td><?=$admin['nickname']?></td>
            <td><?=$admin['email']?></td>
            <td>
                <div class="container d-flex flex-column justify-content-evenly" style="height: 170px">
                    <div class="row">
                        <a href="index.php?page=14&idproduct=<?php echo $admin['id']?>" class="btn btn-primary">Ajouter une photo</a>
                    </div>
                    <div class="row">
                        <a href="index.php?page=3&id=<?php echo $admin['id']?>" class="btn btn-warning w-50">Modifier</a>
                        <a href="index.php?page=4&id=<?php echo $admin['id']?>" class="btn btn-danger w-50" onclick="return(confirm('Voulez-vous supprimer cette entrée ?'));">Supprimer</a>
                    </div>
                </div>      
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php $content = ob_get_clean();

require('layout.php');?>