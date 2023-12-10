<?=view('_partials/header')?>

<h1><?=$title??''?></h1>

<div class="my-3">
    <a class="btn btn-primary" href="/races/add"><i class="me-2 fa-solid fa-plus"></i>Add</a>
</div>

<table class="table">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date</th>
            <th>Circuit</th>
            <th>Winner ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($races as $race):?>
        <tr>
            <td><?=$race->id?></td>
            <td><?=$race->name?></td>
            <td><?=$race->date?></td>
            <td><?=$race->circuit?></td>
            <td><?=$race->winner_id?></td>
            <td>
                <a class="text-warning" href="/races/edit/<?=$race->id?>"><i class="fa-solid fa-pen-to-square"></i></a>
                <a class="text-danger" href="/races/delete/<?=$race->id?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa-solid fa-trash"></i></a>
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
