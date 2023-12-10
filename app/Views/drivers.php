<?=view('_partials/header')?>

<h1><?=$title??''?></h1>

<div class="my-3">
    <a class="btn btn-primary" href="/drivers/add"><i class="me-2 fa-solid fa-plus"></i>Add</a>
</div>

<table class="table">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Nationality</th>
            <th>Date of Birth</th>
            <th>Team ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($drivers as $driver):?>
        <tr>
            <td><?=$driver->id?></td>
            <td><?=$driver->name?></td>
            <td><?=$driver->nationality?></td>
            <td><?=$driver->date_of_birth?></td>
            <td><?=$driver->team_id?></td>
            <td>
                <a class="text-warning" href="/drivers/edit/<?=$driver->id?>"><i class="fa-solid fa-pen-to-square"></i></a>
                <a class="text-danger" href="/drivers/delete/<?=$driver->id?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa-solid fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <th class="table-dark" colspan="10"></th>
        </tr>
    </tfoot>
</table>


<?=view('_partials/footer')?>
