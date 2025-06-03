<?php
	$ACP=1;
	$p=isset($_REQUEST["p"])?$_REQUEST["p"]:"";
	if($p>0){
		$ACP=mysqli_real_escape_string($con,$p);
	}
	$PA=30;
	$fr=($ACP-1)*$PA;
	$KEY=isset($_GET["key"])?$_GET["key"]:"";
	$key="";
	$WRE="";
	$WCI="";
	$WST="";
	
?>
<style>
input,textarea,select,td,th{
	font-weight: 500 !important;
    color: #000 !important;	
	font-size:10px !important;	
}
textarea.form-control {
height: calc(1.5em + 0.75rem + 2px)!important;
}
#tree1 {
    background-color: #ccc;
    padding: 8px 16px;
    margin-bottom: 16px;
}

    #tree1.block-style {
        background-color: #fafafa;
    }

.jqtree-tree .jqtree-loading > div .jqtree-title:after {
    content: url(spinner.gif);
    margin-left: 8px;
}

#tree1.jqtree-loading:after {
    content: url(spinner.gif);
}

#scroll-container {
    height: 200px;
    overflow-y: scroll;
    -ms-user-select: none;
    -webkit-user-select: none;
       -moz-user-select: none;
            user-select: none;
    margin-bottom: 16px;
}

.block-style ul.jqtree-tree {
        margin-left: 0;
    }

.block-style ul.jqtree-tree ul.jqtree_common {
            margin-left: 2em;
        }

.block-style ul.jqtree-tree .jqtree-element {
            margin-bottom: 8px;
            background-color: #ddd;
            padding: 8px;
        }

.block-style ul.jqtree-tree .jqtree-element .jqtree-title {
                margin-left: 0;
            }

.block-style ul.jqtree-tree li.jqtree-selected > .jqtree-element,
            .block-style ul.jqtree-tree li.jqtree-selected > .jqtree-element:hover {
                background-color: #97bdd6;
                text-shadow: none;
            }

.hidden-node {
    display: none;
}

.highlight-node > .jqtree-element > .jqtree-title {
    font-weight: bold;
}

.jqtree-tree .jqtree-toggler {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqtree/1.6.3/tree.jquery.js" integrity="sha512-RA9AVb3yo4E76YrUm8fvFbK/+3ooh1NMKvG994R+61TXGSXpExNZxHgb/goK7g/up6F0WTfBCBW/kmGvRh54ZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqtree/1.6.3/jqtree.css" integrity="sha512-of/oinr9fql6nvZsWTv9lEeNkrDOusWuhqN0EKA6h410yRAl4kLSDCk98LSFPFl7n6gXBKLZ6Rco/ZGjvhQMbw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="col-10 mx-auto">
<div class="row">
<div class="col-12 NEWPAGE" > 
	<div class="my-3 row">
		<div class="D2 col-3 pr-0" ><input placeholder="ლინკის სახელი" class="ADN form-control"/></div>
		<div class="D6 col-7 pr-0" ><input value="დამატება" type="button" t="sitemap" n="name_ka" class="ADR btn btn-primary text-white"/></div>
	</div>
</div>
<div class="col-12 block-style not-prose" id="tree1"> 

</div>
</div><?php
$q1=mysqli_query($con,"SELECT t1.id,t1.name_ka,t1.pid,GROUP_CONCAT(t2.id) as 'children'  FROM `sitemap` as t1 LEFT JOIN sitemap as t2 ON(t1.id=t2.pid) WHERE  t1.itemtype!=4 group by t1.id ORDER by t1.pos ASC");
$arr=mysqli_fetch_All($q1,MYSQLI_ASSOC);
// echo "<pre>";
$data=json_encode(getchildren(0,$arr));
function getchildren($id,$arr){
	$data=[];
	$arr1 = array_filter($arr, function ($var) use ($id) {
		return ($var['pid'] == $id);
	});	
	foreach($arr1 as $item){
		if($item["children"]==NULL){
			$data[]=["name"=>$item["name_ka"],"id"=>$item["id"]];				
		}else{
			$data[]=["name"=>$item["name_ka"],"id"=>$item["id"],"children"=>getchildren($item["id"],$arr)];			
		}
	}
	// var_dump($arr1);
	return $data;	
}
?>

<script>

var data = JSON.parse('<?=$data?>');
console.log(data);
// var data = [
    // {
        // name: 'node1', id: 1,
        // children: [
            // { name: 'child1', id: 2 },
            // { name: 'child2', id: 3 }
        // ]
    // },
    // {
        // name: 'node2', id: 4,
        // children: [
            // { name: 'child3', id: 5 }
        // ]
    // }
// ];
function handleStop(node, e) {
	// console.log(node);
	  console.log(node);

	 func2("updatetable",{a:"sitemap",b:"pid",c:node.parent.id,d:node.id},function(){
		snack("შენახულია");
	 });
    //
		 var arr=node.parent.children;
	 var arr2=[];
	for (let i = 0; i < arr.length; i++) {
	// console.log(arr[i]);
	arr2.push(arr[i].id);
	}
	console.log(arr2);
	 func2("position",{children:JSON.stringify(arr2)},function(){
		snack("შენახულია");
	 });
}



$('#tree1').tree({
	dragAndDrop: true,
	onDragStop: handleStop,
    onCreateLi: function(node, $li) {
        // Append a link to the jqtree-element div.
        // The link has an url '#node-[id]' and a data property 'node-id'.
        $li.find('.jqtree-element').append(
            '<a href="?page=sitemapedit&id='+ node.id +'" class="edit mx-2 pt-0 pb-1 btn btn-primary" data-node-id="'+ node.id +'">edit</a><a href="#node-'+ node.id +'" class="edit mx-0 pt-0 pb-1 btn btn-danger DEL" t="sitemap" d="'+ node.id +'" data-node-id="'+ node.id +'"><i class="fa fa-trash"></i></a>'
        );
    },
    data: data
});
</script>
</div>