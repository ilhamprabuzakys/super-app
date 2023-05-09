const form = document.getElementById("myForm");

form.addEventListener("submit", function(event) {
  event.preventDefault();
  const name = document.getElementById("name").value;
  const gender = document.querySelector('input[name="gender"]:checked').value;
  const hobbies = document.querySelectorAll('input[name="hobi"]:checked');
  let hobbiesArray = [];
  for (let i = 0; i < hobbies.length; i++) {
    hobbiesArray.push(hobbies[i].value);
  }
  alert(`Nama Lengkap: ${name}\nJenis Kelamin: ${gender}\nHobi: ${hobbiesArray.join(", ")}`);
});
