function validateForm() {
    var y = document.getElementById('fa-exclamation-circle');
    var x = document.forms["form1"]["rake_no"].value;
    if (x == "") {
        y.style.visibility="visible";
    alert("Rake No must be filled out");
      return false;
    }
  }