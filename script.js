function changeView() {

    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");

}

function signIn() {

    var email = document.getElementById("uname1");
    var password = document.getElementById("password1");
    var rememberme = document.getElementById("rememberme");

    var form = new FormData();

    form.append("uname1", email.value);
    form.append("password1", password.value);
    form.append("rememberme", rememberme.checked);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text2 = request.responseText;

            if (text2 == 'success') {
                window.location = "home.php";
                document.getElementById("msg2").innerHTML = text2;
                document.getElementById("msg2").className = "bi bi-check2-circle fs-5";
                document.getElementById("alertdiv2").className = "alert alert-success";
                document.getElementById("msgdiv2").className = "d-block";
            } else {
                document.getElementById("msg2").innerHTML = text2;
                document.getElementById("msg2").className = "bi bi-x-octagon-fill fs-5";
                document.getElementById("alertdiv2").className = "alert alert-danger";
                document.getElementById("msgdiv2").className = "d-block";
            }

        }
    };

    request.open("POST", "signInProcess.php", true);
    request.send(form);

}

function basicSearch(x) {


    var txt = document.getElementById("basic_search");

    var f = new FormData();

    f.append("t", txt.value);
  
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {

            var t = r.responseText;

           
            document.getElementById("basicSearchResult").innerHTML = t;
        }
    }

    r.open("POST", "basicSearchProcess.php", true);
    r.send(f);


}

function viewMessages(email) {
    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;
        document.getElementById("chat_box").innerHTML = t;
      }
    };
  
    r.open("GET", "viewMsgProcess.php?e=" + email, true);
    r.send();
  }
  
  function send_msg() {
    var email = document.getElementById("rmail");
    var txt = document.getElementById("msg_txt");
  
    var f = new FormData();
    f.append("e", email.innerHTML);
    f.append("t", txt.value);
  
    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;
        if (t == "success") {
          window.location.reload();
        } else {
          alert(t);
        }
      }
    };
  
    r.open("POST", "sendMsgProcess.php", true);
    r.send(f);
  }
  
  function emailsignIn() {
    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberme = document.getElementById("rememberme");
  
    var form = new FormData();
    form.append("email2", email.value);
    form.append("pass2", password.value);
    form.append("remember", rememberme.checked);
  
    var request = new XMLHttpRequest();
  
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status==200) {
        var text3 = request.responseText;
        if (text3 == "success") {
          window.location = "message.php";
          document.getElementById("msg2").innerHTML = text3;
          document.getElementById("msg2").className = "bi bi-check2-circle fs-5";
          document.getElementById("alertdiv2").className = "alert alert-success";
          document.getElementById("msgdiv2").className = "d-block";
        } else {
          document.getElementById("msg2").innerHTML = text3;
          document.getElementById("msg2").className = "bi bi-x-octagon-fill fs-5";
          document.getElementById("alertdiv2").className = "alert alert-danger";
          document.getElementById("msgdiv2").className = "d-block";
        }
      }
    };
  
    request.open("POST", "emailSigninProcess.php", true);
    request.send(form);
  }
  


