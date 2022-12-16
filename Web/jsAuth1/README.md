# Source
```html
      (function() {
          document.getElementById('secureLogin').addEventListener('submit', (e) => {
              let username = e.target.querySelector('#formUsername').value;
              let password = e.target.querySelector('#formPassword').value;

              if(username == "Nissen" && password == "LetMeIn") {
                  top.location = CryptoJS.MD5(username + ":" + password) +".html";
              } else {
                alert("Forkert brugernavn og/eller kodeord!");
              }

              e.preventDefault();
          })
      })();
```

# Solution
Username/Password is shown in the source.
