<form action="{{ route('krama.import') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="mb-3">
        <label for="formFile" class="form-label">Default file input example</label>
        <input class="form-control" type="file" name="file" id="formFile">
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
</form>

<!-- <script>
    function previewImage() {
        const image = document.querySelector('.inputGroupFile01');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script> -->