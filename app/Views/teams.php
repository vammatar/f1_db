<?=view('_partials/header')?>

<h1><?=$title??''?></h1>

<div class="my-3">
    <a class="btn btn-primary" href="/teams/add"><i class="me-2 fa-solid fa-plus"></i>Add</a>
</div>

<table class="table">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Country</th>
            <th>Engine Supplier</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($teams as $team):?>
        <tr>
            <td><?=$team->id?></td>
            <td><?=$team->name?></td>
            <td><?=$team->country?></td>
            <td><?=$team->engine_supplier?></td>
            <td>
                <a class="text-warning" href="/teams/edit/<?=$team->id?>"><i class="fa-solid fa-pen-to-square"></i></a>
                <a class="text-danger" href="/teams/delete/<?=$team->id?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa-solid fa-trash"></i></a>
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
