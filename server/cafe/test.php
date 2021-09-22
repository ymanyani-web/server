<div class="stats">
	<h2>Un petit benchmark</h2>
	<ul>
		<li>Fonction f1 sur 10000 itérations&nbsp;: <span class="percent v70">14,7 ms</span></li>
		<li>Fonction f2 sur 10000 itérations&nbsp;: <span class="percent v30">6,3 ms</span></li>
		<li>Fonction f3 sur 10000 itérations&nbsp;: <span class="percent v100">21 ms</span></li>
	</ul>
</div>
<style>
/* suppression des puces sur les listes */
div.stats ul { list-style: none; }
div.stats .percent {
	/* on passe l'élément span correspondant à la classe .percent
	en affichage en bloc pour pouvoir lui donner une dimension.
	Diverses autres choses sont modifiées ensuite à votre convenance. */
	display: block;  /* on affiche le span sous forme de bloc pour lui affecter des dimensions */
	height: 1.5em;
	line-height: 1.5em;
	margin: 5px 10px;
	padding: 0 5px;
	text-align: right;
	color: #fff;
	font-weight: bold;
	font-family: monospace; 
	-moz-border-radius: 5px;  /* un petit arrondi pour les navigateurs le supportant */
	border-bottom: 1px solid #aaa;
	border-right: 1px solid #aaa;
	cursor: default;
        .v100 { background: #970000; width: 100%; }
.v90 { background: #ff0000; width: 90%; }
.v80 { background: #ff6600; width: 80%; }
.v70 { background: #ff9c00; width: 70%; }
.v60 { background: #ffd800; width: 60%; }
.v50 { background: #eaff00; width: 50%; }
.v40 { background: #baff00; width: 40%; }
.v30 { background: #78ff00; width: 30%; }
.v20 { background: #12ff00; width: 20%; }
.v10 { background: #00ff60; width: 10%; }
}</style>