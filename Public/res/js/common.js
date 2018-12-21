
//获取get
function getQueryString(name) {
    var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if(r!=null)return  unescape(decodeURI(r[2])); return null;
}


//写cookies
function setCookie(name,value)
{
    var Days = 30;
    var exp = new Date();
    exp.setTime(exp.getTime() + Days*24*60*60*1000);
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString()+";path=/";
}

//读取cookies
function getCookie(name)
{
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");

    if(arr=document.cookie.match(reg))

        return unescape(arr[2]);
    else
        return null;
}

//删除cookies
function delCookie(name)
{
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval=getCookie(name);
    if(cval!=null)
        document.cookie= name + "="+cval+";expires="+exp.toGMTString();
}

function intToDayTimeformat(intger){
    if(intger==null||intger==''||intger==undefined) return "未设置";
    var fen = parseInt(intger / 60)%60;
    var xiaoshi = parseInt(intger/60/60)%24;
    if(fen<10)fen="0"+fen;
    var miao = intger%60;
    if(miao<10)miao="0"+miao;
    return xiaoshi+":"+fen+":"+miao;
}

function intToDate(timestamp) {
    var date = new Date(timestamp * 1000);//时间戳为10位需*1000，时间戳为13位的话不需乘1000
    var Y = date.getFullYear() + '-';
    var M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
    var D = date.getDate() + ' ';
    var h = date.getHours() + ':';
    var m = date.getMinutes() + ':';
    var s = date.getSeconds();
    return Y+M+D+h+m+s;
}

//强制页面 禁止多余操作
document.oncontextmenu = function(){
    event.returnValue = false;
};
document.oncontextmenu = function () { return false; };
document.onkeydown = function () {
    if (window.event && window.event.keyCode == 123) {
        event.keyCode = 0;
        event.returnValue = false;
        return false;
    }
};
history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
});
document.oncontextmenu=new Function("event.returnValue=false;");
document.onselectstart=new Function("event.returnValue=false;");

function showPage(url,_this) {
    appHelp.allCallback = null;
    if(typeof $ == 'undefined') return false;
    if(url==  $("#page").attr('src')) return false;

    $('.san4b').removeClass('select');
    $(_this).addClass('select');

    if($("#page").length==0){
        $('#pageDiv').append('<iframe id="page"  width="100%" style="    border: 0px; box-sizing: border-box;height: 98vh;left: 0px; top:0px;position: absolute;z-index: 3;"></iframe>\n');
    }
    let page = $("#page");
    if('/page/index.html'==url){page.remove(); return true;}
    if('/page/map.html'==url){page.css({'height':'78vh','margin-top':'107px'});}



    page.css('left',window.innerWidth);
    page.attr('src',url);
    page.animate({"left":"0px"});
}

function showTip(msg,addhead='') {
    if(typeof $ == 'undefined') return false;
    $("#msg").remove();
    $('body').append('<div id="msg"  width="100%" style="word-wrap:break-word;background-color: #fff;border: 0px; box-sizing: border-box;height: 50vh;left: 0px; bottom:0px;position: absolute;z-index: 3;"></div>\n');
    let msgDiv  = $("#msg");
    msgDiv.css('width',window.innerWidth);
    msgDiv.append('<p onclick="$(this).parent().remove()" style="text-align: right;    padding-right: 7px;">x</p>');
    msgDiv.append(addhead);
    msgDiv.css('bottom','-1000px');
    msgDiv.append('<p style="overflow-y:scroll;    height:35Vh;">'+msg+'</p>');
    msgDiv.animate({bottom:'38px'});

}

function formatJson(msg) {
    var rep = "~";
    var jsonStr = JSON.stringify(msg, null, rep)
    var str = "";
    for (var i = 0; i < jsonStr.length; i++) {
        var text2 = jsonStr.charAt(i)
        if (i > 1) {
            var text = jsonStr.charAt(i - 1)
            if (rep != text && rep == text2) {
                str += "<br/>"
            }
        }
        str += text2;
    }
    jsonStr = "";
    for (var i = 0; i < str.length; i++) {
        var text = str.charAt(i);
        if (rep == text)
            jsonStr += "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
        else {
            jsonStr += text;
        }
        if (i == str.length - 2)
            jsonStr += "<br/>"
    }
    return jsonStr;
}
var click =true;
function gongji(data) {
    if (!click) return false;
    click = false;
    let json = data;

    document.getElementById('list').innerHTML = '' + '<br/>';
    console.log(json);
    for (let index in json['rs']) {
        if (index != 'res') {
            setTimeout(function () {
                document.getElementById('list').innerHTML = json['rs'][index] + '<br/>'+ document.getElementById('list').innerHTML
            }, 1000 * index);
        }
    }
    ;

    function getJsonLength(jsonData) {
        var length = 0;
        for (var ever in jsonData) {
            length++;
        }
        return length;
    }

    setTimeout(function () {
        click = true;
        if (json['res'] == 'user1') {
            // document.getElementById('list').innerHTML += '您获得胜利' + '<br/>'
            // webSc.ws.send('{"action":"userInfo"}');
        } else {
            var obj = document.getElementById('msg'); //定位id

            var index = obj.selectedIndex; // 选中索引

            var text = obj.options[index].text; // 选中文本
            document.getElementById('list').innerHTML = text + '都打不过～重新开始人生吧' + '<br/>'+ document.getElementById('list').innerHTML
        }
    }, 1000 * (getJsonLength(json['rs']) - 1));
}