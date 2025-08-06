<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Check if there was a validation error for video
        const hasVideoError = @json($errors->has('video'));

        if (hasVideoError) {
            const videoTab = document.querySelector('#video-tab');
            const videoSection = document.querySelector('#video-section');
            const imageTab = document.querySelector('#image-tab');
            const imageSection = document.querySelector('#image-section');

            // Remove active from image
            imageTab.classList.remove('active');
            imageSection.classList.remove('show', 'active');

            // Activate video
            videoTab.classList.add('active');
            videoSection.classList.add('show', 'active');
        }
    });

    function showUploadAlert(container, message, onClose) {
        const alertDiv = document.createElement('div');
        alertDiv.className = 'mb-0 text-center alert alert-danger alert-dismissible fade show';
        alertDiv.role = 'alert';
        alertDiv.innerHTML = `${message}<button type="button" class="btn-close" aria-label="Close"></button>`;

        container.appendChild(alertDiv);

        const closeBtn = alertDiv.querySelector('.btn-close');
        closeBtn.addEventListener('click', () => {
            alertDiv.remove();
            if (typeof onClose === 'function') onClose();
        });
    }

    function validateVideo(event) {
        const errorMessages = {
            maxFileSizeExceeded: "Video size must not exceed 20MB!",
            invalidFormat: "Please select a valid video (MP4 or MOV)!"
        };
        const maxFileSize = 20 * 1024 * 1024;
        const allowedTypes = ['video/mp4', 'video/quicktime'];
        const allowedExtensions = ['mp4', 'mov'];

        const input = event.target;
        const file = input.files[0];
        const videoContainer = document.querySelector('.my-3.post-media.video');

        // These only exist in Edit form
        const videoWrapper = videoContainer?.querySelector('.ratio.ratio-16x9') || null;
        const removeLink = videoContainer?.querySelector('.remove-video') || null;

        // Remove old alerts
        if (videoContainer) {
            videoContainer.querySelectorAll('.alert-danger').forEach(alert => alert.remove());
            videoContainer.classList.add('d-none');
            // Add gray border only if a video exists and is visible
            if (videoWrapper && !videoWrapper.classList.contains('d-none')) {
                videoContainer.classList.add('video-preview');
            } else {
                videoContainer.classList.remove('video-preview');
            }
        }

        // If no new file selected → restore existing video (Edit) or keep empty (Add)
        if (!file) {
            if (videoWrapper) videoWrapper.classList.remove('d-none');
            if (removeLink) removeLink.classList.remove('d-none');
            if (videoContainer && videoWrapper) videoContainer.classList.add('video-preview');
            return;
        }

        const fileExtension = file.name.split('.').pop().toLowerCase();
        let errorMessage = '';
        if (!allowedTypes.includes(file.type) || !allowedExtensions.includes(fileExtension)) {
            errorMessage = errorMessages.invalidFormat;
        } else if (file.size > maxFileSize) {
            errorMessage = errorMessages.maxFileSizeExceeded;
        }

        if (errorMessage && videoContainer) {
            // Always show container for alert
            videoContainer.classList.remove('d-none', 'video-preview');

            showUploadAlert(videoContainer, errorMessage, () => {
                // Only restore previous preview if we're in Edit form
                if (videoWrapper) videoWrapper.classList.remove('d-none');
                if (removeLink) removeLink.classList.remove('d-none');
                if (videoContainer && videoWrapper) videoContainer.classList.add('video-preview');

                // For 'Add Article' form, simply hide the container again if it had no preview
                if (!videoWrapper && videoContainer) videoContainer.classList.add('d-none');
            });

            // Hide existing video (for 'Edit article' form only)
            if (videoWrapper) videoWrapper.classList.add('d-none');
            if (removeLink) removeLink.classList.add('d-none');

            input.value = "";
        } else {
            if (videoWrapper) videoWrapper.classList.remove('d-none');
            if (removeLink) removeLink.classList.remove('d-none');
            if (videoContainer && videoWrapper) videoContainer.classList.add('video-preview');
        }
    }

    function validateImage(file) {
        const errorMessages = {
            maxFileSizeExceeded: "Image size must not exceed 2MB!",
            invalidFormat: "Please select a valid image (JPEG, JPG or PNG)!"
        };
        const maxFileSize = 2 * 1024 * 1024;
        const allowedTypes = ['image/jpeg', 'image/png']; 
        const allowedExtensions = ['jpg', 'jpeg', 'png']; 

        const fileExtension = file.name.split('.').pop().toLowerCase();

        if (!allowedTypes.includes(file.type) || !allowedExtensions.includes(fileExtension)) {
            return errorMessages.invalidFormat;
        }
        if (file.size > maxFileSize) {
            return errorMessages.maxFileSizeExceeded;
        }
        return '';
    }

    function previewImage(event) {
        const img = document.getElementById('imagePreview'); 
        const imageContainer = img.closest('.row.my-3'); 
        const removeLink = document.getElementById('delete-image'); 
        const input = event.target;

        // Remove any existing validation alerts inside the container
        imageContainer.querySelectorAll('.alert-danger').forEach(alert => alert.remove());

        if (!input.files.length) {
            if (img.src && !img.src.includes('default.jpg')) {
                imageContainer.classList.remove('d-none');
                if (removeLink) removeLink.classList.remove('d-none');
            } else {
                imageContainer.classList.add('d-none');
            }
            img.classList.remove('d-none');
            return;
        }

        const file = input.files[0];
        const errorMessage = validateImage(file);

        if (errorMessage) {
            imageContainer.classList.remove('d-none');

            // Show dismissible validation alert and restore previous image on alert close
            showUploadAlert(imageContainer, errorMessage, () => {
                // When alert is closed:
                // Restore previous image preview for Edit form if it exists
                if (img.src && !img.src.includes('default.jpg')) {
                    imageContainer.classList.remove('d-none');
                    if (removeLink) removeLink.classList.remove('d-none');
                    img.classList.remove('d-none');
                } else {
                    // Otherwise (Add form), hide the preview container
                    imageContainer.classList.add('d-none');
                }
            });

            // Hide the image and remove button while alert is visible
            img.classList.add('d-none');
            if (removeLink) removeLink.classList.add('d-none');

            // Clear the invalid file from input
            input.value = "";
            return;
        }

        const reader = new FileReader();
        reader.onload = () => {
            img.src = reader.result; 
            imageContainer.classList.remove('d-none'); 
            img.classList.remove('d-none'); 
            if (removeLink) removeLink.classList.remove('d-none'); 
        };
        reader.readAsDataURL(file); 
    }

    function removeImage(event) {
        event.preventDefault();
        const defaultImg = document.getElementById('defaultImage').value;
        const input = document.getElementById('file');
        const img = document.getElementById('imagePreview');
        const imageContainer = img.parentNode.parentNode;
        const removeLink = document.getElementById('delete-image');

        // If editing and removing existing image
        if (event.currentTarget.classList.contains('edit')) {
            const url = event.currentTarget.getAttribute('href');

            if (confirm('This action is irreversible. Are you sure?')) {
                const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState === XMLHttpRequest.DONE && xmlhttp.status === 200) {
                        img.src = defaultImg;
                        removeLink.style.display = 'none';
                    }
                };

                xmlhttp.open('POST', url, true);
                xmlhttp.setRequestHeader("X-CSRF-TOKEN", CSRF_TOKEN);
                xmlhttp.send();
            }
        } else {
            // Remove newly selected image before saving
            img.src = defaultImg;
            input.value = "";
            imageContainer.classList.add('d-none');
            removeLink.style.display = 'none';
        }
    }

    function removeVideo(event) {
        event.preventDefault();
        const videoInput = document.getElementById('video-file');
        const videoPreview = document.querySelector('.video-preview');
        const url = event.currentTarget.getAttribute('href');

        // If a new video is selected but not saved, just clear input
        if (videoInput.files.length > 0) {
            videoInput.value = '';
            return;
        }

        // Deleting saved video via AJAX
        if (confirm('This action is irreversible. Are you sure?')) {
            const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState === XMLHttpRequest.DONE && xmlhttp.status === 200) {
                    if (videoPreview) videoPreview.remove();
                    videoInput.classList.remove('replace-video');
                }
            };

            xmlhttp.open('POST', url, true);
            xmlhttp.setRequestHeader("X-CSRF-TOKEN", CSRF_TOKEN);
            xmlhttp.send();
        }
    }
</script>
