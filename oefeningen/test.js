let rl = require("readline-sync");
let name = rl.question("geef naam: ");
let firstLetter = name.substring(0, 1).toUpperCase();
let restName = name.substring(1);
let nameCorrect = firstLetter + restName;
rl.setDefaultOptions({ limit: ["m", "f", "x"] });
let gender = rl.question("geef gender: ");
let titel = "";
switch (gender) {
  case "f":
    titel = "Mv";
    break;
  case "m":
    titel = "Mr";
    break;
  case "x":
    titel = "";
    break;
}
console.log(`Hallo, ${titel} ${nameCorrect}.`);
