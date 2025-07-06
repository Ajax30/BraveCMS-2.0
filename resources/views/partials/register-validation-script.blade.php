<script src="{{ asset('lib/password-strength/password-strength.js') }}"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    const fields = {
      firstName: form.querySelector('#first_name'),
      lastName: form.querySelector('#last_name'),
      email: form.querySelector('#email'),
      password: form.querySelector('#password'),
      passwordConfirm: form.querySelector('#password-confirm'),
      accept: form.querySelector('#accept')
    };

    const messages = {
      first_name_required: 'The "First name" field is required.',
      last_name_required: 'The "Last name" field is required.',
      email_required: 'An email address is required.',
      email_invalid: 'Please provide a valid email address.',
      email_exists: 'This email is already in use.',
      password_required: 'A password is required.',
      password_min_length: 'The password must have at least :min characters.',
      password_pattern: 'Include uppercase and lowercase letters, at least one number and one symbol.',
      password_match: 'Passwords must match.',
      password_confirm_required: 'Password confirmation is required.',
      accept: 'You must accept the Terms & conditions of service.'
    };

    const strengthWrapper = document.getElementById('password-strength');
    const strengthBar = strengthWrapper.querySelector('.progress-bar');
    const strengthText = document.getElementById('password-strength-text');

    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#?!@$%^&*-]).*$/;
    const emailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    const levels = [
      { text: 'Very weak', class: 'bg-danger', width: '20%' },
      { text: 'Weak', class: 'bg-warning', width: '40%' },
      { text: 'Fair', class: 'bg-info', width: '60%' },
      { text: 'Strong', class: 'bg-primary', width: '80%' },
      { text: 'Very strong', class: 'bg-success', width: '100%' }
    ];

    let emailUnique = false;
    let emailTimeout = null;

    const getVal = (el) => el.value.trim();
    const isChecked = (el) => el.checked;

    function toggleError(input, valid, message) {
      const group = input.closest('.col-md-12, .row');
      let error = group.querySelector('.invalid-feedback');

      if (!error) {
        error = document.createElement('span');
        error.className = 'invalid-feedback';
        error.setAttribute('role', 'alert');
        error.innerHTML = `<strong>${message}</strong>`;
        input.type === 'checkbox'
          ? group.appendChild(error)
          : input.insertAdjacentElement('afterend', error);
      } else {
        error.querySelector('strong').textContent = message;
      }

      input.classList.toggle('is-invalid', !valid);
      group.classList.toggle('has-error', !valid);
      error.style.display = valid ? 'none' : 'block';
    }

    function validateFirstName() {
      const val = getVal(fields.firstName);
      toggleError(fields.firstName, !!val, messages.first_name_required);
    }

    function validateLastName() {
      const val = getVal(fields.lastName);
      toggleError(fields.lastName, !!val, messages.last_name_required);
    }

    function validateEmail() {
      clearTimeout(emailTimeout);
      const val = getVal(fields.email);

      if (!val) {
        toggleError(fields.email, false, messages.email_required);
        emailUnique = false;
        return;
      }

      if (!emailRegex.test(val)) {
        toggleError(fields.email, false, messages.email_invalid);
        emailUnique = false;
        return;
      }

      toggleError(fields.email, true, '');

      emailTimeout = setTimeout(() => {
        fetch('{{ route('check.email') }}', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
          },
          body: JSON.stringify({ email: val })
        })
          .then(res => res.json())
          .then(data => {
            emailUnique = !!data.valid;
            toggleError(fields.email, emailUnique, data.message || messages.email_exists);
          })
          .catch(() => {
            emailUnique = false;
            toggleError(fields.email, false, 'Unable to validate email uniqueness.');
          });
      }, 500);
    }

    function validatePassword() {
      const val = fields.password.value;
      toggleError(fields.password, !!val, messages.password_required);

      strengthWrapper.style.display = 'block';
      strengthBar.className = 'progress-bar';
      strengthBar.style.width = '0%';
      strengthText.textContent = '';

      if (!val) return;

      if (val.length < 6) {
        toggleError(fields.password, false, messages.password_min_length);
        return;
      }

      if (!passwordRegex.test(val)) {
        toggleError(fields.password, false, messages.password_pattern);
        strengthBar.classList.add('bg-danger');
        strengthBar.style.width = levels[0].width;
        strengthText.textContent = levels[0].text;
        return;
      } else {
        toggleError(fields.password, true, '');
      }

      if (typeof zxcvbn === 'function') {
        const score = Math.max(0, Math.min(zxcvbn(val).score, 4));
        const level = levels[score];
        strengthBar.classList.add(level.class);
        strengthBar.style.width = level.width;
        strengthText.textContent = level.text;
      }

      if (fields.passwordConfirm.value) {
        validatePasswordConfirm();
      }
    }

    function validatePasswordConfirm() {
      const confirmVal = fields.passwordConfirm.value.trim();
      const passwordVal = fields.password.value.trim();

      if (!confirmVal) {
        toggleError(fields.passwordConfirm, false, messages.password_confirm_required);
        return;
      }

      const match = confirmVal === passwordVal;
      toggleError(fields.passwordConfirm, match, messages.password_match);
    }

    function validateAccept() {
      toggleError(fields.accept, isChecked(fields.accept), messages.accept);
    }

    function validateFormOnSubmit(e) {
      let valid = true;

      validateFirstName();
      validateLastName();
      validateEmail();
      validatePassword();
      validatePasswordConfirm();
      validateAccept();

      if (!getVal(fields.firstName) || !getVal(fields.lastName)) valid = false;
      if (!emailRegex.test(getVal(fields.email)) || !emailUnique) valid = false;
      if (!fields.password.value || fields.password.value.length < 6 || !passwordRegex.test(fields.password.value)) valid = false;
      if (!fields.passwordConfirm.value || fields.passwordConfirm.value !== fields.password.value) valid = false;
      if (!isChecked(fields.accept)) valid = false;

      if (!valid) {
        e.preventDefault();
        e.stopPropagation();
      }
    }

    fields.firstName.addEventListener('input', validateFirstName);
    fields.lastName.addEventListener('input', validateLastName);
    fields.email.addEventListener('input', validateEmail);
    fields.password.addEventListener('input', validatePassword);
    fields.passwordConfirm.addEventListener('input', validatePasswordConfirm);
    fields.accept.addEventListener('change', validateAccept);
    form.addEventListener('submit', validateFormOnSubmit);
  });
</script>