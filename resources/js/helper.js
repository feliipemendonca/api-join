function formInput(selector) {
    console.log(selector);
    $(selector).append(
        `<div class="col-6 col-lg-3 pt-2 pt-lg-4">
                <input type="file" class="form-control" name="file[]" />
            </div>
        </div>`
   );
}

const loadFile = (event) => {
    const reader = new FileReader()
    reader.onload = _ => {
        var output = document.getElementById('output')
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0])

}

export default {
    formInput,
    loadFile
}