<?=view('_partials/header')?>

<h1><?=$title??''?></h1>

<section class="m-3">

<?=form_open()?>
<?=validation_list_errors()?>
<?=csrf_field()?>

<div class="row mb-3">
    <label class="col-3 form-label col-form-label">ID</label>
    <div class="col-5">
        <input class="form-control-plaintext" type="text" name="id" value="<?=$driver->id??''?>" readonly>
    </div>
</div>

<div class="row mb-3">
    <label class="col-3 form-label col-form-label">Name</label>
    <div class="col-5">
        <input class="form-control" type="text" name="name" value="<?=$driver->name??''?>">
    </div>
</div>

<div class="row mb-3">
    <label class="col-3 form-label col-form-label">Nationality</label>
    <div class="col-5">
        <input class="form-control" type="text" name="nationality" value="<?=$driver->nationality??''?>">
    </div>
</div>

<div class="row mb-3">
    <label class="col-3 form-label col-form-label">Date of Birth</label>
    <div class="col-5">
        <input class="form-control" type="date" name="date_of_birth" value="<?=$driver->date_of_birth??''?>">
    </div>
</div>

<div class="row mb-3">
    <input list="not_drivers_teams" class="col form-control" name="team_id" placeholder="Choose driver`s team">
    <datalist id="not_drivers_teams">
        <?php foreach($get_not_drivers_teams??[] as $get_not_drivers_team):?>
            <option value="<?=$get_not_drivers_team->id?>"><?=$get_not_drivers_team->name?></option>
        <?php endforeach ?>
    </datalist>
</div>


<div class="row mb-3">
    <label class="col-3"></label>
    <div class="col-5">
        <button class="btn btn-success" type="submit"><i class="me-2 fa-solid fa-check"></i>Save</button>
        <a class="btn btn-danger" href="/drivers"><i class="me-2 fa-solid fa-x"></i>Cancel</a>
    </div>
</div>

<?=form_close()?>

</section>

<?=view('_partials/footer')?>
