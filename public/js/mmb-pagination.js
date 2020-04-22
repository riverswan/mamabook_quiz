let initialUrl = window.location.href;

function mmb_pagination(clickCount) {

    if (clickCount === -1) {
        window.history.replaceState({page: 'finish'}, "Finish", initialUrl + "0/");
        return;
    }

    window.history.replaceState({page: clickCount},"Page",initialUrl + clickCount + "/");

}