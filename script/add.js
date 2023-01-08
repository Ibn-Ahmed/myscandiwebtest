$(document).ready(function(){
$('select').change(function(){
    var value = $('select').val();
    if(value == 1) {
        $('.value_container').html(`
        <div class = "border border-secondary border-1 p-3">
        <label for="size">Size</label>
        <input name="size" type="text" id="size" class="form-control">
        <p>Please provide size</p>
        <p class="text-danger"> <?= $errors['attribute']??""?></p>
        </div>`);
    }else if(value == 2) {
        $('.value_container').html(`
        <div class = "border border-secondary border-1 p-3">
        <label for="height">Height</label>
        <input name="height" type="text" id="height" class="form-control">
        <label for="width">Width</label>
        <input name="width" type="text" id="width" class="form-control">
        <label for="length">Length</label>
        <input name="length" type="text" id="length" class="form-control">
    <p>Please provide dimensions in HxWxL format</p>
    <p class="text-danger"> <?= $errors['attribute']??""?></p>
    </div>`)
    }else if(value == 3) {
        $('.value_container').html(`
        <div class = "border border-secondary border-1 p-3">
        <label for="weight">Weight</label>
        <input name="weight" type="text" id="weight" class="form-control">
        <p>Please provide weight</p>
        <p class="text-danger"> <?= $errors['attribute']??""?></p>
        </div>`)
    }else{
        $('.value_container').html(``);
        }
});
})