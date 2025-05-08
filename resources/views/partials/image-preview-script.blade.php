<script>
    function previewImage(event) {
        var img = document.getElementById('imagePreview');
        var imageContainer = img.parentNode.parentNode;
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            img.src = reader.result;
            if (window.getComputedStyle(imageContainer).display === 'none') {
                imageContainer.classList.remove('d-none');
            }
        };
        reader.readAsDataURL(input.files[0]);
    }

    function removeImage(event) {
        var defaultImg = document.getElementById('defaultImage').value;
        var input = document.getElementById('file');
        var img = document.getElementById('imagePreview');
        var imageContainer = img.parentNode.parentNode;

        event.preventDefault();
        if (event.currentTarget.classList.contains('edit')) {
            var id = event.currentTarget.dataset.uid;
            var fileName = img.getAttribute('src').split('/').reverse()[0];
            var url = `${APP_URL}/dashboard/articles/delete-image/${id}/${fileName}`;

            if (confirm('This action is irreversible. Are you sure?')) {
                var CSRF_TOKEN = document.querySelectorAll('meta[name="csrf-token"]')[0].getAttribute('content');
                var xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                        if (xmlhttp.status == 200) {
                            img.src = defaultImg;
                            document.getElementById('delete-image').remove();
                        }
                    }
                }

                xmlhttp.open('POST', url, true);
                xmlhttp.setRequestHeader("X-CSRF-TOKEN", CSRF_TOKEN);
                xmlhttp.send();
            }

        } else {
            imageContainer.classList.add('d-none');
            img.src = "";
            input.value = "";
        }
    }
</script>
