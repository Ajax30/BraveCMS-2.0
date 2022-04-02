// Delete Avatar
function deleteAvatar(e) {
	e.preventDefault();

	var avatar = document.querySelector('#avatar-container img');
	var topAvatar = document.querySelector('#top_avatar');
	var trashIcon = e.currentTarget;
	var defaultAvatar = APP_URL + '/images/avatars/default.png';

	//Get user's ID
	var id = trashIcon.dataset.uid;
	var fileName = avatar.getAttribute('src').split('/').reverse()[0];

	var url = `${APP_URL}/dashboard/user/deleteavatar/${id}/${fileName}`;

	if (confirm('Delete the avatar?')) {
		var CSRF_TOKEN = document.querySelectorAll('meta[name="csrf-token"]')[0].getAttribute('content');

		var xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == XMLHttpRequest.DONE) { 
				if (xmlhttp.status == 200) {
						avatar.setAttribute('src', defaultAvatar);
						topAvatar.setAttribute('src', defaultAvatar);
						trashIcon.remove();
				}
			}
		}

		xmlhttp.open('POST', url, true);
		xmlhttp.setRequestHeader("X-CSRF-TOKEN", CSRF_TOKEN);
		xmlhttp.send();
	}
}

let deleteAvatarBtn = document.querySelector('#delete-avatar');

if (deleteAvatarBtn) {
	deleteAvatarBtn.addEventListener('click', deleteAvatar);
};