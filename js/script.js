function heure(id) {
    const date = new Date();
    let h = date.getHours();
    if (h < 10) {
        h = "0" + h;
    }
    let m = date.getMinutes();
    if (m < 10) {
        m = "0" + m;
    }
    let s = date.getSeconds();
    if (s < 10) {
        s = "0" + s;
    }
    const resultat = h + ':' + m + ':' + s;
    document.getElementById(id).innerHTML = resultat;
    setTimeout(() => heure(id), 1000);
}

window.onload = function() {
    heure('system-time');
};
