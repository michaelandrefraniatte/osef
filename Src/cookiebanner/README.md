# cookiebanner

CookieBanner uses the Cookie Banner javascript library for alerting users about the use of cookies on your website

# blocage des cookies tiers inclus dans des scripts tiers

Fonctionnement du blocage des cookies tiers des scripts tiers :

// Paramétrage du blocage des scripts par l’intermédiaire du BO (System/cookie settings)
Le module cookiebanner possède une page de paramétrage qui contient 10 groupes de cookies pouvant être bloqués si activés. Ces groupes correspondent à des catégories. Les cookies du site dont les noms sont affichés dans la console du développeur sous l’onglet stockage, peuvent être bloqués par groupes. Ainsi les cookies tiers aussi grâces au blocages des scripts qui doivent être mis dans des fonctions. Une ligne est prévue pour mettre les noms des fonctions comme pour les noms des cookies. Ces noms doivent être tous sur une ligne avec un espace entre. Ces noms de cookies et ces noms de fonctions sont rangés par catégorie (10 cookies, 10 groupes, 10 catégories), cookie 1, cookie 2, cookie 3, …, cookie 9, cookie 10 dans le BO depuis cookie settings. Chacune des 10 catégories possèdent un titre, une description, une activation pour s’afficher, une obligation si le visiteurs doit avoir ces cookies pour utiliser pleinement le site, et donc ne peut décocher cette catégorie. La ligne pour les noms des cookies et la ligne pour les noms des fonctions des scripts sont à paramétrer à chaque ajout de cookies et de scripts par les webmasters et les developpeurs.

// script tiers avant
<script type="text/javascript" src="source.js"></script> 
<script>
	alert("ok");
	$("#id").onclick(...);
	myFunct();
	function myFunct() {
		...
	}
</script> 
// script tiers après
<script>
	function fct (){
		var scriptsrc = "source.js";
		var scriptelement = document.createElement('script');
  		scriptelement.setAttribute('src', scriptsrc);
  		document.body.appendChild(scriptelement);
		alert("ok");
		$("#id").onclick(...);
		myFunct();
	}
	function myFunct() {
		...
	}
</script> 

Méthode du module utilisé :

// décharger le script
window["fct"] = null
// charger le script
window["fct"]();

Explication :

Les scripts dans des blocks qui causent des cookies tiers à apparaître (set cookie) peuvent être déchargés et chargés grâce au module cookiebanner en rangeant les scripts dans des fonctions avec des noms qui seront mis dans le BO des cookies (categories) comme pour le nom des cookies.

Prérequis :
Un script est composé de codes dans le document et de fonctions. Ces codes sans les fonctions sont appelés au chargement du document. Ces codes sans les fonctions doivent être placés dans une fonction dont le nom (ici fct) est mis dans le BO rangé par cookie (catégorie).


Exemple pour le module rendez-vous dans un block simple :

// script tiers avant
<style type="text/css">.simplybook-widget-button {
  font-family: "Open Sans";
  font-weight: bold;
  z-index:99999999;
}
</style>
<script type="text/javascript" src='https://widget.simplybook.it/v2/widget/widget.js'></script> 
<script>
var widget = new SimplybookWidget({"widget_type":"button","url":"https:\/\/mutest.simplybook.it","theme":"space","theme_settings":{"timeline_hide_unavailable":"0","sb_base_color":"#88b2d7","timeline_show_end_time":"0","timeline_modern_display":"as_slots","display_item_mode":"list","sb_review_image":"","dark_font_color":"#474747","light_font_color":"#ffffff","sb_company_label_color":"#ffffff","hide_img_mode":"0","show_sidebar":"1","sb_busy":"#dad2ce","sb_available":"#d3e0f1"},"timeline":"modern","datepicker":"top_calendar","is_rtl":false,"app_config":{"allow_switch_to_ada":0,"predefined":[]},"button_title":"\ud83d\udcc5  Prendre Rendez-Vous","button_background_color":"#1664ad","button_text_color":"#ffffff","button_position":"right","button_position_offset":"60%"});
</script>

