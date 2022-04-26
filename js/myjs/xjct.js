var get = {
  byId: function(id) {
    return typeof id === "string" ? document.getElementById(id) : id
  },
  byClass: function(sClass, oParent) {
    var aClass = [];
    var reClass = new RegExp("(^| )" + sClass + "( |$)");
    var aElem = this.byTagName("*", oParent);
    for (var i = 0; i < aElem.length; i++) reClass.test(aElem[i].className) && aClass.push(aElem[i]);
    return aClass
  },
  byTagName: function(elem, obj) {
    return (obj || document).getElementsByTagName(elem)
  }
};

function pbiframe(ctid){
	$("img").css("z-index","10");
	dcct=dcct+1;
	var thisct = get.byId("ct"+ctid); 
	thisct.style.zIndex=dcct;
}
function sfiframe(){
	$("img").css("z-index","-1");
}

var dragMinWidth = 144;
var dragMinHeight = 30;
/*-------------------------- +
 拖拽函数
 +-------------------------- */
 
function xjct(min,max,revert,close,ct,title,resizeL,resizeT,resizeR,resizeB,resizeLT,resizeTR,resizeBR,resizeLB,content){

function gaoduZSY(){
var ocontent = get.byId(content); 
var oDraggao = oDrag.offsetHeight; //高度
if(oDraggao-43<0){ocontent.style.height=0+ "px";}else{ocontent.style.height=oDraggao-43+ "px";}
}



function drag(oDrag, handle)
{

  var disX = dixY = 0;
  var oMin = get.byClass(min, oDrag)[0];
  var oMax = get.byClass(max, oDrag)[0];
  var oRevert = get.byClass(revert, oDrag)[0];
  var oClose = get.byClass(close, oDrag)[0];
  handle = handle || oDrag;
  handle.style.cursor = "move";
  handle.onmousedown = function (event)
  {
    var event = event || window.event;
    disX = event.clientX - oDrag.offsetLeft;
    disY = event.clientY - oDrag.offsetTop;
    document.onmousemove = function (event)
    {
      var event = event || window.event;
      var iL = event.clientX - disX;
      var iT = event.clientY - disY;
      var maxL = document.documentElement.clientWidth - oDrag.offsetWidth;
      var maxT = document.documentElement.clientHeight - oDrag.offsetHeight;
      iL <= 0 && (iL = 0);
      iT <= 0 && (iT = 0);
      iL >= maxL && (iL = maxL);
      iT >= maxT && (iT = maxT);
      oDrag.style.left = iL + "px";
      oDrag.style.top = iT + "px";
      return false
    };
    document.onmouseup = function ()
    {
      document.onmousemove = null;
      document.onmouseup = null;
      this.releaseCapture && this.releaseCapture()
    };
    this.setCapture && this.setCapture();
    return false
  };  
  oClose.onclick = function (){
  
  var elem=document.getElementById(ct); 

  elem.parentNode.removeChild(elem);
  
  }
  //最大化按钮
  oMax.onclick = function ()
  {
    oDrag.style.top = oDrag.style.left = 0;
    oDrag.style.width = document.documentElement.clientWidth - 2 + "px";
    oDrag.style.height = document.documentElement.clientHeight - 2 + "px";
    this.style.display = "none";
    oRevert.style.display = "block";
gaoduZSY();
  };
  //还原按钮
  oRevert.onclick = function ()
  {    
    oDrag.style.width = dragMinWidth + "px";
    oDrag.style.height = dragMinHeight + "px";
    oDrag.style.left = (document.documentElement.clientWidth - oDrag.offsetWidth) / 2 + "px";
    oDrag.style.top = (document.documentElement.clientHeight - oDrag.offsetHeight) / 2 + "px";
    this.style.display = "none";
    oMax.style.display = "block";
	gaoduZSY();
  };
  //最小化按钮
  oMin.onclick = function ()
  {
    oDrag.style.display = "none";
    var oA = document.createElement("a");
    oA.className = "open";
	
	

    oA.href = "javascript:;";
    oA.title = "还原";
	oA.setAttribute("style","float:left;width:21px;height:19px;display:block;margin-left:5px;background:url(../img/tool.png) no-repeat;position:absolute;z-index:100;top:10px;left:50%;margin-left:-10px;background-position:0 0;");//可行
    document.body.appendChild(oA);
    oA.onclick = function ()
    {

      oDrag.style.display = "block";
      document.body.removeChild(this);
      this.onclick = null;
    };
  };
  //阻止冒泡
  oMin.onmousedown = oMax.onmousedown = oClose.onmousedown = function (event)
  {
    this.onfocus = function () {this.blur()};
    (event || window.event).cancelBubble = true  
  };
}
/*-------------------------- +
 改变大小函数
 +-------------------------- */
function resize(oParent, handle, isLeft, isTop, lockX, lockY)
{

handle.onmousedown = function (event)
  {

    var event = event || window.event;
    var disX = event.clientX - handle.offsetLeft;
    var disY = event.clientY - handle.offsetTop;  
    var iParentTop = oParent.offsetTop;
    var iParentLeft = oParent.offsetLeft;
    var iParentWidth = oParent.offsetWidth;
    var iParentHeight = oParent.offsetHeight;
    document.onmousemove = function (event)
    {
	gaoduZSY();
      var event = event || window.event;
      var iL = event.clientX - disX;
      var iT = event.clientY - disY;
      var maxW = document.documentElement.clientWidth - oParent.offsetLeft - 2;
      var maxH = document.documentElement.clientHeight - oParent.offsetTop - 2;          var iW = isLeft ? iParentWidth - iL : handle.offsetWidth + iL;
      var iH = isTop ? iParentHeight - iT : handle.offsetHeight + iT;
      isLeft && (oParent.style.left = iParentLeft + iL + "px");
      isTop && (oParent.style.top = iParentTop + iT + "px");
      iW < dragMinWidth && (iW = dragMinWidth);
      iW > maxW && (iW = maxW);
      lockX || (oParent.style.width = iW + "px");
      iH < dragMinHeight && (iH = dragMinHeight);
      iH > maxH && (iH = maxH);
      lockY || (oParent.style.height = iH + "px");
      if((isLeft && iW == dragMinWidth) || (isTop && iH == dragMinHeight)) document.onmousemove = null;
      return false;  

    };
    document.onmouseup = function ()
    {

      document.onmousemove = null;
      document.onmouseup = null;
    };

    return false;
  }

};

//获取窗体内各元素对象
  var oDrag =get.byId(ct);
  var oTitle = get.byClass(title, oDrag)[0];
  var oL = get.byClass(resizeL, oDrag)[0];
  var oT = get.byClass(resizeT, oDrag)[0];
  var oR = get.byClass(resizeR, oDrag)[0];
  var oB = get.byClass(resizeB, oDrag)[0];
  var oLT = get.byClass(resizeLT, oDrag)[0];
  var oTR = get.byClass(resizeTR, oDrag)[0];
  var oBR = get.byClass(resizeBR, oDrag)[0];
  var oLB = get.byClass(resizeLB, oDrag)[0];

  drag(oDrag, oTitle);
  //四角
  resize(oDrag, oLT, true, true, false, false);
  resize(oDrag, oTR, false, true, false, false);
  resize(oDrag, oBR, false, false, false, false);
  resize(oDrag, oLB, true, false, false, false);
  //四边
  resize(oDrag, oL, true, false, false, true);
  resize(oDrag, oT, false, true, true, false);
  resize(oDrag, oR, false, false, false, true);
  resize(oDrag, oB, false, false, true, false);
  oDrag.style.left = (document.documentElement.clientWidth - oDrag.offsetWidth) / 2 + "px";
  oDrag.style.top = (document.documentElement.clientHeight - oDrag.offsetHeight) / 2 + "px";



}
var ctid=0;
var dcct=100;//顶层窗体
function newct(url){
var allname=url.substring(url.lastIndexOf("/")+1);
var leixing=allname.substring(allname.lastIndexOf(".")+1);
var name=allname.substring(0,allname.indexOf("."));
var cthtml1='<div id="ct'+ctid+'" class="drag'+ctid+'" onmousedown="pbiframe('+ctid+')" onmouseup="sfiframe()" style="background:#e9e9e9;color:#778899;position:absolute;z-index:100;top:100px;left:100px;width:300px;height:250pxborder:1px solid #444;border-radius:5px;box-shadow:0 1px 3px 2px #666;">\
<div class="title'+ctid+'" style="position:relative;height:27px;margin:5px;">\
<h2 style="font-size:14px;height:27px;line-height:24px;border-bottom:1px solid #A1B4B0;">畅享文件</h2>\
 <div style="position:absolute;height:19px;top:2px;right:0;">\
  <a class="min'+ctid+'" href="javascript:;" title="最小化" style="float:left;width:21px;height:19px;display:block;margin-left:5px;background:url(../img/tool.png) no-repeat;background-position:-29px 0;"></a>\
   <a class="max'+ctid+'" href="javascript:;" title="最大化" style="float:left;width:21px;height:19px;display:block;margin-left:5px;background:url(../img/tool.png) no-repeat;background-position:-60px 0;"></a>\
    <a class="revert'+ctid+'" href="javascript:;" title="还原" style="float:left;width:21px;height:19px;display:block;margin-left:5px;background:url(../img/tool.png) no-repeat;background-position:-149px 0;display:none;"></a>\
	<a class="close'+ctid+'" href="javascript:;" title="关闭" style="float:left;width:21px;height:19px;display:block;margin-left:5px;background:url(../img/tool.png) no-repeat;background-position:-89px 0;"></a>\
  </div>\
</div>\
 <div class="resizeL'+ctid+'" style="position:absolute;background:#000;overflow:hidden;opacity:0;filter:alpha(opacity=0);top:0;width:5px;height:100%;cursor:w-resize;"></div>\
 <div class="resizeT'+ctid+'" style="position:absolute;background:#000;overflow:hidden;opacity:0;filter:alpha(opacity=0);top:0;width:100%;height:5px;cursor:n-resize;"></div>\
 <div class="resizeR'+ctid+'" style="position:absolute;background:#000;overflow:hidden;opacity:0;filter:alpha(opacity=0);right:0;top:0;width:5px;height:100%;cursor:w-resize;"></div>\
 <div class="resizeB'+ctid+'" style="position:absolute;background:#000;overflow:hidden;opacity:0;filter:alpha(opacity=0);bottom:0;width:100%;height:5px;cursor:n-resize;"></div>\
 <div class="resizeLT'+ctid+'" style="position:absolute;background:#000;overflow:hidden;opacity:0;filter:alpha(opacity=0);width:8px;height:8px;background:#FF0;top:0;left:0;cursor:nw-resize;"></div>\
 <div class="resizeTR'+ctid+'" style="position:absolute;background:#000;overflow:hidden;opacity:0;filter:alpha(opacity=0);width:8px;height:8px;background:#FF0;top:0;right:0;cursor:ne-resize;"></div>\
 <div class="resizeBR'+ctid+'" style="position:absolute;width:14px;height:14px;right:0;bottom:0;overflow:hidden;cursor:nw-resize;"></div>\
 <div class="resizeLB'+ctid+'" style="position:absolute;background:#000;overflow:hidden;opacity:0;filter:alpha(opacity=0);width:8px;height:8px;background:#FF0;left:0;bottom:0;cursor:ne-resize;"></div>\
 <div id="content'+ctid+'"  class="content'+ctid+'" style="margin:0px 5px 5px 5px;overflow: hidden;height:200px;"><img id="tppb" src="../img/tppb.png" style="position:absolute;width:100%!important; height:100%!important;z-index:-1 ">\
';
var cthtml3=' </img></div>\
</div>';


var cthtml2='<div id="xsct'+ctid+'" style="overflow: hidden;height:100%;width:100%;">'+'非常抱歉，畅享云盘暂不支持浏览此类文件，我们正在努力适配中。'+'</div>';



if(leixing=='ppt'||leixing=='pptx'||leixing=='xls'||leixing=='xlsx'||leixing=='doc'||leixing=='docx'){
	cthtml2='<iframe id="xsct'+ctid+'" src="https://view.officeapps.live.com/op/embed.aspx?src='+url+'" style="border: medium none;overflow:hidden;height:100%;width:100%;" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"/>';
}else if(leixing=='jpg'||leixing=='png'||leixing=='gif'||leixing=='svg'||leixing=='bmp'||leixing=='jpeg'||leixing=='apng'){
	cthtml2='<img id="xsct'+ctid+'" src="'+url+'" style="overflow: hidden;height:100%;width:100%;" loop="infinite"></img>';
}else if(leixing=='txt'||leixing=='php'||leixing=='js'||leixing=='html'||leixing=='htm'||leixing=='xhtml'||leixing=='java'||leixing=='css'||leixing=='sql'||leixing=='xml'||leixing=='asp'||leixing=='bat'||leixing=='c'||leixing=='cpp'||leixing=='bas'||leixing=='prg'||leixing=='cmd'||leixing=='py'||leixing=='md'){
	cthtml2='<iframe id="xsct'+ctid+'" src="'+url+'" style="border: medium none;overflow:hidden;height:100%;width:100%;" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"/>';
}else if(leixing=='mp4'||leixing=='mp3'||leixing=='ogg'||leixing=='webm'||leixing=='flv'||leixing=='m3u8'||leixing=='mpd'||leixing=='pdf'){
	cthtml2='<iframe id="xsct'+ctid+'" src="../APP/changxiangwenjianliulanqi/wjllq.php?src='+url+'" style="border: medium none;overflow:hidden;height:100%;width:100%;" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"/>';
}else if(leixing=='yunyingyongAPP'){
	
	url=url.slice(0,url.length-15);
	cthtml2='<iframe id="xsct'+ctid+'" src="'+url+'" style="zoom:75%;border: medium none;overflow:hidden;height:100%;width:100%;" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"/>';
}




var cthtml=cthtml1+cthtml2+cthtml3;
$('body').append(cthtml);


//document.writeln(cthtml);

xjct("min"+ctid,"max"+ctid,"revert"+ctid,"close"+ctid,"ct"+ctid,"title"+ctid,"resizeL"+ctid,"resizeT"+ctid,"resizeR"+ctid,"resizeB"+ctid,"resizeLT"+ctid,"resizeTR"+ctid,"resizeBR"+ctid,"resizeLB"+ctid,"content"+ctid);
pbiframe(ctid);//新建窗体移动到顶层
sfiframe();//消除遮挡
ctid=ctid+1;



}


