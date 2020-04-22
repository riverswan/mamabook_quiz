let initialUrl = window.location.href;

function mmb_pagination(clickCount) {

    if (clickCount === -1) {
        window.history.replaceState({page: 'finish'}, "Finish", initialUrl + "0/");
        return;
    }

    window.history.replaceState({page: clickCount},"Page",initialUrl + clickCount + "/");

    let statistics = document.querySelector('#mmb_bigmir_statistics');
    let statisticsCode = statistics.innerHTML;

    statistics.innerHTML = "";

    setTimeout(()=>{
        statistics.innerHTML = statisticsCode;
    },3000)
}