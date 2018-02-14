ace.define("ace/mode/css",["require","exports","module","ace/lib/oop","ace/mode/text","ace/mode/css_highlight_rules","ace/mode/matching_brace_outdent","ace/worker/worker_client","ace/mode/behaviour/css","ace/mode/folding/cstyle"],function(e,t,n){var r=e("../lib/oop"),o=e("./text").Mode,i=e("./css_highlight_rules").CssHighlightRules,a=e("./matching_brace_outdent").MatchingBraceOutdent,s=e("../worker/worker_client").WorkerClient,l=e("./behaviour/css").CssBehaviour,c=e("./folding/cstyle").FoldMode,u=function(){this.HighlightRules=i,this.$outdent=new a,this.$behaviour=new l,this.foldingRules=new c};r.inherits(u,o),function(){this.foldingRules="cStyle",this.blockComment={start:"/*",end:"*/"},this.getNextLineIndent=function(e,t,n){var r=this.$getIndent(t),o=this.getTokenizer().getLineTokens(t,e).tokens;return o.length&&"comment"==o[o.length-1].type?r:(t.match(/^.*\{\s*$/)&&(r+=n),r)},this.checkOutdent=function(e,t,n){return this.$outdent.checkOutdent(t,n)},this.autoOutdent=function(e,t,n){this.$outdent.autoOutdent(t,n)},this.createWorker=function(e){var t=new s(["ace"],"ace/mode/css_worker","Worker");return t.attachToDocument(e.getDocument()),t.on("csslint",function(t){e.setAnnotations(t.data)}),t.on("terminate",function(){e.clearAnnotations()}),t},this.$id="ace/mode/css"}.call(u.prototype),t.Mode=u}),ace.define("ace/mode/css_highlight_rules",["require","exports","module","ace/lib/oop","ace/lib/lang","ace/mode/text_highlight_rules"],function(e,t,n){var r=e("../lib/oop"),o=(e("../lib/lang"),e("./text_highlight_rules").TextHighlightRules),i=t.supportType="animation-fill-mode|alignment-adjust|alignment-baseline|animation-delay|animation-direction|animation-duration|animation-iteration-count|animation-name|animation-play-state|animation-timing-function|animation|appearance|azimuth|backface-visibility|background-attachment|background-break|background-clip|background-color|background-image|background-origin|background-position|background-repeat|background-size|background|baseline-shift|binding|bleed|bookmark-label|bookmark-level|bookmark-state|bookmark-target|border-bottom|border-bottom-color|border-bottom-left-radius|border-bottom-right-radius|border-bottom-style|border-bottom-width|border-collapse|border-color|border-image|border-image-outset|border-image-repeat|border-image-slice|border-image-source|border-image-width|border-left|border-left-color|border-left-style|border-left-width|border-radius|border-right|border-right-color|border-right-style|border-right-width|border-spacing|border-style|border-top|border-top-color|border-top-left-radius|border-top-right-radius|border-top-style|border-top-width|border-width|border|bottom|box-align|box-decoration-break|box-direction|box-flex-group|box-flex|box-lines|box-ordinal-group|box-orient|box-pack|box-shadow|box-sizing|break-after|break-before|break-inside|caption-side|clear|clip|color-profile|color|column-count|column-fill|column-gap|column-rule|column-rule-color|column-rule-style|column-rule-width|column-span|column-width|columns|content|counter-increment|counter-reset|crop|cue-after|cue-before|cue|cursor|direction|display|dominant-baseline|drop-initial-after-adjust|drop-initial-after-align|drop-initial-before-adjust|drop-initial-before-align|drop-initial-size|drop-initial-value|elevation|empty-cells|fit|fit-position|float-offset|float|font-family|font-size|font-size-adjust|font-stretch|font-style|font-variant|font-weight|font|grid-columns|grid-rows|hanging-punctuation|height|hyphenate-after|hyphenate-before|hyphenate-character|hyphenate-lines|hyphenate-resource|hyphens|icon|image-orientation|image-rendering|image-resolution|inline-box-align|left|letter-spacing|line-height|line-stacking-ruby|line-stacking-shift|line-stacking-strategy|line-stacking|list-style-image|list-style-position|list-style-type|list-style|margin-bottom|margin-left|margin-right|margin-top|margin|mark-after|mark-before|mark|marks|marquee-direction|marquee-play-count|marquee-speed|marquee-style|max-height|max-width|min-height|min-width|move-to|nav-down|nav-index|nav-left|nav-right|nav-up|opacity|orphans|outline-color|outline-offset|outline-style|outline-width|outline|overflow-style|overflow-x|overflow-y|overflow|padding-bottom|padding-left|padding-right|padding-top|padding|page-break-after|page-break-before|page-break-inside|page-policy|page|pause-after|pause-before|pause|perspective-origin|perspective|phonemes|pitch-range|pitch|play-during|pointer-events|position|presentation-level|punctuation-trim|quotes|rendering-intent|resize|rest-after|rest-before|rest|richness|right|rotation-point|rotation|ruby-align|ruby-overhang|ruby-position|ruby-span|size|speak-header|speak-numeral|speak-punctuation|speak|speech-rate|stress|string-set|table-layout|target-name|target-new|target-position|target|text-align-last|text-align|text-decoration|text-emphasis|text-height|text-indent|text-justify|text-outline|text-shadow|text-transform|text-wrap|top|transform-origin|transform-style|transform|transition-delay|transition-duration|transition-property|transition-timing-function|transition|unicode-bidi|vertical-align|visibility|voice-balance|voice-duration|voice-family|voice-pitch-range|voice-pitch|voice-rate|voice-stress|voice-volume|volume|white-space-collapse|white-space|widows|width|word-break|word-spacing|word-wrap|z-index",a=t.supportFunction="rgb|rgba|url|attr|counter|counters",s=t.supportConstant="absolute|after-edge|after|all-scroll|all|alphabetic|always|antialiased|armenian|auto|avoid-column|avoid-page|avoid|balance|baseline|before-edge|before|below|bidi-override|block-line-height|block|bold|bolder|border-box|both|bottom|box|break-all|break-word|capitalize|caps-height|caption|center|central|char|circle|cjk-ideographic|clone|close-quote|col-resize|collapse|column|consider-shifts|contain|content-box|cover|crosshair|cubic-bezier|dashed|decimal-leading-zero|decimal|default|disabled|disc|disregard-shifts|distribute-all-lines|distribute-letter|distribute-space|distribute|dotted|double|e-resize|ease-in|ease-in-out|ease-out|ease|ellipsis|end|exclude-ruby|fill|fixed|georgian|glyphs|grid-height|groove|hand|hanging|hebrew|help|hidden|hiragana-iroha|hiragana|horizontal|icon|ideograph-alpha|ideograph-numeric|ideograph-parenthesis|ideograph-space|ideographic|inactive|include-ruby|inherit|initial|inline-block|inline-box|inline-line-height|inline-table|inline|inset|inside|inter-ideograph|inter-word|invert|italic|justify|katakana-iroha|katakana|keep-all|last|left|lighter|line-edge|line-through|line|linear|list-item|local|loose|lower-alpha|lower-greek|lower-latin|lower-roman|lowercase|lr-tb|ltr|mathematical|max-height|max-size|medium|menu|message-box|middle|move|n-resize|ne-resize|newspaper|no-change|no-close-quote|no-drop|no-open-quote|no-repeat|none|normal|not-allowed|nowrap|nw-resize|oblique|open-quote|outset|outside|overline|padding-box|page|pointer|pre-line|pre-wrap|pre|preserve-3d|progress|relative|repeat-x|repeat-y|repeat|replaced|reset-size|ridge|right|round|row-resize|rtl|s-resize|scroll|se-resize|separate|slice|small-caps|small-caption|solid|space|square|start|static|status-bar|step-end|step-start|steps|stretch|strict|sub|super|sw-resize|table-caption|table-cell|table-column-group|table-column|table-footer-group|table-header-group|table-row-group|table-row|table|tb-rl|text-after-edge|text-before-edge|text-bottom|text-size|text-top|text|thick|thin|transparent|underline|upper-alpha|upper-latin|upper-roman|uppercase|use-script|vertical-ideographic|vertical-text|visible|w-resize|wait|whitespace|z-index|zero",l=t.supportConstantColor="aqua|black|blue|fuchsia|gray|green|lime|maroon|navy|olive|orange|purple|red|silver|teal|white|yellow",c=t.supportConstantFonts="arial|century|comic|courier|garamond|georgia|helvetica|impact|lucida|symbol|system|tahoma|times|trebuchet|utopia|verdana|webdings|sans-serif|serif|monospace",u=t.numRe="\\-?(?:(?:[0-9]+)|(?:[0-9]*\\.[0-9]+))",d=t.pseudoElements="(\\:+)\\b(after|before|first-letter|first-line|moz-selection|selection)\\b",g=t.pseudoClasses="(:)\\b(active|checked|disabled|empty|enabled|first-child|first-of-type|focus|hover|indeterminate|invalid|last-child|last-of-type|link|not|nth-child|nth-last-child|nth-last-of-type|nth-of-type|only-child|only-of-type|required|root|target|valid|visited)\\b",p=function(){var e=this.createKeywordMapper({"support.function":a,"support.constant":s,"support.type":i,"support.constant.color":l,"support.constant.fonts":c},"text",!0);this.$rules={start:[{token:"comment",regex:"\\/\\*",push:"comment"},{token:"paren.lparen",regex:"\\{",push:"ruleset"},{token:"string",regex:"@.*?{",push:"media"},{token:"keyword",regex:"#[a-z0-9-_]+"},{token:"variable",regex:"\\.[a-z0-9-_]+"},{token:"string",regex:":[a-z0-9-_]+"},{token:"constant",regex:"[a-z0-9-_]+"},{caseInsensitive:!0}],media:[{token:"comment",regex:"\\/\\*",push:"comment"},{token:"paren.lparen",regex:"\\{",push:"ruleset"},{token:"string",regex:"\\}",next:"pop"},{token:"keyword",regex:"#[a-z0-9-_]+"},{token:"variable",regex:"\\.[a-z0-9-_]+"},{token:"string",regex:":[a-z0-9-_]+"},{token:"constant",regex:"[a-z0-9-_]+"},{caseInsensitive:!0}],comment:[{token:"comment",regex:"\\*\\/",next:"pop"},{defaultToken:"comment"}],ruleset:[{token:"paren.rparen",regex:"\\}",next:"pop"},{token:"comment",regex:"\\/\\*",push:"comment"},{token:"string",regex:'["](?:(?:\\\\.)|(?:[^"\\\\]))*?["]'},{token:"string",regex:"['](?:(?:\\\\.)|(?:[^'\\\\]))*?[']"},{token:["constant.numeric","keyword"],regex:"("+u+")(ch|cm|deg|em|ex|fr|gd|grad|Hz|in|kHz|mm|ms|pc|pt|px|rad|rem|s|turn|vh|vm|vw|%)"},{token:"constant.numeric",regex:u},{token:"constant.numeric",regex:"#[a-f0-9]{6}"},{token:"constant.numeric",regex:"#[a-f0-9]{3}"},{token:["punctuation","entity.other.attribute-name.pseudo-element.css"],regex:d},{token:["punctuation","entity.other.attribute-name.pseudo-class.css"],regex:g},{token:["support.function","string","support.function"],regex:"(url\\()(.*)(\\))"},{token:e,regex:"\\-?[a-zA-Z_][a-zA-Z0-9_\\-]*"},{caseInsensitive:!0}]},this.normalizeRules()};r.inherits(p,o),t.CssHighlightRules=p}),ace.define("ace/mode/matching_brace_outdent",["require","exports","module","ace/range"],function(e,t,n){var r=e("../range").Range,o=function(){};(function(){this.checkOutdent=function(e,t){return!!/^\s+$/.test(e)&&/^\s*\}/.test(t)},this.autoOutdent=function(e,t){var n=e.getLine(t).match(/^(\s*\})/);if(!n)return 0;var o=n[1].length,i=e.findMatchingBracket({row:t,column:o});if(!i||i.row==t)return 0;var a=this.$getIndent(e.getLine(i.row));e.replace(new r(t,0,t,o-1),a)},this.$getIndent=function(e){return e.match(/^\s*/)[0]}}).call(o.prototype),t.MatchingBraceOutdent=o}),ace.define("ace/mode/behaviour/css",["require","exports","module","ace/lib/oop","ace/mode/behaviour","ace/mode/behaviour/cstyle","ace/token_iterator"],function(e,t,n){var r=e("../../lib/oop"),o=(e("../behaviour").Behaviour,e("./cstyle").CstyleBehaviour),i=e("../../token_iterator").TokenIterator,a=function(){this.inherit(o),this.add("colon","insertion",function(e,t,n,r,o){if(":"===o){var a=n.getCursorPosition(),s=new i(r,a.row,a.column),l=s.getCurrentToken();if(l&&l.value.match(/\s+/)&&(l=s.stepBackward()),l&&"support.type"===l.type){var c=r.doc.getLine(a.row);if(":"===c.substring(a.column,a.column+1))return{text:"",selection:[1,1]};if(!c.substring(a.column).match(/^\s*;/))return{text:":;",selection:[1,1]}}}}),this.add("colon","deletion",function(e,t,n,r,o){var a=r.doc.getTextRange(o);if(!o.isMultiLine()&&":"===a){var s=n.getCursorPosition(),l=new i(r,s.row,s.column),c=l.getCurrentToken();if(c&&c.value.match(/\s+/)&&(c=l.stepBackward()),c&&"support.type"===c.type&&";"===r.doc.getLine(o.start.row).substring(o.end.column,o.end.column+1))return o.end.column++,o}}),this.add("semicolon","insertion",function(e,t,n,r,o){if(";"===o){var i=n.getCursorPosition();if(";"===r.doc.getLine(i.row).substring(i.column,i.column+1))return{text:"",selection:[1,1]}}})};r.inherits(a,o),t.CssBehaviour=a}),ace.define("ace/mode/behaviour/cstyle",["require","exports","module","ace/lib/oop","ace/mode/behaviour","ace/token_iterator","ace/lib/lang"],function(e,t,n){var r,o=e("../../lib/oop"),i=e("../behaviour").Behaviour,a=e("../../token_iterator").TokenIterator,s=e("../../lib/lang"),l=["text","paren.rparen","punctuation.operator"],c=["text","paren.rparen","punctuation.operator","comment"],u={},d=function(e){var t=-1;if(e.multiSelect&&(t=e.selection.id,u.rangeCount!=e.multiSelect.rangeCount&&(u={rangeCount:e.multiSelect.rangeCount})),u[t])return r=u[t];r=u[t]={autoInsertedBrackets:0,autoInsertedRow:-1,autoInsertedLineEnd:"",maybeInsertedBrackets:0,maybeInsertedRow:-1,maybeInsertedLineStart:"",maybeInsertedLineEnd:""}},g=function(){this.add("braces","insertion",function(e,t,n,o,i){var a=n.getCursorPosition(),l=o.doc.getLine(a.row);if("{"==i){d(n);var c=n.getSelectionRange(),u=o.doc.getTextRange(c);if(""!==u&&"{"!==u&&n.getWrapBehavioursEnabled())return{text:"{"+u+"}",selection:!1};if(g.isSaneInsertion(n,o))return/[\]\}\)]/.test(l[a.column])||n.inMultiSelectMode?(g.recordAutoInsert(n,o,"}"),{text:"{}",selection:[1,1]}):(g.recordMaybeInsert(n,o,"{"),{text:"{",selection:[1,1]})}else if("}"==i){if(d(n),"}"==(m=l.substring(a.column,a.column+1))&&null!==o.$findOpeningBracket("}",{column:a.column+1,row:a.row})&&g.isAutoInsertedClosing(a,l,i))return g.popAutoInsertedClosing(),{text:"",selection:[1,1]}}else{if("\n"==i||"\r\n"==i){d(n);var p="";g.isMaybeInsertedClosing(a,l)&&(p=s.stringRepeat("}",r.maybeInsertedBrackets),g.clearMaybeInsertedClosing());var m=l.substring(a.column,a.column+1);if("}"===m){var h=o.findMatchingBracket({row:a.row,column:a.column+1},"}");if(!h)return null;b=this.$getIndent(o.getLine(h.row))}else{if(!p)return void g.clearMaybeInsertedClosing();var b=this.$getIndent(l)}var f=b+o.getTabString();return{text:"\n"+f+"\n"+b+p,selection:[1,f.length,1,f.length]}}g.clearMaybeInsertedClosing()}}),this.add("braces","deletion",function(e,t,n,o,i){var a=o.doc.getTextRange(i);if(!i.isMultiLine()&&"{"==a){if(d(n),"}"==o.doc.getLine(i.start.row).substring(i.end.column,i.end.column+1))return i.end.column++,i;r.maybeInsertedBrackets--}}),this.add("parens","insertion",function(e,t,n,r,o){if("("==o){d(n);var i=n.getSelectionRange(),a=r.doc.getTextRange(i);if(""!==a&&n.getWrapBehavioursEnabled())return{text:"("+a+")",selection:!1};if(g.isSaneInsertion(n,r))return g.recordAutoInsert(n,r,")"),{text:"()",selection:[1,1]}}else if(")"==o){d(n);var s=n.getCursorPosition(),l=r.doc.getLine(s.row);if(")"==l.substring(s.column,s.column+1)&&null!==r.$findOpeningBracket(")",{column:s.column+1,row:s.row})&&g.isAutoInsertedClosing(s,l,o))return g.popAutoInsertedClosing(),{text:"",selection:[1,1]}}}),this.add("parens","deletion",function(e,t,n,r,o){var i=r.doc.getTextRange(o);if(!o.isMultiLine()&&"("==i&&(d(n),")"==r.doc.getLine(o.start.row).substring(o.start.column+1,o.start.column+2)))return o.end.column++,o}),this.add("brackets","insertion",function(e,t,n,r,o){if("["==o){d(n);var i=n.getSelectionRange(),a=r.doc.getTextRange(i);if(""!==a&&n.getWrapBehavioursEnabled())return{text:"["+a+"]",selection:!1};if(g.isSaneInsertion(n,r))return g.recordAutoInsert(n,r,"]"),{text:"[]",selection:[1,1]}}else if("]"==o){d(n);var s=n.getCursorPosition(),l=r.doc.getLine(s.row);if("]"==l.substring(s.column,s.column+1)&&null!==r.$findOpeningBracket("]",{column:s.column+1,row:s.row})&&g.isAutoInsertedClosing(s,l,o))return g.popAutoInsertedClosing(),{text:"",selection:[1,1]}}}),this.add("brackets","deletion",function(e,t,n,r,o){var i=r.doc.getTextRange(o);if(!o.isMultiLine()&&"["==i&&(d(n),"]"==r.doc.getLine(o.start.row).substring(o.start.column+1,o.start.column+2)))return o.end.column++,o}),this.add("string_dquotes","insertion",function(e,t,n,r,o){if('"'==o||"'"==o){d(n);var i=o,a=n.getSelectionRange(),s=r.doc.getTextRange(a);if(""!==s&&"'"!==s&&'"'!=s&&n.getWrapBehavioursEnabled())return{text:i+s+i,selection:!1};var l=n.getCursorPosition(),c=r.doc.getLine(l.row);if("\\"==c.substring(l.column-1,l.column))return null;for(var u,p=r.getTokens(a.start.row),m=0,h=-1,b=0;b<p.length&&(u=p[b],"string"==u.type?h=-1:h<0&&(h=u.value.indexOf(i)),!(u.value.length+m>a.start.column));b++)m+=p[b].value.length;if(!u||h<0&&"comment"!==u.type&&("string"!==u.type||a.start.column!==u.value.length+m-1&&u.value.lastIndexOf(i)===u.value.length-1)){if(!g.isSaneInsertion(n,r))return;return{text:i+i,selection:[1,1]}}if(u&&"string"===u.type&&c.substring(l.column,l.column+1)==i)return{text:"",selection:[1,1]}}}),this.add("string_dquotes","deletion",function(e,t,n,r,o){var i=r.doc.getTextRange(o);if(!o.isMultiLine()&&('"'==i||"'"==i)&&(d(n),r.doc.getLine(o.start.row).substring(o.start.column+1,o.start.column+2)==i))return o.end.column++,o})};g.isSaneInsertion=function(e,t){var n=e.getCursorPosition(),r=new a(t,n.row,n.column);if(!this.$matchTokenType(r.getCurrentToken()||"text",l)){var o=new a(t,n.row,n.column+1);if(!this.$matchTokenType(o.getCurrentToken()||"text",l))return!1}return r.stepForward(),r.getCurrentTokenRow()!==n.row||this.$matchTokenType(r.getCurrentToken()||"text",c)},g.$matchTokenType=function(e,t){return t.indexOf(e.type||e)>-1},g.recordAutoInsert=function(e,t,n){var o=e.getCursorPosition(),i=t.doc.getLine(o.row);this.isAutoInsertedClosing(o,i,r.autoInsertedLineEnd[0])||(r.autoInsertedBrackets=0),r.autoInsertedRow=o.row,r.autoInsertedLineEnd=n+i.substr(o.column),r.autoInsertedBrackets++},g.recordMaybeInsert=function(e,t,n){var o=e.getCursorPosition(),i=t.doc.getLine(o.row);this.isMaybeInsertedClosing(o,i)||(r.maybeInsertedBrackets=0),r.maybeInsertedRow=o.row,r.maybeInsertedLineStart=i.substr(0,o.column)+n,r.maybeInsertedLineEnd=i.substr(o.column),r.maybeInsertedBrackets++},g.isAutoInsertedClosing=function(e,t,n){return r.autoInsertedBrackets>0&&e.row===r.autoInsertedRow&&n===r.autoInsertedLineEnd[0]&&t.substr(e.column)===r.autoInsertedLineEnd},g.isMaybeInsertedClosing=function(e,t){return r.maybeInsertedBrackets>0&&e.row===r.maybeInsertedRow&&t.substr(e.column)===r.maybeInsertedLineEnd&&t.substr(0,e.column)==r.maybeInsertedLineStart},g.popAutoInsertedClosing=function(){r.autoInsertedLineEnd=r.autoInsertedLineEnd.substr(1),r.autoInsertedBrackets--},g.clearMaybeInsertedClosing=function(){r&&(r.maybeInsertedBrackets=0,r.maybeInsertedRow=-1)},o.inherits(g,i),t.CstyleBehaviour=g}),ace.define("ace/mode/folding/cstyle",["require","exports","module","ace/lib/oop","ace/range","ace/mode/folding/fold_mode"],function(e,t,n){var r=e("../../lib/oop"),o=e("../../range").Range,i=e("./fold_mode").FoldMode,a=t.FoldMode=function(e){e&&(this.foldingStartMarker=new RegExp(this.foldingStartMarker.source.replace(/\|[^|]*?$/,"|"+e.start)),this.foldingStopMarker=new RegExp(this.foldingStopMarker.source.replace(/\|[^|]*?$/,"|"+e.end)))};r.inherits(a,i),function(){this.foldingStartMarker=/(\{|\[)[^\}\]]*$|^\s*(\/\*)/,this.foldingStopMarker=/^[^\[\{]*(\}|\])|^[\s\*]*(\*\/)/,this.getFoldWidgetRange=function(e,t,n,r){var o=e.getLine(n),i=o.match(this.foldingStartMarker);if(i){if(s=i.index,i[1])return this.openingBracketBlock(e,i[1],n,s);var a=e.getCommentFoldRange(n,s+i[0].length,1);return a&&!a.isMultiLine()&&(r?a=this.getSectionRange(e,n):"all"!=t&&(a=null)),a}if("markbegin"!==t&&(i=o.match(this.foldingStopMarker))){var s=i.index+i[0].length;return i[1]?this.closingBracketBlock(e,i[1],n,s):e.getCommentFoldRange(n,s,-1)}},this.getSectionRange=function(e,t){for(var n=e.getLine(t),r=n.search(/\S/),i=t,a=n.length,s=t+=1,l=e.getLength();++t<l;){var c=(n=e.getLine(t)).search(/\S/);if(-1!==c){if(r>c)break;var u=this.getFoldWidgetRange(e,"all",t);if(u){if(u.start.row<=i)break;if(u.isMultiLine())t=u.end.row;else if(r==c)break}s=t}}return new o(i,a,s,e.getLine(s).length)}}.call(a.prototype)});