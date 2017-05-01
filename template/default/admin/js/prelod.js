isamap = new Object();
isamap[0] = "";
isamap[1] = "_ov";
if (document.images) {
isimages = new Object();
isimages.img_armatura=new Image();
isimages.img_armatura.src="images/img_menu1.gif";
isimages.img_armatura_ov=new Image();
isimages.img_armatura_ov.src="images/img_menu1h.gif";
isimages.img_davlenie=new Image();
isimages.img_davlenie.src="images/img_menu2.gif";
isimages.img_davlenie_ov=new Image();
isimages.img_davlenie_ov.src="images/img_menu2h.gif";
isimages.img_izdelie=new Image();
isimages.img_izdelie.src="images/img_menu3.gif";
isimages.img_izdelie_ov=new Image();
isimages.img_izdelie_ov.src="images/img_menu3h.gif";
isimages.img_oboryd=new Image();
isimages.img_oboryd.src="images/img_menu4.gif";
isimages.img_oboryd_ov=new Image();
isimages.img_oboryd_ov.src="images/img_menu4h.gif";
}
function imgSwap(id, act)
{
if(document.images) document.images[id].src =
eval( "isimages.img_" + id + isamap[act] + ".src");
}