// 
!function() {
    "use strict";
    var forms = document.querySelectorAll(".needs-validation");
    Array.prototype.slice.call(forms).forEach(function(t) {
        t.addEventListener("submit", function(e) {
            t.checkValidity() || (e.preventDefault(), e.stopPropagation());
            t.classList.add("was-validated");
        }, !1);
    });

    var form = document.getElementById("form-validation-2");
    const s = document.getElementById("username"),
          a = document.getElementById("email"),
          n = document.getElementById("password"),
          r = document.getElementById("password2");

    // Only run validation if all elements exist
    if (form && s && a && n && r) {
        function l(e, t) {
            e = e.parentElement;
            e.children[1].classList.add("error");
            e = e.querySelector("small");
            e.innerText = t;
            e.classList.add("error");
            e.classList.remove("success");
        }
        function c(e) {
            e = e.parentElement;
            e.children[1].classList.remove("error");
            e.children[1].classList.add("success");
            e = e.querySelector("small");
            e.classList.add("success");
            e.classList.remove("error");
        }
        function i(e, t, s) {
            e.value.length < t ? l(e, o(e) + ` must be at least ${t} characters`)
            : e.value.length > s ? l(e, o(e) + ` must be les than ${s} characters`)
            : c(e);
        }
        function o(e) {
            return e.id.charAt(0).toUpperCase() + e.id.slice(1);
        }
        form.addEventListener("submit", function(e) {
            e.preventDefault();
            [s, a, n, r].forEach(function(e) {
                "" === e.value.trim() ? l(e, o(e) + " is required") : c(e);
            });
            i(s, 3, 15);
            i(n, 6, 25);
            var emailPattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            emailPattern.test(a.value.trim()) ? c(a) : l(a, "Email is not invalid");
            n.value !== r.value && l(r, "Passwords do not match");
        });
    }
}();