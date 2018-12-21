var webSc = {
    host: "ws://localhost:9501",
    interval: '5000',
    ws: null,
    HB: null,
    initPower: null,
    setHost: function (host) {
        this.host = host;
    },
    setIntervalTime: function (interval) {
        this.interval = interval * 1000;
    },
    runCallback:function (data) {
        console.log(data);
    },
    runServer: null,
    onOpen:null,
    HBFunction:null,//心跳方法
    init: function (runCallback) {
        let self = this;
        self.ws = new WebSocket(self.host);
        self.ws.onopen = function (evt) {
           if(typeof  self.onOpen == 'function'){
               self.onOpen(self.ws,self);
           }
           if(typeof  self.runCallback == 'function'){
               self.runCallback = runCallback;
           }
            self.HB = setInterval(function () {
                if (self.ws) {
                    if(typeof  self.HBFunction == 'function'){
                        self.HBFunction(self.ws);
                    }else{
                        self.ws.send('{"action":"heartbeat"}');
                    }
                } else {
                    clearInterval(self.HB);
                }
            }, self.interval);
            self.initPower = 1;
        };
        self.ws.onmessage = function (evt) {

                self.runCallback(evt.data,self);

        };
        self.ws.onclose = function (evt) {
            self.close();
        };
    },
    close: function () {
        let self = this;
        if (self.ws) {
            self.initPower = 0;
            self.ws.close();
            clearInterval(self.HB);
        }
    },
    sendJson: function (data) {
        let self = this;
        data.userId =  getCookie('userId');
        self.send(JSON.stringify(data));
    },
    decode:function(str){
        return JSON.parse(str);
    },

    send:function (data) {
        let self = this;
        if (self.ws) {
            self.ws.send(data);
        } else {
            alert("请先建立连接");
        }
    }
};