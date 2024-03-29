<?php
use XSLTProcessor;

    $xslt = new XSLTProcessor();
    phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Manual Mashup</title>
<style type="text/css">
body {
	font-family: sans-serif;
	font-size: 1em;
	color: #000;
	margin: 0;
	padding: 0;
}
</style>
<script type="text/javascript" src="js/OpenAjaxManagedHub-all.js"></script>
<script type="text/javascript" src="js/dojo.js"></script>
<script type="text/javascript">
oaaLoaderConfig = {
		proxy: "proxy.php"
};
</script>
<script type="text/javascript" src="js/loader.js"></script>
<script type="text/javascript">
var myLoader, myHub;

function onMHPublish(topic, data, publishContainer, subscribeContainer) {
	/* Callback for publish requests. This example approves all publish requests. */
	return true;
}

function onMHSubscribe(topic, container) {
	/* Callback for subscribe requests. This example approves all subscribe requests. */
	return true;
}

function onMHUnsubscribe(topic, container) {
	/* Callback for unsubscribe requests. This example approves all subscribe requests. */
	return true;
}

function onMHSecurityAlert(source, alertType) {
	/* Callback for security alerts */
}

function initHub() {
	// create new loader (+hub)
	myLoader = new OpenAjax.widget.Loader({ManagedHub: {
			onPublish: onMHPublish,
			onSubscribe: onMHSubscribe,
			onUnsubscribe: onMHUnsubscribe,
			onSecurityAlert: onMHSecurityAlert,
			scope: window
        }});
	myHub = myLoader.hub;

	// load map 1
	var mapOne = myLoader.create({
		spec: "widgets/map1_oam.xml",
		target: dojo.byId("mapOne"),
		onComplete: function(metadata) {
			console.log(metadata);

			dojo.setStyle("mapOne", {
				width: "50%",
				height: "70%",
				float: "left"
			});
		},
		onError: function(error) {
			console.log(error);
			alert(error);
		}
	});

	// load map 2
	var mapTwo = myLoader.create({
		spec: "widgets/map2_oam.xml",
		target: dojo.byId("mapTwo"),
		onComplete: function(metadata) {
			console.log(metadata);

			dojo.setStyle("mapTwo", {
				width: "50%",
				height: "70%",
				float: "right"
			});
		},
		onError: function(error) {
			console.log(error);
			alert(error);
		}
	});

	// load graph 1
	var graphOne = myLoader.create({
		spec: "widgets/graph1_oam.xml",
		target: dojo.byId("graphOne"),
		onComplete: function(metadata) {
			console.log(metadata);

			dojo.setStyle("graphOne", {
				width: "50%",
				height: "15%",
				float: "left"
			});
		},
		onError: function(error) {
			console.log(error);
			alert(error);
		}
	});

	// load graph 2
	var graphTwo = myLoader.create({
		spec: "widgets/graph2_oam.xml",
		target: dojo.byId("graphTwo"),
		onComplete: function(metadata) {
			console.log(metadata);

			dojo.setStyle("graphTwo", {
				width: "50%",
				height: "15%",
				float: "right"
			});
		},
		onError: function(error) {
			console.log(error);
			alert(error);
		}
	});

	// load navigation widget
	var navigation = myLoader.create({
		spec: "widgets/navigation_oam.xml",
		target: dojo.byId("navigation"),
		onComplete: function(metadata) {
			console.log(metadata);

			dojo.setStyle("navigation", {
				float: "left",
				height: "10%"
			});
		},
		onError: function(error) {
			console.log(error);
			alert(error);
		}
	});

	// load search widget
	var search = myLoader.create({
		spec: "widgets/search_oam.xml",
		target: dojo.byId("search"),
		onComplete: function(metadata) {
			console.log(metadata);

			dojo.setStyle("search", {
				float: "right",
				height: "10%"
			});
		},
		onError: function(error) {
			console.log(error);
			alert(error);
		}
	});

	// load globa navigation widget
	var globalNavigation = myLoader.create({
		spec: "widgets/global_navigation_oam.xml",
		target: dojo.byId("globalNavigation"),
		onComplete: function(metadata) {
			console.log(metadata);

			dojo.setStyle("globalNavigation", {
				float: "right",
				height: "5%",
				width: "100%"
			});
		},
		onError: function(error) {
			console.log(error);
			alert(error);
		}
	});
}

dojo.ready(initHub);
</script>
</head>
<body>
	<div id="globalNavigation"></div>
	<div id="navigation"></div>
	<div id="search"></div>
	<div style="clear:both;"></div>
	<div id="mapOne"></div>
	<div id="mapTwo"></div>
	<div id="graphOne"></div>
	<div id="graphTwo"></div>
</body>
</html>