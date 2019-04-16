'use strict';
function httpGet(url) {

    return new Promise(function(resolve, reject) {

        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);

        xhr.onload = function() {
            if (this.status == 200) {
                resolve(this.response);
            } else {
                var error = new Error(this.statusText);
                error.code = this.status;
                reject(error);
            }
        };

        xhr.onerror = function() {
            reject(new Error("Network Error"));
        };

        xhr.send();
    });

}

// в httpGet обратимся к несуществующей странице
httpGet('/page-not-exists')
    .then(response => JSON.parse(response))
    .then(user => httpGet(`https://api.github.com/users/${user.name}`))
    .then(githubUser => {
        githubUser = JSON.parse(githubUser);

        let img = new Image();
        img.src = githubUser.avatar_url;
        img.className = "promise-avatar-example";
        document.body.appendChild(img);

        return new Promise((resolve, reject) => {
            setTimeout(() => {
                img.remove();
                resolve();
            }, 3000);
        });
    })
    .catch(error => {
        alert(error); // Error: Not Found
    })
    .then(result => {
        alert('im here');
    })
    ;