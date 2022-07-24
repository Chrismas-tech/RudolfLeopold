<!-- editor -->
<div class="{{ $errors->has('short_description') ? 'my-is-invalid' : ''}}">
    <label>Short Description <span class="text-danger">*</span></label>
    <!-- Create the editor container -->
    <textarea id="editor2" name="short_description" id="" cols="30" rows="10">

        </textarea>
    <!-- Create the editor container -->
</div>
<div class="mt-3 {{ $errors->has('long_description') ? 'my-is-invalid' : ''}}">
    <label>Long Description <span class="text-danger">*</span></label>
    <!-- Create the editor container -->
    <textarea id="editor1" name="long_description" id="" cols="30" rows="10">

        </textarea>
    <!-- Create the editor container -->
</div>
<!-- editor -->
