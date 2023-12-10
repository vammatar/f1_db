<?=view('_partials/header')?>

<h1><?=$title??''?></h1>

<section class="m-3">

<?=form_open()?>
<?=validation_list_errors()?>
<?=csrf_field()?>

<div class="row mb-3">
    <label class="col-3 form-label col-form-label">ID</label>
    <div class="col-5">
        <input class="form-control-plaintext" type="text" name="id" value="<?=$race->id??''?>" readonly>
    </div>
</div>

<div class="row mb-3">
    <label class="col-3 form-label col-form-label">Name</label>
    <div class="col-5">
        <input class="form-control" type="text" name="name" value="<?=$race->name??''?>">
    </div>
</div>

<div class="row mb-3">
    <label class="col-3 form-label col-form-label">Date</label>
    <div class="col-5">
        <input class="form-control" type="date" name="date" value="<?=$race->date??''?>">
    </div>
</div>

<div class="row mb-3">
    <label class="col-3 form-label col-form-label">Circuit</label>
    <div class="col-5">
        <input class="form-control" type="text" name="circuit" value="<?=$race->circuit??''?>">
    </div>
</div>


<div class="row mb-3">
    <input list="not_race_winners" class="col form-control" name="winner_id"  placeholder="Choose race winner">
    <datalist id="not_race_winners">
        <?php foreach($get_not_race_winners??[] as $get_not_race_winner):?>
            <option value="<?=$get_not_race_winner->id?>"><?=$get_not_race_winner->name?></option>
        <?php endforeach ?>
    </datalist>
</div>

<div class="row mb-3">
    <label class="col-3"></label>
    <div class="col-5">
        <button class="btn btn-success" type="submit"><i class="me-2 fa-solid fa-check"></i>Save</button>
        <a class="btn btn-danger" href="/races"><i class="me-2 fa-solid fa-x"></i>Cancel</a>
    </div>
</div>


<?=form_close()?>

</section>

<?=view('_partials/footer')?>