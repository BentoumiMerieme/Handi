function validateForm() {
  var service = document.getElementById("service").value;
  if (service.match(/\d/)) {
    alert("Service name cannot contain numbers.");
    return false;
  }
  return true;
}
