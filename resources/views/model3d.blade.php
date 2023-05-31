<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>xeokit Example</title>

    <div id="myTreeViewContainer" style="position: absolute; z-index:10"></div>
    <style>
        body {
            margin: 0;
            width: 100%;
            height: 100%;
            user-select: none;
        }

        #myCanvas {
            width: 100%;
            height: 100%;
            position: absolute;
            background: lightblue;
            background-image: linear-gradient(lightblue, white);
        }
    </style>
</head>
<body>
<canvas id="myCanvas"></canvas>
</body>

<script type='module' src="https://xeokit.github.io/xeokit-bim-viewer/dist/messages.js"></script>
<script type='module' src="https://xeokit.github.io/xeokit-bim-viewer/dist/xeokit-bim-viewer.es.js"></script>
<script id="source" type="module">

    import {Viewer, WebIFCLoaderPlugin, TreeViewPlugin, AnnotationsPlugin} from
                "https://cdn.jsdelivr.net/npm/@xeokit/xeokit-sdk/dist/xeokit-sdk.es.min.js";

    // import {Plugin} from 'https://cdn.jsdelivr.net/npm/@xeokit/xeokit-sdk/src/viewer/Plugin.js'

    const viewer = new Viewer({
        canvasId: "myCanvas",
        transparent: true
    });

    const treeView = new TreeViewPlugin(viewer, {
        containerElement: document.getElementById("myTreeViewContainer"),
        // hierarchy: "stories",
        hierarchy: "containment",
        sortNodes: false, // <<------ Disable node sorting
    });

    // console.log(viewer->WebIFCLoaderPlugin);

    viewer.camera.eye = [-3.933, 2.855, 27.018];
    viewer.camera.look = [-50, -33.724, -88.899];
    viewer.camera.up = [-0.018, 0.999, 0.039];

    const webIFCLoader = new WebIFCLoaderPlugin(viewer, {
        wasmPath: "https://cdn.jsdelivr.net/npm/@xeokit/xeokit-sdk/dist/"
    });

    const model = webIFCLoader.load({
        src: "/3d_model/files/BlocoA2.ifc",
        edges: true
    });






</script>
</html>