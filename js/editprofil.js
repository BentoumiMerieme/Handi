function validateMyForm() {
  var HasError = false;
  var ErrorMsg = "";

  var nom = document.getElementById("nom").value;
  var mpt = document.getElementById("password").value;
  var numtel = document.getElementById("numtel").value;
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirmepassword").value;

  event.preventDefault();

  if (nom.trim() === "") {
    HasError = true;
    ErrorMsg = "Le champ nom est vide!";
  } else if (!/^[a-zA-Z\s]+$/.test(nom)) {
    HasError = true;
    ErrorMsg = "Le champ nom est faux!";
  } else if (mpt.trim() === "") {
    HasError = true;
    ErrorMsg = "Le champ de mot passe est vide!";
  } else if (!(password === confirmPassword)) {
    HasError = true;
    ErrorMsg = "mot passe incorrect!";
  } else if (numtel.trim() === "") {
    HasError = true;
    ErrorMsg = "Le champ de numtel est vide!";
  } else if (!/^[0-9\s]+$/.test(numtel)) {
    HasError = true;
    ErrorMsg = "Le champ de num tel est faux!";
  }

  let divError = document.getElementById("erreur");
  let divErrorSp = document.getElementById("erreursp");
  if (HasError) {
    // var errorMessageSpan = document.querySelector(".error-message");
    // errorMessageSpan.textContent = ErrorMsg;
    // event.preventDefault();
    divError.style.display = "flex";
    divErrorSp.textContent = ErrorMsg;
    return false;
  } else {
    ErrorMsg = "";
    divError.style.display = "none";
    divErrorSp.textContent = ErrorMsg;
    //window.location.href = "editpe.php";
    return true;
  }
}
//   } else {
// إرسال البيانات إلى المعالج PHP عبر AJAX
// $.ajax({
//   type: "POST",
//   url: "/project2024l3/php/editprofilemployee.php",
// يجب تغيير المسار إلى المعالج PHP الصحيح على الخادم
// data: { nom: nom, mpt: mpt, numtel: numtel },
// success: function (response) {

// عمليات بعد نجاح الطلب
// console.log(response);
// يمكنك عرض رسالة نجاح أو إعادة توجيه المستخدم هنا
// },
// error: function (xhr, status, error) {
// عمليات في حالة فشل الطلب
// console.log(xhr.responseText);
// يمكنك تنفيذ إجراءات للتعامل مع الخطأ هنا
//   },
// });
// return false;
// منع الإرسال الافتراضي للنموذج
function verifyPasswords() {
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirmepassword").value;
  // var HasError = false;
  // var ErrorMsg = "";

  // if (!(password === confirmPassword)) {
  //   HasError = true;
  //   ErrorMsg = "mot passe incorrect!";
  // } else {
  //   console.log("Passwords don't match!");
  // }
}

document.addEventListener("DOMContentLoaded", function () {
  let password = document.getElementById("password");
  let power = document.getElementById("power-point");
  password.oninput = function () {
    let point = 0;
    let value = password.value;
    let widthPower = ["1%", "25%", "50%", "75%", "100%"];
    let colorPower = ["#D73F40", "#DC6551", "#F2B84F", "#BDE952", "#3ba62f"];

    if (value.length >= 6) {
      let arrayTest = [/[0-9]/, /[a-z]/, /[A-Z]/, /[^0-9a-zA-Z]/];
      arrayTest.forEach((item) => {
        if (item.test(value)) {
          point += 1;
        }
      });
    }
    power.style.width = widthPower[point];
    power.style.backgroundColor = colorPower[point];
  };
});
