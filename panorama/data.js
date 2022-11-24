var APP_DATA = {
  "scenes": [
    {
      "id": "0-calada2",
      "name": "Calçada2",
      "levels": [
        {
          "tileSize": 256,
          "size": 256,
          "fallbackOnly": true
        },
        {
          "tileSize": 512,
          "size": 512
        },
        {
          "tileSize": 512,
          "size": 1024
        },
        {
          "tileSize": 512,
          "size": 2048
        }
      ],
      "faceSize": 2000,
      "initialViewParameters": {
        "pitch": 0,
        "yaw": 0,
        "fov": 1.5707963267948966
      },
      "linkHotspots": [
        {
          "yaw": -1.6947331937624384,
          "pitch": 0.004045336519006071,
          "rotation": 0,
          "target": "2-calada"
        }
      ],
      "infoHotspots": [
        {
          "yaw": 2.2506462337384745,
          "pitch": -0.20199331960031408,
          "title": "Cantina",
          "text": "Cantina"
        }
      ]
    },
    {
      "id": "1-dentro",
      "name": "Dentro",
      "levels": [
        {
          "tileSize": 256,
          "size": 256,
          "fallbackOnly": true
        },
        {
          "tileSize": 512,
          "size": 512
        },
        {
          "tileSize": 512,
          "size": 1024
        },
        {
          "tileSize": 512,
          "size": 2048
        }
      ],
      "faceSize": 2000,
      "initialViewParameters": {
        "pitch": 0,
        "yaw": 0,
        "fov": 1.5707963267948966
      },
      "linkHotspots": [
        {
          "yaw": 1.0904224228931625,
          "pitch": 0.1383127949230598,
          "rotation": 0,
          "target": "3-entre-bloco"
        },
        {
          "yaw": -0.05201485162503516,
          "pitch": 0.17296206434285466,
          "rotation": 0,
          "target": "2-calada"
        }
      ],
      "infoHotspots": [
        {
          "yaw": 3.030057247669795,
          "pitch": -0.020293012943374933,
          "title": "Elevador",
          "text": "Elevador"
        }
      ]
    },
    {
      "id": "2-calada",
      "name": "Calçada",
      "levels": [
        {
          "tileSize": 256,
          "size": 256,
          "fallbackOnly": true
        },
        {
          "tileSize": 512,
          "size": 512
        },
        {
          "tileSize": 512,
          "size": 1024
        },
        {
          "tileSize": 512,
          "size": 2048
        }
      ],
      "faceSize": 2000,
      "initialViewParameters": {
        "pitch": 0,
        "yaw": 0,
        "fov": 1.5707963267948966
      },
      "linkHotspots": [
        {
          "yaw": 0.6367155179542312,
          "pitch": -0.002911801530544267,
          "rotation": 0,
          "target": "0-calada2"
        },
        {
          "yaw": 3.017230599072323,
          "pitch": 0.032319450052856524,
          "rotation": 0,
          "target": "3-entre-bloco"
        }
      ],
      "infoHotspots": [
        {
          "yaw": 0.8339720880275099,
          "pitch": -0.06557690780879533,
          "title": "Alunos",
          "text": "Alunos conversando"
        }
      ]
    },
    {
      "id": "3-entre-bloco",
      "name": "Entre-Bloco",
      "levels": [
        {
          "tileSize": 256,
          "size": 256,
          "fallbackOnly": true
        },
        {
          "tileSize": 512,
          "size": 512
        },
        {
          "tileSize": 512,
          "size": 1024
        },
        {
          "tileSize": 512,
          "size": 2048
        }
      ],
      "faceSize": 2000,
      "initialViewParameters": {
        "pitch": 0,
        "yaw": 0,
        "fov": 1.5707963267948966
      },
      "linkHotspots": [
        {
          "yaw": -0.47907153142497805,
          "pitch": 0.16346931585257352,
          "rotation": 0,
          "target": "2-calada"
        },
        {
          "yaw": 0.5062554027066,
          "pitch": 0.29396742450118296,
          "rotation": 0,
          "target": "1-dentro"
        }
      ],
      "infoHotspots": [
        {
          "yaw": 1.0070881904597364,
          "pitch": 0.20382703424196436,
          "title": "Bloco B",
          "text": "Bloco B"
        }
      ]
    }
  ],
  "name": "Project Title",
  "settings": {
    "mouseViewMode": "drag",
    "autorotateEnabled": true,
    "fullscreenButton": false,
    "viewControlButtons": false
  }
};
