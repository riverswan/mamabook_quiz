let initialUrl = window.location.href;

function mmb_pagination(clickClount) {

    if (clickClount === -1) {
        window.history.replaceState({page: 'finish'}, "Finish", initialUrl + "0");
        return;
    }

    window.history.replaceState({page: clickClount}, clickClount);

}