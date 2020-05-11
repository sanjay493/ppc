function validateForm() {
  var y = document.getElementById("fa-exclamation-circle");
  var x = document.forms["form1"]["rake_no"].value;
  var a = document.getElementById("yyyy1");
  if (x == "") {
    y.style.visibility = "visible";
    alert("Rake No must be filled out");
    return false;
  }
  if (a == "") {
    alert("Start Year Field is empty");
    return false;
  }
  if (a < 2013) {
    alert("We Don't have data prior Year 2013");
    return false;
  }
}