// script tiers RGPD
<style type="text/css">.simplybook-widget-button {
  font-family: "Open Sans";
  font-weight: bold;
  z-index:99999999;
}
</style>
<script>
window.cookies_fonctionnels = window.cookies_fonctionnels || []
window.cookies_fonctionnels.push(function() {
    var script = document.createElement('script');
    document.body.appendChild(script);
    script.onload = function () {
var widget = new SimplybookWidget({"widget_type":"button","url":"https:\/\/mutest.simplybook.it","theme":"space","theme_settings":{"timeline_hide_unavailable":"0","sb_base_color":"#88b2d7","timeline_show_end_time":"0","timeline_modern_display":"as_slots","display_item_mode":"list","sb_review_image":"","dark_font_color":"#474747","light_font_color":"#ffffff","sb_company_label_color":"#ffffff","hide_img_mode":"0","show_sidebar":"1","sb_busy":"#dad2ce","sb_available":"#d3e0f1"},"timeline":"modern","datepicker":"top_calendar","is_rtl":false,"app_config":{"allow_switch_to_ada":0,"predefined":[]},"button_title":"\ud83d\udcc5  Prendre Rendez-Vous","button_background_color":"#1664ad","button_text_color":"#ffffff","button_position":"right","button_position_offset":"60%"});
    }
    script.setAttribute('src', 'https://widget.simplybook.it/v2/widget/widget.js');
})
</script>

// script tiers après
<style type="text/css">.simplybook-widget-button { font-family: "Open Sans"; font-weight: bold; z-index:99999999; }
</style>
<script> function chatBot(){ var scriptsrc = 'https://widget.simplybook.it/v2/widget/widget.js'; var scriptelement = document.createElement('script'); scriptelement.setAttribute('src', scriptsrc); document.body.appendChild(scriptelement); var widget = new SimplybookWidget({"widget_type":"button","url":"https:\/\/mutest.simplybook.it","theme":"space","theme_settings":{"timeline_hide_unavailable":"0","sb_base_color":"#88b2d7","timeline_show_end_time":"0","timeline_modern_display":"as_slots","display_item_mode":"list","sb_review_image":"","dark_font_color":"#474747","light_font_color":"#ffffff","sb_company_label_color":"#ffffff","hide_img_mode":"0","show_sidebar":"1","sb_busy":"#dad2ce","sb_available":"#d3e0f1"},"timeline":"modern","datepicker":"top_calendar","is_rtl":false,"app_config":{"allow_switch_to_ada":0,"predefined":[]},"button_title":"\ud83d\udcc5 Prendre Rendez-Vous","button_background_color":"#1664ad","button_text_color":"#ffffff","button_position":"right","button_position_offset":"60%"}); } </script>

Exemple pour le module Tchat dans un block simple :

// script tiers avant
<script async type="text/javascript" src="https://userlike-cdn-widgets.s3-eu-west-1.amazonaws.com/9c6fbd7eb23e455984526ab617504f649b07c567ce074a689e3faaff193e8d82.js"></script>

// script tiers RGPD
<script>
window.cookies_fonctionnels = window.cookies_fonctionnels || []
window.cookies_fonctionnels.push(function() {
	var script = document.createElement("script");
	document.body.appendChild(script);
	script.setAttribute("src", "https://userlike-cdn-widgets.s3-eu-west-1.amazonaws.com/9c6fbd7eb23e455984526ab617504f649b07c567ce074a689e3faaff193e8d82.js");
})
</script>

// script tiers après
<script>
function Tchat() {
 var scriptelement = document.createElement("script");
 document.body.appendChild(scriptelement);
 scriptelement.setAttribute("src", "https://userlike-cdn-widgets.s3-eu-west-1.amazonaws.com/9c6fbd7eb23e455984526ab617504f649b07c567ce074a689e3faaff193e8d82.js");
}
</script>


Résumé :

Cela fonctionne pour les blocks simples avec du code html complet dont la source est un script. Et aussi avec le module Drupal Asset_Injector. On recrée ou réécris une fonction au lieu d’une balise script toute faite. Le fonctionnement est de créer une balise script dans le DOM (contenu HTML = header + body) de façon dynamique, soit <script></script> avec la fonction :
var scriptelement = document.createElement("script");
var scriptelement est la déclaration d’une variable pour pouvoir l’utiliser pour y mettre une source qui une librairie javascript externe dans un fichier .js comme pour une image dont la source (src est un lien).
Ensuite il faut ajouter cette balise ou tag au body :
document.body.appendChild(scriptelement);
Puis à partir de là, il y a juste la source que l’on va changer :
scriptelement.setAttribute("src", "https://userlike-cdn-widgets.s3-eu-west-1.amazonaws.com/9c6fbd7eb23e455984526ab617504f649b07c567ce074a689e3faaff193e8d82.js");
On retrouve toujours la variable scriptelement mais la source change. On a donc créé un element du DOM qui est dorénavant :
<script async type="text/javascript" src="https://userlike-cdn-widgets.s3-eu-west-1.amazonaws.com/9c6fbd7eb23e455984526ab617504f649b07c567ce074a689e3faaff193e8d82.js"></script>
Ceci de façon dynamique, à la volée.

