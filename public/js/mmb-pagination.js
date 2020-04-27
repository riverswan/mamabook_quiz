let initialUrl = window.location.href;
let tableElem = document.createElement('div');
tableElem.style.position = 'relative';
let bmInnerElem = document.createElement('div');
bmInnerElem.setAttribute('id', 'mmb_bigmir_statistics');

document.addEventListener('DOMContentLoaded', function () {
    let footer = document.getElementById('footer-section');
    footer.prepend(bmInnerElem);
    initBigMir();
});


function BM_Draw(oBM_STAT) {
    tableElem.innerHTML = '<table cellpadding="0" cellspacing="0" border="0" style="display:block;margin-right:4px; position: absolute; bottom:0; right:0"><tr><td><div style="font-family:Tahoma;font-size:10px;padding:0px;margin:0px;"><div style="width:7px;float:left;background:url(\'//i.bigmir.net/cnt/samples/default/b57_left.gif\');height:17px;padding-top:2px;background-repeat:no-repeat;"></div><div style="float:left;background:url(\'//i.bigmir.net/cnt/samples/default/b57_center.gif\');text-align:left;height:17px;padding-top:2px;background-repeat:repeat-x;"><a href="http://www.bigmir.net/" target="_blank" style="color:#0000ab;text-decoration:none;">bigmir<span style="color:#ff0000;">)</span>net</a>  <span style="color:#71b27e;">хиты</span> <span style="color:#12351d;font:10px Tahoma;">' + oBM_STAT.hits + '</span> <span style="color:#71b27e;">хосты</span> <span style="color:#12351d;font:10px Tahoma;">' + oBM_STAT.hosts + '</span></div><div style="width:7px;float: left;background:url(\'//i.bigmir.net/cnt/samples/default/b57_right.gif\');height:17px;padding-top:2px;background-repeat:no-repeat;"></div></div></td></tr></table>';
}

function initBigMir() {
    bmN = navigator, bmD = document, bmD.cookie = 'b=b', i = 0, bs = [], bm = {
        o: 1,
        v: 16952181,
        s: 16952181,
        t: 0,
        c: bmD.cookie ? 1 : 0,
        n: Math.round((Math.random() * 1000000)),
        w: 0
    };
    for (var f = self; f != f.parent; f = f.parent) bm.w++;
    try {
        if (bmN.plugins && bmN.mimeTypes.length && (x = bmN.plugins['Shockwave Flash'])) bm.m = parseInt(x.description.replace(/([a-zA-Z]|\s)+/, ''));
        else for (var f = 3; f < 20; f++) if (eval('new ActiveXObject("ShockwaveFlash.ShockwaveFlash.' + f + '")')) bm.m = f
    } catch (e) {

    }
    try {
        bm.y = bmN.javaEnabled() ? 1 : 0
    } catch (e) {

    }
    try {
        bmS = screen;
        bm.v ^= bm.d = bmS.colorDepth || bmS.pixelDepth;
        bm.v ^= bm.r = bmS.width
    } catch (e) {

    }
    r = bmD.referrer.replace(/^w+:\/\//, '');
    if (r && r.split('/')[0] != window.location.host) {
        bm.f = escape(r).slice(0, 400);
        bm.v ^= r.length
    }
    bm.v ^= window.location.href.length;
    for (var x in bm) if (/^[ovstcnwmydrf]$/.test(x)) bs[i++] = x + bm[x];

    let src = '//c.bigmir.net/?' + bs.join('&') + '';
    let script = document.createElement('script');
    script.setAttribute('type', 'text/javascript');
    script.setAttribute('language', 'javascript');
    script.setAttribute('src', src);
    bmInnerElem.appendChild(script);
    addNoScript();
    bmInnerElem.prepend(tableElem);
}

function addNoScript() {
    bmInnerElem.innerHTML += '<noscript>\n' +
        '            <a href="http://www.bigmir.net/" target="_blank">\n' +
        '                <img src="//c.bigmir.net/?v16952181&s16952181&t2"\n' +
        '                     width="88" height="31" alt="bigmir)net TOP 100"\n' +
        '                     title="bigmir)net TOP 100" border="0"/>\n' +
        '            </a>\n' +
        '        </noscript>';
}

function mmb_pagination(clickCount) {
    bmInnerElem.innerHTML = "";
    if (clickCount === -1) {
        window.history.replaceState({page: 'finish'}, "Finish", initialUrl + "0/");
        initBigMir();
        // initAdsense();
        return;
    }
    window.history.replaceState({page: clickCount}, "Page", initialUrl + clickCount + "/");
    initBigMir();
    // initAdsense();
}

function initAdsense() {

    try {
        let gtag1 = document.getElementById('mmb_adsense_id1');
        let gtag2 = document.getElementById('mmb_adsense_id2');
        let listOfTags = document.querySelector('head').querySelectorAll('script');
        let analyticsTag = null;

        for (let i = 0; i < listOfTags.length; i++) {
            if (listOfTags[i].src.includes('analytics.js')) {
                analyticsTag = listOfTags[i];
                break;
            }
        }
        document.querySelector('head').removeChild(gtag1);
        document.querySelector('head').removeChild(gtag2);
        document.querySelector('head').removeChild(analyticsTag);


        gtag1 = document.createElement('script');
        gtag1 = document.createElement('script');
        gtag1.src = "https://www.googletagmanager.com/gtag/js?id=UA-135047501-1";
        gtag1.setAttribute('id', 'mmb_adsense_id1');

        gtag2 = document.createElement('script');
        gtag2.setAttribute('id', 'mmb_adsense_id2');
        gtag2.innerHTML = "window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-135047501-1');";

        // let gtag3 = document.createElement('script');
        // gtag3.src = "https://www.google-analytics.com/analytics.js";
        let newArr = [];
        let k = 0;
        for (let i = 0; i < window.dataLayer.length; i++) {
            if (window.dataLayer[i].event !== undefined) {
                newArr[k++] = window.dataLayer[i];
            }
        }

        window.dataLayer = [...newArr];
        setTimeout(() => {
            document.querySelector('head').append(gtag1, gtag2, analyticsTag);
        }, 500)

    } catch (e) {
        console.log('something happend in adsense' + e)
    }
}

