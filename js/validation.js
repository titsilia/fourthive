const form = document.querySelector(".reg__form");

const formInputs = document.querySelectorAll(".form__item_inputs");
const password = document.querySelector(".password");
const passwordRepeat = document.querySelector(".password_repeat");

const passwordErrors = document.querySelectorAll(".form__item_error");

const errorKeys = Object.keys(ValidityState.prototype);

const ERRORS = {
  telephone: {
    valueMissing: "Вы не заполнили данное поле!",
    patternMismatch: "Допустимы символы - цифры",
  },
  name: {
    valueMissing: "Вы не заполнили данное поле!",
    patternMismatch: "Допустимы символы - кириллица, тире",
  },
  surname: {
    valueMissing: "Вы не заполнили данное поле!",
    patternMismatch: "Допустимы символы - кириллица, тире",
  },
  password: {
    valueMissing: "Вы не заполнили данное поле!",
    tooShort: "Минимальная длина пароля - 6",
  },
  password_repeat: {
    valueMissing: "Вы не заполнили данное поле!",
    tooShort: "Минимальная длина пароля - 6",
  },
  checkbox: {
    valueMissing: "Вы не заполнили данное поле!",
  },
};

function showError(input, message) {
  const container = input.closest(".form__item");
  const errorText = container.querySelector(".form__item_error");

  errorText.textContent = message;
  errorText.classList.remove("hidden");

  input.classList.add("error");
}

function hideError(input) {
  const container = input.closest(".form__item");
  const errorText = container.querySelector(".form__item_error");

  errorText.textContent = " ";
  errorText.classList.add("hidden");

  input.classList.remove("error");
}

function validateInput(input) {
  if (input.validity.valid) {
    hideError(input);
    return;
  }

  for (const errorType of errorKeys) {
    if (input.validity[errorType]) {
      showError(input, ERRORS[input.name][errorType]);
    }
  }
}

formInputs.forEach((input) => {
  input.addEventListener("change", (event) => {
    const target = event.target;
    validateInput(target);
  });
});

form.addEventListener("submit", (event) => {
  const target = event.target;
  if (!target.checkValidity()) {
    event.preventDefault();
  }

  formInputs.forEach(validateInput);

  if (password.value !== passwordRepeat.value) {
    console.log("dqd");
    passwordErrors.forEach((error) => {
      error.textContent = "Пароли не совпадают!";
      error.classList.remove("hidden");

      input.classList.add("error");
    });
  }
});
