$(function() {
	$(".list-group-item").each(function(i, e) {
		var $item = $(this);
		$item.find("form[action*='delete']").each(function(i, e) {
			$item.addClass("list-group-item-danger");
		});
	});
});
