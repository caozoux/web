$.fn.dbg1 = function () {
	$("div > p").hide() //hide the p item of div
	$("<div><p>use the appendto into item from jquery</p></div>").appendTo("body");
}


$.fn.tab_switch = function(tabswitch, itemswitch) {
	tabswitch="#"+tabswitch
	itemswitch="#"+itemswitch

	debug_var=""
	tabswitchList=tabswitch+"> ul > li"
	tabitemList=itemswitch+"> dev"
	console.info($(debug_var))
	console.info($(tabswitchList).attr("id"))
	$(tabitemList).hide()
	$(tabitemList).eq(0).show()
	$(tabswitchList).each(function(i) {
		$(tabswitchList).eq(i).bind('mouseover', function() {
		$(tabitemList).hide()
		$(tabitemList).eq(i).show()
		})
	})
}
