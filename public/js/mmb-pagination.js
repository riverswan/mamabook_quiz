let initialUrl = window.location.href;

function mmb_pagination(clickCount) {

    if (clickCount === -1) {
        window.history.replaceState({page: 'finish'}, "Finish", initialUrl + "0/");
        return;
    }

    window.history.replaceState({page: clickCount}, "Page", initialUrl + clickCount + "/");

}

function bigmirCreate() {
    bmN = navigator, bmD = document, bmInnerElem = document.querySelector('#mmb_bigmir_statistics'), bmD.cookie = 'b=b', i = 0, bs = [], bm = {
        o: 1,
        v: 16952181,
        s: 16952181,
        t: 0,
        c: bmD.cookie ? 1 : 0,
        n: Math.round((Math.random() * 1000000)),
        w: 0
    };
    console.log(bmInnerElem);
    for (var f = self; f != f.parent; f = f.parent) bm.w++;
    try {
        if (bmN.plugins && bmN.mimeTypes.length && (x = bmN.plugins['Shockwave Flash'])) bm.m = parseInt(x.description.replace(/([a-zA-Z]|\s)+/, ''));
        else for (var f = 3; f < 20; f++) if (eval('new ActiveXObject("ShockwaveFlash.ShockwaveFlash.' + f + '")')) bm.m = f
    } catch (e) {
        ;
    }
    try {
        bm.y = bmN.javaEnabled() ? 1 : 0
    } catch (e) {
        ;
    }
    try {
        bmS = screen;
        bm.v ^= bm.d = bmS.colorDepth || bmS.pixelDepth;
        bm.v ^= bm.r = bmS.width
    } catch (e) {
        ;
    }
    r = bmD.referrer.replace(/^w+:\/\//, '');
    if (r && r.split('/')[0] != window.location.host) {
        bm.f = escape(r).slice(0, 400);
        bm.v ^= r.length
    }
    bm.v ^= window.location.href.length;
    for (var x in bm) if (/^[ovstcnwmydrf]$/.test(x)) bs[i++] = x + bm[x];

    bmD.write('<sc' + 'ript type="text/javascript" language="javascript" src="//c.bigmir.net/?' + bs.join('&') + '"></sc' + 'ript>');
}