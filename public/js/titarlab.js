let notificationTimer = null;

function  subscribe(form, target) {
    let email = target.email.value;

    if(email != ""){
        var xhr = new XMLHttpRequest();
        xhr.open('GET',"/public/subscribe?email="+email,true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send();

        xhr.onreadystatechange = function(){
            if (xhr.readyState != 4) return;
            target.email.value = "";

            notification(JSON.parse(xhr.response).info);
            if (xhr.status != 200) {
                alert(xhr.status + ': ' + xhr.statusText);
            }
        }
    }
}

function  sendOrder(productName, target) {
    let name = target.name.value;
    let phone = target.phone.value;

    if(name != "" && phone != null){
        var xhr = new XMLHttpRequest();
        xhr.open('GET',"/public/sendOrder?name="+name+"&phone="+phone+"&productName="+productName,true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send();

        xhr.onreadystatechange = function(){
            if (xhr.readyState != 4) return;
            target.phone.value = "";
            target.name.value = "";
            parent.location.hash = "";


            notification(JSON.parse(xhr.response).info);
            if (xhr.status != 200) {
                alert(xhr.status + ': ' + xhr.statusText);
            }
        }
    }
}

function notification(text) {
    if(document.getElementById("notification").classList.contains("hidden")){
        document.getElementById("notification").classList.remove("hidden");
    }

    document.getElementById("notification-text").innerHTML = text;
    if(notificationTimer != null){
        clearTimeout(notificationTimer);
    }
    notificationTimer = setTimeout(()=>{
        document.getElementById("notification-text").innerHTML = "";
        if(!document.getElementById("notification").classList.contains("hidden")){
            document.getElementById("notification").classList.add("hidden");
        }
        notificationTimer = null;
    },5000);
}

function  test() {
    console.log("test")
}

function auth(target) {
    let login = target.login.value;
    let password = target.password.value;

    if(login != "" && password != ""){
        var xhr = new XMLHttpRequest();
        xhr.open('POST',"/admin/login",true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("login="+login+"&password="+password);

        xhr.onreadystatechange = function(){
            if (xhr.readyState != 4) return;
            let report = JSON.parse(xhr.response);
            if(report.result != null){
                var date = new Date(new Date().getTime() + 60 * 1500000);
                document.cookie = "user="+report.result.login+"; path=/; expires=" + date.toUTCString();
                document.cookie = "token="+report.result.token+"; path=/; expires=" + date.toUTCString();
                window.open("/admin/","_self")
            }else{
                var date = new Date(new Date().getTime());
                document.cookie = "user=; path=/; expires=" + date.toUTCString();
                document.cookie = "token=; path=/; expires=" + date.toUTCString();
                UIkit.notification({message: report.info, status: 'danger'})
            }

            notification(JSON.parse(xhr.response).info);
            if (xhr.status != 200) {
                alert(xhr.status + ': ' + xhr.statusText);
            }
        }
    }
}

function logout() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST',"/admin/logout",true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send();

    xhr.onreadystatechange = function(){
        if (xhr.readyState != 4) return;
        let report = JSON.parse(xhr.response);
        if(report.result == true){
            window.open("/admin/","_self")
        }else{
            document.cookie = "user=; path=/; expires=" + date.toUTCString();
            document.cookie = "token=; path=/; expires=" + date.toUTCString();
            window.open("/admin/","_self")
        }
        if (xhr.status != 200) {
            alert(xhr.status + ': ' + xhr.statusText);
        }
    }
}

function searchProducts(target) {
    let search = target.search.value;
    window.open("/search?name="+search,"_self");
}


