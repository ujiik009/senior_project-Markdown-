	function regexMD_to_html(text){
		
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
			 patthorizontal : /-{3,}/gm,
			 pattnewline 	: /^\n/mg,
			 pattStrong 	: /(\*\*|__)(.*?)\1/gm,
			 pattStrike		: /(~~)(.*?)\1/gm,
			 pattitalics 	: /(\*|_)(.*?)\1/gm,
			 pattinlinecode	: /(`)(.*?)\1/gm,
			 pattblockquote : /[>]+\s+(.*)?/gm,
			 // support insert img my option
			 pattimgOption 	: /!\[(.*)\]\((.+)\)\((.+)\)\((.+)\)/gm,
			 // support insert img original
			 pattimg 		: /!\[(.*)\]\((.+)\)/gm,
			 // support list *
			 patttlist1      : /^([\t|\s]){1,}\* (.*)/gm,
			 // support list -
			 patttlist2      : /^([\t|\s]){1,}\- (.*)/gm,
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
			.replace(objpatt.pattcenter,"<center>$1</center>")
			.replace(objpatt.pattH6,"<h6>\n\t$2\n</h6>\n")
			.replace(objpatt.pattH5,"<h5>\n\t$2\n</h5>\n")
			.replace(objpatt.pattH4,"<h4>\n\t$2\n</h4>\n")
			.replace(objpatt.pattH3,"<h3>\n\t$2\n</h3>\n")
			.replace(objpatt.pattH2,"<h2>\n\t$2\n</h2>\n")
			.replace(objpatt.pattH1,"<h1>\n\t$2\n</h1>\n")
			.replace(objpatt.pattheadder1,"<h1>$1</h1>")
			.replace(objpatt.pattheadder2,"<h2>$1</h2>")
			// .replace(objpatt.pattblockquote,"<blockquote>$1</blockquote>")
			.replace(objpatt.patthorizontal,"<hr />")
			.replace(objpatt.pattStrong,"<strong>$2</strong>")
			.replace(objpatt.pattitalics,"<em>$2</em>")
			.replace(objpatt.pattStrike,"<del>$2</del>")
			.replace(objpatt.pattimgOption,'<img src="$2" alt="$1" style="width:$3px;height:$4px;"/>')
			.replace(objpatt.pattimg,'<img src="$2" alt="$1" />')
			.replace(objpatt.pattlink,"<a href='$3'>$2</a>")
			.replace(objpatt.patttlist1,"<ol style='list-style-type: disc;'><li>$2</li></ol>")
			.replace(objpatt.patttlist2,"<ol style='list-style-type: circle;'><li>$2</li></ol>")
			.replace(objpatt.pattnewline,"</br>")

			
			
		tag_html_now = text;	
		//console.log(tag_html_now);
		//alert(template.replace("<??content??>",text));
		return text;
	}
	function highlight(){
		$('pre code').each(function(i, block) {
		    hljs.highlightBlock(block);
		});
	}

	