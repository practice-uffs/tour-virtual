    <!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>xeokit Example</title>

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


        .annotation-marker {
            color: #ffffff;
            line-height: 1.8;
            text-align: center;
            font-family: "monospace";
            font-weight: bold;
            position: absolute;
            width: 25px;
            height: 25px;
            border-radius: 15px;
            border: 2px solid #ffffff;
            background: black;
            visibility: hidden;
            box-shadow: 5px 5px 15px 1px #000000;
            z-index: 0;
        }

        .annotation-label {
            position: absolute;
            max-width: 250px;
            min-height: 50px;
            padding: 8px;
            padding-left: 12px;
            padding-right: 12px;
            background: #ffffff;
            color: #000000;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 8px;
            border: #ffffff solid 2px;
            box-shadow: 5px 5px 15px 1px #000000;
            z-index: 90000;
        }

        .annotation-label:after {
            content: '';
            position: absolute;
            border-style: solid;
            border-width: 8px 12px 8px 0;
            border-color: transparent white;
            display: block;
            width: 0;
            z-index: 1;
            margin-top: -11px;
            left: -12px;
            top: 20px;
        }

        .annotation-label:before {
            content: '';
            position: absolute;
            border-style: solid;
            border-width: 9px 13px 9px 0;
            border-color: transparent #ffffff;
            display: block;
            width: 0;
            z-index: 0;
            margin-top: -12px;
            left: -15px;
            top: 20px;
        }

        .annotation-title {
            font: normal 20px arial, serif;
            margin-bottom: 8px;
        }

        .annotation-desc {
            font: normal 14px arial, serif;
        }





        #treeViewContainer {
            pointer-events: all;
            height: 100%;
            overflow-y: scroll;
            overflow-x: hidden;
            position: absolute;
            background-color: rgba(255, 255, 255, 0.2);
            color: black;
            top: 80px;
            z-index: 200000;
            float: left;
            left: 0;
            padding-left: 10px;
            font-family: 'Roboto', sans-serif;
            font-size: 15px;
            user-select: none;
            -ms-user-select: none;
            -moz-user-select: none;
            -webkit-user-select: none;
            width: 350px;
        }

        #treeViewContainer ul {
            list-style: none;
            padding-left: 1.75em;
            pointer-events: none;
        }

        #treeViewContainer ul li {
            position: relative;
            width: 500px;
            pointer-events: none;
            padding-top: 3px;
            padding-bottom: 3px;
            vertical-align: middle;
        }

        #treeViewContainer ul li a {
            background-color: #eee;
            border-radius: 50%;
            color: #000;
            display: inline-block;
            height: 1.5em;
            left: -1.5em;
            position: absolute;
            text-align: center;
            text-decoration: none;
            width: 1.5em;
            pointer-events: all;
        }

        #treeViewContainer ul li a.plus {
            background-color: #ded;
            pointer-events: all;
        }

        #treeViewContainer ul li a.minus {
            background-color: #eee;
            pointer-events: all;
        }

        #treeViewContainer ul li a:active {
            top: 1px;
            pointer-events: all;
        }

        #treeViewContainer ul li span:hover {
            color: white;
            cursor: pointer;
            background: black;
            padding-left: 2px;
            pointer-events: all;
        }

        #treeViewContainer ul li span {
            display: inline-block;
            width: calc(100% - 50px);
            padding-left: 2px;
            pointer-events: all;
            height: 23px;
        }

        #treeViewContainer .highlighted-node { /* Appearance of node highlighted with TreeViewPlugin#showNode() */
            border: black solid 1px;
            background: yellow;
            color: black;
            padding-left: 1px;
            padding-right: 5px;
            pointer-events: all;
        }

        /* ----------------------------------------------------------------------------------------------------------*/
        /* ContextMenu */
        /* ----------------------------------------------------------------------------------------------------------*/

        .xeokit-context-menu {
            font-family: 'Roboto', sans-serif;
            font-size: 15px;
            display: none;
            z-index: 300000;
            background: rgba(255, 255, 255, 0.46);
            border: 1px solid black;
            border-radius: 6px;
            padding: 0;
            width: 200px;
        }

        .xeokit-context-menu ul {
            list-style: none;
            margin-left: 0;
            padding: 0;
        }

        .xeokit-context-menu ul li {
            list-style-type: none;
            padding-left: 10px;
            padding-right: 20px;
            padding-top: 4px;
            padding-bottom: 4px;
            color: black;
            border-bottom: 1px solid gray;
            background: rgba(255, 255, 255, 0.46);
            cursor: pointer;
            width: calc(100% - 30px);
        }

        .xeokit-context-menu ul li:hover {
            background: black;
            color: white;
            font-weight: normal;
        }

        .xeokit-context-menu ul li span {
            display: inline-block;
        }

        .xeokit-context-menu .disabled {
            display: inline-block;
            color: gray;
            cursor: default;
            font-weight: normal;
        }

        .xeokit-context-menu .disabled:hover {
            color: gray;
            cursor: default;
            background: #eeeeee;
            font-weight: normal;
        }

        
        </style>
    </head>
    <body>
    <canvas id="myCanvas"></canvas>
    {{-- <div id="treeViewContainer" style="display: none"></div> --}}

    <div id="treeViewContainer"></div>


    
    </body>

    
    {{-- <script src="https://cdn.jsdelivr.net/npm/@xeokit/xeokit-convert/dist/convert2xkt.cjs.js"></script>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            import('/3d_model/files/BlocoA.ifc').then(module => {
                const { convert2xkt } = window.xeokitConvert;
    
                convert2xkt({
                    sourceData: module.default,
                    outputXKT: (xtkArrayBuffer) => {
                        console.log(xtkArrayBuffer);
                    }
                }).then(() => {
                    console.log("Converted.");
                }, (errMsg) => {
                    console.error("Conversion failed: " + errMsg);
                });
            });
        });
    </script> --}}

    <script id="source" type="module">


        import {Viewer, XKTLoaderPlugin, math, TreeViewPlugin, ContextMenu, AnnotationsPlugin, } from
                    "https://cdn.jsdelivr.net/npm/@xeokit/xeokit-sdk/dist/xeokit-sdk.es.min.js";
        import {MetaModel} from
                    "https://cdn.jsdelivr.net/npm/@xeokit/xeokit-sdk/src/viewer/metadata/MetaModel.js";

        // import {Plugin} from 'https://cdn.jsdelivr.net/npm/@xeokit/xeokit-sdk/src/viewer/Plugin.js'

        const viewer = new Viewer({
            canvasId: "myCanvas",
            transparent: true
        });

        viewer.camera.eye = [50,50, -100];
        viewer.camera.look = [0, 0, 0];
        viewer.camera.up = [0, 10, 0];

        const xktLoader = new XKTLoaderPlugin(viewer);
        const scene = viewer.scene;
        const edges = false;
        const saoEnabled = false;

        const sceneModel = xktLoader.load({
            id: "myModel",
            src: "/3d_model/files/xkt/BlocoA.xkt",
            excludeTypes: ["IfcSpace", "IfcBuilding", "IfcSite"],
            edges,
            saoEnabled,
            useDataTextures: {
                enableViewFrustumCulling: true,
                targetLodFps: 20,
                disableVertexWelding: true,
                disableIndexRebucketing: true
            }
        });



        sceneModel.on("loaded", function () {

            setTimeout(() => {
                moveObject("0s0xHliUD1dOn2nVe2EVsG", [0, 0, 0]);
                moveObject("0s0xHliUD1dOn2nVe2BDsb", [0, 0, 0]);
                moveObject("0s0xHliUD1dOn2nVe2DMV0", [0, 0, 50]);
                moveObject("0s0xHliUD1dOn2nVe22LiU", [0, 0, 100]);
                moveObject("0s0xHliUD1dOn2nVe22Li1", [0, 0, 150]);
                moveObject("0s0xHliUD1dOn2nVe22Li8", [0, 0, 200]);
            }, 500);
        });

        function moveObject(objectId, dir, done) {

            const metaObject = viewer.metaScene.metaObjects[objectId];
            if (!metaObject) {
                return;
            }

            const objectIds = viewer.metaScene.getObjectIDsInSubtree(objectId);
            const dmax = math.lenVec3(dir);
            let d = 0;

            const onTick = scene.on("tick", () => {
                d += 0.75;
                if (d > dmax) {
                    scene.off(onTick);
                    if (done) {
                        done();
                    }
                    return;
                }
                scene.setObjectsOffset(objectIds, math.mulVec3Scalar(dir, (d / dmax), []));
            });
        }


    //----------------------------------------------------------------------------------------------------------------------
    // Create a tree view
    //----------------------------------------------------------------------------------------------------------------------

    const treeView = new TreeViewPlugin(viewer, {
        containerElement: document.getElementById("treeViewContainer"),
        autoExpandDepth: 3,
        hierarchy: "containment",
        sortNodes: false,
    });

    console.log(treeView);

    //----------------------------------------------------------------------------------------------------------------------
    // Create submenu on treeview by element rightclick event.
    //----------------------------------------------------------------------------------------------------------------------

    const treeViewContextMenu = new ContextMenu({
        items: [
            [
                {
                    title: "View Fit",
                    doAction: function (context) {
                        const scene = context.viewer.scene;
                        const objectIds = [];
                        context.treeViewPlugin.withNodeTree(context.treeViewNode, (treeViewNode) => {
                            if (treeViewNode.objectId) {
                                objectIds.push(treeViewNode.objectId);
                            }
                        });
                        scene.setObjectsVisible(objectIds, true);
                        scene.setObjectsHighlighted(objectIds, true);
                        context.viewer.cameraFlight.flyTo({
                            projection: "perspective",
                            aabb: scene.getAABB(objectIds),
                            duration: 0.5
                        }, () => {
                            setTimeout(function () {
                                scene.setObjectsHighlighted(scene.highlightedObjectIds, false);
                            }, 500);
                        });
                    }
                },
                {
                    title: "View Fit All",
                    doAction: function (context) {
                        const scene = context.viewer.scene;
                        context.viewer.cameraFlight.flyTo({
                            projection: "perspective",
                            aabb: scene.getAABB({}),
                            duration: 0.5
                        });
                    }
                }
            ],
            [
                {
                    title: "Hide",
                    doAction: function (context) {
                        context.treeViewPlugin.withNodeTree(context.treeViewNode, (treeViewNode) => {
                            if (treeViewNode.objectId) {
                                const entity = context.viewer.scene.objects[treeViewNode.objectId];
                                if (entity) {
                                    entity.visible = false;
                                }
                            }
                        });
                    }
                },
                {
                    title: "Hide Others",
                    doAction: function (context) {
                        const scene = context.viewer.scene;
                        scene.setObjectsVisible(scene.visibleObjectIds, false);
                        scene.setObjectsXRayed(scene.xrayedObjectIds, false);
                        scene.setObjectsSelected(scene.selectedObjectIds, false);
                        scene.setObjectsHighlighted(scene.highlightedObjectIds, false);
                        context.treeViewPlugin.withNodeTree(context.treeViewNode, (treeViewNode) => {
                            if (treeViewNode.objectId) {
                                const entity = scene.objects[treeViewNode.objectId];
                                if (entity) {
                                    entity.visible = true;
                                }
                            }
                        });
                    }
                },
                {
                    title: "Hide All",
                    getEnabled: function (context) {
                        return (context.viewer.scene.visibleObjectIds.length > 0);
                    },
                    doAction: function (context) {
                        context.viewer.scene.setObjectsVisible(context.viewer.scene.visibleObjectIds, false);
                    }
                }
            ],
            [
                {
                    title: "Show",
                    doAction: function (context) {
                        context.treeViewPlugin.withNodeTree(context.treeViewNode, (treeViewNode) => {
                            if (treeViewNode.objectId) {
                                const entity = context.viewer.scene.objects[treeViewNode.objectId];
                                if (entity) {
                                    entity.visible = true;
                                    entity.xrayed = false;
                                    entity.selected = false;
                                }
                            }
                        });
                    }
                },
                {
                    title: "Show Others",
                    doAction: function (context) {
                        const scene = context.viewer.scene;
                        scene.setObjectsVisible(scene.objectIds, true);
                        scene.setObjectsXRayed(scene.xrayedObjectIds, false);
                        scene.setObjectsSelected(scene.selectedObjectIds, false);
                        context.treeViewPlugin.withNodeTree(context.treeViewNode, (treeViewNode) => {
                            if (treeViewNode.objectId) {
                                const entity = scene.objects[treeViewNode.objectId];
                                if (entity) {
                                    entity.visible = false;
                                }
                            }
                        });
                    }
                },
                {
                    title: "Show All",
                    getEnabled: function (context) {
                        const scene = context.viewer.scene;
                        return (scene.numVisibleObjects < scene.numObjects);
                    },
                    doAction: function (context) {
                        const scene = context.viewer.scene;
                        scene.setObjectsVisible(scene.objectIds, true);
                        scene.setObjectsXRayed(scene.xrayedObjectIds, false);
                        scene.setObjectsSelected(scene.selectedObjectIds, false);
                    }
                }
            ],
            [
                {
                    title: "X-Ray",
                    doAction: function (context) {
                        context.treeViewPlugin.withNodeTree(context.treeViewNode, (treeViewNode) => {
                            if (treeViewNode.objectId) {
                                const entity = context.viewer.scene.objects[treeViewNode.objectId];
                                if (entity) {
                                    entity.xrayed = true;
                                    entity.visible = true;
                                }
                            }
                        });
                    }
                },
                {
                    title: "Undo X-Ray",
                    doAction: function (context) {
                        context.treeViewPlugin.withNodeTree(context.treeViewNode, (treeViewNode) => {
                            if (treeViewNode.objectId) {
                                const entity = context.viewer.scene.objects[treeViewNode.objectId];
                                if (entity) {
                                    entity.xrayed = false;
                                }
                            }
                        });
                    }
                },
                {
                    title: "X-Ray Others",
                    doAction: function (context) {
                        const scene = context.viewer.scene;
                        scene.setObjectsVisible(scene.objectIds, true);
                        scene.setObjectsXRayed(scene.objectIds, true);
                        scene.setObjectsSelected(scene.selectedObjectIds, false);
                        scene.setObjectsHighlighted(scene.highlightedObjectIds, false);
                        context.treeViewPlugin.withNodeTree(context.treeViewNode, (treeViewNode) => {
                            if (treeViewNode.objectId) {
                                const entity = scene.objects[treeViewNode.objectId];
                                if (entity) {
                                    entity.xrayed = false;
                                }
                            }
                        });
                    }
                },
                {
                    title: "Reset X-Ray",
                    getEnabled: function (context) {
                        return (context.viewer.scene.numXRayedObjects > 0);
                    },
                    doAction: function (context) {
                        context.viewer.scene.setObjectsXRayed(context.viewer.scene.xrayedObjectIds, false);
                    }
                }
            ],
            [
                {
                    title: "Select",
                    doAction: function (context) {
                        context.treeViewPlugin.withNodeTree(context.treeViewNode, (treeViewNode) => {
                            if (treeViewNode.objectId) {
                                const entity = context.viewer.scene.objects[treeViewNode.objectId];
                                if (entity) {
                                    entity.selected = true;
                                    entity.visible = true;
                                }
                            }
                        });
                    }
                },
                {
                    title: "Deselect",
                    doAction: function (context) {
                        context.treeViewPlugin.withNodeTree(context.treeViewNode, (treeViewNode) => {
                            if (treeViewNode.objectId) {
                                const entity = context.viewer.scene.objects[treeViewNode.objectId];
                                if (entity) {
                                    entity.selected = false;
                                }
                            }
                        });
                    }
                },
                {
                    title: "Clear Selection",
                    getEnabled: function (context) {
                        return (context.viewer.scene.numSelectedObjects > 0);
                    },
                    doAction: function (context) {
                        context.viewer.scene.setObjectsSelected(context.viewer.scene.selectedObjectIds, false);
                    }
                }
            ]
        ]
    });

    // Right-clicking on a tree node shows the context menu for that node

    treeView.on("contextmenu", (e) => {

        treeViewContextMenu.context = { // Must set context before opening menu
            viewer: e.viewer,
            treeViewPlugin: e.treeViewPlugin,
            treeViewNode: e.treeViewNode,
            entity: e.viewer.scene.objects[e.treeViewNode.objectId] // Only defined if tree node is a leaf node
        };

        treeViewContextMenu.show(e.event.pageX, e.event.pageY);
    });

    // Left-clicking on a tree node isolates that object in the 3D view

    treeView.on("nodeTitleClicked", (e) => {
        const scene = viewer.scene;
        const objectIds = [];
        e.treeViewPlugin.withNodeTree(e.treeViewNode, (treeViewNode) => {
            if (treeViewNode.objectId) {
                objectIds.push(treeViewNode.objectId);
            }
        });
        e.treeViewPlugin.unShowNode();
        scene.setObjectsXRayed(scene.objectIds, true);
        scene.setObjectsVisible(scene.objectIds, true);
        scene.setObjectsXRayed(objectIds, false);
        viewer.cameraFlight.flyTo({
            aabb: scene.getAABB(objectIds),
            duration: 0.5
        }, () => {
            setTimeout(function () {
                scene.setObjectsVisible(scene.xrayedObjectIds, false);
                scene.setObjectsXRayed(scene.xrayedObjectIds, false);
            }, 500);
        });
    });

    //------------------------------------------------------------------------------------------------------------------
    // Create two ContextMenus - one for right-click on empty space, the other for right-click on an Entity
    //------------------------------------------------------------------------------------------------------------------

    const canvasContextMenu = new ContextMenu({
        enabled: true,
        context: {
            viewer: viewer
        },
        items: [
            [
                {
                    title: "Hide All",
                    getEnabled: function (context) {
                        return (context.viewer.scene.numVisibleObjects > 0);
                    },
                    doAction: function (context) {
                        context.viewer.scene.setObjectsVisible(context.viewer.scene.visibleObjectIds, false);
                    }
                },
                {
                    title: "Show All",
                    getEnabled: function (context) {
                        const scene = context.viewer.scene;
                        return (scene.numVisibleObjects < scene.numObjects);
                    },
                    doAction: function (context) {
                        const scene = context.viewer.scene;
                        scene.setObjectsVisible(scene.objectIds, true);
                        scene.setObjectsXRayed(scene.xrayedObjectIds, false);
                        scene.setObjectsSelected(scene.selectedObjectIds, false);
                    }
                }
            ],
            [
                {
                    title: "View Fit All",
                    doAction: function (context) {
                        context.viewer.cameraFlight.flyTo({
                            aabb: context.viewer.scene.getAABB()
                        });
                    }
                }
            ]
        ]
    });

    const objectContextMenu = new ContextMenu({
        items: [
            [
                {
                    title: "View Fit",
                    doAction: function (context) {
                        const viewer = context.viewer;
                        const scene = viewer.scene;
                        const entity = context.entity;
                        viewer.cameraFlight.flyTo({
                            aabb: entity.aabb,
                            duration: 0.5
                        }, () => {
                            setTimeout(function () {
                                scene.setObjectsHighlighted(scene.highlightedObjectIds, false);
                            }, 500);
                        });
                    }
                },
                {
                    title: "View Fit All",
                    doAction: function (context) {
                        const scene = context.viewer.scene;
                        context.viewer.cameraFlight.flyTo({
                            projection: "perspective",
                            aabb: scene.getAABB(),
                            duration: 0.5
                        });
                    }
                },
                {
                    title: "Show in Tree",
                    doAction: function (context) {
                        const objectId = context.entity.id;
                        context.treeViewPlugin.showNode(objectId);
                    }
                }
            ],
            [
                {
                    title: "Hide",
                    getEnabled: function (context) {
                        return context.entity.visible;
                    },
                    doAction: function (context) {
                        context.entity.visible = false;
                    }
                },
                {
                    title: "Hide Others",
                    doAction: function (context) {
                        const viewer = context.viewer;
                        const scene = viewer.scene;
                        const entity = context.entity;
                        const metaObject = viewer.metaScene.metaObjects[entity.id];
                        if (!metaObject) {
                            return;
                        }
                        scene.setObjectsVisible(scene.visibleObjectIds, false);
                        scene.setObjectsXRayed(scene.xrayedObjectIds, false);
                        scene.setObjectsSelected(scene.selectedObjectIds, false);
                        scene.setObjectsHighlighted(scene.highlightedObjectIds, false);
                        metaObject.withMetaObjectsInSubtree((metaObject) => {
                            const entity = scene.objects[metaObject.id];
                            if (entity) {
                                entity.visible = true;
                            }
                        });
                    }
                },
                {
                    title: "Hide All",
                    getEnabled: function (context) {
                        return (context.viewer.scene.numVisibleObjects > 0);
                    },
                    doAction: function (context) {
                        context.viewer.scene.setObjectsVisible(context.viewer.scene.visibleObjectIds, false);
                    }
                },
                {
                    title: "Show All",
                    getEnabled: function (context) {
                        const scene = context.viewer.scene;
                        return (scene.numVisibleObjects < scene.numObjects);
                    },
                    doAction: function (context) {
                        const scene = context.viewer.scene;
                        scene.setObjectsVisible(scene.objectIds, true);
                    }
                }
            ],
            [
                {
                    title: "X-Ray",
                    getEnabled: function (context) {
                        return (!context.entity.xrayed);
                    },
                    doAction: function (context) {
                        context.entity.xrayed = true;
                    }
                },
                {
                    title: "Undo X-Ray",
                    getEnabled: function (context) {
                        return context.entity.xrayed;
                    },
                    doAction: function (context) {
                        context.entity.xrayed = false;
                    }
                },
                {
                    title: "X-Ray Others",
                    doAction: function (context) {
                        const viewer = context.viewer;
                        const scene = viewer.scene;
                        const entity = context.entity;
                        const metaObject = viewer.metaScene.metaObjects[entity.id];
                        if (!metaObject) {
                            return;
                        }
                        scene.setObjectsVisible(scene.objectIds, true);
                        scene.setObjectsXRayed(scene.objectIds, true);
                        scene.setObjectsSelected(scene.selectedObjectIds, false);
                        scene.setObjectsHighlighted(scene.highlightedObjectIds, false);
                        metaObject.withMetaObjectsInSubtree((metaObject) => {
                            const entity = scene.objects[metaObject.id];
                            if (entity) {
                                entity.xrayed = false;
                            }
                        });
                    }
                },
                {
                    title: "Reset X-Ray",
                    getEnabled: function (context) {
                        return (context.viewer.scene.numXRayedObjects > 0);
                    },
                    doAction: function (context) {
                        context.viewer.scene.setObjectsXRayed(context.viewer.scene.xrayedObjectIds, false);
                    }
                }
            ],
            [
                {
                    title: "Select",
                    getEnabled: function (context) {
                        return (!context.entity.selected);
                    },
                    doAction: function (context) {
                        context.entity.selected = true;
                    }
                },
                {
                    title: "Undo select",
                    getEnabled: function (context) {
                        return context.entity.selected;
                    },
                    doAction: function (context) {
                        context.entity.selected = false;
                    }
                },
                {
                    title: "Clear Selection",
                    getEnabled: function (context) {
                        return (context.viewer.scene.numSelectedObjects > 0);
                    },
                    doAction: function (context) {
                        context.viewer.scene.setObjectsSelected(context.viewer.scene.selectedObjectIds, false);
                    }
                }
            ]
        ],
        enabled: true
    });

    viewer.cameraControl.on("rightClick", function (e) {

        var hit = viewer.scene.pick({
            canvasPos: e.canvasPos
        });

        if (hit && hit.entity.isObject) {

            objectContextMenu.context = { // Must set context before showing menu
                viewer: viewer,
                treeViewPlugin: treeView,
                entity: hit.entity
            };

            objectContextMenu.show(e.pagePos[0], e.pagePos[1]);

        } else {

            canvasContextMenu.context = { // Must set context before showing menu
                viewer: viewer
            };

            canvasContextMenu.show(e.pagePos[0], e.pagePos[1]);
        }

        e.event.preventDefault();
    });







    //----------------------------------------------------------------------------------------------------------------------
    // Testing annotations plugin
    //----------------------------------------------------------------------------------------------------------------------

        const annotations = new AnnotationsPlugin(viewer, {

            // Default HTML template for marker position
            markerHTML: "<div class='annotation-marker' style='background-color: black;'>X</div>",

            // Default HTML template for label
            labelHTML: "<div class='annotation-label' style='background-color: white;'>" +
            "<div class='annotation-title'>Sala 302</div><div class='annotation-desc'>Sala do professor...</div></div>",

            // Default values to insert into the marker and label templates
            values: {
                markerBGColor: "red",
                labelBGColor: "red",
                glyph: "X",
                title: "Untitled",
                description: "No description"
            }
        });


        //testes exibição informação no modelo

        sceneModel.on("loaded", () => {

            // const entity = viewer.scene.meshes[""];

            // Create an annotation
            const myAnnotation1 = annotations.createAnnotation({

                id: "myAnnotation",

                entity: viewer.scene.objects["2O2Fr$t4X7Zf8NOew3FLOH"], // Optional, associate with an Entity

                worldPos: [0, 0, 10],        // 3D World-space position

                // occludable: true,           // Optional, default, makes Annotation invisible when occluded by Entities
                markerShown: true,          // Optional, default is true, makes position visible (when not occluded)
                labelShown: true            // Optional, default is false, makes label visible (when not occluded)

            
            });

            // Listen for change of Annotation visibility. The Annotation becomes invisible when it falls outside the canvas,
            // or its position is occluded by some Entity. Note that, when not occluded, the position is only
            // shown when Annotation#markerShown is true, and the label is only shown when Annotation#labelShown is true.

            myAnnotation1.on("visible", function(visible) { // Marker visibility has changed
                if (visible) {
                    this.log("Annotation is visible");
                } else {
                    this.log("Annotation is invisible");
                }
            });
        // Listen for destruction of the Annotation
    
        });


    </script>
    </html>