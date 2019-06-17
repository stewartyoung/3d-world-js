<!DOCTYPE HTML>
<html>
<head>
</head>
<body style="margin:0px;overflow:hidden;">


<div id="game">
<canvas id="canvas" width="800" height="600" style="background:#000000;vertical-align:top;"></canvas>
</div>


<script type="text/javascript" src="js/three.js"></script>
<script type="text/javascript" src="js/FirstPersonControls.js"></script>


<script type="text/javascript">


"use strict";


var scene, camera, renderer, controls;
var canvas=document.getElementById("canvas");
var width,height;


width=window.innerWidth;
height=window.innerHeight;
canvas.width=window.innerWidth;
canvas.height=window.innerHeight;



var meshes=[];
var clock=new THREE.Clock();


camera=new THREE.PerspectiveCamera(60,width/height,1,10000);
camera.position.set(0,150,200);
//camera.lookAt(0,0,0);


renderer=new THREE.WebGLRenderer({canvas:canvas});
renderer.setSize(width,height);
renderer.setPixelRatio(window.devicePixelRatio);
renderer.setClearColor(0xffffff);
renderer.shadowMap.enabled=true;
renderer.shadowMap.type=0;
renderer.gammaInput=true;
renderer.gammaOutput=true;


controls=new THREE.FirstPersonControls(camera,renderer.domElement);
controls.movementSpeed=200;
controls.lookSpeed=0.1;
controls.lookVertical=true;
controls.lon=-1.5*180/Math.PI;


scene=new THREE.Scene();


//var textureSkyCube=new THREE.CubeTextureLoader().setPath("images/sky/").load(["px.jpg","nx.jpg","py.jpg","ny.jpg","pz.jpg","nz.jpg"]);
var textureCube=new THREE.CubeTextureLoader().setPath("images/sky/").load(["lf.jpg","rt.jpg","up.jpg","dn.jpg","ft.jpg","bk.jpg"]);
scene.background=textureCube;


function loop(){
requestAnimationFrame(loop);
var delta=clock.getDelta();
controls.update(delta);
renderer.render(scene,camera);
}


loop();

</script>
</body>
</html>
