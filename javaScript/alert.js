let loaderGreen = document.querySelector(".shows-green"),
hideAlert       = document.querySelector("#position-fixed"),
percentage = document.querySelector("#percentAll");

let loaderStartAll = 0, loaderEndAll = 100, loaderTimeAll = 30;

let startAll = setInterval(() => {
    loaderStartAll++;

    percentage.textContent = loaderStartAll+'%';
    loaderGreen.style.width = `${loaderStartAll}%`;


    if(loaderStartAll == loaderEndAll){
        clearInterval(startAll);
        // hideAlert.style.display = "none";
    }
},loaderTimeAll);