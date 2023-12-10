<?=view('_partials/header')?>

<h1><?=$title??''?></h1>

<section class="m-3">

<?=form_open()?>
<?=validation_list_errors()?>
<?=csrf_field()?>

<div class="row mb-3">
    <label class="col-3 form-label col-form-label">ID</label>
    <div class="col-5">
        <input class="form-control-plaintext" type="text" name="id" value="<?=$team->id??''?>" readonly>
    </div>
</div>

<div class="row mb-3">
    <label class="col-3 form-label col-form-label">Name</label>
    <div class="col-5">
        <input class="form-control" type="text" name="name" value="<?=$team->name??''?>">
    </div>
</div>

<div class="row mb-3">
    <label class="col-3 form-label col-form-label">Country</label>
    <div class="col-5">
        <input class="form-control" type="text" name="country" value="<?=$team->country??''?>">
    </div>
</div>

<div class="row mb-3">
    <label class="col-3 form-label col-form-label">Engine Supplier</label>
    <div class="col-5">
        <label class="align-middle me-2">
            <input class="" type="radio" name="engine_supplier" value="Mercedes"<?=(($team->engine_supplier??'')=='Mercedes')?' checked':''?>>
            Mercedes
        </label>
        <label class="align-middle me-2">
            <input class="" type="radio" name="engine_supplier" value="Red Bull"<?=(($team->engine_supplier??'')=='Red Bull')?' checked':''?>>
            Red Bull
        </label>
        <label class="align-middle me-2">
            <input class="" type="radio" name="engine_supplier" value="Ferrari"<?=(($team->engine_supplier??'')=='Ferrari')?' checked':''?>>
            Ferrari
        </label>
        <label class="align-middle me-2">
            <input class="" type="radio" name="engine_supplier" value="Renault"<?=(($team->engine_supplier??'')=='Renault')?' checked':''?>>
            Renault
        </label>
        <label class="align-middle me-2">
            <input class="" type="radio" name="engine_supplier" value="TBA"<?=(($team->engine_supplier??'')=='TBA')?' checked':''?>>
            TBA
        </label>
        <label class="align-middle me-2">
            <input class="" type="radio" name="engine_supplier" value="Other"<?=(($team->engine_supplier??'')=='Other')?' checked':''?>>
            Other
        </label>
    </div>
</div>

<div class="row mb-3">
    <label class="col-3"></label>
    <div class="col-5">
        <button class="btn btn-success" type="submit"><i class="me-2 fa-solid fa-check"></i>Save</button>
        <a class="btn btn-danger" href="/teams"><i class="me-2 fa-solid fa-x"></i>Cancel</a>
    </div>
</div>

<?=form_close()?>

</section>

<?=view('_partials/footer')?>
