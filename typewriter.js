const Const1 = "MOOD";
const Const2 = "Mathematics";
const Const3 = "Arithmetic";
const Const4 = "Math Operations";

const constants = [Const1, Const2, Const3, Const4];
let appTextElement = document.getElementById("appText");
let constantIndex = 0;
let typingSpeed = 200; // Speed of typing a character (ms)
let eraseSpeed = 250; // Speed of erasing a character (ms)
let pauseDuration = 100; // Duration to pause after typing and erasing a constant (ms)

function typeWriter() {
  let constant = constants[constantIndex];
  let currentText = "Im ";
  let index = 0;
  let eraseMode = false;

  function type() {
    if (!eraseMode && index < constant.length) {
      currentText += constant.charAt(index);
      appTextElement.textContent = currentText;
      index++;
      setTimeout(type, typingSpeed);
    } else {
      // After typing the constant, start erasing it
      eraseMode = true;
      erase();
    }
  }

  function erase() {
    if (eraseMode && currentText.length > 3) {
      currentText = currentText.slice(0, -1);
      appTextElement.textContent = currentText;
      setTimeout(erase, eraseSpeed);
    } else {
      // After erasing the constant, pause for a duration before proceeding to the next constant
      eraseMode = false;
      setTimeout(() => {
        constantIndex = (constantIndex + 1) % constants.length;
        appTextElement.textContent = " Im ";
        typeWriter();
      }, pauseDuration);
    }
  }

  type();
}

window.onload = typeWriter;
