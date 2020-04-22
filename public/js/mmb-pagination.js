let initialUrl = window.location.href;

function mmb_pagination(clickCount) {

    if (clickCount === -1) {
        window.history.replaceState({page: 'finish'}, "Finish", initialUrl + "0/");
        return;
    }

    window.history.replaceState({page: clickCount}, "Page", initialUrl + clickCount + "/");

    let statistics = document.querySelector('#mmb_bigmir_statistics');
    let statisticsCode = statistics.innerHTML;

    statistics.innerHTML = "";

    let script1 = document.createElement('script');
    let script2 = document.createElement('script');
    let script3 = document.createElement('noscript');

    script1.innerHTML = `function BM_Draw(oBM_STAT) {
                document.write('<table cellpadding="0" cellspacing="0" border="0" style="display:block;margin-right:4px; position: absolute; bottom:0; right:0"><tr><td><div style="font-family:Tahoma;font-size:10px;padding:0px;margin:0px;"><div style="width:7px;float:left;background:url(\\'//i.bigmir.net/cnt/samples/default/b57_left.gif\\');height:17px;padding-top:2px;background-repeat:no-repeat;"></div><div style="float:left;background:url(\\'//i.bigmir.net/cnt/samples/default/b57_center.gif\\');text-align:left;height:17px;padding-top:2px;background-repeat:repeat-x;"><a href="http://www.bigmir.net/" target="_blank" style="color:#0000ab;text-decoration:none;">bigmir<span style="color:#ff0000;">)</span>net</a>  <span style="color:#71b27e;">хиты</span> <span style="color:#12351d;font:10px Tahoma;">' + oBM_STAT.hits + '</span> <span style="color:#71b27e;">хосты</span> <span style="color:#12351d;font:10px Tahoma;">' + oBM_STAT.hosts + '</span></div><div style="width:7px;float: left;background:url(\\'//i.bigmir.net/cnt/samples/default/b57_right.gif\\');height:17px;padding-top:2px;background-repeat:no-repeat;"></div></div></td></tr></table>');
            }`;

    script2.innerHTML = `bmN = navigator, bmD = document, bmD.cookie = 'b=b', i = 0, bs = [], bm = {
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
                if (bmN.plugins && bmN.mimeTypes.length && (x = bmN.plugins['Shockwave Flash'])) bm.m = parseInt(x.description.replace(/([a-zA-Z]|\\s)+/, ''));
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
            r = bmD.referrer.replace(/^w+:\\/\\//, '');
            if (r && r.split('/')[0] != window.location.host) {
                bm.f = escape(r).slice(0, 400);
                bm.v ^= r.length
            }
            bm.v ^= window.location.href.length;
            for (var x in bm) if (/^[ovstcnwmydrf]$/.test(x)) bs[i++] = x + bm[x];
            bmD.write('<sc' + 'ript type="text/javascript" language="javascript" src="//c.bigmir.net/?' + bs.join('&') + '"></sc' + 'ript>');
        `;

    script3.innerHTML = `<a href="http://www.bigmir.net/" target="_blank">
                <img src="//c.bigmir.net/?v16952181&s16952181&t2"
                     width="88" height="31" alt="bigmir)net TOP 100"
                     title="bigmir)net TOP 100" border="0"/>
            </a>`;

    statistics.append(script1, script2, script3);
}