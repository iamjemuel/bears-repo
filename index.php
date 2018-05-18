<?php
$i = 1;
$j = 2;
$k = 3;

if(true === $i){
	echo 'yes';
}else{
	echo 'no';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/mtree.css">
	<script src="js/jquery.js"></script>
	<script src="js/mtree.js"></script>
</head>
<body>
	<ul id="tree" class="yes">
		<li class="tree-view closed" data-id="1">
			<a class="tree-name view" data-open="viewForm" data-record-id="1">Main Engine 1</a>
		</li>
		<li class="tree-view closed" data-id="2">
			<a class="tree-name view" data-open="viewForm" data-record-id="2">Main Engine 2</a>
			<ul parentid="2">
				<li class="tree-view closed" data-id="3">
					<a class="tree-name view" data-open="viewForm" data-record-id="3">Sub Engine 1</a>
					<ul parentid="3">
						<li class="tree-view closed" data-id="5">
							<a class="tree-name view" data-open="viewForm" data-record-id="5">Sub Engine 3</a>
							<ul parentid="5">
								<li class="tree-view closed" data-id="7"><a class="tree-name view" data-open="viewForm" data-record-id="7">Sub Engine 5</a></li>
							</ul>
						</li>
						<li class="tree-view closed" data-id="6">
							<a class="tree-name view" data-open="viewForm" data-record-id="6">Sub Engine 4</a>
							<ul parentid="6">
								<li class="tree-view closed" data-id="0><a class="tree-name view" data-open="viewForm" data-record-id="0">Try</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="tree-view closed" data-id="4"><a class="view" data-open="viewForm" data-record-id="4">Sub Engine 2</a></li>
			</ul>
		</li>
	</ul>
	<button onclick="clickme()">add</button>
	<button onclick="addElement(3)">add</button>

<script>
	var a = '<li class="tree-view closed"><a class="view" data-open="viewForm" data-record-id="4">Added</a></li>';
	$('#tree').treeview();
	
	function clickme(){
		if($('#tree').children().last().hasClass('lastExpandable')){
			$('#tree').children().last().removeClass('lastExpandable').addClass('expandable');
			$('#tree').children().last().find('div').removeClass('lastExpandable-hitarea');
		}else if($('#tree').children().last().hasClass('lastCollapsable')){
			$('#tree').children().last().removeClass('lastCollapsable').addClass('collapsable');
			$('#tree').children().last().find('div').removeClass('lastCollapsable-hitarea');
		}else if($('#tree').children().last().hasClass('last')){
			$('#tree').children().last().removeClass('last');
		}
		$('#tree').append('<li class="tree-view closed last"><a class="view" data-open="viewForm" data-record-id="4">Added</a></li>');
	}
	var addElement = function(parent_id){

		add_element = '<li class="tree-view closed last" data-id="8"><a class="view" data-open="viewForm" data-record-id="8">Added</a></li>';
		
		openTree(parent_id);
		$('#tree').find('li[data-id='+parent_id+']').find('ul').first().append(add_element);
	}
	var openTree = function(parent_id){
		target_element = $('#tree').find('li[data-id='+parent_id+']');
		parent = target_element.closest('ul').attr('parentid');
		console.log(parent);
		if(target_element.has('ul').length){
			if(target_element.find('ul').first().children().hasClass('last')){
				target_element.find('ul').first().children().last().removeClass('last');
				target_element.find('ul').first().css({'display': ''});
				target_element.parent().removeClass('expandable').addClass('collapsable');
				target_element.parent().find('div').eq(0).removeClass('expandable-hitarea').addClass('collapsable-hitarea');
			}else if(target_element.find('ul').first().children().hasClass('lastExpandable')){
				target_element.find('ul').first().children().last().removeClass('lastExpandable').addClass('expandable');
				target_element.find('ul').first().children().last().find('div').eq(0).removeClass('lastExpandable-hitarea').addClass('expandable-hitarea');
			}else if(target_element.find('ul').first().children().hasClass('lastCollapsable')){
				target_element.find('ul').first().children().last().removeClass('lastCollapsable').addClass('collapsable');
				target_element.find('ul').first().children().last().find('div').eq(0).removeClass('lastCollapsable-hitarea').addClass('collapasable-hitarea');
			}
				
			
		}else{
			
		}
		if(parent){
			openTree(parent);
		}

	}
if(3 > 2 > 1){
	console.log('yes');
}else{
	console.log('no');
}
	
</script>
</body>
</html>