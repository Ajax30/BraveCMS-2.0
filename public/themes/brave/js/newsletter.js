document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("newsletterForm");
  const emailField = document.getElementById("email");
  const emailInvalid = document.getElementById("emailValidationMsg");
  const emailGroup = emailField.closest(".form-group"); 

  const messages = document.getElementById("messages");
  const notNewAlert = messages.querySelector(".notnew");
  const successAlert = messages.querySelector(".success");
  const failAlert = messages.querySelector(".fail");

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    // Basic email validation
    const email = emailField.value.trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailPattern.test(email)) {
      emailInvalid.classList.remove("is-hidden");
      emailGroup.classList.add("has-error");
      return;
    } else {
      emailInvalid.classList.add("is-hidden");
      emailGroup.classList.remove("has-error"); 
    }

    const url = form.getAttribute("action");
    const data = new FormData(form);

    try {
      const response = await fetch(url, {
        method: "POST",
        body: data,
        headers: {
          "X-Requested-With": "XMLHttpRequest",
        },
      });

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      const result = await response.json();

      // Hide all alerts first
      [notNewAlert, successAlert, failAlert].forEach(el =>
        el.classList.add("is-hidden")
      );

      // Show the container
      messages.classList.remove("is-hidden");

      // Show correct alert based on response
      if (result.is_new_subscriber === true) {
        successAlert.classList.remove("is-hidden");
      } else {
        notNewAlert.classList.remove("is-hidden");
      }

      // Reset the form field
      emailField.value = "";
      emailGroup.classList.remove("has-error");

    } catch (error) {
      messages.classList.remove("is-hidden");
      failAlert.classList.remove("is-hidden");
    }
  });
});
