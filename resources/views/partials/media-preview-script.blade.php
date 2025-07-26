<script>
    function previewImage(event) {
        const img = document.getElementById('imagePreview');
        const imageContainer = img.parentNode.parentNode;
        const input = event.target;
        const removeLink = document.getElementById('delete-image');

        const reader = new FileReader();

        reader.onload = function() {
            img.src = reader.result;

            if (window.getComputedStyle(imageContainer).display === 'none') {
                imageContainer.classList.remove('d-none');
            }

            // Show the remove link and disable AJAX for temporary image
            removeLink.style.display = 'flex';
            removeLink.classList.remove('edit');
        };

        if (input.files.length > 0) {
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeImage(event) {
        event.preventDefault();
        const defaultImg = document.getElementById('defaultImage').value;
        const input = document.getElementById('file');
        const img = document.getElementById('imagePreview');
        const imageContainer = img.parentNode.parentNode;
        const removeLink = document.getElementById('delete-image');

        if (event.currentTarget.classList.contains('edit')) {
            const url = event.currentTarget.getAttribute('href');

            if (confirm('This action is irreversible. Are you sure?')) {
                const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState === XMLHttpRequest.DONE) {
                        if (xmlhttp.status === 200) {
                            img.src = defaultImg;
                            removeLink.style.display = 'none';
                        }
                    }
                };

                xmlhttp.open('POST', url, true);
                xmlhttp.setRequestHeader("X-CSRF-TOKEN", CSRF_TOKEN);
                xmlhttp.send();
            }
        } else {
            img.src = defaultImg;
            input.value = "";
            imageContainer.classList.add('d-none');
            removeLink.style.display = 'none';
        }
    }

    function removeVideo(event) {
      event.preventDefault();
      const video = document.getElementById('videoPreview');
      const url = event.currentTarget.getAttribute('href');

      if (confirm('This action is irreversible. Are you sure?')) {
                const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState === XMLHttpRequest.DONE) {
                        if (xmlhttp.status === 200) {
                            document.querySelector('.video-preview').remove();
                            document.querySelector('#video-file').classList.remove('replace-video');
                        }
                    }
                };

                xmlhttp.open('POST', url, true);
                xmlhttp.setRequestHeader("X-CSRF-TOKEN", CSRF_TOKEN);
                xmlhttp.send();
            }
    }
</script>
