
	function regexMD_to_html(text){

		let link_css = ".hljs{display:block;overflow-x:auto;padding:0.5em;background:#333;color:white}.hljs-name,.hljs-strong{font-weight:bold}.hljs-code,.hljs-emphasis{font-style:italic}.hljs-tag{color:#62c8f3}.hljs-variable,.hljs-template-variable,.hljs-selector-id,.hljs-selector-class{color:#ade5fc}.hljs-string,.hljs-bullet{color:#a2fca2}.hljs-type,.hljs-title,.hljs-section,.hljs-attribute,.hljs-quote,.hljs-built_in,.hljs-builtin-name{color:#ffa}.hljs-number,.hljs-symbol,.hljs-bullet{color:#d36363}.hljs-keyword,.hljs-selector-tag,.hljs-literal{color:#fcc28c}.hljs-comment,.hljs-deletion,.hljs-code{color:#888}.hljs-regexp,.hljs-link{color:#c6b4f0}.hljs-meta{color:#fc9b9b}.hljs-deletion{background-color:#fc9b9b;color:#333}.hljs-addition{background-color:#a2fca2;color:#333}.hljs a{color:inherit}.hljs a:focus,.hljs a:hover{color:inherit;text-decoration:underline}";
		let link_jquery = "";
		//let link_jquery = "<script src='https://code.jquery.com/jquery-3.2.1.js'></script>";
		let link_highlight ="<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.10.0/highlight.min.js'></script>";
		//let fn_highlight = "";
		let fn_highlight ="\n\t<script type='text/javascript'>\n\t\thljs.initHighlightingOnLoad(); \n\t</script>";
		let template = "<!DOCTYPE html>\n<html>\n\t<head>\n\t\t<meta charset='utf-8'>\n\t\t<title>"+document_name+"</title>\n\t\t<style type='text/css'>"+link_css+"\n\t\t</style>\n\t</head>\n\t<body>\n\n\t{{content}}\n\t</body>\n\t"+link_jquery+link_highlight+fn_highlight+"\n</html>";
		var objpatt = {
			 pattH1 		: /(^#{1}? )(.+)?/gm,
			 pattH2 		: /(^#{2}? )(.+)?/gm,
			 pattH3 		: /(^#{3}? )(.+)?/gm,
			 pattH4 		: /(^#{4}? )(.+)?/gm,
			 pattH5 		: /(^#{5}? )(.+)?/gm,
			 pattH6 		: /(^#{6}? )(.+)?/gm,
			 pattheadder1	: /([A-z0-9ก-๙].+)\n={2,}/gm,
			 pattheadder2	: /([A-z0-9ก-๙].+)\n\-{2,}/gm,
			 pattlink 		: /(\[(.*?)\]\()(.+?)(\))/gm,
			 patthorizontal : /^\s{0,}?(-{3,}|\*{3,}|_{3,})/gm,
			 pattnewline 	: /(^[\r\n{2}]\w\s?)(.*?).?\n/mg,
			 pattnewlineBr	: /^\n{2}/gm,
			 pattStrong 	: /(\*\*|__)(.*?)\1/gm,
			 pattStrike		: /(~~)(.*?)\1/gm,
			 pattitalics 	: /(\*|_)(.*?)\1/gm,
			 pattinlinecode	: /(`)(.*?)\1/gm,
			 pattblockquote : /^[>]+\s+(.*)?/gm,
			 // support insert img my option
			 pattimgOption 	: /!\[(.*)\]\((.+)\)\((.+)\)\((.+)\)/gm,
			 // support insert img original
			 pattimg 		: /!\[(.*)\]\((.+)\)/gm,
			 // support list *
			 patttlist1      : /^([\n\t\s]?)+(\*|\+)(.*|\w){1,}/gm,
			 // support list -
			 patttlist2      : /^([\n\t\s]?)+(-)(.*|\w){1,}/gm,
			 // subport font color {? text ?}(#color)
			 pattfontcolor	: /({\s?\?)(.*?)(\?\s?})\((.+)\)/gm,
			 pattcode_block : /```\s?(\w+)\n([\s\S]*?)\n{1,}```(\n?)/gm,
			 pattTableth	: /[|][|](\s+[A-Za-z0-9 -_*#@$%:;?!.,\/\\]+\s+)[|]?[|]?(\s+[A-Za-z0-9 -_*#@$%:;?!.,\/\\]+\s+)[|]?[|]?(\s+[A-Za-z0-9 -_*#@$%:;?!.,\/\\]+\s+)[|]?[|]?\r?\n?\|?:-+:\|?:-+:\|?:-+:\|?/gm,
			 pattTableC 	: /[|](\s+[A-Za-z0-9 -_*#@$%:;?!.,\/\\]+\s+)[|](\s+[A-Za-z0-9 -_*#@$%:;?!.,\/\\]+\s+)[|](\s+[A-Za-z0-9 -_*#@$%:;?!.,\/\\]+\s+)[|]?\r?\n?/gm,
			 pattcenter     : /[{](.*?)[}]/gm
			
		}
		
		text = 
		text.replace(objpatt.pattTableth,"<table border=1>\n<tr>\n\t<th>$1</th>\n\t<th>$2</th>\n\t<th>$3</th>\n</tr>")
			.replace(objpatt.pattTableC,"\n<tr>\n\t<td>$1</td>\n\t<td>$2</td>\n\t<td>$3</td>\n</tr>")	
			.replace(objpatt.pattcode_block,"<pre><code class ='$1'>$2</code></pre>")
			.replace(objpatt.pattinlinecode,"<code>$2</code>")
			.replace(objpatt.pattfontcolor,"<span style='color:$4;'> $2 </span>")
			.replace(objpatt.pattcenter,"<center>$1</center>")
			.replace(objpatt.pattH6,"<h6>\n\t$2\n</h6>\n")
			.replace(objpatt.pattH5,"<h5>\n\t$2\n</h5>\n")
			.replace(objpatt.pattH4,"<h4>\n\t$2\n</h4>\n")
			.replace(objpatt.pattH3,"<h3>\n\t$2\n</h3>\n")
			.replace(objpatt.pattH2,"<h2>\n\t$2\n</h2>\n")
			.replace(objpatt.pattH1,"<h1>\n\t$2\n</h1>\n")
			.replace(objpatt.pattheadder1,"<h1>$1<hr style='border-top: 1px solid #8c8b8b;' /></h1>")
			.replace(objpatt.pattheadder2,"<h2>$1<hr style='border-top: 1px solid #8c8b8b;' /></h2>")
			.replace(objpatt.pattblockquote,"<blockquote>$1</blockquote>")
			.replace(objpatt.patthorizontal,"<hr />")
			.replace(objpatt.pattStrong,"<strong>$2</strong>")
			.replace(objpatt.pattitalics,"<em>$2</em>")
			.replace(objpatt.pattStrike,"<del>$2</del>")
			.replace(objpatt.pattimgOption,'<img src="$2" alt="$1" style="width:$3;height:$4;"/>')
			.replace(objpatt.pattimg,'<img src="$2" alt="$1" />')
			.replace(objpatt.pattlink,"<a href='$3' target='_blank'>$2</a>")
			.replace(objpatt.patttlist1,"<ol style='list-style-type: disc;'><li>$3</li></ol>")
			.replace(objpatt.patttlist2,"<ol style='list-style-type: circle;'><li>$3</li></ol>")
			.replace(objpatt.pattnewline,"\n\t<p>\n\t\t$1$2\n\t</p>\n")
			.replace(objpatt.pattnewlineBr,"<br/>")
			.replace(/< /gm,"&lt;");



			
		
		tag_html_now = text;	
		
		text = template.replace("{{content}}",text);
		return text;
	}
	




