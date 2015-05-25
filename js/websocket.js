var ws=new WebSocket('ws://boto.cloudapp.net/');
ws.onopen=function(){
	console.log('Connection open');
}
